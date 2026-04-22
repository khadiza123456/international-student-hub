<?php
// register_process.php
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

// ডাটা নেওয়া (এস্কেপ করা সহ)
$fullName = $conn->real_escape_string($_POST['fullName'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$dob = $_POST['dob'] ?? '';
$email = $conn->real_escape_string($_POST['email'] ?? '');
$phone = $conn->real_escape_string($_POST['phone'] ?? '');
$country = $conn->real_escape_string($_POST['country'] ?? '');
$city = $conn->real_escape_string($_POST['city'] ?? '');
$qualification = $conn->real_escape_string($_POST['qualification'] ?? '');
$major = $conn->real_escape_string($_POST['major'] ?? '');
$preferredCountry = $conn->real_escape_string($_POST['preferredCountry'] ?? '');
$intake = $conn->real_escape_string($_POST['intake'] ?? '');
$programLevel = $conn->real_escape_string($_POST['programLevel'] ?? '');
$budget = $conn->real_escape_string($_POST['budget'] ?? '');
$engTest = $conn->real_escape_string($_POST['engTest'] ?? '');
$testScore = $conn->real_escape_string($_POST['testScore'] ?? '');
$passport = $conn->real_escape_string($_POST['passport'] ?? '');
$comments = $conn->real_escape_string($_POST['comments'] ?? '');
$terms = isset($_POST['terms']) ? 1 : 0;

$errors = [];

// ভ্যালিডেশন
if (empty($fullName)) $errors[] = "Full name required";
if (empty($password) || strlen($password) < 6) $errors[] = "Password must be 6+ characters";
if ($password !== $confirm_password) $errors[] = "Passwords do not match";
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required";
if (empty($phone)) $errors[] = "Phone required";
if (empty($dob)) $errors[] = "Date of birth required";
if (empty($country)) $errors[] = "Country required";
if (empty($city)) $errors[] = "City required";
if (empty($preferredCountry)) $errors[] = "Preferred country required";
if ($terms != 1) $errors[] = "Terms must be accepted";

// ইমেইল চেক
$check = $conn->query("SELECT id FROM users WHERE email = '$email'");
if ($check && $check->num_rows > 0) $errors[] = "Email already registered";

if (empty($errors)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // users টেবিলে INSERT
    $sql1 = "INSERT INTO users (full_name, email, password, phone, date_of_birth, country, city) 
             VALUES ('$fullName', '$email', '$hashed_password', '$phone', '$dob', '$country', '$city')";
    
    if ($conn->query($sql1)) {
        $user_id = $conn->insert_id;
        
        // student_profiles টেবিলে INSERT
        $sql2 = "INSERT INTO student_profiles (user_id, qualification, major, preferred_country, intake, program_level, budget_range, english_test, test_score, passport_status, comments, terms_accepted) 
                 VALUES ($user_id, '$qualification', '$major', '$preferredCountry', '$intake', '$programLevel', '$budget', '$engTest', '$testScore', '$passport', '$comments', $terms)";
        
        if ($conn->query($sql2)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $fullName;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Profile save failed: " . $conn->error;
        }
    } else {
        $error = "Registration failed: " . $conn->error;
    }
} else {
    $error = implode("<br>", $errors);
}

if (isset($error)) {
    header("Location: register.php?error=" . urlencode($error));
    exit();
}

$conn->close();
?>