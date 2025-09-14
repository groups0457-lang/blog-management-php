<?php
// Include database connection
include_once '../db_conn.php';

try {
    // Prepare SQL to fetch all contact messages
    $stmt = $conn->prepare("SELECT id, name, email, subject, message, created_at 
                            FROM contact_messages 
                            ORDER BY created_at DESC");
    $stmt->execute();

    // Fetch all messages
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching contact messages: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Bootstrap and Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="../css/side-bar.css">
    <link rel="stylesheet" href="../css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

</head>
<body>
    <?php 
      $key = "hhdsfs1263z";
      include "inc/side-nav.php"; // sidebar
    ?>

    <!-- Main content wrapper -->
    <div class="main-table mt-5 pt-5">
        <h1>Contact Messages</h1>
    <?php if (count($messages) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $msg): ?>
            <tr>
                <td><?php echo htmlspecialchars($msg['id']); ?></td>
                <td><?php echo htmlspecialchars($msg['name']); ?></td>
                <td><?php echo htmlspecialchars($msg['email']); ?></td>
                <td><?php echo htmlspecialchars($msg['subject']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($msg['message'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No contact messages found.</p>
    <?php endif; ?>
    </div>

    <script>
        // Script to set the active class on the side navigation
        var navList = document.getElementById('navList').children;
        if(navList.length > 0) {
            navList.item(0).classList.add("active");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


