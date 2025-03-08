<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoption-site";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pet = null;
if (isset($_GET['id'])) {
    $pet_id = intval($_GET['id']);
    $sql = "SELECT * FROM pets WHERE id = $pet_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        echo "No pet found!";
        exit;
    }
} else {
    echo "No pet selected!";
    exit;
}

$conn->close();
?>

<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pet['name']); ?> - Pet Details</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\petwebsite\Pet-Adoption-and-Care-main\styles.css">
    <link rel="stylesheet" href="adopt-styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Logo-1.png">
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Set background color for the entire page */
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            min-height: 100vh; /* Minimum height to cover the entire viewport */
        }

        .pet-details-section {
            background-color: #fff; /* Set background color for the pet details section */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }

        .pet-details-section .pet-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pet-details-section .pet-image img {
            max-width: 300px;
            height: auto;
        }

        .pet-details-section .pet-info {
            flex: 1;
            padding-left: 20px;
        }

        .adopt-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .adopt-btn:hover {
            background-color: #e65c3e;
        }

        #adoption-form {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin-top: 20px;
        }

        .pet-details-section {
    background-color: #fff; /* Set background color for the pet details section */
    padding: 40px; /* Increase padding for space around content */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 1000px; /* Increase maximum width */
    width: 80%; /* Set width to 80% of the viewport */
    margin: 0 auto; /* Center the section horizontally */
}

.pet-details-section .pet-details {
    display: flex;
    align-items: center;
}

.pet-details-section .pet-image {
    flex: 0 0 auto; /* Keep the image size fixed */
    margin-right: 40px; /* Increase margin for spacing */
}

.pet-details-section .pet-info {
    flex: 1;
}

.pet-details-section .pet-image img {
    max-width: 400px; /* Increase maximum width of the image */
    height: auto;
    border-radius: 10px;
}

.pet-details-section .pet-info h2 {
    color: #333;
    font-size: 28px; /* Increase font size */
    margin-bottom: 20px; /* Increase margin */
}

.pet-details-section .pet-description {
    margin-bottom: 30px; /* Increase margin */
}

.pet-details-section .pet-description p {
    margin-bottom: 15px; /* Increase margin */
    font-size: 18px; /* Increase font size */
    color: #555;
}

.pet-details-section .pet-description strong {
    color: #333;
}

.pet-details-section .adopt-btn {
    display: inline-block;
    padding: 15px 30px; /* Increase padding */
    font-size: 20px; /* Increase font size */
    background-color: #ff6347;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.pet-details-section .adopt-btn:hover {
    background-color: #e65c3e;
}
</style>


</head>
<body>
<main style="background-color: rgb(251, 245, 235);">
    <div class="container">
        <section class="pet-details-section">
            <div class="pet-details">
                <div class="pet-image">
                    <img src="<?php echo htmlspecialchars($pet['image']); ?>" alt="<?php echo htmlspecialchars($pet['name']); ?>">
                </div>
                <div class="pet-info">
                    <h2><?php echo htmlspecialchars($pet['name']); ?></h2>
                    <div class="pet-description">
                        <p><strong>Type:</strong> <?php echo htmlspecialchars($pet['type']); ?></p>
                        <p><strong>Breed:</strong> <?php echo htmlspecialchars($pet['breed']); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($pet['age']); ?> years</p>
                        <p><strong>Gender:</strong> <?php echo htmlspecialchars($pet['gender']); ?></p>
                    </div>
                    <p><?php echo htmlspecialchars($pet['description']); ?></p>
                    <a href="#adoption-form" class="adopt-btn">Adopt Me</a>
                </div>
            </div>
        </section>
    </div>

        <div id="adoption-form">
            <h2>Adoption Form</h2>
            <p>Provide a pet a new loving home by filling out the form below.</p>
            <form action="process_adoption.php" method="post">
                <div class="form-group">
                    <label for="first-name">First Name:</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>
                <div class="form-group">
                    <label for="middle-name">Middle Name:</label>
                    <input type="text" id="middle-name" name="middle-name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name:</label>
                    <input type="text" id="last-name" name="last-name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" id="job" name="job" required>
                </div>
                <div class="form-group">
                    <label for="contact-method">Preferred Contact Method:</label>
                    <select id="contact-method" name="contact-method" required>
                        <option value="">Select</option>
                        <option value="email">Email</option>
                        <option value="phone">Phone</option>
                        <option value="either">Either</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="allergies">Allergies</label>
                    <select id="allergies" name="allergies" required>
                        <option value="none">None</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div class="form-group" id="allergy-details" style="display: none;">
                    <label for="allergy-details">Allergy Details</label>
                    <textarea id="allergy-details" name="allergy-details"></textarea>
                </div>
                <div class="form-group">
                    <label for="previous-pets">Have you had pets before?</label>
                    <select id="previous-pets" name="previous-pets" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pet-experiences">Past experiences with pets</label>
                    <textarea id="pet-experiences" name="pet-experiences" required></textarea>
                </div>
                <div class="form-group">
                    <label for="reason">Reason for Adoption (Optional)</label>
                    <textarea id="reason" name="reason"></textarea>
                </div>
                <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>">
                <input type="hidden" name="pet_name" value="<?php echo htmlspecialchars($pet['name']); ?>">
                <button type="submit" class="btn">Submit Application</button>
                <script>
                    // Show/hide allergy details based on the selection
                    document.getElementById('allergies').addEventListener('change', function() {
                        var allergyDetails = document.getElementById('allergy-details');
                        if (this.value === 'yes') {
                            allergyDetails.style.display = 'block';
                        } else {
                            allergyDetails.style.display = 'none';
                        }
                    });
                </script>
                </form>
        </div>
    </main>

<script src="main.js"></script>
</body>
</html>

