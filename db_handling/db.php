<?php
require 'config.php';

$name = "John Doe";
$email = "john@example.com";

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':name' => $name,
    ':email' => $email
]);

echo "User inserted successfully!";
?>
