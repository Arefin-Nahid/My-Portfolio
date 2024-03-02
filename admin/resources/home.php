<?php 
    include "../include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Resetting default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
}

table td {
    padding: 50px;
}

/* Container styles */
.container {
    padding: 20px;
}

/* Flexbox utility classes */
.flex {
    display: flex;
}

.justify-center {
    justify-content: center;
}

.items-center {
    align-items: center;
}

.flex-1 {
    flex: 1;
}

/* Hero section styles */
.hero {
    margin-top: 20px;
}

.hero h1 {
    font-size: 40px;
    margin-bottom: 5px;
}

.hero h6 {
    font-size: 20px;
    color: #888;
}

.hero h2 {
    font-size: 30px;
    margin-top: 5px;
}

/* About section styles */


.social {
    margin-top: 20px;
}

.social a {
    margin-right: 10px;
}
.social img {
            width: 30px; /* Reduced size of social media icons */
            height: 30px;
        }
/* Button styles */
        .about-button {
            text-align: center;
        }

        .about-button button {
            padding: 10px 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .about-button button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <table border="1"> <!-- Added border attribute -->
        <tr>
            <td>
                <div class="left flex-1 flex justify-center">
                    <?php
                    $sql = "SELECT * FROM `user` WHERE `user`.`id` = 1";
                    $stmt = $pdo->query($sql);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <img src="<?=$data['icon']?>" alt="" width="300px"> <!-- Set width to 300px -->
                </div>
            </td>
            <td>
                <div class="container">
                    <?php
                    $sql = "SELECT * FROM `user` WHERE `user`.`id` = 1";
                    $stmt = $pdo->query($sql);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="hero flex items-center justify-between">
                        <div class="right flex-1">
                            <h1><?=$data['full_name']?></h1>
                            <h6>And I’m a</h6>
                            <h2><span class="typing"></span>&nbsp;</h2>
                            <p><?=$data['subtitle']?></p>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="flex-1">
                    <?php
                    $sql = "SELECT * FROM `about` WHERE `about`.`id` = 1";
                    $stmt = $pdo->query($sql);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <img class="about-me-img" src="<?=$data["image"]?>" alt="" width="300px" height="auto"> <!-- Set width to 300px -->
                </div>
            </td>
            <td>
                <div class="container">
                    <?php
                    $sql = "SELECT * FROM `about` WHERE `about`.`id` = 1";
                    $stmt = $pdo->query($sql);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <h1>About <span>Me</span></h1>
                    <h3><?=$data['username']?></h3>
                    <p><?=$data['details']?></p>
                    <div class="social">
                        <?php if($data['linkedin']) { ?>
                            <a href="<?=$data["linkedin"]?>" target="_blank"><img src="./images/linkedin.png" alt="" width="40" height="40"></a>
                        <?php } ?>
                        <?php if($data['instagram']) { ?>
                            <a href="<?=$data["instagram"]?>" target="_blank"><img src="./images/insta.png" alt="" width="40" height="40"></a>
                        <?php } ?>
                        <?php if($data['x']) { ?>
                            <a href="<?=$data["x"]?>" target="_blank"><img src="./images/x.png" alt="" width="40" height="40"></a>
                        <?php } ?>
                        <?php if($data['github']) { ?>
                            <a href="<?=$data["github"]?>" target="_blank"><img src="./images/github.png" alt="" width="40" height="40"></a>
                        <?php } ?>
                    </div>
                </div>
            </td>
            
        </tr>
        <tr>
            <td colspan="2">
                <div class=about-button>
                    <button onclick="window.location.href='../crud/update_about.php'">Update Info</button>
                </div>
            </td>
        </tr>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var typed = new Typed(".typing", {
                strings: ["CS Undergrad", "Web Developer", "Traveller"],
                typeSpeed: 100,
                backSpeed: 60,
                loop: true,
                showCursor: true
            });
        });
    </script>
</body>
</html>
