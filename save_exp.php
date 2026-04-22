<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // ফর্ম ডাটা নেওয়া
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $country = $_POST['country'] ?? '';
    $message = $_POST['message'] ?? '';
    $user_id = $_SESSION['user_id'] ?? null;
    
    // 1. ডাটাবেসে সেভ করা
    $sql = "INSERT INTO experiences (user_id, name, email, country, message) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $user_id, $name, $email, $country, $message);
    $stmt->execute();
    $stmt->close();
    
    // 2. ইমেইল পাঠানো (FormSubmit)
    $ch = curl_init('https://formsubmit.co/ajax/khadizamaria523@gmail.com');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'name' => $name,
        'email' => $email,
        'country' => $country,
        'message' => $message,
        '_subject' => 'New Study Abroad Experience from ' . $name
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Experience Shared</title>
    <meta http-equiv="refresh" content="2;url=index.php">
    <style>
        body {
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #667eea;
            margin: 0;
        }
        .message-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .success { color: green; font-size: 50px; margin-bottom: 20px; }
        h2 { color: #333; margin-bottom: 10px; }
        p { color: #666; }
    </style>
</head>
<body>
    <div class="message-box">
        <div class="success">✓</div>
        <h2>Thank You for Sharing!</h2>
        <p>Your experience has been submitted successfully.</p>
        <p>Redirecting...</p>
    </div>
</body>
</html>