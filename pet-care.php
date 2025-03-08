<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care - Pawfect Pawtrails</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="pet-care-styles.css">
    <link rel="icon" type="icon/x-icon" href="resources/Pawfect Pawtrails-4.png">
    <style>
        *::selection {
            background-color: #3d3d3d;
            color: whitesmoke;
        }
    </style>
</head>
<body style="background-color: rgb(251, 245, 235);">
    <main>
    <section class="heroo">
    <div class="hero-container">
        <h1>Your Pet. Our Care</h1>
        <div class="hero-buttons">
            <a href="#adoption-form"><button>Give your pet a new Home.</button></a>
        </div>
    </div>
</section>

<section id="adoption-form" class="book-vet">
    <h2>Set Your Pet Up for Adoption</h2>
    <p>Provide your pet a new loving home by filling out the form below.</p>
    <div class="form-container">
    <form method="POST" action="submit_adoption.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pet-name">Pet's Name:</label>
            <input type="text" id="pet-name" name="pet-name" required>
        </div>
        <div class="form-group">
            <label for="pet-type">Pet Type:</label>
            <select id="pet-type" name="pet-type" required>
                <option value="">Select</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required min="0">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="spayed-neutered">Spayed/Neutered:</label>
            <div class="radio-group">
                <label class="inline-label">
                    <input type="radio" id="spayed" name="spayed-neutered" value="yes" required> Yes
                </label>
                <label class="inline-label">
                    <input type="radio" id="not-spayed" name="spayed-neutered" value="no"> No
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="vaccination-status">Vaccination Status:</label>
            <div class="radio-group">
                <label class="inline-label">
                    <input type="radio" id="up-to-date" name="vaccination-status" value="up-to-date" required> Up to date
                </label>
                <label class="inline-label">
                    <input type="radio" id="not-up-to-date" name="vaccination-status" value="not-up-to-date"> Not up to date
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="health-issues">Health Issues:</label>
            <textarea id="health-issues" name="health-issues" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="behavioral-traits">Behavioral Traits:</label>
            <textarea id="behavioral-traits" name="behavioral-traits" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="reason">Reason for Adoption:</label>
            <textarea id="reason" name="reason" rows="3" required></textarea>
        </div>
        <h3>Owner Information</h3>
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>
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
            <label for="contact-method">Preferred Contact Method:</label>
            <select id="contact-method" name="contact-method" required>
                <option value="">Select</option>
                <option value="email">Email</option>
                <option value="phone">Phone</option>
                <option value="either">Either</option>
            </select>
        </div>
        <h3>Additional Information</h3>
        <div class="form-group">
            <label for="pet-photos">Upload Pet Photos:</label>
            <input type="file" id="pet-photos" name="pet-photos[]" multiple accept="image/*" onchange="previewImages()">
            <div id="preview-container"></div>
        </div>
        <div class="form-group">
            <label for="adoption-conditions">Preferred Adoption Conditions:</label>
            <textarea id="adoption-conditions" name="adoption-conditions" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="additional-notes">Any Additional Notes:</label>
            <textarea id="additional-notes" name="additional-notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn">Submit Adoption Form</button>
    </form>
</div>
</section>


<style>
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    .form-group {
        margin-bottom: 15px;
        text-align: center; /* Center form elements */
    }

    .inline-label {
        margin-right: 10px;
        display: inline-flex;
        align-items: center;
    }

    .inline-label input[type="radio"] {
        margin-right: 5px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    .form-group textarea {
        resize: vertical;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }

    #preview-container img {
        display: inline-block;
        margin-top: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }

    .radio-group {
        display: flex;
        justify-content: center;
        gap: 10px;
        align-items: center;
    }
</style>

</body>
</html>



