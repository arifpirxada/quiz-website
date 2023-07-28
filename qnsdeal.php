<?php 
include "dbconn.php";
if(isset($_POST)) {
    $input = file_get_contents('php://input');
    $decode = json_decode($input,true);
    $answer = $decode['ans'];
    $qnsid = $decode['qnsi'];
    $type = $decode['type'];
    $username = $decode['user'];
    
    $sql = $conn->prepare("INSERT INTO `quiz_answers` (`user_id`, `answer`, `question_id`,`question_type`) VALUES (?, ?, ?, ?)"); 
    $sql->bind_param("ssis",$username,$answer,$qnsid,$type);
    $sql->execute();
    
    echo json_encode(array('insert' => 'success'));
}
else {
    echo "file is not set";
}

?>

