<?php

include "connection.php";

$fname  = $_POST["f"];
$lname  = $_POST["l"];
$password  = $_POST["p"];
$email  = $_POST["e"];
$mobile  = $_POST["m"];
$gender  = $_POST["g"];

if (empty($fname)) {
    echo ("Please Enter Your First Name");
} else if (strlen($fname) > 50) {
    echo ("First Name Must contain Lawer Than 50 Characters.");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} else if (strlen($lname) > 50) {
    echo ("Last Name Must contain Lawer Than 50 Characters.");
} else if (empty($email)) {
    echo ("Please Enter Your Email");
} else if (strlen($email) > 100) {
    echo ("Email Must contain Lawer Than 50 Characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("First Name Must contain 5 to 20 Characters.");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile");
} else if (strlen($mobile) != 10) {
    echo ("First Name Must contain 10 Characters.");
} elseif (preg_match("/07[0,1,2,4,5,6,7,8][0,9]/", $mobile)) {
    echo ("Invald mobile number");
} elseif ($gender == "Select Gender") {
    echo ("Please Select Gender");
} else {


    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' OR `mobile` = '".$mobile."'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo("User With The Same Email Address or same Mobile Number already exists.");
    }else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y:m:d H:i:s");

        Database::iud("INSERT INTO `user` 
        (`fname`,`lname`,`email`,`password`,`mobile`,`joined_date`,`gender_id`,`status_id`)
         VALUES ('".$fname."','".$lname."','".$email."','".$password."','".$mobile."','".$date."','".$gender."','1')");
        echo ("success");

}
}


?>