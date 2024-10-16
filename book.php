<?php

require 'connection.php';
include_once("patsession.php");

$i = 1;
$nya = $_SESSION['email'];
$sql = "SELECT fname FROM patreg WHERE email = '$nya'";
$rows = mysqli_query($db, $sql);
foreach($rows as $row) :
    $name = $row['fname'];
endforeach;

$qry = "SELECT pid FROM patreg WHERE email = '$nya'";
$query = mysqli_query($db,$qry);
foreach($query as $roww):
    $pid = $roww['pid'];
endforeach;

$g = "SELECT lname FROM patreg WHERE email = '$nya'";
$gg = mysqli_query($db,$g);
foreach($gg as $k):
    $lname = $k['lname'];
endforeach;

$img = "SELECT imgName FROM patreg WHERE email = '$nya'";
$im = mysqli_query($db,$img);
foreach($im as $image):
    $imgName = $image['imgName'];
endforeach;

$con = "SELECT pno FROM patreg WHERE email = '$nya'";
$contac = mysqli_query($db,$con);
foreach($contac as $connn):
    $contact = $connn['pno'];
endforeach;

if(isset($_POST['book'])){
    $patientID = $pid;
    $fname = $name;
    $lnamee = $lname;
    $image = $imgName;
    $connt = $contact;
    $doctor = $_POST['spec'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $em = $_SESSION['email'];

    $qry = "SELECT apptime FROM otherappointment WHERE doctor='$doctor' and appdate='$date' and apptime='$time'";
    $check_qry = mysqli_query($db,$qry);
    $q = mysqli_num_rows($check_qry);

    if($q == 0){
        $query = "INSERT INTO otherappointment(pid,fname,lname,email,imgName,contact,doctor,appdate,apptime,userStatus,doctorStatus)
        VALUES ('$patientID','$fname','$lnamee','$em','$image','$connt','$doctor','$date','$time','1','1')";

        $qry = mysqli_query($db,$query);
        if($qry){
            echo "<script>alert('Appointment Booked Successfully'); </script>";
        }else{
            echo "<script>alert('Error Booking Appointment'); </script>";
        }

    }else{
        echo "<script>alert('We Are Sorry to Inform You That The Doctor is Not Available At This Time. Please Pick Another Time'); </script>";
    }

    
    

}

?>