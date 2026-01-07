<?php
include "../config/db.php";
if (!isset($_SESSION['user_id'])) header("Location: index.php");

$uid = $_SESSION['user_id'];
$user = $conn->query("SELECT email, points FROM users WHERE user_id=$uid")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<title>Dashboard</title>
</head>
<body>

<div class="navbar">
  <h2>🌿 Plastic Free Challenge</h2>
  <a href="logout.php">Logout</a>
</div>

<div class="dashboard-container">

<div class="welcome-card">
  <h3>Welcome</h3>
  <p><?php echo $user['email']; ?></p>
  <h1><?php echo $user['points']; ?> pts</h1>
</div>

<div class="grid">
  <a class="dash-card" href="challenges.php">🎯 Challenges</a>
  <a class="dash-card" href="leaderboard.php">🏆 Leaderboard</a>
  <a class="dash-card" href="rewards.php">🎁 Rewards</a>
</div>

</div>
</body>
</html>
