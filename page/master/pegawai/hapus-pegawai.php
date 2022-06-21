<?php
include("koneksi.php");


    // ambil id dari query string
    $id = $_GET['id_peg'];

    // buat query hapus
    $sql = "DELETE FROM pegawai WHERE id_peg='$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php?page=master/pegawai/pegawai');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/pegawai/pegawai';
        </script>";
    }
?>