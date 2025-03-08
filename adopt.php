<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt - Pawfect Pawtrails</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="adopt-styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Pawfect Pawtrails-4.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <main style="background-color: rgb(251, 245, 235);">
        <section class="adopt-section">
            <h1>Adopt a Pet</h1>
            <p>Give a loving home to a furry companion and change a life forever.</p>
 
            <div class="adopt-steps">
                <div class="step">
                    <img src="resources/browse.png" alt="Browse Icon">
                    <h3>Browse Pets</h3>
                    <p>Search for your perfect match by browsing our available pets.</p>
                    <a href="browse-pets.php" class="btn">Browse Pets</a>
                </div>
                <div class="step">
                    <img src="resources/apply.png" alt="Apply Icon">
                    <h3>Apply to Adopt</h3>
                    <p>Complete our online application form to begin the adoption process.</p>
                    <a href="#adoption-form" class="btn">Apply Now</a>
                </div>
                <div class="step">
                    <h3>Adoption Process</h3>
                    <p>Check out our FAQ and Adoption Process to learn how adoption works!</p>
                    <a href="info/adoption-process.php" class="btn">Learn More</a><br>
                    <br>
                    <a href="info/adoption-process.php" class="btn">FAQs</a>
                </div>
            </div>
        </section>
    </main>
 
    <script src="main.js"></script>
</body>
</html>

<?php include('footer.php'); ?>