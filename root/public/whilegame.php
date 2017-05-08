<?php
include_once ("tamplates/header.php");
require_once ("../app/matches/matchesManager.php");
include_once ("../app/teams/TeamsManager.php");
include_once (__DIR__."/../app/DatabaseConnector.php");
include_once ("javascript/clockphpjs.php");

if (isset($_GET["id"]))
{
    $game_id = $_GET["id"];

    $dbc = \App\Connect();
    $sql = "SELECT `id`,`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` = '". $game_id."';";
    $result = $dbc->query($sql)->fetchAll();

    $game_result_a = \App\fetchTeam($result[0]["team_id_a"]);
    $game_result_b = \App\fetchTeam($result[0]["team_id_b"]);
    $team_names = $game_result_a[0]["name"]." VS ".$game_result_b[0]["name"];

    $dbc = \App\Connect();
    $sql = "SELECT * FROM `tbl_matches` WHERE `id`=".$game_id."and `start_play_time`= null;";
    $result = $dbc->query($sql)->rowCount();

    if ($result == 0)
    {
        \app\hideClock();
    }
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
    <div id="clock" class="digital-clock hidden">
        <p id="time"></p>
    </div>
    <div id="start" class="digital-clock">
        <a <?php echo "href=\"../app/matches/whileManager.php?id=".$game_id."&start=true\"";?>><p>Start the game</p></a>
    </div>
    <div class="startbutton"></div>
    <div class="group-form"></div>
    <div class="column-spred"></div>
    <?php
    include_once ("tamplates/footer.php");
    ?>
</div>
