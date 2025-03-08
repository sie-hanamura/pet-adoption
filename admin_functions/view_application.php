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
    $application_id = $_GET['id'];

    // Fetch the application details from the database
    $stmt = $conn->prepare("SELECT * FROM adoption_applications WHERE id = :id");
    $stmt->bindParam(':id', $application_id, PDO::PARAM_INT);
    $stmt->execute();
    $application = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($application) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Adoption Application Details</title>
            <link rel="stylesheet" href="../admin-dashboard.css">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                    margin: 0;
                    padding: 0;
                }

                .container {
                    max-width: 600px;
                    margin: 50px auto;
                    padding: 20px;
                    background-color: #fff;
                    border-radius: 8px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }

                h1, h2 {
                    text-align: center;
                    margin-bottom: 20px;
                    color: #333;
                }

                .details, .edit-pet-form {
                    margin-top: 20px;
                }

                .details p, .edit-pet-form input[type="text"],
                .edit-pet-form input[type="number"],
                .edit-pet-form textarea,
                .edit-pet-form input[type="file"],
                .edit-pet-form select {
                    width: calc(100% - 20px);
                    padding: 10px;
                    margin: 10px 0;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    box-sizing: border-box;
                    font-size: 16px;
                    font-family: Arial, sans-serif;
                }

                .details p {
                    font-size: 18px;
                    color: #555;
                }

                .details img, .edit-pet-form img {
                    max-width: 100%;
                    height: auto;
                    border-radius: 8px;
                    margin: 20px 0;
                }

                .details strong, .edit-pet-form strong {
                    color: #333;
                }

                .details textarea {
                    resize: vertical;
                }

                .edit-pet-form button, .button {
                    background-color: #b73100;
                    color: #fff;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                    width: 100%;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    margin-top: 10px;
                }

                .edit-pet-form button:hover, .button:hover {
                    background-color: #392c6b;
                }

                .action-buttons {
                    display: flex;
                    align-content: middle;
                    width:200px;
                    padding: 10px 8px;
                    justify-content: space-between;
                    margin-top: 20px;
                }

                .button {
                    background-color: #b73100;
                    width:550px;
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
                    background-color: #392c6b;
                }

                .button.reject {
                    background-color: #dc3545;
                }

                .button.reject:hover {
                    background-color: #c82333;
                }

                .button.accept {
                    background-color: #28a745;
                }

                .button.accept:hover {
                    background-color: #218838;
                }

                .back-button {
                    display: block;
                    text-align: center;
                    margin-top: 20px;
                    background-color: #007bff;
                }

                .back-button:hover {
                    background-color: #0056b3;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>Adoption Application Details</h1>
                <div class="details">
                    <p><strong>Applicant Name:</strong> <?php echo htmlspecialchars($application['first_name'] . " " . $application['middle_name'] . " " . $application['last_name']); ?></p>
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($application['age']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($application['email']); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($application['address']); ?></p>
                    <p><strong>Job:</strong> <?php echo htmlspecialchars($application['job']); ?></p>
                    <p><strong>Contact Method:</strong> <?php echo htmlspecialchars($application['contact_method']); ?></p>
                    <p><strong>Allergies:</strong> <?php echo htmlspecialchars($application['allergies']); ?></p>
                    <p><strong>Allergy Details:</strong> <?php echo htmlspecialchars($application['allergy_details']); ?></p>
                    <p><strong>Previous Pets:</strong> <?php echo htmlspecialchars($application['previous_pets']); ?></p>
                    <p><strong>Pet Experiences:</strong> <?php echo htmlspecialchars($application['pet_experiences']); ?></p>
                    <p><strong>Reason for Adoption:</strong> <?php echo htmlspecialchars($application['reason']); ?></p>
                    <p><strong>Pet Name:</strong> <?php echo htmlspecialchars($application['pet_name']); ?></p>
                    <p><strong>Created At:</strong> <?php echo htmlspecialchars($application['created_at']); ?></p>
                    <?php if (!empty($application['image_path'])): ?>
                        <p><strong>Uploaded Image:</strong></p>
                        <img src="<?php echo htmlspecialchars('../uploads/' . $application['image_path']); ?>" alt="Uploaded Image">
                    <?php endif; ?>
                </div>
                <div class="action-buttons">
                    <a href="reject_application.php?id=<?php echo $application_id; ?>" class="button reject">Reject</a>
                    <a href="approve_application.php?id=<?php echo $application_id; ?>" class="button accept">Accept</a>
                </div>
                <a href="../admin_dashboard.php" class="button">Back to Dashboard</a>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "<p>No application found with the provided ID.</p>";
    }
} else {
    echo "<p>Invalid application ID.</p>";
}
?>
