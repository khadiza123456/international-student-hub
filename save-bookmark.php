<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $url = $_POST['url'];
    $icon = $_POST['icon'];
    $user_id = $_SESSION['user_id'];
    
    // চেক করুন ইতিমধ্যে আছে কিনা
    $check = $conn->query("SELECT * FROM bookmarks WHERE user_id = $user_id AND resource_url = '$url'");
    
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO bookmarks (user_id, resource_title, resource_url, resource_icon) 
                      VALUES ($user_id, '$title', '$url', '$icon')");
    }
    
    // ফিরে যান আগের পেইজে
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>