<?php
    if(isset($_GET['idpengguna'])){
        $idp = $_GET['idpengguna'];
        $foto = "SELECT `foto` FROM `admin` WHERE `id_admin` = '$idp'";
        $pengguna = mysqli_query($conn, $foto);
        $f = mysqli_fetch_object($pengguna);
        unlink('images/author/' .$f->foto);
        $sqlpengguna = "DELETE FROM `admin` WHERE `id_admin` = '$idp'";
        $delete = mysqli_query($conn, $sqlpengguna);
        echo "<script>window.location='index.php?includes=pengguna'</script>";
    }

    if(isset($_GET['idkategori'])){
        $id = $_GET['idkategori'];
        $sql = "DELETE FROM `kategori` WHERE `id_kategori` = '$id'";
        $delete = mysqli_query($conn, $sql);
        echo '<script>window.location="index.php?includes=kategori"</script>';
    }

    if(isset($_GET['idberita'])){
        $idb = $_GET['idberita'];
        $gambar = "SELECT `gambar` FROM `berita` WHERE `id_berita` = '$idb' ";
        $berita = mysqli_query($conn, $gambar);
        $b = mysqli_fetch_object($berita);
        unlink('images/berita/'.$b->gambar);
        $sql = "DELETE FROM `berita` WHERE `id_berita` = '$idb'";
        $delete = mysqli_query($conn, $sql);
        echo '<script>window.location="index.php?includes=berita"</script>';
    }

    if(isset($_GET['idpesan'])){
        $id = $_GET['idpesan'];
        $sql = "DELETE FROM `pesan` WHERE `pesan_id` = '$id'";
        $delete = mysqli_query($conn, $sql);
        echo '<script>window.location="index.php?includes=pesan"</script>';
    }
?>