<?php
include "../dbconn.php";

session_start();
if (isset($_SESSION['logedin']) || $_SESSION == true) {
    header("location: ../index.php");
}


if (isset($_POST)) {
    $input = file_get_contents('php://input');
    $decode = json_decode($input, true);
    $email = $decode['email'];
    $password = $decode['password'];

    $sql = $conn->prepare("SELECT * FROM `quizusers` WHERE `email` = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);


    if (!$result) {
        echo "Sorry! technicaly issue " . mysqli_error($conn);
    }

    $users = count($result);

    if ($users > 0) {
        echo "yes";
    } else {


        $sql = "INSERT INTO `quizusers` (`email`, `password`) VALUES ('$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Sorry! technical issue " . mysqli_error($conn);
        }
        
        
        $to = "$email";
        $sub = "iquiz otp verification";
        $message = "Your otp is this test";
        $from = "trendkash@gmail.com";
        $headers = "From: $from";
        
        if (mail($to, $sub, $message, $headers)) {
            $_SESSION['logedin'] = true;
            $_SESSION['user'] = $email;
            echo "no";
        } else {
            echo "Sorry! technical issue ";
        }

    }

}

?>