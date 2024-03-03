<?php
    include "../include/config.php";
    $sql = "SELECT * FROM `timeline`";
    $stmt = $pdo->query($sql);
    $timeline_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Timeline</title>
        <style>
            #timeline {
                background-color: #f9f9f9;
                padding: 50px 0;
            }
            .section-heading {
                text-align: center;
                margin-bottom: 50px;
            }
            .card-wrapper_timeline {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around; 
            }
            .card_timeline {
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin: 20px;
                padding: 20px;
                text-align: center;
                width: calc(50% - 40px); 
                max-width: 300px;
            }
            .card_timeline img {
                width: 50px; 
                height: 50px; 
                margin: 0 auto 20px;
                display: block;
            }

            .card_timeline h2 {
                font-size: 1.5rem;
                margin-bottom: 10px;
            }

            .card_timeline p {
                font-size: 1rem;
                color: #888;
                margin-bottom: 10px;
            }

            .card_timeline h3 {
                font-size: 1.2rem;
                color: #555;
                font-weight: bold;
            }
            .update-timeline-button {
                text-align: center;
                margin-top: 50px;
            }
            .update-timeline-button button {
                padding: 10px 50px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }
            .update-timeline-button button :hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <section id="timeline" class="timeline">
            <div class="container">
                <h1 class="section-heading">Explore My <span>Timeline</span></h1>
                <div class="card-wrapper_timeline">
                <?php
                    $total_items = count($timeline_data);
                    for ($i = $total_items - 1; $i >= 0; $i--) {
                        $data = $timeline_data[$i];
                ?>
                        <div class="card_timeline">
                            <img src="<?=$data["icon"]?>" alt="">
                            <h2><?=$data["degree"]?></h2>
                            <p><?=$data["institude"]?></p>
                            <h3><?=$data["passing_year"]?></h3>
                        </div>
                <?php
                    }
                ?>
                </div>
            </div>
            <div class="update-timeline-button">
                <button onclick="window.location.href='../crud/update_timeline.php'">Update Timeline Info</button>
            </div>
        </section>
    </body>
</html>
