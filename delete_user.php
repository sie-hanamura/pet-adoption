<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption-site";

// Check if user ID is provided and confirm deletion
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Show confirmation message
    echo "<script>";
    echo "if(confirm('Are you sure you want to delete this user? This action cannot be undone.')) {";
    echo "window.location.href = 'delete_user.php?id=$user_id';";
    echo "} else {";
    echo "window.location.href = 'Pet-Adoption-and-Care-main/admin_dashboard.php';";
    echo "}";
    echo "</script>";
} else {
    $_SESSION['message'] = "User ID not provided.";
    header("Location: ../admin_dashboard.php");
    exit();
}
?>
