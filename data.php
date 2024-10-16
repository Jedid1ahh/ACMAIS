<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
    </head>
    <body>
        <?php
        echo "Welcome"; 
        ?>
        <table border = 1 cellspacing = 0 cellpadding = 10>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Image</td>
            </tr>
            <?php
            $i = 1;
            $sql = "SELECT * FROM patreg ORDER BY id DESC";
            $rows = mysqli_query($db, $sql)
            ?>
            <?php
            foreach($rows as $row) : 
            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["fname"]; ?></td>
                <td><img src="image/<?php echo $row['imgName']; ?>" width=200 title="<?php echo $row['imgName']; ?>" alt=""></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <a href="../upload">Upload Image File</a>
    </body>
</html>

