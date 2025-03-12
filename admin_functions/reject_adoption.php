<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

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

// Get donor's email from the database
$sql_email = "SELECT email FROM adoptions WHERE id = $adoption_id";
$result = $conn->query($sql_email);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // Update adoption status to 'Rejected' in the database
    $sql = "UPDATE adoptions SET status = 'Rejected' WHERE id = $adoption_id";
    if ($conn->query($sql) === TRUE) {
        // Send Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'iceblake29@gmail.com'; // Your Gmail
            $mail->Password = 'gxju lusj atmv hcky'; // Your App Password (RESET IT ASAP)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('iceblake29@gmail.com', 'Adoption Site');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Adoption Listing Rejected';
            $mail->Body = "
                <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 10px; max-width: 600px; margin: auto;'>
                    <div style='text-align: center;'>
                        <h2 style='color:red;'>Your Adoption Listing Has Been Rejected</h2>
                    </div>
                    <p>Dear Pet Donor,</p>
                    <p>We regret to inform you that your adoption listing has been <b style='color:red;'>rejected</b> at this time.</p>
                    <p>There may be various reasons for this decision, including incomplete information, eligibility issues, or other concerns.</p>
                    <p>If you would like more details or wish to make changes to your submission, feel free to contact us at <a href='mailto:support@pawsitivepartners.com'>support@pawsitivepartners.com</a>.</p>
                    <p>Thank you for your understanding.</p>
                    <p style='font-size: 12px; color: #777; text-align: center; margin-top: 20px;'>Pawsitive Partners Adoption Team 🐾</p>
                </div>";

            $mail->send();
            echo "<script>
                alert('Rejection email sent successfully to $email');
                window.location.href = '../admin_dashboard.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
                alert('Email could not be sent. Error: {$mail->ErrorInfo}');
                window.location.href = '../admin_dashboard.php';
            </script>";
        }
    } else {
        echo "Error updating adoption status: " . $conn->error;
    }
} else {
    echo "Error: Adoption listing not found.";
}

// Close the database connection
$conn->close();
?>
