<?php
namespace App;
session_start();

require_once (__DIR__ . "/../DatabaseConnector.php");

$dbc = Connect();
$teamName =$_POST["teamName"];

$sql = "SELECT `id` FROM `tbl_teams` WHERE `name` = '$teamName';";
$idarray = $dbc->query($sql)->fetch();
$id = $idarray["id"];

$sql = "SELECT `teamrights` FROM `tbl_users` WHERE `id` = ".$_SESSION['user_id'];
$hasRights = $dbc->query($sql)->fetch();

if ($hasRights == null)
{
    $sql = "INSERT INTO `tbl_teams` (`name`) VALUE ('$teamName');";
    $dbc->query($sql);

    $sql = "UPDATE `tbl_users` SET `teamrights`='$id' WHERE `id` = ".$_SESSION['user_id'];
    $dbc->query($sql);
}

header("location: ../../public/teams.php");
