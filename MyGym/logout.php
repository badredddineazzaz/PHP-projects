<?php
session_start();

unset($_SESSION["id_p"]);
unset($_SESSION["nom"]);


header("Location: login.php");