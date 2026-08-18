<?php
$host = "localhost";
$user = "root"; // Default phpMyAdmin username
$pass = ""; // Leave blank if no password is set
$db = "online_voting";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>