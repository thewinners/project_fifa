<?php
include_once ("tamplates/header.php");
require_once("../app/teams/TeamsManager.php");
?>
<div class="page-title">
    <h2>Teams</h2>
</div>
<div class="wrapper wrapper_page">
    <?php
    $teams = \App\fetchTeams();
    if (isset($teams))
    {
        foreach ($teams as $team)
        {
            echo "<a href=\"team.php?id=".$team["id"]."\"><p>".$team["name"]."</p></a>";
        }
    }
    else
    {
        echo "<p>No teams found..</p>";
    }
    ?>
</div>
<?php
    include_once ("tamplates/footer.php");
?>