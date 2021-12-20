<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpassword ="root";
$dbname ="mygym";

if(!$con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname)){
    header("Location: errors/error500.php");
}