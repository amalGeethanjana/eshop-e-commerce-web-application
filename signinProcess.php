<?php

include "connection.php";

$email  = $_POST["e"];
$password  = $_POST["p"];



if (empty($email)) {
    echo ("Please Enter Your Email");
}  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
}  else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'");
    $n = $rs->num_rows;

    if ($n < 1) {
        echo("wrong email or password");
    }else {
       echo("success");
}


}
