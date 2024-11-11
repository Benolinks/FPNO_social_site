<?php

require 'database.php';
session_start();

if (isset($_POST['submit'])) {

    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $reg_number = filter_var($_POST['reg_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $file = $_FILES['file'];

    // echo( $firstname . '</br>'. $lastname . '</br>'. $email . '</br>'. $department .  '</br>'. $reg_number .  '</br>'. $password . '</br>');

    // var_dump($file);

    if (!$firstname || !$lastname || !$email || !$department || !$reg_number || !$file  || !$password) {
        header('location:' . 'signup.php');
        $_SESSION['signup'] = 'please enter  valid inputs';
      $_SESSION['signup-data']= $_POST;
        
    }

    // check if user already exists


    $check_sql = "SELECT * FROM `signon` WHERE  `reg_number`='$reg_number' LIMIT 1";

    $check_result = mysqli_query($connection, $check_sql);


    if ((mysqli_num_rows($check_result) == 1)) {
        $_SESSION['signup1'] = 'User account already';
        header('location:' . 'signup.php');
    } else {

        if (strlen($password) < 8) {
            $_SESSION['signup2'] = 'Password must be 8 characters ';
            header('location:' . 'signup.php');
        } else {



            // insert file

            $time = time();
            $file_name = $time . $file['name'];

            $file_tmp_name = $file['tmp_name'];

            $file_path = 'images/' . $file_name;

            $allowed_files = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG'];

            $extension = explode('.', $file_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {

                // uplod image

                move_uploaded_file($file_tmp_name, $file_path);

                // insert into database 
                $sql = "INSERT INTO `signon`( `firstname`, `lastname`, `email`, `department`, `reg_number`, `file`, `password`) VALUES ('$firstname','$lastname','$email','$department','$reg_number','$file_name','$password')";

                $result = mysqli_query($connection, $sql);

                if (!mysqli_error($connection)) {
                    header('location:' . 'signin.php');
                } else {
                    header('location:' . 'signup.php');
                }
            } else {
                header('location:' . 'signup.php');
            }
        }
    }
} else {
    header('location:' . 'signup.php');
}
