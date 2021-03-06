<?php
//registreren.php

include "db.php";

$fieldnames = ['voornaam', 'achternaam', 'email', 'username', 'wachtwoord']; // neem alle values van de name attributes van de input fields op in deze array
$error = FALSE;

if (isset($_POST["Registreren"])) {
foreach($fieldnames as $fieldname){
    if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
        $error = TRUE;
    }
}

if ($error) {
echo "<script type='text/javascript'>alert('Alle velden zijn vereist');</script>";
}

if (!$error) {
    $voornaam = $_POST["voornaam"];
    $tussenvoegsel = $_POST["tussenvoegsel"];
    $achternaam = $_POST["achternaam"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $wachtwoord = $_POST["wachtwoord"];
    $herhaalwachtwoord = $_POST["herhaalwachtwoord"];

    if ($wachtwoord == $herhaalwachtwoord) {
        $db = new DB('localhost', 'root', '', 'project1', 'utf8');
        $db->execute($voornaam, $tussenvoegsel, $achternaam, $email, $username, $wachtwoord);
    }   else {
            echo "<script type='text/javascript'>alert('Wachtwoorden zijn niet hetzelfde');</script>";       
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inlog Pagina</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>
    <br>
    <br>
    <div class="container" style="width: 500px;">
        <h3>PHP Registratie Pagina</h3><br>
        <form action="" method="post">

            <label for="Voornaam">Voornaam</label>
            <input type="text" name="voornaam" class="form-control" >
            <br>

            <label for="Tussenvoegsel">Tussenvoegsel</label>
            <input type="text" name="tussenvoegsel" class="form-control">
            <br>

            <label for="Achternaam">Achternaam</label>
            <input type="text" name="achternaam" class="form-control" >
            <br>

            <label for="E-mail">E-mail</label>
            <input type="text" name="email" class="form-control" >
            <br>

            <label for="Username">Username</label>
            <input type="text" name="username" class="form-control" >
            <br>

            <label for="Wachtwoord">Wachtwoord</label>
            <input type="password" name="wachtwoord" class="form-control" >
            <br>

            <label for="Password">Herhaal Wachtwoord</label>
            <input type="password" name="herhaalwachtwoord" class="form-control" >
            <br>

            <input type="submit" name="Registreren" class="btn btn-info" value="Registreren">
            <a href="index.php" class="btn btn-link" role="button">Login?</a>
            <a href="lostpsw.php" class="btn btn-link" role="button">Wachtwoord vergeten?</a>
        </form>
        <br>
    </div>
</body>
</html>