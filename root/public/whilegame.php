<?php
include_once ("tamplates/header.php");
require_once ("../app/matches/matchesManager.php");
include_once ("../app/teams/TeamsManager.php");
include_once (__DIR__."/../app/DatabaseConnector.php");
include_once ("javascript/clockphpjs.php");
include_once ("../app/teams/TeamManager.php");

if (isset($_GET["id"]))
{
    $game_id = $_GET["id"];

    $dbc = \App\Connect();
    $sql = "SELECT `id`,`team_id_a`, `team_id_b`, `score_team_a`, `score_team_b` FROM `tbl_matches` WHERE `id` = '". $game_id."';";
    $result = $dbc->query($sql)->fetchAll();

    $game_result_a = \App\fetchTeam($result[0]["team_id_a"]);
    $game_result_b = \App\fetchTeam($result[0]["team_id_b"]);
    $team_names = $game_result_a[0]["name"]." VS ".$game_result_b[0]["name"];

    $players_team_a = \App\fetchPlayers($result[0]["team_id_a"]);
    $players_team_b = \App\fetchPlayers($result[0]["team_id_b"]);
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
    <div id="clock" class="digital-clock">
        <p id="time">timer</p>
        <p id="score">score</p>
    </div>
    <div id="start" class="digital-clock hidden">
        <p>Start the game</p>
    </div>
    <div class="column-spaced">
        <ul>
            <li player-id="-" class="column-spaced"><span>Remove goal </span>players <?php echo $game_result_a[0]['name'];?> <span> Add goal</span></li>
            <?php
            foreach ($players_team_a as $player)
            {
                echo "<li player-id=\"".$player['id']."\" class=\"column-spaced\"> <span class=\"minus\"> - </span> ".$player['first_name']." ".$player['last_name']." <span class=\"plus\"> + </span> </li>";
            }
            ?>
        </ul>
        <ul>
            <li player-id="4"> <span class="minus"> Remove Goal </span> players <?php echo $game_result_b[0]['name'];?><span> Add goal </span> </li>
            <?php
            foreach ($players_team_b as $player)
            {
                echo "<li player-id=\"".$player['id']."\" class=\"column-spaced\"> <span class=\"minus\"> - </span> ".$player['first_name']." ".$player['last_name']." <span class=\"plus\"> + </span> </li>";
            }
            ?>
        </ul>
    </div>
    <div class="column-spaced">
        <div class="play-pauze">
            <p id="pauze" class="">=</p>
            <p id="play" class="hidden">></p>
        </div>
        <div class="exstratime">
            <p id="extraTime"></p>
            <p id="plusTime"><span>+</span> 1 min</p>
        </div>
        <div class="done">
            <p id="finish">done</p>
        </div>
    </div>
    <?php
    include_once ("tamplates/footer.php");
    ?>
</div>


<!--    $(".minus").on('click', function(){-->
<!---->
<!--       var id = $(this).parent().attr('data-id');-->
<!---->
<!--       $.ajax('../app/matches/whilemanager.php', {-->
<!--           method: "POST",-->
<!--           data : {-->
<!--                "id" : id,-->
<!--                "type" : 'minus'-->
<!--            }-->
<!--        }).done(function(data){-->
<!--           alert(data);-->
<!--        });-->
<!--    });-->
