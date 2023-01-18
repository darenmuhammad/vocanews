    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Tentang Perusahaan
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Tentang Perusahaan</label>
                            <textarea name="tentang" class="input-control"><?php echo $d->tentang_perusahaan ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Foto Perusahaan</label>
                            <img src="images/identitas/<?= $d->foto_perusahaan ?>" width="200px" class="image">
                            <input type="hidden" name="foto_lama" value="<?php echo $d->foto_perusahaan?>">
                            <input type="file" name="foto_baru" class="input-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            // menampung input dari form;
                            $tentang  = $_POST['tentang'];
                            $currdate = date('Y-m-d H:i:s');

                            //menampung dan validasi data foto sekolah
                            if($_FILES['foto_baru']['name'] != ''){

                                // echo 'ganti logo'
                                $filename = $_FILES['foto_baru']['name'];
                                $tmpname  = $_FILES['foto_baru']['tmp_name'];
                                $filesize = $_FILES['foto_baru']['size'];

                                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                                $rename     = 'perusahaan'.time().'.'.$formatfile;

                                $allowedtype = array('jpg','jpeg','png', 'gif');

                                if(!in_array($formatfile, $allowedtype)){
                                    echo '<div class="allert allert-error">Format File Tidak Diizinkan</div>';
                                    return false;
                                }elseif($filesize > 1000000){
                                    echo '<div class="allert allert-error">Ukuran File Tidak Boleh Lebih Dari 1MB</div>';
                                    return false;
                                }else{
                                    if(file_exists("images/identitas/".$_POST['foto_lama'])){
                                        unlink("images/identitas/".$_POST['foto_lama']);
                                    }

                                    move_uploaded_file($tmpname, "images/identitas/".$rename);
                                }

                            }else{
                                $rename = $_POST['foto_lama'];
                            }

                            // proses upload file sekaligus insert 
                            $sqlupdate = "UPDATE `pengaturan` SET
                                        `tentang_perusahaan` = '$tentang',
                                        `foto_perusahaan` = '$rename',
                                        `updated_at` = '$currdate'
                                        WHERE `id` = '$d->id'";
                            $update = mysqli_query($conn, $sqlupdate);
                            if($update){
                                echo "<script>alert('Simpan Data Berhasil!')</script>";
                                echo "<script>window.location='index.php?includes=tentang-perusahaan'</script>";
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
        CKEDITOR.replace( 'tentang' );
    </script>