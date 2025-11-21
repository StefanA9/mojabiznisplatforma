<?php
$host = 'sql200.infinityfree.com';
$dbname = 'epiz_31121671_agocs';
$username = 'epiz_31121671';
$password = 'ndvWKGSBwCsWZP';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>