<?php
namespace App;
use PDO;

require_once("DatabaseConfig.php");

function Connect()
{
    $dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbc;
}
?>