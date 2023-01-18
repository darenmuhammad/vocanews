<body class="bg-light">
    <!-- navbar -->
    <div class="navbar">

        <div class="container">

            <!-- navbar brand -->
            <h2 class="nav-brand float-left"><a href="index.php?includes=dashboard"><?= $d->nama ?></a></h2>

            <!-- navabr menu -->
            <ul class="nav-menu float-right">
                <li><a href="index.php?includes=dashboard">Dashboard</a></li>
                <?php 
                    if (isset($_SESSION['level'])){
                        if($_SESSION['level'] == "Super Admin"){
                ?>
                <li>
                    <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>
                    <!-- sub menu -->
                    <ul class="dropdown">
                    <li><a href="index.php?includes=identitas-perusahaan">Identitas Perusahaan</a></li>
                    <li><a href="index.php?includes=tentang-perusahaan">Tentang Perusahaan</a></li>
                    <li><a href="index.php?includes=pemimpin-perusahaan">Pemimpin Perusahaan</a></li>
                    <li><a href="index.php?includes=pengguna">Pengguna</a></li>
                    </ul>
                </li>
                <?php }}?>

                <li>
                    <a href="#">Menu Admin <i class="fa fa-caret-down"></i></a>
                    <!-- sub menu -->
                    <ul class="dropdown">
                    <li><a href="index.php?includes=berita">Berita</a></li>
                    <li><a href="index.php?includes=kategori">Kategori</a></li>
                    <li><a href="index.php?includes=pesan">Pesan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><?= $_SESSION['nama']?> (<?= $_SESSION['level'] ?>) <i class="fa fa-caret-down"></i></a>
                    <!-- sub menu -->
                    <ul class="dropdown">
                        <li><a href="index.php?includes=profil">Profil</a></li>
                        <li><a href="index.php?includes=ubah-password">Ubah Password</a></li>
                        <li><a href="index.php?includes=logout">Log Out</a></li>
                    </ul>
                </li>
            </ul>

            <div class="clearfix"></div>

        </div>

    </div>