<?php
namespace App;

require_once ("../DatabaseConnector.php");

function fetchTeams()
{
    $dbc = Connect();
    $sql = "SELECT * FROM `tbl_teams`";
    $teams = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    return $teams;
}


