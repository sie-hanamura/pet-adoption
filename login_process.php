<?php
session_start();

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

// Check if form data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, username, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the query
    $stmt->execute();
    $stmt->store_result();
    
    // Bind the result to variables
    $stmt->bind_result($id, $username, $hashed_password, $is_admin);

    if ($stmt->num_rows > 0) {
        // Fetch the result
        $stmt->fetch();
        
        // Debugging: Echo out hashed passwords for comparison
        echo "Hashed Password from Database: " . $hashed_password . "<br>";
        echo "Hashed Password from Input: " . password_hash($password, PASSWORD_DEFAULT) . "<br>";
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Start the session and set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['is_admin'] = $is_admin; // Store admin status in session
            $_SESSION['admin_id'] = $is_admin ? $id : null; // Set admin_id if user is admin
            if ($is_admin) {
                header("Location: admin_dashboard.php"); // Redirect admin to admin panel
            } else {
                header("Location: home.php"); // Redirect normal user to home page
            }
            exit();
        } 
        else {
            // Invalid password
            echo "Invalid password. Please try again.";
        }
    } else {
        // Invalid email
        echo "Invalid email. Please try again.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
