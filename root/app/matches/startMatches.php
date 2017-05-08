<?php
if (isset($_GET["id"]))
{
    $game_id = $_GET["id"];
    header("location: ../../public/whilegame.php?id=".$game_id);
}