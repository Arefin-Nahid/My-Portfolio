<?php
include "../../include/config.php";

if(isset($_GET['id'])) {
    $selectedId = $_GET['id'];

    $sql_selected = "SELECT * FROM `achievements` WHERE `id` = ?";
    $stmt_selected = $pdo->prepare($sql_selected);
    $stmt_selected->execute([$selectedId]);

    $row_selected = $stmt_selected->fetch(PDO::FETCH_ASSOC);

    if($row_selected) {
        header('Content-Type: application/json');
        echo json_encode($row_selected);
    } else {
        echo json_encode(array('error' => 'No data found for the provided ID.'));
    }
} else {
    // If ID is not provided in the request, return an error response
    echo json_encode(array('error' => 'ID parameter is missing in the request.'));
}
?>
