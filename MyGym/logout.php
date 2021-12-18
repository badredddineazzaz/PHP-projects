<?php

if(isset($_SESSION['id_p'])){
    unset($_SESSION['id_p']);
}

header("Location: login.php");