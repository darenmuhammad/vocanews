    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Kategori
                </div>

                <div class="box-body">

                    <a href="index.php?includes=tambah-kategori" class="btn-tambah"><i class="fa fa-plus"></i> Tambah Data</a>

                    <form action="index.php?includes=kategori" method="post">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th width="15%">Nama Kategori</th>
                                <th width="1%">Gambar</th>
                                <th width="15%">Keterangan</th>
                                <th width="5%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                
                                $sql = "SELECT * FROM `kategori` ";
                                if(isset($_POST['key'])){
                                    $katakunci = addslashes($_POST['key']);
                                    $sql .= " WHERE `kategori` LIKE '%$katakunci%'";
                                }
                                $sql .= " ORDER BY `id_kategori` DESC";

                                // $sql = "SELECT * FROM `admin` ORDER BY `id_admin` DESC";
                                $kategori = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($kategori) > 0){
                                    while($p = mysqli_fetch_array($kategori)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['kategori'] ?></td>
                                <td><a href="images/kategori/<?= $p['gambar_kategori'] ?>" target="_blank"><img src="images/kategori/<?= $p['gambar_kategori'] ?>" height="75" width="75"></a></td>
                                <td><?= $p['keterangan'] ?></td>
                                <td>
                                    <a href="index.php?includes=edit-kategori&id=<?= $p['id_kategori'] ?>" title="Edit Data" class="btn-edit"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?includes=hapus&idkategori=<?= $p['id_kategori'] ?>" onclick="return confirm('Yakin ingin hapus?')"
                                    title="Hapus Data" class="btn-hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                            <tr>
                                <td colspan="5 text-center">Data Tidak Ada</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>