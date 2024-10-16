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
        <p style="text-align: center;"><b>PRESCRIPTION</b> </p>
        <p>
        <b>ID: </b> <?=$user['id']?>
        <p>
        <b>Patient's ID: </b> <?=$user['pid']?>
        <p>
        <b>First Name:  </b> <?=$user['fname']?>
        <p>
        <b>Last Name: </b> <?=$user['lname']?>
        <p>
        <b>Disease: </b> <?=$user['disease']?>
        <p>
        <b>Allergy: </b> <?=$user['allergy']?>
        <p>
        <b>Prescription: </b> <?=$user['prescription']?>
        <p>
        <b>Assigned Doctor </b><?php echo "Doctor "; ?> <?=$user['doctor']?>
    </body>
</html>
