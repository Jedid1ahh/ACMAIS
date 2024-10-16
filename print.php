<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ANTENATAL CARE AND MATERNAL HEALTH INTERVENTION SYSTEM (ACMAIS)</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="img/logo.jpg" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <h2 style ="text-align: center; color: red;"><b>ACMAIS</b></h2>
        <p style="text-align: center;"><b>APPOINTMENT DETAILS</b> </p>
            <div class="row">
				<div class="col-12">
					<div class="table-responsive card-table">
						<table id="example5" class="display dataTablesCard table-responsive-xl" border="6">
							<thead>
								<tr>
									<th>ID</th>
									<th>Patient's ID</th>
									<th>First Name</th>
									<th>Last Name</th>
                                    <th>Doctor Booked</th>
									<th>Appointment Date</th>
									<th>Appointment Time</th>
									<th>Disease</th>
                                    <th>Allergy</th>
                                    <th>Prescription</th>
								</tr>
							</thead>
							<tbody>
                                <tr>
                                    <td><?=$user['id']?></td>
                                    <td><?=$user['pid']?></td>
                                    <td><?=$user['fname']?></td>
                                    <td><?=$user['lname']?></td>
                                    <td><?=$user['doctor']?></td>
                                    <?php 
                                    $date = $user['appdate'];
                                    $dat = strtotime($date);
                                    $lastdate = strtotime(date("Y-m-t", $dat));
                                    $day = date("l", $lastdate);
                                    ?>
                                    <td><?= $day . " - " . $user['appdate']?></td>
                                    <td><?=$user['apptime']?></td>
                                    <td><?=$user['disease']?></td>
                                    <td><?=$user['allergy']?></td>
                                    <td><?=$user['prescription']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
