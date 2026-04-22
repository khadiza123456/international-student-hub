<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];
    
    $conn->query("DELETE FROM bookmarks WHERE id = $id AND user_id = $user_id");
}

// রিডাইরেক্ট bookmarks.php তে
header("Location: bookmarks.php");
exit();
?>