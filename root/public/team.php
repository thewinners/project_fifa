<?php
require_once ("../app/teams/TeamManager.php");
require_once ("../app/teams/TeamsManager.php");
if (isset($_GET["id"]))
{
    $teamId = $_GET["id"];
    $players = \app\fetchPlayers($teamId);
    $team = \app\fetchTeam($teamId);
}
    include_once ("tamplates/header.php");
?>
<div class="page-title">
    <h2><?php echo $team[0]["name"];?></h2>
</div>
<div class="wrapper wrapper_page">
    <h3>Spelers</h3>
    <ol>
        <?php
        $count = 1;
        foreach ($players as $player)
        {
            echo "<li>".$count.". ".$player["first_name"]." ".$player["last_name"]."</li>";
            $count++;
        }
        ?>
    </ol>
    <div class="column-spaced">
        <?php
        if (isset($_SESSION["logged"]))
        {
            if (isset($_SESSION["logged"]))
            {
                echo "<a href=\"\" class=\"button\">Edit Player</a>";
                echo "";
            }
        }
        ?>
    </div>
</div>
<?php
    include_once ("tamplates/footer.php");
?>
<div>
    <form action="" method="post">
        <div class="group-form">
            <label for="">Add player by D-nummer</label>
            <input class="textarea" type="text">
        </div>
        <div class="group-form">
            <label for="">Remove player by D-nummer</label>
            <input class="textarea" type="text">
        </div>
        <div class="group-form">
            <input type="submit" value="submit" class="button">
        </div>
    </form>
</div>
