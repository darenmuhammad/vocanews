    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Tambah Pengguna
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Admin</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required> 
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="user" placeholder="Username" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="input-control" required>
                                <option value="">--Pilih Level--</option>
                                <option value="Super Admin">Super Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" placeholder="Deskripsi" class="input-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Admin</label>
                            <input type="file" name="foto" class="input-control foto" required>
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

                            // menampung data file upload
                            $filename = $_FILES['foto']['name'];
                            $tmp_name = $_FILES['foto']['tmp_name'];
                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];

                            $newname = 'gambar-author' .time(). '.' .$type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png', 'gif');

                            // menampung validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<div class="alert alert-error">Format Foto Tidak Sesuai</div>';
                            }else{
                                move_uploaded_file($tmp_name, 'images/author/' .$newname);
                            }

                            $sqlcek  = "SELECT `username` FROM `admin` 
                                        WHERE `username` = '$user'";
                            $cek = mysqli_query($conn, $sqlcek);
                            if(mysqli_num_rows($cek) > 0){
                                echo '<div class="alert alert-error">Username Sudah Digunakan</div>';
                            }else{
                                $sqltambah = "INSERT INTO `admin` VALUES (
                                            NULL,
                                            '$user',
                                            MD5('$pass'),
                                            '$nama',
                                            '$newname',
                                            '$deskripsi',
                                            '$level'
                                            )";
                                $simpan = mysqli_query($conn,$sqltambah);
                                if($simpan){
                                    echo '<div class="alert alert-success">Simpan Data Berhasil</div>';
                                }else{
                                    echo"gagal simpan" .mysqli_error($conn);
                                }
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