<?php
session_start();
if(!isset($_SESSION['did'])){
    header("Location: doctor.php");
}
?>