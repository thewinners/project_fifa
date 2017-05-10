<?php
namespace App;
require_once(__DIR__."/../DatabaseConnector.php");

if ($_SESSION["teamId"] == "1")
{
    if ($_SESSION["teamId"] == null)
    {
        $playerId = $_GET["teamId"];

        $dbc = Connect();
        $sql = "DELETE FROM `tbl_players` WHERE `team_id` = '$teamId'";
        $dbc->query($sql);

        header("location: ../../public/team.php");
    }
}


?>