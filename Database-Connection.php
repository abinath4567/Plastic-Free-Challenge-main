<?php
$conn = new mysqli("localhost", "root", "", "plastic_free_db");
if ($conn->connect_error) {
    die("Database connection failed");
}
session_start();
?>
