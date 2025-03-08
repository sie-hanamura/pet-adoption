<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../login.php");
    exit();
}

try {
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adoption-site";

    // Create connection using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $pet_id = intval($_GET['id']);
        
        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM pets WHERE id = :id");
        $stmt->bindParam(':id', $pet_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['message'] = "Pet deleted successfully.";
        } else {
            $_SESSION['message'] = "Failed to delete the pet.";
        }
    } else {
        $_SESSION['message'] = "Invalid pet ID.";
    }
} catch (PDOException $e) {
    $_SESSION['message'] = "Connection failed: " . $e->getMessage();
}

header("Location: ../admin_dashboard.php");
exit();
?>
