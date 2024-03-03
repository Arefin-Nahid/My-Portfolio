<?php
// Include your database configuration file
include "../../include/config.php";

// Retrieve data sent via POST request
$icon = $_POST['icon_insert'] ?? '';
$title = $_POST['title_insert'] ?? '';
$year = $_POST['year_insert'] ?? '';
$details = $_POST['details_insert'] ?? '';
$link = $_POST['link_insert'] ?? '';
$link_title = $_POST['link_title_insert'] ?? '';

// Insert data into the database
$sql_insert = "INSERT INTO `projects` (`icon`, `title`, `year`, `details`, `link`, `link_title`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt_insert = $pdo->prepare($sql_insert);
$stmt_insert->execute([$icon, $title, $year, $details, $link, $link_title]);

// Return a success response
http_response_code(200);
?>
