<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PawsitivePartners</title>
    <link rel="stylesheet" href="C:\xampp\htdocs\petwebsite\Pet-Adoption-and-Care-main\styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Logo-1.png">
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <main style="background-color: rgb(251, 245, 235);">
    <section class="hero" style="background-image: url('resources/meow.jpg'); background-size: cover; background-position: center; height: 500px; display: flex; flex-direction: column; justify-content: center; align-items: center; color: #8B0000; text-align: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            <div class="hero-content">
                <h1>Adopt, Don't Shop</h1>
                <p>Give a loving home to a furry companion and change a life forever.</p>
                <a href="adopt.php"><button>Adopt Now</button></a>
                <a href="pet-care.php"><button>Rehome Your Pet</button></a>
            </div>
        </section>
 
        <section class="featured-pets">
            <h2>Featured Pets</h2>
            <div class="pet-cards">
                <div class="pet-card">
                    <a href="#" onclick="adoptPet(2)"><img src="resources/aspindog.jpg" alt="Featured Pet 1"></a>
                    <h3>Hulfy</h3>
                    <p>Aspin Dog</p>
                    <p>Age: 3</p>
                    <p>Gender: Male</p>
                    <a href="#" onclick="adoptPet(2)" class="adopt-btn">Adopt Me</a>
                </div>
                <div class="pet-card">
                    <a href="#" onclick="adoptPet(1)"><img src="resources/orange-cat.jpg" alt="Featured Pet 2"></a>
                    <h3>Lucy</h3>
                    <p>Orange Cat</p>
                    <p>Age: 2</p>
                    <p>Gender: Female</p>
                    <a href="#" onclick="adoptPet(1)" class="adopt-btn">Adopt Me</a>
                </div>
                <div class="pet-card">
                    <a href="#" onclick="adoptPet(3)"><img src="resources/labrador.jpg" alt="Featured Pet 3"></a>
                    <h3>Susu</h3>
                    <p>Age: 4</p>
                    <p>Gender: Male</p>
                    <a href="#" onclick="adoptPet(3)" class="adopt-btn">Adopt Me</a>
                </div>
            </div>
        </section>
        <section class="success-stories">
            <h2>Success Stories</h2>
            <div class="story-cards">
                <div class="story-card">
                    <a href="success-stories.php"><img src="resources/kate.jpg" alt="Success Story 2"></a>
                    <h3>A Second Chance</h3>
                    <p>Discover the heartwarming tale of a rescued pet's journey to a loving home.</p>
                    <a href="success-stories.php" class="read-more">Read More</a>
                </div>
            <div class="story-card">
                    <a href="success-stories.php"><img src="resources/guywithdog.jpg" alt="Success Story 1"></a>
                    <h3>The Pawfect Match</h3>
                    <p>Read how a family found their forever friend at Pawfect Pawtrails.</p>
                    <a href="success-stories.php" class="read-more">Read More</a>
                </div>
        </section>
 
        <section class="cta">
            <div class="cta-content">
                <h2>Help out out Pawfect Partners! :3</h2>
                <p>Become a part of our mission to find loving homes for every pet.</p>
                <a href="donate.php"><button>Donate Now</button></a>
                <a href="volunteer.php"><button>Get Involved</button></a>
            </div>
        </section>
    </main>

    <script src="main.js"></script>
    <script>
        // Function to check if the user is logged in
        function checkLoginStatus() {
            // Check the user's login status (this needs to be implemented server-side)
            const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            return isLoggedIn;
        }

        // Function to handle the "Adopt Me" button click event
        function adoptPet(petId) {
            if (checkLoginStatus()) {
                // Redirect to the pet details page if the user is logged in
                window.location.href = `pet-details.php?id=${petId}`;
            } else {
                // Redirect to the login page if the user is not logged in
                window.location.href = 'login.php';
            }
        }
    </script>
</body>
</html>
</body>
</html>

<?php include('footer.php'); ?>