<?php

$logout = isset($_GET["logout"]) ? $_GET["logout"] : '';
if ($logout == "yes") {
    session_start();
    session_unset();
    session_destroy();
    echo '<script>window.location.href = "login.php";</script>';
    exit;
}
?>
