<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link rel="icon" href="images/quiz.png">
</head>

<body class="noOverFlow">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bot/css/bootstrap.min.css">

    <?php
    if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {

        echo '<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
        <div class="container-fluid navbar-dark bg- py-primary 1">
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


        <!-- Modal for showing answers -->


        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ansmodal">See Answers</button> -->

        <div class="modal fade" id="ansmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">The answers are:</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ansmodalcolor">

                        <?php

                        include "dbconn.php";


                        $catType = $_GET['type'];
                        $sql = "SELECT * FROM `quiz_questions` WHERE q_techtype = '$catType'";
                        $result = mysqli_query($conn, $sql);

                        $sno = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo $sno; 
                            echo ". ";
                            echo $row['q_question'];
                            echo "<br>";
                            echo "<p class='text-center mt-2 mb-0'>";
                            echo "Answer: ";
                            echo $row['q_answer'];
                            echo "</p>";
                            echo "<br>";
                            echo "<hr>";
                            $sno = $sno + 1;
                    
                        }


                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ends here -->


        <!-- Modal for showing please select and option -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Please select an option</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Attempt all questions even if you don't know the answer
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Ends -->

        <?php
    }


    // php to check whether he had already left uncompleted quiz
    
    $currentEmail = $_SESSION['user'];
    $techname = $_GET['type'];


    $sql = $conn->prepare("SELECT * FROM `quiz_answers` WHERE `user_id` = ? and `question_type` = ?");
    $sql->bind_param("ss", $currentEmail, $techname);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    $tookTest = false;
    $fullTook = false;
    $answerGiven = count($result);
    if ($answerGiven > 0 && $answerGiven < 10) {
        global $tookTest;
        $tookTest = true;
    } else if ($answerGiven == 10 || $answerGiven > 10) {
        global $fullTook;
        $fullTook = true;
    }


    echo '<input type="hidden" class="questType" value="' . $techname . '">';


    $sql = "SELECT * FROM `quiz_questions` WHERE `q_techtype`='$techname'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Some technical issue! in selection";
    }
    ?>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" class="active"
                aria-current="true" aria-label="Slide 6"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                aria-label="Slide 7"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                aria-label="Slide 8"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="8"
                aria-label="Slide 9"></button>
            <button hidden type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="9"
                aria-label="Slide 10"></button>
        </div>
        <div class="carousel-inner mycarousal">
            <?php

            $numbers = [];

            while (count($numbers) < 4) {
                $randomNumber = rand(0, 3);
                if (!in_array($randomNumber, $numbers)) {
                    $numbers[] = $randomNumber;
                }
            }

            $num = mysqli_num_rows($result);

            if ($num > 0) {
                $optionid = 1;
                $act = "active";
                while ($row = mysqli_fetch_assoc($result)) {


                    $questOption = [$row['q_answer'], $row['q_ans1'], $row['q_ans2'], $row['q_ans3']];
                    // echo $questOption[$numbers[0]];


                    global $act;
                    global $optionid;
                    global $fullTook;

                    if ($fullTook) {
                        echo '<div class="carousel-item active">
                                <img src="images/white-bc.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block carousel-text" style="z-index: 1">
                                    <h5 class="heading-font">You already took the test</h5>
                                    <button class="btn btn-primary my-2 takeAgainbtn" onclick="retake()">Take again</button>
                                    <a href="index.php" class="btn btn-primary my-2">Home</a>
                                </div>
                            </div>';
                            break;
                    } else {

                        $numbers = [];

                        while (count($numbers) < 4) {
                            $randomNumber = rand(0, 3);
                            if (!in_array($randomNumber, $numbers)) {
                                $numbers[] = $randomNumber;
                            }
                        }

                        $questOption = [$row['q_answer'], $row['q_ans1'], $row['q_ans2'], $row['q_ans3']];

                        echo '<div class="carousel-item ' . $act . '">
                <img src="images/polar-bear.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption carousel-text qns-carousal qnsbox' . $optionid . '">
                    <h5 class="heading-font mx-3">' . $row['q_question'] . '</h5>

                    <p>
                   
                        <div class="options-form options' . $optionid . '">
                                <input type="hidden" class="questionsno' . $optionid . '" value="' . $row['q_sno'] . '">
                                <input type="hidden" class="questionType" value="' . $row['q_techtype'] . '">
                                <input type="hidden" class="questionUser" value="' . $_SESSION['user'] . '">

                                 <div class="radiobtns my-1">
                                      <input hidden type="radio" id="first-option" class="ans-options option' . $optionid . '" name="ans-options' . $optionid . '" value="' . $questOption[$numbers[0]] . '">
                                      <label for="first-option" class="radioLabel" id="iamlabel"><p>' . $questOption[$numbers[0]] . '</p></label>
                                  </div>
                                  <div class="radiobtns my-1">
                                      <input hidden type="radio" id="second-option" class="ans-options option' . $optionid . '" name="ans-options' . $optionid . '" value="' . $questOption[$numbers[1]] . '">
                                      <label for="second-option" class="radioLabel"><p>' . $questOption[$numbers[1]] . '</p></label>
                                  </div>    
                                  <div class="radiobtns my-1">
                                      <input hidden type="radio" id="third-option" class="ans-options option' . $optionid . '" name="ans-options' . $optionid . '" value="' . $questOption[$numbers[2]] . '">
                                      <label for="third-option" class="radioLabel"><p>' . $questOption[$numbers[2]] . '</p></label>
                                  </div>
                                  <div class="radiobtns my-1">
                                      <input hidden type="radio" id="fourth-option" class="ans-options option' . $optionid . '" name="ans-options' . $optionid . '" value="' . $questOption[$numbers[3]] . '">
                                      <label for="fourth-option" class="radioLabel"><p>' . $questOption[$numbers[3]] . '</p></label>
                                  </div>
                                  <button class="btn btn-primary my-2 btn-lg selected-option" onclick="slider()">Confirm</button>
                                </div>
                          </p>

                        </div>
                    </div>';
                        $act = "";
                        $optionid = $optionid + 1;
                    }

                }
                ?>

            </div>
            <button hidden class="carousel-control-prev" type="button" data-bs-targe t="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button hidden class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon carousal-qns" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <img src="images/mbbc.jpg" class="imager" alt="">

        <?php
            } else {
                echo '<div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/polar-bear.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block carousel-text">
                        <h5 class="heading-font">Please wait for questions to be added</h5>
                    </div>
                </div>
                </div>
                </div>';
            }
            ?>

    <?php

    global $tookTest;
    if ($tookTest) {
        $user = $_SESSION['user'];
        $sql = "DELETE FROM `quiz_answers` WHERE `quiz_answers`.`user_id` = '$user'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Sorry! technical issue" . mysqli_error($conn);
        }
    }


    ?>



    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        if (document.querySelector(`.questionsno1`)) {

            var optionid = 1;
            var answer;
            var qnsid = document.querySelector(`.questionsno1`).value
            var techType = document.querySelector(".questionType").value
            var questionUser = document.querySelector(".questionUser").value
            var labelCollection = []

            var ans = document.querySelectorAll(`.option${1}`)
            Array.from(ans).forEach(element => {
                element.addEventListener("click", function (e) {
                    if (labelCollection[0]) {
                        labelCollection[0].style.background = "linear-gradient(#cc2b5e,  #753a88)"
                    }

                    let label = e.target.parentNode.getElementsByTagName('label')[0]
                    labelCollection[0] = label


                    label.style.background = 'linear-gradient(#43cea2,   #185a9d)'
                    answer = e.target.value;
                })
            });


            function slider() {
                if (optionid == 10) {
                    var ans = document.querySelectorAll(`.option${10}`)
                    Array.from(ans).forEach(element => {
                        element.addEventListener("click", function (e) {
                            if (labelCollection[0]) {
                                labelCollection[0].style.background = "linear-gradient(#cc2b5e,  #753a88)"
                            }

                            let label = e.target.parentNode.getElementsByTagName('label')[0]
                            labelCollection[0] = label


                            label.style.background = 'linear-gradient(#43cea2,   #185a9d)'
                            answer = e.target.value
                        })
                    });

                    if (answer != undefined) {
                        document.querySelector(`.options${optionid}`).innerHTML =
                            '<img src="images/greenTick.png" class="tickImg">';

                        document.querySelector(`.qnsbox${optionid}`).lastChild.innerHTML = "";

                        var dt = {
                            'ans': answer,
                            'qnsi': qnsid,
                            'type': techType,
                            'user': questionUser
                        }
                        jsondata = JSON.stringify(dt);

                        fetch('qnsdeal.php', {
                            method: 'POST',
                            body: jsondata,
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                console.log(data)
                            }).catch((error) => {
                                console.error('Error:', error);
                            });

                        // Fetch for getting number of right answers

                        fetch(`score.php?qtype=${techType}`)
                            .then((response) => response.text())
                            .then((data) => {
                                let score = JSON.parse(data)
                                setTimeout(() => {
                                    document.querySelector(`.options${optionid}`).innerHTML =
                                        `<h3>Your score is: ${score['score']}</h3>
                                        <div class='container row'><button class="btn btn-primary mt-2 takeAgainbtn" onclick="retake()">Take again</button><a href="index.php" class="btn btn-primary my-2">Home</a><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ansmodal">See Answers</button></div>`
                                }, 3000);
                            })

                    } else {
                        let confirmbtn = document.querySelector(".selected-option")
                        confirmbtn.setAttribute("data-bs-toggle", "modal")
                        confirmbtn.setAttribute("data-bs-target", "#staticBackdrop")
                        confirmbtn.click()
                        confirmbtn.removeAttribute("data-bs-toggle")
                        confirmbtn.removeAttribute("data-bs-target")
                    }
                } else {
                    var ans = document.querySelectorAll(`.option${optionid + 1}`)
                    Array.from(ans).forEach(element => {
                        element.addEventListener("click", function (e) {
                            if (labelCollection[0]) {
                                labelCollection[0].style.background = "linear-gradient(#cc2b5e,  #753a88)"
                            }

                            let label = e.target.parentNode.getElementsByTagName('label')[0]
                            labelCollection[0] = label


                            label.style.background = 'linear-gradient(#43cea2,   #185a9d)'
                            answer = e.target.value;
                        })
                    });
                    if (answer != undefined) {
                        document.querySelector(`.options${optionid}`).innerHTML =
                            '<img src="images/greenTick.png" class="tickImg">';

                        setTimeout(function () {
                            document.querySelector(".carousal-qns").click();
                        }, 2000)

                        var dt = {
                            'ans': answer,
                            'qnsi': qnsid,
                            'type': techType,
                            'user': questionUser
                        }
                        jsondata = JSON.stringify(dt);

                        fetch('qnsdeal.php', {
                            method: 'POST',
                            body: jsondata,
                            headers: {
                                'Content-Type': 'application/json',
                            }
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                console.log(data)
                            }).catch((error) => {
                                console.error('Error:', error);
                            });

                        document.querySelector(`.qnsbox${optionid}`).lastChild.innerHTML = "";
                        optionid += 1;
                        qnsid = document.querySelector(`.questionsno${optionid}`).value
                        answer = undefined;
                    } else {
                        let confirmbtn = document.querySelector(".selected-option")
                        confirmbtn.setAttribute("data-bs-toggle", "modal")
                        confirmbtn.setAttribute("data-bs-target", "#staticBackdrop")
                        confirmbtn.click()
                        confirmbtn.removeAttribute("data-bs-toggle")
                        confirmbtn.removeAttribute("data-bs-target")

                    }

                }
            }
        }
    </script>
</body>

</html>