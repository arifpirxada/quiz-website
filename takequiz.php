<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>start quiz</title>
    <link rel="icon" href="images/quiz.png">
</head>

<body>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bot/css/bootstrap.min.css">

    <?php
    if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {

        echo '<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
        <div class="container-fluid navbar-dark bg-primary py-1">
            <a class="navbar-brand" href="index.php"><img src="images/quiz.png" height="30px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto navbar-nav-scroll" style="--bs-scroll-height: 180px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">sign up</a>
                </li>
                   
                 </ul>
            </div>
        </div>
    </nav>';



    } else {


        ?>
        <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
            <div class="container-fluid navbar-dark bg-primary py-1">
                <a class="navbar-brand" href="index.php"><img src="images/quiz.png" height="30px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto navbar-nav-scroll" style="--bs-scroll-height: 180px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">logout</a>
                        </li>
                        
                    </ul>

                </div>
            </div>
        </nav>


        <?php
    }
    include "dbconn.php";

    $techsno = $_GET['node'];
    $sql = "SELECT * FROM `techs` WHERE `tech_sno`='$techsno'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Some technical issue! ";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="jumbotron mx-5 text-center my-5">
           <h1 class="display-4">' . $row["tech_name"] . '</h1>
           <p class="lead">' . $row["tech_desc"] . '</p>
           <hr class="my-4">
           <p>You will be given unlimeted time for every question.<br> Do not cheat, instead test your knowledge and you must not use any device during a quiz competition.</p>';
        if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
            echo '<a class="btn btn-primary btn-lg" href="signup.php" role="button">Get Started</a>';
        } else {
            echo '<a class="btn btn-primary btn-lg" href="questions.php?type=' . $row["tech_name"] . '" role="button">Get Started</a>';
        }
        echo '</div>';
    }

    ?>


    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>