<?php
session_start();

// controlleren of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}
?>