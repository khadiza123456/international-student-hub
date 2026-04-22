<?php
session_start();

// ডাটাবেস কানেকশন
// $host = 'sql100.infinityfree.com';
// $user = 'if0_41729749';
// $pass = 'azidahk123';
// $dbname = 'if0_41729749_student';

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'student';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ফর্ম ডাটা নেওয়া
$f_name = $_POST['f_name'] ?? '';
$l_name = $_POST['l_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$country = $_POST['country'] ?? '';
$inquiry = $_POST['inquiry'] ?? '';
$message = $_POST['message'] ?? '';
$user_id = $_SESSION['user_id'] ?? null;

// 1. ডাটাবেসে সেভ করা
$sql = "INSERT INTO contact_messages (user_id, f_name, l_name, email, phone, country, inquiry, message) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssss", $user_id, $f_name, $l_name, $email, $phone, $country, $inquiry, $message);
$stmt->execute();
$stmt->close();

// 2. ইমেইল পাঠানো (FormSubmit)
$ch = curl_init('https://formsubmit.co/ajax/khadizamaria523@gmail.com');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'name' => $f_name . ' ' . $l_name,
    'email' => $email,
    'phone' => $phone,
    'country' => $country,
    'inquiry' => $inquiry,
    'message' => $message,
    '_subject' => 'New Contact Message from ' . $f_name
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

// 3. সফল মেসেজ দেখিয়ে আবার ফর্ম পেজে ফেরত যাওয়া
?>
<!DOCTYPE html>
<html>
<head>
    <title>Message Sent</title>
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
        <h2>Message Sent Successfully!</h2>
        <p>Thank you for contacting us. We will get back to you soon.</p>
        <p>Redirecting...</p>
    </div>
</body>
</html>