<?php
$sessionadmin = isset($_SESSION['admin']) ? $_SESSION['admin'] : '';
$setadmin = 'expectedAdminValue'; // replace with your actual expected admin value
$sessionpass = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';
$setpass = 'expectedPassValue'; // replace with your actual expected password value

if ($sessionadmin == $setadmin && $sessionpass == $setpass) {
    // your code here
}
?>