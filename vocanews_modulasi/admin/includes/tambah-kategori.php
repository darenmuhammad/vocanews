    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Tambah Kategori
                </div>

                <div class="box-body">
                    
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required> 
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="input-control" placeholder="Isi Berita" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar Kategori</label>
                        <input type="file" name="gambar" class="input-control" required>
                    </div>

                    <button type="button" class="btn" onclick="window.location='index.php?includes=kategori'">Kembali</button>
                    <input type="submit" name="submit" value="Simpan" class="btn">
                </form>

                <?php
                        if(isset($_POST['submit'])){
                            // menampung input dari form
                            $nama       = $_POST['nama'];
                            $keterangan = $_POST['keterangan'];

                            // menampung data file upload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];
                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];

                            $newname = 'gambar-kategori'.time().'.'.$type2;

                            // menampung data format file yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png', 'gif');

                            // menampung validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                echo '<div class="alert alert-error">Format Foto Tidak Sesuai</div>';
                            }else{
                                move_uploaded_file($tmp_name, 'images/kategori/' .$newname);
                            }

                            // proses upload file sekaligus insert 
                            $sqlinsert = "INSERT INTO `kategori` VALUES (
                                        null, 
                                        '$nama', 
                                        '$newname', 
                                        '$keterangan'
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
        CKEDITOR.replace( 'keterangan' );
    </script>