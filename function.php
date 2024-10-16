<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "acmais";

$conn = mysqli_connect($host, $username, $password, $dbname);

if($conn){
    
}else{

}

session_start();


// Admin Login

if(isset($_POST['admin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM admintb WHERE username = '$username' && password = '$password'";
    $qry1 = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($qry1);

    if($count == 1){
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    }else{
        header("Location: login.php");
    }
}


if(isset($_POST['doctor'])){
    $did = $_POST['did'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM doctors WHERE doctor_id = '$did' && password = '$password'";
    $qry1 = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($qry1);

    if($count == 1){
        $_SESSION['did'] = $did;
        header("Location: admin.php");
    }else{
        header("Location: doctor.php");
    }
}
?>