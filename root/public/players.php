<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 1-5-2017
 * Time: 15:34
 */

include_once ("tamplates/header.php");
require_once("../app/teams/TeamsManager.php");
require_once ("player.php");
?>
<div class="page-title">
    <h2>Players</h2>
</div>
<div class="wrapper wrapper_page">
    <ul class="players-ul">
        <?php
            echo players();
        ?>
    </ul>

    <?php
    if (isset($_SESSION["logged"]))
    {
        echo "<a href='addPlayer.php'>Add Player</a>";
    }
    include_once ("tamplates/footer.php");
    ?>
</div>


