<?php
require_once 'db.php';

// Get form data
$fullName = $_POST['fullName'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$userType = $_POST['userType'] ?? '';
$skills = $_POST['skills'] ?? '';
$location = $_POST['location'] ?? '';

// Validate
if (empty($fullName) || empty($email)) {
    die("Name and Email are required.");
}

try {
    $db = getDBConnection();
    
    $stmt = $db->prepare("
        INSERT INTO submissions 
        (full_name, email, phone, user_type, skills, location, submitted_at) 
        VALUES (?, ?, ?, ?, ?, ?, NOW())
    ");
    
    $stmt->execute([$fullName, $email, $phone, $userType, $skills, $location]);
    
    header("Location: success.php");
    exit();
    
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    die("Error saving your submission. Please try again.");
}
?>
