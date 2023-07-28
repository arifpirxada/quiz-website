<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Quiz app</title>
    <link rel="icon" href="images/quiz.png">
</head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="bot/css/bootstrap.min.css">


<body class="noOverFlowx">
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
                <form action="search.php" method="get" class="d-flex" role="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
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
                        <?php
                        if ($_SESSION['user'] == "test@gmail.com") {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin/addCat.php?insert=addcate">Admin</a>
                            </li>
                        <?php } ?>




                    </ul>
                    <form action="search.php" method="get" class="d-flex" role="search">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

    <?php } ?>


    <!-- Show search results -->

    <?php
    
    include "dbconn.php";

    if (isset($_GET['search'])) {
        $searched = $_GET['search'];
        ?>
        <h3 class="text-center my-4 explore-font">Search results for: "<?php global $searched; echo $searched ?>"
        </h3>
        <div class="row catItems">

        <?php

        $sql = "SELECT * FROM techs WHERE MATCH (tech_name,tech_desc) against ('$searched')";
        $result = mysqli_query($conn, $sql);
        $noresult = true;
        while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            ?>

                <div class="card text-center mb-4 mx-5" style="width: 18rem">
                    <div class="card-body">
                        <img class="rounded" height="212px" width="211px" src="images/catimgs/<?php echo $row['tech_image'] ?>"
                            alt="">
                        <div class="mycardtext">
                            <h5 class="card-title text-light">
                                <?php echo $row['tech_name'] ?>
                            </h5>
                            <a href="takequiz.php?node=<?php echo $row['tech_sno'] ?>" class="btn btn-primary mybtn">Take
                                Quiz</a>
                        </div>
                    </div>
                </div>
                    
                    
                    <?php } ?>
                    
            </div>
        <?php
        if ($noresult) {
            ?>

            <div class="jumbotron">
                <h1 class="display-6 text-center">No result found!</h1>
                <p class="lead text-center">Sorry! the category does not exist or try searching different keywords</p>
                <hr class="my-4">
                <p class="text-center">We will be adding the category you searched for as soon as possible. So, stay tuned.</p>
                <p class="lead text-center">
                    <a class="btn btn-primary btn-lg" href="index.php" role="button">Ok</a>
                </p>
            </div>
            <?php

        }
    } ?>

    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>