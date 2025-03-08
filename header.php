<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, generate HTML for Logout
    $accountLink = '<li><a href="logout.php">Logout</a></li>';
    $signInLink = '';
} else {
    // User is not logged in, generate HTML for Sign In
    $accountLink = '';
    $signInLink = '<li><a href="login.php">Sign In</a></li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Title</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Logo-1.png">
</head>
<style>
    nav ul {
    display: flex;
    list-style: none;
        }

        nav ul li {
            margin-left: 20px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        nav ul li:hover, .dropdown-content a:hover {
            transform: scale(1.01);
            align-items: center;
        }

        nav ul li a {
            font-size: 17px;
            color: #b73100;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a::selection, .dropdown-link img::selection, .dropdown::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }

        nav ul li a:hover {
            color: #392C6B;
        }
</style>
<body>
    <header>
        <div class="header-container">
            <a href="home.php">
                <div class="logo-section">
                    <img id="paw" src="resources/Logo-1.png" alt="logo">
                    <img id="paw2" src="resources/Logo-2.png" alt="logo">
                </div>
            </a>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="browse-pets.php">Browse Pets</a></li>
                    <li><a href="adopt.php">Adopt</a></li>
                    <li><a href="success-stories.php">Success Stories</a></li>
                    <li><a href="pet-care.php">Rehome a Pet</a></li>
                    <li><a href="donate.php">Donate</a></li>
                    <?php echo $accountLink; ?>
                    <?php echo $signInLink; ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Other content goes here -->
</body>
</html>
