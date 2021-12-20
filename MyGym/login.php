<?php
    session_start();

    
    include('connection.php');
    include('functions.php');


   if($_SERVER['REQUEST_METHOD']== "POST"){
       //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) and !empty($password)){
            //save to database

            //check if email already exist
            $query = "SELECT * FROM user WHERE email = '$email' limit 1";
            $result = mysqli_query($con,$query);

            if($result){
                if($result && mysqli_num_rows($result) >0){

                    $user_data = mysqli_fetch_assoc($result);

                    //Check password
                    if($user_data['password'] === $password){
                        $_SESSION['id_p']= $user_data['id_p'];
                        
                        if(empty($user_data['nom']) || empty($user_data['prenom']) || empty($user_data['sexe']) || empty($user_data['age']) || empty($user_data['poids']) || empty($user_data['taille']) ){
                            //if first time.
                            header("Location: addInfo.php");
                        }else{

                            //if other times
                            header("Location: index.php");
                        }
                        
                        die;
                    }else{
                        // $errorMessages["email ou mot de passe sont incorrect"];
                        $error="email ou mot de passe sont incorrect";
                        array_push($errorMessages,$error);
                    }

                }else{
                    $error='Pardon on a pas trouvé cet email. ' .'<a style="; color:white;" href="register.php">Inscrivez-vous!</a>' ;
                            array_push($errorMessages,$error);
                }
            }

        }else{
            echo("Tous les champs sont obligatoires! ");
        }

   }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <div class="left-side">
            <h1>Content de te revoir</h1>
            <img src="./images/training.svg" alt="">
        </div>


        <div class="right-side">

            <div class="title">
                <h1>Se Connecter</h1>
                <p>Entrez votre email et mot de passe pour s'authetifier.</p>
            </div>

            <!-- //Error Messages -->
            <?php foreach($errorMessages as $key): ?>
            
            <p class="errorMessage"> <i class="fal fa-exclamation-triangle"></i> <?= $key; ?></p>
                
           
            
        <?php endforeach; ?>

                
            

            <form  method="post">
                <p>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" id="email" placeholder="Tapez votre email" required> <br>
                </p>
                <p>
                    <label for="password">Mot de passe</label><br>
                    <div class="inputPass">
                        <input type="password" name="password" id="password" placeholder="Tapez votre mot de passe" required>
                        <i class="fal fa-eye" id="togglePassword"></i>
                    </div>
                </p>
                <div class="remFor">
                    <div class="check">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <a href="#">Mot de passe oublié?</a>
                </div>
                <button value="login" type="submit">Se Connecter</button>
            </form>
            <div class="signup">
                <p>Vous n'avez pas de compte? </p><a href="./register.php"> S'inscrire maintenant.</a>
            </div>
        </div>
    </div>
    

    <script src="./js/font-awesome.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>