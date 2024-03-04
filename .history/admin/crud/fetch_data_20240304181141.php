<?php
include "../../include/config.php";

if(isset($_GET['id'])) {
    $selectedId = $_GET['id'];

    $sql_selected = "SELECT * FROM `timeline` WHERE `id` = ?";
    $stmt_selected = $pdo->prepare($sql_selected);
    $stmt_selected->execute([$selectedId]);

    $row_selected = $stmt_selected->fetch(PDO::FETCH_ASSOC);

    // Check if data is found
    if($row_selected) {
        // Return the data as JSON response
        header('Content-Type: application/json');
        echo json_encode($row_selected);
    } else {
        // If no data found, return an empty response or appropriate error message
        echo json_encode(array('error' => 'No data found for the provided ID.'));
    }
} else {
    // If ID is not provided in the request, return an error response
    echo json_encode(array('error' => 'ID parameter is missing in the request.'));
}
?>
