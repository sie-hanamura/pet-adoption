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

// Fetch some statistics for the dashboard
$pets_count = $conn->query("SELECT COUNT(*) AS count FROM pets")->fetch_assoc()['count'];
$adoptions_count = $conn->query("SELECT COUNT(*) AS count FROM adoptions")->fetch_assoc()['count'];
$users_count = $conn->query("SELECT COUNT(*) AS count FROM users")->fetch_assoc()['count'];

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" type="icon/x-icon" href="resources/Logo-1.png">
    </head>
    <div class="header-container">
        <a href="home.php">
            <div class="logo-section">
                <img id="paw" src="resources/Logo-1.png" alt="logo">
                <img id="paw2" src="resources/Logo-2.png" alt="logo">
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="manage_pets.php">Manage Pets</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_adoptions.php">Manage Adoptions</a></li>
                <li><a href="manage_content.php">Manage Content</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="admin-dashboard.css">
    <style>
        
        body {
            background-color: rgb(251, 245, 235);
        }

        .dashboard {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            text-align: center;
        }

        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 40px;
        }

        .stat {
            flex: 1;
            margin: 0 10px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .stat:hover {
            transform: translateY(-5px);
        }

        .stat h3 {
            font-size: 20px;
            color: #8B0000;
            margin-bottom: 10px;
        }

        .stat p {
            font-size: 18px;
            color: #333;
            margin-bottom: 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-top: 20px;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            font-size: 17px;
            color: #b73100;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #392C6B;
        }

        .manage-adoption-applications-section {
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 40px;
        }

        .manage-adoption-applications-section h2 {
            font-size: 24px;
            color: #8B0000;
            margin-bottom: 20px;
        }

        .adoption-applications-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .adoption-applications-list th,
        .adoption-applications-list td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .adoption-applications-list th {
            background-color: #f9f9f9;
            color: #8B0000;
            font-weight: bold;
            text-align: left;
        }

        .adoption-applications-list td {
            color: #333;
        }

        .adoption-applications-list td a {
            color: #b73100;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .adoption-applications-list td a:hover {
            color: #392C6B;
        }

    </style>
</head>
<body>
    <div class="dashboard">
    <section class="hero-section">
        <h1>Admin Dashboard</h1>
        <div class="stats">
            <div class="stat">
                <h3>Total Pets</h3>
                <p><?php echo $pets_count; ?></p>
            </div>
            <div class="stat">
                <h3>Total Adoptions</h3>
                <p><?php echo $adoptions_count; ?></p>
            </div>
            <div class="stat">
                <h3>Total Users</h3>
                <p><?php echo $users_count; ?></p>
            </div>
        </div>
       <!-- Manage Pets Section -->
       <section class="manage-pets-section">
                <h2>Manage Pets</h2>
                <div class="add-pet-form">
                    <form action="add_pet.php" method="post" enctype="multipart/form-data">
                        
                        <button type="submit">Add Pet</button>
                    </form>

                    <script>
                        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('previewImage');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
                    </script>
                </div>
                <div class="pet-list">
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM pets WHERE type IN ('Cat', 'Dog')"; // Limit to Cat and Dog types
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['type'] . "</td>"; // Display the type of pet
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='width: 100px; height: auto;'></td>";
                                    echo "<td><a href='admin_functions/edit_pet_form.php?id=" . $row['id'] . "'>Edit</a> | <a href='admin_functions/delete_pet.php?id=" . $row['id'] . "'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No pets found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
            <section class="manage-users-section">
            <h2>Manage Users</h2>
            <div class="add-user-form">
                <!-- Form for adding a new user -->
            </div>
            <div class="user-list">
                <!-- Table to display existing users -->
                <table>
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch and display users from the database
                        $sql = "SELECT * FROM users";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
</section>

<section class="manage-adoptions-section">
            <h2>Manage Adoptions</h2>
            <div class="adoption-list">
                <table>
                    <thead>
                        <tr>
                            <th>Pet Name</th>
                            <th>Owner Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM adoptions";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['pet_name'] . "</td>";
                                echo "<td>" . $row['owner_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['phone'] . "</td>";
                                echo "<td>" . $row['reason'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>"; // Display the status column
                                echo "<td><a href='admin_functions/approve_adoption.php?id=" . $row['id'] . "'>Approve</a> | <a href='admin_functions/reject_adoption.php?id=" . $row['id'] . "'>Reject</a> | <a href='admin_functions/manage_adoption.php?id=" . $row['id'] . "'>View</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No adoptions found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

<section class="manage-adoption-applications-section">
            <h2>Manage Adoption Applications</h2>
            <div class="adoption-applications-list">
                <table>
                    <thead>
                        <tr>
                            <th>Applicant Name</th>
                            <th>Email</th>
                            <th>Pet Name</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM adoption_applications";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['pet_name'] . "</td>";
                                echo "<td>" . $row['reason'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>"; // Display status column
                                echo "<td><a href='admin_functions/approve_application.php?id=" . $row['id'] . "'>Approve</a> | <a href='admin_functions/reject_application.php?id=" . $row['id'] . "'>Reject</a> | <a href='admin_functions/view_application.php?id=" . $row['id'] . "'>View</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No applications found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>



</body>
</html>
