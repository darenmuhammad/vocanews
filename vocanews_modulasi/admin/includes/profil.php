<?php
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";;
    $query = mysqli_query($conn,$sql);
    $p = mysqli_fetch_object($query);
?>
    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Profil 
                </div>

                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Foto Admin</label>
                            <a href="images/author/<?= $p->foto ?>" target="_blank"><img src="images/author/<?= $p->foto ?>" width="150px"></a>
                            <input type="hidden" name="fotoupdate" value="<?php echo $p->foto?>">
                            <input type="file" name="foto" class="input-control foto">
                        </div>
                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" name="nama" value="<?= $p->nama_lengkap?>" class="input-control" required> 
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" value="<?= $p->username?>" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <input type="text" value="<?= $p->level ?>" class="input-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" value="<?= $p->deskripsi?>" class="input-control" required>
                        </div>
                        <input type="submit" name="submit" value="Simpan" class="btn">
                    </form>
                    <?php
                        if(isset($_POST['submit'])){
                            
                            $nama       = addslashes(ucwords($_POST['nama']));
                            $user       = $_POST['user'];
                            $deskripsi  = $_POST['deskripsi'];
                            $fotoupdate = $_POST['fotoupdate'];

                            // menampung data file upload
                            $filename = $_FILES['foto']['name'];
                            $tmp_name = $_FILES['foto']['tmp_name'];
                            // menampung validasi format file
                            if($filename != ''){
                                $type1 = explode('.',$filename);
                                $type2 = $type1[1];

                                $newname = 'gambar-author' .time(). '.' .$type2;

                                // menampung data format file yang diizinkan
                                $tipe_diizinkan = array('jpg','jpeg','png', 'gif');

                                if(!in_array($type2, $tipe_diizinkan)){
                                    echo '<div class="alert alert-error">Format Foto Tidak Sesuai</div>';
                                }else{
                                    unlink('images/author/' .$fotoupdate);
                                    move_uploaded_file($tmp_name, 'images/author/' .$newname);
                                    $namafoto = $newname;
                                }

                            }else{
                                $namafoto = $fotoupdate;
                            }

                            $sqlupdate = "UPDATE `admin` SET
                                        `username` = '$user',
                                        `nama_lengkap` = '$nama',
                                        `foto` = '$namafoto',
                                        `deskripsi` = '$deskripsi'
                                        WHERE `id_admin` = '$id'";
                            $update = mysqli_query($conn,$sqlupdate);
                            if($update){
                                echo '<script>alert("Simpan Data Berhasil!")</script>';
                                echo '<script>window.location="index.php?includes=profil"</script>';
                            }else{
                                echo"gagal edit" .mysqli_error($conn);
                            }
                        }
                    ?>
                </div>

            </div>

        </div>

    </div>