<?php

session_start();

    include('connection.php');
    include('functions.php');

    $user_data = check_login($con);
    $id=$_SESSION['id_p'];


    $age=$user_data['age'];
    $poids=$user_data['poids'];
    $taille=$user_data['taille'];
    $sexe=$user_data['sexe'];

    if($_SERVER['REQUEST_METHOD']== "POST"){
        $new_age=$_POST['age'];
        $new_poids=$_POST['poids'];
        $new_taille=$_POST['taille'];
        $new_sexe = $_POST['sexe'];
        if($sexe==$new_sexe && $age==$new_age && $taille==$new_taille && $poids==$new_poids){
            $error="Vous n'avez rien modifié!";
            array_push($errorMessages,$error);
        }else{
            $query = "UPDATE `user` SET `sexe` = '$new_sexe', `age` = '$new_age', `poids` = '$new_poids', `taille` = '$new_taille' WHERE (`id_p` = '$id');";
            $result=mysqli_query($con,$query);
            $succes="Vos informations sont bien changées!";
            array_push($succesMessages,$succes);
            if($result){
                header("refresh: 3");
            }
            else{
                die("there is error");
            }

        }
        
        
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètre | MyGym</title>
    <link rel="stylesheet" href="./styles/dashboard.css">
    <link rel="stylesheet" href="./styles/setting.css">
    
</head>
<body>
    <div class="container">
<?php include('sidebar.php'); ?>

<div class="right-side">
    <div class="name">Mes informations :</div>
    <div class="fields-container">

    <!-- error message -->
    <?php foreach($errorMessages as $key): ?> 
            <p class="errorMessage"> <i class="fal fa-exclamation-triangle"></i> <?= $key; ?></p>    
        <?php endforeach; ?>

        <!-- success message -->
        <?php foreach($succesMessages as $key): ?> 
            <p class="succesMessage"> <i class="far fa-check-circle"></i> <?= $key; ?></p>    
        <?php endforeach; ?>

    <form method="POST">
        <p>Sélectionnez votre sexe :</p>
                    <div class="check-container">
                        

                        <label class="option_item">
                            <input type="checkbox" id="male" class="checkbox" value="M" checked name="sexe" onclick="checkMale()">
                            <div class="option_inner   selected">
                                <div class="name">Mâle</div>
                            </div>
                        </label>

                        <label class="option_item " id="rightCheckbox" >
                            <input type="checkbox" id="female" class="checkbox" value="F" name="sexe" onclick="checkFemale()" >
                            <div class="option_inner selected">
                                <div class="name">Femelle</div>
                            </div>
                        </label>    
                    </div>

        <p class="input">
            <label for="taille">Poids :</label><br>
            <div class="inputPass">
                <input maxlength="3" pattern="[0-9]+" type="text"  name="poids" id="poids" placeholder="Tapez votre poids" value="<?php echo $poids ?>" required>
                <p class="setNext">Kg</p>
            </div>
        </p>

        <p class="input">
            <label for="taille">Taille :</label><br>
            <div class="inputPass">
                <input maxlength="3" pattern="[0-9]+" type="text"  name="taille" id="taille" placeholder="Tapez votre taille" value="<?php echo $taille ?>" required>
                <p class="setNext">Cm</p>
            </div>
        </p>

        <p class="input">
            <label for="taille">Age :</label><br>
            <div class="inputPass">
                <input maxlength="3" pattern="[0-9]+" type="text"  name="age" id="age" placeholder="Tapez votre age" value="<?php echo $age ?>" required>
                <p class="setNext">Ans</p>
            </div>
        </p >
        </div>

        <button value="modifier" type="submit">Modifier</button>

    </div>
    </form>
</div>
    

<script src="./js/font-awesome.js"></script>
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