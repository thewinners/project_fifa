<?php
namespace App;

require_once (__DIR__ . "/../DatabaseConnector.php");

function showLadder()
{
    $show = false;

    $dbc = Connect();
    $sql = "SELECT * FROM `tbl_matches` WHERE played = 'F'";
    $gamesNotPlayed = $dbc->query($sql)->rowCount();

    if ($gamesNotPlayed == 0)
    {
        $show = true;
    }

    return $show;
}