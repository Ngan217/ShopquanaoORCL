<?php
 if(isset($_POST['themgiohang'])){
 	$tensanpham = $_POST['tensanpham'];
 	$sanpham_id = $_POST['sanpham_id'];
 	$hinhanh = $_POST['hinhanh'];
 	$gia = $_POST['giasanpham'];
 	$soluong = $_POST['soluong'];	
 	$sql_select_giohang = oci_parse($con,"SELECT * FROM SYS.tbl_giohang WHERE tensanpham='$tensanpham'");
	oci_execute($sql_select_giohang);
 	$count = oci_num_rows($sql_select_giohang);
 	if($count>0){
 		$row_sanpham = oci_fetch_array($sql_select_giohang);
		 echo $row_sanpham;
 		$soluong = $row_sanpham['SOLUONG'] + 1;
 		$sql_giohang = "UPDATE SYS.tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
 	}else{
 		$soluong = $soluong;
 		$sql_giohang = "INSERT INTO SYS.tbl_giohang(giohang_id,tensanpham,sanpham_id,giasanpham,hinhanh,soluong) values (sequengiohang.nextval,'$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong')";

 	}
	//  ECHO $sql_giohang;
 	$insert_row = oci_parse($con,$sql_giohang);
	 oci_execute($insert_row);
 	// if($insert_row==0){
 	// 	header('Location:index.php?quanly=chitietsp&id='.$sanpham_id);	
 	// }

 }elseif(isset($_POST['capnhatsoluong'])){
 	
 	for($i=0;$i<count($_POST['product_id']);$i++){
 		$sanpham_id = $_POST['product_id'][$i];
 		$soluong = $_POST['soluong'][$i];
 		if($soluong<=0){
 			$sql_delete = oci_parse($con,"DELETE FROM SYS.tbl_giohang WHERE sanpham_id='$sanpham_id'");
			 oci_execute($sql_delete);
 		}else{
 			$sql_update = oci_parse($con,"UPDATE SYS.tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
			 oci_execute($sql_update);
 		}
 	}

 }elseif(isset($_GET['xoa'])){
 	$id = $_GET['xoa'];
 	$sql_delete = oci_parse($con,"DELETE FROM SYS.tbl_giohang WHERE giohang_id='$id'");
	 oci_execute($sql_delete);

 }elseif(isset($_GET['dangxuat'])){
 	$id = $_GET['dangxuat'];
 	if($id==1){
 		unset($_SESSION['dangnhap_home']);
 	}

 
 }elseif(isset($_POST['thanhtoan'])){
 	$name = $_POST['name'];
 	$phone = $_POST['phone'];
 	$email = $_POST['email'];
 	$password = md5($_POST['password']);
 	$note = $_POST['note'];
 	$address = $_POST['address'];
 	$giaohang = $_POST['giaohang'];
 
	 $sql1="INSERT INTO SYS.tbl_khachhang(khachhang_id,name,phone,email,address,note,giaohang,password) values (sequenkhachhang.nextval,'$name','$phone','$email','$address','$note','$giaohang','$password')";
 	$sql_khachhang = oci_parse($con,$sql1);
	 
	 oci_execute($sql_khachhang);
	//  echo $sql1;
 	if($sql_khachhang){
		 $sql2="SELECT * FROM (SELECT * FROM SYS.tbl_khachhang ORDER BY khachhang_id DESC) WHERE rownum <= 1";
 		$sql_select_khachhang = oci_parse($con,$sql2);
		 oci_execute($sql_select_khachhang);
		//  echo $sql2;
 		$mahang = rand(0,9999);
 		$row_khachhang = oci_fetch_array($sql_select_khachhang);
 		$khachhang_id = $row_khachhang['KHACHHANG_ID'];
 		$_SESSION['dangnhap_home'] = $row_khachhang['NAME'];
 		$_SESSION['khachhang_id'] = $khachhang_id;
 		for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
			 $sql3="INSERT INTO SYS.tbl_donhang(donhang_id,sanpham_id,khachhang_id,soluong,mahang,tinhtrang,ngaythang) values (sequendonhang.nextval,'$sanpham_id','$khachhang_id','$soluong','$mahang','0',current_timestamp)";
	 		$sql_donhang = oci_parse($con,$sql3);
			 
			 oci_execute($sql_donhang);
			//  echo $sql3;

			 $sql4="INSERT INTO SYS.tbl_giaodich(giaodich_id,ngaythang,sanpham_id,soluong,magiaodich,khachhang_id) values (sequengiaodich.nextval,current_timestamp,'$sanpham_id','$soluong','$mahang','$khachhang_id')";
	 		$sql_giaodich = oci_parse($con,$sql4);
			 oci_execute($sql_giaodich);
			//  echo $sql4;
	 		$sql_delete_thanhtoan = oci_parse($con,"DELETE FROM SYS.tbl_giohang WHERE sanpham_id='$sanpham_id'");
			 oci_execute($sql_delete_thanhtoan);
 		}

 	}
 }elseif(isset($_POST['thanhtoandangnhap'])){

 	$khachhang_id = $_SESSION['khachhang_id'];
 	$mahang = rand(0,9999);	
 	for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
	 		$sanpham_id = $_POST['thanhtoan_product_id'][$i];
	 		$soluong = $_POST['thanhtoan_soluong'][$i];
            $chung="sequendonhang.nextval";
			 $sql5="INSERT INTO SYS.tbl_donhang(donhang_id,sanpham_id,khachhang_id,soluong,mahang) values ($chung,'$sanpham_id','$khachhang_id','$soluong','$mahang')";
	 		$sql_donhang = oci_parse($con,$sql5);
			 oci_execute($sql_donhang);
  echo $sql5;
			 $sql6="INSERT INTO SYS.tbl_giaodich(giaodich_id,ngaythang,sanpham_id,soluong,magiaodich,khachhang_id) values ($chung,current_timestamp,'$sanpham_id','$soluong','$mahang','$khachhang_id')";
	 		$sql_giaodich = oci_parse($con,$sql6);
			 echo $sql6;
			 oci_execute($sql_giaodich);
	 		$sql_delete_thanhtoan = oci_parse($con,"DELETE FROM SYS.tbl_giohang WHERE sanpham_id='$sanpham_id'");
			 oci_execute($sql_delete_thanhtoan);
 		}

 	
 }
?>

<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng của bạn
			</h3>
				<?php 
				if(isset($_SESSION['dangnhap_home'])){
					echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=giohang&dangxuat=1">Đăng xuất</a></p>';
				}else{
					echo '';
				}
				?>
				
			<!-- //tittle heading -->
			<div class="checkout-right">
			<?php
			$sql_lay_giohang = oci_parse($con,"SELECT * FROM SYS.tbl_giohang ORDER BY giohang_id DESC");
			oci_execute($sql_lay_giohang);

			?>

				<div class="table-responsive">
					<form action="" method="POST">
					
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Thứ tự</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>

								<th>Giá</th>
								<th>Giá tổng</th>
								<th>Quản lý</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i = 0;
						$total = 0;
						while($row_fetch_giohang = oci_fetch_array($sql_lay_giohang)){ 

							$subtotal = $row_fetch_giohang['SOLUONG'] * $row_fetch_giohang['GIASANPHAM'];
							$total+=$subtotal;
							$i++;
						?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img src="images/<?php echo $row_fetch_giohang['HINHANH'] ?>" alt=" " height="120" class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['SANPHAM_ID'] ?>">
									<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['SOLUONG'] ?>">
								
									
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['TENSANPHAM'] ?></td>
								<td class="invert"><?php echo number_format($row_fetch_giohang['GIASANPHAM']).'vnđ' ?></td>
								<td class="invert"><?php echo number_format($subtotal).'vnđ' ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['GIOHANG_ID'] ?>">Xóa</a>
								</td>
							</tr>
							<?php
							} 
							?>
							<tr>
								<td colspan="7">Tổng tiền : <?php echo number_format($total).'vnđ' ?></td>

							</tr>
							<tr>
								<td colspan="7"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
								<?php 
								$sql_giohang_select = oci_parse($con,"SELECT * FROM SYS.tbl_giohang");
								oci_execute($sql_giohang_select);
								$count_giohang_select = oci_num_rows($sql_giohang_select);

								if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
									while($row_1 = oci_fetch_array($sql_giohang_select)){
								?>
								
								<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['SANPHAM_ID'] ?>">
								<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['SOLUONG'] ?>">
								<?php 
							}
								?>
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="thanhtoandangnhap">
		
								<?php
								} 
								?>
								
								</td>
							
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['dangnhap_home'])){ 
			?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm địa chỉ giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Điền tên" required="">
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Số phone" name="phone" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Địa chỉ" name="address" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Email" name="email" required="">
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Password" name="password" required="">
									</div>
									<div class="controls form-group">
										<textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>  
									</div>
									<div class="controls form-group">
										<select class="option-w3ls" name="giaohang">
											<option>Chọn hình thức giao hàng</option>
											<option value="1">Thanh toán ATM</option>
											<option value="0">Nhận tiền tại nhà</option>
											

										</select>
									</div>
								</div>
								<?php
								$sql_lay_giohang = oci_parse($con,"SELECT * FROM SYS.tbl_giohang ORDER BY giohang_id DESC");
								oci_execute($sql_lay_giohang);
								while($row_thanhtoan = oci_fetch_array($sql_lay_giohang)){ 
								?>
									<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['SANPHAM_ID'] ?>">
									<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['SOLUONG'] ?>">
								<?php
								} 
								?>
								<input type="submit" name="thanhtoan" class="btn btn-success" style="width: 20%" value="Thanh toán">
								
							</div>
						</div>
					</form>
					
				</div>
			</div>
			<?php
			} 
			?>
		</div>
	</div>
	<!-- //checkout page -->