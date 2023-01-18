<body>
    <!-- navigation bar -->
        <nav class = "navbar">
            <div class = "container flex">
                <a href = "#" class = "navbar-brand flex">
                    <img src = "admin/images/identitas/<?= $d->logo ?>" height="45" width="45">
                    <span class = "text-white font-sm fw-5" style="margin-left: 1rem;"><?= $d->nama ?></span>
                </a>
                <button type = "button" class = "navbar-toggler-btn text-white">
                    <i class = "fas fa-bars fa-2x"></i>
                </button>

                <div class = "navbar-collapse bg-green">
                    <ul class = "navbar-nav text-capitalize font-md fw-7">
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#header" class = "nav-link text-white">Home Page</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#news" class = "nav-link text-white"> Pop News</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#category" class = "nav-link text-white">Category</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#about" class = "nav-link text-white">About Us</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#team" class = "nav-link text-white">Team</a>
                        </li>
                        <li class = "nav-item">
                            <a href = "index.php?includes=beranda#contact" class = "nav-link text-white">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- end of navigation bar -->