<?php 
if (isset($_SESSION['UserID'])) {
    require('home.php');
} elseif (@$_GET['page'] == 'dashboard') {
    require 'home.php';
} elseif (@$_GET['page'] == 'home') {
    require 'home.php';
} elseif (@$_GET['page'] == 'logout') {
    session_start();
    unset($_SESSION["UserID"]);
    unset($_SESSION["username"]);
    header('Location: /login.php');
} else {
    if (@$_GET['page'] == "register") {
        require 'register.php';
    } else {
        require('login.php');
    }
}
