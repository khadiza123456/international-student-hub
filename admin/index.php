<?php
session_start();
require_once '../config/database.php';

// অ্যাডমিন চেক
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit();
}

// পরিসংখ্যান
$total_users = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$total_messages = $conn->query("SELECT COUNT(*) as count FROM contact_messages")->fetch_assoc()['count'];
$total_consultations = $conn->query("SELECT COUNT(*) as count FROM consultations")->fetch_assoc()['count'];
$total_experiences = $conn->query("SELECT COUNT(*) as count FROM experiences")->fetch_assoc()['count'];
$total_bookmarks = $conn->query("SELECT COUNT(*) as count FROM bookmarks")->fetch_assoc()['count'];

// পেন্ডিং কাউন্ট
$pending_consultations = $conn->query("SELECT COUNT(*) as count FROM consultations WHERE status = 'pending'")->fetch_assoc()['count'];
$pending_experiences = $conn->query("SELECT COUNT(*) as count FROM experiences WHERE status = 'pending'")->fetch_assoc()['count'];

// স্ট্যাটাস আপডেট
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $type = $_POST['type'];
    $id = intval($_POST['id']);
    $status = $_POST['status'];
    
    if ($type == 'consultation') {
        $conn->query("UPDATE consultations SET status = '$status' WHERE id = $id");
    } elseif ($type == 'experience') {
        $conn->query("UPDATE experiences SET status = '$status' WHERE id = $id");
    }
    header("Location: index.php");
    exit();
}

// ডিলিট অপারেশন
if (isset($_GET['delete'])) {
    $type = $_GET['type'];
    $id = intval($_GET['delete']);
    
    if ($type == 'message') {
        $conn->query("DELETE FROM contact_messages WHERE id = $id");
    } elseif ($type == 'consultation') {
        $conn->query("DELETE FROM consultations WHERE id = $id");
    } elseif ($type == 'experience') {
        $conn->query("DELETE FROM experiences WHERE id = $id");
    } elseif ($type == 'user') {
        $conn->query("DELETE FROM users WHERE id = $id");
    }
    header("Location: index.php");
    exit();
}

// ডাটা ফেচ
$recent_messages = $conn->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 10");
$recent_consultations = $conn->query("SELECT * FROM consultations ORDER BY created_at DESC LIMIT 10");
$recent_experiences = $conn->query("SELECT * FROM experiences ORDER BY created_at DESC LIMIT 10");
$all_users = $conn->query("SELECT id, full_name, email, country, is_admin, created_at FROM users ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Study Abroad</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
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
            padding: 20px;
            overflow-y: auto;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            margin: 5px 0;
            transition: 0.3s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.2);
        }
        .sidebar a i {
            width: 25px;
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
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .top-bar h1 {
            color: #1e3c72;
        }
        .logout-btn {
            background: #dc3545;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        
        /* স্ট্যাটাস কার্ড */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-card h3 {
            font-size: 2rem;
            color: #1e3c72;
        }
        .stat-card p {
            color: #666;
            margin-top: 10px;
        }
        .stat-card i {
            font-size: 2rem;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        /* সেকশন কার্ড */
        .section-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
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
        .section-header h2 {
            color: #1e3c72;
        }
        
        /* টেবিল */
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
            background: #f8f9fa;
            color: #333;
            font-weight: 600;
        }
        .status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-approved {
            background: #d4edda;
            color: #155724;
        }
        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* বাটন */
        .btn-sm {
            padding: 4px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            margin: 0 2px;
        }
        .btn-approve {
            background: #28a745;
            color: white;
        }
        .btn-reject {
            background: #dc3545;
            color: white;
        }
        .btn-delete {
            background: #6c757d;
            color: white;
        }
        select.status-select {
            padding: 4px 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        /* ট্যাব */
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .tab-btn {
            padding: 10px 20px;
            background: #e9ecef;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        .tab-btn.active {
            background: #1e3c72;
            color: white;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        
        @media (max-width: 768px) {
            .sidebar { left: -280px; }
            .main-content { margin-left: 0; }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2><i class="fas fa-crown"></i> Admin Panel</h2>
    <a href="index.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#messages" onclick="showTab('messages')"><i class="fas fa-envelope"></i> Messages</a>
    <a href="#consultations" onclick="showTab('consultations')"><i class="fas fa-calendar"></i> Consultations</a>
    <a href="#experiences" onclick="showTab('experiences')"><i class="fas fa-share-alt"></i> Experiences</a>
    <a href="#users" onclick="showTab('users')"><i class="fas fa-users"></i> Users</a>
    <a href="../dashboard.php"><i class="fas fa-arrow-left"></i> Back to Site</a>
</div>

<div class="main-content">
    <div class="top-bar">
        <h1><i class="fas fa-crown"></i> Admin Dashboard</h1>
        <a href="../logout.php" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
    
    <!-- স্ট্যাটাস কার্ড -->
    <div class="stats-grid">
        <div class="stat-card"><i class="fas fa-users"></i><h3><?php echo $total_users; ?></h3><p>Total Users</p></div>
        <div class="stat-card"><i class="fas fa-envelope"></i><h3><?php echo $total_messages; ?></h3><p>Messages</p></div>
        <div class="stat-card"><i class="fas fa-calendar"></i><h3><?php echo $total_consultations; ?></h3><p>Consultations</p></div>
        <div class="stat-card"><i class="fas fa-share-alt"></i><h3><?php echo $total_experiences; ?></h3><p>Experiences</p></div>
        <div class="stat-card"><i class="fas fa-bookmark"></i><h3><?php echo $total_bookmarks; ?></h3><p>Bookmarks</p></div>
        <div class="stat-card"><i class="fas fa-clock"></i><h3><?php echo $pending_consultations; ?></h3><p>Pending</p></div>
    </div>
    
    <!-- ট্যাবস -->
    <div class="tabs">
        <button class="tab-btn active" onclick="showTab('messages')">📧 Messages</button>
        <button class="tab-btn" onclick="showTab('consultations')">📅 Consultations</button>
        <button class="tab-btn" onclick="showTab('experiences')">📝 Experiences</button>
        <button class="tab-btn" onclick="showTab('users')">👥 Users</button>
    </div>
    
    <!-- মেসেজ ট্যাব -->
    <div id="messages" class="tab-content active">
        <div class="section-card">
            <div class="section-header"><h2><i class="fas fa-envelope"></i> Contact Messages</h2></div>
            <?php if($recent_messages->num_rows > 0): ?>
                <table>
                    <thead><tr><th>Date</th><th>Name</th><th>Email</th><th>Message</th><th>Action</th></tr></thead>
                    <tbody>
                        <?php while($row = $recent_messages->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td><?php echo $row['f_name'] . ' ' . $row['l_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo substr($row['message'], 0, 50); ?>...</td>
                            <td><a href="?delete=<?php echo $row['id']; ?>&type=message" class="btn-sm btn-delete" onclick="return confirm('Delete?')">Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: echo "<p>No messages</p>"; endif; ?>
        </div>
    </div>
    
    <!-- কনসালটেশন ট্যাব -->
    <div id="consultations" class="tab-content">
        <div class="section-card">
            <div class="section-header"><h2><i class="fas fa-calendar"></i> Consultation Requests</h2></div>
            <?php if($recent_consultations->num_rows > 0): ?>
                <table>
                    <thead><tr><th>Date</th><th>Name</th><th>Email</th><th>Country</th><th>Preferred Date</th><th>Status</th><th>Action</th></tr></thead>
                    <tbody>
                        <?php while($row = $recent_consultations->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('M d', strtotime($row['created_at'])); ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['preferred_date']; ?></td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="type" value="consultation">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <select name="status" class="status-select" onchange="this.form.submit()">
                                        <option value="pending" <?php echo $row['status']=='pending'?'selected':''; ?>>Pending</option>
                                        <option value="approved" <?php echo $row['status']=='approved'?'selected':''; ?>>Approved</option>
                                        <option value="completed" <?php echo $row['status']=='completed'?'selected':''; ?>>Completed</option>
                                        <option value="rejected" <?php echo $row['status']=='rejected'?'selected':''; ?>>Rejected</option>
                                    </select>
                                    <input type="hidden" name="update_status" value="1">
                                </form>
                            </td>
                            <td><a href="?delete=<?php echo $row['id']; ?>&type=consultation" class="btn-sm btn-delete" onclick="return confirm('Delete?')">Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: echo "<p>No consultations</p>"; endif; ?>
        </div>
    </div>
    
    <!-- এক্সপেরিয়েন্স ট্যাব -->
    <div id="experiences" class="tab-content">
        <div class="section-card">
            <div class="section-header"><h2><i class="fas fa-share-alt"></i> Shared Experiences</h2></div>
            <?php if($recent_experiences->num_rows > 0): ?>
                <table>
                    <thead><tr><th>Date</th><th>Name</th><th>Country</th><th>Experience</th><th>Status</th><th>Action</th></tr></thead>
                    <tbody>
                        <?php while($row = $recent_experiences->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo date('M d', strtotime($row['created_at'])); ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo substr($row['message'], 0, 50); ?>...</td>
                            <td>
                                <form method="POST" style="display: inline;">
                                    <input type="hidden" name="type" value="experience">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <select name="status" class="status-select" onchange="this.form.submit()">
                                        <option value="pending" <?php echo $row['status']=='pending'?'selected':''; ?>>Pending</option>
                                        <option value="approved" <?php echo $row['status']=='approved'?'selected':''; ?>>Approved</option>
                                        <option value="rejected" <?php echo $row['status']=='rejected'?'selected':''; ?>>Rejected</option>
                                    </select>
                                    <input type="hidden" name="update_status" value="1">
                                </form>
                            </td>
                            <td><a href="?delete=<?php echo $row['id']; ?>&type=experience" class="btn-sm btn-delete" onclick="return confirm('Delete?')">Delete</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: echo "<p>No experiences</p>"; endif; ?>
        </div>
    </div>
    
    <!-- ইউজার ট্যাব -->
    <div id="users" class="tab-content">
        <div class="section-card">
            <div class="section-header"><h2><i class="fas fa-users"></i> All Users</h2></div>
            <?php if($all_users->num_rows > 0): ?>
                <table>
                    <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Country</th><th>Role</th><th>Joined</th><th>Action</th></tr></thead>
                    <tbody>
                        <?php while($row = $all_users->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['is_admin'] ? '<span style="color:#dc3545">Admin</span>' : 'User'; ?></td>
                            <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                            <td><?php if(!$row['is_admin']): ?><a href="?delete=<?php echo $row['id']; ?>&type=user" class="btn-sm btn-delete" onclick="return confirm('Delete user?')">Delete</a><?php else: ?>—<?php endif; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: echo "<p>No users</p>"; endif; ?>
        </div>
    </div>
</div>

<script>
function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    event.target.classList.add('active');
}
</script>

</body>
</html>