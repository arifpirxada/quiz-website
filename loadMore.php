<?php

include "dbconn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    $decode = json_decode($input, true);
    $avaible = $decode['from'];

    $sql = "SELECT * FROM `techs` LIMIT $avaible,6";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Some technical issue! ";
    }
    $num = mysqli_num_rows($result);

    if ($num < 6) {

        echo "<p hidden>No</p>";
        echo "<p hidden>$num</p>";

    }

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="card addedItem text-center mb-4 mx-5" style="width: 18rem">
                        <div class="card-body">
                            <img class="rounded catImage" src="images/catimgs/' . $row['tech_image'] . '" alt="">
                            <div class="mycardtext">
                            <h5 class="card-title text-light">' . $row["tech_name"] . '</h5>
                            <a href="takequiz.php?node=' . $row["tech_sno"] . '" class="btn btn-primary mybtn">Take Quiz</a>
                            </div>
                        </div>
                     </div>';

    }

}

?>