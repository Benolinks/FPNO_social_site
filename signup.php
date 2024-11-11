<?php

require 'database.php';

session_start();

$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$department = $_SESSION['signup-data']['department'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$reg_number = $_SESSION['signup-data']['reg_number'] ?? null;


unset($_SESSION['signup-data']);




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Social app</title>
</head>

<body>

    <div class="all">

        <!-- <input type="color" name="" id=""> -->
        <!-- header section  -->
        <header>
            <div class="logo_section">
                <div class="federal">
                    <img src="./Resource/fpno.png" alt="" class="federal1">
                </div>


                <div class="logo"> 
                    <h1 class="fpn">FPNO </h1>
                    <div class="column">
                        <h1 class="col1">social </h1>
                        <h1 class="col3">app </h1>

                    </div>
                </div>
                <div class="why"></div>
            </div>
        </header>

        <form action="signup-logic.php" method="post" enctype="multipart/form-data">

            <div class="form">
                <div class="form_clipath">

                    <div class="initials">
                        <div class="initial">
                            <h2 class="int">Signup Form</h2>

                        </div>
                    </div>

                    <div class="final">
                        <br>
                        <?php
                        if (isset($_SESSION['signup'])) : ?>

                            <div class="danger">
                                <?= $_SESSION['signup'];
                                unset($_SESSION['signup']);
                                ?>
                            </div>

                        <?php
                        elseif (isset($_SESSION['signup1'])) : ?>
                            <div class="danger">
                                <?= $_SESSION['signup1'];
                                unset($_SESSION['signup1']);
                                ?>
                            </div>
                        <?php
                        elseif (isset($_SESSION['signup2'])) : ?>
                            <div class="danger">
                                <?= $_SESSION['signup2'];
                                unset($_SESSION['signup2']);
                                ?>
                            </div>

                        <?php endif ?>
                        <br>

                        <input type="text" class="inputs" name="firstname" id="" placeholder="Firstname" value="<?= $firstname ?>"><br><br>
                        <input type="text" class="inputs" name="lastname" id="" placeholder="lastname" value="<?= $lastname ?>"><br><br>
                        <input type="email" class="inputs" name="email" id="" placeholder="Email" value="<?= $email ?>"><br><br>
                        <input type="text" class="inputs" name="department" id="" placeholder="Department" value="<?= $department ?>"><br><br>
                        <input type="text" class="inputs" name="reg_number" id="" placeholder="Application or Reg Number" value="<?= $reg_number ?>"><br><br>
                        <div class="inpu"><input type="file" class="inputs" name="file" id="" placeholder="Students image"></div><br><br>
                        <input type="password" class="inputs" name="password" id="" placeholder="Password"><br><br>
                        <div class="sub"> <input type="submit" class="submit" name="submit" value="Sign up"></div> <br><br>

                        <p class="already">Already have an account? <a class="a" href="./signin.php">Signin</a></p>

                    </div>
                </div>

            </div>
        </form>
    </div>

    <script src="./main.js"></script>
</body>

</html>