<?php
include("koneksi.php");


    // ambil id dari query string
    $id = $_GET['id_transaksi'];

    // buat query hapus
    $sql2 = "DELETE FROM detail_transaksi WHERE id_transaksi='$id'";
    $sql = "DELETE FROM transaksi WHERE id_transaksi='$id'";
    $query2= mysqli_query($koneksi, $sql2);
    $query = mysqli_query($koneksi, $sql);
    // apakah query hapus berhasil?
    if( $query2 && $query){
        header('Location: index.php?page=master/pemesanan/list-pemesanan');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/pemesanan/list-pemesanan';
        </script>";
    }
?>