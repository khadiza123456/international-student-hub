<?php
session_start();
require_once 'config/database.php';

// লগইন চেক
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// পরিসংখ্যান
$stats = [];

// কনট্যাক্ট মেসেজ কাউন্ট
$result = $conn->query("SELECT COUNT(*) as count FROM contact_messages WHERE user_id = $user_id OR email = '{$_SESSION['user_email']}'");
$stats['messages'] = $result->fetch_assoc()['count'];

// কনসালটেশন কাউন্ট
$result = $conn->query("SELECT COUNT(*) as count FROM consultations WHERE user_id = $user_id OR email = '{$_SESSION['user_email']}'");
$stats['consultations'] = $result->fetch_assoc()['count'];

// এক্সপেরিয়েন্স কাউন্ট
$result = $conn->query("SELECT COUNT(*) as count FROM experiences WHERE user_id = $user_id OR email = '{$_SESSION['user_email']}'");
$stats['experiences'] = $result->fetch_assoc()['count'];

// সাম্প্রতিক কনসালটেশন
$recent_consultations = $conn->query("SELECT * FROM consultations WHERE user_id = $user_id OR email = '{$_SESSION['user_email']}' ORDER BY created_at DESC LIMIT 5");

// সাম্প্রতিক এক্সপেরিয়েন্স
$recent_experiences = $conn->query("SELECT * FROM experiences WHERE user_id = $user_id OR email = '{$_SESSION['user_email']}' ORDER BY created_at DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Study Abroad Guide</title>
    <link rel="stylesheet" href="assets/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            overflow-x: hidden;
        }

        /* সাইডবার */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100%;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            transition: 0.3s;
            z-index: 100;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-header {
            padding: 30px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .sidebar-header p {
            font-size: 0.85rem;
            opacity: 0.8;
        }

        .sidebar-menu {
            padding: 20px 0;
        }

        .menu-item {
            padding: 12px 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
            border-left: 3px solid transparent;
        }

        .menu-item:hover, .menu-item.active {
            background: rgba(255,255,255,0.1);
            border-left-color: #ffd700;
        }

        .menu-item i {
            width: 25px;
            font-size: 1.2rem;
        }

        /* মূল কন্টেন্ট */
        .main-content {
            margin-left: 280px;
            padding: 20px;
        }

        /* টপ বার */
        .top-bar {
            background: white;
            border-radius: 15px;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .welcome-text h2 {
            color: #1e3c72;
            font-size: 1.5rem;
        }

        .welcome-text p {
            color: #666;
            margin-top: 5px;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        /* স্ট্যাটাস কার্ড */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-info h3 {
            font-size: 2rem;
            color: #1e3c72;
        }

        .stat-info p {
            color: #666;
            margin-top: 5px;
        }

        .stat-icon i {
            font-size: 3rem;
            opacity: 0.3;
            color: #1e3c72;
        }

        /* সেকশন */
        .section-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f2f5;
        }

        .section-header h3 {
            color: #1e3c72;
        }

        .section-header a {
            color: #667eea;
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            color: #666;
            font-weight: 600;
        }

        .status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background: #d4edda;
            color: #155724;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        /* রেস্পন্সিভ */
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- সাইডবার -->
<div class="sidebar">
    <div class="sidebar-header">
        <h3>🌍 Study Abroad</h3>
        <p>Welcome back, <?php echo $user_name; ?></p>
    </div>
    <div class="sidebar-menu">
        <a href="dashboard.php" class="menu-item active">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="profile.php" class="menu-item">
            <i class="fas fa-user"></i> My Profile
        </a>
        <a href="my-submissions.php" class="menu-item">
            <i class="fas fa-file-alt"></i> My Submissions
        </a>
        <a href="bookmarks.php" class="menu-item">
            <i class="fas fa-bookmark"></i> Bookmarks
        </a>
        <a href="index.php" class="menu-item">
            <i class="fas fa-home"></i> Homepage
        </a>
    </div>
</div>

<!-- মূল কন্টেন্ট -->
<div class="main-content">
    <div class="top-bar">
        <div class="welcome-text">
            <h2>📊 Dashboard</h2>
            <p>Manage your study abroad journey from here</p>
        </div>
        <a href="logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- স্ট্যাটাস কার্ড -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h3><?php echo $stats['messages']; ?></h3>
                <p>Contact Messages</p>
            </div>
            <div class="stat-icon"><i class="fas fa-envelope"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <h3><?php echo $stats['consultations']; ?></h3>
                <p>Consultations</p>
            </div>
            <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <h3><?php echo $stats['experiences']; ?></h3>
                <p>Shared Experiences</p>
            </div>
            <div class="stat-icon"><i class="fas fa-share-alt"></i></div>
        </div>
    </div>

    <!-- সাম্প্রতিক কনসালটেশন -->
    <div class="section-card">
        <div class="section-header">
            <h3><i class="fas fa-calendar-check"></i> Recent Consultations</h3>
            <a href="my-submissions.php">View All →</a>
        </div>
        <?php if($recent_consultations && $recent_consultations->num_rows > 0): ?>
            <table>
                <thead>
                    <tr><th>Date</th><th>Country</th><th>Preferred Date</th><th>Status</th></tr>
                </thead>
                <tbody>
                    <?php while($row = $recent_consultations->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['preferred_date']; ?></td>
                        <td><span class="status status-<?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <p>No consultation requests yet.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- সাম্প্রতিক এক্সপেরিয়েন্স -->
    <div class="section-card">
        <div class="section-header">
            <h3><i class="fas fa-share-alt"></i> Recent Experiences</h3>
            <a href="my-submissions.php">View All →</a>
        </div>
        <?php if($recent_experiences && $recent_experiences->num_rows > 0): ?>
            <table>
                <thead>
                    <tr><th>Date</th><th>Country</th><th>Experience</th></tr>
                </thead>
                <tbody>
                    <?php while($row = $recent_experiences->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo substr($row['message'], 0, 60); ?>...</td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="empty-state">
                <p>No experiences shared yet.</p>
            </div>
        <?php endif; ?>
    </div>
</div>




  <script src="assets/js/script.js"></script>
  
</body>
</html>