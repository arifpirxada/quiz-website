<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email_otp = $_POST['email_otp'];
    echo $email_otp;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
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
                   
                </div>
            </div>
        </nav>

    <?php } ?>
    <div class="formcontainer">

        <form class="myform signupForm" action=<?php echo $_SERVER['PHP_SELF'] ?> method="POST">
            <h5 style="left: 11%" class="heading-font logHeading mx-2">Verify Your Email</h5>

            <div class="mb-3 signcontent">
                <label for="signInputEmail1" style="margin-left: -154%;" class="form-label logLabel cursor-ptr">Enter Otp</label>
                <input type="number" required class="loginItem cursor-ptr" name="email_otp" aria-describedby="emailHelp">
                <hr style="width:200px" class="loghr evenwidth">
            </div>

            <button class="btn btn-primary" style="margin-left: 37%;" id="signupbtn">Verify</button>

        </form>
    </div>
    <div class="alertdiv">
    </div>
    <!--<img src="images/white-bc.jpg" class="logImg" alt="">-->
    <!--<img src="images/mbbc.jpg" class="imager logImager signupImager" alt="">-->


    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>