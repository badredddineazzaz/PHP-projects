<?php
$username = $user_data['username'];
$name = strtoupper($user_data['nom']) ." ". ucwords($user_data['prenom']);
$poids=$user_data['poids'];
$taille=$user_data['taille'];
$age=$user_data['age'];
if($user_data['sexe']=='M'){
    $calories=13.397*$poids + 4.799*$taille - 5.677*$age + 88.362;
    $sexe="Homme";
    $avatar="./images/men-avatar.png";
}else{
    $calories = 9.247*$poids + 3.098*$taille - 4.330*$age + 447.593;
    $sexe="Femme";
    $avatar="./images/women-avatar.png";
}


?>

<div class="left-side">
            <div class="justfordisplay">
                <a class="home-page" href="index.php"> <i class="far fa-home-lg-alt"></i> </a>
                
                <div class="avatar">
                    <img width="100px" style="border-radius: 100%; text-align:center" src="<?php echo $avatar ?>" alt="">
                </div>
            
                <div class="username-name">
                    <div class="name">  <?php echo $name ?></div>
                    <div class="username">@<?php echo $username ?></div>
                </div>


                <div class="user-info-container">

                    <div class="user-info-box">

                        

                        <div class="info-data-box">
                            <p class="info-name">Poids</p>
                            <div class="values">
                                <p class="info-data-value"><?php echo $poids ?></p>
                                <p class="info-data-unity">Kg</p>
                            </div>
                        </div>

                        <div class="info-icon">
                        <i class="fad fa-weight"></i>
                        </div>

                    </div>
                    <div class="user-info-box">

                        

                        <div class="info-data-box">
                            <p class="info-name">Taille</p>
                            <div class="values">
                                <p class="info-data-value"><?php echo $taille ?></p>
                                <p class="info-data-unity">Cm</p>
                            </div>
                        </div>

                        <div class="info-icon">
                        <i class="far fa-ruler"></i>
                        </div>

                    </div>
                    <div class="user-info-box">

                        

                        <div class="info-data-box">
                            <p class="info-name">Age</p>
                            <div class="values">
                                <p class="info-data-value"><?php echo $age ?></p>
                                <p class="info-data-unity">ans</p>
                            </div>
                        </div>

                        <div class="info-icon">
                            <i class="far fa-child"></i>
                        </div>

                    </div>
                    <div class="user-info-box">

                        

                        <div class="info-data-box">
                            <p class="info-name">Sexe</p>
                            <div class="values">
                                <p class="info-data-value" style="font-size: 20px;"><?php echo $sexe ?></p>
                                <p class="info-data-unity"></p>
                            </div>
                        </div>

                        <div class="info-icon">
                            <i class="far fa-venus-mars"></i>
                        </div>

                    </div>

                    </div>
                </div>

            <div class="user-links">
                <a href="setting.php"> <i class="fal fa-user-cog"></i> Paramètre    </a>
                <a href="logout.php" id="logout"> <i class="fal fa-sign-out"></i> Se déconnecter    </a>
                </div>

        </div>