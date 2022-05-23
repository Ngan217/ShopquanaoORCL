<?php
	if(isset($_POST['search_button'])){

	$tukhoa = $_POST['search_product'];
	
		
	$sql_product = oci_parse($con,"SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");		
    oci_execute($sql_product);
	$title = $tukhoa;
	}		
	?> 
<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Từ khóa tìm kiếm : <?php echo $title ?></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php
								while($row_sanpham = oci_fetch_array($sql_product)){ 
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sanpham['SANPHAM_IMAGE'] ?>"width="150" height="150" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['SANPHAM_ID'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['SANPHAM_ID'] ?>"><?php echo $row_sanpham['SANPHAM_NAME'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['SANPHAM_GIAKHUYENMAI']).'vnđ' ?></span>
												<del><?php echo number_format($row_sanpham['SANPHAM_GIA']).'vnđ' ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['SANPHAM_NAME'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['SANPHAM_ID'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['SANPHAM_GIA'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['SANPHAM_IMAGE'] ?>" />
													<input type="hidden" name="soluong" value="1" />			
													<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
								} 
								?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->