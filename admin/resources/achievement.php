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
            #achievement {
                background-color: #f9f9f9;
                padding: 50px 0;
                text-align: center;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                text-align: center;
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
                color: #000;
            }
            .achievement-button {
                text-align: center;
                padding: 50px;
            }
            .achievement-button button {
                padding: 10px 30px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }
            .achievement-button button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    
    <body>
        <section id="achievement" class="achievement">
            <div class="container">
                <p>Find Out About My </p>
                <h1 class="section-heading"><span>Achievements</span></h1>
                <?php
                    $length = count($achievement_data);
                    for ($i = $length - 1; $i >= 0; $i--) {
                        $achievement = $achievement_data[$i];
                    ?>
                        <div class="slide">
                            <img src="<?= $achievement["icon"] ?>" alt="">
                            <span class="achievement-title"><?= $achievement["title"] ?></span>
                            <p><?= $achievement["details"] ?></p>
                        </div>
                    <?php
                    }
                ?>
            </div>
            <div class="achievement-button">
                <button onclick="window.location.href='../crud/update_achievement.php'">Update Achievements</button>
            </div>
        </section>
    </body>
</html>
