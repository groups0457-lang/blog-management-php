<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['username'])) {

    if (isset($_POST['new_pass']) && isset($_POST['cnew_pass'])) {

        include "../../db_conn.php";

        $new_pass   = $_POST['new_pass'];
        $cnew_pass  = $_POST['cnew_pass'];
        $id         = $_SESSION['admin_id'];

        // Validate
        if (empty($new_pass)) {
            $em = "New Password is required"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if (empty($cnew_pass)) {
            $em = "Confirm Password is required"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if ($cnew_pass !== $new_pass) {
            $em = "New password and confirm password don't match"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        } else if (strlen($new_pass) < 3) {
            $em = "Password must be at least 6 characters long"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }

        // Hash the password
        $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        // Update only the logged-in admin
        $sql = "UPDATE admin SET password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $res  = $stmt->execute([$hashed_pass, $id]);

        if ($res) {
            $sm = "The Password was successfully changed!"; 
            header("Location: ../profile.php?psuccess=$sm#cpassword");
            exit;
        } else {
            $em = "Unknown error occurred"; 
            header("Location: ../profile.php?perror=$em#cpassword");
            exit;
        }

    } else {
        header("Location: ../profile.php");
        exit;
    }

} else {
    header("Location: ../admin-login.php");
    exit;
}
