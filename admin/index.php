<?php
	session_start();
 include('../db/connect.php'); 
?>
<?php
	// session_destroy();
	// unset('dangnhap');
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = $_POST['matkhau'];
		
		if($taikhoan=='' || $matkhau ==''){
			echo '<div style="color: red;background-color: black;boder:1px solid black;text-align: center;width: 80%;margin: auto;">Xin nhập đủ</div>';
		}else{
			// $sql_select_admin = oci_parse($con,"SELECT * FROM tbl_admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1");
			// oci_execute($sql_select_admin);
			// $row_dangnhap = oci_fetch_array($sql_select_admin);
			// $count = oci_num_rows($sql_select_admin);
			// if($count>0){
				if($taikhoan == 'admin@gmail.com' && $matkhau =='123456'){
                    
				
				$_SESSION['dangnhap'] = $row_dangnhap['ADMIN_NAME'];
				$_SESSION['admin_id'] = $row_dangnhap['ADMIN_ID'];
				header('Location: dashboard.php');
			
			}
			else{
				echo '<p div style="color: red;background-color: black;boder:1px solid black;text-align: center;width: 80%;margin: auto;">Tài khoản hoặc mật khẩu sai</p>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">
	<style>
		.box{
			height: 60%;
			width: 60%;
			padding: 50px;
			border-radius: 20px;
			box-shadow: 0px 0px 3px 2px #221736;
			z-index: 2;
			background-color: aqua;
			opacity: 0.8;
		}
		input[type='submit']{
			width: 80%;
            margin:0 10%;
		}
		body{
			font-weight: 800;
			font-family: 'Ubuntu', sans-serif;
             width: 100%;
			background: url(../uploads/photo3.jpg) no-repeat 100%;
		}
		.boxx{
			
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<div class="boxx">

		<h2 align="center">Đăng nhập Admin</h2>
		<div class="box" style="border: 1px solid black;margin:auto;">
		<div class="form-group">
			<form action="" method="POST" >
			<label>Tài khoản</label>
			<input type="text" name="taikhoan" placeholder="Điền Email" class="form-control"><br>
			<label>Mật khẩu</label>
			<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control"><br>
			<input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
			</form>
		</div>
		</div>
	</div>
</body>
</html>