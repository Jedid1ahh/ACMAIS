<?php 
$email = "fidelisvictor370@gmail.com"; 
$password = "Chinyere12345"; 
$message = "Welcome To ACMAIS"; 
$sender_name = "Victor"; 
$recipients = "07065581737"; 
$forcednd = "1"; 
$data = array("email" => $email, "password" =>$password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients); 
$data_string = json_encode($data); 
$ch = curl_init('https://api.bulksmslive.com/v2/app/sms'); 
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string))); 
$result = curl_exec($ch); 
$res_array = json_decode($result); 
print_r($res_array); 
?>