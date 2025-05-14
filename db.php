<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "user_db"; // Make sure you create this database in phpMyAdmin

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
