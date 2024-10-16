<?php
require 'connection.php';
include_once("patsession.php");

if(isset($_GET['cancel'])){
    $zino = "UPDATE appointment SET userStatus ='0' WHERE id = '".$_GET['id']."'";
    $check_zino = mysqli_query($db,$zino);

    if($check_zino){
        echo "<script>alert('Your Appointment Has Successfully Been Cancelled');</script>";
    }
  }

  $nya = $_SESSION['email'];
  $sql = "SELECT firstvisit, secondvisit, thirdvisit, finalvisit FROM patreg WHERE email = '$nya'";
  $rows = mysqli_query($db,$sql);

  foreach($rows as $row) :
  endforeach;

  $fir = $row['firstvisit'];
  $first = strtotime($fir);

  $sec = $row['secondvisit'];
  $second = strtotime($sec);

  $thi = $row['thirdvisit'];
  $third = strtotime($thi);

  $fin = $row['finalvisit'];
  $final = strtotime($fin);

  $date = date("Y-m-d");
  $dd = strtotime($date);

  $ydate = date("Y-m-d");
  $ydd = strtotime($ydate);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Patient Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="new/images/favicon.png">
	<link href="new/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="new/vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
    <link href="new/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="css/footer.css" rel="stylesheet">
</head>

<body>
<?php
require 'connection.php';
include_once("patsession.php");
$nya = $_SESSION['email'];
$sql = "SELECT firstvisit, secondvisit, thirdvisit, finalvisit FROM patreg WHERE email = '$nya'";
$rows = mysqli_query($db, $sql);

foreach($rows as $row) :
endforeach;

// First Visit
$date = $row['firstvisit'];
$startDate = strtotime($date);
$todayDate = date('Y-m-d');
$todaysDate = strtotime($todayDate);
$diffDate = abs($todaysDate - $startDate);

function dateDifference($startDate,$todaysDate){
    $differ = $startDate - $todaysDate;
    return abs(round($differ / 86400));
}

$dateDiff = dateDifference($startDate, $todaysDate);

if ($dateDiff <= 14 & $dateDiff == 0){
    echo "<script>alert('You have $dateDiff Days To Your First Antenatal Visit'); </script>";
}else{
    echo "<script>alert('You Have Many $dateDiff Days to Your Next Antenatal Visit. Do Enjoy'); </script>";
}

// Second Visit
$d = $row['secondvisit'];
$n = strtotime($d);
$nn = date('Y-m-d');
$dd = strtotime($nn);
$ddd = abs($dd - $n);

function secondDifference($n, $dd){
    $dif = $n - $dd;
    return abs(round($dif / 86400));
}

$dDiff = secondDifference($n,$dd);

if ($dDiff <= 14 & $dDiff == 0){
    echo "<script>alert('You have $dDiff Days To Your First Antenatal Visit'); </script>";
}
// Third Visit

$a = $row['thirdvisit'];
$aa = strtotime($a);
$b = date('Y-m-d');
$bb = strtotime($b);
$bbb = abs($bb - $aa);

function thirdDifference($aa,$bb){
    $diff = $aa - $bb;
    return abs(round($diff / 86400));
}

$difff = thirdDifference($aa,$bb);

if ($difff <= 14 & $difff == 0){
    echo "<script>alert('You have $difff Days To Your First Antenatal Visit'); </script>";
}
// Fourth Visit


$c = $row['finalvisit'];
$cc = strtotime($c);
$f = date('Y-m-d');
$ff = strtotime($f);
$fff = abs($ff - $cc);

function finalDifference($cc,$ff){
    $difference = $cc - $ff;
    return abs(round($difference / 86400));
}

$diffe = finalDifference($cc,$ff);

if ($diffe <= 14 & $diffe == 0){
    echo "<script>alert('You have $diffe Days To Your First Antenatal Visit'); </script>";
}

?>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								<div class="input-group search-area d-lg-inline-flex d-none">
									<input type="text" class="form-control" placeholder="Search here...">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
								</div>
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link" href="">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z" fill="#007A64"/>
										<path d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z" fill="#007A64"/>
										<path d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#007A64"/>
									</svg>
									<span class="badge light text-white bg-primary">3</span>
                                </a>
							</li>
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
									<!-- <div class="header-info">
										<span class="text-black">Hello,<strong>Franklin</strong></span>
										<p class="fs-12 mb-0">Super Admin</p>
									</div> -->
                                    <div class="position-relative">
                                        <?php
                                            $nya = $_SESSION['email'];
                                            $sql = "SELECT * FROM patreg WHERE email = '$nya'";
                                            $rows = mysqli_query($db, $sql)
                                        ?>
                                        <?php
                                            foreach($rows as $row) :
                                        ?>
                                        <img class="rounded-circle" src="image/<?php echo $row['imgName']; ?>" title="<?php echo $row['imgName']; ?>" alt="" style="width: 40px; height: 40px;">
                                        <?php endforeach; ?>
                                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="show-profile.php">Dashboard</a></li>
							<li><a href="">Patient</a></li>
                            <li><a href="appointment-history.php">Appointment History</a></li>
                            <li><a href="https://www.google.com/maps/search/hospitals/@9.182064,12.469136,13z/data=!3m1!4b1">
                                Nearby Hospital Locator</a>
                            </li>
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">Compose</a></li>
                                    <li><a href="./email-inbox.html">Inbox</a></li>
                                    <li><a href="./email-read.html">Read</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<h4>Profile</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="profile-info">
									<div class="profile-photo">
                                        <?php
                                            $i = 1;
                                            $nya = $_SESSION['email'];
                                            $sql = "SELECT * FROM patreg WHERE email = '$nya'";
                                            $rows = mysqli_query($db, $sql)
                                        ?>
                                        <?php
                                            foreach($rows as $row) :
                                        ?>
										<img src="image/<?php echo $row['imgName']; ?>" title="<?php echo $row['imgName']; ?>" style="width: 100px; height: 100px;" class="img-1 mr-sm-4 mr-3" alt="">
                                        <?php endforeach; ?>
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">
                                                <?php
                                                    $nya = $_SESSION['email'];
                                                    $sql = "SELECT fname FROM patreg WHERE email = '$nya'";
                                                    $rows = mysqli_query($db, $sql);
                                                    foreach($rows as $row) :
                                                        echo $row['fname'];
                                                    endforeach;
                                                ?>
                                            </h4>
											<p>Patient</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0"><?php echo $_SESSION['email']; ?></h4>
											<p>Email</p>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-statistics mb-5">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="m-b-0">
                                                    <?php
                                                        $i = 1;
                                                        $nya = $_SESSION['email'];
                                                        $sql = "SELECT edd FROM patreg WHERE email = '$nya'";
                                                        $rows = mysqli_query($db, $sql);
                                                        foreach($rows as $row) :
                                                            echo $row['edd'];
                                                        endforeach;
                                                    ?>
                                                </h3><span>Expected Due Date</span>
                                            </div>
                                        </div>
                                        <div class="mt-4">
											<a href="javascript:void()" class="btn btn-primary mb-1" data-toggle="modal" data-target="#sendMessageModal">Book Appointment</a>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="sendMessageModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Book Appointment</h5>
													<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
												</div>
												<div class="modal-body">
													<form class="comment-form" action="book.php" method="POST">
														<div class="row"> 
															<div class="col-lg-6">
																<div class="form-group">
                                                                    <?php
                                                                        require 'connection.php';
                                                                        $email = $_SESSION['email'];
                                                                        $resultSet = $db->query("SELECT doctor FROM patreg WHERE email = '$email'");
                                                                    ?>
                                                                    <label class="text-black font-w600">Doctor<span class="required">*</span></label>
                                                                    <select name="spec" class="form-control" id="spec">
                                                                        <?php
                                                                        while($rows = $resultSet->fetch_assoc())
                                                                        {
                                                                            $name = $rows['doctor'];
                                                                            echo "<option value='$name'>$name</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
																	<label class="text-black font-w600">Time <span class="required">*</span></label>
                                                                    <select name="time" class="form-control" id="time">
                                                                        <option value='08:00:00 AM'>8:00AM</option>
                                                                        <option value='10:00:00 AM'>10:00AM</option>
                                                                        <option value='12:00:00 PM'>12:00PM</option>
                                                                        <option value='14:00:00 PM'>2:00PM</option>
                                                                        <option value='16:00:00 PM'>4:00PM</option>
                                                                    </select>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label class="text-black font-w600">Date <span class="required">*</span></label>
																	<input type="date" placeholder="MM/DD/YYY"  class="form-control" value="date" name="date" min="<?php echo date('Y-m-d',strtotime('+1 day'));?>">
																</div>
															</div>
															<div class="col-lg-12">
																<div class="form-group">
																	<input type="submit" value="Book Appointment" class="submit btn btn-primary" name="book">
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
                                </div>
                                    <div class="row mt-4 sp4" id="lightgallery">
                                        
										<a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/2.jpg" alt="" class="img-fluid">
										</a>
										<a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/3.jpg" alt="" class="img-fluid">
										</a>
										<a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/4.jpg" alt="" class="img-fluid">
										</a>
										<a href="images/profile/3.jpg" data-exthumbimage="images/profile/3.jpg" data-src="images/profile/3.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/3.jpg" alt="" class="img-fluid">
										</a>
										<a href="images/profile/4.jpg" data-exthumbimage="images/profile/4.jpg" data-src="images/profile/4.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/4.jpg" alt="" class="img-fluid">
										</a>
										<a href="images/profile/2.jpg" data-exthumbimage="images/profile/2.jpg" data-src="images/profile/2.jpg" class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
											<img src="images/profile/2.jpg" alt="" class="img-fluid">
										</a>
                                    </div>
                                <div class="profile-news">
                                    <?php
                                    require 'connection.php';
                                    $nya = $_SESSION['email'];
                                    $sql = "SELECT * FROM appointment WHERE email = '$nya'";
                                    $result = $db->query($sql);
                                    if(!$result){
                                        die("Invalid query: " . $db->error);
                                    }
                                    while($row = $result->fetch_assoc())
                                    {
                                    ?>
                                    <h5 class="text-primary d-inline">Visitations</h5>
                                    <div class="media pt-3 pb-3">
                                        <?php
                                        $r = $row['doctor'];
                                        $imgName = "SELECT imgName FROM doctors WHERE fname='$r'";
                                        $re = $db->query($imgName);
                                        foreach($re as $k) :
                                        endforeach;
                                        ?>
                                        <img src="image/<?php echo $k['imgName']; ?>" title="<?php echo $k['imgName']; ?>" class="mr-3 rounded" width="75">
                                        <div class="media-body">
                                            <h5 class="m-b-5"><a href="" class="text-black">
                                                <?php
                                                    echo "Appointments With Dr" . " " . $row['doctor'];
                                                ?></a>
                                            </h5>
                                            <div class = 'text-success mr-3 mb-2'>
                                                <p class="mb-0">
                                                    <li><i class="las la-calendar"></i>
													    <?php echo $row['firstvisit']; ?>
												    </li>
                                                </p>
                                                <p class="mb-0">
                                                    <li><i class="las la-clock"></i>
													    <?php echo $row['firstvisittime']; ?>
												    </li>
                                                </p>
                                                <?php
                                                    $date = $row['firstvisit'];
                                                    $startDate = strtotime($date);
                                                    $todayDate = date('Y-m-d');
                                                    $todaysDate = strtotime($todayDate);
                                                    $diffDate = abs($todaysDate - $startDate);

                                                    function dateDiffer($startDate,$todaysDate){
                                                        $differ = $startDate - $todaysDate;
                                                        return abs(round($differ / 86400));
                                                    }

                                                    $dateDiff = dateDiffer($startDate, $todaysDate);


                                                    if($todaysDate > $startDate){
                                                        echo "<span class='text-danger mb-2'>First Visitation Passed</span>";
                                                    }elseif($todaysDate == $startDate){
                                                        echo "<span class='text-danger mb-2'>Today is Your First Visitation</span>";
                                                    }else{
                                                        echo "<span class='text-success mr-3 mb-2'>You Have $dateDiff Days to Your First Visitation</span>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <?php
                                        $r = $row['doctor'];
                                        $imgName = "SELECT imgName FROM doctors WHERE fname='$r'";
                                        $re = $db->query($imgName);
                                        foreach($re as $k) :
                                        endforeach;
                                        ?>
                                        <img src="image/<?php echo $k['imgName']; ?>" title="<?php echo $k['imgName']; ?>" class="mr-3 rounded" width="75">
                                        <div class="media-body">
                                            <div class = 'text-success mr-3 mb-2'>
                                                <p class="mb-0">
                                                    <li><i class="las la-calendar"></i>
													    <?php echo $row['secondvisit']; ?>
												    </li>
                                                </p>
                                                <p class="mb-0">
                                                    <li><i class="las la-clock"></i>
													    <?php echo $row['secondvisittime']; ?>
												    </li>
                                                </p>
                                                <?php
                                                    $date1 = $row['secondvisit'];
                                                    $startDate1 = strtotime($date1);
                                                    $todayDate1 = date('Y-m-d');
                                                    $todaysDate1 = strtotime($todayDate1);
                                                    $diffDate1 = abs($todaysDate1 - $startDate1);

                                                    function dateDiffe($startDate1,$todaysDate1){
                                                        $differ = $startDate1 - $todaysDate1;
                                                        return abs(round($differ / 86400));
                                                    }

                                                    $dateDiff1 = dateDiffe($startDate1, $todaysDate1);


                                                    if($todaysDate1 > $startDate1){
                                                        echo "<span class='text-danger mb-2'>Second Visitation Passed</span>";
                                                    }elseif($todaysDate1 == $startDate1){
                                                        echo "<span class='text-danger mb-2'>Today is Your Second Visitation</span>";
                                                    }else{
                                                        echo "<span class='text-success mr-3 mb-2'>You Have $dateDiff1 Days to Your Second Visitation</span>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <?php
                                        $r = $row['doctor'];
                                        $imgName = "SELECT imgName FROM doctors WHERE fname='$r'";
                                        $re = $db->query($imgName);
                                        foreach($re as $k) :
                                        endforeach;
                                        ?>
                                        <img src="image/<?php echo $k['imgName']; ?>" title="<?php echo $k['imgName']; ?>" class="mr-3 rounded" width="75">
                                        <div class="media-body">
                                            <div class = 'text-success mr-3 mb-2'>
                                                <p class="mb-0">
                                                    <li><i class="las la-calendar"></i>
													    <?php echo $row['thirdvisit']; ?>
												    </li>
                                                </p>
                                                <p class="mb-0">
                                                    <li><i class="las la-clock"></i>
													    <?php echo $row['thirdvisittime']; ?>
												    </li>
                                                </p>
                                                <?php
                                                    $date2 = $row['thirdvisit'];
                                                    $startDate2 = strtotime($date2);
                                                    $todayDate2 = date('Y-m-d');
                                                    $todaysDate2 = strtotime($todayDate2);
                                                    $diffDate2 = abs($todaysDate2 - $startDate2);

                                                    function dateDiff($startDate2,$todaysDate2){
                                                        $differ = $startDate2 - $todaysDate2;
                                                        return abs(round($differ / 86400));
                                                    }

                                                    $dateDiff2 = dateDiff($startDate2, $todaysDate2);


                                                    if($todaysDate2 > $startDate2){
                                                        echo "<span class='text-danger mb-2'>Third Visitation Passed</span>";
                                                    }elseif($todaysDate2 == $startDate2){
                                                        echo "<span class='text-danger mb-2'>Today is Your Third Visitation</span>";
                                                    }else{
                                                        echo "<span class='text-success mr-3 mb-2'>You Have $dateDiff2 Days to Your Third Visitation</span>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media pt-3 pb-3">
                                        <?php
                                        $r = $row['doctor'];
                                        $imgName = "SELECT imgName FROM doctors WHERE fname='$r'";
                                        $re = $db->query($imgName);
                                        foreach($re as $k) :
                                        endforeach;
                                        ?>
                                        <img src="image/<?php echo $k['imgName']; ?>" title="<?php echo $k['imgName']; ?>" class="mr-3 rounded" width="75">
                                        <div class="media-body">
                                            <div class = 'text-success mr-3 mb-2'>
                                                <p class="mb-0">
                                                    <li><i class="las la-calendar"></i>
													    <?php echo $row['finalvisit']; ?>
												    </li>
                                                </p>
                                                <p class="mb-0">
                                                    <li><i class="las la-clock"></i>
													    <?php echo $row['finalvisittime']; ?>
												    </li>
                                                </p>
                                                <?php
                                                    $date3 = $row['finalvisit'];
                                                    $startDate3 = strtotime($date3);
                                                    $todayDate3 = date('Y-m-d');
                                                    $todaysDate3 = strtotime($todayDate3);
                                                    $diffDate3 = abs($todaysDate3 - $startDate3);

                                                    function dateDif($startDate3,$todaysDate3){
                                                        $differ = $startDate3 - $todaysDate3;
                                                        return abs(round($differ / 86400));
                                                    }

                                                    $dateDiff3 = dateDif($startDate3, $todaysDate3);


                                                    if($todaysDate3 > $startDate3){
                                                        echo "<span class='text-danger mb-2'>Fourth Visitation Passed</span>";
                                                    }elseif($todaysDate3 == $startDate3){
                                                        echo "<span class='text-danger mb-2'>Today is Your Fourth Visitation</span>";
                                                    }else{
                                                        echo "<span class='text-success mr-3 mb-2'>You Have $dateDiff3 Days to Your Fourth Visitation</span>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="profile-news">
                                    <?php
                                    require 'connection.php';
                                    $nya = $_SESSION['email'];
                                    $sql = "SELECT * FROM otherappointment WHERE email = '$nya'";
                                    $result = $db->query($sql);
                                    if(!$result){
                                        die("Invalid query: " . $db->error);
                                    }
                                    while($row = $result->fetch_assoc())
                                    {
                                    ?>
                                    <h5 class="text-primary d-inline">Appointments</h5>
                                    <div class="media pt-3 pb-3">
                                        <?php
                                        $r = $row['doctor'];
                                        $imgName = "SELECT imgName FROM doctors WHERE fname='$r'";
                                        $re = $db->query($imgName);
                                        foreach($re as $k) :
                                        endforeach;
                                        ?>
                                        <img src="image/<?php echo $k['imgName']; ?>" title="<?php echo $k['imgName']; ?>" class="mr-3 rounded" width="75">
                                        <div class="media-body">
                                            <h5 class="m-b-5"><a href="" class="text-black">
                                                <?php
                                                    echo "Appointment With Dr" . " " . $row['doctor'];
                                                ?></a>
                                            </h5>
                                            <p class="mb-0">
                                                <li><i class="las la-calendar"></i>
													<?php echo $row['appdate']; ?>
												</li>
                                            </p>
                                            <p class="mb-0">
                                                <li><i class="las la-clock"></i>
													<?php echo $row['apptime']; ?>
												</li>
                                            </p>
                                            <?php
                                                $currDate = date('Y-m-d');
                                                $curr = strtotime($currDate);
                                                $book = $row['appdate'];
                                                $bookk = strtotime($book);

                                                if($curr < $bookk && ($row['userStatus'] == 1 && ($row['doctorStatus']==1))){
                                                    echo "<span class='text-success mr-3 mb-2'>Active</span>";
                                                }elseif ($curr < $bookk && ($row['userStatus'] ==0 && ($row['doctorStatus'] == 1))) {
                                                    echo "<span class='text-danger mb-2'>Cancelled By You</span>";
                                                }elseif ($curr < $bookk && ($row['userStatus'] == 1 && ($row['doctorStatus'] == 0))) {
                                                    echo "<span class='text-danger mb-2'>Cancelled By Doctor</span>";
                                                }elseif ($curr < $bookk && ($row['userStatus'] == 0 && ($row['doctorStatus'] == 0))) {
                                                    ?><a href="print_prescription.php?pid=<?php echo $row['pid']?>&id=<?php echo $row['id']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>" 
                                                    title='Print Prescription' tooltip-placement='top' 
                                                    tooltip="Print" class="text-success mr-3 mb-2">Print Prescription
                                                    </a>
                                                    <?php
                                                }elseif ($curr >= $bookk){
                                                    echo "<span class='text-danger mb-2'>Appointment Date Has Passed </span>";
                                                }
                                        
                                            ?>
                                            <p>
                                            <div>
                                            <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                                                { 
                                            ?>
                                                <a href="show-profile.php?id=<?php echo $row['id']?>&cancel=update" 
                                                    onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                                                    title="Cancel Appointment" tooltip-placement="top" tooltip="Remove" 
                                                    class="text-danger mb-2">
                                                    <i class="las la-times-circle scale5"></i>
                                                    <?php } else {
                                                        } ?>
												</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">
                                                Posts</a>
                                            </li>
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">
                                                Personal Information</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">
                                                Setting</a>
                                            </li>
                                        </ul>
                                        <br />
                                        <div class="tab-content">
                                            <div id="my-posts" class="tab-pane fade active show">
                                                <div class="my-post-content pt-3">
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="img/midwife.jpg" alt="" class="img-fluid">
														<a class="post-title" href=""><h3 class="text-black">Midwifery</h3></a>
                                                        <p>
                                                            Midwives save lives. Well-trained midwives could help avert roughly two thirds of all maternal 
                                                            and newborn deaths, according to the most recent State of the World’s Midwifery report.
                                                            <br />
                                                            <a href="" class="post-title">Read More</a>
                                                        </p>
                                                        <button class="btn btn-primary mr-2"><span class="mr-2">
                                                            <i class="fa fa-heart"></i></span>Like
                                                        </button>
                                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#replyModal"><span class="mr-2">
                                                            <i class="fa fa-reply"></i></span>Reply
                                                        </button>
                                                    </div>
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="img/plan.jpg" alt="" class="img-fluid">
														<a class="post-title" href=""><h3 class="text-black">Family Planning</h3></a>
                                                        <p>
                                                            Access to safe, voluntary family planning is a human right. Family planning is 
                                                            central to gender equality and women’s empowerment, and it is a key factor in reducing poverty.
                                                            <br />
                                                            <a href="" class="post-title">Read More</a>
                                                        </p>
                                                        <button class="btn btn-primary mr-2"><span class="mr-2">
                                                            <i class="fa fa-heart"></i></span>Like
                                                        </button>
                                                        <button class="btn btn-secondary"  data-toggle="modal" data-target="#replyModal"><span class="mr-2">
                                                            <i class="fa fa-reply"></i></span>Reply
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                                <div id="about-me" class="tab-pane fade">
                                                    <div class="profile-personal-info">
                                                        <h4 class="text-primary mb-4">Personal Information</h4>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">First Name <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php 
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT fname FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            echo $row['fname'];
                                                                        endforeach; 
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Last Name <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php 
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT lname FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            echo $row['lname'];
                                                                        endforeach; 
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php
                                                                        echo $_SESSION['email'];
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Gender<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    Female
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Date of Birth<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT dob FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            $date = $row['dob'];
                                                                            echo $date;
                                                                        endforeach;
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                                </h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT dob FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            $date = $row['dob'];
                                                                        endforeach;
                                                                        $startDate = strtotime($date);
                                                                        $todayDate = date('Y-m-d');
                                                                        $todaysDate = strtotime($todayDate);
                                                                        $diffDate = abs($todaysDate - $startDate);

                                                                        $yearsDiff = floor($diffDate/(365*60*60*24));
                                                                        print_r($yearsDiff . " Years");
                                                                    
                                                                        print_r(" - ");

                                                                        $monthDiff = floor(($diffDate-$yearsDiff * 365*60*60*24) /(30*60*60*24));
                                                                        print_r($monthDiff . " Months");

                                                                        print_r(" - ");

                                                                        $daysDiff = floor(($diffDate - $yearsDiff * 365*60*60*24 - $monthDiff*30*60*60*24) / (60*60*24));
                                                                        print_r($daysDiff . " Days");
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                <?php 
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT state FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            echo $row['state'];
                                                                        endforeach; 
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Phone Number<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php 
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT pno FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            echo $row['pno'];
                                                                        endforeach; 
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Assigned Doctor<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php 
                                                                        $i = 1;
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT doctor FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                            echo "Dr." . ' ' . $row['doctor'];
                                                                        endforeach; 
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">Print Visitation Schedule<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php
                                                                        require 'connection.php';
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT * FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                        endforeach;
                                                                    ?>
                                                                        <a href="print_visitation.php?pid=<?php echo $row['pid']?>&id=<?php echo $row['id']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&doctor=<?php echo $row['doctor']?>&firstvisit=<?php echo $row['firstvisit']?>&secondvisit=<?php echo $row['secondvisit']?>&thirdvisit=<?php echo $row['thirdvisit']?>&finalvisit=<?php echo $row['finalvisit']?>" 
                                                                            title='Print Prescription' tooltip-placement='top' 
                                                                            tooltip="Print" class="text-success mr-3 mb-2">View Visitation Schedule
                                                                        </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-3">
                                                                <h5 class="f-w-500">View Prescription<span class="pull-right">:</span></h5>
                                                            </div>
                                                            <div class="col-9">
                                                                <span>
                                                                    <?php
                                                                        require 'connection.php';
                                                                        $nya = $_SESSION['email'];
                                                                        $sql = "SELECT * FROM patreg WHERE email = '$nya'";
                                                                        $rows = mysqli_query($db, $sql);
                                                                        foreach($rows as $row) :
                                                                        endforeach;
                                                                    ?>
                                                                        <a href="print_prescription.php?pid=<?php echo $row['pid']?>&id=<?php echo $row['id']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&doctor=<?php echo $row['doctor']?>&firstvisit=<?php echo $row['firstvisit']?>&secondvisit=<?php echo $row['secondvisit']?>&thirdvisit=<?php echo $row['thirdvisit']?>&finalvisit=<?php echo $row['finalvisit']?>" 
                                                                            title='Print Prescription' tooltip-placement='top' 
                                                                            tooltip="Print" class="text-success mr-3 mb-2">View Prescription
                                                                        </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="profile-settings" class="tab-pane fade">
                                                    <div class="pt-3">
                                                        <div class="settings-form">
                                                            <h4 class="text-primary">Account Setting</h4>
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Email</label>
                                                                        <input type="email" placeholder="Email" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Password</label>
                                                                        <input type="password" placeholder="Password" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" placeholder="1234 Main St" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Address 2</label>
                                                                    <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>City</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label>State</label>
                                                                        <select class="form-control default-select" id="inputState">
                                                                            <option selected="">Choose...</option>
                                                                            <option>Option 1</option>
                                                                            <option>Option 2</option>
                                                                            <option>Option 3</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-2">
                                                                        <label>Zip</label>
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
																	    <input type="checkbox" class="custom-control-input" id="gridCheck">
																	    <label class="custom-control-label" for="gridCheck"> Check me out</label>
																    </div>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Sign
                                                                    in
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
									    <!-- Modal -->
								    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


	        <!-- Footer Start -->
			<div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Our Head Office</h2>
                            <p><i class="fa fa-map-marker-alt"></i>American University of Nigeria.
                            <br />
                            No. 98 Lamido Zubairu Way, Yola-Township Road 
                            Adamawa State. Nigeria.</p>
                            <p><i class="fa fa-phone-alt"></i>+234 706 558 1737</p>
                            <p><i class="fa fa-envelope"></i>info@acmais.com</p>
                            <div class="footer-social">
                                <a class="btn btn-custom" href="https://www.twitter.com/@pwdvsinitiat1"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-custom" href="https://www.facebook.com/PWD ADAMAWA"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Popular Links</h2>
                            <a href="about.php">About Us</a>
                            <a href="contact.php">Contact Us</a>
                            <a href="causes.php">Popular Causes</a>
                            <a href="event.php">Upcoming Events</a>
                            <a href="blog.php">Latest Blog</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Useful Links</h2>
                            <a href="">Terms of use</a>
                            <a href="">Privacy policy</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            <h2>Newsletter</h2>
                            <form>
                                <input class="form-control" placeholder="Email goes here">
                                <button class="btn btn-custom">Submit</button>
                                <label>Don't worry, we don't spam!</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <?php $year = date('Y'); echo $year;?> <a href="index.php">ADPWDVSI</a>, All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	
	<!--removeIf(production)-->
        
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="new/vendor/global/global.min.js"></script>
	<script src="new/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="new/js/custom.min.js"></script>
	<script src="new/js/deznav-init.js"></script>
	<script src="new/vendor/lightgallery/js/lightgallery-all.min.js"></script>
	<script>
		$('#lightgallery').lightGallery({
			thumbnail:true,
		});
	</script>
    



	
		
</body>

</html>