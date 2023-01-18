    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Ubah Password
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="pass1" placeholder ="Password Baru" class="input-control" required> 
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password</label>
                            <input type="password" name="pass2" placeholder ="Ulangi Password" class="input-control" required>
                        </div>
                        
                        <input type="submit" name="submit" value="Ubah Password" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){

                            $idadmin = $_SESSION['id'];
                            $pass1 = $_POST['pass1'];
                            $pass2 = $_POST['pass2'];

                            if($pass2 != $pass1){
                                echo '<div class="alert alert-error">Password Tidak Sesuai</div>';
                            }else{
                                $sqlpass  = "UPDATE `admin` SET 
                                            `password`      = MD5('$pass1')
                                            WHERE `id_admin`= '$idadmin'";
                                $update_pass = mysqli_query($conn, $sqlpass);
                                if($update_pass){
                                    echo '<div class="alert alert-success">Ubah Password Berhasil</div>';
                                }else{
                                    echo 'gagal' .mysqli_error($conn);
                                }
                            }
                        }
                    ?>

                </div>

            </div>

        </div>

    </div>