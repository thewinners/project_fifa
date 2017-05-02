<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 21-4-2017
 * Time: 11:46
 */
require_once ("tamplates/header.php");
require_once ("tamplates/footer.php");
require_once ("../app/DatabaseConnector.php");
require_once ("../app/teams/TeamsManager.php");

function  players()
{
    $dbc = \App\connect();
    $sql = "SELECT * FROM tbl_players ORDER BY goals DESC , last_name ASC ";
    $sql2 = "SELECT * FROM tbl_teams";
    $list = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $list2 = $dbc->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
    foreach ($list as $item)
    {
        $test = \App\fetchTeam($item['team_id']);
        echo '<li>'. $item['first_name'] ." ".$item['last_name']." " . $test[0]['name']
             ." ".$item ['goals'].'</li>';

    }
}
?>





