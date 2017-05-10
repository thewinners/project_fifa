<?php

include_once (__DIR__."/../DatabaseConnector.php");

/*  request 0 = put time in db
 *
 *  request 1 = get the time
 *
 *  request 2 = uploud the pauze time to the database
 *
 *  request 3 = get the pauze time to the database
 *
 *  request 4 = ulouden van goal
 *
 *  request 5 = ulouden van remove goal
 *
 *  request 6 = add a goal
 *
 *  request 7 = remove a goal
 *
 *  request 8 = score of team a and team b returnen
 * */

if (isset($_POST["request"]) && isset($_POST["id"]))
{
    $dbc = \App\Connect();
    if ($_POST["request"] == 0)
    {
        $time = time();
        $sql = "UPDATE `tbl_matches` SET `start_play_time`= ".$time."WHERE `id` =".$_POST["id"];
        $dbc->query($sql);
    }
    elseif ($_POST["request"] == 1)
    {
        $sql = "SELECT `start_play_time` FROM `tbl_matches` WHERE `id` =".$_POST["id"];
        $result = $dbc->query($sql)->fetchAll();

        if ($result[0]['start_play_time'] != 0)
        {
            $start_time = $result[0]['start_play_time'];
            $time_now = time();
            $the_time = $time_now - $start_time;
            echo $the_time;
        }
        else
        {
            echo 0;
        }
    }

    elseif ($_POST["request"] == 2)
    {
        $time = time();
        $sql = "UPDATE `tbl_matches` SET `pauze_time_start` = ".$time." WHERE `id` =".$_POST["id"];
        $dbc->query($sql);
    }

    elseif ($_POST["request"] == 3)
    {
        $sql = "SELECT `start_play_time`, `pauze_time_start` FROM `tbl_matches` WHERE `id` =".$_POST["id"];
        $result = $dbc->query($sql)->fetchAll();

        if ($result[0]['start_play_time'] != 0)
        {
            $start_time = $result[0]['start_play_time'];
            $pauze_time = $result[0]['pauze_time_start'];
            $time_now = time();
            $the_time = $time_now - $start_time;
            $the_pauze = $time_now - $pauze_time;
            $the_time = $the_time - $the_pauze;
            echo $the_time;
        }
        else
        {
            echo 0;
        }
    }

    elseif ($_POST["request"] == 4)
    {
    }

    elseif ($_POST["request"] == 5)
    {

    }
}