<?php
	if(isset($_GET['id_tin'])){
		$id_baiviet = $_GET['id_tin'];
	}else{
		$id_baiviet = '';
	}
?>
<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Trang chủ</a>
						<i>|</i>
					</li>
				<?php
					$sql_tenbaiviet = oci_parse($con,"SELECT * FROM SYStbl_baiviet WHERE baiviet_id='$id_baiviet'");
					oci_execute($sql_tenbaiviet);
					$row_bai = oci_fetch_array($sql_tenbaiviet); 
					?>	 	
					<li><?php echo $row_bai['TENBAIVIET'] ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<?php
					$sql_tenbaiviet1 = oci_parse($con,"SELECT * FROM SYS.tbl_baiviet WHERE baiviet_id='$id_baiviet'");
					oci_execute($sql_tenbaiviet1);
					$row_bai1 = oci_fetch_array($sql_tenbaiviet1); 
					?>	
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $row_bai1['TENBAIVIET'] ?></h3>
			<!-- //tittle heading -->
			<?php 
			$sql_e="SELECT * FROM SYS.tbl_baiviet WHERE tbl_baiviet.baiviet_id='$id_baiviet'";

			$sql_baiviet = oci_parse($con,$sql_e);
			// echo  $sql_e;
			oci_execute($sql_baiviet);
			$row_baiviet = oci_fetch_array($sql_baiviet);
			?>
			<div class="row">
				<div class="col-lg-12 welcome-left">
					<h5><?php echo $row_baiviet['TENBAIVIET'] ?></h5>
					<h4 class="my-sm-3 my-2"><?php echo $row_baiviet['TOMTAT'] ?></h4>
					<p><?php echo $row_baiviet['NOIDUNG'] ?></p>
				</div>
			</div><br>
			


		</div>
	</div>
	<!-- //about -->