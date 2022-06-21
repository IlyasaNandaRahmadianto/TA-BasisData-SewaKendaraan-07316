<?php
include("koneksi.php");
    $id = $_GET['id_sup'];
    $select_supplier	= mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_sup='$id'");
    $row_supplier		= mysqli_fetch_assoc($select_supplier);

    if(isset($_POST['update-supp'])){
        $id = $_POST['id_sup'];
        $id_sup		= $_POST['id_sup'];
        $nama_sup	= $_POST['nama_sup'];
        $notelp_sup		= $_POST['notelp_sup'];
        
        $sql = "UPDATE supplier SET nama_sup='$nama_sup', notelp_sup='$notelp_sup' WHERE id_sup='$id'";
        $query = mysqli_query($koneksi, $sql);
        if( $query ){
            header('Location: index.php?page=master/supplier/list-supplier');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/supplier/list-supplier';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Supplier</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id_sup" value="<?= $row_supplier['id_sup']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <label for="nama_sup">Nama</label><br />
                                <input class="form-control" name="nama_sup" id="nama_sup" type="text" value="<?=$row_supplier['nama_sup'];?>" required />
                            </p>
                            <p>
                                <label for="notelp_sup">No.Telepon</label><br />
                                <input class="form-control" name="notelp_sup" id="notelp_sup" type="text" value="<?=$row_supplier['notelp_sup'];?>" required />
                            </p>
                            <br>
							<button type="submit" name="update-supp" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
