<?php
// Enable detailed error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define paths
$storageDir = __DIR__ . '/storage';
$csvFile = $storageDir . '/submissions.csv';

// Create storage directory if it doesn't exist
if (!file_exists($storageDir)) {
    if (!mkdir($storageDir, 0755, true)) {
        die("Failed to create storage directory");
    }
}

// Log the file path for debugging
error_log("CSV File Path: " . $csvFile);
error_log("Directory exists: " . (file_exists($storageDir) ? 'Yes' : 'No'));
error_log("Directory writable: " . (is_writable($storageDir) ? 'Yes' : 'No'));

// Get form data with sanitization
$fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING) ?? '';
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '';
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? '';
$userType = filter_input(INPUT_POST, 'userType', FILTER_SANITIZE_STRING) ?? '';
$skills = filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_STRING) ?? '';
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING) ?? '';
$timestamp = date("Y-m-d H:i:s");

// Validate required fields
if (empty($fullName) || empty($email)) {
    die("Name and Email are required.");
}

// Check if CSV file exists
$fileExists = file_exists($csvFile);

try {
    // Open the file for appending
    $file = fopen($csvFile, "a");
    
    if ($file === false) {
        throw new Exception("Failed to open file for writing");
    }

    // If new file, add headers
    if (!$fileExists) {
        $headers = ["#", "Full Name", "Email", "Phone", "User Type", "Skills", "Location", "Submitted At"];
        if (fputcsv($file, $headers) === false) {
            throw new Exception("Failed to write headers");
        }
    }

    // Count lines to get row number (skip header if exists)
    $lineCount = 0;
    if ($fileExists) {
        $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $lineCount = count($lines);
    }
    $rowNumber = $fileExists ? $lineCount : 1; // Start at 1 for new files

    // Prepare data row
    $data = [
        $rowNumber,
        $fullName,
        $email,
        $phone,
        $userType,
        $skills,
        $location,
        $timestamp
    ];

    // Write the data
    if (fputcsv($file, $data) === false) {
        throw new Exception("Failed to write data");
    }

    fclose($file);

    // Verify the write operation
    if (!file_exists($csvFile)) {
        throw new Exception("File not found after write operation");
    }

    // Log success
    error_log("Successfully wrote to CSV file");
    
    // Redirect to success page
    header("Location: success.php");
    exit();

} catch (Exception $e) {
    // Log detailed error
    error_log("Error in save.php: " . $e->getMessage());
    
    // Show user-friendly error message
    die("An error occurred while saving your submission. Please try again later. Error: " . $e->getMessage());
}
