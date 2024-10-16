<?php
require 'connection.php';
include_once("session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo.jpg">
    <link href="new/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="new/vendor/chartist/css/chartist.min.css">
    <link href="new/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="new/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="new/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">

    <style>
        .wrapper{
                display: grid;
                grid-template-columns: 1fr 1fr;
                grid-gap: 40px;
            }
    </style>
    
    <script>

        function numOnly(event) {
        var key = event.keyCode;
        return ((key >= 48 && key <= 57) || key == 8 || key == 32);
        };

        function alphaOnly(event) {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8 || key == 32);
        };

        function checklen(){
            var contact = document.getElementById("contact");  
                if((contact.value.length<11) || (contact.value.length >11)){
                    alert('Number Must Be 11 Digits Long');
                    return false;  
                }
            var check = function(){
                if(document.getElementById('password').value ==
                document.getElementById('cpassword').value){
                    document.getElementById('mesage').style.color = '#5dd05d';
                    document.getElementById('mesage').innerHTML = 'Matched';
                }else{
                    document.getElementById('mesage').style.color = '#5dd05d';
                    document.getElementById('mesage').innerHTML = 'Not Matched';
                }
            }
        }
    </script>
</head>
<body>
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
		

		
		<!--**********************************
            Header start
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
                                <a class="nav-link bell bell-link" href="index.html">
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
                                            $i = 1;
                                            $nya = $_SESSION['username'];
                                            $sql = "SELECT * FROM admintb WHERE username = '$nya'";
                                            $rows = mysqli_query($db, $sql)
                                        ?>
                                        <?php
                                            foreach($rows as $row) :
                                        ?>
                                        <img class="rounded-circle" src="image/<?php echo $row['image']; ?>" title="<?php echo $row['image']; ?>" alt="" style="width: 40px; height: 40px;">
                                        <?php endforeach; ?>
                                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item ai-icon">
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
							<li><a href="admin.php">Dashboard</a></li>
							<li><a href="appointments.php">Visitation Appointments</a></li>
							<li><a href="list-of-patients.php">Patient Details</a></li>
							<li><a href="doctor.html">Doctors</a></li>
							<li><a href="add-doctor.php">Doctor Details</a></li>
							<li><a href="reviews.html">Reviews</a></li>
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="admin-profile.php">Profile</a></li>
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
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-sm-4 mb-3">
					<div class="mr-auto">
						<h2 class="text-black font-w600">List of Doctors</h2>
					</div>
					<div>
						<a href="javascript:void(0)" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addOrderModal">+New Doctor</a>
					</div>
				</div>
				<!-- Add Order -->
				<div class="modal fade" id="addOrderModal">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add New Doctor</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="dreg.php" method="POST" enctype="multipart/form-data">
                                    <div class="wrapper">
									    <div class="grid-item">
										    <label class="text-black font-w500">First Name</label>
										    <input type="text" class="form-control" name="fname" onkeydown="return alphaOnly(event);" required />
									    </div>
                                        <div class="grid-item">
										    <label class="text-black font-w500">Last Name</label>
										    <input type="text" class="form-control" name="lname" onkeydown="return alphaOnly(event);" required />
									    </div>
                                        <div class="grid-item">
										    <label class="text-black font-w500">State of Origin</label>
										    <input type="text" class="form-control" name="sog" onkeydown="return alphaOnly(event);" required />
									    </div>
                                        <div class="grid-item">
                                            <label class="text-black font-w500">Place of Primary Assignment</label>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="card">
                                                            <div class="basic-dropdown">
                                                                <div class="dropdown">
                                                                    <select name="ppp" class="btn btn-primary dropdown-toggle" >
                                                                        <div class="dropdown-menu">
                                                                            <option value="Meddy Clinic" class="dropdown-item">Meddy Clinic</option>
                                                                            <option value="Peace Hospital" class="dropdown-item">Peace Hospital</option>
                                                                            <option value="AUN Clinic" class="dropdown-item">AUN Clinic</option>
                                                                            <option value="Specialist Hospital" class="dropdown-item">Specialist Hospital</option>
                                                                            <option value="Bamayi Clinic" class="dropdown-item">Bamayi Clinic</option>
                                                                            <option value="Nigerian-German Hospital" class="dropdown-item">Nigerian-German Hospital</option>
                                                                        </div>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                            <label class="text-black font-w500">Upload Profile Image</label>
                                            <input class="form-control" id="image" name="image" accept=".jpg, .jpeg .png" value="" type="file"/>
                                        </div>
                                        <div class="grid-item">
                                            <label class="text-black font-w500">Choose Specialism</label>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="card">
                                                            <div class="basic-dropdown">
                                                                <div class="dropdown">
                                                                    <select name="specialism" class="btn btn-primary dropdown-toggle" >
                                                                        <div class="dropdown-menu">
                                                                            <option value="Gynaecologist" class="dropdown-item">Gynaecologist</option>
                                                                            <option value="Dentist" class="dropdown-item">Dentist</option>
                                                                            <option value="Lab Specialist" class="dropdown-item">Lab Specialist</option>
                                                                            <option value="Paediatrician" class="dropdown-item">Paediatrician</option>
                                                                        </div>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-item">
                                        <label class="text-black font-w500">Select Gender</label>
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-6">
                                                    <div class="card">
                                                        <div class="basic-dropdown">
                                                            <div class="dropdown">
                                                                <select name="gender" class="btn btn-primary dropdown-toggle" >
                                                                    <option value="" class="dropdown-item">Gender </option>
                                                                    <div class="dropdown-menu">
                                                                        <option value="Male" class="dropdown-item">Male</option>
                                                                        <option value="Female" class="dropdown-item">Female</option>
                                                                    </div>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									    <div class="grid-item">
										    <label class="text-black font-w500">Contact</label>
										    <input type="phone" id="contact" name="contact" class="form-control" minlength="11" maxlength="11" onkeydown="return numOnly(event);" required />
                                            <span id='message'></span>
									    </div>
                                        <div class="grid-item">
										    <label class="text-black font-w500">Password</label>
										    <input type="password" id="password" name="password" class="form-control" onkeyup='check();' required />
									    </div>
                                        <div class="grid-item">
										    <label class="text-black font-w500">Confirm Password</label>
										    <input type="password" id="cpassword" name="cpassword" class="form-control" onkeyup='check();'  required />
                                            <span id='mesage'></span>
									    </div>
                                        <div class="grid-item">
                                            <input type="submit" class="btn btn-primary" name="submit" onclick="return checklen();" value="Register"/>
                                        </div>
								    </form>
							    </div>
						    </div>
					    </div>
				    </div>
                </div>
				<div class="row">
					<div class="col-12">
						<div class="table-responsive card-table">
							<table id="example5" class="display dataTablesCard table-responsive-xl">
								<thead>
									<tr>
										<th>ID</th>
										<th>Doctor's ID</th>
										<th>Doctor Name</th>
										<th>Specialist</th>
										<th>Image</th>
										<th>Gender</th>
										<th>Contact</th>
                                        <th>State of Origin </th>
                                        <th> Place of Primary Assignment </th>
										<th>Status</th>
                                        <th>Date Joined</th>
                                        <th>Delete Doctor</th>
									</tr>
								</thead>
                                <?php
                                    require 'connection.php';
                                    if(isset($_GET['cancel'])){
                                        $zino = "DELETE FROM doctors WHERE id = '".$_GET['id']."'";
                                        $check_zino = mysqli_query($db,$zino);
                                    
                                        if($check_zino){
                                            echo "<script>alert('Doctor Has Successfully Been Deleted');</script>";
                                        }
                                      }
                                ?>
								<tbody>
                                    <?php
                                        require 'connection.php';
                                        $sql = "SELECT * FROM doctors";
                                        $result = $db->query($sql);
                                        if(!$result){
                                            die("Invalid query: " . $db->error);
                                        }
                                        while($row = $result->fetch_assoc())
                                        {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?> </td>
                                        <td><?php echo $row['doctor_id']; ?> </td>
                                        <td><?php echo "Dr" . ' ' . $row['fname'] . ' ' . $row['lname']; ?>  </td>
                                        <td><?php echo $row['specialist']; ?> </td>
                                        <td><img class="rounded-circle me-lg-2" src="image/<?php echo $row['imgName']; ?>" title="<?php echo $row['imgName']; ?>" alt="" style="width: 40px; height: 40px;"></td>
                                        <td><?php echo $row['gender']; ?> </td>
                                        <td><?php echo $row['contact']; ?> </td>
                                        <td><?php echo $row['sog']; ?> </td>
                                        <td><?php echo $row['ppp']; ?> </td>
                                        <td><?php echo $row['status']; ?> </td>
                                        <td><?php echo $row['joined']; ?> </td> 
                                        <td>
                                            <a href="add-doctor.php?id=<?php echo $row['id']?>&cancel=delete" 
                                                    onClick="return confirm('Are you sure you want to delete Dr. <?php echo $row['fname'];?>?')"
                                                    title="Delete Doctor" tooltip-placement="top" 
                                                    class="btn btn-primary mr-3">Delete
                                            </a>
                                        </td>     
                                    </tr>
                                    <?php                
                                        }
                                    ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
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

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="new/vendor/global/global.min.js"></script>
	<script src="new/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="new/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="new/js/custom.min.js"></script>
	<script src="new/js/deznav-init.js"></script>

    <!-- Datatable -->
    <script src="new/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script>
		(function($) {
			var table = $('#example5').DataTable({
				searching: false,
				paging:true,
				select: false,
				//info: false,         
				lengthChange:false 
				
			});
			$('#example tbody').on('click', 'tr', function () {
				var data = table.row( this ).data();
				
			});
		})(jQuery);
	</script>
</body>
</html>