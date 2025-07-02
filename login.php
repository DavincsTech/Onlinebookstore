<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
  $stmt->execute([$username, $username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user && password_verify($password, $user['password_hash'])) {
    echo "Login successful! Welcome, " . htmlspecialchars($user['fullname']);
  } else {
    echo "Invalid credentials.";
  }
}
?>
