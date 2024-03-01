            <?php
                include "../include/config.php";
                $sql = "SELECT * FROM `achievements`";
                $stmt = $pdo->query($sql);
                $achievement_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achievements</title>
    <style>
        /* styles.css */

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center; /* Center align content */
        }

        .section-heading {
            text-align: center;
        }

        .slide {
            display: inline-block;
            width: 300px;
            margin: 20px;
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .slide img {
            max-width: 100%;
            height: auto;
        }

        .achievement-title {
            font-weight: bold;
            color: #000; /* You can adjust the color as per your preference */
        }

        #updateButton {
            display: block;
            margin: 20px auto; /* Center align button */
        }

    </style>
</head>
<body>
    <section id="achievement" class="achievement">
        <div class="container">
            <p>Find Out About My </p>
            <h1 class="section-heading"><span>Achievements</span></h1>
            <?php foreach ($achievement_data as $achievement): ?>
                <div class="slide">
                    <img src="<?=$achievement["icon"]?>" alt="">
                    <span class="achievement-title"><?=$achievement["title"]?></span>
                    <p><?=$achievement["details"]?></p>
                </div>
            <?php endforeach; ?>
            <button id="updateButton">Update Achievements</button>
        </div>
    </section>
</body>
</html>
