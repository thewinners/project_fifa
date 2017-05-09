<?php
include_once ("../../public/javascript/clockphpjs.php");
include_once ("../DatabaseConnector.php");

if (isset($_POST['type']) && $_POST['type'] == 'minus')
{
    deleteScore(4);
}


if (isset($_GET["id"]))
{
    $game_id = $_GET["id"];
    if (isset($_GET["start"]))
    {
        if ($_GET["start"])
        {

            $startTime = \App\startClock();
            $dbc = \App\Connect();
            $sql = "UPDATE `tbl_matches` SET `start_play_time`= ".$startTime." WHERE `id`=".$game_id;
            $result = $dbc->query($sql);
        }
        else
        {
            header("location: ../../public/whilegame.php");
        }
    }
    else
    {
        $dbc = \App\Connect();
        $sql = "SELECT * FROM `tbl_matches` WHERE `id`=".$game_id."and `start_play_time`= null;";
        $result = $dbc->query($sql)->rowCount();

        if ($result == 0)
        {
            \app\updateClock();
            header("location: ../../public/whilegame.php");
        }
    }

    /* build clock
     *
     * chech of de wetstrijd al bezig is
     *
     * zo nee [ zorg dat de startknop klaar staat ]
     *
     * zo ja haal de tijd op
     *
     * zet de timer aan op die tijd
     *
     *
     *
     * */






    header("location: ../../public/whilegame.php?id=".$game_id);
}