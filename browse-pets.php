<?php include('header.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Pets - Pawfect Pawtrails</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="browse-pets-styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Pawfect Pawtrails-4.png">
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }
        .pet-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .pet-card {
            width: 30%;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
        .pet-card img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .adopt-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f76c6c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <main style="background-color: rgb(251, 245, 235);">
        <section class="browse-pets">
            <section class="heroo">
                <div class="hero-container">
                    <h1>Browse Pets</h1>
                    <div class="hero-buttons">
                        <a href="#dogs"><button>Dogs</button></a>
                        <a href="#cats"><button>Cats</button></a>
                    </div>
                </div>
            </section>

            <div class="pet-listings">
                <h2 id="dogs">Dogs</h2>
                <div class="pet-grid" id="dogs">
                </div>

                <h2 id="cats">Cats</h2>
                <div class="pet-grid" id="cats">
                </div>
            </div>
        </section>
    </main>

    <script>
        // Function to check if the user is logged in
        function checkLoginStatus() {
            // Check the user's login status
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


        // Function to fetch and update pet listings
        function updatePetListings() {
            fetch('fetch_pet_data.php')
                .then(response => response.json())
                .then(data => {
                    updatePetSection(data.cats, 'cats');
                    updatePetSection(data.dogs, 'dogs');
                })
                .catch(error => console.error('Error fetching pet data:', error));
        }

        // Function to update pet listings section
        function updatePetSection(pets, sectionId) {
            const petListings = document.getElementById(sectionId);
            petListings.innerHTML = '';

            let petCards = '';
            pets.forEach((pet, index) => {
                petCards += `
                    <div class="pet-card">
                        <img src="${pet.image}" alt="${pet.name}">
                        <h3>${pet.name}</h3>
                        <p>Age: ${pet.age}</p>
                        <p>Breed: ${pet.breed}</p>
                        <p>Gender: ${pet.gender}</p>
                        <a href="#" onclick="adoptPet(${pet.id})" class="adopt-btn">Adopt Me</a>
                    </div>
                `;

                if ((index + 1) % 3 === 0) {
                    petCards += '</div><div class="pet-grid">';
                }
            });

            petListings.innerHTML = '<div class="pet-grid">' + petCards + '</div>';
        }

        // Call the function to update pet listings initially
        updatePetListings();
    </script>
</body>
</html>

<?php include('footer.php'); ?>