<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>International Student Hub</title>

  <link rel="stylesheet" href="assets/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <main>
    <header class="header" id="header">
      <div class="container">
        <div class="header-wrap">
          <div class="logo">
            <h2>
              <a href="./"><img src="./assets/img/logo.png" alt="Logo Here" /> </a>

            </h2>
            <div class="site-slogan">
              <h1>Real Experiences • Smart Preparation • Global Journey</h1>
            </div>
          </div>
          <div class="site-mode">
            <nav class="mode">
              <ul class="all-modes">
                <li class="menu-bars">
                  <a href="#" id="open-close--menu">
                    <i class="fa-solid fa-bars-staggered"></i>
                    <span class="d-none">Bars</span></a>
                </li>
                <li>
                  <a href="#"id="mainSearchButton"><i class="fa-solid fa-magnifying-glass"></i><span class="d-none">Search</span></a>
                </li>
                <li>
                  <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                  <?php else: ?>
                    <a href="login.php"><i class="fas fa-user"></i></a>
                    <?php endif; ?>
                </li>
                <li>
                  <ul class="all-site--modes">
                    <li class="active">
                      <a title="light mode" href="#"><i class="fa-regular fa-sun"></i></a>
                    </li>
                    <li>
                      <a title="dark mode" href="#"><i class="fa-regular fa-moon"></i></a>
                    </li>
                    <li>
                      <a title="calm mode" href="#"><i class="fa-solid fa-mountain"></i></a>

                    </li>
                  </ul>
                </li>
              </ul>

            </nav>
            <div class="icon"></div>
          </div>
        </div>
           <div class="search-panel" id="searchPanel">
    <input type="text" id="userQuery" placeholder="Search here...">
    <button class="btn-go" id="submitQuery">Go</button>
    <button class="btn-close" id="closeSearchBtn">✖ Close</button>
</div>
          <div class="result-panel" id="resultPanel">
        Your search: "<span id="displayQuery"></span>"
    </div>
        <div class="navigation">
          <div class="close-icon">
            <a href="#" id="close-menu--bars"><i class="fas fa-times"></i><span class="d-none">Close</span></a>
          </div>
          <nav class="navbar">
            <ul>
              <li><a href="index.php">Home</a></li>
              <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
               <?php endif; ?> 
              <li><a href="study-abroad-journey.php">Study Abroad Journey</a></li>
              <li><a href="student-experience.php">Student Experiences</a></li>
              <li><a href="country-guide.php">Country Guide</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="about.php">About</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </header>