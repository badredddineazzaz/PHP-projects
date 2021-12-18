<?php

$errorIcon = '<i class="fal fa-exclamation-triangle"></i>';
    function check_login($con){

        if(isset($_SESSION['id_p'])){

            $id = $_SESSION['id_p'];
            $query = "select * from user where id_p= $id limit 1";

            $result = mysqli_query($con,$query);

            if($result && mysqli_num_rows($result) >0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        //back to login
        header("Location: login.php");
        die;
    }


    $errorMessages=array();