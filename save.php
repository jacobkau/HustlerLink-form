<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Use a writable directory
$storageDir = __DIR__ . '/storage';
$csvFile = $storageDir . '/submissions.csv';

// Create storage directory if it doesn't exist
if (!file_exists($storageDir)) {
    if (!mkdir($storageDir, 0755, true)) {
        die("Failed to create storage directory");
    }
}
// Get form data safely
$fullName  = $_POST['fullName'] ?? '';
$email     = $_POST['email'] ?? '';
$phone     = $_POST['phone'] ?? '';
$userType  = $_POST['userType'] ?? '';
$skills    = $_POST['skills'] ?? '';
$location  = $_POST['location'] ?? '';
$timestamp = date("Y-m-d H:i:s");

// Validate (optional)
if (empty($fullName) || empty($email)) {
    echo "Name and Email are required.";
    exit();
}

// Check if CSV file exists
$fileExists = file_exists($csvFile);

// Open the file for appending
$file = fopen($csvFile, "a");
if ($file) {
    // If new file, add headers
    if (!$fileExists) {
        fputcsv($file, ["#", "Full Name", "Email", "Phone", "User Type", "Skills", "Location", "Submitted At"]);
    }

    // Count lines to get row number (skip header)
    $lines = file($csvFile, FILE_IGNORE_NEW_LINES);
    $rowNumber = count($lines);

    // Write the new data
    fputcsv($file, [$rowNumber, $fullName, $email, $phone, $userType, $skills, $location, $timestamp]);
    fclose($file);

    // Redirect to thank-you page
    header("Location: success.php");
    exit();
} else {
    echo "❌ Unable to open or write to submissions.csv";
}
?>
