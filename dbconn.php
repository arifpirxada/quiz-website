<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "iquizmaster";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn) {
    echo "sorry, we are having some technical issue because of this error ".mysqli_connect_error();
}


function investigate ($con,$sql) {
    if($sql!="") {
        $sql = trim($sql);
        return mysqli_real_escape_string($con,$sql);
    }
}

?>