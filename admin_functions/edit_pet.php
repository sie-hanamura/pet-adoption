<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "adoption-site";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $pet_id = $_POST['pet_id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $description = $_POST['description'];

    // Update pet in the database
    $sql = "UPDATE pets SET name='$name', breed='$breed', age='$age', description='$description' WHERE id='$pet_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to admin dashboard
        echo "<script>window.location.href = '../admin_dashboard.php';</script>";
        exit;
    } else {
        echo "Error updating pet: " . $conn->error;
    }
}

$conn->close();
?>
