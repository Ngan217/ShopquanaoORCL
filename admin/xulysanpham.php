<?php
    include '../db/connect.php';
?>
<?php
    if (isset($_POST['themsanpham'])) {
        $tensanpham = $_POST['tensanpham'];
        $hinhanh = $_FILES['hinhanh']['name'];

        $soluong = $_POST['soluong'];
        $gia = $_POST['giasanpham'];
        $giakhuyenmai = $_POST['giakhuyenmai'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';

        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $sql_insert_product = oci_parse($con, "INSERT INTO tbl_sanpham(SANPHAM_ACTIVE,sanpham_hot,sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,category_id) values ('0','0','$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
        oci_execute($sql_insert_product);
        move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
    } elseif (isset($_POST['capnhatsanpham'])) {
        $id_update = $_POST['id_update'];
        $tensanpham = $_POST['tensanpham'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $soluong = $_POST['soluong'];
        $gia = $_POST['giasanpham'];
        $giakhuyenmai = $_POST['giakhuyenmai'];
        $danhmuc = $_POST['danhmuc'];
        $chitiet = $_POST['chitiet'];
        $mota = $_POST['mota'];
        $path = '../uploads/';
        if ($hinhanh == '') {
            $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
        } else {
            move_uploaded_file($hinhanh_tmp, $path.$hinhanh);
            $sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',category_id='$danhmuc' WHERE sanpham_id='$id_update'";
        }
        $img1 = oci_parse($con, $sql_update_image);
        oci_execute($img1);
    }

?> 
<?php
    if (isset($_GET['xoa'])) {
        $id = $_GET['xoa'];
        $sql_xoa = oci_parse($con, "DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
        oci_execute($sql_xoa);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>S???n ph???m</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
		  <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">????n h??ng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh m???c s???n ph???m</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php" style ="background-color:lightgrey;Color:black">S???n ph???m</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh m???c b??i vi???t</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">B??i vi???t</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Kh??ch h??ng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
            if (isset($_GET['quanly']) == 'capnhat') {
                $id_capnhat = $_GET['capnhat_id'];
                $sql_capnhat = oci_parse($con, "SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
                oci_execute($sql_capnhat);
                $row_capnhat = oci_fetch_array($sql_capnhat);
                $id_category_1 = $row_capnhat['CATEGORY_ID']; ?>
				<div class="col-md-4">
				<h4>C???p nh???t s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['SANPHAM_NAME']; ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['SANPHAM_ID']; ?>">
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['SANPHAM_IMAGE']; ?>" height="80" width="80"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['SANPHAM_GIA']; ?>"><br>
					<label>Gi?? khuy???n m??i</label>
					<input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['SANPHAM_GIAKHUYENMAI']; ?>"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['SANPHAM_SOLUONG']; ?>"><br>
					<label>M?? t???</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['SANPHAM_MOTA']; ?></textarea><br>
					<label>Chi ti???t</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['SANPHAM_CHITIET']; ?></textarea><br>
					<label>Danh m???c</label>
					<?php
                    $sql_danhmuc = oci_parse($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
                oci_execute($sql_danhmuc); ?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n danh m???c-----</option>
						<?php
                        while ($row_danhmuc = oci_fetch_array($sql_danhmuc)) {
                            if ($id_category_1 == $row_danhmuc['CATEGORY_ID']) {
                                ?>
						<option selected value="<?php echo $row_danhmuc['CATEGORY_ID']; ?>"><?php echo $row_danhmuc['CATEGORY_NAME']; ?></option>
						<?php
                            } else {
                                ?>
						<option value="<?php echo $row_danhmuc['CATEGORY_ID']; ?>"><?php echo $row_danhmuc['CATEGORY_NAME']; ?></option>
						<?php
                            }
                        } ?>
					</select><br>
					<input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-default">
				</form>
				</div>
			<?php
            } else {
                ?> 
				<div class="col-md-4">
				<h4>Th??m s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="T??n s???n ph???m"><br>
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Gi?? s???n ph???m"><br>
					<label>Gi?? khuy???n m??i</label>
					<input type="text" class="form-control" name="giakhuyenmai" placeholder="Gi?? khuy???n m??i"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" placeholder="S??? l?????ng"><br>
					<label>M?? t???</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Chi ti???t</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>Danh m???c</label>
					<?php
                    $sql_danhmuc = oci_parse($con, 'SELECT * FROM tbl_category ORDER BY category_id DESC');
                oci_execute($sql_danhmuc); ?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n danh m???c-----</option>
						<?php
                        while ($row_danhmuc = oci_fetch_array($sql_danhmuc)) {
                            ?>
						<option value="<?php echo $row_danhmuc['CATEGORY_ID']; ?>"><?php echo $row_danhmuc['CATEGORY_NAME']; ?></option>
						<?php
                        } ?>
					</select><br>
					<input type="submit" name="themsanpham" value="Th??m s???n ph???m" class="btn btn-default">
				</form>
				</div>
				<?php
            }

                ?>
			<div class="col-md-8">
				<h4>Li???t k?? s???n ph???m</h4>
				<?php
                $sql_select_sp = oci_parse($con, 'SELECT * FROM tbl_sanpham, tbl_category WHERE tbl_sanpham.category_id=tbl_category.category_id ORDER BY tbl_sanpham.sanpham_id DESC');
                oci_execute($sql_select_sp);
                ?> 
				<table class="table table-bordered ">
					<tr>
						<th>Th??? t???</th>
						<th>T??n s???n ph???m</th>
						<th>H??nh ???nh</th>
						<th>S??? l?????ng</th>
						<th>Danh m???c</th>
						<th>Gi?? s???n ph???m</th>
						<th>Gi?? khuy???n m??i</th>
						<th>Qu???n l??</th>
					</tr>
					<?php
                    $i = 0;
                    while ($row_sp = oci_fetch_array($sql_select_sp)) {
                        ++$i; ?> 
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_sp['SANPHAM_NAME']; ?></td>
						<td><img src="../uploads/<?php echo $row_sp['SANPHAM_IMAGE']; ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['SANPHAM_SOLUONG']; ?></td>
						<td><?php echo $row_sp['CATEGORY_NAME']; ?></td>
						<td><?php echo number_format($row_sp['SANPHAM_GIA']).'vn??'; ?></td>
						<td><?php echo number_format($row_sp['SANPHAM_GIAKHUYENMAI']).'vn??'; ?></td>
						<td><a href="?xoa=<?php echo $row_sp['SANPHAM_ID']; ?>">X??a</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['SANPHAM_ID']; ?>">C???p nh???t</a></td>
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