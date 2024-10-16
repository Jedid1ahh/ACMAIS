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

// DOCTOR LOGIN

if(isset($_POST['doctor'])){
    $did = $_POST['did'];
    $password = $_POST['password'];
    $qry = "SELECT * FROM doctors WHERE doctor_id = '$did' && password = '$password'";
    $qry1 = mysqli_query($conn, $qry);
    $count = mysqli_num_rows($qry1);

    if($count == 1){
        $_SESSION['did'] = $did;
        header("Location: doct.php");
    }else{
        header("Location: doct.php");
    }
}
?>