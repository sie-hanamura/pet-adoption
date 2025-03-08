<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Stories - Pawfect Pawtrails</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="success-stories-styles.css">
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
        <section class="stories-grid">
            <div class="story-card">
                <img src="resources/kate.jpg" alt="Story 1">
                <div class="story-content">
                    <h3>Kalis' Journey</h3>
                    <p>Discover the heartwarming tale of a rescued pet's journey to a loving home.</p>
                    <a href="#story1" class="btn">Read More >></a>
                </div>
            </div>
            <div class="story-card">
                <img src="resources/guywithdog.jpg" alt="Story 2">
                <div class="story-content">
                    <h3>Berrys' New Life</h3>
                    <p>Discover how Berry, an abandoned dog, was given a second chance at life and found a loving family.</p>
                    <a href="#story2" class="btn">Read More >></a>
                </div>
            </div>
            <div class="story-card">
                <img src="resources/rocky.jpg" alt="Story 3">
                <div class="story-content">
                    <h3>Rescuing Rocky</h3>
                    <p>Follow the inspiring story of Rocky, a puppy mill survivor who overcame adversity and found happiness.</p>
                    <a href="#story3" class="btn">Read More >></a>
                </div>
            </div>
        </section>

        </section>
            <div class="long-story-card" id="story1">
                <div class="long-story-content">
                    <h3>Kali's Journey</h3>
                    <p>Kali, a shy but affectionate tabby cat, found her forever home thanks to an online adoption application. After seeing her sweet face and reading her story on the adoption website, the Smith family knew she was the one.</p> <br>
                    <p>They completed the application, and within days, they were approved. Kali quickly adapted to her new home, enjoying cuddles and playtime.</p> <br>
                    <p>The Smiths couldn't be happier with their decision and cherish every moment with their new furry family member.</p><br>
                    <p>Kali now spends her days lounging in sunny spots and getting all the love she deserves.</p>
                </div>
                <img src="resources/kate.jpg" alt="Hulfy's Journey">
            </div>
            <div class="long-story-card" id="story2">
                <div class="long-story-content">
                    <h3>Berrys' New Life</h3>
                    <p>Berry, an abandoned Corgi, found a new lease on life through an online adoption application. </p> <br>
                    <p>Rescued and given a second chance, Berry’s charming personality and hopeful spirit caught the attention of Mark. </p> <br>
                    <p>Compelled by Berry’s story, Mark eagerly completed the adoption process. Within a week, Berry was welcomed into a loving home.</p> <br>
                    <p>The bond between them grew quickly, marked by joyful adventures and tender moments. </p> <br>
                    <p>Mark is overjoyed with his loyal companion, and Berry thrives on the love and care he receives.</p> <br>
                    <p>Now, Berry enjoys playful outings, cozy naps, and endless cuddles, truly living his best life with his forever family.</p>
                </div>
                <img src="resources/guywithdog.jpg" alt="Berrys' New Life">
            </div>
        
            <section class="share-story">
            <h2>Share Your Story</h2>
            <p>Have you adopted a pet from our shelter? We'd love to hear your story and share it with our community.<br/>Share now at <a id="slink" href="mailto:shareyourstory@pawfectpawtails.org">shareyourstory@pawfectpawtails.org</a></p>
        </section>
    </main>

    <script src="main.js"></script>
</body>
</html>

<?php include('footer.php'); ?>