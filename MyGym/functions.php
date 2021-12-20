<?php

    function check_login($con){

        if(isset($_SESSION['id_p'])){

            $id = $_SESSION['id_p'];
            $query = "select * from user where id_p= $id limit 1";

            $result = mysqli_query($con,$query);

            if($result && mysqli_num_rows($result) >0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }else{
            //back to login
        header("Location: login.php");
        }   
    }


    $succesMessages=array();
    $errorMessages=array();
