<?php
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

// Check if form data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, contact, gender, age, bday) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $user, $email, $pass, $contact, $gender, $age, $bday);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: application-success.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>