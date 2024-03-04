<?php
include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $icon = $_POST['icon_insert'] ?? '';
    $details = $_POST['details_insert'] ?? '';

    // Insert data into the database
    $sql = "INSERT INTO `travelling` (`icon`, `details`) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$icon, $details]);

    // You may handle success/error response here as needed
}
?>
