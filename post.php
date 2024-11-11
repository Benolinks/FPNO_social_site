<?php

require 'database.php';
session_start();




if (isset($_POST['submit'])) {

    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $user =$_SESSION['user_name'];
        $image = $_SESSION['image']; 
        $sql = "SELECT * FROM `signon` WHERE `id`= '$id'";
        $result = mysqli_query($connection, $sql);
        $user_query = mysqli_fetch_assoc($result);
        $info = $user_query['id'];
        $user_query['firstname'];
    
   
    $post = filter_var($_POST['post'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

   $file = $_FILES['file'];

     // insert file

     $time = time();
     $file_name = $time . $file['name'];

     $file_tmp_name = $file['tmp_name'];

     $file_path = 'image/' . $file_name;

     $allowed_files = ['png', 'PNG', 'jpg', 'JPG', 'jpeg', 'JPEG','doc','DOC','pdf','PDF','XXLS','xxls','docx','DOCX','pptx','PPTX','mp4','MP4'];

     $extension = explode('.', $file_name);
     $extension = end($extension);

     if (in_array($extension, $allowed_files)) {

         // uplod image

         move_uploaded_file($file_tmp_name, $file_path);

        //  INSERT INTO `post`(`id`, `user_name`, `user_id`, `post`, `file`, `image`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')


        $post_sql = "INSERT INTO `post` (`user_name`, `user_id`, `post`, `file` , `image`) VALUES ('$user','$info','$post','$file_name', '$image' )";

        // echo $info. '</br>';
        // echo $post .'</br>';
        // var_dump($file_name ) .'</br>';

        $post_result = mysqli_query($connection, $post_sql);

        if (!mysqli_error($connection)) {
            header('location:' . 'index.php');
        } else {
            header('location:' . 'index.php');
        }


        













     }else {
        header('location:'. 'index.php');
     }

    }
}else {
    header('location:'. 'index.php');
}




?>