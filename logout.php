<?php

require 'database.php';

session_unset();
session_destroy();
unset($_SESSION['user_id']);

header('location:'. 'signin.php');




?>