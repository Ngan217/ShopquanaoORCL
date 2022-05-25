<?php
    if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
        $huydon = $_GET['huydon'];
        $magiaodich = $_GET['magiaodich'];
    } else {
        $huydon = '';
        $magiaodich = '';
    }
    /*
    $sql_update_donhang = oci_parse($con, "UPDATE tbl_donhang SET huydon='$huydon' WHERE mahang='$magiaodich'");
    oci_execute($sql_update_donhang);
    $sql_update_giaodich = oci_parse($con, "UPDATE tbl_giaodich SET huydon='$huydon' WHERE magiaodich='$magiaodich'");
    oci_execute($sql_update_giaodich);*/
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
                                    echo 'Khách hàng : '.$_SESSION['dangnhap_home'];
                                }
                                ?>
							<div class="col-md-12">
								
								<?php
                                if (isset($_GET['khachhang'])) {
                                    $id_khachhang = $_GET['khachhang'];
                                } else {
                                    $id_khachhang = '';
                                }
                                $sql_select = oci_parse($con, "SELECT * FROM TBL_DONHANG WHERE KHACHHANG_ID='$id_khachhang'");
                                oci_execute($sql_select);
                                ?> 
								<table class="table table-bordered " style="width:100%;">
									<tr>
										<th>Thứ tự</th>
										<th>Mã đơn hàng</th>
										<th>Ngày đặt hàng</th>
										<th>Tổng tiền</th>
										<th>Tình trạng đơn hàng</th>
										<th>Chi tiết đơn hàng</th>
										<th>Hủy đơn</th>
										
									</tr>
									<?php
                                    $i = 0;
                                    while ($row_donhang = oci_fetch_array($sql_select)) {
                                        ++$i; ?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['DONHANG_ID']; ?></td>
									
										
										<td><?php echo $row_donhang['NGAYDATHANG']; ?></td>
										<td><?php echo number_format($row_donhang['TONGTIEN']).'vnđ'; ?></td>
										
										<td><?php if ($row_donhang['TINHTRANG'] == 0) {
                                            echo 'Đang chờ xử lý';
                                        } elseif ($row_donhang['TINHTRANG'] == 1) {
                                            echo 'Đã xử lý | Đang giao hàng';
                                        } elseif ($row_donhang['TINHTRANG'] == 2) {
                                            echo 'Đã giao hàng';
                                        } else {
                                            echo 'Đã hủy';
                                        } ?></td>
										<td>
											<a href="index.php?quanly=xemdonhang&khachhang=<?php echo $_SESSION['khachhang_id']; ?>&donhang_id=<?php echo $row_donhang['DONHANG_ID']; ?>">Xem</a> 	
										</td>
										<td>
										<?php if ($row_donhang['TINHTRANG'] == 0) { ?>
                                            <a href="index.php?quanly=huydon&khachhang=<?php echo $_SESSION['khachhang_id']; ?>&donhang_id=<?php echo $row_donhang['DONHANG_ID']; ?>">Hủy Đơn</a> 
                                        <?php } ?>
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
                                if (isset($_GET['donhang_id'])) {
                                    $id_donhang = $_GET['donhang_id'];
                                    $sql_select = oci_parse($con, "SELECT * FROM tbl_chitietdonhang WHERE donhang_id = '$id_donhang'");
                                    oci_execute($sql_select);
                                    unset($_SESSION['donhang_id']);
                                    echo 'Đơn hàng'.' '.$id_donhang; ?> 
								
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
                                    while ($row_donhang = oci_fetch_array($sql_select)) {
                                        ++$i;
                                        $ID = $row_donhang['SANPHAM_ID'];
                                        $sql_get_tensp = oci_parse($con, "SELECT SANPHAM_NAME, SANPHAM_IMAGE FROM TBL_SANPHAM WHERE SANPHAM_ID = '$ID'");
                                        oci_execute($sql_get_tensp);
                                        $row_sanpham = oci_fetch_array($sql_get_tensp); ?> 
									<tr>
										<td><?php echo $i; ?></td>
										
										<td><?php echo $row_donhang['SANPHAM_ID']; ?></td>
										<td><img src="images/<?php echo $row_sanpham['SANPHAM_IMAGE']; ?>" alt=" " style ="height:120px"  class=""></td>
										
									
										<td><?php echo $row_sanpham['SANPHAM_NAME']; ?></td>

										<td><?php echo $row_donhang['SOLUONG']; ?></td>
										
										<td><?php echo $row_donhang['SANPHAM_GIA']; ?></td>
									
										
									</tr>
									 <?php
                                    } ?> 
								</table>
								<?php
                                }?>
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