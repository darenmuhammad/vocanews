<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM `pesan` WHERE `pesan_id` = '$id'";;
    $query = mysqli_query($conn,$sql);
    $p = mysqli_fetch_object($query);
?>

    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Lihat Pesan
                </div>

                <div class="box-body">
                    
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Nama Pengirim</label>
                            <input type="text" name="pengirim" class="input-control" value="<?php echo $p->pengirim ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Email</label>
                            <input type="text" name="email" class="input-control" value="<?php echo $p->email?>" required> 
                        </div>
                        <div class="form-group">
                            <label>Subjek</label>
                            <input type="text" name="subjek" class="input-control" value="<?php echo $p->subjek ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kirim</label>
                            <input type="date" name="tanggal" class="input-control"  value="<?php echo date('Y-m-d'); ?>"> 
                        </div>
                        <div class="form-group">
                            <label>Isi Pesan</label>
                            <textarea name="isi" class="input-control" required><?php echo $p->pesan_isi ?></textarea><br>
                        </div>

                        <button type="button" class="btn" onclick="window.location='index.php?includes=pesan'">Kembali</button>
                        <a href="index.php?includes=hapus&idpesan=<?php echo $p->pesan_id ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn">Hapus Pesan</a>
                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        CKEDITOR.replace( 'isi' );
    </script>