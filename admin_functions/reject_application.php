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

// Retrieve application ID from URL parameters
$application_id = $_GET['id'];

// Update application status to 'Rejected' in the database
$sql = "UPDATE adoption_applications SET status = 'Rejected' WHERE id = $application_id";
if ($conn->query($sql) === TRUE) {
    header("Location: ../admin_dashboard.php");
} else {
    echo "Error updating application status: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
