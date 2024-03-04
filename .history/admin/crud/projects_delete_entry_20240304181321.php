<?php
include "../../include/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));
    if(isset($data->id)) {
        $sql_delete = "DELETE FROM `projects` WHERE `id` = ?";
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->execute([$data->id]);
        // Respond with success status
        http_response_code(200);
    } else {
        // Respond with bad request status
        http_response_code(400);
    }
} else {
    // Respond with method not allowed status
    http_response_code(405);
}
?>
