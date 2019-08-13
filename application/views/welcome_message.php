<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DeskApp Dashboard</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<style> 
		.data_{
			color: white;
		} 
		.simulasi{
			color: white;
		}
		.simulasi:hover {
		  background-color: white;
		  color: black;
		}
		.data_:hover {
		  background-color: white;
		  color: black;
		}
	</style>

<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<center>
		<div class="row">
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 mb-30"> 
				<div  style="margin-top: 50px; margin-right: -50px;">
					<div class="da-card box-shadow" >
						<div class="da-card-photo">
							<img src="<?php echo base_url() ?>assets/vendors/images/Data.png">
							<div class="da-overlay">
								<div class="da-social">
									<a href="<?php echo site_url() ?>/IData" >
										<div class="clearfix data_" style="outline: 2px solid white; vertical-align: center">
											<h3 class="data_" style="padding: 4px">&nbsp Data &nbsp</h3>
										</div>
									</a>
									
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12 mb-30"> 
				<div  style="margin-top: 50px; margin-right: -50px" >
					<div class="da-card box-shadow">
						<div class="da-card-photo">
							<img src="<?php echo base_url() ?>assets/vendors/images/w.png" alt="">
							<div class="da-overlay">
								<div class="da-social">
									<a href="<?php echo site_url() ?>/Simulasi" >
										<div class="clearfix simulasi" style="outline: 2px solid white; vertical-align: center">
											<h3 class="simulasi" style="padding: 4px">&nbsp Simulasi &nbsp</h3>
										</div>
									</a>
									
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>

			<div class="col-lg-2 col-md-6 col-sm-12 mb-30">
				
			</div>
		</div>
		</center>
		

	</div>
</div>

<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
</body>
</html>