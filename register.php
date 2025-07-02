<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $username = strtok($email, '@');
  $password = $_POST['password'];
  $passwordHash = password_hash($password, PASSWORD_BCRYPT);

  try {
    $stmt = $pdo->prepare("INSERT INTO users (fullname, email, username, password_hash) VALUES (?, ?, ?, ?)");
    $stmt->execute([$fullname, $email, $username, $passwordHash]);
    echo "Registration successful!";
  } catch (PDOException $e) {
    if ($e->getCode() === '23000') {
      echo "Error: Email or username already exists.";
    } else {
      echo "Error: " . $e->getMessage();
    }
  }
}
?>
