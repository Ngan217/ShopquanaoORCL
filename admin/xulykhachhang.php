<?php
    include '../db/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Khách hàng</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
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
	        <a class="nav-link" href="xulykhachhang.php" style ="background-color:lightgrey;Color:black">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-12">
				<h4>Khách hàng</h4>
				<?php
                $sql_select_khachhang = oci_parse($con, 'SELECT * FROM tbl_khachhang ORDER BY khachhang_id ASC');  /* GROUP BY tbl_giaodich.magiaodich */

                oci_execute($sql_select_khachhang);
                ?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<TH>ID khách hàng</th>
						<th>Tên khách hàng</th>
						<th>Số điện thoại</th>
						<th>Địa chỉ</th>
						<th>Email</th>
						<th>Số đơn hàng</th>
						<th>Lịch sử đặt hàng</th>
					</tr>
					<?php
                    $i = 0;
                    while ($row_khachhang = oci_fetch_array($sql_select_khachhang, OCI_BOTH)) {
                        ++$i; ?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_khachhang['KHACHHANG_ID']; ?></td>
						<td><?php echo $row_khachhang['NAME']; ?></td>
						<td><?php echo $row_khachhang['PHONE']; ?></td>
						<td><?php echo $row_khachhang['ADDRESS']; ?></td>
						
						<td><?php echo $row_khachhang['EMAIL']; ?></td>
						<td><?php echo $row_khachhang['SODONHANG']; ?></td>
						<td><a href="xulykhachhang.php?quanly=xemlichsudathang&khachhang_id=<?php echo $row_khachhang['KHACHHANG_ID']; ?>">Xem</a></td>
					</tr>
					 <?php
                    }
                    ?> 
				</table>
			</div>

			<div class="col-md-12">
				<h4>Lịch sử đặt hàng của khách hàng : <?php if (isset($_GET['khachhang_id'])) {
                        $id = $_GET['khachhang_id'];
                        $sql_get_TTKhachhang = oci_parse($con, "SELECT KHACHHANG_ID, NAME FROM TBL_KHACHHANG WHERE KHACHHANG_ID = '$id'");
                        oci_execute($sql_get_TTKhachhang);
                        $row = oci_fetch_array($sql_get_TTKhachhang);
                        echo $row['KHACHHANG_ID'].'-'.$row['NAME'];
                    }
                 ?> </h4>
				<?php
                    if (isset($_GET['khachhang_id'])) {
                        $id_KH = $_GET['khachhang_id'];
                    } else {
                        $id_KH = '';
                    }
                    $sql_select = oci_parse($con, "SELECT * FROM tbl_donhang WHERE khachhang_id = '$id_KH'");
                    oci_execute($sql_select);

                ?>
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Mã đơn hàng</th>
						<th>Tổng tiền</th>
						<th>Địa chỉ</th>
						<th>Tình trạng đơn hàng</th>
						<th>Ngày đặt hàng</th>
						
					</tr>
					<?php $i = 0;
                        while ($row_donhang = oci_fetch_array($sql_select)) {
                            ++$i; ?> 
					<tr>
						<td><?php echo $i; ?></td>
						
						<td><?php echo $row_donhang['DONHANG_ID']; ?></td>
					
						<td><?php echo $row_donhang['TONGTIEN']; ?></td>
						
						<td><?php echo $row_donhang['DIACHI']; ?></td>

						<td><?php if ($row_donhang['TINHTRANG' == 0]) {
                                echo 'Đang chờ xử lý';
                            } elseif ($row_donhang['TINHTRANG' == 1]) {
                                echo 'Đã xử lý | Đang giao';
                            } elseif ($row_donhang['TINHTRANG' == 2]) {
                                echo 'Đã giao';
                            } else {
                                echo 'Đã hủy';
                            } ?></td>

						<td><?php echo $row_donhang['NGAYDATHANG']; ?></td>
					
					
					</tr>
					 <?php
                        }
                    ?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>