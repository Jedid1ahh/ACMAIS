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

if(isset($_POST['submit'])){
    $currentDate = date('Y-m-d g:i:s');
    $did = mysqli_real_escape_string($conn,"D".rand(1000,9999));
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $contact = mysqli_real_escape_string($conn,$_POST['contact']);
    $specialist = mysqli_real_escape_string($conn,$_POST['specialism']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword = mysqli_real_escape_string($conn,$_POST['cpassword']);
    $sog = mysqli_real_escape_string($conn,$_POST['sog'] . ' ' . "State");
    $ppp = mysqli_real_escape_string($conn,$_POST['ppp']);
    $status = mysqli_real_escape_string($conn,"Active");
    $joined = $currentDate;



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
    
            $query = "SELECT * FROM doctors WHERE contact = '$contact' LIMIT 1";
            $query1 = mysqli_query($conn, $query);
            $query2 = mysqli_fetch_assoc($query1);

            if($query2){
                if($query2['contact'] == $contact){
                    echo "<script>alert('Phone Number Already Exists') </script>";
                }
            }else{
                $sql = "INSERT INTO doctors(doctor_id, fname, lname, specialist, imgName, gender, contact, status, joined, password, cpassword, sog, ppp) VALUES ('$did', '$fname', '$lname', '$specialist', '$newImageName', '$gender', '$contact', '$status', '$joined', '$password', '$cpassword', '$sog', '$ppp')";
                $qry = mysqli_query($conn, $sql);
                if($qry){
                    echo "<script>alert('New Doctor Added Successfully') </script>";
                    header("Location: add-doctor.php");
                    return false;
                }
            }            
        }
    }
}
?>
