<?php

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

$currentDate = date('Y/m/d g:i:s');

$first = strtotime($currentDate);
$fvisit = date("Y/m/d", strtotime("+14 week", $first));
$fvisit2 = $fvisit . ' ' . $echo;

echo $fvisit2;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
    </head>
    <body>
        <h4> Filtering Dates </h4>
        <label>From Date</label>
            <input type="date" name="from_date" class="form-control">
                        
        <label>To Date </label>
            <input type="date" name="to_date" class="form-control">
            
        <label>Click to filter </label>
                        
        <br />
                        
        <input  type="submit" class="btn btn-primary">Filter</button>

                <?php
                require 'connection.php';

                $sql = "SELECT * FROM appointment";
                $check_sql = mysqli_query($db,$sql);

                foreach($check_sql as $z) :
                endforeach;
                $date = $z['firstvisit'];
                $startDate = strtotime($date);
                $tod = date('Y-m-d');
                $today = strtotime($tod);
                $diffDate = abs($today - $startDate);
                

                function dateDif($startDate,$today){
                    $differ = $startDate - $today;
                    return abs(round($differ / 86400));
                }

                $dateDiff = dateDif($startDate, $today);

                echo $dateDiff;

                if($dateDiff >= 7){
                    $query = "SELECT * FROM appointment WHERE firstvisit BETWEEN '$tod' AND '$date'";
                    $check = mysqli_query($db,$query);

                    foreach($check as $row){
                        echo $row['fname'] . ' ' . $row['lname'];
                    }
                }else{
                    echo "No Upcoming Visitation in $dateDiff days";
                }
                ?>
    </body>
</html>