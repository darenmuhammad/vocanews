    <!-- main -->
    <main>
        <!-- header -->
        <header class = "header" id = "header">
            <div class = "header-banner-wrapper">
                <?php
                    $sql = "SELECT * FROM `berita` JOIN `status` USING(`id_status`) 
                            JOIN `kategori` USING(`id_kategori`) JOIN `admin` USING(`id_admin`) 
                            WHERE `nama_status` LIKE '%terbaru%' ORDER BY `id_berita` DESC";                    
                    $berita = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($berita) > 0 ){
                    while($b = mysqli_fetch_array($berita)){
                ?>
                <div class = "header-banner flex"
                    style="background: var(--gradient), url(admin/images/berita/<?= $b['gambar'] ?>) center/
                    cover no-repeat;">
                    <div class = "container text-center text-white">
                        <h1><?= $b['judul'] ?></h1>
                        <a href="index.php?includes=artikel&id=<?= $b['id_berita'] ?>" class="btn">Read More</a>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </header>
        <!-- end of header -->

        <!-- news section -->
        <section class = "courses bg-white py-4" id = "news">
            <div class = "container">
                <div class = "section-title">
                    <h2>Popular News</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `status` USING(`id_status`) 
                                JOIN `kategori` USING(`id_kategori`) JOIN `admin` USING(`id_admin`) 
                                WHERE `nama_status` LIKE '%populer%' ORDER BY `id_berita` DESC";                   
                        $berita = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($berita) > 0 ){
                        while($b = mysqli_fetch_array($berita)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $b['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($b['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($b['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $b['tgl_posting'] ?></li>
                                <li>By: <?php echo $b['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $b['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!-- end of news section -->

        <!-- category section -->
        <section class = "features bg-white-sm py-4" id = "category">
            <div class = "container">
                <div class = "section-title">
                    <a href="index.php?includes=kategori#header"><h2>category</h2></a>
                </div>
                <div class = "features-content grid text-center">
                    <?php
                        $sql = "SELECT * FROM `kategori` ORDER BY `id_kategori` DESC";                    
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <div class = "features-item">
                        <div class = "icon bg-white flex">
                            <a href="index.php?includes=kategori#<?php echo $k['kategori'] ?>">
                                <img src = "admin/images/kategori/<?php echo $k['gambar_kategori'] ?>" alt = "features icon">
                            </a>
                        </div>
                        <a href="index.php?includes=kategori#<?php echo $k['kategori'] ?>"><h3 class = "font-lg text-capitalize"><?php echo $k['kategori'] ?></h3></a>
                        <p class = "text"><?php echo $k['keterangan'] ?></p>
                    </div>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <!-- end of category section -->

        <!-- about section -->
        <section class = "about bg-white" id = "about">
            <div class = "container">
                <div class = "about-content grid">
                    <div class = "about-left">
                        <img src = "admin/images/identitas/<?php echo $d->foto_perusahaan?>">
                    </div>
                    <div class = "about-right">
                        <h2 class = "font-xl">News Company</h2><br>
                        <p class = "text"><?php echo $d->tentang_perusahaan ?></p>
                        <div class = "font-md fw-6">
                            <div class = "about-icon flex">
                                <a href="https://www.instagram.com/" target="_blank"><img src = "admin/images/icons/instagram.png"></a>
                                <a href="https://www.instagram.com/" target="_blank"><span>vocanews</span></a>
                            </div>
                            <div class = "about-icon flex">
                                <a href="https://www.twitter.com/" target="_blank"><img src = "admin/images/icons/twitter.png"></a>
                                <a href="https://www.twitter.com/" target="_blank"><span>@vocanews</span></a>
                            </div>
                            <div class = "about-icon flex">
                                <a href="https://www.facebook.com/" target="_blank"><img src = "admin/images/icons/facebook.png"></a>
                                <a href="https://www.facebook.com/" target="_blank"><span>vocanews</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of about section -->

        <!-- team section -->
        <section class = "teachers py-4 bg-white-sm" id = "team">
            <div class = "container">
                <div class = "section-title">
                    <h2>Our Team</h2>
                </div>
                <div class = "teachers-content grid text-center">
                    <?php
                        $sql = "SELECT * FROM `admin` ORDER BY `id_admin` DESC";
                        $admin = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($admin) > 0){
                            while($a = mysqli_fetch_array($admin)){
                    ?>
                    <div class = "teachers-item">
                        <div class = "image">
                            <img src = "admin/images/author/<?php echo $a['foto'] ?>" alt = "teachers image">
                        </div>
                        <div class = "info">
                            <p class = "fw-6 font-lg"><?php echo $a['nama_lengkap'] ?></p>
                            <p class = "text-green font-md fw-5"><?php echo $a['level'] ?></p>
                        </div>
                    </div>
                    <?php }} ?>
                    
                </div>
            </div>
        </section>
        <!-- end of team section -->

        <!-- contact section -->
        <section class = "contact py-4 bg-white" id = "contact">
            <div class = "container">
                <div class = "section-title">
                    <h2>Contact</h2>
                </div>
                <div class = "contact-content grid">
                    <div class = "contact-right">
                        <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=universitas brawijaya&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        <div class = "contact-info grid text-center">
                            <div class = "contact-info-group">
                                <span class = "text-green">
                                    <i class = "fas fa-map-marker-alt fa-2x"></i>
                                </span>
                                <p class = "text font-md fw-6"><?php echo $d->alamat ?></p>
                            </div>
                            <div class = "contact-info-group">
                                <span class = "text-green">
                                    <i class = "fas fa-envelope fa-2x"></i>
                                </span>
                                <p class = "text font-md fw-6"><?php echo $d->email ?></p>
                            </div>
                            <div class = "contact-info-group">
                                <span class = "text-green">
                                    <i class = "fas fa-phone fa-2x"></i>
                                </span>
                                <p class = "text font-md fw-6"><?php echo $d->telepon ?></p>
                            </div>
                        </div>
                    </div>

                    <div class = "contact-left">
                        <form action = "" method = "post" class = "font-sm text-center">
                            <input type = "text" class = "form-control fw-6" placeholder="Full Name" name = "nama" required>
                            <input type = "email" class = "form-control fw-6" placeholder="E-mail" name = "email" required>
                            <input type = "text" class = "form-control fw-6" placeholder="Subject" name = "subjek" required>
                            <textarea rows = "5" class = "form-control fw-6" placeholder="Message" name = "isi" required></textarea>
                            <button type = "submit" name="submit" class = "btn bg-green">Send</button>
                        </form>

                        <?php
                            if (isset($_POST['submit'])){
                                $nama   = ucwords($_POST['nama']);
                                $email  = $_POST['email'];
                                $isi    = $_POST['isi'];
                                $subjek    = $_POST['subjek'];
                                $currdate = date('Y-m-d H:i:s');

                                $sqlinsert = "INSERT INTO `pesan` VALUES (
                                    null, 
                                    '$email', 
                                    '$nama', 
                                    '$subjek',
                                    '$isi',
                                    '$currdate'
                                    )";
                                $insert = mysqli_query($conn, $sqlinsert);
                                if($insert){
                                    echo '<script>alert("Pesan telah dikirim")</script>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of contact section -->
    </main>
    <!-- end of main -->