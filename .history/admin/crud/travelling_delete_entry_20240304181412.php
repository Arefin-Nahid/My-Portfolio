<?php
include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'] ?? '';

    if (!empty($id)) {
        $sql = "DELETE FROM `travelling` WHERE `id`=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

    } else {
        echo json_encode(['error' => 'ID not provided']);
    }
}
?>
