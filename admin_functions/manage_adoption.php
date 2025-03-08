<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption-site";

// Create connection using PDO
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $adoption_id = $_GET['id'];

    // Fetch the adoption details from the database
    $stmt = $conn->prepare("SELECT * FROM adoptions WHERE id = :id");
    $stmt->bindParam(':id', $adoption_id, PDO::PARAM_INT);
    $stmt->execute();
    $adoption = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($adoption) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Adoption Details</title>
            <link rel="stylesheet" href="../admin-dashboard.css">
            <style>
                body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            h1 {
                color: #333;
                text-align: center;
                margin-bottom: 20px;
            }

            .details {
                margin: 20px 0;
            }

            .details p {
                font-size: 18px;
                color: #555;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
            }

            .details strong {
                color: #333;
            }

            .details input[type="text"],
            .details input[type="number"],
            .details input[type="email"],
            .details textarea {
                width: calc(100% - 20px);
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
                font-size: 16px;
                font-family: Arial, sans-serif;
            }

            .details textarea {
                resize: vertical;
            }

            .details img {
                max-width: 100%;
                height: auto;
                border-radius: 8px;
                margin: 20px 0;
            }

            .back-button {
                display: block;
                width: 200px;
                margin: 20px auto;
                padding: 10px;
                text-align: center;
                background-color: #007bff;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s;
            }

            .back-button:hover {
                background-color: #0056b3;
            }

            .action-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 30px;
            }

            .button {
                background-color: #28a745;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                text-align: center;
                text-decoration: none;
                flex: 1;
                margin: 0 10px;
            }

            .button:hover {
                background-color: #218838;
            }

            .button.reject {
                background-color: #dc3545;
            }

            .button.reject:hover {
                background-color: #c82333;
            }


            </style>
        </head>
        <body>
        <div class="container">
            <h1>Adoption Details</h1>
            <div class="details">
                <p><strong>Pet Name:</strong> <?php echo htmlspecialchars($adoption['pet_name']); ?></p>
                <p><strong>Pet Type:</strong> <?php echo htmlspecialchars($adoption['pet_type']); ?></p>
                <p><strong>Breed:</strong> <?php echo htmlspecialchars($adoption['breed']); ?></p>
                <p><strong>Age:</strong> <?php echo htmlspecialchars($adoption['age']); ?></p>
                <p><strong>Gender:</strong> <?php echo htmlspecialchars($adoption['gender']); ?></p>
                <p><strong>Spayed/Neutered:</strong> <?php echo htmlspecialchars($adoption['spayed_neutered']); ?></p>
                <p><strong>Vaccination Status:</strong> <?php echo htmlspecialchars($adoption['vaccination_status']); ?></p>
                <p><strong>Health Issues:</strong> <?php echo htmlspecialchars($adoption['health_issues']); ?></p>
                <p><strong>Behavioral Traits:</strong> <?php echo htmlspecialchars($adoption['behavioral_traits']); ?></p>
                <p><strong>Reason for Adoption:</strong> <?php echo htmlspecialchars($adoption['reason']); ?></p>
                <p><strong>Owner Name:</strong> <?php echo htmlspecialchars($adoption['owner_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($adoption['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($adoption['phone']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($adoption['address']); ?></p>
                <p><strong>Contact Method:</strong> <?php echo htmlspecialchars($adoption['contact_method']); ?></p>
                <p><strong>Adoption Conditions:</strong> <?php echo htmlspecialchars($adoption['adoption_conditions']); ?></p>
                <p><strong>Additional Notes:</strong> <?php echo htmlspecialchars($adoption['additional_notes']); ?></p>
                <p><strong>Registration Date:</strong> <?php echo htmlspecialchars($adoption['reg_date']); ?></p>
            </div>
            <div class="action-buttons">
                <a href="reject_adoption.php?id=<?php echo $adoption_id; ?>" class="button reject">Reject</a>
                <a href="approve_adoption.php?id=<?php echo $adoption_id; ?>" class="button accept">Accept</a>
            </div>
            <a href="../admin_dashboard.php" class="back-button">Back to Dashboard</a>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "<p>No adoption found with the provided ID.</p>";
    }
} else {
    echo "<p>Invalid adoption ID.</p>";
}
?>
