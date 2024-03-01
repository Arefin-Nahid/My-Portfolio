<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Projects</title>
    <style>

        #projects {
            background-color: #f9f9f9;
            padding: 50px 0;
        }
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic styling for the section */
        .projects {
            padding: 50px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-heading span {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
        }

        .card-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 300px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 30px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .img-wrapper img {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-content h1 span {
            font-size: 18px;
            color: #666;
        }

        .card-content p {
            margin-bottom: 15px;
        }

        .card-content a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .card-content a:hover {
            background-color: #555;
        }

        /* Styling for the footer */
        
        #update-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 200px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        include "../include/config.php";
        $sql = "SELECT * FROM `projects`";
        $stmt = $pdo->query($sql);
        $project_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section id="projects" class="projects">
        <div class="container">
            <h1 class="section-heading">Browse My Recent <span>Projects</span></h1>
            <div class="card-wrapper">
            <?php
    $total_projects = count($project_data);
    for ($i = $total_projects - 1; $i >= 0; $i--) {
        $data = $project_data[$i];
?>
        <div class="card">
            <div class="img-wrapper">
                <img src="<?=$data["icon"]?>" alt="">
            </div>
            <div class="card-content">
                <h1><?=$data["title"]?></h1>
                <h1><span><?=$data["year"]?></span></h1>
                <p><?=$data["details"]?></p>
                <a href="<?=$data["link"]?>" target="_blank"><?=$data["link_title"]?></a>
            </div>
        </div>
<?php
    }
?>

            </div>
        </div>
        <div class="container" id="update-container">
            <button id="update-button" onclick="location.href='../crud/update_project'">Update</button>
        </div>
    </section>
    
</body>
</html>
