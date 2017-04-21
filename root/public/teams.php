<?php
include_once ("tamplates/header.php");
require_once ("../app/teams/TeamManager.php")
?>
<div class="page-title">
    <h2>Teams</h2>
</div>

<?php
    $teams = \App\fetchTeams();
    if (isset($teams))
    {
        foreach ($teams as $team)
        {
            //if there are teams made then here it will show the team value's (front-end)
            // echo $team["name"];
        }
    }
    else
    {
        //Something like this if no teams found in db
        //echo "<p> No teams found </p>";
    }
?>
