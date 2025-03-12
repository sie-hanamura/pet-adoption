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

$application_id = $_GET['id'];

// Get applicant's email from the database
$sql_email = "SELECT email FROM adoption_applications WHERE id = $application_id";
$result = $conn->query($sql_email);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];

    // Update application status to 'Accepted'
    $sql = "UPDATE adoption_applications SET status = 'Accepted' WHERE id = $application_id";
    if ($conn->query($sql) === TRUE) {
        // Send Email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'iceblake29@gmail.com'; // Your Gmail
            $mail->Password = 'gxju lusj atmv hcky'; // Your App Password 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('iceblake29@gmail.com', 'Adoption Site');
            $mail->addAddress($email);

            $mail->isHTML(true);
                $mail->Subject = 'Congratulations! Your Adoption Application Has Been Approved';

                $mail->Body = "
                    <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 10px; max-width: 600px; margin: auto;'>
                        <div style='text-align: center;'>
                            <h2 style='color:rgb(206, 115, 36);'>Your Adoption Application Has Been Approved! 🎉</h2>
                        </div>
                        <p>Dear Applicant,</p>
                        <p>We are thrilled to inform you that your adoption application has been <b style='color:rgb(206, 115, 36);'>approved</b>! 🐶🐱</p>
                        <p>Our team will reach out to you soon with the next steps to finalize the adoption process.</p>
                        <p>If you have any questions, feel free to contact us at <a href='mailto:support@pawsitivepartners.com'>support@pawsitivepartners.com</a>.</p>
                
                        <p style='font-size: 12px; color: #777; text-align: center; margin-top: 20px;'>Thank you for choosing Pawsitive Partners! ❤️</p>
                    </div>";


            $mail->send();
            echo "<script>
                alert('Approval email sent successfully to $email');
                window.location.href = '../admin_dashboard.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
                alert('Email could not be sent. Error: {$mail->ErrorInfo}');
                window.location.href = '../admin_dashboard.php';
            </script>";
        }
    } else {
        echo "Error updating application status: " . $conn->error;
    }
} else {
    echo "Error: Application not found.";
}

$conn->close();
?>
