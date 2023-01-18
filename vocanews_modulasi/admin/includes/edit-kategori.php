<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `kategori` WHERE `id_kategori` = '$id'";;
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query) == 0){
        echo '<script>window.location="index.php?includes=kategori"</script>';
    }
    $k = mysqli_fetch_object($query);
?>

    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Edit Kategori
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama" value="<?php echo $k->kategori ?>" class="input-control" required> 
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="input-control" required><?php echo $k->keterangan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Gambar Kategori</label>
                            <img src="images/kategori/<?= $k->gambar_kategori ?>" width="200px" class="image">
                            <input type="hidden" name="gambar_lama" value="<?php echo $k->gambar_kategori?>">
                            <input type="file" name="gambar_baru" class="input-control">
                        </div>

                        <button type="button" class="btn" onclick="window.location='index.php?includes=kategori'">Kembali</button>
                        <input type="submit" name="submit" value="Simpan" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            // menampung input dari form
                            $nama       = $_POST['nama'];
                            $keterangan = $_POST['keterangan'];

                            //menampung dan validasi data gambar kategori
                            if($_FILES['gambar_baru']['name'] != ''){

                                // echo 'ganti gambar'
                                $filename = $_FILES['gambar_baru']['name'];
                                $tmpname  = $_FILES['gambar_baru']['tmp_name'];
                                $filesize = $_FILES['gambar_baru']['size'];

                                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                $rename     = 'gambar-kategori'.time().'.'.$formatfile;

                                $allowedtype = array('jpg','jpeg','png', 'gif');

                                if(!in_array($formatfile, $allowedtype)){
                                    echo '<div class="allert allert-error">Format File Tidak Diizinkan</div>';
                                    return false;
                                }elseif($filesize > 1000000){
                                    echo '<div class="allert allert-error">Ukuran File Tidak Boleh Lebih Dari 1MB</div>';
                                    return false;
                                }else{
                                    if(file_exists("images/kategori/".$_POST['gambar_lama'])){
                                        unlink("images/kategori/".$_POST['gambar_lama']);
                                    }

                                    move_uploaded_file($tmpname, "images/kategori/".$rename);
                                }

                            }else{
                                $rename = $_POST['gambar_lama'];
                            }

                            // proses upload file sekaligus insert 
                            $sqlupdate = "UPDATE `kategori` SET
                                        `kategori` = '$nama',
                                        `keterangan` = '$keterangan',
                                        `gambar_kategori` = '$rename'
                                        WHERE `id_kategori` = '$k->id_kategori'";
                            $update = mysqli_query($conn, $sqlupdate);
                            if($update){
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