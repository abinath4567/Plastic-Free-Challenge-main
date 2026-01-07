<?php include "../config/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Sign Up</title>
</head>
<body>

<div class="card">
  <h2>Create Account</h2>
  <form method="post">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button name="signup">Register</button>
  </form>
</div>

<?php
if (isset($_POST['signup'])) {
  if (!preg_match("/@mail\.apu\.edu\.my$/", $_POST['email'])) {
    die("APU email only");
  }

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (email,password) VALUES (?,?)");
  $stmt->bind_param("ss", $_POST['email'], $password);
  $stmt->execute();
  header("Location: index.php");
}
?>
</body>
</html>
