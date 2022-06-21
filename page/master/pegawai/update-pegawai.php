<?php
include("koneksi.php");
    $id = $_GET['id_peg'];
    $select_customer	= mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_peg='$id'");
    $row_customer		= mysqli_fetch_assoc($select_customer);

    if(isset($_POST['update-peg'])){
        $id = $_POST['id_peg'];
        $id_peg		    = mysqli_real_escape_string($koneksi, $_POST['id_peg']);
        $nama_peg		= mysqli_real_escape_string($koneksi, $_POST['nama_peg']);
        $notelp_peg	    = mysqli_real_escape_string($koneksi, $_POST['notelp_peg']);
        $username_peg	= mysqli_real_escape_string($koneksi, $_POST['username_peg']);
        $pass_peg		= mysqli_real_escape_string($koneksi, $_POST['pass_peg']);

        $sql = "UPDATE pegawai SET id_peg='$id_peg', nama_peg='$nama_peg', notelp_peg='$notelp_peg', username_peg='$username_peg', pass_peg='$pass_peg' WHERE id_peg='$id_peg'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/pegawai/pegawai');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/pegawai/pegawai';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Pegawai</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id_peg" value="<?= $row_customer['id_peg']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="nama_peg">Nama</label><br />
                                <input class="form-control" name="nama_peg" id="nama_peg" type="text" value="<?=$row_customer['nama_peg'];?>" required />
                            </p>
                            <p>
                                <label for="notelp_peg">No.Telepon</label><br />
                                <input class="form-control" name="notelp_peg" id="notelp_peg" type="text" value="<?=$row_customer['notelp_peg'];?>" required />
                            </p>
                            <p>
                                <label for="username_peg">Username</label><br />
                                <input class="form-control" name="username_peg" id="username_peg" type="text" value="<?=$row_customer['username_peg'];?>" required />
                            </p>
                            <p>
                                <label for="pass_peg">Password</label><br />
                                <input class="form-control" name="pass_peg" id="pass_peg" type="text" value="<?=$row_customer['pass_peg'];?>" required />
                            </p>
                            <br>
							<button type="submit" name="update-peg" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
