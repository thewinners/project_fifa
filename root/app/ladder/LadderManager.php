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

function fillLadder()
{
    $dbc = Connect();
    $sql = "SELECT `name`,`points` FROM `tbl_teams` WHERE `poule_id` = 1 ORDER BY `points` LIMIT 2";
    $pool1 = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    $sql = "SELECT `name`,`points` FROM `tbl_teams` WHERE `poule_id` = 2 ORDER BY `points` LIMIT 2";
    $pool2 = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    $sql = "SELECT `name`,`points` FROM `tbl_teams` WHERE `poule_id` = 3 ORDER BY `points` LIMIT 2";
    $pool3 = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    $sql = "SELECT `name`,`points` FROM `tbl_teams` WHERE `poule_id` = 4 ORDER BY `points` LIMIT 2";
    $pool4 = $dbc->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    
}