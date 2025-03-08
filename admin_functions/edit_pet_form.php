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

// Check if the ID parameter is passed in the URL
if (!isset($_GET['id'])) {
    echo "Pet ID is missing.";
    exit;
}

// Fetch pet details from the database based on the ID passed in the URL
$pet_id = $_GET['id'];
$sql = "SELECT * FROM pets WHERE id='$pet_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pet</title>
    <link rel="stylesheet" href="admin-dashboard.css">
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .edit-pet-form {
            margin-top: 20px;
        }

        .edit-pet-form input[type="text"],
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

        .edit-pet-form textarea {
            resize: vertical;
        }

        .edit-pet-form button {
            background-color: #b73100;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .edit-pet-form button:hover {
            background-color: #392c6b;
        }

        .edit-pet-form select {
            background-color: #fff;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding-right: 20px;
            background-image: url('https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-down-b-512.png');
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 16px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pet</h2>
        <div class="edit-pet-form">
            <form action="edit_pet.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="pet_id" value="<?php echo $row['id']; ?>">
                <input type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Name" required>
                <input type="text" name="breed" value="<?php echo $row['breed']; ?>" placeholder="Breed">
                <input type="number" name="age" value="<?php echo $row['age']; ?>" placeholder="Age">
                <textarea name="description" placeholder="Description"><?php echo $row['description']; ?></textarea>
                <select name="type">
                    <option value="Cat" <?php if($row['type'] == 'Cat') echo 'selected'; ?>>Cat</option>
                    <option value="Dog" <?php if($row['type'] == 'Dog') echo 'selected'; ?>>Dog</option>
                </select>
                <input type="file" name="image" accept="image/*">
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>


<?php
} else {
    echo "Pet not found";
}
?>
