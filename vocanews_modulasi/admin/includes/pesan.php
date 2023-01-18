    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Pesan
                </div>

                <div class="box-body">

                    <!-- <a href="tambah-kategori.php" class="btn-tambah"><i class="fa fa-plus"></i> Tambah Data</a> -->

                    <form action="index.php?includes=pesan" method="post">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Pengirim</th>
                                <th width="20%">Email</th>
                                <th width="20%">Subjek</th>
                                <th width="15%">Tanggal</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $no = 1;
                                $sql = "SELECT * FROM `pesan` ";
                                if(isset($_POST['key'])){
                                    $katakunci = addslashes($_POST['key']);
                                    $sql .= " WHERE `email` LIKE '%$katakunci%'
                                            OR `pengirim` LIKE '%$katakunci%'
                                            OR `subjek` LIKE '%$katakunci%'";
                                }
                                $sql .= " ORDER BY `pesan_id` DESC";
                                $pesan = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($pesan) > 0 ){
                                while($row = mysqli_fetch_array($pesan)){
                            ?>
                            <tr>
                                <td><?php echo $no ++ ?></td>
                                <td><?php echo $row['pengirim']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['subjek']?></td>
                                <td><?php echo $row['tanggal']?></td>
                                <td>
                                    <a href="index.php?includes=lihat-pesan&id=<?= $row['pesan_id'] ?>" title="Lihat Pesan" class="btn-edit"><i class="fa fa-eye"></i></a>
                                    <a href="index.php?includes=hapus&idpesan=<?= $row['pesan_id'] ?>" onclick="return confirm('Yakin ingin hapus?')"
                                    title="Hapus Pesan" class="btn-hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php }else{ ?>
                                <tr>
                                    <td colspan="6">Tidak Ada Data</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>