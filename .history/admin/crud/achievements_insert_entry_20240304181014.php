<?php
include "../../include/config.php";

$icon = $_POST['icon_insert'] ?? '';
$title = $_POST['title_insert'] ?? '';
$details = $_POST['details_insert'] ?? '';

$sql_insert = "INSERT INTO `achievements` (`icon`, `title`, `details`) VALUES (?, ?, ?)";
$stmt_insert = $pdo->prepare($sql_insert);
$stmt_insert->execute([$icon, $title, $details]);

http_response_code(200);
?>
