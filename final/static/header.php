<?php
    session_start();
    if( isset($_SESSION['valid_user']) ){
        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $userName = $_SESSION['valid_user'];
    }
?>

<!DOCTYPE html>
<!--
    Alex Nguyen
    CS290 FALL 2015
    12-4-15
    FINAL
-->
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Personal CSS-->
    <link rel="stylesheet" type="text/css" href="css/final.css">
    <title>
        Alex Nguyen CS290 Final Project
    </title>
</head>
<body>
    <div class="wrapper">
        <nav class="navbar">
            <div class="container">
                <ul class="nav nav-pills pull-left">
                    <li>
                        <a href="index.php">Food.DB</a>
                    </li>
                </ul>
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <?php
                        session_start();
                        if(isset($_SESSION['valid_user'])){
                            $userName = $_SESSION['valid_user'];
                            echo '
                                <li>
                                    <a id="username" href="account.php">' . $userName . '</a>
                                </li>
                                <li>
                                    <a href="favorites.php">Favorites</a>
                                </li>
                                <li>
                                    <a href="logout.php">Logout</a>
                                </li>
                                ';
                        } else{
                            echo'
                                <li>
                                    <a href="login.php">Login</a>
                                </li>
                                <li>
                                    <a href="signup.php">Signup</a>
                                </li>
                                ';
                        }
                    ?>


                </ul>
            </div>
        </nav>
