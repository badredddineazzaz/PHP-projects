<?php

$dbhost ="localhost";
$dbuser ="root";
$dbpassword ="root";
$dbname ="mygym";

if(!$con= mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname)){
    die("can't connect");
}