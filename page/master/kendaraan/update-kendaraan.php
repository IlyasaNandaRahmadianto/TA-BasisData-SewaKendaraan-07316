<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id'");
    $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);

    $select_dkendaraan	= mysqli_query($koneksi, "SELECT * FROM detail_kendaraan WHERE kendaraan_id='$id'");
    $row_dkendaraan		= mysqli_fetch_assoc($select_dkendaraan);

    if(isset($_POST['update-kendaraan'])){
        $id = $_POST['id'];
        $id_transmisi	=  $_POST['id_transmisi'];
        $merk	        = $_POST['merk'];
        $nopol	        = $_POST['nopol'];
        $harga	        = $_POST['harga'];
        $id_sup         = $_POST['id_sup'];
        

        $sql = "UPDATE kendaraan SET id_transmisi='$id_transmisi', merk='$merk', nopol='$nopol', harga='$harga' WHERE id_kendaraan='$id'";
        $sql2 = "UPDATE detail_kendaraan SET id_sup='$id_sup' WHERE kendaraan_id='$id'";  
        $query = mysqli_query($koneksi, $sql);
        $query2 = mysqli_query($koneksi, $sql2);
        if( $query){
            header('Location: index.php?page=master/kendaraan/list-kendaraan');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/kendaraan/list-kendaraan';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Kendaraan</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $row_kendaraan['id_kendaraan']; ?>">
					<div class="row">
						<div class="col-md-12">
                            <p>
                                <!-- <label for="id_sup">Id Supplier</label><br />
                                <input class="form-control" name="id_sup" id="id_sup" type="text" value="</?=$row_dkendaraan['id_sup'];?>" required />
                                  -->
                                <label for="type">Id Supplier</label><br />
                                    <select class="form-control" name="id_sup" id="id_sup" type="text" value="<?=$row_dkendaraan['id_sup'];?>" required>
                                 
                                <?php
                                            $select_supplier	= mysqli_query($koneksi, "SELECT * FROM supplier");
                                            $num_supplier		= mysqli_num_rows($select_supplier);
                                            if($num_supplier > 0){
                                                while($row_supplier = mysqli_fetch_assoc($select_supplier)){
                                             
                                                    echo "<option value='".$row_supplier['id_sup']."'>".$row_supplier['nama_sup']."</option>";
                                                }
                                            }else{
                                                echo "<option value=''>Type Kendaraan Kosong!</option>";
                                            }
                                        ?> -->

                                    </select>
                            </p>
                            <p>
                                <label for="id_transmisi">Id Transmisi</label><br />
                                <input class="form-control" name="id_transmisi" id="id_transmisi" type="text" value="<?=$row_kendaraan['id_transmisi'];?>" required />
                            </p>
                            <p>
                                <label for="merk">Merk</label><br />
                                <input class="form-control" name="merk" id="merk" type="text" value="<?=$row_kendaraan['merk'];?>" required />
                            </p>
                            <p>
                                <label for="nopol">Nopol</label><br />
                                <input class="form-control" name="nopol" id="nopol" type="text" value="<?=$row_kendaraan['nopol'];?>" required />
                            </p>
                            <p>
                                <label for="harga">Harga</label><br />
                                <input class="form-control" name="harga" id="harga" type="text" value="<?=$row_kendaraan['harga'];?>" required />
                            </p>
                            <br>
							<button type="submit" name="update-kendaraan" class="btn btn-primary">SAVE</button>
						</div>
					</div>
				</form>

                </div>
            </section>
        </div>
</div>
