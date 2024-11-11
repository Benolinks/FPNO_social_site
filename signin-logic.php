<?php

require 'database.php';
session_start();


// if (!isset($_SESSION['user_id'])) {
    
//     header('location:'. 'signin.php');
// }else {
    




if (isset($_POST['submit'])) {

    $reg_number = filter_var($_POST['reg_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$reg_number || !$password) {
        header('location:' . 'signin.php');
        $_SESSION['signin'] = 'please enter  valid inputs';
        $_SESSION['signin-data'] = $_POST;
    }

    // check if user already exists


    $check_sql = "SELECT * FROM `signon` WHERE  `reg_number`='$reg_number' LIMIT 1";

    $check_result = mysqli_query($connection, $check_sql);


    if ((mysqli_num_rows($check_result) == 1)) {

        $user_query = mysqli_fetch_assoc($check_result);
        // $user_query['id'] = $_SESSION['user_id'];
        // $user_id = $_SESSION['user_id'];


        if ($user_query['password'] == $password) {
           $_SESSION['user_id'] =  $user_query['id'];
           $_SESSION['user_name'] = $user_query['firstname'];
           $_SESSION['image'] = $user_query['image'];
           
          
        // $user_id = $_SESSION['user_id'];
        $user_query= $id;
       

            $sql = "INSERT INTO `logon`( `user_id`, `Reg_number`, `password`) VALUES ('$id','$reg_number','$password')";
            $result = mysqli_query($connection, $sql);
            header('location:' . 'index.php');
        } else {
            $_SESSION['signin'] = 'user not found or incorrect inputs';
            header('location:' . 'signin.php');
        }
    }else{
         header('location:' . 'signin.php');
         $_SESSION['signin'] = 'user not found or incorrect inputs';
    }
} else {
    header('location:' . 'signin.php');
}
