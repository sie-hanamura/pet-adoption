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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO adoptions (pet_name, pet_type, breed, age, gender, spayed_neutered, vaccination_status, health_issues, behavioral_traits, reason, owner_name, email, phone, address, contact_method, adoption_conditions, additional_notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssisssssssssssss", $pet_name, $pet_type, $breed, $age, $gender, $spayed_neutered, $vaccination_status, $health_issues, $behavioral_traits, $reason, $owner_name, $email, $phone, $address, $contact_method, $adoption_conditions, $additional_notes);

// Set parameters and execute
$pet_name = $_POST['pet-name'];
$pet_type = $_POST['pet-type'];
$breed = $_POST['breed'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$spayed_neutered = $_POST['spayed-neutered'];
$vaccination_status = $_POST['vaccination-status'];
$health_issues = $_POST['health-issues'];
$behavioral_traits = $_POST['behavioral-traits'];
$reason = $_POST['reason'];
$owner_name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$contact_method = $_POST['contact-method'];
$adoption_conditions = $_POST['adoption-conditions'];
$additional_notes = $_POST['additional-notes'];

// Display a success message
echo "<script>alert('Your form has been successfully submitted!');</script>";

// Display a success message
echo "<script>alert('Your form has been successfully submitted!'); window.location.href = 'home.php';</script>";

$stmt->close();
$conn->close();
?>
