<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$bookmarks = $conn->query("SELECT * FROM bookmarks WHERE user_id = $user_id ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Bookmarks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
        }
        .bookmark-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f2f5;
        }
        .header h1 {
            color: #1e3c72;
            font-size: 1.8rem;
        }
        .header h1 i {
            margin-right: 10px;
            color: #667eea;
        }
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            transition: 0.3s;
        }
        .back-btn:hover {
            background: #5a6268;
        }
        .bookmark-list {
            list-style: none;
        }
        .bookmark-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: 0.3s;
        }
        .bookmark-item:hover {
            background: #f8f9fa;
            border-radius: 10px;
        }
        .bookmark-info a {
            font-size: 1.1rem;
            color: #1e3c72;
            text-decoration: none;
            font-weight: 500;
        }
        .bookmark-info a:hover {
            color: #667eea;
        }
        .bookmark-info p {
            color: #999;
            font-size: 0.8rem;
            margin-top: 5px;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 8px 18px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.85rem;
            transition: 0.3s;
        }
        .delete-btn:hover {
            background: #c82333;
            transform: scale(1.05);
        }
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #999;
        }
        .empty-state i {
            font-size: 60px;
            margin-bottom: 20px;
            opacity: 0.3;
        }
        .empty-state a {
            color: #667eea;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="bookmark-card">
            <div class="header">
                <h1><i class="fas fa-bookmark"></i> My Bookmarks</h1>
                <a href="dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            
            <?php if($bookmarks && $bookmarks->num_rows > 0): ?>
                <ul class="bookmark-list">
                    <?php while($row = $bookmarks->fetch_assoc()): ?>
                    <li class="bookmark-item">
                        <div class="bookmark-info">
                            <a href="<?php echo $row['resource_url']; ?>" target="_blank">
                                <i class="<?php echo $row['resource_icon']; ?>"></i> <?php echo $row['resource_title']; ?>
                            </a>
                            <p>Saved on: <?php echo date('M d, Y', strtotime($row['created_at'])); ?></p>
                        </div>
                        <a href="delete-bookmark.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Remove this bookmark?')">
                            <i class="fas fa-trash"></i> Remove
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <div class="empty-state">
                    <i class="fas fa-bookmark"></i>
                    <p>No bookmarks yet!</p>
                    <a href="index.php">Browse resources and click <i class="fas fa-bookmark"></i> Save</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>