<?php
    include('koneksi.php');
    
    $select_customer	= mysqli_query($koneksi, "SELECT * FROM user");
    $num_customer		= mysqli_num_rows($select_customer);

    if(isset($_POST['regis-user'])){
        $id_user	= mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $nama		= mysqli_real_escape_string($koneksi, $_POST['nama']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $notelp	    = mysqli_real_escape_string($koneksi, $_POST['notelp']);

        if($id_user == '' || $nama == '' || $alamat == '' || $notelp == ''){
            echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
        }else{
            $sql = "INSERT INTO user (id_user, nama, alamat, notelp) VALUES ('$id_user', '$nama', '$alamat', '$notelp')";
            $query = mysqli_query($koneksi, $sql);
            if($query){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
        }
        header('Location: index.php?page=master/user/list-user');
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
                    <div class="panel panel-heading">List User</div>
                    <div class="panel panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-c"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan User</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="id_user">ID</label><br />
                                                <input class="form-control" name="id_user" id="id_user" type="text" required />
                                            </p>
                                            <p>
                                                <label for="nama">Nama</label><br />
                                                <input class="form-control" name="nama" id="nama" type="text" required />
                                            </p>
                                            <p>
                                                <label for="alamat">Alamat</label><br />
                                                <input class="form-control" name="alamat" id="alamat" type="text" required />
                                            </p>
                                            <p>
                                                <label for="notelp">Nomor Telepon</label><br />
                                                <input class="form-control" name="notelp" id="notelp" type="text" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-user">ADD</button>
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
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No.Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    while($row = mysqli_fetch_array($select_customer)){
                                ?>
                                <tr>
                                    <td><?=$no++; ?></td>
                                    <td><?=$row['id_user']; ?></td>
                                    <td><?=$row['nama']; ?></td>
                                    <td><?=$row['alamat']; ?></td>
                                    <td><?=$row['notelp']; ?></td>
                                    <td>
                                        <a href="index.php?page=master/user/update-user&id_user=<?=$row['id_user']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=master/user/delete-user&id_user=<?=$row['id_user']; ?>" class="btn btn-danger">Delete</a>
                                    </td>
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
