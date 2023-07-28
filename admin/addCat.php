<?php
session_start();
if(!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true){
    header("location: ../index.php");
} else if ($_SESSION['user'] == "Test@gmail.com") {
    
} else {
    header("location: ../index.php");
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="images/quiz.png">
</head>

<link rel="stylesheet" href="../bot/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">

<body class="bg-primary">

    <nav style="border-bottom: 3px #1dfff2 groove;" class="navbar navbar-expand-lg bg-body-tertiary py-0">
        <div class="container-fluid navbar-dark bg-primary py-1">
            <a class="navbar-brand" href="../index.php"><img src="../images/quiz.png" height="30px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto navbar-nav-scroll" style="--bs-scroll-height: 180px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="addCat.php?insert=addcate">Admin</a>
                    </li>



                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-warning"><a class="nav-link" href="addCat.php?insert=delcat">Delete category</a></button> 
                    <button class="btn btn-outline-warning mx-2"><a class="nav-link" href="addCat.php?insert=delquest">Delete Question</a></button>
                </form>
            </div>
        </div>
    </nav>

    <?php
    include "../dbconn.php";

    if (!isset($_GET['insert'])) {
        echo "<p class='text-center bg-warning'>Page not found</p>";
    } else if ($_GET['insert'] == 'addcate') {

        $notAllowed = false;
        $err = false;
        $bigSize = false;
        $success = false;
        $catExists = false;

        if (isset($_POST['submit'])) {


            $cat = investigate($conn, $_POST['techtype']);
            $sql = "SELECT * FROM `techs` WHERE tech_name = '$cat'";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                $showcat = "unable to fetch categories";
            }
            $exists = mysqli_num_rows($result);
            if ($exists > 0) {
                global $catExists;
                $catExists = true;
            } else {

                $catdesc = $_POST['techdesc'];

                $file = $_FILES['techimg'];

                $fname = $file['name'];
                $ftmp_name = $file['tmp_name'];
                $fsize = $file['size'];
                $ferror = $file['error'];
                $ftype = $file['type'];

                $fext = explode('.', $fname);
                $factext = strtolower(end($fext));

                $ftypes = array('jpeg', 'jpg', 'png');


                if (in_array($factext, $ftypes)) {
                    if ($ferror === 0) {
                        if ($fsize < 5242880) {
                            $factname = $cat . "." . $factext;
                            $fpath = '../images/catimgs/' . $factname;
                            move_uploaded_file($ftmp_name, $fpath);

                            global $cat;
                            global $catdesc;

                            $sql = "INSERT INTO techs (tech_name, tech_desc, tech_image, tech_questnum) VALUES ('$cat', '$catdesc', '$factname', 0)";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                $insertfail = "<div class='alert alert-success text-center' role='alert'>
                                                    Sorry! insertion was unsuccessful! 
                                                    ".mysqli_error($conn)."</div>";
                            }
                            else {
                                global $success;
                                $success = true;
                            }
                            
                        } else {
                            global $bigSize;
                            $bigSize = true;
                        }
                    } else {
                        global $err;
                        $err = true;
                    }
                } else {
                    global $notAllowed;
                    $notAllowed = true;
                }
            }

        }
        global $showcat;
        echo $showcat;
        global $insertfail;
        echo $insertfail;
        global $factname;


        global $catExists;
        global $notAllowed;
        global $success;
        global $bigSize;
        global $err;

        if ($catExists) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Category already exists!
          </div>';
        } else if ($notAllowed) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Please provide a valid image!
          </div>';
        } else if ($err) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Sorry some technical issue, try again later!
          </div>';
        } else if ($bigSize) {
            echo '<div class="alert alert-danger text-center" role="alert">
            Your image size is too big!
          </div>';
        } else if ($success) {
            echo "<div class='alert alert-success text-center' role='alert'>
            Category has been successfully added!
          </div>";
        }

        ?>


            <div style="height: 80vh;" class="d-flex justify-content-center align-items-center">
                <div class="row col-lg-4">


                    <form action="addCat.php?insert=addcate" method="POST" enctype="multipart/form-data"
                        class="text-center bg-light">
                        <h4 class="adminformhead mt-3">Add Category</h4>
                        <div class="mb-3 mt-2">
                            <label for="techType" class="form-label">Category</label>
                            <input type="text" class="form-control" id="techType" name="techtype" aria-describedby="emailHelp">
                            <div class="form-text">Please provide a suitable title.</div>
                        </div>
                        <div class="mb-3">
                            <label for="techdesc" class="form-label">Category Description</label>
                            <textarea class="form-control" name="techdesc" id="techdesc"></textarea>
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="techimg" class="form-label">Add Image</label>
                            <div style="margin: -11px 0px 11px 0px;" class="form-text">Image size should be less than 5Mb.</div>
                            <input type="file" required class="form-control" id="techimg" name="techimg">
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary mb-4">Add Category</button>
                        <div class="d-flex justify-content-center">

                            <p class="mx-1">want to add questions?</p>
                            <a style="text-decoration: none;" href="addCat.php?insert=addquest">add questions</a>
                        </div>
                    </form>

                </div>
            </div>
        <?php
    } else if ($_GET["insert"] == 'addquest') {


        if (isset($_POST['submit'])) {
            $question = investigate($conn, $_POST['writequest']);
            $rightans = investigate($conn, $_POST['rightans']);
            $secondans = investigate($conn, $_POST['secondans']);
            $thirdans = investigate($conn, $_POST['thirdans']);
            $fourthans = investigate($conn, $_POST['fourthans']);
            $questCat = investigate($conn, $_POST['questCat']);

            if ($questCat == 'Select Category' || $questCat == "") {
                $optionselect = '<div class="alert alert-danger text-center" role="alert">
                Please select a Category!
              </div>';
            } else {
                global $question;
                global $rightans;
                global $secondans;
                global $thirdans;
                global $fourthans;
                global $questCat;

                $sql = "INSERT INTO `quiz_questions` (`q_question`, `q_answer`, `q_ans1`, `q_ans2`, `q_ans3`, `q_techtype`) VALUES ('$question', '$rightans', '$secondans', '$thirdans', '$fourthans', '$questCat')";
                $result = mysqli_query($conn, $sql);
                $questinsert = '<div class="alert alert-success text-center" role="alert">
                Question has been successfully added!
              </div>';

              
            }

            // Checking if the category already has 10 question

            $sql = "SELECT * FROM `quiz_questions` WHERE q_techtype = '$questCat'";
            $result = mysqli_query($conn, $sql);

            $num = mysqli_num_rows($result);
            if ($num == 10 || $num > 10) {
                global $questCat;
               $sql = "UPDATE `techs` SET `tech_questnum` = '10' WHERE `techs`.`tech_name` = '$questCat'";
               $result = mysqli_query($conn,$sql);

            }

        }

        global $optionselect;
        echo $optionselect;
        global $questinsert;
        echo $questinsert;


        ?>

                <!-- for adding questions -->
                <div style="height: 100vh;" class="d-flex justify-content-center align-items-center">
                    <div class="row col-lg-4 col-md-6 col-sm-7 col-9">


                        <form action="addCat.php?insert=addquest" method="post" class="text-center bg-light">
                            <h4 class="adminformhead mt-3">Add Questions</h4>


                            <div class="mb-3 mt-2">
                                <label for="writequest" class="form-label">Write a question</label>
                                <textarea required="required" class="form-control" id="writequest" name="writequest"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rightans" class="form-label">Enter Right option</label>
                                <input type="text" required class="form-control" id="rightans" name="rightans"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="secondans" class="form-label">Enter Second option</label>
                                <input type="text" required class="form-control" id="secondans" name="secondans"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="thirdans" class="form-label">Enter Third option</label>
                                <input type="text" required class="form-control" id="thirdans" name="thirdans"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="fourthans" class="form-label">Enter Fourth option</label>
                                <input type="text" required class="form-control" id="fourthans" name="fourthans"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">

                                <select required name="questCat" class="form-select" aria-label="Default select example">
                                    <option selected class="text-center">Select Category</option>
                                <?php


                                $sql = "SELECT * FROM `techs` WHERE tech_questnum < 10";
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);

                                if ($num > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                            <option class="text-center" value="<?php echo $row['tech_name'] ?>">
                                        <?php echo $row['tech_name'] ?>
                                            </option>

                                    <?php
                                    }
                                } else {
                                    $catnotExists = true;
                                }

                                ?>
                                </select>
                                <div id="techHelp" class="form-text">Don't forgot to add 10 questions for each category.</div>
                            </div>

                        <?php
                        global $catnotExists;
                        if ($catnotExists) {
                            echo '<div class="d-flex justify-content-center">
                                <p class="mx-1">No category found without questions?</p>
                                <a style="text-decoration: none;" href="addCat.php?insert=addcate">add category</a>
                            </div>';
                        } else {


                            ?>


                                <button type="submit" name="submit" class="btn btn-primary mb-4">Add Question</button>
                                <div class="d-flex justify-content-center">

                                    <p class="mx-1">want to add category?</p>
                                    <a style="text-decoration: none;" href="addCat.php?insert=addcate">add category</a>
                                </div>
                    <?php } ?>
                        </form>

                    </div>
                </div>



    <?php } else if ($_GET['insert'] == 'delcat') {

        // Php to delete the category
    
        if (isset($_POST['submit'])) {
            $delcat = investigate($conn, $_POST['seldelcat']);
            if (isset($_POST['catquestions'])) {
                $catquestions = investigate($conn, $_POST['catquestions']);
            }

            if ($delcat == 'Select Category' || $delcat == "") {
                $catselect = '<div class="alert alert-danger text-center" role="alert">
            Please select a Category!
        </div>';
            } else {
                global $delcat;
                global $catquestions;

                $sql = "DELETE FROM `techs` WHERE `techs`.`tech_name` = '$delcat'";
                $result = mysqli_query($conn, $sql);

                $cataddsuccess = '<div class="alert alert-success text-center" role="alert">
                Category ' . $delcat . ' has been deleted successfully!
            </div>';

                if ($catquestions == "withquestions") {

                    global $delcat;
                    global $cataddsuccess;
                    $sql = "DELETE FROM `quiz_questions` WHERE `quiz_questions`.`q_techtype` = '$delcat'";
                    $result = mysqli_query($conn, $sql);

                    $cataddsuccess = '<div class="alert alert-success text-center" role="alert">
                    Category has been deleted successfully with questions!
                </div>';
                }


            }

        }

        global $catselect;
        echo $catselect;
        global $cataddsuccess;
        echo $cataddsuccess;


        ?>

                    <div style="height: 80vh;" class="d-flex justify-content-center align-items-center">
                        <div class="row col-lg-4">


                            <form action="addCat.php?insert=delcat" method="POST" class="text-center bg-light">
                                <h4 class="adminformhead mt-3">Delete Category</h4>

                                <select name="seldelcat" class="form-select mt-3" aria-label="Default select example">
                                    <option class="text-center" selected>Select Category</option>
                            <?php
                            $sql = "SELECT * FROM `techs`";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                            <option class="text-center" value="<?php echo $row['tech_name'] ?>">
                                    <?php echo $row['tech_name'] ?>
                                            </option>

                                <?php
                                }
                            }
                            ?>
                                </select>
                                <div class="form-check my-3">
                                    <input name="catquestions" style="float: none; border: 1px solid #232cb8;" class="form-check-input"
                                        type="checkbox" value="withquestions" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Delete questions also
                                    </label>
                                </div>


                                <button type="submit" name="submit" class="btn btn-primary mb-4">Delete Category</button>
                                <div class="d-flex justify-content-center">

                                    <p class="mx-1">want to add category?</p>
                                    <a style="text-decoration: none;" href="addCat.php?insert=addcate">add category</a>
                                </div>
                            </form>

                        </div>
                    </div>



    <?php } else if ($_GET['insert'] == 'delquest') {


        if (isset($_POST['submit'])) {
            $cattype = investigate($conn, $_POST['cattype']);
            $delquests = investigate($conn, $_POST['delquests']);

            if ($delquests == 'Select Question' || $delquests == "") {
                $questselect = '<div class="alert alert-danger text-center" role="alert">
    Please select a Question!
</div>';
            } else {
                global $delquests;
                global $cattype;

                $sql = "DELETE FROM `quiz_questions` WHERE q_question = '$delquests' AND q_techtype = '$cattype'";
                $result = mysqli_query($conn, $sql);

                $catadelsuccess = '<div class="alert alert-success text-center" role="alert">
        Question deleted successfully!
    </div>';
            }

        }

        global $questselect;
        echo $questselect;
        global $catdelsuccess;
        echo $catdelsuccess;



        ?>
                        <div style="height: 80vh;" class="d-flex justify-content-center align-items-center">
                            <div class="row col-lg-4">


                                <form action="addCat.php?insert=delquest" method="POST" class="text-center bg-light">
                                    <h4 class="adminformhead mt-3">Delete Questions</h4>
                                    <select name="cattype" class="form-select mt-3" onchange="showquestions(this.value)"
                                        aria-label="Default select example">
                                        <option class="text-center" selected>Select Category</option>
                            <?php
                            $sql = "SELECT * FROM `techs`";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            if ($num > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                                <option class="text-center" value="<?php echo $row['tech_name'] ?>">
                                    <?php echo $row['tech_name'] ?>
                                                </option>

                                <?php
                                }
                            }
                            ?>
                                    </select>

                                    <select name="delquests" class="form-select my-4 showCatQuestions" aria-label="Default select example">
                                        <option class="text-center" selected>Select Question</option>

                                    </select>


                                    <button type="submit" name="submit" class="btn btn-primary mb-4">Delete Question</button>
                                    <div class="d-flex justify-content-center">

                                        <p class="mx-1">want to add category?</p>
                                        <a style="text-decoration: none;" href="addCat.php?insert=addquest">add questions</a>
                                    </div>
                                </form>

                            </div>
                        </div>

    <?php } ?>
    <script src="../bot/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

    <script>
        function showquestions(selectedcat) {
            let data = {
                'selcat': selectedcat
            }
            jsondata = JSON.stringify(data)
            fetch("getQuest.php", {
                method: "POST",
                body: jsondata,
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then((res) => res.text())
                .then((data) => {
                    let showcathere = document.querySelector(".showCatQuestions")
                    showcathere.innerHTML = "<option class='text-center' selected>Select Question</option>" + data
                })
        }
    </script>

</body>

</html>