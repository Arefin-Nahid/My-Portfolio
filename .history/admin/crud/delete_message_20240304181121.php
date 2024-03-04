<?php
include "../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM `contact_messages` WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Redirect back to the contact page after deletion
    echo '<script>window.location = "../index.php#tab-contact";</script>';
    exit;
}
?>
