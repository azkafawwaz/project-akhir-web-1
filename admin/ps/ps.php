<?php

    require '../../koneksi/koneksi.php';
    $title_web = 'Daftar Playstation';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Daftar Playstation
                <div class="float-right">
                    <a class="btn btn-success" href="tambah.php" role="button">Tambah</a>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Series Playstation</th>               
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT *FROM playstation ORDER BY id_ps ASC";
                            $row = $koneksi->prepare($sql);
                            $row->execute();
                            $hasil = $row->fetchAll();
                            $no = 1;

                            foreach($hasil as $isi)
                            {
                        ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><img src="../../assets/image/<?php echo $isi['gambar'];?>" class="img-fluid" style="width:200px;"></td>
                            <td><?php echo $isi['merk'];?></td>
                            <td><?php echo $isi['harga'];?></td>
                            <td><?php echo $isi['status'];?></td>
                            <td><?php echo $isi['deskripsi'];?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $isi['id_ps'];?>" role="button">Edit</a>  
                                <a class="btn btn-danger  btn-sm" href="proses.php?aksi=hapus&id=<?= $isi['id_ps'];?>&gambar=<?= $isi['gambar'];?>" role="button">Hapus</a>  
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>