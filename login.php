<?php
ob_start();
session_start();
include 'page/koneksi.php';
?>
<?php
if(isset($_POST['login']) && !empty($_POST['login'])){
    $username_peg 	= mysqli_real_escape_string($koneksi, $_POST['username_peg']);
    $pass_peg	= mysqli_real_escape_string($koneksi, $_POST['pass_peg']);
    $sql = "SELECT * FROM pegawai WHERE username_peg = '$username_peg' AND pass_peg = '$pass_peg'";
	$select_user	= mysqli_query($koneksi, $sql);
	$num_user		= mysqli_num_rows($select_user);
	$row_user		= mysqli_fetch_array($select_user);
	if($num_user > 0){
		if($row_user['username_peg'] == $username_peg && $row_user['pass_peg'] == $pass_peg){
            $_SESSION['username_peg'] = $row_user['username_peg'];
            $_SESSION['id_peg']   = $row_user['id_peg'];
            header('location: page/index.php');
        }
	}else{
?>
            <script type="text/javascript">
                alert("Pengguna Tidak Ditemukan!");location.href="index.php";
            </script>
<?php
    }
}
?>