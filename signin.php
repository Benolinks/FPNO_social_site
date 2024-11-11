



<?php

require 'database.php';
session_start();



$reg_number = $_SESSION['signin-data']['reg_number'] ?? null;


unset($_SESSION['signin-data']);
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

        <form action="signin-logic.php" method="post">

            <div class="form">
                <div class="form_clipath">

                    <div class="initials2">
                        <div class="initial2">
                            <h2 class="int">Signin Here</h2>

                        </div>
                    </div>

                    <div class="final">
                        <br>

                        <?php
                        if (isset($_SESSION['signin'])) : ?>
                            <div class="danger">
                                <?= $_SESSION['signin'];
                                unset($_SESSION['signin']);
                                ?>
                            </div>

                        <?php endif ?>

                        <br><br>

                        <input type="text" class="inputs" name="reg_number" id="" placeholder="Reg number or staff Id" value="<?= $reg_number ?>"><br><br>

                        <input type="password" class="inputs" name="password" id="" placeholder="Password" ><br><br>
                        <div class="sub"> <input type="submit" class="submit" name="submit" value="Sign in"></div> <br><br>

                        <p class="already">Dont have an account? <a class="a" href="./signup.php">Signup</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- javascript code to refresh on history changes -->
    <script>
    window.addEventListener('popstate', function(event) {
  
    location.reload();
});

</script>
    <script src="./main.js"></script>
</body>

</html>