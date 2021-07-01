<?php

session_start();

$_SESSION = ['gebruiker'];
$_SESSION = ['id'];

session_destroy();

 header('location: ../index.php');
exit;
?>