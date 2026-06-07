<?php
session_start();
session_unset();
session_destroy();
header('Location: login.php');  //vers page de connexion 
?>
