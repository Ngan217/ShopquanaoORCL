<?php
    include '../db/connect.php';
?>
<?php
    if (isset($_POST['thembaiviet'])) {
        $tenbaiviet = $_POST['tenbaiviet'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';

        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $sql_insert_product = oci_parse($con, "INSERT INTO tbl_baiviet(tenbaiviet,tomtat,noidung,danhmuctin_id,baiviet_image) values ('$tenbaiviet','$mota','$chitiet','$danhmuc','$hinhanh')");
        oci_execute($sql_insert_product);
        move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
    } elseif (isset($_POST['capnhatbaiviet'])) {
        $id_update = $_POST['id_update'];
        $tenbaiviet = $_POST['tenbaiviet'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';
        if ($hinhanh == '') {
            $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc' WHERE baiviet_id='$id_update'";
        } else {
            move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
            $sql_update_image = "UPDATE tbl_baiviet SET tenbaiviet='$tenbaiviet',noidung='$chitiet',tomtat='$mota',danhmuctin_id='$danhmuc',baiviet_image='$hinhanh' WHERE baiviet_id='$id_update'";
        }
        $sql_ex = oci_parse($con, $sql_update_image);
        oci_execute($sql_ex);
    }

?> 
<?php
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        $sql_xoa = oci_parse($con, "DELETE FROM  tbl_baiviet WHERE baiviet_id='$id'");
        oci_execute($sql_xoa);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
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
	        <a class="nav-link" href="xulybaiviet.php" style ="background-color:lightgrey;Color:black">Bài viết</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
            if (isset($_GET['quanly']) == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = oci_parse($con, "SELECT * FROM   tbl_baiviet WHERE baiviet_id='$id_capnhat'");
                oci_execute($sql_capnhat);
                $row_capnhat = oci_fetch_array($sql_capnhat);

                $id_category_1 = $row_capnhat['DANHMUCTIN_ID']; ?>
				<div class="col-md-4">
				<h4>Cập nhật bài viết</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên bài viết</label>
					<input type="text" class="form-control" name="tenbaiviet" value="<?php echo $row_capnhat['TENBAIVIET']; ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['BAIVIET_ID']; ?>">
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['BAIVIET_IMAGE']; ?>" height="80" width="80"><br>
					
				
					<label>Mô tả</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['TOMTAT']; ?></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['NOIDUNG']; ?></textarea><br>
					<label>Danh mục</label>
					<?php
                    $sql_danhmuc = oci_parse($con, 'SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC');
                oci_execute($sql_danhmuc); ?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
                        while ($row_danhmuc = oci_fetch_array($sql_danhmuc)) {
                            if ($id_category_1 == $row_danhmuc['DANHMUCTIN_ID']) {
                                ?>
						<option selected value="<?php echo $row_danhmuc['DANHMUCTIN_ID']; ?>"><?php echo $row_danhmuc['TENDANHMUC']; ?></option>
						<?php
                            } else {
                                ?>
						<option value="<?php echo $row_danhmuc['DANHMUCTIN_ID']; ?>"><?php echo $row_danhmuc['TENDANHMUC']; ?></option>
						<?php
                            }
                        } ?>
					</select><br>
					<input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-default">
				</form>
				</div>
			<?php
            } else {
                ?> 
				<div class="col-md-4">
				<h4>Thêm bài viết</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên bài viết</label>
					<input type="text" class="form-control" name="tenbaiviet" placeholder="Tên bài viết"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>

					<label>Mô tả</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>Danh mục</label>
					<?php
                    $sql_danhmuc = oci_parse($con, 'SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC');
                oci_execute($sql_danhmuc); ?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Chọn danh mục-----</option>
						<?php
                        while ($row_danhmuc = oci_fetch_array($sql_danhmuc)) {
                            ?>
						<option value="<?php echo $row_danhmuc['DANHMUCTIN_ID']; ?>"><?php echo $row_danhmuc['TENDANHMUC']; ?></option>
						<?php
                        } ?>
					</select><br>
					<input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-default">
				</form>
				</div>
				<?php
            }

                ?>
			<div class="col-md-8">
				<h4>Liệt kê bài viết</h4>
				<?php
                // $ad = oci_query()
                $sql_select_bv = oci_parse($con, 'SELECT * FROM tbl_baiviet,tbl_danhmuc_tin WHERE tbl_baiviet.danhmuctin_id=tbl_danhmuc_tin.danhmuctin_id ORDER BY tbl_baiviet.baiviet_id DESC');
                oci_execute($sql_select_bv);
                ?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
					
						<th>Danh mục</th>
						
						<th>Quản lý</th>
					</tr>
					<?php
                    $i = 0;
                    while ($row_bv = oci_fetch_array($sql_select_bv)) {
                        ++$i; ?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_bv['TENBAIVIET']; ?></td>
						<td><img src="../uploads/<?php echo $row_bv['BAIVIET_IMAGE']; ?>" height="100" width="80"></td>

						<td><?php echo $row_bv['TENDANHMUC']; ?></td>
						
						<td><a href="?xoa=<?php echo $row_bv['BAIVIET_ID']; ?>">Xóa</a> || <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_bv['BAIVIET_ID']; ?>">Cập nhật</a></td>
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