<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Project Fifa</title>
</head>
<body>
<?php
session_start();
?>
<div class="wrapper">
    <header class="column-spaced">
        <div class="navbar">
            <ul class="column-spaced">
                <a href="ìndex.php"><li>Home</li></a>
                <a href="players.php"><li>Players</li></a>
                <a href="teams.php"><li>Teams</li></a>
            </ul>
        </div>
        <div class="logo">
            <img src="img/logo.png" alt="logo_project_fifa">
        </div>
        <div class="navbar">
            <ul class="column-spaced">
                <a href="ladder.php"><li>ladder</li></a>
                <a href=""><li>Score's</li></a>
                <?php
                if (isset($_SESSION["logged"]))
                {
                    if ($_SESSION["logged"])
                    {
                        echo "<a href='register.php'><li>Register</li></a>";
                        echo "<a href='../app/login/LoginManager.php'><li>Logout</li></a>";
                    }
                }
                else
                {
                    echo "<a href='login.php'><li>Login</li></a>";
                }
                ?>
            </ul>
        </div>
    </header>
</div>