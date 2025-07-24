<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hustlerlink_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, user_type, skills, location, created_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("ssssss", $fullName, $email, $phone, $userType, $skills, $location);

// Set parameters and execute
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$userType = $_POST['userType'];
$skills = $_POST['skills'];
$location = $_POST['location'];

if ($stmt->execute()) {
    // Success - redirect to thank you page
    header("Location: success.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>