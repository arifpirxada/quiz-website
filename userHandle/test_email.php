<?php
    $to = "arifpir883@gmail.com";
    $subject = "iquiz otp verification";
    $message = "Your otp is this test";
    $from = "pirxadaarif@gmail.com";
    $headers = "From: $from";
    
    if (mail($to, $subject, $message, $headers)) {
            echo "yes";
    } else {
        echo "Sorry! technical issue ";
    }

    
?>