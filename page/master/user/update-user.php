<?php
include("koneksi.php");
    $id = $_GET['id_user'];
    $select_customer	= mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
    $row_customer		= mysqli_fetch_assoc($select_customer);

    if(isset($_POST['update-user'])){
        $id = $_POST['id_user'];
        $id_user	= mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $nama		= mysqli_real_escape_string($koneksi, $_POST['nama']);
        $alamat		= mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $notelp	    = mysqli_real_escape_string($koneksi, $_POST['notelp']);

        $sql = "UPDATE user SET nama='$nama', alamat='$alamat', notelp='$notelp' WHERE id_user='$id_user'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/user/list-user');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/user/list-user';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Customer</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id_user" value="<?= $row_customer['id_user']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="nama">Nama</label><br />
                                <input class="form-control" name="nama" id="nama" type="text" value="<?=$row_customer['nama'];?>" required />
                            </p>
                            <p>
                                <label for="alamat">Alamat</label><br />
                                <input class="form-control" name="alamat" id="alamat" type="text" value="<?=$row_customer['alamat'];?>" required />
                            </p>
                            <p>
                                <label for="notelp">Nomor Telepon</label><br />
                                <input class="form-control" name="notelp" id="notelp" type="text" value="<?=$row_customer['notelp'];?>" required />
                            </p>
                            <br>
							<button type="submit" name="update-user" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
