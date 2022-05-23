<?php
    if (isset($_GET['id_tin'])) {
        $id_danhmuc = $_GET['id_tin'];
    } else {
        $id_danhmuc = '';
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
                    $sql_tendanhmuc = oci_parse($con, "SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'");
                    oci_execute($sql_tendanhmuc);

// echo $sql_tendanhmuc;
                    $row_danh = oci_fetch_array($sql_tendanhmuc);
                    // echo $row_danh;
                    ?>		
					<li><?php echo $row_danh['TENDANHMUC']; ?></li>
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
            $sql1 = "SELECT * FROM tbl_danhmuc_tin WHERE danhmuctin_id='$id_danhmuc'";
                    $sql_tendanhmuc1 = oci_parse($con, $sql1);
                    // echo $sql1;
                    oci_execute($sql_tendanhmuc1);
                    $row_danh1 = oci_fetch_array($sql_tendanhmuc1);
                    ?>
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $row_danh1['TENDANHMUC']; ?></h3>
			<!-- //tittle heading -->
			<?php $sql2 = "SELECT * FROM tbl_danhmuc_tin, tbl_baiviet WHERE tbl_danhmuc_tin.danhmuctin_id = tbl_baiviet.danhmuctin_id AND tbl_danhmuc_tin.danhmuctin_id='$id_danhmuc'";
            $sql_baiviet = oci_parse($con, $sql2);
            // echo $sql2;
            oci_execute($sql_baiviet);
            // echo $sql_baiviet;
            while ($row_baiviet = oci_fetch_array($sql_baiviet)) {
                ?>
			<div class="row">
				<div class="col-lg-4 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="images/<?php echo $row_baiviet['BAIVIET_IMAGE']; ?>" class="img-fluid" alt=" ">
				</div>
				<div class="col-lg-8 welcome-left">
					<h5><a href="index.php?quanly=chitiettin&id_tin=<?php echo $row_baiviet['BAIVIET_ID']; ?>"><?php echo $row_baiviet['TENBAIVIET']; ?></a></h5>
					<h4 class="my-sm-3 my-2"><?php echo $row_baiviet['TOMTAT']; ?></h4>
				</div>
			</div><br>
			<?php
            }
            ?>


		</div>
	</div>
	<!-- //about -->