<?php include "../config/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Login</title>
</head>
<body>

<div class="card">
  <h2>🌿 Plastic Free Challenge</h2>
  <form method="post">
    <input type="email" name="email" placeholder="TPxxxx@mail.apu.edu.my" required>
    <input type="password" name="password" placeholder="Password" required>
    <button name="login">Login</button>
  </form>
  <p>No account? <a href="signup.php">Sign up</a></p>
</div>

<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if (!preg_match("/@mail\.apu\.edu\.my$/", $email)) {
    die("Only APU student email allowed");
  }

  $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows == 1) {
    $user = $res->fetch_assoc();
    if (password_verify($pass, $user['password'])) {
      $_SESSION['user_id'] = $user['user_id'];
      header("Location: dashboard.php");
    }
  }
}
?>
</body>
</html>
