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

// Update adoption status to 'Rejected' in the database
$sql = "UPDATE adoptions SET status = 'Rejected' WHERE id = $adoption_id";
if ($conn->query($sql) === TRUE) {
    // Store the scroll position in session storage
    echo '<script>window.sessionStorage.setItem("scrollPosition", window.scrollY);</script>';
    // Redirect back to the dashboard
    header("Location: ../admin_dashboard.php");
} else {
    echo "Error updating adoption status: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Retrieve scroll position from session storage
    var scrollPosition = window.sessionStorage.getItem("scrollPosition");
    if (scrollPosition !== null) {
        // Scroll to the previous position
        window.scrollTo(0, scrollPosition);
        // Clear session storage
        window.sessionStorage.removeItem("scrollPosition");
    }
});
</script>
