<?php
namespace App;

require_once (__DIR__."/../DatabaseConnector.php");
include_once (__DIR__."/../../config/config.php");

function GenerateMatches()
{
    $sql = "SELECT * FROM `tbl_poules`";
    $amountPools = Connect()->query($sql)->rowCount();
    for ($i = 1; $i >= $amountPools; $i++);
    {
        $sql = "SELECT * FROM `tbl_teams` WHERE `poule_id` = ".$i;
        $teams = Connect()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        for ($a = 0; $a < Count($teams); $a++)
        {
            for ($b = 0; $b < Count($teams); $b++)
            {
                if ($a != $b)
                {
                    $sql = "SELECT * FROM `tbl_matches` WHERE `team_id_a` = '$a' AND `team_id_b` = '$b' || `team_id_a` = '$b' AND `team_id_b` = '$a'";
                    $total = Connect()->query($sql)->rowCount();
                    if ($total == 0)
                    {
                        $sql = "INSERT INTO `tbl_matches` (`team_id_a`, `team_id_b`) VALUES ('".$teams[$a]['id']."', '".$teams[$b]['id']."')";
                        Connect()->query($sql);
                    }
                }
            }
        }
    }
}