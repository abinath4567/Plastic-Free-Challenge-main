<?php include "../config/db.php"; ?>
<h2>Challenges</h2>

<?php
$res = $conn->query("SELECT * FROM challenges");
while ($c = $res->fetch_assoc()) {
echo "
<form action='upload_proof.php' method='post' enctype='multipart/form-data'>
  <b>{$c['title']}</b> ({$c['points']} pts)
  <input type='hidden' name='cid' value='{$c['challenge_id']}'>
  <input type='file' name='proof' required>
  <button>Submit Proof</button>
</form><hr>";
}
?>
