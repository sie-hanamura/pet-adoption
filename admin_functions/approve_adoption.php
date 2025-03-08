<?php
// Start session and connect to the database
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption-site";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve adoption ID from URL parameters
$adoption_id = $_GET['id'];

// Update adoption status to 'Approved' in the database
$sql = "UPDATE adoptions SET status = 'Approved' WHERE id = $adoption_id";
if ($conn->query($sql) === TRUE) {
    header("Location: ../admin_dashboard.php");
} else {
    echo "Error updating adoption status: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
