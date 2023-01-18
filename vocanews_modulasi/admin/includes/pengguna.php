    <!-- content -->
    <div class="content">

        <div class="container">
            
            <div class="box">

                <div class="box-header">
                    Pengguna
                </div>

                <div class="box-body">

                    <a href="index.php?includes=tambah-pengguna" class="btn-tambah"><i class="fa fa-plus"></i> Tambah Data</a>

                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="key" placeholder="Pencarian">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Nama</th>
                                <th width="20%">Username</th>
                                <th width="1%">Foto</th>
                                <th width="20%">Level</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                
                                $sql = "SELECT * FROM `admin` ";
                                if(isset($_POST['key'])){
                                    $katakunci = addslashes($_POST['key']);
                                    $sql .= " WHERE `nama_lengkap` LIKE '%$katakunci%'";
                                }
                                $sql .= " ORDER BY `id_admin` DESC";

                                // $sql = "SELECT * FROM `admin` ORDER BY `id_admin` DESC";
                                $pengguna = mysqli_query($conn,$sql);
                                if(mysqli_num_rows($pengguna) > 0){
                                    while($p = mysqli_fetch_array($pengguna)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $p['nama_lengkap'] ?></td>
                                <td><?= $p['username'] ?></td>
                                <td><a href="images/author/<?php echo $p['foto']?>" target="_blank"><img src="images/author/<?php echo $p['foto']?>" height="80" width="80"></a></td>
                                <td><?= $p['level'] ?></td>
                                <td>
                                    <a href="index.php?includes=edit-pengguna&id=<?= $p['id_admin'] ?>" title="Edit Data" class="btn-edit"><i class="fa fa-edit"></i></a>
                                    <a href="index.php?includes=hapus&idpengguna=<?= $p['id_admin'] ?>" onclick="return confirm('Yakin ingin hapus?')"
                                    title="Hapus Data" class="btn-hapus"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                            <tr>
                                <td colspan="6 text-center">Data Tidak Ada</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>