<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		
		<div class="carousel-inner">
			<?php
            // $sql_slider = mysqli_query($con,"SELECT * FROM tbl_slider WHERE slider_active='1' ORDER BY slider_id");
            // while($row_slider = mysqli_fetch_array($sql_slider)){
                $sql_slider = oci_parse($con, "SELECT * FROM tbl_slider WHERE slider_active='1' ORDER BY slider_id");
                oci_execute($sql_slider);
            while ($row_slider = oci_fetch_array($sql_slider)) {
                ?>
			<div class="carousel-item item1 active">
			<img src="images/<?php echo $row_slider['SLIDER_IMAGE']; ?>"  style="width:100% ;height:700px; object-fit: cover;object-position: top;"alt="mysider">
				<div class="container">
				
				</div>
			</div>
			<?php
            }
            ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->