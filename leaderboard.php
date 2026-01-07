<?php include "../config/db.php"; ?>
<h2>Leaderboard</h2>
<?php
$res = $conn->query("SELECT email, points FROM users ORDER BY points DESC");
while ($row = $res->fetch_assoc()) {
  echo "<p>{$row['email']} - {$row['points']} pts</p>";
}
?>
