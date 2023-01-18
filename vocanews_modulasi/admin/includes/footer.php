<?php
    if(!isset($_SESSION['status_login'])){
        echo "<script>window.location='index.php?includes=login&msg=Harap Login Terlebih Dahulu!'</script>";
    }
    date_default_timezone_set("Asia/Jakarta");

    $sql = "SELECT * FROM `pengaturan` ORDER BY `id` DESC LIMIT 1";
    $identitas = mysqli_query($conn,$sql);
    $d = mysqli_fetch_object($identitas);
?> 
    <!-- footer -->
    <div class="footer">

        <div class="container text-center">
            Copyright &copy; 2022 - <?= $d->nama ?>.
        </div>

    </div>
</body>
</html>