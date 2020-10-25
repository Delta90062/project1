<?php
    // start the session
    session_start();

    // $title contains the title for the page
    $title = "Home";

    // include the database class
    include "database.php";

    // start a new db connection
    $db = new DB('localhost', 'root', '', 'project1', 'utf8');

    // check the user role
    if(isset($_SESSION["email"])){
        $role = $db->checkRole();
    }
    
    // this inserts the header and the navbar
    require_once('header.php');  
?>

<body>
    <div class="header">
    </div>

    <div class="products mt-2">
        <h4 class="text-center">Products</h4>
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
                </div>
            </div>
        </div>
    </div>
</body>