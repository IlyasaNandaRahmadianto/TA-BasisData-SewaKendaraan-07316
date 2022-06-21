<?php
include("koneksi.php");


    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql2 = "DELETE FROM detail_kendaraan WHERE kendaraan_id='$id'";
    $sql = "DELETE FROM kendaraan WHERE id_kendaraan='$id'";
    $query2= mysqli_query($koneksi, $sql2);
    $query = mysqli_query($koneksi, $sql);
    // apakah query hapus berhasil?
    if( $query2 && $query){
        header('Location: index.php?page=master/kendaraan/list-kendaraan');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/kendaraan/list-kendaraan';
        </script>";
    }
?>