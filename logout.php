<?php
/*
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['verify']);
header("location: login.php");
*/

// clear all the session variables and redirect to index
session_start();
session_unset();
session_write_close();
$url = "./login.php";
header("Location: $url");
