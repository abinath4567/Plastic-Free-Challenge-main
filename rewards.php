<?php include "../config/db.php"; ?>
<h2>Rewards</h2>

<?php
$r = $conn->query("SELECT * FROM rewards");
while ($row = $r->fetch_assoc()) {
  echo "<p>{$row['name']} - {$row['points_required']} pts</p>";
}
?>
