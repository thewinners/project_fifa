<?php
Namespace App;

require_once(__DIR__ . "/../DatabaseConnector.php");

$dbc = Connect();

function fetchTeams()
{
    $sql = "SELECT * FROM `tbl_teams`";
    $allTeams = $this->dbc->query($sql)->fetchAll();
    return $allTeams;
}

function randomizeTeams($allTeams)
{
    return shuffle($allTeams);
}

function poulMaker()
{
    for ($i = 0; $i == 4; $i++)
    {
        $sql = "INSERT INTO `tbl_poules` (`name`) VALUES ('$i')";
        $this->dbc->query($sql);
    }
}

function poulFiller($allTeams)
{
    
}
