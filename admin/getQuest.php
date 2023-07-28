<?php
include "../dbconn.php";

$input = file_get_contents('php://input');
$decode = json_decode($input, true);
$cattype = $decode['selcat'];

$sql = "SELECT * FROM `quiz_questions` WHERE q_techtype = '$cattype'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
if ($num > 0) {
    $serial = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <option value="<?php echo $row['q_question'] ?>"><?php echo $serial.". "; echo $row['q_question'] ?></option>

        <?php
        $serial = $serial + 1;
    }
}
?>