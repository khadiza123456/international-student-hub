<?php
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';
$error = '';

// ইউজার তথ্য পাওয়া
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// প্রোফাইল আপডেট
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $name = $_POST['full_name'];
    $country = $_POST['country'];
    
    $update_sql = "UPDATE users SET full_name = ?, country = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssi", $name, $country, $user_id);
    
    if ($update_stmt->execute()) {
        $_SESSION['user_name'] = $name;
        $message = "Profile updated successfully!";
        // রিফ্রেশ
        header("Refresh:0");
    } else {
        $error = "Update failed!";
    }
}

// পাসওয়ার্ড পরিবর্তন
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (password_verify($old_password, $user['password'])) {
        if ($new_password === $confirm_password) {
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $pass_sql = "UPDATE users SET password = ? WHERE id = ?";
            $pass_stmt = $conn->prepare($pass_sql);
            $pass_stmt->bind_param("si", $hashed, $user_id);
            if ($pass_stmt->execute()) {
                $message = "Password changed successfully!";
            } else {
                $error = "Password change failed!";
            }
        } else {
            $error = "New passwords don't match!";
        }
    } else {
        $error = "Old password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Study Abroad</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .profile-card { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h2 { color: #1e3c72; margin-bottom: 20px; border-bottom: 2px solid #667eea; padding-bottom: 10px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-size: 14px; }
        button { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; font-size: 16px; }
        button:hover { transform: translateY(-2px); }
        .message { background: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px; }
        .error { background: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px; }
        .back-link { display: inline-block; margin-top: 20px; color: #667eea; text-decoration: none; }
        .section { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <h2>👤 My Profile</h2>
            
            <?php if($message): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php endif; ?>
            <?php if($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <!-- প্রোফাইল আপডেট ফর্ম -->
            <form method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email (Cannot be changed)</label>
                    <input type="email" value="<?php echo $user['email']; ?>" disabled style="background:#f0f0f0;">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select name="country">
                        <option value="<?php echo $user['country']; ?>"><?php echo $user['country'] ?: 'Select Country'; ?></option>
                        <option>USA</option><option>UK</option><option>Canada</option>
                        <option>Australia</option><option>Germany</option>
                    </select>
                </div>
                <button type="submit" name="update_profile">Update Profile</button>
            </form>
            
            <!-- পাসওয়ার্ড পরিবর্তন -->
            <div class="section">
                <h3>🔐 Change Password</h3>
                <form method="POST">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old_password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="confirm_password" required>
                    </div>
                    <button type="submit" name="change_password">Change Password</button>
                </form>
            </div>
            
            <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
        </div>
    </div>
</body>
</html>