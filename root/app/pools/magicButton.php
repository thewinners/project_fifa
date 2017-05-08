<?php
Namespace App;
session_start();

require_once (__DIR__."/PoulGenerator.php");

if ($_SESSION["rights"] == 2)
{
    $generator = new PoulGenerator();

    $generator->poulMaker();
    $generator->poulFiller($generator->shuffle_assoc($generator->fetchTeams()));
}

//header("location: ../login.php");