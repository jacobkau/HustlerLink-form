<?php
// Path to CSV in same directory
$csvFile = __DIR__ . "/submissions.csv";

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
