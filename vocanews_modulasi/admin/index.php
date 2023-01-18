<?php
    session_start();
    include("../koneksi/koneksi.php");
?>

    <!DOCTYPE html>
    <html>
    <head>
        <?php
            $sql = "SELECT * FROM `pengaturan` ORDER BY `id` DESC LIMIT 1";
            $identitas = mysqli_query($conn,$sql);
            $d = mysqli_fetch_object($identitas);
        ?>
        <link rel="icon" href="images/identitas/<?= $d->favicon ?>">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
        <title><?= $d->nama ?> | Panel Admin</title>
    </head>
    <?php
        if(isset($_GET['includes'])){
            $includes = $_GET["includes"];
            if(isset($_SESSION['id'])){
    ?>
    <body>
        <?php include("includes/header.php") ?>
        <?php
            if($includes == "berita"){
                include("includes/berita.php");
            }else if($includes == "edit-berita"){
                include("includes/edit-berita.php");
            }else if($includes == "edit-kategori"){
                include("includes/edit-kategori.php");
            }else if($includes == "edit-pengguna"){
                include("includes/edit-pengguna.php");
            }else if($includes == "identitas-perusahaan"){
                include("includes/identitas-perusahaan.php");
            }else if($includes == "ubah-password"){
                include("includes/ubah-password.php");
            }else if($includes == "kategori"){
                include("includes/kategori.php");
            }else if($includes == "lihat-pesan"){
                include("includes/lihat-pesan.php");
            }else if($includes == "pemimpin-perusahaan"){
                include("includes/pemimpin-perusahaan.php");
            }else if($includes == "pengguna"){
                include("includes/pengguna.php");
            }else if($includes == "pesan"){
                include("includes/pesan.php");
            }else if($includes == "profil"){
                include("includes/profil.php");
            }else if($includes == "tambah-berita"){
                include("includes/tambah-berita.php");
            }else if($includes == "tambah-kategori"){
                include("includes/tambah-kategori.php");
            }else if($includes == "tambah-pengguna"){
                include("includes/tambah-pengguna.php");
            }else if($includes == "tentang-perusahaan"){
                include("includes/tentang-perusahaan.php");
            }else if($includes == "logout"){
                include("includes/logout.php");
            }else if($includes == "hapus"){
                include("includes/hapus.php");
            }else{
                include("includes/dashboard.php");
            }
        ?>
        <?php include("includes/footer.php") ?>
    </body>
    <?php
            }else{
                include("includes/login.php");
            }
        }else{
            if(isset($_SESSION['id'])){
    ?>
    <body>
        <?php include("includes/header.php") ?>
        <?php include("includes/dashboard.php") ?>
        <?php include("includes/footer.php") ?>
    </body>
    <?php 
            }else{
                include("includes/login.php");
            }
        }    
    ?>
</html>