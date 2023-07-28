<?php 
include "dbconn.php";

$questiontype = $_GET['qtype'];

$sql = "SELECT * FROM `quiz_questions` WHERE q_techtype = '$questiontype'";
$result = mysqli_query($conn,$sql);

$realanswers = [];

while($row=mysqli_fetch_assoc($result)) {
    $ans = $row['q_answer'];
    array_push($realanswers,$ans);
}

$sql = "SELECT * FROM `quiz_answers` WHERE question_type = '$questiontype'";
$result = mysqli_query($conn,$sql);

$useranswers = [];

while($row=mysqli_fetch_assoc($result)) {
    $ans = $row['answer'];
    array_push($useranswers,$ans);
}

$rightAnswers = array_intersect($realanswers,$useranswers);
$numRightAnswers = count($rightAnswers);


echo json_encode(array('score' => $numRightAnswers));





?>