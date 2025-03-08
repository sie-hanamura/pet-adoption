<?php
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

// Fetch cat data from the database
$catSql = "SELECT * FROM pets WHERE type = 'Cat'";
$catResult = $conn->query($catSql);

$catData = array();

if ($catResult->num_rows > 0) {
    while ($row = $catResult->fetch_assoc()) {
        // Add each cat's data to the array
        $catData[] = $row;
    }
}

// Fetch dog data from the database
$dogSql = "SELECT * FROM pets WHERE type = 'Dog'";
$dogResult = $conn->query($dogSql);

$dogData = array();

if ($dogResult->num_rows > 0) {
    while ($row = $dogResult->fetch_assoc()) {
        // Add each dog's data to the array
        $dogData[] = $row;
    }
}

// Combine cat and dog data into one array
$petData = array("cats" => $catData, "dogs" => $dogData);

// Convert the array to JSON format and output it
header('Content-Type: application/json');
echo json_encode($petData);

// Close the database connection
$conn->close();
?>
