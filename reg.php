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

$pid = "PID".rand(1000,9999);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$hname = $_POST['hname'];
$email = $_POST['email'];
$gender = "Female";
$joined = date('Y-m-d');
$dob = $_POST['dob'];
$lmsd = $_POST['lmsd'];
$pno = $_POST['pno'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$status = "Active";
$state = $_POST['state'];

$currentDate = date('Y/m/d');

$first = strtotime($currentDate);
$fvisit = date("Y/m/d", strtotime("+14 week", $first));

$second = strtotime($currentDate);
$svisit = date("Y/m/d", strtotime("+24 week", $second));

$third = strtotime($currentDate);
$tvisit = date("Y/m/d",strtotime("+32 week", $third));

$final = strtotime($currentDate);
$ffvisit = date("Y/m/d", strtotime("+36 week", $final));

$expected = strtotime($lmsd);
$expdate = date("Y/m/d", strtotime("+40 week", $expected));

$firstvisit = $fvisit;
$secondvisit = $svisit;
$thirdvisit = $tvisit;
$finalvisit = $ffvisit;
$edd = $expdate;

$start = 1;
$end = 60*60*18;
$timestamp = mt_rand($start,$end);
$timestamp2 = mt_rand($start,$end);
$timestamp3 = mt_rand($start,$end);
$timestamp4 = mt_rand($start,$end);

$echo = date('G:i:s A',$timestamp);
$echo2 = date('G:i:s A',$timestamp2);
$echo3 = date('G:i:s A',$timestamp3);
$echo4 = date('G:i:s A',$timestamp4);

$query = "SELECT fname FROM doctors ORDER BY RAND() LIMIT 1";
$qry = mysqli_query($conn,$query);

foreach($qry as $row) :
endforeach;

$rand = $row['fname'];

if($_FILES["image"]["error"] === 4){
    echo "Image Does Not Exist";
}else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if(!in_array($imageExtension, $validImageExtension)){
        echo "<script>alert('Invalid Image Extension')</script>";
    }else if($fileSize > 1000000){
        echo "<script>alert('Image Size is Too Large') </script>";
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        move_uploaded_file($tmpName, 'image/' . $newImageName);

        $check = "SELECT * FROM patreg WHERE pno = '$pno' LIMIT 1";
        $check1 = mysqli_query($conn,$check);
        $check2 = mysqli_fetch_assoc($check1);

        $query = "SELECT * FROM patreg WHERE email = '$email' LIMIT 1";
        $query1 = mysqli_query($conn, $query);
        $query2 = mysqli_fetch_assoc($query1);

        $ddob = strtotime($dob);
        $currentDate = date('d-m-y');
        $ccdate = strtotime($currentDate);

        $diffDate = abs($ccdate - $ddob);
        $yearsDiff = floor($diffDate/(365*60*60*24));                                                           

        if($query2){
            if($query2['email'] == $email){
                echo "<script>alert('Email has already been taken') </script>";
                echo "<script> document.location.href = 'login.php'";
            }
        }elseif($check2){
            if($check2['pno'] == $pno){
                echo "<script>alert('Phone Number already exists') </script>";
                echo "<script> document.location.href = 'login.php'";
            }
        }else {
            if($ddob > $ccdate){
                echo "<script>alert('Cannot Select a Date in the futute')</script>";
            }else{
                $sql = "INSERT INTO patreg(pid, fname, lname, hname, email, doctor, imgName, gender,joined, dob, pno, password, cpassword, status, state, firstvisit, secondvisit, thirdvisit, finalvisit, edd, lmsd) VALUES 
                ('$pid', '$fname', '$lname', '$hname', '$email', '$rand', '$newImageName', '$gender','$joined', '$dob', '$pno', '$password', '$cpassword', '$status', '$state', '$firstvisit','$secondvisit','$thirdvisit','$finalvisit','$edd','$lmsd')";
                $qry = mysqli_query($conn, $sql);
                if($qry){
                    $query = "INSERT INTO appointment(pid,fname,lname,email,imgName,contact,doctor,firstvisit,firstvisittime,secondvisit,secondvisittime,thirdvisit,thirdvisittime,finalvisit,finalvisittime,userStatus,doctorStatus)
                        VALUES ('$pid','$fname','$lname','$email','$newImageName','$pno','$rand','$firstvisit','$echo','$secondvisit','$echo2','$thirdvisit','$echo3','$finalvisit','$echo4','1','1')";
                    $check = mysqli_query($conn,$query);
                    if($check){
                        header("Location: show-profile.php");
                    }
                }else{
                    echo "<script>alert('Error Inserting Records') </script>";
                }
            }
        }
    }
}
?>