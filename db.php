
<?php
$host = "db4free.net";
$user = "bookstore_auth";
$pass = "Davincs@123";
$dbname = "bookstore_auth";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
