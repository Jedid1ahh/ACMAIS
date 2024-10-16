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
        <h1 style ="text-align: center; color: red;"><b>ACMAIS</b></h2>
        <p style="text-align: center;"><b>DATE FOR VISITATION</b> </p>
        <img src="image/<?=$user['imgName']; ?>" title="<?=$user['imgName']; ?>" style="width: 100px; height: 100px;" class="img-1 mr-sm-4 mr-3" alt="">
        <p>
        <b>Profile Picture: </b> <?=$user['pno']?>
        <p>
        <b>ID: </b> <?=$user['id']?>
        <p>
        <b>Patient's ID: </b> <?=$user['pid']?>
        <p>
        <b>First Name:  </b> <?=$user['fname']?>
        <p>
        <b>Last Name: </b> <?=$user['lname']?>
        <p>
        <b>Phone Number: </b> <?=$user['pno']?>
        <p>
        <b>State: </b> <?=$user['state']?>
        <p>
        <b>Email: </b> <?=$user['email']?>
        <p>
        <b>Assigned Doctor </b><?php echo "Doctor "; ?> <?=$user['doctor']?>
        <p> 
        <b>First Visitation: </b> <?=$user['firstvisit']?>
        <p> 
        <b>Second Visitation: </b> <?=$user['secondvisit']?>
        <p> 
        <b>Third Visitation: </b> <?=$user['thirdvisit']?>
        <p> 
        <b>Fourth Visitation: </b> <?=$user['finalvisit']?>
        <p> 
        <b>Expected Due Date: </b> <?=$user['edd']?>
    </body>
</html>
