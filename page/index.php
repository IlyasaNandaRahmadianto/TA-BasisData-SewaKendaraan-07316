<?php
ob_start();
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/jquery-ui.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/responsive.css">
		<link rel="stylesheet" href="../datatables/dataTables.bootstrap.css"/>
		<script src="../jquery/jquery-3.3.1.min.js" type=" text/javascript"></script>
		<script src="../js/bootstrap.min.js" type=" text/javascript"></script>
	</head>
	<body>
		<div id="wrapper">
			<?php
			date_default_timezone_set("Asia/Jakarta");
			include('koneksi.php');
			include("sidebar.php");
			include("navbar.php");
			?>
			<div class="row" style="padding: 15px;padding-bottom: 0px;">
				<div class="col-md-12">
					<div class="panel panel-default" style="margin-bottom: 0px;">
						<div class="panel-body" style="padding: 10px;border-radius: 2px;">
							<?php
							if(isset($_GET['page'])){
								$variable2 = substr($_GET['page'], 0, strrpos($_GET['page'], "/"));
								$length_var= strlen($variable2);
								$variable3 = substr($_GET['page'], $length_var);
								$variable4 = preg_replace("/[^a-zA-Z0-9']/",' ',$variable3);
								$variable5 = str_replace(" ","",$variable4);
							}
							?>
						</div>
					</div>
				</div>
			</div>
				<section id="content-wrapper">
						<?php 
							if (isset($_GET['page']) && strlen($_GET['page']) > 0) {
								$page = str_replace(".", "/", $_GET['page']) . ".php";
							} else {
								$page = "home.php";
							}
							if (file_exists($page)) {
								include($page);
							} else {
								include("home.php");
							}
						?>
				</section>
		</div>


		<script src="datatables/jquery.dataTables.js"></script>
		<script src="datatables/dataTables.bootstrap.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$("#sidebar-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
				});
			});
		</script>

		<script>
			$(document).ready(function() {
				$("#list-user").dataTable(
					{"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],});
			});
		</script>

		<script>
			$(document).ready(function() {
			$("#list-barang").dataTable({
				"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
			});
			});
		</script>

		<script>
		$(document).ready(function() {
			$("#list-restok").dataTable({
				"lengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
			});
			});
		</script>

		<script>
			$(document).ready(function() {
			$("#list-penjualan").dataTable({
				"lengthMenu": [[10, 20, -1], [10, 20, "All"]],
			});
			});
		</script>

		<script>
			$(document).ready(function() {
			$("#list-pembelian").dataTable({
				"lengthMenu": [[10, 20, -1], [10, 20, "All"]],
			});
			});
		</script>

		<script>
			$(document).ready(function() {
			$("#list-penerima").dataTable({
				"lengthMenu": [[10, 20, -1], [10, 20, "All"]],
			});
		});
		</script>
		
	</body>
</html>