<?php
// config/database.php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// $host = 'sql100.infinityfree.com';
// $user = 'if0_41729749';
// $pass = 'azidahk123';
// $dbname = 'if0_41729749_student';

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'student';


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>