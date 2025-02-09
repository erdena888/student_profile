<?php
// start the session always at the beginning
session_start(); 

// connection between Form and MySQL server
$con = mysqli_connect("localhost","root","","individual");

// username and password is received form login page
$usertrim = trim($_POST['username']);
//eliminated space and special characters here
$userstrip = stripcslashes($usertrim);
$finaluser = htmlspecialchars($userstrip);

//similar for password space and special character elimination
$passtrim = trim($_POST['password']);
//eliminated space and special characters here
$passstrip = stripcslashes($passtrim);
$finalpass = htmlspecialchars($passstrip);

//comparision between user input with database values
$sql = "SELECT * FROM user_table where username = '$finaluser' AND password = '$finalpass'";

//SQL result executed 
$result = mysqli_query($con,$sql);

//if number of rows is greater than 0 then there is username and password match
//is found else is not found

if (mysqli_num_rows($result)>=1)
{
    //username is stored to session and forwared to next page
    $_SESSION["myuser"]= $finaluser;
    header ("Location:profiles.html");
}

?>