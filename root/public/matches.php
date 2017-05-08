<?php
    include_once ("tamplates/header.php");
    require_once ("../app/session/CheckRights.php");
    require_once ("../app/matches/matchesManager.php");
?>
<div class="page-title">
    <h2>Matches</h2>
</div>
<div class="wrapper wrapper_page">
    <div class="navbar footer">
        <ul class="column-spred">
            <a href="ladder.php"><li>Ladder</li></a>
            <a href="#planed"><li>Planed games</li></a>
            <a href="#played"><li>Played games</li></a>
            <a href=""><li>Ongoing games</li></a>
            <?php
            \App\UpdateUser();
            if ($_SESSION["rights"] == "3")
            {
                echo "<a href=\"\"><li>Start games</li></a>";
            }
            ?>
        </ul>
    </div>
    <h3 id="planed" class="column-center">Planed games</h3>
    <?php
    $response = \app\getMatches("F", false);
    if ($response != null)
    {
        echo "<p>".$response."</p>";
    }
    ?>
    <h3 id="played" class="column-center">Played games</h3>
    <?php
    $response = \app\getMatches("T", false);
    if ($response != null)
    {
        echo "<p>".$response."</p>";
    }
    ?>
    <?php include_once ("tamplates/footer.php")?>
</div>