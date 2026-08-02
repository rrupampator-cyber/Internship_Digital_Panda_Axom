<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "internship_system_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}
?>