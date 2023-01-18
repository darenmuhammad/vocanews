<?php include('koneksi/koneksi.php'); ?>
<?php
    date_default_timezone_set("Asia/Jakarta");

    $sql = "SELECT * FROM `pengaturan` ORDER BY `id` DESC LIMIT 1";
    $identitas = mysqli_query($conn,$sql);
    $d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="admin/images/identitas/<?= $d->favicon ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" 
    rel="stylesheet">
    <!-- normalize -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- slick slider -->
    <link rel="stylesheet" href="assets/plugins/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="assets/plugins/slick-1.8.1/slick/slick-theme.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/utilities.css">
    <title><?= $d->nama ?></title>
</head>
<body>
    <?php include('includes/header.php'); ?>

    <?php
        if(isset($_GET["includes"])){
            $includes = $_GET["includes"];
            if($includes == "artikel"){
                include("includes/artikel.php");
            }else if($includes == "kategori"){
                include("includes/kategori.php");
            }else{
                include("includes/beranda.php");
            }
        }else{
            include("includes/beranda.php");
        }
    ?>

    <?php include("includes/footer.php"); ?>
</body>
</html>