<?php
require_once 'db.php';

try {
    $db = getDBConnection();
    
    $db->exec("
        CREATE TABLE IF NOT EXISTS submissions (
            id SERIAL PRIMARY KEY,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            user_type VARCHAR(20),
            skills TEXT,
            location VARCHAR(100),
            submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
    echo "Database table created successfully!";
    
} catch (PDOException $e) {
    die("Error setting up database: " . $e->getMessage());
}
?>
