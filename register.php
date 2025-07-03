
<?php
include 'db.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
  echo "Email already registered.";
} else {
  $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $fullname, $email, $password);
  if ($stmt->execute()) {
    echo $fullname;
  } else {
    echo "error";
  }
}
?>
