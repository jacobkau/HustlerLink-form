<?php
function getDBConnection() {
    $dbUrl = getenv('DATABASE_URL');
    
    if (empty($dbUrl)) {
        // Local development fallback
        $dbUrl = "postgresql://postgres:password@localhost:5432/hustlerlink";
    }

    $dbOpts = parse_url($dbUrl);
    
    $dbHost = $dbOpts['host'];
    $dbPort = $dbOpts['port'];
    $dbUser = $dbOpts['user'];
    $dbPass = $dbOpts['pass'];
    $dbName = ltrim($dbOpts['path'], '/');

    try {
        $dsn = "pgsql:host=$dbHost;port=$dbPort;dbname=$dbName";
        $pdo = new PDO($dsn, $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
?>
