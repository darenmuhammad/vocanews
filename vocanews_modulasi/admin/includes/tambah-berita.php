    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Tambah Berita
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul" placeholder="Judul Berita" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" id="" class="input-control" required>
                                <option value="">--Kategori--</option>
                                <?php
                                    $sqlkategori = "SELECT * FROM `kategori` ORDER BY `id_kategori` DESC";
                                    $kategori = mysqli_query($conn, $sqlkategori);
                                    while($k = mysqli_fetch_array($kategori)){
                                ?>
                                <option value="<?php echo $k['id_kategori']?>"><?php echo $k['kategori']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Penulis</label>
                            <select name="penulis" id="" class="input-control" required>
                                <option value="">--Penulis--</option>
                                <?php
                                    $sqladmin = "SELECT * FROM `admin` ORDER BY `id_admin` DESC";
                                    $admin = mysqli_query($conn, $sqladmin);
                                    while($p = mysqli_fetch_array($admin)){
                                ?>
                                <option value="<?php echo $p['id_admin']?>"><?php echo $p['nama_lengkap']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="isi" class="input-control" placeholder="Isi Berita" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status Berita</label>
                            <select name="status" id="" class="input-control" required>
                                <option value="">--Status--</option>
                                <?php
                                    $sqlstatus = "SELECT * FROM `status` ORDER BY `id_status` DESC";
                                    $status = mysqli_query($conn, $sqlstatus);
                                    while($s = mysqli_fetch_array($status)){
                                ?>
                                <option value="<?php echo $s['id_status']?>"><?php echo $s['nama_status']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar Berita</label>
                            <input type="file" name="gambar" class="input-control foto" required>
                        </div>

                        <button type="button" class="btn" onclick="window.location='index.php?includes=berita'">Kembali</button>
                        <input type="submit" name="submit" value="Simpan" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            // menampung input dari form
                            $judul      = $_POST['judul'];
                            $kategori   = $_POST['kategori'];
                            $penulis    = $_POST['penulis'];
                            $isi        = $_POST['isi'];
                            $status     = $_POST['status'];
                            $currdate   = date('Y-m-d H:i:s');

                            // menampung data file upload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];
                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];

                            $newname = 'gambar-berita'.time().'.'.$type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png', 'gif');

                            // menampung validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<div class="alert alert-error">Format Foto Tidak Sesuai</div>';
                            }else{
                                move_uploaded_file($tmp_name, 'images/berita/' .$newname);
                            }

                            // proses upload file sekaligus insert 
                            $sqlinsert = "INSERT INTO `berita` VALUES (
                                        null, 
                                        '$judul', 
                                        '$kategori', 
                                        '$newname',
                                        '$isi', 
                                        '$currdate', 
                                        '$penulis', 
                                        '$status'
                                        )";
                            $insert = mysqli_query($conn, $sqlinsert);
                            if($insert){
                                echo '<div class="alert alert-success">Simpan Data Berhasil</div>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
                            }
                        }
                    ?>

                </div>

            </div>

        </div>

    </div>

    <script>
        CKEDITOR.replace( 'isi' );
    </script>