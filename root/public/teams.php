<?php
include_once ("tamplates/header.php");
require_once("../app/teams/TeamsManager.php");
require_once ("../app/session/CheckRights.php");
?>
<div class="page-title">
    <h2>Teams</h2>
</div>
<div class="wrapper wrapper_page">
    <?php
    $teams = \App\fetchTeams();
    if (isset($teams))
    {
        echo "<div class='column-spred'><p>Team name</p><p>Wins/Losses/Draws</p><p>Points</p></div>";
        foreach ($teams as $team)
        {

            echo "<a class=\"column-spred\" href=\"team.php?id=".$team["id"]."\"><p>".$team["name"]."</p><p>" .$team["wins"] . "/" .$team["losses"]."/".$team["draws"]."</p><p>" .$team["points"] ."</p></a>";
            if (isset($_SESSION["rights"]))
            {
                if($_SESSION["rights"] == "2")
                {
                    echo "<a class='removeButton' href='../app/teams/RemoveTeam.php?teamId=".$team['id']."'>Remove " .$team["name"]."</a>";
                }
            }
        }
    }
    else
    {
        echo "<p>No teams found..</p>";
    }
    if (isset($_SESSION["logged"]))
    {
        \App\UpdateUser();
        if ($_SESSION["rights"] == "1")
        {
            if ($_SESSION["team_rights"] == null)
            {
                echo "<form action='../app/teams/AddTeam.php' method='post'>
                        <div class='group-form'>
                            <label for='teamName'>Team name:</label>
                            <input type='text' id='teamName' name='teamName' class='textarea' required>
                        </div>
                        <div class='group-form'>
                            <input type='submit' value='Add team' class='button'>
                        </div>
                    </form>\"";
            }
        }
    }
    include_once ("tamplates/footer.php");
?>
</div>