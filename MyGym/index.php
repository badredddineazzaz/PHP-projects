<?php
    // $_SESSION;
    session_start();

    include('connection.php');
    include('functions.php');

    $user_data = check_login($con);

    $username = $user_data['username'];
    $name = strtoupper($user_data['nom']) ." ". ucwords($user_data['prenom']);
    $poids=$user_data['poids'];
    $taille=$user_data['taille'];
    $age=$user_data['age'];
    if($user_data['sexe']=='M'){
        $calories=13.397*$poids + 4.799*$taille - 5.677*$age + 88.362;
        $sexe="Homme";
    }else{
        $calories = 9.247*$poids + 3.098*$taille - 4.330*$age + 447.593;
        $sexe="Femme";
    }
    $water=$poids*0.033;
    $cal=round($calories);

    if($age>=1 || $age<=2){
        $sleep="11-14";
    }else if($age>=3 || $age<=5){
        $sleep="10-13";
    }else if($age>=6 || $age<=12){
        $sleep="9-12";
    }else if($age>=13 || $age<=18){
        $sleep="8-10";
    }else if($age>=19 || $age<=64){
        $sleep="7-9";
    }else{
        $sleep="11-14";
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>
<body>

    <div class="container">
    <?php include('sidebar.php'); ?>

        <div class="right-side">
        <div class="name"> Des calculs  </div>
            <div class="top-container">
                

                <div class="calcul-box calories">
                    <div class="box-left">
                        <p class="box-title">   Calories    </p>
                        <div class="box-info">
                            <p class="box-value"><?php echo $cal ?></p>
                            <p class="box-unity">Kcal/jour</p>
                        </div>
                    </div>
                    
                    <img src="./images/workout.svg" alt="">
                    

                </div>
                <div class="calcul-box water ">
                    <div class="box-left">
                        <p class="box-title">   Water    </p>
                        <div class="box-info">
                            <p class="box-value"><?php echo $water ?></p>
                            <p class="box-unity">L/jour</p>
                        </div>
                    </div>
                    
                    <img src="./images/watter.svg" alt="">
                    

                </div>
            </div>

            <div class="name"> Extension    </div>
            <div class="top-container">
                

                <div class="ext-box">
                        <div class="ext-top">
                        <p class="ext-title">   Sleep    </p>
                        <div class="ext-icon"><i class="fal fa-alarm-clock"></i></div>
                        </div>

                        <div class="ext-info">
                            <p class="ext-value"><?php echo $sleep ?></p>
                            <p class="ext-unity">h/jour</p>
                        </div>

                </div>
                <div class="ext-box">
                        <div class="ext-top">
                        <p class="ext-title">   Livre    </p>
                        <div class="ext-icon"><i class="fal fa-book"></i></div>
                        </div>

                        <div class="ext-info">
                            <p class="ext-value">1.98</p>
                            <p class="ext-unity">L/jour</p>
                        </div>

                </div>
                <div class="ext-box">
                        <div class="ext-top">
                        <p class="ext-title">   Citation    </p>
                        <div class="ext-icon"><i class="fal fa-quote-right"></i></div>
                        </div>

                        <div class="ext-info">
                            <p class="ext-value">1.98</p>
                            <p class="ext-unity">L/jour</p>
                        </div>

                </div>

            </div>
            

        </div>

        
    </div>



    <script src="./js/font-awesome.js"></script>

</body>
</html>