<?php
session_start();

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
        
        // Display a confirmation dialog
        if (!isset($_GET['confirm'])) {
            echo "<script>
                    if(confirm('Are you sure you want to delete this pet?')) {
                        window.location.href = 'delete_pet.php?id=$pet_id&confirm=true';
                    } else {
                        window.location.href = '../admin_dashboard.php';
                    }
                </script>";
            exit();
        }

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
