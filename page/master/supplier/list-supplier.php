<!--Seperti user persis-->
<?php
    include('koneksi.php');
    
    $select_supplier	= mysqli_query($koneksi, "SELECT * FROM supplier");
    $num_supplier		= mysqli_num_rows($select_supplier);

    if(isset($_POST['regis-supplier'])){
        $id_sup		= mysqli_real_escape_string($koneksi, $_POST['id_sup']);
        $nama_sup	= mysqli_real_escape_string($koneksi, $_POST['nama_sup']);
        $notelp_sup		= mysqli_real_escape_string($koneksi, $_POST['notelp_sup']);
        if($id_sup == '' || $nama_sup == '' || $notelp_sup == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO supplier (id_sup, nama_sup, notelp_sup) VALUES ('$id_sup', '$nama_sup', '$notelp_sup')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/supplier/list-supplier');
    }
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
        <section class="panel panel-default">
            <div class="col-sm-12">
                <section class="panel panel-default">
                    <div class="panel panel-heading">List supplier</div>
                    <div class="panel panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-c"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan supplier</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="name">ID Supplier</label><br />
                                                <input class="form-control" name="id_sup" id="id_sup" type="text" required />
                                            </p>
                                            <p>
                                                <label for="nama_sup">Nama Supplier</label><br />
                                                <input class="form-control" name="nama_sup" id="nama_sup" type="email" required />
                                            </p>
                                            <p>
                                                <label for="notelp_sup">No.Telepon</label><br />
                                                <input class="form-control" name="notelp_sup" id="notelp_sup" type="phone" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-supplier">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>No.Telepon Supplier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_supplier)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_sup']; ?></td>
                                    <td><?=$row['nama_sup']; ?></td>
                                    <td><?=$row['notelp_sup']; ?></td>
                                    <td>
                                        <a href="index.php?page=master/supplier/update-supplier&id_sup=<?=$row['id_sup']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=master/supplier/delete-supplier&id_sup=<?=$row['id_sup']; ?>" class="btn btn-danger">Delete</a>
                                <?php } ?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>
