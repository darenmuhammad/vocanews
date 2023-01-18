<?php
    $id = $_GET['id'];
    $sql = "SELECT `judul`,`kategori`,`teks_berita`,`nama_lengkap`,
            `gambar`, `tgl_posting`
            FROM `berita` JOIN `status` USING(`id_status`) 
            JOIN `kategori` USING(`id_kategori`) 
            JOIN `admin` USING(`id_admin`)WHERE `id_berita` = '$id'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) == 0){
        echo '<script>window.location="index.php?includes=artikel"</script>';
    }
    $b = mysqli_fetch_object($query);
?>

<!-- main -->
<main>

    <!-- header -->
        <header class = "header" id = "header">
            <div class = "header-banner-wrapper">
                
                <div class = "header-banner flex"
                    style="background: var(--gradient), url(admin/images/header_kategori/news-paper.jpeg) center/
                    cover no-repeat;">
                    <div class = "container text-center text-white">
                        <h1>News</h1>
                    </div>
                </div>
                
            </div>
        </header>
    <!-- end of header -->

    <!-- news text content -->
        <section class="blog-content">

            <div class="row">
                <div class="blog-left">
                    <img src="admin/images/berita/<?php echo $b->gambar ?>">
                    <h2><?php echo $b->judul ?></h2>
                    <p class="penulis">posted By: <span><?php echo $b->nama_lengkap ?></span> at <?php echo $b->tgl_posting ?></p>
                    <p><?php echo $b->teks_berita ?></p>
                </div>
                <div class="blog-right">
                    <h3 class="text-capitalize">Related Article (<?php echo $b->kategori ?>)</h3>
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `status` USING(`id_status`) 
                                JOIN `kategori` USING(`id_kategori`) 
                                JOIN `admin` USING(`id_admin`) ";
                        if(isset($_GET['id'])){
                            $katakunci = $b->kategori;
                            $sql .= " WHERE `kategori` LIKE '%$katakunci%'";
                        }
                        $sql .= " ORDER BY `id_berita` DESC LIMIT 10";
                        $berita = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($berita) > 0 ){
                        while($b = mysqli_fetch_array($berita)){
                    ?>
                    <div>
                        <div>
                            <a href="index.php?includes=artikel&id=<?php echo $b['id_berita'] ?>">
                                <img src="admin/images/berita/<?php echo $b['gambar'] ?>">
                            </a>
                        </div>
                        <p>
                            <?php echo substr($b['teks_berita'], 0,94) ?>
                            <a href="index.php?includes=artikel&id=<?php echo $b['id_berita'] ?>" class="text-green fw-6">read more...</a>
                        </p>
                    </div>
                    <?php }} ?>
                </div>
            </div>

        </section>
    <!-- end of news text content -->

</main>
<!-- end of main -->