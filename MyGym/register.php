<?php
    session_start();

    include('connection.php');
    include('functions.php');


   if($_SERVER['REQUEST_METHOD']== "POST"){
       //something was posted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['cpassword'];

        if(!empty($username) and !empty($email) and !empty($password) and !empty($confirmPassword) ){
            //save to database
            //check if email already exist
            $selectEmail = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
            $selectUsername = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

            if($password != $confirmPassword){

                $error="Les mots de passe ne sont pas identiques!";
                array_push($errorMessages,$error);

            }else if(mysqli_num_rows($selectEmail) || mysqli_num_rows($selectUsername)) {
                $error="Email ou Nom d'utilisateur est déjâ utilisé!";
                array_push($errorMessages,$error);
                
            }else {

                $query = "insert into user(username,email,password) values('$username','$email','$password') ";
                mysqli_query($con,$query);
                header("Location: login.php");

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
    <title>S'inscrire | MyGym</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">

        <div class="left-side">
            <h1>Bienvenue à notre site-web</h1>
            <img src="./images/training.svg" alt="">
        </div>


        <div class="right-side reg">

       
            <div class="title">
                <h1>S'inscrire</h1>
                <p>Entrez les informations nécessaires</p>
            </div>

            <?php foreach($errorMessages as $key): ?>
            
            <p class="errorMessage"> <i class="fal fa-exclamation-triangle"></i> <?= $key; ?></p>
       
        <?php endforeach; ?>

            <form  method="POST" action="" >     
                
                
                <p>
                    <label for="username">Nom d'utilisateur</label><br>
                    <input type="text" name="username" id="username" placeholder="Tapez votre nom d'utilisateur" required> <br>
                </p>
                <p>
                    <label for="email">E-mail</label><br>
                    <input type="email" name="email" id="email" placeholder="Tapez votre email" required> <br>
                </p>
                <p>
                    <label for="password">Mot de passe</label><br>
                    <div class="inputPass">
                        <input type="password"  name="password" id="password" placeholder="Tapez votre mot de passe" required>
                        <i class="fal fa-eye" id="togglePassword"></i>
                    </div>
                </p>
                <p>
                    <label for="confirmPassword">Répetez votre mot de passe</label><br>
                    <div class="inputPass">
                        <input type="password" name="cpassword" id="confirmPassword" placeholder="Retapez votre mot de passe" required>
                    </div>
                </p>
                <div class="remFor">
                    <div class="check">
                        <input type="checkbox" name="accept" id="accept" required>
                        <label for="accept">j'accepte <a href=""> les termes et conditions</a></label>
                    </div>
                    
                </div>
                <button name="signup" type="submit">S'inscrire</button>
            </form>
            <div class="signup">
                <p>Vous avez déja un compte? </p><a href="./login.php"> Se connecter maintenant.</a>
            </div>


        </div>
    </div>
    

    <script src="./js/font-awesome.js"></script>
    <script src="./js/script.js"></script>

    <script>
    
    </script>
</body>
</html>