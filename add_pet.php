<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
    <link rel="stylesheet" type="text/css" href="admin-dashboard.css">
</head>
<body>
    <div class="dashboard">
        <h2>Add a New Pet</h2>
        <a href="admin_dashboard.php" class="back-btn">Back to Dashboard</a><br><br>
        <form action="add_pet.php" method="post" enctype="multipart/form-data" class="add-pet-form">
            <input type="text" name="name" placeholder="Name" required><br><br>
            <input type="text" name="breed" placeholder="Breed" required><br><br>
            <input type="number" name="age" placeholder="Age" required><br><br>
            <select name="type" required>
                <option value="Cat">Cat</option>
                <option value="Dog">Dog</option>
            </select><br><br>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            <textarea name="description" placeholder="Description" required></textarea><br><br>
            <input type="file" name="image" id="imageInput" onchange="previewImage(event)" required><br><br>
            <img src="" id="previewImage" alt="Preview" style="max-width: 200px; display: none;"><br><br>
            <button type="submit" name="submit">Add Pet</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $petName = $_POST['name'];
            $petType = $_POST['type'];
            $petDescription = $_POST['description'];
            $petBreed = $_POST['breed'];
            $petAge = $_POST['age'];
            $petGender = $_POST['gender'];
            $targetDir = "resources/";
            $targetFile = $targetDir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if image file is an actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check === false) {
                die("File is not an image.");
            }

            // Check file size
            if ($_FILES["image"]["size"] > 500000) {
                die("Sorry, your file is too large.");
            }

            // Allow certain file formats
            if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }

            // Check if file already exists
            if (file_exists($targetFile)) {
                die("Sorry, file already exists.");
            }

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                die("Sorry, there was an error uploading your file.");
            }

            // Save to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "adoption-site";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepared statement to prevent SQL injection
            $sql = $conn->prepare("INSERT INTO pets (name, type, description, image, breed, age, gender) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("sssssis", $petName, $petType, $petDescription, $targetFile, $petBreed, $petAge, $petGender);
            if ($sql->execute()) {
                echo "New pet added successfully";
            } else {
                echo "Error: " . $sql->error;
            }

            $sql->close();
            $conn->close();
        }
        ?>
    </div>
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
</body>
</html>
