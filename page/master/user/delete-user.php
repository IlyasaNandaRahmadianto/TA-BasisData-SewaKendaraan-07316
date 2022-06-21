<?php
include("koneksi.php");


    // ambil id dari query string
    $id = $_GET['id_user'];

    // buat query hapus
    $sql = "DELETE FROM user WHERE id_user='$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: index.php?page=master/user/list-user');
    } else {        
        echo "<script>
            alert('Data Gagal Dihapus');
            window.location.href='index.php?page=master/user/list-user';
        </script>";
    }
?>