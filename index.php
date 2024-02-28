<?php 
    include 'include/config.php';
    $sql = "SELECT * FROM `section_control` WHERE `section_control`.`id` = 1";
    $stmt = $pdo->query($sql);
    $section_control_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM `user` WHERE `user`.`id` = 1";
    $stmt = $pdo->query($sql);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$data['full_name']?></title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
        <script src="./js/app.js"></script>
    </head>

    <body>
        <div class="site-main-wrapper">
            <div class="responsive_branding">
                <img src="./images/logo.png" alt="" >
            </div>
            <button class="hamberger">
                <img src="./images/hamberger.png" alt="">
            </button>
            <div class="mobile-nav">
                <button class="times"><img src="./images/times.png" alt=""></button>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#timeline">Timeline</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#achievement">Achievements</a></li>
                    <li><a href="#travelling">Travelling</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <header>
                <div class="container">
                    <nav id="main-nav" class="flex items-center justify-between">
                        <div class="left flex items-center">
                            <div class="branding">
                                <img src="./images/logo.png" alt="" >
                            </div>
                            <?php
                                $sql = "SELECT * FROM `section_control` WHERE `id` = 1";
                                $stmt = $pdo->query($sql);
                                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="left">
                                <?php if ($data['about'] == 1): ?>
                                    <a href="#about">About</a>
                                <?php endif; ?>
                                <?php if ($data['timeline'] == 1): ?>
                                    <a href="#timeline">Timeline</a>
                                <?php endif; ?>
                                <?php if ($data['project'] == 1): ?>
                                    <a href="#projects">Projects</a>
                                <?php endif; ?>
                                <?php if ($data['achievement'] == 1): ?>
                                    <a href="#achievement">Achievements</a>
                                <?php endif; ?>
                                <?php if ($data['travelling'] == 1): ?>
                                    <a href="#travelling">Travelling</a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="right">
                            <button id="contactButton" class="btn btn-primary">Contact</button>
                        </div>
                    </nav>
                    <?php
                        $sql = "SELECT * FROM `user` WHERE `user`.`id` = 1";
                        $stmt = $pdo->query($sql);
                        $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="hero flex items-center justify-between">
                        <div class="left flex-1 flex justify-center">
                            <img src="<?=$data['icon']?>" alt="">
                        </div>
                        <div class="right flex-1">
                            <h1><?=$data['full_name']?></h1>
                            <h6>And I’m a</h6>
                            <h2><span class="typing"></span>&nbsp;</h2>
                            <p><?=$data['subtitle']?></p>
                            <div>
                                <button id="downloadCvButton" class="btn btn-secondary">DOWNLOAD CV</button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <?php
                $sql = "SELECT * FROM `about` WHERE `about`.`id` = 1";
                $stmt = $pdo->query($sql);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <?php if ($section_control_data['about'] == 1): ?>
            <section id="about" class="about">
                <div class="container flex items-center about-inner-wrap">
                    <div class="flex-1">
                        <img class="about-me-img " src="<?=$data["image"]?>" alt="">
                    </div>
                    <div class="flex-1 right">
                        <h1>About <span>Me</span></h1>
                        <h3><?=$data['username']?></h3>
                        <p><?=$data['details']?></p>
                        <div class="social">
                            <?php   
                                if($data['linkedin']){
                                ?>
                                    <a href="<?=$data["linkedin"]?>" target="_blank"><img src="./images/linkedin.png" alt="" width="40" height="40"></a> 
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['instagram']){
                                ?>
                                    <a href="<?=$data["instagram"]?>" target="_blank"><img src="./images/insta.png" alt="" width="40" height="40"></a> 
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['x']){
                                ?>
                                    <a href="<?=$data["x"]?>" target="_blank"><img src="./images/x.png" alt="" width="40" height="40"></a>
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['github']){
                                ?>
                                    <a href="<?=$data["github"]?>" target="_blank"><img src="./images/github.png" alt="" width="40" height="40"></a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php
                $sql = "SELECT * FROM `timeline`";
                $stmt = $pdo->query($sql);
                $timeline_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php if ($section_control_data['timeline'] == 1): ?>
            <section id="timeline" class="timeline">
                <div class="container">
                    <h1 class="section-heading">Explore My <span>Timeline</span></h1>
                    <div class="card-wrapper">
                        <?php foreach ($timeline_data as $data): ?>
                            <div class="card">
                                <img src="<?=$data["icon"]?>" alt="">
                                <h2><?=$data["degree"]?></h2>
                                <p><?=$data["institude"]?></p>
                                <h3><?=$data["passing_year"]?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php
                $sql = "SELECT * FROM `projects`";
                $stmt = $pdo->query($sql);
                $project_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php if ($section_control_data['project'] == 1): ?>
            <section id="projects" class="projects">
                <div class="container">
                    <p>Browse My Recent </p>
                    <h1 class="section-heading"><span>Projects</span></h1>
                    <div class="card-wrapper">
                        <?php foreach ($project_data as $data): ?>
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php
                $sql = "SELECT * FROM `achievements`";
                $stmt = $pdo->query($sql);
                $achievement_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php if ($section_control_data['achievement'] == 1): ?>
            <section id="achievement" class="achievement">
                <div class="container">
                    <p>Find Out About My </p>
                    <h1 class="section-heading"><span>Achievements</span></h1>
                    <div class="slider">
                        <?php foreach ($achievement_data as $data): ?>
                            <div class="slide">
                                <img src="<?=$data["icon"]?>" alt="">
                                <span><?=$data["title"]?></span>
                                <p><?=$data["details"]?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-dots"></div>
                </div>
            </section>
            <?php endif; ?>

            <section class="freelancer">
                <h1>Available for Web Development Projects</h1>
                <p>I provide high standar clean website for your business solutions</p>
                <button id="downloadCvButtonFreelancer" class="btn btn-secondary">DOWNLOAD CV</button>
            </section>

            <?php
                $sql = "SELECT * FROM `travelling`";
                $stmt = $pdo->query($sql);
                $travelling_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <?php if ($section_control_data['travelling'] == 1): ?>
            <section id="travelling" class="travelling">
                <div class="container">
                    <p>Check Out My</p>
                    <h1 class="section-heading"><span>Travelling</span></h1>
                    <div class="card-wrapper">
                        <?php foreach ($travelling_data as $data): ?>
                            <div class="card">
                                <div class="overlay">
                                    <span><?=$data['details']?></span>
                                </div>
                                <img src="<?=$data['icon']?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php
                $sql = "SELECT * FROM `contact` WHERE `contact`.`id` = 1";
                $stmt = $pdo->query($sql);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <section id="contact" class="contact contact-section">
                <div class="container">
                    <p>Get In Touch</p>
                    <h1 class="section-heading">Contact <span>Me</span></h1> 
                    <div class="card-wrapper">
                        <div class="card">
                            <img src="./images/call.png" alt="">
                            <h1>Call Me On</h1>
                            <h6><a href="<?=$data['p_link']?>" target="_blank"><?=$data['phone']?></a></h6>
                        </div>
                        <div class="card">
                            <img src="./images/email.png" alt="">
                            <h1>Email Me At</h1>
                            <a href="<?=$data['e_link']?>" target="_blank">
                            <h6><?=$data['email']?></h6>
                        </a>
                        </div>
                        <div class="card">
                            <img src="./images/location.png" alt="">
                            <h1>Address</h1>
                            <a href="<?=$data['a_link']?>" target="_blank">
                            <h6><?=$data['address']?></h6>
                            </a>
                        </div>
                    </div>
                    <form action= "datainfo.php" method="post">
                        <div class="input-wrap">
                            <input type="text" name="user" placeholder="Your Name *">
                            <input type="email" name="email" placeholder="Your Email *">
                        </div>
                        <div class="input-wrap-2">
                            <input type="text" name="subject" placeholder="Your Subject...">
                            <textarea name="message" id="" cols="30" rows="8" placeholder="Your Message..."></textarea>
                        </div>
                        <div class="btn-wrapper">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </section>

            <?php
                $sql = "SELECT * FROM `about` WHERE `about`.`id` = 1";
                $stmt = $pdo->query($sql);
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>

            <footer>
                <img class="footer-logo" src="./images/logo.png" alt="">
                <div class="footer-socials">
                            <?php   
                                if($data['linkedin']){
                                ?>
                                    <a href="<?=$data["linkedin"]?>" target="_blank"><img src="./images/linkedin.png" alt="" width="40" height="40"></a> 
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['instagram']){
                                ?>
                                    <a href="<?=$data["instagram"]?>" target="_blank"><img src="./images/insta.png" alt="" width="40" height="40"></a> 
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['x']){
                                ?>
                                    <a href="<?=$data["x"]?>" target="_blank"><img src="./images/x.png" alt="" width="40" height="40"></a>
                                    <?php
                                }
                            ?>
                            <?php   
                                if($data['github']){
                                ?>
                                    <a href="<?=$data["github"]?>" target="_blank"><img src="./images/github.png" alt="" width="40" height="40"></a>
                                    <?php
                                }
                            ?>
                        </div>
                <div class="copyright">
                    Copyright 2024 © Arefin NahiD's
                </div>
            </footer>
            <a href="#" class="go-top" data-go-top aria-label="Go To Top">
                <img src="./images/arrow_top.png" alt="">
            </a>
        </div>
    </body>
</html>