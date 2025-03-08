<?php
// Database connection
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
    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($conn, $_POST['first-name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle-name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last-name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $job = mysqli_real_escape_string($conn, $_POST['job']);
    $contact_method = mysqli_real_escape_string($conn, $_POST['contact-method']);
    $allergies = mysqli_real_escape_string($conn, $_POST['allergies']);
    $allergy_details = mysqli_real_escape_string($conn, $_POST['allergy-details']);
    $previous_pets = mysqli_real_escape_string($conn, $_POST['previous-pets']);
    $pet_experiences = mysqli_real_escape_string($conn, $_POST['pet-experiences']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $pet_id = mysqli_real_escape_string($conn, $_POST['pet_id']);
    $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']);

    // Insert data into database using prepared statements
    $sql = "INSERT INTO adoption_applications (first_name, middle_name, last_name, age, email, address, job, contact_method, allergies, allergy_details, previous_pets, pet_experiences, reason, pet_id, pet_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiisssssssiss", $first_name, $middle_name, $last_name, $age, $email, $address, $job, $contact_method, $allergies, $allergy_details, $previous_pets, $pet_experiences, $reason, $pet_id, $pet_name);

    if ($stmt->execute()) {
        header("Location: adoption_success.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
