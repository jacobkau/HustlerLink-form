<?php
$csvFile = "submissions.csv";

// Get form data safely
$fullName = $_POST['fullName'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$userType = $_POST['userType'] ?? '';
$skills = $_POST['skills'] ?? '';
$location = $_POST['location'] ?? '';
$timestamp = date("Y-m-d H:i:s");

// Check if file exists
$fileExists = file_exists($csvFile);

// Open file for appending
$file = fopen($csvFile, "a");

if ($file) {
    // If new file, write headers
    if (!$fileExists) {
        fputcsv($file, ["#", "Full Name", "Email", "Phone", "User Type", "Skills", "Location", "Submitted At"]);
    }

    // Count lines to assign number (skip header)
    $lineNumber = 1;
    if ($fileExists) {
        $lines = file($csvFile, FILE_IGNORE_NEW_LINES);
        $lineNumber = count($lines); // includes header
    }

    // Write new row
    fputcsv($file, [$lineNumber, $fullName, $email, $phone, $userType, $skills, $location, $timestamp]);
    fclose($file);

    // Redirect on success
    header("Location: success.php");
    exit();
} else {
    echo "Error: Could not write to file.";
}
?>
