<?php
    if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
        $huydon = $_GET['huydon'];
        $magiaodich = $_GET['magiaodich'];
    } else {
        $huydon = '';
        $magiaodich = '';
    }
    $sql_update_donhang = oci_parse($con, "UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
    oci_execute($sql_update_donhang);
    $sql_update_giaodich = oci_parse($con, "UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
    oci_execute($sql_update_giaodich);
?>
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						
							<div class="row">
								<?php
                                if (isset($_SESSION['dangnhap_home'])) {
                                    echo 'Đơn hàng : '.$_SESSION['dangnhap_home'];
                                }
                                ?>
							<div class="col-md-12">
								
								<?php
                                if (isset($_GET['khachhang'])) {
                                    $id_khachhang = $_GET['khachhang'];
                                } else {
                                    $id_khachhang = '';
                                }
                                $sql_select = oci_parse($con, "SELECT * FROM tbl_giaodich WHERE tbl_giaodich.khachhang_id='$id_khachhang' /*GROUP BY tbl_giaodich.magiaodich*/");
                                oci_execute($sql_select);
                                ?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
									
										<th>Ngày đặt</th>
										<th>Quản lý</th>
										<th>Tình trạng</th>
										<th>Yêu cầu</th>
									</tr>
									<?php
                                    $i = 0;
                                    while ($row_donhang = oci_fetch_array($sql_select)) {
                                        ++$i; ?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['MAGIAODICH']; ?></td>
									
										
										<td><?php echo $row_donhang['NGAYTHANG']; ?></td>
										<td><a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id']; ?>&magiaodich=<?php echo $row_donhang['MAGIAODICH']; ?>">Xem chi tiết</a></td>
										<td><?php if ($row_donhang['TINHTRANGDON'] == 0) {
                                            echo 'Đã đặt hàng';
                                        } else {
                                            echo 'Đã xử lý | Đang giao hàng';
                                        } ?></td>
										<td>
											<?php
                                            if ($row_donhang['HUYDON'] == 0) {
                                                ?>
											<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id']; ?>&magiaodich=<?php echo $row_donhang['MAGIAODICH']; ?>&huydon=1">Yêu cầu hủy</a>
											<?php
                                            } elseif ($row_donhang['HUYDON'] == 1) {
                                                ?>
											<p>Đang chờ hủy...</p>
											<?php
                                            } else {
                                                echo 'Đã hủy';
                                            } ?>
										</td>
									</tr>
									 <?php
                                    }
                                    ?> 
								</table>
							</div>


							<div class="col-md-12">
								<p>Chi tiết đơn hàng</p><br>
								<?php
                                if (isset($_GET['magiaodich'])) {
                                    $magiaodich = $_GET['magiaodich'];
                                } else {
                                    $magiaodich = '';
                                }

                            $sql_select = oci_parse($con, "SELECT * FROM tbl_giaodich, tbl_khachhang, tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id AND tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND tbl_giaodich.magiaodich='$magiaodich' ORDER BY tbl_giaodich.giaodich_id DESC");
                                oci_execute($sql_select);
                                ?> 
								<table class="table table-bordered ">
									<tr>
										<th>Thứ tự</th>
										<th>Mã giao dịch</th>
										<th>Tên sản phẩm</th>
										<th>Số lượng</th>
										<th>Ngày đặt</th>
										
									</tr>
									<?php
                                    $i = 0;
                                    while ($row_donhang = oci_fetch_array($sql_select)) {
                                        ++$i; ?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['MAGIAODICH']; ?></td>
									
										<td><?php echo $row_donhang['SANPHAM_NAME']; ?></td>

										<td><?php echo $row_donhang['SOLUONG']; ?></td>
										
										<td><?php echo $row_donhang['NGAYTHANG']; ?></td>
									
										
									</tr>
									 <?php
                                    }
                                    ?> 
								</table>
							</div>
							</div>

						
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
			</div>
		</div>
	</div>
	<!-- //top products -->