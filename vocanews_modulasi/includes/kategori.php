<!-- main -->
<main>

        <!-- header -->
        <header class = "header" id = "header">
            <div class = "header-banner-wrapper">
                
                <div class = "header-banner flex"
                    style="background: var(--gradient), url(admin/images/header_kategori/header-kategori.jpg) center/
                    cover no-repeat;">
                    <div class = "container text-center text-white">
                        <h1>Category</h1>
                    </div>
                </div>
                
            </div>
        </header>
        <!-- end of header -->

        <!-- sports section -->
        <section class = "courses bg-white py-4" id = "sports">
            <div class = "container grid">
                    <form action="index.php?includes=kategori#sports" method="post">
                        <div class="input-group">
                            <input type="text" name="key_sports" placeholder="Search Sports">
                            <button type="submit" class = "btn-input bg-green"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <div class = "section-title">
                    <h2>sports</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `kategori` USING(`id_kategori`) 
                                        JOIN `admin` USING(`id_admin`) ";
                        if(isset($_POST['key_sports'])){
                            $katakunci   = addslashes($_POST['key_sports']);
                            $sql .= " WHERE `kategori` LIKE '%sports%' 
                                    AND (`judul` LIKE '%$katakunci%' OR `nama_lengkap` LIKE '%$katakunci%')";
                        }else{
                            $sql .= " WHERE `kategori` LIKE '%sports%' ";
                        }
                        $sql .= " ORDER BY `id_berita` DESC";
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $k['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($k['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($k['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $k['tgl_posting'] ?></li>
                                <li>By: <?php echo $k['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $k['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }}else{ ?>
                        <div class="display-none"></div>
                    <?php } ?>
                </div>
            </div>
        </section><hr>
        <!-- end of sports section -->

        <!-- lifestyles section -->
        <section class = "courses bg-white py-4" id = "lifestyles">
            <div class = "container grid">
                    <form action="index.php?includes=kategori#lifestyles" method="post">
                        <div class="input-group">
                            <input type="text" name="key_lifestyles" placeholder="Search Lifestyles">
                            <button type="submit" class = "btn-input bg-green"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <div class = "section-title">
                    <h2>lifestyles</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `kategori` USING(`id_kategori`) 
                                        JOIN `admin` USING(`id_admin`) ";
                        if(isset($_POST['key_lifestyles'])){
                            $katakunci   = addslashes($_POST['key_lifestyles']);
                            $sql .= " WHERE `kategori` LIKE '%lifestyles%' 
                                    AND (`judul` LIKE '%$katakunci%' OR `nama_lengkap` LIKE '%$katakunci%')";
                        }else{
                            $sql .= " WHERE `kategori` LIKE '%lifestyles%' ";
                        }
                        $sql .= " ORDER BY `id_berita` DESC";
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $k['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($k['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($k['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $k['tgl_posting'] ?></li>
                                <li>By: <?php echo $k['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $k['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }}else{ ?>
                        <div class="display-none"></div>
                    <?php } ?>
                </div>
            </div>
        </section><hr>
        <!-- end of lifestyles section -->

        <!-- nationals section -->
        <section class = "courses bg-white py-4" id = "nationals">
            <div class = "container grid">
                    <form action="index.php?includes=kategori#nationals" method="post">
                        <div class="input-group">
                            <input type="text" name="key_nationals" placeholder="Search Nationals">
                            <button type="submit" class = "btn-input bg-green"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <div class = "section-title">
                    <h2>nationals</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `kategori` USING(`id_kategori`) 
                                        JOIN `admin` USING(`id_admin`) ";
                        if(isset($_POST['key_nationals'])){
                            $katakunci   = addslashes($_POST['key_nationals']);
                            $sql .= " WHERE `kategori` LIKE '%nationals%' 
                                    AND (`judul` LIKE '%$katakunci%' OR `nama_lengkap` LIKE '%$katakunci%')";
                        }else{
                            $sql .= " WHERE `kategori` LIKE '%nationals%' ";
                        }
                        $sql .= " ORDER BY `id_berita` DESC";
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $k['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($k['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($k['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $k['tgl_posting'] ?></li>
                                <li>By: <?php echo $k['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $k['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }}else{ ?>
                        <div class="display-none"></div>
                    <?php } ?>
                </div>
            </div>
        </section><hr>
        <!-- end of nationals section -->

        <!-- technology section -->
        <section class = "courses bg-white py-4" id = "technology">
            <div class = "container grid">
                    <form action="index.php?includes=kategori#technology" method="post">
                        <div class="input-group">
                            <input type="text" name="key_tech" placeholder="Search Technology">
                            <button type="submit" class = "btn-input bg-green"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <div class = "section-title">
                    <h2>technology</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `kategori` USING(`id_kategori`) 
                                        JOIN `admin` USING(`id_admin`) ";
                        if(isset($_POST['key_tech'])){
                            $katakunci   = addslashes($_POST['key_tech']);
                            $sql .= " WHERE `kategori` LIKE '%technology%' 
                                    AND (`judul` LIKE '%$katakunci%' OR `nama_lengkap` LIKE '%$katakunci%')";
                        }else{
                            $sql .= " WHERE `kategori` LIKE '%technology%' ";
                        }
                        $sql .= " ORDER BY `id_berita` DESC";
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $k['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($k['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($k['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $k['tgl_posting'] ?></li>
                                <li>By: <?php echo $k['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $k['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }}else{ ?>
                        <div class="display-none"></div>
                    <?php } ?>
                </div>
            </div>
        </section><hr>
        <!-- end of technology section -->

        <!-- politics section -->
        <section class = "courses bg-white py-4" id = "politics">
            <div class = "container grid">
                    <form action="index.php?includes=kategori#politics" method="post">
                        <div class="input-group">
                            <input type="text" name="key_politics" placeholder="Search Politics">
                            <button type="submit" class = "btn-input bg-green"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                <div class = "section-title">
                    <h2>politics</h2>
                </div>
                <div class = "courses-content grid">
                    <?php
                        $sql = "SELECT * FROM `berita` JOIN `kategori` USING(`id_kategori`) 
                                        JOIN `admin` USING(`id_admin`) ";
                        if(isset($_POST['key_politics'])){
                            $katakunci   = addslashes($_POST['key_politics']);
                            $sql .= " WHERE `kategori` LIKE '%politics%' 
                                    AND (`judul` LIKE '%$katakunci%' OR `nama_lengkap` LIKE '%$katakunci%')";
                        }else{
                            $sql .= " WHERE `kategori` LIKE '%politics%' ";
                        }
                        $sql .= " ORDER BY `id_berita` DESC";
                        $kategori = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($kategori) > 0 ){
                        while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <article class = "courses-item">
                        <div class = "bg-white-sm">
                            <div class = "image">
                                <img src = "admin/images/berita/<?php echo $k['gambar'] ?>" alt = "course image">
                            </div>
                            <div class = "details">
                                <h3 class = "font-lg"><?php echo substr($k['judul'], 0,40) ?>...</h3>
                                <p class = "text"><?php echo substr($k['teks_berita'], 0, 120) ?>...</p>
                            </div>
                            <ul class = "text-center fw-6 font-md">
                                <li>Post: <?php echo $k['tgl_posting'] ?></li>
                                <li>By: <?php echo $k['nama_lengkap'] ?></li>
                            </ul>
                            <a href="index.php?includes=artikel&id=<?= $k['id_berita'] ?>" class="btn">Read More</a>
                        </div>
                    </article>
                    <?php }}else{ ?>
                        <div class="display-none"></div>
                    <?php } ?>
                </div>
            </div>
        </section><hr>
        <!-- end of sports section -->

    </main>
    <!-- end of main -->