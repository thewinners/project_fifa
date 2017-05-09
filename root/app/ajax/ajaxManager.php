<?php

include_once (__DIR__."/../DatabaseConnector.php");

/*  request 1 = get the time
 *
 *  request 2 = uploud the time to the database
 *
 *  request 3 =
 * */

if (isset($_POST["request"]) && isset($_POST["id"]))
{
    $dbc = \App\Connect();

    if ($_POST["request"] == 1)
    {
        $sql = "SELECT `time` FROM `tbl_matches` WHERE `id` =".$_POST["id"];
        $result = $dbc->query($sql)->fetchAll();
    }

    elseif ($_POST["request"] == 2)
    {
        $sql = "UPDATE `tbl_matches` SET `time`= ".$_POST["time"]."WHERE `id` =".$_POST["id"];
        $dbc->query($sql);
    }

    elseif ($_POST["request"] == 3)
    {

    }
}