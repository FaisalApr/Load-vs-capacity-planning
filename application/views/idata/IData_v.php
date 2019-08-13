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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/Year-Picker/yearpicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css"> 
	<style>
		i {
		  font-size:30px;
		  position: absolute;
		  padding-top: 22px;
		  padding-left: -10px;
		}
	</style>
<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" style="margin-top: -15px;">
	 			
	<!-- Container  Start -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="min-height: 600px;">
			<div class="pull-left">
				<h5 class="text-blue" style="font-size: 32px">Data Plan Production</h5> 	
			</div>
			<br><br><br>

			<div class="row">
					<div class="dropdown" style="margin-left: 15px;">  
						<div class="input-group custom input-group-sm"> 
							<div style="margin-top: -5px; font-size: 30px">Carline :&nbsp </div>
							<select class="select2 js-states form-control" id="select_carline" name="select_carline" style="width: 150px; ">  	
							</select> 
						</div>
					</div>

					<div class="dropdown" style="margin-left: 35px;">  
						<div class="input-group custom input-group-sm"> 
							<div style="margin-top: -5px; font-size: 30px">Line :&nbsp </div>
							<select class="select2 js-states form-control" id="select_lin" name="select_lin" style="width: 100px; ">  	
							</select> 
						</div>
					</div>
					<div class="dropdown" style="margin-left: 30px;">  
						<div class="input-group custom input-group-sm"> 
							<div style="margin-top: -5px; font-size: 30px">Shift : &nbsp</div>
							<select class="select2 js-states form-control" id="select_shif" name="select_shif" style="width: 100px; ">  
							</select> 
						</div>
					</div> 
			</div>
			<div class="pull-right" style="margin-top: -80px;margin-right: 10px"> 
				<div >
					<label style="font-size: 42px;cursor:pointer;" class="text-blue yearpicker" id="period"></label>
					<label class="text-blue" style="font-size: 24px; margin-left: -3px;" id="period2"></label>
				</div> 
			</div>
			 
			<table class="table table-bordered table-hover table-responsive">
				<thead class="thead-light">
					<tr>
						<th style="width: 13%;">
							<select class="form-control" id="item_view" multiple data-actions-box="true" data-selected-text-format="count" data-width="auto">
								<option value="0">MP DL/SHIFT</option>
								<option value="1">MP IDL/SHIFT</option>
								<option value="2">OT</option>
								<option value="3">PLAN EFFICIENCY (%)</option> 
								<option value="4">MP BUFFER</option>
								<option value="5">DOWNTIME</option>
								<option value="6">ATTENDANCE</option>
								<option value="7">WORKING DAYS</option>
								<option value="8">MONTHLY ORDER</option>   
								<option value="9">UMH /SHIFT</option>  
								<option value="10">EXCL TIME</option>
							</select>
						</th>

						<th style="width: 7%">Juli</th>
						<th style="width: 7%">Agustus</th>
						<th style="width: 7%">September</th>
						<th style="width: 7%">Oktober</th>
						<th style="width: 7%">November</th>
						<th style="width: 7%">Desember</th>
						<th style="width: 7%">Januari</th>
						<th style="width: 7%">Februari</th>
						<th style="width: 7%">Maret</th>
						<th style="width: 7%">April</th>
						<th style="width: 7%">Mei</th>
						<th style="width: 7%">Juni</th>
					</tr>
				</thead>
				<tbody id="tbody_data">
					

				</tbody>
			</table>
		</div>
	<!-- Container  End -->
 				
	</div>	
</div>

<!-- START KUMPULAN MODAL  -->
	<div>
		<!-- START INPUT MP DL -->
			<div class="modal fade" id="i_detail_dl_modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detail komposisi MP DL</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<form id="form_DL">
						<div class="modal-body">
							<!-- row pertama -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Housing + BT</label>
											<input class="form-control num" type="number" id="i_housing_bt"  >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Insert Plug</label>
											<input class="form-control num" type="number" id="i_insert" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Setting</label>
											<input class="form-control num" type="number" id="i_setting" >
										</div>
									</div>
								</div>
							<!-- row kedua -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Taping</label>
											<input class="form-control num" type="number" id="i_tapping" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>SP</label>
											<input class="form-control num" type="number" id="i_sp" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Offline</label>
											<input class="form-control num" type="number" id="i_offline" >
										</div>
									</div>
								</div>
							<!-- row ketiga -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Grommet</label>
											<input class="form-control num" type="number" id="i_grommet" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Housing/CK A/B</label>
											<input class="form-control num" type="number" id="i_housing_ck" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Checker + GRI</label>
											<input class="form-control num" type="number" id="i_checker" >
										</div>
									</div>
								</div>
							 <!-- row ketiga -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Dimcheck + Sig</label>
											<input class="form-control num" type="number" id="i_dimcheck" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Vis</label>
											<input class="form-control num" type="number" id="i_vis" >
										</div>
									</div>
									<div class="col-md-4">
											<label style="font-size: 18px"> Total MP: </label> <br>
											<div style="margin-left: 30px; margin-top: -10px" >
												<i class="fa fa-users fa-lg" aria-hidden="true"></i>
												<label class="text-blue" style="font-size: 40px;" id="cost" class="cost">&nbsp&nbsp&nbsp0</label>
											</div>
											<input class="form-control" id="id_lcp" type="hidden">
											<input id="working_id" type="hidden">
											<input type="hidden" id="id_mid">
									</div>
								</div>


						</div>
						</form>
						<div class="modal-footer">
							<button type="button" id="btn_submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		<!-- END INPUT MP DL -->

		<!-- START INPUT MP IDL -->
			<div class="modal fade" id="i_detail_idl_modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detail komposisi MP IDL</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<form id="form_IDL">
						<div class="modal-body">
							<!-- row pertama -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>TPO</label>
											<input class="form-control num2" type="number" id="i_tpo"  >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Material Supply</label>
											<input class="form-control num2" type="number" id="i_material_supply" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Circuit Supply</label>
											<input class="form-control num2" type="number" id="i_circuit_Supply" >
										</div>
									</div>
								</div>
							<!-- row kedua -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Supply Fuse</label>
											<input class="form-control num2" type="number" id="i_supply_fuse" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Chorobiki A/B</label>
											<input class="form-control num2" type="number" id="i_chorobiki" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>PIC Repair</label>
											<input class="form-control num2" type="number" id="i_pic_repair" >
										</div>
									</div>
								</div>
							<!-- row ketiga -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Tanoko Ass</label>
											<input class="form-control num2" type="number" id="i_tanoko_ass" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Tanoko Insp</label>
											<input class="form-control num2" type="number" id="i_tanoko_insp" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>GL Ass</label>
											<input class="form-control num2" type="number" id="i_gl_ass" >
										</div>
									</div>
								</div>
							<!-- row keempat -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>GL Insp</label>
											<input class="form-control num2" type="number" id="i_gl_insp" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Line Leader</label>
											<input class="form-control num2" type="number" id="i_line_leader" >
										</div>
									</div>
									<div class="col-md-4">
											<label style="font-size: 18px"> Total MP: </label> <br>
											<div style="margin-left: 30px; margin-top: -10px" >
												<i class="fa fa-users fa-lg" aria-hidden="true"></i>
												<label class="text-blue" style="font-size: 40px;" id="cost2" class="cost2">&nbsp&nbsp&nbsp0</label>
											</div>
											<input class="form-control" id="id_lcp2" type="hidden">
									</div>
								</div>


						</div>
						</form>
						<div class="modal-footer">
							<button type="button" id="btn_submit2" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		<!-- END INPUT MP IDL -->

		<!-- START INPUT MP DL PA -->
			<div class="modal fade" id="mp_dl_pa_modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detail komposisi MP DL Pre Assy</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<form id="form_DL_pa">
						<div class="modal-body">
							<!-- row pertama -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Cutting</label>
											<input class="form-control num3" type="number" id="i_cutting">
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Midle</label>
											<input class="form-control num3" type="number" id="i_midle">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Manual</label>
											<input class="form-control num3" type="number" id="i_manual" >
										</div>
									</div>
								</div>
							<!-- row kedua -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Twist</label>
											<input class="form-control num3" type="number" id="i_twist" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Shield</label>
											<input class="form-control num3" type="number" id="i_shield">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Acc</label>
											<input class="form-control num3" type="number" id="i_acc" >
										</div>
									</div>
								</div>
							<!-- row ketiga -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Bonder</label>
											<input class="form-control num3" type="number" id="i_bonder" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Raycham</label>
											<input class="form-control num3" type="number" id="i_raycham">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Joint</label>
											<input class="form-control num3" type="number" id="i_joint">
										</div>
									</div>
								</div>
							<!-- row keempat -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>HV</label>
											<input class="form-control num3" type="number" id="i_hv">
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>End Strip</label>
											<input class="form-control num3" type="number" id="i_end_strip">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label style="font-size: 18px"> Total MP: </label> <br>
											<div style="margin-left: 30px; margin-top: -10px" >
												<i class="fa fa-users fa-lg" aria-hidden="true"></i>
												<label class="text-blue" style="font-size: 40px;" id="cost3" class="cost3">&nbsp&nbsp&nbsp0</label>
											</div>
											
											<input class="form-control" id="id_lcp3" type="hidden">
										</div>
									</div>
									
									<!-- <div class="col-md-4">
										<div class="form-group">
											
										</div>	
									</div> -->
									
								</div>
						</div>
						</form>
						<div class="modal-footer">
							<button type="button" id="btn_submit3" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		<!-- END INPUT MP DL PA-->

		<!-- START INPUT MP IDL PA -->
			<div class="modal fade" id="mp_idl_pa_modal">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Detail komposisi MP IDL</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
						</div>
						<form id="form_IDLPA">
						<div class="modal-body">
							<!-- row pertama -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Line Leader</label>
											<input class="form-control num4" type="number" id="i_line_lead"  >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Group leader</label>
											<input class="form-control num4" type="number" id="i_group_leader" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>inspector</label>
											<input class="form-control num4" type="number" id="i_inspector" >
										</div>
									</div>
								</div>
							<!-- row kedua -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Bundling</label>
											<input class="form-control num4" type="number" id="i_bundling" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>CSU</label>
											<input class="form-control num4" type="number" id="i_csu" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Tanoko Ass</label>
											<input class="form-control num4" type="number" id="i_tanoko_as" >
										</div>
									</div>
								</div>
							<!-- row ketiga -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Tanoko Insp</label>
											<input class="form-control num4" type="number" id="i_tanoko_ins" >
										</div>	
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Sao Bonder</label>
											<input class="form-control num4" type="number" id="i_sao_bonder" >
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Helper Cuting</label>
											<input class="form-control num4" type="number" id="i_helper_cuting" >
										</div>
									</div>
								</div>
							<!-- row keempat -->
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>chorobiki</label>
											<input class="form-control num4" type="number" id="i_chorobik" >
										</div>	
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<label style="font-size: 18px"> Total MP: </label> <br>
											<div style="margin-left: 30px; margin-top: -10px" >
												<i class="fa fa-users fa-lg" aria-hidden="true"></i>
												<label class="text-blue" style="font-size: 40px;" id="cost4" class="cost4">&nbsp&nbsp&nbsp0</label>
											</div>

										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
											<input class="form-control" id="id_lcp4" type="hidden">
										</div>	
									</div>
								</div>


						</div>
						</form>
						<div class="modal-footer">
							<button type="button" id="btn_submit4" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		<!-- END INPUT MP IDL PA -->
		
	</div>
<!-- END KUMPULAN MODAL -->


	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/Year-Picker/yearpicker.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  

	<script type="text/javascript">
		$('document').ready(function(){
			//Var Core
				const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
				var periode = [6,7,8,9,10,11,0,1,2,3,4,5];
				const item = [
								{name:'MP DL/SHIFT',val: 'mp_dl', view: true},
								{name:'MP IDL/SHIFT',val: 'mp_idl', view: true}, 
								{name:'OT HOURS',val: 'ot_hours', view: true},
								{name:'PLAN EFFICIENCY (%)',val: 'efficiency', view: true},
								{name:'MP BUFFER',val: 'mpbuffer', view: true},
								{name:'DOWNTIME',val: 'downtime', view: true},
								{name:'ATTENDANCE',val: 'attendance', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},  
								{name:'UMH /SHIFT',val: 'umh_shift', view: true},   
								{name:'EXCL TIME',val: 'exc_time', view: true}
							]; 
				var today = new Date();
				var ystart = today.getFullYear();
				var yend = (today.getFullYear()+1);
				var mData = null;
				var PA = false;
				var wh = 7.88;
			// method INIT
				// load Carline
					function loadCarline() { 
						$.ajax({
							async:false,
							type: 'POST',
							url: '<?php echo site_url("Carline/getDataCarline");?>',
							dataType: "JSON",
							data:{ 
							},
							success: function(data){  
								// console.log(data);

								$('#select_carline').empty();
								$('#select_carline').select2({ 
					 				placeholder: 'Pilih Carline ',
					 				minimumResultsForSearch: -1,
					 				data: data
					 			});
							}
						});
					}
				// Load Line
					function loadLine(id) { 
						$.ajax({
							async:false,
							type: 'POST',
							url: '<?php echo site_url("Line/getDataListCarLineHasLine");?>',
							dataType: "JSON",
							data:{ 
								crln:id
							},
							success: function(data){ 
								// console.log('isi line');
								// console.log(data);

								$('#select_lin').empty();
								$('#select_lin').select2({ 
					 				placeholder: 'Pilih Line ',
					 				minimumResultsForSearch: -1,
					 				data: data
					 			});
							}
						});
					}
				// Load Shift
					function loadShift() {
						var data = [{id:1,text: 'A',selected:true},{id:2,text:'B'}]
						$('#select_shif').empty();
						$('#select_shif').select2({ 
			 				placeholder: 'Pilih Line ',
			 				minimumResultsForSearch: -1,
			 				data: data
			 			});
					}
				// select
					$('#item_view').selectpicker({

					});
					$('#item_view').selectpicker('selectAll');

					$('#item_view').on('hide.bs.select', function (e, clickedIndex, isSelected, previousValue) {
					  	// do something...
					  	var sel = $('#item_view').val();
					  	
					  	item.forEach(function(entry) {
						    entry.view = false;
						});

					  	for (var x = 0; x < sel.length; x++) {
				  			item[sel[x]].view = true;
				  		}

					  	getDataPeriode($('#select_lin').val(), $('#select_shif').val());
					});
 
			// Trigger
				// select carline
					$('#select_carline').on('select2:select',function(e){
						var data = e.params.data;
						// console.log(data); 
						loadLine(data.id);
						getDataPeriode($('#select_lin').val(), $('#select_shif').val());
					});
				// select Line
					$('#select_lin').on('select2:select',function(e){
						var data = e.params.data;
						// console.log(data);
						PA = false;  
						if (data.text=='PA') {
							PA = true;
						}
						getDataPeriode($('#select_lin').val(), $('#select_shif').val());
					});
				// select Line
					$('#select_shif').on('select2:select',function(e){
						var data = e.params.data;
						// console.log(data);  
						getDataPeriode($('#select_lin').val(), $('#select_shif').val());
					});
				// Picker Year
					$('.yearpicker').yearpicker({ 
					  autoHide: true, 
					  year: today.getFullYear(), 
					  startYear: 2002,
					  endYear: null
					}); 

					document.getElementById('period').innerHTML= today.getFullYear();
					document.getElementById('period2').innerHTML= '-'+(today.getFullYear()+1)
					$('.yearpicker-container').on('click','.yearpicker-items,.yearpicker-prev,.yearpicker-next',function(){ 
						// ganti tulisan setelah 8ms
						setTimeout(explode, 8);
					}); 
					$('.yearpicker-container').on('click','.yearpicker-items',function(){
						// console.log('ganti: '+$(this).html() );
						ystart = $(this).html();
						yend = Number($(this).html())+1; 
						// refresh
						getDataPeriode( $('#select_lin').val(), $('#select_shif').val() );  
					});   
					function explode(){
					  document.getElementById('period').innerHTML= $('.yearpicker').html();
					  document.getElementById('period2').innerHTML= '-'+(Number($('.yearpicker').html())+1);
					}


			// Autoload
			loadCarline();
			loadLine( $('#select_carline').val() );
			loadShift();  
			getDataPeriode( $('#select_lin').val(), $('#select_shif').val() );  

			// refresh mData
			function ref(){
				$.ajax({
						async : false,
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/IData/getIData",
	                    dataType : "JSON",
	                    data : { 
	                    	id_lstcrln:$('#select_lin').val(),
	                    	shift:$('#select_shif').val(),
	                    	ystart:ystart,
	                    	yend: yend
	                    },
	                    success: function(data){
	                    	mData = data;
	                    }
	            });

			}

			// Show Data
				function getDataPeriode(lin,sf) {
					

					if (lin==null) {
						return;
					}

					$.ajax({

	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/IData/getIData",
	                    dataType : "JSON",
	                    data : { 
	                    	id_lstcrln:lin,
	                    	shift:sf,
	                    	ystart:ystart,
	                    	yend: yend
	                    },
	                    success: function(data){
	                    	mData = data;
	                    	// console.log('isi');
	                    	console.log(data);

	                    	$("#tbody_data").html('');
	                    	
	                    	// mengulang kebawah sebanyak item
	                    	for (var y = 0; y < item.length; y++) {

	                    		if (item[y].view ==true) { 

		                    		var tr = $('<tr>').append(
		                    						$('<th>').text(item[y].name)
		                    					);   
		                    		// mengulang sebanyak Periode
		                    		for (var i = 0; i < periode.length; i++) {
		                    			// var data
		                    			var tmp_html='';
		                    			var id =0,val=0,mid=0;
		                    			var col = ''; 
		                    			var kom_dl = [];
		                    			var kom_idl = [];
		                    			var kom_dl_pa = [];
		                    			var kom_idl_pa = [];

		                    				for (var x = 0; x < data.length; x++) { 

		                    					var tgl = new Date(data[x].tanggal);
		                    					// Jika bulan sama  maka ada data 
		                    					if (tgl.getMonth()==periode[i]) {

		                    						if ( item[y].val=='efficiency' ) { 
		                    							tmp_html = data[x][item[y].val]+'%';
		                    							if (parseFloat(data[x][item[y].val])%1 !=0) { //jika tidak koma
		                    								tmp_html = parseFloat(data[x][item[y].val]).toFixed(2)+'%';
		                    							}
		                    						}else if( item[y].val=='order_monthly' || item[y].val=='umh_shift' ||item[y].val=='exc_time' ){ 
		                    							tmp_html = data[x][item[y].val];
		                    							if (parseFloat(data[x][item[y].val])%1 !=0) { //jika tidak koma
		                    								tmp_html = parseFloat(data[x][item[y].val]).toFixed(2);
		                    							}
		                    						}else{
		                    							tmp_html = data[x][item[y].val];
		                    						} 

		                    						// get data 
		                    						id = data[x].id;
		                    						val = data[x][item[y].val];
		                    						col = item[y].val; 
		                    						mid = x;
		                    						kom_dl = data[x].kom_dl;
		                    						kom_idl = data[x].kom_idl;
		                    						kom_dl_pa = data[x].kom_dl_pa;
		                    						kom_idl_pa = data[x].kom_idl_pa;
		                    					}

		                    				}      	

		                    			if (col=='') {col = item[y].val;}
		                    			if(col=='umh_shift' || col=='order_monthly' || col=='exc_time'){
		                    				tr.append(
		                    						$(`<td class='' data-kom_idl_pa='`+JSON.stringify(kom_idl_pa)+`' data-kom_dl_pa='`+JSON.stringify(kom_dl_pa)+`' data-kom_idl='`+JSON.stringify(kom_idl)+`' data-kom_dl='`+JSON.stringify(kom_dl)+`' data-id='`+id+`' data-col='`+col+`' data-periode_bln='`+periode[i]+`' data-val='`+val+`' data-mid='`+mid+`'>`).text(tmp_html)
			                    			 	);
		                    			}else{
		                    				tr.append(
		                    						$(`<td class='inner' data-kom_idl_pa='`+JSON.stringify(kom_idl_pa)+`' data-kom_dl_pa='`+JSON.stringify(kom_dl_pa)+`' data-kom_idl='`+JSON.stringify(kom_idl)+`' data-kom_dl='`+JSON.stringify(kom_dl)+`' data-id='`+id+`' data-col='`+col+`' data-periode_bln='`+periode[i]+`' data-val='`+val+`' data-mid='`+mid+`'>`).text(tmp_html)
			                    			 	);	
		                    			}
		                    			 	
			                    	}

			                    	tr.appendTo('#tbody_data');
			                    }

	                    	}   

	                      }
	                  });
				} 


			// Update val
			    $("#tbody_data").on('dblclick','.inner',function (e) {
			        e.stopPropagation();
			        var currentEle = $(this);
			        var value = $(this).data('val'); 
			        var id = $(this).data('id');
			        var col = $(this).data('col');
			        var mid = $(this).data('mid'); 
			        var bln = $(this).data('periode_bln');
			        var kom_dl = $(this).data('kom_dl');
			        var kom_idl = $(this).data('kom_idl');
			        var kom_dl_pa = $(this).data('kom_dl_pa');
			        var kom_idl_pa = $(this).data('kom_idl_pa');
			        console.log('id data: '+id+' col: '+col +'| bln: '+bln+'|mid: '+mid);
			        // console.log(kom_dl);
			        console.log(kom_idl);
				    // console.log(kom_dl_pa);
				    // console.log(kom_idl_pa);
			        if (id == 0) {
			        	Swal.fire({
			        		title:'Data Tidak Tersedia',
			        		text:'Silahkan Import file PPC dahulu'
			        	});
			        	return;
			        }
			        if(col=='mp_dl'){
			        	if(PA==false){
			        		$('#i_detail_dl_modal').modal('show');
			        		if(kom_dl!=false){
			        			document.getElementById('cost').innerHTML='&nbsp&nbsp&nbsp'+mData[mid].mp_dl;
				        		$('#i_housing_bt').val(kom_dl.housing_bt);
				        		$('#i_insert').val(kom_dl.insert_plug);
				        		$('#i_setting').val(kom_dl.setting);
				        		$('#i_tapping').val(kom_dl.taping);
				        		$('#i_sp').val(kom_dl.sp);
				        		$('#i_offline').val(kom_dl.offline);
				        		$('#i_grommet').val(kom_dl.grommet);
				        		$('#i_housing_ck').val(kom_dl.housing_ck);
				        		$('#i_checker').val(kom_dl.checker_gri);
				        		$('#i_dimcheck').val(kom_dl.dimchecker_sig);
				        		$('#i_vis').val(kom_dl.vis);
			        		}
			        		$('#id_lcp').val(id);
			        	}else{
			        		$('#mp_dl_pa_modal').modal('show');
			        		if(kom_dl_pa!=false){
			        			document.getElementById('cost3').innerHTML='&nbsp&nbsp&nbsp'+mData[mid].mp_dl;
				        		$('#i_cutting').val(kom_dl_pa.cutting);
				        		$('#i_midle').val(kom_dl_pa.midle);
				        		$('#i_manual').val(kom_dl_pa.manual);
				        		$('#i_twist').val(kom_dl_pa.twist);
				        		$('#i_shield').val(kom_dl_pa.shield);
				        		$('#i_acc').val(kom_dl_pa.acc);
				        		$('#i_bonder').val(kom_dl_pa.bonder);
				        		$('#i_raycham').val(kom_dl_pa.raycham);
				        		$('#i_joint').val(kom_dl_pa.joint);
				        		$('#i_hv').val(kom_dl_pa.hv);
				        		$('#i_end_strip').val(kom_dl_pa.end_strip);
			        		}
			        		$('#id_lcp3').val(id);
			        	}
			        	

			        	$('#working_id').val( mData[mid].working_days );
			        	
			        	$('#id_mid').val(mid);

			        }else if(col=='mp_idl'){
			        	if(PA==false){
			        		$('#i_detail_idl_modal').modal('show');
			        		if(kom_idl!=false){
				        		document.getElementById('cost2').innerHTML='&nbsp&nbsp&nbsp'+mData[mid].mp_idl;
				        		$('#i_tpo').val(kom_idl.tpo);
				        		$('#i_material_supply').val(kom_idl.material_supply);
				        		$('#i_circuit_Supply').val(kom_idl.circuit_supply);
				        		$('#i_supply_fuse').val(kom_idl.supply_fuse);
				        		$('#i_chorobiki').val(kom_idl.chorobiki);
				        		$('#i_pic_repair').val(kom_idl.pic_repair);
				        		$('#i_tanoko_ass').val(kom_idl.tanoko_ass);
				        		$('#i_tanoko_insp').val(kom_idl.tanoko_insp);
				        		$('#i_gl_ass').val(kom_idl.gl_ass);
				        		$('#i_gl_insp').val(kom_idl.gl_insp);
				        		$('#i_line_leader').val(kom_idl.line_leader);	
			        		}
			        		$('#id_lcp2').val(id);
			        	}else{
			        		$('#mp_idl_pa_modal').modal('show');	
			        		if(kom_idl_pa!=false){
			        			document.getElementById('cost4').innerHTML='&nbsp&nbsp&nbsp'+mData[mid].mp_idl;
				        		$('#i_line_lead').val(kom_idl_pa.line_leader);
				        		$('#i_group_leader').val(kom_idl_pa.group_leader);
				        		$('#i_inspector').val(kom_idl_pa.inspector);
				        		$('#i_bundling').val(kom_idl_pa.bundling);
				        		$('#i_csu').val(kom_idl_pa.csu);
				        		$('#i_tanoko_as').val(kom_idl_pa.tanoko_ass);
				        		$('#i_tanoko_ins').val(kom_idl_pa.tanoko_insp);
				        		$('#i_sao_bonder').val(kom_idl_pa.sao_bonder);
				        		$('#i_helper_cuting').val(kom_idl_pa.helper_cuting);
				        		$('#i_chorobik').val(kom_idl_pa.chorobiki);	
			        		}
			        		$('#id_lcp4').val(id);
			        	}
			        	
			        	
			        }else{
			        	updateVal(currentEle, value, id, col, bln, mid);	
			        }

			    });



			    function updateVal(currentEle, value, id, col, bln, mid) { 
				    $(currentEle).html('<input class="thVal form-control" style="width: 85px;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select();
				    $(".thVal").keyup(function (event) {

				        if (event.keyCode == 13) {
				        	var tgl = '';
				        	var val = $(".thVal").val();
				        	// jika data baru
					        	if (id==0) {
					        		// jika tahun periode bulan dibawah juni 
					        		th = ystart;
					        		if (bln<6) {
					        			th = yend;
					        		} 
					        		tgl = th+'-'+(bln+1)+'-1';
					        		console.log('tgl: '+tgl);
					        	} 

				        	// post data
					        	$.ajax({
					        		async: false,
				                    type : "POST",
				                    url  : "<?php echo site_url(); ?>/IData/updateIData",
				                    dataType : "JSON",
				                    data : { 
				                    	id:id,
				                    	col:col,
				                    	val: val,
				                    	bln:bln,
				                    	lst_cr: $('#select_lin').val(),
				                    	tgl: tgl,
				                    	sif: $('#select_shif').val()
				                    },
				                    beforeSend: function(){
					                	Swal.fire({ 
										    allowEscapeKey: false,
										    allowOutsideClick: false,
										    title: "", 
										    showConfirmButton: false,
										    onOpen: () => {
										      swal.showLoading();
										    }
										  });
					                },
				                    success: function(data){ 
				                    	var idnya = 0;
					                    	if (id==0) {
					                    		idnya = data.id;
					                    	}else{
					                    		idnya = id;
					                    	}

				                    	Swal.close(); 
				                    	if (!data) {
				                    		$(currentEle).html( value );
				                    	}else{
				                    		// sukses
				                    		$(currentEle).html( $(".thVal").val() );  
				                    	}
				                    	ref();
				                    	// cek ini termasuk  
								            if (col=='capacity' || col=='order_monthly') {
								            	// jika yang diedit
								            	var cap = mData[mid].capacity;
								            	var mor = mData[mid].order_monthly;
									            	if (col=='capacity') {
									            		cap = val;
									            	}else if(col=='order_monthly'){
									            		mor = val;
									            	}
									            	console.log(mor+'/'+cap+'*100');
									            	var has = (Number(mor)/Number(cap))*100;
 
								            	// POST
								            		postValue(idnya, 'p_load' , has, bln,tgl); 
								                
								            }else if(col=='ot_hours'|| col=='efficiency'|| col=='mpbuffer'|| col=='downtime'|| col=='attendance'){
												// hitungan

													// var mid = $('#id_mid').val();
													console.log(mid);
													// Jumlah UMH
														var umh = (Number(mData[mid].mp_dl)/100*100)*7.88*Number(mData[mid].working_days);
														console.log('hasil umh: '+umh);
													// umh OT HOURS
														var ot_hours = (umh/wh)*(Number(mData[mid].ot_hours));
														console.log('hasil ot_hours: '+ot_hours);
													// umh MP BUFFER
														var mp_buffer = mData[mid].mpbuffer*wh*mData[mid].working_days*(100/100);
														console.log('hasil mp_buffer: '+mp_buffer);
														// postValue($('#id_lcp').val(), 'mpbuffer' , mp_buffer, '',''); 
													// umh EFFICIENCY
														var umh_eff = umh*((mData[mid].efficiency/100)-1);
														console.log('hasil umh_eff: '+umh_eff);
													// umh DOWNTIME
														var downtime = (mData[mid].downtime*umh)/100;
														console.log('hasil downtime: '+downtime);
														// postValue($('#id_lcp').val(), 'downtime' , downtime, '',''); 
													// umh ATTENDANCE
														var attendance = (mData[mid].attendance/100)*umh;
														console.log('hasil attendance: '+attendance);
													// penambah dan pengurang
														var penambah = umh_eff+mp_buffer+ot_hours;
														var pengurang = downtime+attendance;
													// OT PLAN
														var excl = (7/60)*mData[mid].working_days*2*mData[mid].mp_dl;
														console.log('hasil excl: '+excl);
														postValue($('#id_lcp').val(), 'exc_time' , excl, '',''); 
													// total umh/shift 
														var total_umh = umh+(penambah-pengurang);
														console.log('hasil total: '+total_umh);
														postValue(idnya, 'umh_shift' , total_umh, '','');

												// REFRESH
												getDataPeriode( $('#select_lin').val(), $('#select_shif').val() ); 
												
								            }

				                    }
				                });
 
				            // refersh dat
				            getDataPeriode( $('#select_lin').val(), $('#select_shif').val() );  
				        }
				    });
 					
 					// Focus losss same state value
					    $(".thVal").focusout(function(){
					    	console.log('losss');

					    	if (id == 0) {
					    		$(currentEle).html( '' ); 
					    		return;
					    	}
					    	// jika itu
					    	if (col=='efficiency' || col=='p_load' ) {

								var tmp = parseFloat(value).toFixed(1)+'%';
								$(currentEle).html( tmp ); 
							}else{
								$(currentEle).html( value ); 
							}  
					    });
				}
 			
 			// FUnction POST UPDATE V
	 			function postValue(idnya,col, has, bln,tgl) {
	 				$.ajax({
	            		async: false,
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/IData/updateIData",
	                    dataType : "JSON",
	                    data : { 
	                    	id: idnya,
	                    	col: col,
	                    	val: has,
	                    	bln: bln,
	                    	lst_cr: $('#select_lin').val(),
	                    	tgl: tgl,
	                    	sif: $('#select_shif').val()
	                    },
	                    beforeSend: function(){
		                	Swal.fire({ 
							    allowEscapeKey: false,
							    allowOutsideClick: false,
							    title: "", 
							    showConfirmButton: false,
							    onOpen: () => {
							      swal.showLoading();
							    }
							  });
		                },
	                    success: function(data){ 
	                    	Swal.close();   
	                    	// console.log(data);
	                    }
	                });
	 			}


			//input mp dl
				$('#btn_submit').click(function(){ 
	   				// 
						var housing_bt = Number(document.getElementById("i_housing_bt").value);
						var insert_plug = Number(document.getElementById("i_insert").value);
						var seting = Number(document.getElementById("i_setting").value);
						var taping = Number(document.getElementById("i_tapping").value);
						var sp = Number(document.getElementById("i_sp").value);
						var offline = Number(document.getElementById("i_offline").value);
						var grommet = Number(document.getElementById("i_grommet").value);
						var housing_ck = Number(document.getElementById("i_housing_ck").value);
						var checker_gri = Number(document.getElementById("i_checker").value);
						var dimchecker_sig = Number(document.getElementById("i_dimcheck").value);
						var vis = Number(document.getElementById("i_vis").value); 			
						var total = housing_bt+insert_plug+seting+taping+sp+offline+grommet+housing_ck+checker_gri+dimchecker_sig+vis;

					console.log(total);
					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/IData/newMP",
						dataType : "JSON",
						data : {
							id_lcp : $('#id_lcp').val(),
							housing_bt: housing_bt,
							insert_plug : insert_plug,
							setting : seting,
							taping : taping,
							sp : sp,
							offline : offline,
							grommet : grommet,
							housing_ck : housing_ck,
							checker_gri : checker_gri,
							dimchecker_sig : dimchecker_sig,
							vis : vis,
							total : total
						},
						beforeSend: function(){
		                	Swal.fire({ 
							    allowEscapeKey: false,
							    allowOutsideClick: false,
							    title: "", 
							    showConfirmButton: false,
							    onOpen: () => {
							      swal.showLoading();
							    }
							  });
		                },
						success : function(response){
							Swal.close();
							
							$('#i_detail_dl_modal').modal('hide');
							
							// document.getElementById("form_DL").reset();
						}
					});

					// hitungan
						var mid = $('#id_mid').val();
						// Jumlah UMH
							var umh = (total/100*100)*7.88*$('#working_id').val();
							console.log('hasil umh: '+umh);
						// umh OT HOURS
							var ot_hours = (umh/wh)*(Number(mData[mid].ot_hours));
							console.log('hasil ot_hours: '+ot_hours);
						// umh MP BUFFER
							var mp_buffer = mData[mid].mpbuffer*wh*mData[mid].working_days*(100/100);
							console.log('hasil mp_buffer: '+mp_buffer);
							// postValue($('#id_lcp').val(), 'mpbuffer' , mp_buffer, '',''); 
						// umh EFFICIENCY
							var umh_eff = umh*((mData[mid].efficiency/100)-1);
							console.log('hasil umh_eff: '+umh_eff);
						// umh DOWNTIME
							var downtime = (mData[mid].downtime*umh)/100;
							console.log('hasil downtime: '+downtime);
							// postValue($('#id_lcp').val(), 'downtime' , downtime, '',''); 
						// umh ATTENDANCE
							var attendance = (mData[mid].attendance/100)*umh;
							console.log('hasil attendance: '+attendance);
						// penambah dan pengurang
							var penambah = umh_eff+mp_buffer+ot_hours;
							var pengurang = downtime+attendance;
						// OT PLAN
							var excl = (7/60)*(Number(mData[mid].working_days))*2*total;
							console.log('hasil excl: '+excl);
							postValue($('#id_lcp3').val(), 'exc_time' , excl, '',''); 
						// total umh/shift 
							var total_umh = umh+(penambah-pengurang);
							console.log('hasil total: '+total_umh);
							postValue($('#id_lcp3').val(), 'umh_shift' , total_umh, '','');

					// REFRESH
					getDataPeriode( $('#select_lin').val(), $('#select_shif').val() ); 
					$('#form_DL').trigger('reset');
				});
			//input mp idl
				$('#btn_submit2').click(function(){ 
					var  tpo = Number(document.getElementById("i_tpo").value);
					var  material_supply = Number(document.getElementById("i_material_supply").value);
					var  circuit_supply = Number(document.getElementById("i_circuit_Supply").value);
					var  supply_fuse = Number(document.getElementById("i_supply_fuse").value);
					var  chorobiki = Number(document.getElementById("i_chorobiki").value);
					var  pic_repair = Number(document.getElementById("i_pic_repair").value);
					var  tanoko_ass = Number(document.getElementById("i_tanoko_ass").value);
					var  tanoko_insp = Number(document.getElementById("i_tanoko_insp").value);
					var  gl_ass = Number(document.getElementById("i_gl_ass").value);
					var  gl_insp = Number(document.getElementById("i_gl_insp").value);
					var  line_leader = Number(document.getElementById("i_line_leader").value);
					
					var total = tpo+material_supply+circuit_supply+supply_fuse+chorobiki+pic_repair+tanoko_insp+tanoko_ass+gl_insp+gl_ass+line_leader;
					console.log(total);
					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/IData/newIdl",
						dataType : "JSON",
						data : {
							id_lcp : $('#id_lcp2').val(),
							tpo : tpo,
							material_supply : material_supply,
							circuit_supply : circuit_supply,
							supply_fuse : supply_fuse,
							chorobiki : chorobiki,
							pic_repair : pic_repair,
							tanoko_ass : tanoko_ass,
							tanoko_insp : tanoko_insp,
							gl_ass : gl_ass,
							gl_insp : gl_insp,
							line_leader : line_leader,
							total:total
						},
						success : function(response){
							
							$('#i_detail_idl_modal').modal('hide');
							$('#form_IDL').trigger('reset');
							// document.getElementById("form_DL").reset();
						}
					});
					getDataPeriode( $('#select_lin').val(), $('#select_shif').val() ); 
					// show(id_pdo);
				});
			//input mp dl pa
				$('#btn_submit3').click(function(){ 
	   				// 
						var i_cutting = Number(document.getElementById("i_cutting").value);
						var i_midle = Number(document.getElementById("i_midle").value);
						var i_manual = Number(document.getElementById("i_manual").value);
						var i_twist = Number(document.getElementById("i_twist").value);
						var i_shield = Number(document.getElementById("i_shield").value);
						var i_acc = Number(document.getElementById("i_acc").value);
						var i_bonder = Number(document.getElementById("i_bonder").value);
						var i_raycham = Number(document.getElementById("i_raycham").value);
						var i_joint = Number(document.getElementById("i_joint").value);
						var i_hv = Number(document.getElementById("i_hv").value);
						var i_end_strip = Number(document.getElementById("i_end_strip").value);
						var total = i_cutting+i_midle+i_manual+i_twist+i_shield+i_acc+i_bonder+i_raycham+i_joint+i_hv+i_end_strip;

					console.log(total);
					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/IData/newDlPa",
						dataType : "JSON",
						data : {
							id_lcp : $('#id_lcp3').val(),
							cutting: i_cutting,
							midle : i_midle,
							manual : i_manual,
							twist : i_twist,
							shield : i_shield,
							acc : i_acc,
							bonder : i_bonder,
							raycham : i_raycham,
 							joint : i_joint,
							hv : i_hv,
							end_strip : i_end_strip ,
							total : total
						},
						beforeSend: function(){
		                	Swal.fire({ 
							    allowEscapeKey: false,
							    allowOutsideClick: false,
							    title: "", 
							    showConfirmButton: false,
							    onOpen: () => {
							      swal.showLoading();
							    }
							  });
		                },
						success : function(response){
							Swal.close();
							
							$('#mp_dl_pa_modal').modal('hide');
							
							// document.getElementById("form_DL").reset();
						}
					});

					/// hitungan
						var mid = $('#id_mid').val();
						// Jumlah UMH
							var umh = (total/100*100)*7.88*$('#working_id').val();
							console.log('hasil umh: '+umh);
						// umh OT HOURS
							var ot_hours = (umh/wh)*mData[mid].ot_hours;
							console.log('hasil ot_hours: '+ot_hours);
						// umh MP BUFFER
							var mp_buffer = mData[mid].mpbuffer*wh*mData[mid].working_days*(100/100);
							console.log('hasil mp_buffer: '+mp_buffer);
							// postValue($('#id_lcp').val(), 'mpbuffer' , mp_buffer, '',''); 
						// umh EFFICIENCY
							var umh_eff = umh*((mData[mid].efficiency/100)-1);
							console.log('hasil umh_eff: '+umh_eff);
						// umh DOWNTIME
							var downtime = (mData[mid].downtime/100)*umh;
							console.log('hasil downtime: '+downtime);
							// postValue($('#id_lcp').val(), 'downtime' , downtime, '',''); 
						// umh ATTENDANCE
							var attendance = (mData[mid].attendance/100)*umh;
							console.log('hasil attendance: '+attendance);
						// penambah dan pengurang
							var penambah = umh_eff+mp_buffer+ot_hours;
							var pengurang = downtime+attendance;
						// OT PLAN
							var excl = (7/60)*mData[mid].working_days*2*total;
							console.log('hasil excl: '+excl);
							postValue($('#id_lcp').val(), 'exc_time' , excl, '',''); 
						// total umh/shift 
							var total_umh = umh+(penambah-pengurang);
							console.log('hasil total: '+total_umh);
							postValue($('#id_lcp').val(), 'umh_shift' , total_umh, '','');

					// REFRESH
					getDataPeriode( $('#select_lin').val(), $('#select_shif').val() ); 
					$('#form_DL_pa').trigger('reset');
				});
			//input mp idl pa
				$('#btn_submit4').click(function(){ 
					
					var i_line_lead = Number(document.getElementById("i_line_lead").value);
					var i_group_leader = Number(document.getElementById("i_group_leader").value);
					var i_inspector = Number(document.getElementById("i_inspector").value);
					var i_bundling = Number(document.getElementById("i_bundling").value);
					var i_csu = Number(document.getElementById("i_csu").value);
					var i_tanoko_as = Number(document.getElementById("i_tanoko_as").value);
					var i_tanoko_ins = Number(document.getElementById("i_tanoko_ins").value);
					var i_sao_bonder = Number(document.getElementById("i_sao_bonder").value);
					var i_helper_cuting = Number(document.getElementById("i_helper_cuting").value);
					var i_chorobik = Number(document.getElementById("i_chorobik").value);
					
					var total = i_line_lead+i_group_leader+i_inspector+i_bundling+i_csu+i_tanoko_as+i_tanoko_ins+i_sao_bonder+i_helper_cuting+i_chorobik;
					console.log()
					console.log(total);
					$.ajax({
						async : false,
						type : "POST",
						url : "<?php echo base_url() ?>index.php/IData/newIdlPa",
						dataType : "JSON",
						data : {
							id_lcp : $('#id_lcp4').val(),
							line_leader : i_line_lead,
							group_leader : i_group_leader,
							inspector : i_inspector,
							bundling : i_bundling,
							csu : i_csu,
							tanoko_ass : i_tanoko_as,
							tanoko_insp : i_tanoko_ins,
							sao_bonder : i_sao_bonder,
							helper_cuting : i_helper_cuting,
							chorobiki : i_chorobik,
							total:total 
						},
						success : function(response){

							$('#mp_idl_pa_modal').modal('hide');
							$('#form_IDLPA').trigger('reset');
							// document.getElementById("form_DL").reset();
						}
					});
					getDataPeriode( $('#select_lin').val(), $('#select_shif').val() ); 
					// show(id_pdo);
				});
				// mp dl
					$('.num').on('keyup', function(){
					    var cost = 0;
					    $(".num").each(function(e) {
					        v = parseFloat($(this).val());
					        if(!isNaN(v)) {
					            cost += v;    
					        }
					          
					        document.getElementById('cost').innerHTML="&nbsp&nbsp&nbsp"+cost;
					    });
					});
				// mp idl
					$('.num2').on('keyup', function(){
					    var cost = 0;
					    $(".num2").each(function(e) {
					        v = parseFloat($(this).val());
					        if(!isNaN(v)) {
					            cost += v;    
					        }
					          
					        document.getElementById('cost2').innerHTML="&nbsp&nbsp&nbsp&nbsp"+cost;
					    });
					});
				// mp dl pa
					$('.num3').on('keyup', function(){
					    var cost = 0;
					    $(".num3").each(function(e) {
					        v = parseFloat($(this).val());
					        if(!isNaN(v)) {
					            cost += v;    
					        }
					          
					        document.getElementById('cost3').innerHTML="&nbsp&nbsp&nbsp&nbsp"+cost;
					    });
					});
				// mp idl pa
					$('.num4').on('keyup', function(){
					    var cost = 0;
					    $(".num4").each(function(e) {
					        v = parseFloat($(this).val());
					        if(!isNaN(v)) {
					            cost += v;    
					        }
					          
					        document.getElementById('cost4').innerHTML="&nbsp&nbsp&nbsp&nbsp"+cost;
					    });
					});

		});
	</script>
</body>
</html>