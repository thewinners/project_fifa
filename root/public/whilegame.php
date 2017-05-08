<?php
include_once ("tamplates/header.php");
require_once ("../app/matches/matchesManager.php");
include_once ("../app/teams/TeamsManager.php");
include_once (__DIR__."/../app/DatabaseConnector.php");

if (isset($_GET["id"]))
{
    $game_id = $_GET["id"];

    $dbc = \App\Connect();
    $sql = "SELECT `id`,`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` = '". $game_id."';";
    $result = $dbc->query($sql)->fetchAll();

    $game_result_a = \App\fetchTeam($result[0]["team_id_a"]);
    $game_result_b = \App\fetchTeam($result[0]["team_id_b"]);
    $team_names = $game_result_a[0]["name"]." VS ".$game_result_b[0]["name"];
}
else
{
    header("location: index.php");
}
?>
<div class="page-title">
    <h2><?php echo $team_names;?></h2>
</div>
<div class="wrapper wrapper_page">
    <div class="digital-clock">
        <p id="time"></p>
    </div>
    <div class="startbutton"></div>
    <div class="group-form"></div>
    <div class="column-spred"></div>
    <?php
    include_once ("tamplates/footer.php");
    ?>
</div>
