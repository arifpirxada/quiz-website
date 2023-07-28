<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="images/quiz.png">
</head>

<body class="noOverFlow bodycolor">
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

               
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>

    <?php } ?>

   
    <div class="formcontainer">

        <div class="myform logForm" style="height: 36vh">
            <h5 class="heading-font logHeading  mx-2">Login to our website</h5>
            <div class="mb-3 signcontent">

                <label for="loginInputEmail1" style="margin-left: -145%;" id="loginEmail"
                    class="form-label  logLabel cursor-ptr">Email address</label>
                <input type="email" required class="loginItem cursor-ptr" style="left: 7%;" id="loginInputEmail1"
                    aria-describedby="emailHelp">
                <hr class="loghr">
            </div>
            <div class="mb-3 signcontent">
                <label for="loginInputPassword1" id="loginPassword" style="margin-left: -163%;"
                    class="form-label logLabel  cursor-ptr">Password</label>
                <input type="password" required class="loginItem cursor-ptr" style="left: 7%;" id="loginInputPassword1">
                <hr class="loghr">
            </div>
            <button style="margin-left: 37%;" class="btn btn-primary logbtn">Login</button>
        </div>
    </div>
    <div class="alertdiv">
    </div>

    <!--<img src="images/white-bc.jpg" class="logImg" alt="">-->
    <!--<img src="images/mbbc.jpg" class="imager logImager" alt="">-->

   
    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>