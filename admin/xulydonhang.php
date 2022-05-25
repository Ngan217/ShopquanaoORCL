<?php
    include '../db/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
		<li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php" style ="background-color:lightgrey;Color:black">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục sản phẩm</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục bài viết</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<!-- -->
	<div class="container">
		<div class="row">
		
				
				<div class="col-md-41">
					<h4>Đơn hàng </h4>
					<div class="div_left">
					<form action="" method="POST" enctype="multipart/form-data">
						<select name="tinhtrang" class="form-control" style = "width : 30%">
								<option  value="0" > Đang chờ xử lý </option>
								<option value="1" > Đã xử lý | Đang giao </option>
								<option value="2" > Đã giao </option>
								<option value="3" > Đã hủy </option>
						</select>
						
						<div class="div_right"><button >Xem các đơn hàng</button></div>
						
						</form>
						
					</div>
			<?php if (isset($_POST['tinhtrang'])) {
    					$tinhtrang = $_POST['tinhtrang'];
					} else {
    					$tinhtrang = '';
					}
                $sql_get_donhang = oci_parse($con, "SELECT * FROM TBL_DONHANG WHERE TINHTRANG = '$tinhtrang'");
                oci_execute($sql_get_donhang); ?>
					<table class="table table-bordered ">
						<tr>
							<th>Thứ tự</th>
							<th>Mã đơn hàng</th>
							<th>Mã khách hàng</th>
							<th>Tên khách hàng</th>
							<th>Địa chỉ</th>
							<th>Tổng tiền</th>
							<th>Tình trạng đơn hàng</th>
							<th>Chi tiết đơn hàng</th>
						</tr>
						<?php
                        $i = 0;
                while ($row_dh = oci_fetch_array($sql_get_donhang)) {
                    ++$i; ?> 
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $row_dh['DONHANG_ID']; ?></td>
							
							<td><?php echo $row_dh['KHACHHANG_ID']; ?></td>
							<td><?php echo $row_dh['TENKHACHHANG']; ?></td>
							<td><?php echo $row_dh['DIACHI']; ?></td>
							<td><?php echo number_format($row_dh['TONGTIEN']).'vnđ'; ?></td>
							<td><?php if ($row_dh['TINHTRANG'] == 0) {
                        echo 'Đang chờ xử lý';
                    } elseif ($row_dh['TINHTRANG'] == 1) {
                        echo 'Đã xử lý | Đang giao hàng';
                    } elseif ($row_dh['TINHTRANG'] == 2) {
                        echo 'Đã giao hàng';
                    } else {
                        echo 'Đã hủy';
                    } ?></td>
							<td><a href="xulydonhang.php?quanly=xemchitietdon&donhang_id=<?php echo $row_dh['DONHANG_ID']; ?>">Xem</a></td>
							</tr>
					<?php
                } ?> 
					</table>
				</div>
				<?php
					if(isset($_POST['tinhtrang_update'])){
						$tinhtrang_new = $_POST['tinhtrang_update'];
						$id_donhang = $_GET['donhang_id'];
						$sql_update_tinhtrang = oci_parse($con, "UPDATE TBL_DONHANG SET TINHTRANG = '$tinhtrang_new' WHERE DONHANG_ID = '$id_donhang'");
						oci_execute($sql_update_tinhtrang);
						echo '<script>alert("Cập nhật thành công")</script>';
					}
				?>
		<div class="col-md-8">
		<?php
            if (isset($_GET['quanly']) == 'xemchitietdon') {
                $id_donhang = $_GET['donhang_id'];

                $sql_xemdonhang = oci_parse($con, "SELECT * FROM tbl_chitietdonhang WHERE donhang_id='$id_donhang'");
                oci_execute($sql_xemdonhang);
				$select_A = oci_parse($con, "SELECT tinhtrang FROM TBL_DONHANG WHERE DONHANG_ID = '$id_donhang'");
				oci_execute($select_A);
				$row_tt = oci_fetch_array($select_A);
				

                unset($_GET['donhang_id']);
				echo 'Đơn hàng'.' '.$id_donhang;
				// if($sql_xemdonhang['tinhtrang'] == 0) echo ' Tình trạng : [Đang chờ xử lý]';
				// elseif($sql_xemdonhang['tinhtrang'] == 1) echo ' Tình trạng : [Đã xử lý | Đang giao]';
				// elseif($sql_xemdonhang['tinhtrang'] == 2) echo ' Tình trạng : [Đã giao]';
				// elseif($sql_xemdonhang['tinhtrang'] == 3) echo ' Tình trạng : [Đã hủy]';
                
				if ($row_tt['TINHTRANG'] == 0) {
					echo ' [Đang chờ xử lý]';
				} elseif ($row_tt['TINHTRANG'] == 1) {
					echo ' [Đã xử lý | Đang giao hàng]';
				} elseif ($row_tt['TINHTRANG'] == 2) {
					echo ' [Đã giao hàng]';
				} else {
					echo ' [Đã hủy]';
				}
                //$id_category_1 = $row_capnhat['CATEGORY_ID'];?>

			<table class="table table-bordered ">
				<tr>
					<th>Thứ tự</th>
					<th>Mã sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Giá</th>
										
				</tr>
				<?php
                    $i = 0;
                while ($row_donhang = oci_fetch_array($sql_xemdonhang)) {
                    ++$i;
                    $ID = $row_donhang['SANPHAM_ID'];
                    $sql_get_tensp = oci_parse($con, "SELECT SANPHAM_NAME, SANPHAM_IMAGE FROM TBL_SANPHAM WHERE SANPHAM_ID = '$ID'");
                    oci_execute($sql_get_tensp);
                    $row_sanpham = oci_fetch_array($sql_get_tensp); ?> 
				<tr>
					<td><?php echo $i; ?></td>
										
					<td><?php echo $row_donhang['SANPHAM_ID']; ?></td>
					<td><img src="../images/<?php echo $row_sanpham['SANPHAM_IMAGE']; ?>" alt=" " style ="height:120px"  class=""></td>
										
									
					<td><?php echo $row_sanpham['SANPHAM_NAME']; ?></td>

					<td><?php echo $row_donhang['SOLUONG']; ?></td>
										
					<td><?php echo $row_donhang['SANPHAM_GIA']; ?></td>
										
				</tr>
			<?php
                } ?> 
	</table>
				<?php
            }?>
			<!-- FORM THAY DOI TRANG THAI DON HANG -->
			<form action="" method="POST" enctype="multipart/form-data">
						<select name="tinhtrang_update" class="form-control" style = "width : 30%">
							<option value="0" > Đang chờ xử lý </option>
							<option value="1" > Đã xử lý | Đang giao </option>
							<option value="2" > Đã giao </option>
							<option value="3" > Đã hủy </option>
						</select>
						
						<div class="div_right"><button >Cập nhật </button></div>
						
						</form>
		</div>
		
			
			<!-- <div class="col-md-8">
				<h4>Chi tiết đơn hàng</h4>
				
				
				</table>
			</div> -->
		</div>
	</div>
	<!-- -->
	
</body>
</html>