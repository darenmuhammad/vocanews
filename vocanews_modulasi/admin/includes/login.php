<body>
    <!-- page login -->
    <div class="page-login">

        <!-- box  -->
        <div class="box box-width">

            <!-- box header -->
            <div class="box-header">
                Login
            </div>

            <!-- box body -->
            <div class="box-body">

                <?php
                    if(isset($_GET['msg'])){
                        echo "<div class='alert alert-error'>".$_GET['msg']."</div>";
                    }
                ?>
                
                <!-- form login -->
                <form action="" method="post">

                    <div class="form-group">
                        <input type="text" name="user" placeholder="Username" class="input-control">
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" placeholder="Password" class="input-control">
                    </div>

                    <input type="submit" name="submit" value="Login" class="btn">

                </form>
                
                <?php
                    if(isset($_POST['submit'])){

                        $user = mysqli_real_escape_string($conn, $_POST['user']);
                        $pass = mysqli_real_escape_string($conn, $_POST['pass']);
                        
                        $sql = "SELECT * FROM `admin` WHERE `username` = '$user'
                                AND `password` = MD5('$pass')";
                        $cek = mysqli_query($conn,$sql);
                        if(mysqli_num_rows($cek) > 0){

                            $d = mysqli_fetch_object($cek);
                            if(md5($pass) == $d->password){

                                $_SESSION['status_login']   = true;
                                $_SESSION['id']             = $d -> id_admin;
                                $_SESSION['nama']           = $d -> nama_lengkap;
                                $_SESSION['level']          = $d -> level;

                                echo "<script>window.location='index.php?includes=dashboard'</script>";

                            }else{
                                echo '<div class="alert alert-error">Password Salah</div>';
                            }
                            
                        }else{
                            echo '<div class="alert alert-error">Username Tidak Ditemukan</div>';
                        }
                    }
                ?>

            </div>

            <!-- box footer -->
            <div class="box-footer">
                <a href="../index.php" style="color: white;">Home Page</a>
            </div>

        </div>

    </div>
</body>