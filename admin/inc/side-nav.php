<?php if (isset($key) && $key == "hhdsfs1263z") { ?>
  <?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

  <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
  <input type="checkbox" id="checkbox">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar + Header</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
      }

      body {
        display: flex;
        min-height: 100vh;
        background: #f4f6f9;
      }

      /* Sidebar */
      .sidebar {
        width: 250px;
        background: #222;
        color: #fff;
        flex-shrink: 0;
        padding: 20px 0;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        transition: all 0.3s ease;
        overflow-y: auto;
      }

      .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 20px;
        font-weight: bold;
        color: #fff;
      }

      .sidebar ul {
        list-style: none;
      }

      .sidebar ul li {
        margin: 5px 0;
      }

      .sidebar ul li a {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        text-decoration: none;
        color: #ddd;
        font-size: 15px;
        transition: all 0.3s;
      }

      .sidebar ul li a i {
        margin-right: 12px;
        font-size: 18px;
      }

      .sidebar ul li a:hover {
        background: #1976d2;
        color: #fff;
      }

      .sidebar ul li a.active {
        background: #1565c0;
        color: #fff;
      }

      /* Header */
      .header {
        height: 60px;
        background: #1976d2;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 20px;
        position: fixed;
        top: 0;
        left: 250px;
        right: 0;
        transition: all 0.3s;
        z-index: 1000;
      }

      .header h2 {
        font-size: 20px;
        font-weight: bold;
      }

      .header .menu-toggle {
        display: none;
        cursor: pointer;
        font-size: 22px;
      }

      .header .main-profile-link a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
      }

      /* Content */
      .content {
        margin-top: 60px;
        margin-left: 20px;
        padding: 20px;
        width: 20%;
      }

      .content h1 {
        margin-bottom: 15px;
      }

      .main-profile-link {
        display: flex;
        justify-content: flex-end;
        /* Align to right, adjust as needed */
        align-items: center;
        padding: 10px 20px;
        background-color: #271949ff;
        /* light background */
        border-radius: 8px;
        transition: background 0.3s;
      }

      .main-profile-link:hover {
        background-color: #e0e0e0;
        color: #000;
      }

      .profile-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        font-family: Arial, sans-serif;
        gap: 10px;
        /* space between icon and username */
      }

      .profile-icon {
        font-size: 20px;
        color: #555;
      }

      .profile-username {
        font-weight: 500;
        font-size: 16px;
      }

      /* Responsive */
      @media(max-width: 768px) {
        .sidebar {
          left: -250px;
        }

        .sidebar.active {
          left: 0;
        }

        .header {
          left: 0;
        }

        .content {
          margin-left: 0;
          margin-top: 0;
          padding: 0;
          width: 0%;
        }

        .header .menu-toggle {
          display: block;
        }
      }
    </style>
  </head>

  <body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <h2>My Blog</h2>
      <ul>
        <li><a href="Users.php" class="<?php echo ($current_page == 'Users.php') ? 'active' : ''; ?>"><i class="fa fa-users"></i><span>Users</span></a></li>
        <li><a href="Post.php" class="<?php echo ($current_page == 'Post.php') ? 'active' : ''; ?>"><i class="fa fa-wpforms"></i><span>Post</span></a></li>
        <li><a href="Category.php" class="<?php echo ($current_page == 'Category.php') ? 'active' : ''; ?>"><i class="fa fa-window-restore"></i><span>Category</span></a></li>
        <li><a href="Profile.php" class="<?php echo ($current_page == 'Profile.php') ? 'active' : ''; ?>"><i class="fa fa-user"></i><span>Profile</span></a></li>
        <li>
          <a href="contact-display.php" class="<?php echo ($current_page == 'contact-display.php') ? 'active' : ''; ?>">
            <i class="fa fa-envelope"></i><span>Contact</span>
          </a>
        </li>
        <li>
          <a href="../logout.php" onclick="return confirmLogout();">
            <i class="fa fa-power-off"></i><span>Logout</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Header -->
<div class="header">
  <span class="menu-toggle" onclick="toggleSidebar()">☰</span>
  <h2>Dashboard</h2>
  <div class="main-profile-link">
    <a href="profile.php" class="profile-link">
      <i class="fa fa-user profile-icon" aria-hidden="true"></i>
      <span class="profile-username">
        @<?php echo htmlspecialchars($_SESSION['username']); ?>
      </span>
    </a>
  </div>
</div>


    <!-- Content -->
    <div class="content">
    </div>

    <script>
      function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("active");
      }

      function confirmLogout() {
        return confirm("Are you sure you want to logout?");
      }
    </script>

  </body>

  </html>
<?php } ?>