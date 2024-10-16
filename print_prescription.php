<?php
include('connection.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['id'];
$sql = "SELECT * FROM prescription WHERE id='$id'";
$qry = mysqli_query($db,$sql);
$user = mysqli_fetch_assoc($qry);

$dompdf = new Dompdf();
ob_start();
require('viewprescription.php');
$html = ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream('donate.php',['Attachment'=>false]); 
?>