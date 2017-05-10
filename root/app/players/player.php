<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 21-4-2017
 * Time: 11:46
 */
require_once(__DIR__."/../DatabaseConnector.php");
require_once(__DIR__."/../teams/TeamsManager.php");
require_once (__DIR__."/../session/CheckRights.php");

function  players()
{
    $dbc = \App\connect();
    $sql = "SELECT * FROM tbl_players ORDER BY goals DESC , last_name ASC ";
    $sql2 = "SELECT * FROM tbl_teams";
    $players = $dbc->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $teams = $dbc->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
<<<<<<< HEAD
    echo "<div class='column-spaced subtitle'><p class='playerName'>Name of player</p><p class='teamName'>Team</p><p class='goals'>Goals</p></div>";
    foreach ($players as $item)
    {
        $test = \App\fetchTeam($item['team_id']);
        if (isset($test[0]['name']) != null)
        {
            echo "<div class='column-spaced'><p class='playerName'>".$item['first_name'] ." ".$item['last_name']."</p><p class='teamName'>".$test[0]['name']
                ."</p><p class='goals'>".$item ['goals']."</p></div>";
            echo "<a class='removeButton' href='../app/players/RemovePlayer.php?playerId=".$item['id']."'>Remove " .$item["first_name"]. " ". $item["last_name"]. "</a>";
=======
    echo "<div class='column-spred subtitle'><p>Name of player</p><p>Team</p><p>Goals</p></div>";

    foreach ($players as $item) {
        $test = \App\fetchTeam($item['team_id']);
        if (isset($test[0]['name']) != null) {
            echo "<div class='column-spred'><p>" . $item['first_name'] . " " . $item['last_name'] . "</p><p>" . $test[0]['name']
                . "</p><p>" . $item ['goals'] . "</p></div>";
    if (isset($_SESSION["logged"])) {
        \App\UpdateUser();
        if ($_SESSION["rights"] == "2") {
            if ($_SESSION["team_rights"] == null) {
                        echo "<a href='../app/players/RemovePlayer.php?playerId=" . $item['id'] . "'>Remove " . $item["first_name"] . " " . $item["last_name"] . "</a>";
                    }
                }
            }
>>>>>>> master
        }
    }
}
?>





