<?php
    // session_destroy();
    // unset('dangnhap');
        if (isset($_POST['dangnhap_home'])) {
            $taikhoan = $_POST['email_login'];
            $matkhau = md5($_POST['password_login']);

            if ($taikhoan == '' || $matkhau == '') {
                echo '<script>alert("Vui lòng điền tài khoản hoặc mật khẩu")</script>';
            } else {
                $sql_select_admin = oci_parse($con, "SELECT * FROM tbl_khachhang WHERE email='$taikhoan' AND password='$matkhau' ORDER BY email");
                // echo $sql_select_admin;
                oci_execute($sql_select_admin);
                $row_dangnhap = oci_fetch_array($sql_select_admin);
                $count = oci_num_rows($sql_select_admin);
                if ($count > 0) {
                    $_SESSION['dangnhap_home'] = $row_dangnhap['NAME'];
                    $_SESSION['khachhang_id'] = $row_dangnhap['KHACHHANG_ID'];

                    header('Location: index.php?quanly=giohang');
                } else {
                    echo '<script>alert("Tài khoản hoặc mật khẩu sai")</script>';
                }
            }
        } elseif (isset($_POST['dangky'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $note = $_POST['note'];
            $address = $_POST['address'];
            $giaohang = $_POST['giaohang'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            //check valid email
            $sql_checkemail = oci_parse($con, "SELECT email FROM tbl_khachhang WHERE email = '$email'");
            oci_execute($sql_checkemail);
            $row_dangky = oci_fetch_array($sql_checkemail);
            $count = oci_num_rows($sql_checkemail);

            if ($count > 0) {
                echo '<script>alert("Email đã được sử dụng")</script>';
            } else {
				
                $sql_khachhang = oci_parse($con, "INSERT INTO tbl_khachhang(name,phone,address,note,email,password,giaohang) values ('$name','$phone','$address','$note','$email','$password','$giaohang')");
                oci_execute($sql_khachhang);


				$sql_select_khachhang = oci_parse($con, "SELECT name,khachhang_id FROM tbl_khachhang WHERE email = '$email'");
                // echo $sql_select_admin;
                oci_execute($sql_select_khachhang);
                $row_dangky = oci_fetch_array($sql_select_khachhang);
                $count1 = oci_num_rows($sql_select_khachhang);
                if ($count1 > 0) {
                    $_SESSION['dangnhap_home'] = $row_dangky['NAME'];
                    $_SESSION['khachhang_id'] = $row_dangky['KHACHHANG_ID'];

                    header('Location: index.php?quanly=giohang');
            }
		}
        } if (isset($_GET['dangxuat'])) {
            $id = $_GET['dangxuat'];
            if ($id == 1) {
                unset($_SESSION['dangnhap_home']);
                header('Refesh:1; url = index.php');
            }
        }

?> 

<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					
				</div>
				<?php
                        if (!isset($_SESSION['dangnhap_home'])) {
                            ?>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>

						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i>  012 3456 7890
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
				<?php
                        }
                ?>

				<?php
                        if (isset($_SESSION['dangnhap_home'])) {
                            ?>
				
					<ul class="text-center border-right text-white" >
						<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id']; ?>" class="text-white">
							<i class="fas fa-truck mr-2"></i>Xem đơn hàng : <?php echo $_SESSION['dangnhap_home']; ?></a>
					</ul>	
					<ul><p>     </p></ul>
					<ul class="text-center text-white">
						<a href="index.php?quanly=giohang&dangxuat=1"># Đăng xuất</a>
					</ul>	
					
				<?php
                        }
                ?>
			</div>
		</div>
	</div>
	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="POST">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
						</div>
						
						<p class="text-center dont-do mt-3">Chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="POST">
						<div class="form-group">
							<label class="col-form-label">Họ tên</label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Phone</label>
							<input type="text" class="form-control" placeholder=" " name="phone"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Address</label>
							<input type="text" class="form-control" placeholder=" " name="address"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
							<input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
						</div>
						<div class="form-group">
							<label class="col-form-label">Ghi chú</label>
							<textarea class="form-control" name="note"></textarea>
						</div>
						
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Đăng ký">
						</div>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->


	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
				
					<h1 class="text-center">
					<img src="images/logo.png" alt=" " class="img-fluid" >
						<a href="index.php" class="font-weight-bold font-italic">
						yame
						</a>
						
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="index.php?quanly=timkiem" method="POST">
								<input class="form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" name="search_button" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="wthreecartaits wthreecartaits2 cart cart box_1">
								<form action="index.php?quanly=giohang" method="post" class="last">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="display" value="1">
									<button class="btn w3view-cart" type="submit" name="submit" value="">
										<i class="fas fa-cart-arrow-down"></i>
									</button>
								</form>
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->