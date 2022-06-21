<?php
include('koneksi.php');

$select_pegawai	= mysqli_query($koneksi, "SELECT * FROM pegawai");
$num_user		= mysqli_num_rows($select_pegawai);

if(isset($_POST['regis-pegawai'])){
    $id_peg		= mysqli_real_escape_string($koneksi, $_POST['id_peg']);
    $nama_peg		= mysqli_real_escape_string($koneksi, $_POST['nama_peg']);
    $notelp_peg	= mysqli_real_escape_string($koneksi, $_POST['notelp_peg']);
    $username_peg	= mysqli_real_escape_string($koneksi, $_POST['username_peg']);
    $pass_peg		= mysqli_real_escape_string($koneksi, $_POST['pass_peg']);

    if($id_peg == '' || $nama_peg == '' || $notelp_peg == '' || $username_peg == '' || $pass_peg == ''){
        echo "<div class='alert alert-danger'>Form Registrasi Tidak Boleh Kosong!</div>"; 
    }else{
        $sql = "INSERT INTO pegawai (id_peg, nama_peg, notelp_peg, username_peg, pass_peg) VALUES ('$id_peg', '$nama_peg', '$notelp_peg', '$username_peg', '$pass_peg')";
        $query = mysqli_query($koneksi, $sql);
        if($query){
            echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
        }else{
            echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
        }
    }
    header('Location: index.php?page=master/pegawai/pegawai');
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
  border: 1px solid_peg #ddd;
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

.hid_pegetext { -webkit-text-security: disc; /* Default */ }

</style>
<div class="list-jenis">
    <div class="row">
        <div class="col-sm-12">
        <section class="panel panel-default">
            <div class="panel panel-heading">List pegawai</div>
                <div class="panel panel-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#regis-em"> + Tambahkan </button>
                        <br /> <br />
                        <!-- model -->
                        <div class="modal fade" id="regis-em" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hid_pegden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="modal-title">Tambahkan pegawai</h3>
                                    </div>
                                    <!-- form tambahan -->
                                    <form action="" method="POST" autocomplete="off">
                                        <div class="modal-body">
                                            <p>
                                                <label for="id">ID</label><br />
                                                <input class="form-control" name="id_peg" id="id_peg" type="text" required />
                                            </p>
                                            <p>
                                                <label for="nama_peg">Nama</label><br />
                                                <input class="form-control" name="nama_peg" id="nama_peg" type="text" required />
                                            </p>
                                            <p>
                                                <label for="notelp_peg">No.Telepon</label><br />
                                                <input class="form-control" name="notelp_peg" id="notelp_peg" type="notelp_peg" required />
                                            </p>
                                            <p>
                                                <label for="username_peg">Username</label><br />
                                                <input class="form-control" name="username_peg" id="username_peg" type="username_peg" required />
                                            </p>
                                            <p>
                                                <label for="pass_peg">Password</label><br />
                                                <input class="form-control" name="pass_peg" id="pass_peg" type="pass_peg" required />
                                            </p>
                                        </div>
                                        <div class="modal-footer">  
                                            <button type="close" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            <button type="submit" class="btn btn-primary" name="regis-pegawai">ADD</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end model -->
                <table id_peg="list-user" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>No.Telepon</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while($row	= mysqli_fetch_array($select_pegawai)){
                        ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$row['id_peg']; ?></td>
                            <td><?=$row['nama_peg']; ?></td>
                            <td><?=$row['notelp_peg']; ?></td>
                            <td><?=$row['username_peg']; ?></td>
                            <td><?=$row['pass_peg']; ?></td>
                            <td>
                                <a href="index.php?page=master/pegawai/update-pegawai&id_peg=<?=$row['id_peg']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=master/pegawai/hapus-pegawai&id_peg=<?=$row['id_peg']; ?>" class="btn btn-danger btn-sm">Delete</a>
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