<?php
    include('koneksi.php');
    $select_pemesanan	= mysqli_query($koneksi, "SELECT transaksi.*,detail_transaksi.*,user.*, kendaraan.merk
    FROM transaksi
    LEFT JOIN user ON transaksi.id_user = user.id_user
    LEFT JOIN detail_transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi
    LEFT JOIN kendaraan ON detail_transaksi.id_kendaraan = kendaraan.id_kendaraan");
    $num_pemesanan		= mysqli_num_rows($select_pemesanan);

    
?>
<style>
    select{
        padding: 7px;
    }

    input[type=text] {
    background-color: white;
    padding: 5px 5px 5px 10px;
    margin-bottom: 8px;
    
    }

    table, th, td {
    border: 1px solid #ddd;
    }

    table{
        width: 100%;
    }

    th {
    font-weight: bold;
    border: none;
    
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
        }

    th, td {
    padding: 10px;
    text-align: center;
    }

    .hidetext { -webkit-text-security: disc; /* Default */ }

</style>
<div class="list-jenis">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel panel-default">
                <div class="panel panel-heading">List Pemesanan</div>
                <div class="panel panel-body">
                    <a href="index.php?page=master/pemesanan/pesanan" class="btn btn-primary btn-md"> + Tambahkan </a>
                    <br />  <br />
                    <table id="list-pemesanan" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id Transaksi</th>
                                <th>Nama User</th>
                                <th>Tanggal Transaksi</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Lama Peminjaman</th>
                                <th>Merk</th>
                                <th>Total Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_pemesanan = mysqli_fetch_array($select_pemesanan)){
                            ?>
                            <tr>
                                <td><?= $row_pemesanan['id_transaksi']; ?></td>
                                <td><?= $row_pemesanan['nama']; ?></td>
                                <td><?= $row_pemesanan['tgl_transaksi']; ?></td>
                                <td><?= $row_pemesanan['tgl_peminjaman']; ?></td>
                                <td><?= $row_pemesanan['tgl_pengembalian']; ?></td>
                                <td><?= $row_pemesanan['lama_peminjaman']; ?></td>
                                <td><?= $row_pemesanan['merk']; ?></td>
                                <td><?= $row_pemesanan['total_harga']; ?></td>
                                <td>
                                        <a href="index.php?page=master/pemesanan/update-pesanan&id=<?=$row_pemesanan['id_transaksi']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=master/pemesanan/delete-pesanan&id_transaksi=<?=$row_pemesanan['id_transaksi']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>