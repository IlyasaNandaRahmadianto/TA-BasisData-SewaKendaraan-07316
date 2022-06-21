<?php
    include('koneksi.php');
    $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan");
    $num_kendaraan		= mysqli_num_rows($select_kendaraan);


    if(isset($_POST['regis-kendaraan'])){
        $id_kendaraan	= mysqli_real_escape_string($koneksi, $_POST['id_kendaraan']);
        $id_transmisi	    = mysqli_real_escape_string($koneksi, $_POST['id_transmisi']);
        $merk	        = mysqli_real_escape_string($koneksi, $_POST['merk']);
        $nopol	        = mysqli_real_escape_string($koneksi, $_POST['nopol']);
        $harga	        = mysqli_real_escape_string($koneksi, $_POST['harga']);
        $id_sup         = mysqli_real_escape_string($koneksi, $_POST['id_sup']);

        $select_id_detailkendaraan = mysqli_query($koneksi,"SELECT detail_kendaraan.id_detailkendaraan FROM detail_kendaraan ORDER BY id_detailkendaraan DESC LIMIT 1");
        $hasil = mysqli_fetch_assoc($select_id_detailkendaraan);
        $id_detailkendaraan = $hasil['id_detailkendaraan']+1;
        
            $sql = "INSERT INTO kendaraan (id_kendaraan, id_transmisi, merk, nopol, harga) VALUES ('$id_kendaraan', '$id_transmisi', '$merk', '$nopol', '$harga')";
            $sql2 = "INSERT INTO detail_kendaraan (id_detailkendaraan, id_sup, kendaraan_id) VALUES ('$id_detailkendaraan', '$id_sup', '$id_kendaraan')";  
            $query = mysqli_query($koneksi, $sql);
            $query2 = mysqli_query($koneksi, $sql2);
            if($query && $query2){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }else{
                echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            }
    }
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				PEMBELIAN BARANG
			</div>
			<div class="panel-body">
				<form method="POST" action="">
					<div class="row">
						<div class="col-md-8">
							<table style="width:75%">
                                <p>
                                    <label for="name">ID Kendaraan</label><br />
                                    <input class="form-control" name="id_kendaraan" id="id_kendaraan" type="text" required />
                                </p>
                                <p>
                                    <label for="name">ID Supplier</label><br />
                                    <input class="form-control" name="id_sup" id="id_sup" type="text" required />
                                </p>    
                                <p>
                                    <label for="jenis">ID Transmisi</label><br />
                                    <select class="form-control" name="id_transmisi" id="id_transmisi" required>
                                        <?php
                                            $tipe	= mysqli_query($koneksi, "SELECT * FROM tipe_transmisi");
                                            $num_type       = mysqli_num_rows($tipe);
                                            if($num_type > 0){
                                                while($row_type = mysqli_fetch_assoc($tipe)){
                                                    echo "<option value='".$row_type['id_transmisi']."'>".$row_type['jenis']."</option>";
                                                }
                                            }else{
                                                echo "<option value=''>Transmisi Kendaraan Kosong!</option>";
                                            }

                                        ?>
                                    </select>
                                    </p>
                                <p>
                                    <label for="name">Merk</label><br />
                                    <input class="form-control" name="merk" id="merk" type="text" required />
                                </p>
                                <p>
                                    <label for="name">Nomor Polisi</label><br />
                                    <input class="form-control" name="nopol" id="nopol" type="text" required />
                                </p>
                                <p>
                                    <label for="name">Harga</label><br />
                                    <input class="form-control" name="harga" id="harga" type="text" required />
                                </p>
                            <div class="modal-footer">  
                                <button type="submit" class="btn btn-primary" name="regis-kendaraan">ADD</button>
                            </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>