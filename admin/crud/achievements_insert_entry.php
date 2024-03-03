<?php
// Include your database configuration file
include "../../include/config.php";

// Retrieve data sent via POST request
$icon = $_POST['icon_insert'] ?? '';
$title = $_POST['title_insert'] ?? '';
$details = $_POST['details_insert'] ?? '';

// Insert data into the database
$sql_insert = "INSERT INTO `achievements` (`icon`, `title`, `details`) VALUES (?, ?, ?)";
$stmt_insert = $pdo->prepare($sql_insert);
$stmt_insert->execute([$icon, $title, $details]);

// Return a success response
http_response_code(200);
?>
