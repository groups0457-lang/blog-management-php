<?php 
session_start();

// Check if the admin is logged in
if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Posts</title>
    <!-- Bootstrap and Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Assuming these are your custom stylesheets -->
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Your custom styles */
        .main-table{
            margin-left: 150px; 
            padding: 20px;
            width: calc(100% - 170px);
        }
        .t1 th, .t1 td{
            text-align: center;
            vertical-align: middle;
        }

        /* --- Responsive Table Styles --- */
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        @media screen and (max-width: 768px) {
            .main-table {
                margin-left: 0;
                width: 100%;
                padding: 10px;
            }

            .responsive-table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
            
            .responsive-table tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #dee2e6;
                border-radius: 0.375rem;
                box-shadow: 0 0 10px rgba(0,0,0,0.05);
            }
            
            .responsive-table td {
                display: block;
                text-align: right;
                padding: 0.75rem 1rem;
                border-bottom: 1px solid #e9ecef;
            }

            .responsive-table td:last-child {
                border-bottom: 0;
            }
            
            .responsive-table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
                font-size: 0.85em;
            }

            .responsive-table th[scope="row"] {
                 display: none;
            }

            .responsive-table td[data-label="Action"] .btn {
                 margin: 0.25rem 0.15rem;
            }
        }
    </style>
</head>
<body>
    <?php 
      $key = "hhdsfs1263z";
      include "inc/side-nav.php"; 
      include_once("data/Post.php");
      require_once("../db_conn.php");
      $posts = getAllDeep($conn);
    ?>
               
     <div class="main-table mt-5 pt-5">
        <h3 class="mb-3">All Posts 
            <a href="post-add.php" class="btn btn-success">Add New</a></h3>
        
        <?php if (isset($_GET['error'])) { ?>   
        <div class="alert alert-danger">
            <?=htmlspecialchars($_GET['error'])?>
        </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?> 
        <div class="alert alert-success">
            <?=htmlspecialchars($_GET['success'])?>
        </div>
        <?php } ?>

        <?php if ($posts != 0) { ?>
        <table class="table t1 table-bordered responsive-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($posts as $post) {
            $category = getCategoryById($conn, $post['category']); 
            ?>
            <tr>
              <th scope="row" data-label="#"><?=$post['post_id'] ?></th>
              <td data-label="Title"><?=htmlspecialchars($post['post_title']) ?></td>
              <td data-label="Category">
                <?=htmlspecialchars($category['category'])?>
              </td>
              <td data-label="Action">
                <a href="post-delete.php?post_id=<?=$post['post_id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                <a href="post-edit.php?post_id=<?=$post['post_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-warning">
            Empty! No posts found.
        </div>
    <?php } ?>
     </div>

     <script>
        var navList = document.getElementById('navList').children;
        if(navList.length > 1) {
            navList.item(1).classList.add("active");
        }
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
} else {
    header("Location: ../admin-login.php");
    exit;
} 
?>
