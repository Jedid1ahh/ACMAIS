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

// Patient Login
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM patreg WHERE email = '$email' && password='$password'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);

    if($row == 1){
        $_SESSION['email'] = $email;
        header("Location: show-profile.php");
    }
    else
        echo "<script>alert('Wrong Password or Email') </script>";
}

?>