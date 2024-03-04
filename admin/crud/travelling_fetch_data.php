<?php
include "../../include/config.php";

$id = $_GET['id'] ?? null;

if ($id !== null) {
    $sql = "SELECT * FROM `travelling` WHERE `id`=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);
} else {
    echo json_encode(['error' => 'ID not provided']);
}
?>
