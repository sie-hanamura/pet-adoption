<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption-site";

// Create connection using PDO
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check if user ID is provided
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bindParam(1, $user_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($result) {
        $user = $result;
    } else {
        $_SESSION['message'] = "User not found.";
        header("Location: manage_users.php");
        exit();
    }
} else {
    $_SESSION['message'] = "User ID not provided.";
    header("Location: manage_users.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $bday = $_POST['bday'];
    $role = $_POST['role'];
    $is_admin = isset($_POST['is_admin']) ? 1 : 0;

    // Update user details in the database
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ?, contact = ?, gender = ?, age = ?, bday = ?, role = ?, is_admin = ? WHERE id = ?");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);
    $stmt->bindParam(4, $contact);
    $stmt->bindParam(5, $gender);
    $stmt->bindParam(6, $age);
    $stmt->bindParam(7, $bday);
    $stmt->bindParam(8, $role);
    $stmt->bindParam(9, $is_admin);
    $stmt->bindParam(10, $user_id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "User details updated successfully.";
    } else {
        $_SESSION['message'] = "Failed to update user details.";
    }

    header("Location: ../admin_dashboard.php");
    exit();
}
?>

<!-- HTML form for editing user details -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="admin-dashboard.css">
    <!-- Include any additional styling -->
    <style>
        /* Additional CSS styling */
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .edit-user-form input[type="text"],
        .edit-user-form input[type="email"],
        .edit-user-form input[type="password"],
        .edit-user-form input[type="number"],
        .edit-user-form input[type="date"],
        .edit-user-form select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        .edit-user-form input[type="checkbox"] {
            margin-right: 5px;
        }

        .edit-user-form button {
            background-color: #b73100;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .edit-user-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <div class="edit-user-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $user_id); ?>" method="post">
                <input type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="Username" required>
                <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email" required>
                <input type="password" name="password" value="<?php echo $user['password']; ?>" placeholder="Password" required>
                <input type="text" name="contact" value="<?php echo $user['contact']; ?>" placeholder="Contact">
                <input type="text" name="gender" value="<?php echo $user['gender']; ?>" placeholder="Gender">
                <input type="number" name="age" value="<?php echo $user['age']; ?>" placeholder="Age">
                <input type="date" name="bday" value="<?php echo $user['bday']; ?>" placeholder="Birthday">
                <input type="text" name="role" value="<?php echo $user['role']; ?>" placeholder="Role">
                <label><input type="checkbox" name="is_admin" <?php if ($user['is_admin']) echo 'checked'; ?>> Is Admin</label>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
