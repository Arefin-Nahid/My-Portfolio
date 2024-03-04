<?php
include "../../include/config.php";

// Retrieve data sent via POST request
$icon = $_POST['icon_insert'] ?? '';
$degree = $_POST['degree_insert'] ?? '';
$institude = $_POST['institude_insert'] ?? '';
$passing_year = $_POST['passing_year_insert'] ?? '';

// Insert data into the database
$sql_insert = "INSERT INTO `timeline` (`icon`, `degree`, `institude`, `passing_year`) VALUES (?, ?, ?, ?)";
$stmt_insert = $pdo->prepare($sql_insert);
$stmt_insert->execute([$icon, $degree, $institude, $passing_year]);

// Return a success response
http_response_code(200);
?>
