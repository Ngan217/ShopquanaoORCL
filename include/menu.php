<?php 
		// $sql_category = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
		$sql_category = oci_parse($con,'SELECT * FROM SYS.tbl_category ORDER BY category_id DESC');
	?>
<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search" border:3px>
					
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php">Trang chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<?php 
							// $sql_category_danhmuc = mysqli_query($con,'SELECT * FROM tbl_category ORDER BY category_id DESC');
							// while($row_category_danhmuc = mysqli_fetch_array($sql_category_danhmuc)){
								$sql_category_danhmuc = oci_parse($con,'SELECT * FROM SYS.tbl_category ORDER BY category_id DESC');
								oci_execute($sql_category_danhmuc);
							while($row_category_danhmuc = oci_fetch_array($sql_category_danhmuc,OCI_BOTH)){
						?>
						<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">

							<a class="nav-link " href="?quanly=danhmuc&id=<?php echo $row_category_danhmuc['CATEGORY_ID'] ?>" role="button"  aria-haspopup="true" aria-expanded="false">
								<?php echo $row_category_danhmuc['CATEGORY_NAME'] ?>
							</a>
							
						</li>
						<?php
						} 
						?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<?php
							// $sql_danhmuctin = mysqli_query($con,"SELECT * FROM tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 
							$sql_danhmuctin = oci_parse($con,"SELECT * FROM SYS.tbl_danhmuc_tin ORDER BY danhmuctin_id DESC"); 
                             oci_execute($sql_danhmuctin);

							?>
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tin tức
							</a>
							<div class="dropdown-menu">
								<?php
								while($row_danhmuctin = oci_fetch_array($sql_danhmuctin)){ 
								?>
								<a class="dropdown-item" href="?quanly=tintuc&id_tin=<?php echo $row_danhmuctin['DANHMUCTIN_ID'] ?>"><?php echo $row_danhmuctin['TENDANHMUC'] ?></a>
								<?php
								} 
								?>
							</div>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->