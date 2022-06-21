<?php
include("koneksi.php");
    $id = $_GET['id'];
    $select_pemesanan	= mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
    $row_pemesanan		= mysqli_fetch_assoc($select_pemesanan);
    
    $select_dpemesanan	= mysqli_query($koneksi, "SELECT * FROM detail_transaksi WHERE id_transaksi='$id'");
    $row_dpemesanan		= mysqli_fetch_assoc($select_dpemesanan);

    if(isset($_POST['update-pesan'])){
        $id   = mysqli_real_escape_string($koneksi, $_POST['id']);
        $id_user	    = mysqli_real_escape_string($koneksi, $_POST['id_user']);
        $id_kendaraan	    = mysqli_real_escape_string($koneksi, $_POST['id_kendaraan']);
        $tgl_transaksi	= date("Y-m-d");
        $tgl_peminjaman	= mysqli_real_escape_string($koneksi, $_POST['tgl_peminjaman']);
        $tgl_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tgl_pengembalian']);
        $merk	        = mysqli_real_escape_string($koneksi, $_POST['merk']);
        
        $selisih    = strtotime($tgl_pengembalian) - strtotime($tgl_peminjaman);
        $selisih    = $selisih / (60 * 60 * 24);
        $selisih    = $selisih;
        $lama_peminjaman = $selisih;

        $select_kendaraan	= mysqli_query($koneksi, "SELECT kendaraan.harga FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
        $row_kendaraan		= mysqli_fetch_assoc($select_kendaraan);
        $total_harga	    = $row_kendaraan['harga'] * $lama_peminjaman;
        
        $sql = "UPDATE transaksi SET id_user='$id_user', tgl_transaksi='$tgl_transaksi', 
            merk='$merk', total_harga='$total_harga' WHERE id_transaksi='$id'";
        $sql2= "UPDATE detail_transaksi SET id_kendaraan='$id_kendaraan', id_detail='$id_detail', 
            tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian', 
            lama_peminjaman='$lama_peminjaman' WHERE id_transaksi='$id'";
              
        $query = mysqli_query($koneksi, $sql);
        $query2 = mysqli_query($koneksi, $sql2);
        if( $query && $query2 ){
            header('Location: index.php?page=master/pemesanan/list-pemesanan');
        } else {        
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location.href='index.php?page=master/pemesanan/list-pemesanan';
            </script>";
        }
    }
?>

</style>`
<div class="row">
        <div class="col-sm-8">
            <section class="panel panel-default">
                <div class="panel panel-heading">Update Pesanan</div>
                <div class="panel panel-body">

                <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $row_pemesanan['id_transaksi']; ?>">
					<div class="row">
						<div class="col-md-8">
							<table style="width:75%">
                                <!-- <p>
                                    <label for="name">ID Transaksi</label><br />
                                    <input class="form-control" name="id_transaksi" id="id_transaksi" type="text" required />
                                </p>     -->
                                <p>
                                    <label for="name">ID User</label><br />
                                    <input class="form-control" name="id_user" id="id_user" type="text" value="<?=$row_pemesanan['id_user'];?>" required />
                                </p>
                                <p>
                                    <label for="name">ID Kendaraan</label><br />
                                    <input class="form-control" name="id_kendaraan" id="id_kendaraan" type="text" value="<?=$row_dpemesanan['id_kendaraan'];?>" required />
                                </p>
                                <p>
                                    <label for="name">Tanggal Peminjaman</label><br />
                                    <input class="form-control" name="tgl_peminjaman" id="tgl_peminjaman" type="date" value="<?=$row_dpemesanan['tgl_peminjaman'];?>" required />
                                </p>
                                <p>
                                    <label for="name">Tanggal Pengembalian</label><br />
                                    <input class="form-control" name="tgl_pengembalian" id="tgl_pengembalian" type="date" value="<?=$row_dpemesanan['tgl_pengembalian'];?>" required />
                                </p>
                                <!-- <p>
                                    <label for="name">Lama Peminjaman</label><br />
                                    <input class="form-control" name="lama_peminjaman" id="lama_peminjaman" type="text" required />
                                </p> -->
                                <p>
                                    <label for="name">Merk</label><br />
                                    <input class="form-control" name="merk" id="merk" type="text" value="<?=$row_pemesanan['merk'];?>" required />
                                </p>
                                <!-- <p>
                                    <label for="name">Total Harga</label><br />
                                    <input class="form-control" name="total_harga" id="total_harga" type="text" required />
                                </p> -->
                            <div class="modal-footer">  
                                <button type="submit" class="btn btn-primary" name="update-pesan">ADD</button>
                            </div>
				</form>

                </div>
            </section>
        </div>
</div>
