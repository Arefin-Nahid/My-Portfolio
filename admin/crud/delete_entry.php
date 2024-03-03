<?php
// Include your database configuration file
include "../../include/config.php";

// Check if the request is a POST request
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the ID is provided in the request body
    $data = json_decode(file_get_contents("php://input"));
    if(isset($data->id)) {
        // Prepare and execute the delete query
        $sql_delete = "DELETE FROM `timeline` WHERE `id` = ?";
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