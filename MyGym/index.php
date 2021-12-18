<?php
    // $_SESSION;
    session_start();

    include('connection.php');
    include('functions.php');

    $user_data = check_login($con);

    $username = $user_data['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    this is a test 
    <?php
    echo $username;
    ?>
    <br>


<a href="logout.php">Se deconnecter</a>
</body>
</html>