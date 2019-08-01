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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<style>
		.data_:hover {
		  background-color: white;
		  color: black;
		}
		.data_{
			color: white;
		}
		.simulasi:hover {
		  background-color: white;
		  color: black;
		}
		.simulasi{
			color: white;
		}
	</style>

<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		
		
				
				<!-- basic table  Start -->
					<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
						<div class="pull-left">
							<h5 class="text-blue" style="font-size: 32px">Data Production Meeting</h5> 	
						</div>
						<br><br><br>

						<div class="row">
							
								<div class="dropdown">  
									<div class="input-group custom input-group-sm" style="margin-top: -10px; margin-left: 15px;">
										
										<div style="margin-top: -10px; font-size: 30px">Line :&nbsp </div>
										<select class="select2 js-states form-control" id="select_line" name="select_line" style="width: 100px; "> 
											
										</select> 
									</div>
								</div>
								<div class="dropdown">  
									<div class="input-group custom input-group-sm" style="margin-top: -10px; margin-left: 30px;">
										
										<div style="margin-top: -10px; font-size: 30px">Shift : &nbsp</div>
										<select class="select2 js-states form-control" id="select_line" name="select_line" style="width: 100px; "> 
											
										</select> 
									</div>
								</div>
						</div>
						
						<table class="table table-bordered table-hover">
							<thead>
								<tr style=" background-color: grey">
									<th style="width: 20%"></th>
									<th style="width: 8%">Juli</th>
									<th style="width: 8%">Agustus</th>
									<th style="width: 8%">September</th>
									<th style="width: 8%">Oktober</th>
									<th style="width: 8%">November</th>
									<th style="width: 8%">Desember</th>
									<th style="width: 8%">Januari</th>
									<th style="width: 8%">Februari</th>
									<th style="width: 8%">Maret</th>
									<th style="width: 8%">April</th>
									<th style="width: 8%">Mei</th>
									<th style="width: 8%">Juni</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>MH OUT/SHIFT</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th>MONTHLY ORDER</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								
								<tr>
									<th>EFFICIENCY</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								
								<tr>
									<th>MP DL/SHIFT</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								<tr>
									<th>SHIFT QTY</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								<tr>
									<th>OT HOURS</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								<tr>
									<th>CAPACITY</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								<tr>
									<th>OT PLAN</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
								<tr>
									<th>WORKING DAYS</th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									
								</tr>
							</tbody>
						</table>
					</div>
				<!-- basic table  End -->

					
	</div>	
</div>

<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
</body>
</html>