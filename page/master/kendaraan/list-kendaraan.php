<?php
    include('koneksi.php');
    $select_kendaraan	= mysqli_query($koneksi, "SELECT kendaraan.*, detail_kendaraan.*, supplier.* 
    FROM kendaraan
    LEFT JOIN detail_kendaraan ON  kendaraan.id_kendaraan = detail_kendaraan.kendaraan_id
    LEFT JOIN supplier ON detail_kendaraan.id_sup = supplier.id_sup");
    $num_kendaraan		= mysqli_num_rows($select_kendaraan);


    // if(isset($_POST['regis-kendaraan'])){
    //     $id_kendaraan	= mysqli_real_escape_string($koneksi, $_POST['id_kendaraan']);
    //     $id_transmisi	    = mysqli_real_escape_string($koneksi, $_POST['id_transmisi']);
    //     $merk	        = mysqli_real_escape_string($koneksi, $_POST['merk']);
    //     $nopol	        = mysqli_real_escape_string($koneksi, $_POST['nopol']);
        
    //     if($id_kendaraan == '' || $id_kendaraan == '' || $merk == '' || $nopol == ''){
    //         echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>";
    //     }else{
    //         $sql = "INSERT INTO kendaraan (id_kendaraan, id_transmisi, merk, nopol) VALUES ('$id_kendaraan', '$id_transmisi', '$merk', '$nopol')";
    //         $query = mysqli_query($koneksi, $sql);
    //         if($query){
    //             echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
    //         }else{
    //             echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
    //         }
    //     }
    // }
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
                <div class="panel panel-heading">List Kendaraan</div>
                <div class="panel panel-body">
                <a href="index.php?page=master/kendaraan/regis-kendaraan" class="btn btn-primary"> + Tambahkan </a>
                     
                    <br />  <br />
                    <table id="list-kendaraan" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Transmisi</th>
                                <th>Nama Supplier</th>
                                <th>Merk</th>
                                <th>No Polisi</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while($row_kendaraan = mysqli_fetch_array($select_kendaraan)){
                            ?>
                            <tr>
                                <td><?= $row_kendaraan['id_kendaraan']; ?></td>
                                <td><?= $row_kendaraan['id_transmisi']; ?></td>
                                <td><?= $row_kendaraan['nama_sup']; ?></td>
                                <td><?= $row_kendaraan['merk']; ?></td>
                                <td><?= $row_kendaraan['nopol']; ?></td>
                                <td><?= $row_kendaraan['harga']; ?></td>
                                <td>
                                <a href="index.php?page=master/kendaraan/update-kendaraan&id=<?=$row_kendaraan['id_kendaraan']; ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?page=master/kendaraan/delete-kendaraan&id=<?=$row_kendaraan['id_kendaraan']; ?>" class="btn btn-danger">Delete</a>
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