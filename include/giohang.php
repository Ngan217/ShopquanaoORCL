<?php
 if (isset($_POST['themgiohang'])) {
     if (isset($_SESSION['dangnhap_home'])) {
         //$id_khachhang = $_SESSION['khachhang_id'];
         if (isset($_SESSION['khachhang_id'])) {
             $id_khachhang = $_SESSION['khachhang_id'];
             //echo $id_khachhang;
             $tensanpham = $_POST['tensanpham'];
             $sanpham_id = $_POST['sanpham_id'];
             $hinhanh = $_POST['hinhanh'];
             $gia = $_POST['giasanpham'];
             $soluong = $_POST['soluong'];

             // check san pham trong gio hang
             $sql_check_cart = oci_parse($con, "Select * from  tbl_giohang where khachhang_id = '$id_khachhang' and sanpham_id = '$sanpham_id'");
             oci_execute($sql_check_cart);
             $row_check_cart = oci_fetch_array($sql_check_cart);
             $count_check_cart = oci_num_rows($sql_check_cart);
             if ($count_check_cart == 0) {
                 //echo "chua co san pham nao";
                 $sql_addtocart = oci_parse($con, "INSERT INTO tbl_giohang(tensanpham,sanpham_id,giakhuyenmai,image,soluong, khachhang_id) values ('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$id_khachhang')");
                 oci_execute($sql_addtocart);
             } else {
                 // echo "da co san pham";
                 $sql_updatecart = oci_parse($con, "UPDATE tbl_giohang SET soluong= soluong+1 WHERE sanpham_id='$sanpham_id' and khachhang_id = '$id_khachhang'");
                 oci_execute($sql_updatecart);
             }
         } else {
             echo 'error';
         }
     } else {
         echo '<script>alert("Vui lòng đăng nhập hoặc đăng ký tài khoản để thêm sản phẩm vào giỏ hàng")</script>';
     }
 } elseif (isset($_POST['capnhatsoluong'])) {
     for ($i = 0; $i < count($_POST['product_id']); ++$i) {
         $sanpham_id = $_POST['product_id'][$i];
         $soluong = $_POST['soluong'][$i];
         if ($soluong <= 0) {
             $sql_delete = oci_parse($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
             oci_execute($sql_delete);
         } else {
             $sql_update = oci_parse($con, "UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
             oci_execute($sql_update);
         }
     }
 } elseif (isset($_GET['xoa'])) {
     $id = $_GET['xoa'];
     $id_KH = $_SESSION['khachhang_id'];
     $sql_delete = oci_parse($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$id' and khachhang_id ='$id_KH'");
     oci_execute($sql_delete);
 } elseif (isset($_GET['dangxuat'])) {
     $id = $_GET['dangxuat'];
     if ($id == 1) {
         unset($_SESSION['dangnhap_home']);
     }
 } elseif (isset($_POST['themthongtin'])) {
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = md5($_POST['password']);
     $note = $_POST['note'];
     $address = $_POST['address'];
     $giaohang = $_POST['giaohang'];

     $sql_checkemail = oci_parse($con, "SELECT email FROM tbl_khachhang WHERE email = '$email'");
     oci_execute($sql_checkemail);
     $row_dangky = oci_fetch_array($sql_checkemail);
     $count = oci_num_rows($sql_checkemail);
     if ($count > 0) {
         echo '<script>alert("Email đã được sử dụng")</script>';
     } else {
         $sql1 = "INSERT INTO tbl_khachhang(name,phone,email,address,note,giaohang,password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')";
         $sql_khachhang = oci_parse($con, $sql1);

         oci_execute($sql_khachhang);
         $sql_select_khachhang = oci_parse($con, "SELECT name,khachhang_id FROM tbl_khachhang WHERE email = '$email'");
         // echo $sql_select_admin;
         oci_execute($sql_select_khachhang);
         $row_dangky = oci_fetch_array($sql_select_khachhang);
         $count1 = oci_num_rows($sql_select_khachhang);
         if ($count1 > 0) {
             $_SESSION['dangnhap_home'] = $row_dangky['NAME'];
             $_SESSION['khachhang_id'] = $row_dangky['KHACHHANG_ID'];

             //header('Location: index.php?quanly=giohang');
         }
     }

     ///THANH TOÁN
     //  echo $sql1;
     /*
     if ($sql_khachhang) {
         $sql2 = 'SELECT * FROM (SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC) WHERE rownum <= 1';
         $sql_select_khachhang = oci_parse($con, $sql2);
         oci_execute($sql_select_khachhang);
         //  echo $sql2;
         $mahang = rand(0, 9999);
         $row_khachhang = oci_fetch_array($sql_select_khachhang);
         $khachhang_id = $row_khachhang['KHACHHANG_ID'];
         $_SESSION['dangnhap_home'] = $row_khachhang['NAME'];
         $_SESSION['khachhang_id'] = $khachhang_id;
    */
         /*
         for ($i = 0; $i < count($_POST['thanhtoan_product_id']); ++$i) {
             $sanpham_id = $_POST['thanhtoan_product_id'][$i];
             $soluong = $_POST['thanhtoan_soluong'][$i];
             $sql3 = "INSERT INTO tbl_donhang(donhang_id,sanpham_id,khachhang_id,soluong,mahang,tinhtrang,ngaythang) values (sequendonhang.nextval,'$sanpham_id','$khachhang_id','$soluong','$mahang','0',current_timestamp)";
             $sql_donhang = oci_parse($con, $sql3);

             oci_execute($sql_donhang);
             //  echo $sql3;

             $sql4 = "INSERT INTO tbl_giaodich(giaodich_id,ngaythang,sanpham_id,soluong,magiaodich,khachhang_id) values (sequengiaodich.nextval,current_timestamp,'$sanpham_id','$soluong','$mahang','$khachhang_id')";
             $sql_giaodich = oci_parse($con, $sql4);
             oci_execute($sql_giaodich);
             //  echo $sql4;
             $sql_delete_thanhtoan = oci_parse($con, "DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
             oci_execute($sql_delete_thanhtoan);
         }
         */
 } elseif (isset($_POST['dathang'])) {
     $khachhang_id = $_SESSION['khachhang_id'];
     $total_donhang = $_SESSION['total'];
     unset($_SESSION['total']);
     $sql_get_ttkhachhang = oci_parse($con, "SELECT NAME, ADDRESS, SODONHANG FROM TBL_KHACHHANG WHERE KHACHHANG_ID = '$khachhang_id'");
     oci_execute($sql_get_ttkhachhang);
     $gettkhachhang = oci_fetch_array($sql_get_ttkhachhang);

     $SQL_DEM = oci_parse($con, "SELECT COUNT(SANPHAM_ID) FROM TBL_GIOHANG WHERE KHACHHANG_ID = $khachhang_id");
     $DEM = oci_execute($SQL_DEM);

     $ten = $gettkhachhang['NAME'];
     $diachi = $gettkhachhang['ADDRESS'];
     $sodonhang = $gettkhachhang['SODONHANG'];

     // INSERT DONHANG + CREATE DONHANG_ID
     $donhang_id = $khachhang_id.'DH'.$sodonhang;

     $sql_use_procedure = oci_parse($con, "BEGIN DATHANG('$donhang_id', '$khachhang_id', '$total_donhang', '$ten', '$diachi','$DEM'); END;");
     oci_execute($sql_use_procedure);
     //echo $donhang_id;
     /*
     $sql_insert_donhang = oci_parse($con, "INSERT INTO TBL_DONHANG(DONHANG_ID, KHACHHANG_ID, TENKHACHHANG, DIACHI, TONGTIEN) VALUES ('$donhang_id','$khachhang_id','$ten','$diachi','$total_donhang')");
     oci_execute($sql_insert_donhang);
     // INSERT CHITIETDONHANG
     $sql_get_ttsanpham = oci_parse($con, "SELECT * FROM TBL_GIOHANG WHERE KHACHHANG_ID = '$khachhang_id'");
     oci_execute($sql_get_ttsanpham);

     $count_ttsanpham = oci_num_rows($sql_get_ttsanpham);
     while ($rows_sanpham = oci_fetch_array($sql_get_ttsanpham)) {
         $sql_insert_chitietdonhang = oci_parse($con, "INSERT INTO TBL_CHITIETDONHANG(DONHANG_ID, SANPHAM_ID, SOLUONG, SANPHAM_GIA) VALUES ('$donhang_id', '$rows_sanpham[SANPHAM_ID]', '$rows_sanpham[SOLUONG]','$rows_sanpham[GIAKHUYENMAI]')");
         oci_execute($sql_insert_chitietdonhang);
     }
     // DELETE GIO HANG

     $sql_delete_giohang = oci_parse($con, "DELETE FROM TBL_GIOHANG WHERE KHACHHANG_ID = '$khachhang_id'");
     oci_execute($sql_delete_giohang);

     // UPDATE SODONHANG
     $sql_update_sodonhang = oci_parse($con, "UPDATE TBL_KHACHHANG SET SODONHANG = SODONHANG +1  WHERE KHACHHANG_ID = '$khachhang_id'");
     oci_execute($sql_update_sodonhang);*/
     echo '<script>alert("Đặt hàng thành công")</script>';
 }

?>

<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng
			</h3>
            
			
			<?php if (isset($_SESSION['dangnhap_home'])) {
    $id_kh = $_SESSION['khachhang_id'];
    echo '<p style="color:#000;">Xin chào bạn: '.$_SESSION['dangnhap_home'].'<a href="index.php?quanly=giohang&dangxuat=1">Đăng xuất</a></p>'; ?>
			<!-- //tittle heading -->
			<div class="checkout-right">
			<?php
            $sql_lay_giohang = oci_parse($con, "SELECT * FROM tbl_giohang where khachhang_id = '$id_kh'");
    oci_execute($sql_lay_giohang); ?>

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
    while ($row_fetch_giohang = oci_fetch_array($sql_lay_giohang)) {
        $subtotal = $row_fetch_giohang['SOLUONG'] * $row_fetch_giohang['GIAKHUYENMAI'];
        $total += $subtotal;
        ++$i; ?>
							<tr class="rem1">
								<td class="invert"><?php echo $i; ?></td>
								<td class="invert-image">
									<a href="?quanly=chitietsp&id=<?php echo $row_fetch_giohang['SANPHAM_ID']; ?>">
										<img src="images/<?php echo $row_fetch_giohang['IMAGE']; ?>" alt=" " style =""  class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="hidden" name="product_id[]" value="<?php echo $row_fetch_giohang['SANPHAM_ID']; ?>">
									<input type="number" min="1" name="soluong[]" value="<?php echo $row_fetch_giohang['SOLUONG']; ?>">
								
									
								</td>
								<td class="invert"><?php echo $row_fetch_giohang['TENSANPHAM']; ?></td>
								<td class="invert"><?php echo number_format($row_fetch_giohang['GIAKHUYENMAI']).'vnđ'; ?></td>
								<td class="invert"><?php echo number_format($subtotal).'vnđ'; ?></td>
								<td class="invert">
									<a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['SANPHAM_ID']; ?>">Xóa</a>
								</td>
							</tr>
							<?php
    } ?>
							<tr>
								<td colspan="7">Tổng tiền : <?php echo number_format($total).'vnđ';
    $_SESSION['total'] = $total; ?></td>

							</tr>
							<tr>
								<td colspan="7"><input type="submit" class="btn btn-success" value="Cập nhật giỏ hàng" name="capnhatsoluong">
<?php $id_khachhang = $_SESSION['khachhang_id'];
    $sql_giohang_select = oci_parse($con, "SELECT * FROM tbl_giohang where khachhang_id = '$id_khachhang'");
    oci_execute($sql_giohang_select);
    oci_fetch_array($sql_giohang_select);
    $count_giohang_select = oci_num_rows($sql_giohang_select);

    if (isset($_SESSION['dangnhap_home']) && $count_giohang_select > 0) {
        while ($row_1 = oci_fetch_array($sql_giohang_select)) {
            ?>
								
				<input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['SANPHAM_ID']; ?>">
				<input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['SOLUONG']; ?>">
<?php
        } ?>
				<input type="submit" class="btn btn-primary" value="Đặt hàng" name="dathang">
<?php
    } ?>
								
								</td>
							
							</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
            <?php
} ?>
			<?php
            if (!isset($_SESSION['dangnhap_home'])) {
                ?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Thêm thông tin khách hàng</h4>
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
										<textarea style="resize: none;" class="form-control" placeholder="Ghi chú" name="note" ></textarea>  
									</div>
									<div class="controls form-group">
										<select class="option-w3ls" name="giaohang">
											<option>Chọn hình thức giao hàng</option>
											<option value="1">Thẻ ATM</option>
											<option value="0">Thanh toán khi nhận hàng</option>
											

										</select>
									</div>
								</div>
								
								<input type="submit"  name="themthongtin" class="btn btn-success" style="width: 20%" value="Thêm thông tin">
								
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