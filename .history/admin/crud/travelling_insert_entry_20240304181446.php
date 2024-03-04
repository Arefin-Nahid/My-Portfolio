<?php
include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $icon = $_POST['icon_insert'] ?? '';
    $details = $_POST['details_insert'] ?? '';

    $sql = "INSERT INTO `travelling` (`icon`, `details`) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$icon, $details]);
    
}
?>
