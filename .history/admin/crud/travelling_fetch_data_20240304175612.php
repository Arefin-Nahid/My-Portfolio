<?php
include "../../include/config.php";

// Assuming you receive the ID as a parameter
$id = $_GET['id'] ?? null;

if ($id !== null) {
    // Fetch data from the database based on the ID
    $sql = "SELECT * FROM `travelling` WHERE `id`=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'ID not provided']);
}
?>
