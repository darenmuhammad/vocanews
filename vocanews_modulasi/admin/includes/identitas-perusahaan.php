    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Identitas Perusahaan
                </div>

                <div class="box-body">
                    
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="nama" value="<?php echo $d->nama ?>" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $d->email ?>" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" name="telp" value="<?php echo $d->telepon ?>" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?php echo $d->alamat ?>" class="input-control" required>
                        </div>
                        <div class="form-group">
                            <label>Google Maps</label>
                            <textarea name="gmaps" class="input-control" placeholder="Google Maps" required><?php echo $d->google_maps ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <img src="images/identitas/<?= $d->logo ?>" width="200px" class="image">
                            <input type="hidden" name="logo_lama" value="<?php echo $d->logo?>">
                            <input type="file" name="logo_baru" class="input-control">
                        </div>
                        <div class="form-group">
                            <label>Favicon</label>
                            <img src="images/identitas/<?= $d->favicon ?>" class="image" width="32px">
                            <input type="hidden" name="favicon_lama" value="<?php echo $d->favicon?>">
                            <input type="file" name="favicon_baru" class="input-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Perubahan" class="btn">
                    </form>

                    <?php
                        if(isset($_POST['submit'])){
                            // menampung input dari form
                            $nama     = $_POST['nama'];
                            $email    = $_POST['email'];
                            $telp     = $_POST['telp'];
                            $alamat   = $_POST['alamat'];
                            $gmaps    = $_POST['gmaps'];
                            $currdate = date('Y-m-d H:i:s');

                            //menampung dan validasi data logo
                            if($_FILES['logo_baru']['name'] != ''){

                                // echo 'ganti logo'
                                $filename_logo = $_FILES['logo_baru']['name'];
                                $tmpname_logo  = $_FILES['logo_baru']['tmp_name'];
                                $filesize_logo = $_FILES['logo_baru']['size'];

                                $formatfile_logo = pathinfo($filename_logo, PATHINFO_EXTENSION);
                                $rename_logo     = 'logo'.time().'.'.$formatfile_logo;

                                $allowedtype_logo = array('jpg','jpeg','png', 'gif');

                                if(!in_array($formatfile_logo, $allowedtype_logo)){
                                    echo '<div class="allert allert-error">Format File Tidak Diizinkan</div>';
                                    return false;
                                }elseif($filesize_logo > 1000000){
                                    echo '<div class="allert allert-error">Ukuran File Tidak Boleh Lebih Dari 1MB</div>';
                                    return false;
                                }else{
                                    if(file_exists("images/identitas/".$_POST['logo_lama'])){
                                        unlink("images/identitas/".$_POST['logo_lama']);
                                    }

                                    move_uploaded_file($tmpname_logo, "images/identitas/".$rename_logo);
                                }

                            }else{
                                $rename_logo = $_POST['logo_lama'];
                            }

                            //menampung dan validasi data favicon
                            if($_FILES['favicon_baru']['name'] != ''){

                                // echo 'ganti favicon'
                                $filename_favicon = $_FILES['favicon_baru']['name'];
                                $tmpname_favicon  = $_FILES['favicon_baru']['tmp_name'];
                                $filesize_favicon = $_FILES['favicon_baru']['size'];

                                $formatfile_favicon = pathinfo($filename_favicon, PATHINFO_EXTENSION);
                                $rename_favicon     = 'favicon'.time().'.'.$formatfile_favicon;

                                $allowedtype_favicon = array('jpg','jpeg','png', 'gif');

                                if(!in_array($formatfile_favicon, $allowedtype_favicon)){
                                    echo '<div class="allert allert-error">Format File Tidak Diizinkan</div>';
                                    return false;
                                }elseif($filesize_favicon > 1000000){
                                    echo '<div class="allert allert-error">Ukuran File Tidak Boleh Lebih Dari 1MB</div>';
                                    return false;
                                }else{
                                    if(file_exists("images/identitas/".$_POST['favicon_lama'])){
                                        unlink("images/identitas/".$_POST['favicon_lama']);
                                    }

                                    move_uploaded_file($tmpname_favicon, "images/identitas/".$rename_favicon);
                                }

                            }else{
                                $rename_favicon = $_POST['favicon_lama'];
                            }

                            // proses upload file sekaligus insert 
                            $sqlupdate = "UPDATE `pengaturan` SET
                                        `nama` = '$nama',
                                        `email` = '$email',
                                        `telepon` = '$telp',
                                        `alamat` = '$alamat',
                                        `google_maps` = '$gmaps',
                                        `logo` = '$rename_logo',
                                        `favicon` = '$rename_favicon',
                                        `updated_at` = '$currdate'
                                        WHERE `id` = '$d->id'";
                            $update = mysqli_query($conn, $sqlupdate);
                            if($update){
                                echo "<script>alert('Simpan Data Berhasil!')</script>";
                                echo "<script>window.location='index.php?includes=identitas-perusahaan'</script>";
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
        CKEDITOR.replace( 'gmaps' );
    </script>