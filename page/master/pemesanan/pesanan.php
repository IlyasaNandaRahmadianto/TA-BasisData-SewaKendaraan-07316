<?php
    include('koneksi.php');
    $select_pemesanan	= mysqli_query($koneksi, "SELECT * FROM transaksi");
    $num_pemesanan		= mysqli_num_rows($select_pemesanan);


    if(isset($_POST['pesanan'])){
        $id_transaksi   = mysqli_real_escape_string($koneksi, $_POST['id_transaksi']);
        $id_user	    = mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $id_kendaraan	    = mysqli_real_escape_string($koneksi, $_POST['id_kendaraan']);
        $tgl_transaksi	= date("Y-m-d");
        $tgl_peminjaman	= mysqli_real_escape_string($koneksi, $_POST['tgl_peminjaman']);
        $tgl_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tgl_pengembalian']);
        $merk	        = mysqli_real_escape_string($koneksi, $_POST['merk']);
        //$total_harga	= mysqli_real_escape_string($koneksi, $_POST['total_harga']);
        
        $select_id_detail = mysqli_query($koneksi,"SELECT detail_transaksi.id_detail FROM detail_transaksi ORDER BY id_detail DESC LIMIT 1");
        $hasil = mysqli_fetch_assoc($select_id_detail);
        $id_detail = $hasil['id_detail']+1;

        //$lama_peminjaman = mysqli_real_escape_string($koneksi, $_POST['lama_peminjaman']);
        $selisih    = strtotime($tgl_pengembalian) - strtotime($tgl_peminjaman);
        $selisih    = $selisih / (60 * 60 * 24);
        $lama_peminjaman    = $selisih;
        //$lama_peminjaman = $selisih;

        $select_kendaraan	= mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
        $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);
        $total_harga	    = $row_kendaraan['harga'] * $lama_peminjaman;
            
            $sql = "INSERT INTO transaksi (id_transaksi, id_user, tgl_transaksi, merk, total_harga) VALUES 
            ('$id_transaksi', '$id_user', '$tgl_transaksi', '$merk','$total_harga')";
            $sql2= "INSERT INTO detail_transaksi (id_transaksi, id_kendaraan, id_detail, tgl_peminjaman, tgl_pengembalian, lama_peminjaman) VALUES 
            ('$id_transaksi', '$id_kendaraan','$id_detail', '$tgl_peminjaman', '$tgl_pengembalian', '$lama_peminjaman')";
            $query = mysqli_query($koneksi, $sql);
            $query2 = mysqli_query($koneksi, $sql2);
            if($query && $query2){
                echo "<div class='alert alert-success'>Registrasi Berhasil!</div>";
            }//else{
            //     echo "<div class='alert alert-danger'>Registrasi Gagal!</div>";
            // }
    }
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				PEMESANAN KENDARAAN
			</div>
			<div class="panel-body">
				<form method="POST" action="">
					<div class="row">
						<div class="col-md-8">
							<table style="width:75%">
                                <p>
                                    <label for="name">ID Transaksi</label><br />
                                    <input class="form-control" name="id_transaksi" id="id_transaksi" type="text" required />
                                </p>    
                                <p>
                                    <label for="name">ID User</label><br />
                                    <input class="form-control" name="id_user" id="id_user" type="text" required />
                                </p>
                                <p>
                                    <label for="name">ID Kendaraan</label><br />
                                    <input class="form-control" name="id_kendaraan" id="id_kendaraan" type="text" required />
                                </p>
                                <p>
                                    <label for="name">Tanggal Peminjaman</label><br />
                                    <input class="form-control" name="tgl_peminjaman" id="tgl_peminjaman" type="date" required />
                                </p>
                                <p>
                                    <label for="name">Tanggal Pengembalian</label><br />
                                    <input class="form-control" name="tgl_pengembalian" id="tgl_pengembalian" type="date" required />
                                </p>
                                <!-- <p>
                                    <label for="name">Lama Peminjaman</label><br />
                                    <input class="form-control" name="lama_peminjaman" id="lama_peminjaman" type="text" required />
                                </p> -->
                                <p>
                                    <label for="name">Merk</label><br />
                                    <input class="form-control" name="merk" id="merk" type="text" required />
                                </p>
                                <!-- <p>
                                    <label for="name">Total Harga</label><br />
                                    <input class="form-control" name="total_harga" id="total_harga" type="text" required />
                                </p> -->
                            <div class="modal-footer">  
                                <button type="submit" class="btn btn-primary" name="pesanan">ADD</button>
                            </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>