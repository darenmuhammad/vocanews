    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Berita
                </div>

                <div class="box-body">

                    <a href="index.php?includes=tambah-berita" class="btn-tambah"><i class="fa fa-plus"></i> Tambah Data</a>

                    <form action="index.php?includes=berita" method="post">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="24%">Judul</th>
                                <th width="6%">Kategori</th>
                                <th width="1%">Gambar</th>
                                <th width="13%">Penulis</th>
                                <th width="5%">Status</th>
                                <th width="13%">Tanggal Posting</th>
                                <th width="9%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1;

                            $sql = "SELECT * FROM `berita` JOIN `status` USING(`id_status`) 
                                    JOIN `kategori` USING(`id_kategori`) 
                                    JOIN `admin` USING(`id_admin`) ";
                            if(isset($_POST['key'])){
                                $katakunci = addslashes($_POST['key']);
                                $sql .= " WHERE `judul` LIKE '%$katakunci%' 
                                        OR `kategori` LIKE '%$katakunci%' 
                                        OR `nama_lengkap` LIKE '%$katakunci%'
                                        OR `nama_status` LIKE '%$katakunci%'";
                            }
                            $sql .= " ORDER BY `id_berita` DESC";
                            $berita = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($berita) > 0 ){
                            while($b = mysqli_fetch_object($berita)){
                        ?>
                        <tr>
                            <td><?php echo $no ++ ?></td>
                            <td><?php echo $b->judul?></td>
                            <td><?php echo $b->kategori?></td>
                            <td><a href="images/berita/<?= $b->gambar ?>" target="_blank"><img src="images/berita/<?= $b->gambar ?>" height="75" width="75"></a></td>
                            <td><?php echo $b->nama_lengkap?></td>
                            <td><?php echo $b->nama_status?></td>
                            <td><?php echo $b->tgl_posting?></td>
                            <td>
                                <a href="index.php?includes=edit-berita&id=<?= $b->id_berita ?>" title="Edit Data" class="btn-edit"><i class="fa fa-edit"></i></a>
                                <a href="index.php?includes=hapus&idberita=<?= $b->id_berita ?>" onclick="return confirm('Yakin ingin hapus?')"
                                title="Hapus Data" class="btn-hapus"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="8">Tidak Ada Data</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>

            </div>

        </div>

    </div>