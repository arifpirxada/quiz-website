<?php
include "../dbconn.php";
if (isset($_POST)) {

    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $myemail = $decode['email'];    
    $mypassword = $decode['password'];    

    $sql1 = $conn->prepare("SELECT * FROM `quizusers` WHERE `email` = ?");
    $sql1->bind_param("s",$myemail);
    $sql1->execute();
    $result1 = $sql1->get_result()->fetch_all(MYSQLI_ASSOC);

  
    $userfound = count($result1);
    
    if($userfound>0) {
        if($result1[0]['password'] == $mypassword) {
            session_start();
            $_SESSION['logedin'] = true;
            $_SESSION['user'] = $myemail;
            echo json_encode(array('noUser' => 'found', 'password' => 'matched'));
        }
        else {
            echo json_encode(array('noUser' => 'found', 'password' => 'notmatched'));
        }
    }
    else{
        echo json_encode(array('noUser' => 'notfound'));
    }
}
?>