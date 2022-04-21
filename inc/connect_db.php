<?php
$host = 'localhost';
$db   = 'world_db';
$user = 'root';
$pass = 'root';//pour que Yamin se connecte il doit mettre root
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     echo 'yooooo';
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>