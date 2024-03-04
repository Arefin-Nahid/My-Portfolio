<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Travelling</title>
        <style>
            .container-travelling p {
                text-align: center;
            }
            .card-wrapper-travelling {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
            }
            .card-travelling {
                background-color: #fff;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin: 20px;
                padding: 20px;
                text-align: center;
                width: calc(33.33% - 40px);
                max-width: 400px;
            }

            .card-travelling img {
                width: 100%; 
                height: auto; 
                margin-bottom: 20px;
            }
            .travelling-button {
                text-align: center;
                padding: 50px;
            }
            .travelling-button button {
                padding: 10px 30px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s ease;
            }
            .travelling-button button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>

        <?php
            include "../include/config.php";
            $sql = "SELECT * FROM `travelling`";
            $stmt = $pdo->query($sql);
            $travelling_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        
        <section id="travelling" class="travelling">
            <div class="container-travelling">
                <p>Check Out My</p>
                <h1 class="section-heading"><span>Travelling</span></h1>
                <div class="card-wrapper-travelling">
                    <?php foreach ($travelling_data as $data): ?>
                        <div class="card-travelling">
                            
                            <img src="<?= $data['icon'] ?>" alt="<?= $data['details'] ?>">
                            <div class="overlay">
                                <span><?= $data['details'] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="travelling-button">
                    <button onclick="window.location.href='../crud/update_travelling.php'">Update Travelling Info</button>
                </div>
            </div>
        </section>
    </body>
</html>
