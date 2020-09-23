<?php
//login_succes.php

session_start();
include "db.php";
$db = new DB('localhost', 'root', '', 'project1', 'utf8');

if (isset($_SESSION["email"])) {
    echo '<h3>Login Succes, Welkom - ' . $_SESSION["email"] . '</h3>';
    echo '<br><br><a href="logout.php">Log uit</a>';
} else {
    header("location:index.php");
}

