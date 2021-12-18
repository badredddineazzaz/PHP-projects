<?php
    session_start();

   
    include('connection.php');
    include('functions.php');

    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD']== "POST"){
        //something was posted
         $sexe = $_POST['sexe'];
         $age = $_POST['age'];
         $taille = $_POST['taille'];
         $poids = $_POST['poids'];
         $id = $_SESSION['id_p'];
         $nom = $_POST['nom'];
         $prenom = $_POST['prenom'];

        //  `nom`='$nom', `prenom`= '$prenom'

         $query = "UPDATE `user` SET `nom`='$nom', `prenom`= '$prenom',  `sexe` = '$sexe', `age` = '$age', `poids` = '$poids', `taille` = '$taille' WHERE (`id_p` = '$id');";
        $result=mysqli_query($con,$query);

        if($result){
            header("Location: index.php");
        }else{
            $error = "There is an error";
            array_push($errorMessages,$error);
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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">

        <div class="left-side">
            <h1>Dernière étape et vous êtes prêt à partir   .</h1>
            <img style="  width: 500px;" src="./images/fill info.svg" alt="">
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


                
            <p>Sélectionnez votre sexe :</p>
                <div class="check-container">
                    

                    <label class="option_item">
                        <input type="checkbox" id="male" class="checkbox" value="M" checked name="sexe" onclick="checkMale()">
                        <div class="option_inner facebook">
                            <div class="name">Mâle</div>
                        </div>
                    </label>

                    <label class="option_item " id="rightCheckbox" >
                        <input type="checkbox" id="female" class="checkbox" value="F" name="sexe" onclick="checkFemale()" >
                        <div class="option_inner facebook">
                            <div class="name">Femelle</div>
                        </div>
                    </label>    
                </div>

                <p>
                    <label for="nom">Nom :</label><br>
                    <input type="text" name="nom" id="nom" placeholder="Tapez votre nom " required> <br>
                </p>

                <p>
                    <label for="prenom">Prenom :</label><br>
                    <input type="text" name="prenom" id="prenom" placeholder="Tapez votre prenom" required> <br>
                </p>

                <p>
                    <label for="age">Age :</label><br>
                    <input maxlength="3" pattern="[0-9]+" type="text" name="age" id="age" placeholder="Tapez votre age" required> <br>
                </p>
                <p>
                    <label for="taille">Taille :</label><br>
                    <div class="inputPass">
                        <input maxlength="3" pattern="[0-9]+" type="text"  name="taille" id="taille" placeholder="Tapez votre taille" required>
                        <p class="setNext">Cm</p>
                    </div>
                </p>
                <p>
                    <label for="poids">Poids :</label><br>
                    <div class="inputPass">
                        <input maxlength="3" pattern="[0-9]+" type="poids" name="poids" id="poids" placeholder="Tapez votre poids" required>
                        <p class="setNext">Kg</p>
                    </div>
                </p>

                <button name="signup" type="submit">Entrez</button>
            </form>



        </div>
    </div>
    

    <script src="./js/font-awesome.js"></script>
    <script src="./js/script.js"></script>

    <script>

        function checkMale(){
            document.getElementById("male").checked = true;
            document.getElementById("female").checked = false;
        }
        function checkFemale(){
            document.getElementById("male").checked = false;
            document.getElementById("female").checked = true;
        }
    
    </script>
</body>
</html>