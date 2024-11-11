<?php
require 'database.php';
session_start();

// Check if user is signed in
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `signon` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql);
    $user_query = mysqli_fetch_assoc($result);
}

// Retrieve posts from the database
$show_sql = "SELECT * FROM `post` ORDER BY  `id` DESC"; 
$show_result = mysqli_query($connection, $show_sql);
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
                <div class="aside">
                    <div class="head_btn"><button class="upper_btn" type="submit"><a href="./logout.php" class="a">Logout</a></button></div>
                    <div class="head_img"><img class="upper_img" src="<?= 'images/' . $user_query['file'] ?>" alt=""></div>
                </div>
            </div>
        </header>

        <main>
            <div class="cover">
                <img src="./Resource/cover_photo.webp" alt="" class="cover_photo">
            </div>

            <div class="profile">
                <img src="<?= 'images/' . $user_query['file'] ?>" alt="" class="profile_img">
                <div class="be">
                    <h3 class="na"><?= $user_query['firstname'] . " " . $user_query['lastname'] ?></h3>
                </div>
            </div>

            <div class="mash"></div>

            <!-- Post Section -->
            <div class="area">
                <form action="post.php" method="post" enctype="multipart/form-data">
                    <input type="text" class="inn" name="post" id="" placeholder="Write something"><br><br>
                    <div class="file_message">Upload a file <input type="file" name="file" id=""></div>
                    <div class="bit"><button type="submit" name="submit" class="bite">Post</button></div>
                </form>
            </div>
        </main>

        
        <hr class="hr">
        <hr class="hr">


        <caption>
            <?php while ($row = mysqli_fetch_assoc($show_result)): ?>
                <div class="area1">
                    <div class="head_img1">
                        <img src="./Resource/user_image.png" class="head_img2" alt="">


                        <p class="name"><?= htmlspecialchars($row['user_name'])?></p>
                    </div>
                    <div class="text">
                        <p class="texts"><?= htmlspecialchars($row['post']) ?></p>
                    </div>
                    <?php if (!empty($row['file'])): ?>
                        <div class="content">
                            <img  class="iv" src="<?= 'image/' . htmlspecialchars($row['file']) ?>" alt="<?= htmlspecialchars($row['file']) ?>" class="content1">
                            <br><br>

                            <div class="down"><a href="<?= 'image/' . htmlspecialchars($row['file']) ?>" class="download">Download</a></div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </caption>
    </div>

    <script src="./main.js"></script>
</body>
</html>

