<?php
    $id = $_GET['id'];
    $sqlpengguna = "SELECT * FROM `admin` WHERE `id_admin` = '$id'";
    $pengguna = mysqli_query($conn, $sqlpengguna);
    if(mysqli_num_rows($pengguna)==0){
        echo "<script>window.location='index.php?includes=pengguna'</script>";
    }
    $p = mysqli_fetch_object($pengguna);
?>

    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Edit Pengguna
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

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
                            <select name="level" class="input-control" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="Super Admin" <?= ($p->level == 'Super Admin')? 'selected':''; ?>>Super Admin</option>
                                <option value="Admin" <?= ($p->level == 'Admin')? 'selected':''; ?>>Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="input-control" required><?= $p->deskripsi?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Admin</label>
                            <img src="images/author/<?= $p->foto ?>" width="150px">
                            <input type="hidden" name="fotoupdate" value="<?php echo $p->foto?>">
                            <input type="file" name="foto" class="input-control foto">
                        </div>

                        <button type="button" class="btn" onclick="window.location='index.php?includes=pengguna'">Kembali</button>
                        <input type="submit" name="submit" value="Simpan" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            
                            $nama       = addslashes(ucwords($_POST['nama']));
                            $user       = $_POST['user'];
                            $level      = $_POST['level'];
                            $deskripsi  = $_POST['deskripsi'];
                            $pass       = '123456';
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
                                        `deskripsi` = '$deskripsi',
                                        `level` = '$level'
                                        WHERE `id_admin` = '$id'";
                            $update = mysqli_query($conn,$sqlupdate);
                            if($update){
                                echo '<div class="alert alert-success">Simpan Data Berhasil</div>';
                            }else{
                                echo"gagal edit" .mysqli_error($conn);
                            }
                        }
                    ?>

                </div>

            </div>

        </div>

    </div>

    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>