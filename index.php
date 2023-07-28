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
                        <input class="form-control me-2" name="search" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-warning" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

    <?php } ?>

    <!-- image slider -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/polar-bear.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption d-none d-md-block carousel-text">
                    <h5 class="heading-font">Welcome to Take QuizMaster</h5>
                    <p class="body-font px-4">Take QuizMaster: Test your knowledge and challenge your friends with
                        Take QuizMaster, the ultimate Take Quiz app! Explore various categories like history, sports,
                        science,
                        movies, and more, as you answer multiple-choice questions and climb the global leaderboard.
                        Unlock achievements, collect badges, and become the Take QuizMaster!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/first.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption d-none d-md-block carousel-text">
                    <h5 class="heading-font">Sharp Yourself</h5>
                    <p class="body-font px-4">Take Quiz Master: Sharpen your mind with Take Quiz Master, a fast-paced
                        Take Quiz app
                        designed to improve your cognitive skills. Solve puzzles, riddles, and math problems against the
                        clock, and watch your mental agility soar. With different difficulty levels and a range of
                        mind-bending challenges, Take Quiz Master is perfect for anyone looking to boost their
                        brainpower.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/home.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption d-none d-md-block carousel-text">
                    <h5 class="heading-font">Speaking Master</h5>
                    <p class="body-font px-4">Expand your vocabulary and enhance your language skills with Vocabulary
                        Vortex. This interactive Take Quiz app offers a fun and engaging way to learn new words, test
                        your
                        linguistic prowess, and compete against other word enthusiasts. Explore different word games,
                        puzzles, and spelling challenges to become a wordsmith extraordinaire!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/white-bc.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption d-none d-md-block carousel-text">
                    <h5 class="heading-font">Meet the best Scientists</h5>
                    <p class="body-font px-4">Science Quest: Embark on an exciting journey of scientific discovery with
                        Science Quest! Dive into the realms of biology, chemistry, physics, and more as you answer
                        thought-provoking questions and unlock fascinating facts. Whether you're a science enthusiast or
                        just curious about the world around you, Science Quest is your gateway to exploring the wonders
                        of science.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/four.jpg" class="d-block w-100 mb-5" alt="...">
                <div class="carousel-caption d-none d-md-block carousel-text">
                    <h5 class="heading-font">Common get started</h5>
                    <p class="body-font px-4">Lights, camera, action! Get ready for Movie Madness, the ultimate Take
                        Quiz app
                        for film fanatics. Test your knowledge of movies, actors, directors, and famous quotes as you
                        race against the clock to earn the highest score. With thousands of questions covering various
                        genres and decades, Movie Madness is a must-have for all cinephiles.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon carousal-home" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Take Quiz topics -->

    <h3 class="text-center mb-5 explore-font">Explore the best categories</h3>

    <div class="row catItems">
        <?php
        include "dbconn.php";


        $sql = "SELECT * FROM `techs` LIMIT 9";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Some technical issue! ";
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card text-center mb-4 mx-5" style="width: 18rem">
                            <div class="card-body">
                                <img class="rounded catImage" src="images/catimgs/' . $row['tech_image'] . '" alt="">
                                <div class="mycardtext">
                                <h5 class="card-title text-light">' . $row["tech_name"] . '</h5>
                                <a href="takequiz.php?node=' . $row["tech_sno"] . '" class="btn btn-primary mybtn">Take Quiz</a>
                                </div>
                            </div>
                         </div>';
        }
        ?>

    </div>
    <div class='row seeMorecontain'><button type="button" class="btn btn-success seeMorebtn" onclick="loadMore()">Show
            More</button></div>


    <!-- Footer starts here -->
    <footer>

        <div class="container my-4 foottext">

            <br>
            Welcome to our exciting quiz website! We are passionate about knowledge, learning, and the joy of testing
            your wits. Our platform is designed to provide an engaging and interactive experience for all quiz
            enthusiasts, whether you're a trivia buff, a curious learner, or someone seeking a fun challenge.<br><br>

            At our quiz website, we offer a wide range of quiz categories to cater to diverse interests. From general
            knowledge to specific topics like history, science, sports, movies, and more, we have quizzes that will
            satisfy every curiosity. Whether you want to brush up on your knowledge or explore new subjects, our
            carefully curated quizzes have got you covered.<br><br>

            What sets us apart is our commitment to delivering high-quality content. Our team of experts works
            tirelessly to ensure that each quiz is well-researched, accurate, and engaging. We strive to strike the
            perfect balance between challenging questions and accessibility, making our quizzes suitable for both
            beginners and seasoned quizzers.<br><br>

            We believe that learning should be enjoyable, and that's why we've incorporated various interactive elements
            into our quizzes. You'll find multiple-choice questions, true or false statements, picture-based quizzes,
            and even timed challenges to test your speed and accuracy. Additionally, we provide detailed explanations
            and answers after each quiz, allowing you to learn and grow with every attempt.<br><br>

            Our website is user-friendly and easy to navigate. You can create your own account to track your progress,
            save your favorite quizzes, and compete with friends. Speaking of competition, we also offer leaderboards
            and achievements, adding a touch of friendly rivalry to your quiz journey.<br><br>

            Education is an ongoing process, and our quiz website embraces that philosophy. We regularly update our
            question bank, ensuring that you always have fresh and exciting quizzes to enjoy. We also welcome
            user-generated quiz submissions, giving you the opportunity to share your expertise and contribute to our
            vibrant community.<br><br>

            So, whether you're a student, a trivia enthusiast, or simply someone who loves to learn new things, our quiz
            website is the perfect destination for you. Join us on this knowledge-filled adventure, challenge yourself,
            and let the thrill of quizzing inspire your quest for knowledge. Get ready to unlock your potential and
            become a champion of the quiz world!<br><br>



        </div>
        <div class="copy-contain">

            <div class="container mt-4 d-flex justify-content-center py-3 copyfooter">
                &copy copyright <?php echo date("Y") ?> | iquiz pvt limited
            </div>

        </div>
    </footer>




    <!-- Footer ends here -->


    <script src="bot/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>

        // Script for Loading more categories when clicked on see more button

        var displayNum = 9;
        var catadded = 0;

        function loadMore() {
            var seeBtn = document.querySelector(".seeMorebtn")
            seeBtn.innerHTML = "Loading..."
            var dt = {
                'from': displayNum
            }
            jsondata = JSON.stringify(dt)

            fetch("loadMore.php", {
                method: "POST",
                body: jsondata,
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then((res) => res.text())
                .then((data) => {
                    seeBtn.innerHTML = "Show More"
                    var catItems = document.querySelector(".catItems")
                    catItems.insertAdjacentHTML("beforeend", data)
                    let firstTwo = data.substring(10, 12)
                    var catNum = parseInt(data.substring(26, 27))
                    catadded += catNum
                    displayNum += 6
                    makeBig()

                    if (firstTwo == "No") {
                        let seeContain = document.querySelector(".seeMorecontain")
                        seeContain.innerHTML = '<button type="button" class="btn btn-warning seeMorebtn" onclick="showLess()">Show Less</button>'
                        displayNum = 9
                    }

                })


        }

        function showLess() {
            let cats = document.querySelectorAll(".addedItem")
            let moreContain = document.querySelector(".seeMorecontain")

            Array.from(cats).forEach(element => {
                element.remove();
            });
            moreContain.innerHTML = '<button type="button" class="btn btn-success seeMorebtn" onclick="loadMore()">Show More</button>'
        }

        // Script for making the categories dynamic
        function makeBig() {

            let catContain = document.querySelectorAll(".mybtn")
            Array.from(catContain).forEach((element) => {
                element.addEventListener("mouseover", (e) => {
                    let card = e.target.parentNode
                    let image = e.target.parentElement.parentElement.getElementsByTagName("img")[0]
                    image.style.height = "220px"
                    image.style.width = "221px"
                    card.style.height = "220px"
                    card.style.width = "220px"
                    card.style.top = "-220px"
                    card.style.left = "5px"
                })

                element.addEventListener("mouseout", (e) => {
                    let card = e.target.parentNode
                    let image = e.target.parentElement.parentElement.getElementsByTagName("img")[0]
                    image.style.height = "212px"
                    image.style.width = "211px"
                    card.style.height = "212px"
                    card.style.width = "210px"
                    card.style.top = "-212px"
                    card.style.left = "11px"
                })

            })
        }
        makeBig()


        // Script for making the carousal dynamic

        setInterval(() => {
            document.querySelector(".carousal-home").click();
        }, 7500)
    </script>
</body>

</html>