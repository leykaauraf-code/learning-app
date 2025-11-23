<?php
// koneksi.php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'belajar';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // tampilkan error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // hasil array asosiatif
    PDO::ATTR_EMULATE_PREPARES   => false,                  // prepared statement asli
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "<h3>Gagal terkoneksi ke database!</h3>";
    echo "Error: " . $e->getMessage();
    exit;
}
?>
