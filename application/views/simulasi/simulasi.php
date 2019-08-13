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
	<!-- DATE PICKERS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/month-picker/css/responsive-month-range-picker.css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
	<style type="text/css">
		.sticky_left{
		   position: sticky; 
		   left: 0;
		   background-color: white;
		}
	</style>

<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10" style="margin-top: -15px"> 
		
		
		<div class="pd-5 bg-white border-radius-2 box-shadow mb-10">
			<div class="row" style="margin-top: 18px; margin-bottom: -15px;">

				<div class="dropdown" style="margin-left: 35px;">  
					<div class="input-group custom input-group-sm"> 
						<div style="font-size: 30px; margin-top: -5px;">Carline :&nbsp </div>
						<select style="width: 150px;" class="select2 js-states form-control" id="select_carline" name="select_carline" >  	
						</select> 
					</div>
				</div>
				<div class="dropdown" style="margin-left: 20px;">  
					<div class="input-group custom input-group-sm"> 
						<div style="margin-top: -5px; font-size: 30px">Line :&nbsp </div>
						<select class="select2 js-states form-control" id="select_lin" name="select_lin" style="width: 100px;">  	
						</select> 
					</div>
				</div> 
 
				<div class="" style="margin-left: 50px;">
					<div class="input-group  input-group-sm">
						<label style="margin-top: -5px; font-size: 30px">Range : &nbsp</label>
						<input class="form-control custom month_range" placeholder="Pilih Periode Bulan" id="pilih_monthrange"  type="text" style="width: 250px" value="">
						<div class="input-group-append custom">
							<span class="input-group-text" style="margin-top: -5px"><span class="icon-copy ti-calendar"></span></span>
						</div>
					</div>
				</div>

			</div> 
		</div>
		 
		 
		<!-- CHART -->
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
					<div id="container" style="height: 350px; "></div>
					<br>
				</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
					<div id="container_testing" style="height: 350px; "></div>
					<br>
				</div>	
			</div>
		</div>

		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
 					<table id="thead_act" class="table table-hover table-bordered text-center table-responsive" style="min-height: 550px;">
 						<thead class="thead-light">
 							<tr>
 								<th style="width: 8%" class="sticky_left">
 									<select class="form-control" id="i_view" multiple data-actions-box="true" data-selected-text-format="count" data-width="auto">
 										<option value="0">MP DL/SHIFT</option>
										<option value="1">WORKING DAYS</option>
										<option value="2">MONTHLY ORDER</option>
										<option value="3">CAPACITY</option>
										<option value="4">BALANCE</option> 
										<option value="5">LOAD</option>
										<option value="6">OT PLAN</option>
										<option value="7">OT HOURS</option>
										<option value="8">EFFICIENCY (%)</option>
										<option value="9">MH OUT/SHIFT</option>
										<option value="10">SHIFT QTY</option>
 									</select>
 								</th>
 								
 							</tr>
 						</thead>
 						<tbody id="tbody_actual">
 							
 						</tbody>
 					</table> 
					<br>
						<div class="pull-right" style="margin-bottom: 20px">
							<a class="btn btn-primary" data-toggle="modal" href='#modal_importexcl' style="margin-right: 25px; margin-bottom: 0px">Import File .Xlsx</a>
						</div>
						<br>
				</div>	
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">  
 					<table class="table table-hover table-bordered text-center table-responsive" style="min-height: 600px;">
 						<thead class="thead-light" id="thead_testing">
 							<tr>
 								<th style="width: 8%" class="sticky_left">
 									<select class="form-control" id="item_view" multiple data-actions-box="true" data-selected-text-format="count" data-width="auto">
										<option value="0">MP DL/SHIFT</option>
										<option value="1">WORKING DAYS</option>
										<option value="2">MONTHLY ORDER</option>
										<option value="3">CAPACITY</option>
										<option value="4">BALANCE</option> 
										<option value="5">% LOAD</option>
										<option value="6">OT PLAN</option>
										<option value="7">OT HOURS</option>
										<option value="8">EFFICIENCY (%)</option>
										<option value="9">MP IDL/SHIFT</option>
										<option value="10">EXCL TIME</option>
										<option value="11">% Tot Prod</option>
									</select>
								</th>
								<th class="monn"></th>
 							</tr>
 						</thead>
 						<tbody id="tbody_testing">
 							<tr>
 								<td>jajjaj</td>
 							</tr>
 						</tbody>
 					</table> 
					<br>
				</div>	
			</div>
		</div> 

	</div>
</div>

<!-- modal -->
<div>
	<!-- import file -->
		<div class="modal fade" id="modal_importexcl">
			<div class="modal-dialog modal-dialog-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Import File EXCEL (.Xlsx)</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
					</div>
					<div class="modal-body">
						<form method="post" id="import_form" enctype="multipart/form-data"> 
							<div class="alert alert-warning" role="alert">
								Pastikan Data .Xlsx Yang dimasukkan Sesuai Dengan Format.
								<img src="<?php echo base_url()?>/assets/src/images/format_assycode.png">
							</div>
							<p><label>Select Excel File</label>
							<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
							<br />
							<input type="submit" id="btn_importfil" name="import" value="Import" class="btn btn-info" />
						</form>

					</div> 
				</div>
			</div>
		</div>
	<!-- MODAL TOLTIP -->
		<div class="modal fade" id="cek_mp">
		    <div class="modal-dialog modal-dialog-centered modal-lg"> 
		      <div class="modal-content"> 
		      	<br>
		      	<div style="margin-top: 0px;">
		      		<center> 
		      			<h3 id="head_mp">Man Power</h3>  
		      			<hr style="width: 93%; height:2px; margin-top: 10px; border:none; background-color: #D50000;">
	      			</center> 	
	      			<div class="pull-right" style="margin-right: 30px; margin-top: -60px;">  
						<div class="input-group custom input-group-sm">  
							<div style="font-size: 20px; margin-top: 5px;">Shift :&nbsp </div>
							<select style="width: 100px;" class="select2 js-states form-control" id="select_shiftline" name="select_shiftline" >  	
							</select> 
						</div>
					</div>

		      	</div> 
	      		<div style="min-height: 250px; margin: 30px; margin-top: 0px; margin-bottom: 0px;" >  
	      			<table class="table table-hover table-bordered ">
	      				<tbody style="text-align: left;" class="tb_mp"> 
	      				</tbody> 
	      			</table>
	      		</div> 
	      		<br>
		      </div>
		    </div>
		</div>

</div>
<!-- end modal -->
	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<!-- Spedometer charts -->
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> 
	<!-- DATE PICKER -->
	<script src="<?php echo base_url() ?>assets/src/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- <script src="<?php echo base_url() ?>assets/src/plugins/month-picker/js/plugins.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/month-picker/js/responsive-month-range-picker.js"></script> -->
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>
	
	<script type="text/javascript">
		$('document').ready(function(){
			//Var Core
				const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
				var periode = [6,7,8,9,10,11,0,1,2,3,4,5];
				const item = [
								{name:'MP DL /Shift',val: 'mp_dl', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},
								{name:'CAPACITY',val: 'capacity', view: true}, 
								{name:'BALANCE',val: 'balance', view: true},  
								{name:'% LOAD',val: 'p_load', view: true},
								{name:'OT PLAN /Shift',val: 'ot_plan', view: true},
								// {name:'OT HOURS',val: 'ot_hours', view: true},
								{name:'EFFICIENCY (%)',val: 'efficiency', view: true}, 
								{name:'UMH /SHIFT',val: 'mhout_shift', view: true}, 
								{name:'SHIFT QTY',val: 'shift_qty', view: true}
							];
				const item_prod = [
								{name:'MP DL /SHIFT',val: 'mp_dl', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},
								{name:'CAPACITY',val: 'capacity', view: true},
								{name:'BALANCE',val: 'balance', view: true},  
								{name:'% LOAD',val: 'p_load', view: true},
								// {name:'OT PLAN',val: 'ot_plan', view: true},
								{name:'OT',val: 'ot_hours', view: true}, 
								{name:'EFFICIENCY (%)',val: 'efficiency', view: true}, 
								{name:'MP IDL /SHIFT',val: 'mp_idl', view: true},
								{name:'MP BUFFER',val: 'mpbuffer', view: true},
								{name:'DOWNTIME',val: 'downtime', view: true},
								{name:'ATTENDANCE',val: 'attendance', view: true}, 
								{name:'EXCL TIME',val: 'exc_time', view: true},
								{name:'% Tot Prod',val: 'tot_productivity', view: true}
								// {name:'SHIFT QTY',val: 'shift_qty', view: true},
							]; 
				// Template Modal Labor
					const view_mpdl=[
									[{nama: 'Housing + BT',val: 'housing_bt'},{nama:'Insert Plug	',val:'insert_plug'}],
									[{nama: 'Setting',val: 'setting'},{nama:'Taping',val:'taping'}],
									[{nama: 'SP',val: 'sp'},{nama:'Offline',val:'offline'}],
									[{nama: 'Grommet',val: 'grommet'},{nama:'Housing/Ck A|B',val:'housing_ck'}],
									[{nama: 'Checker + GRI',val: 'checker_gri'},{nama:'Dimcheck + SIG',val:'dimchecker_sig'}],
									[{nama: 'VIS',val: 'vis'},{nama:'Total',val:'total'}]
								];
					const view_mpidl=[
									[{nama: 'TPO',val: 'tpo'},{nama:'Material Supply',val:'material_supply'}],
									[{nama: 'Circuit Supply',val: 'circuit_supply'},{nama:'Supply Fuse',val:'supply_fuse'}],
									[{nama: 'Chorobiki A/B',val: 'chorobiki'},{nama:'PIC Repair',val:'pic_repair'}],
									[{nama: 'Tanoko Ass',val: 'tanoko_ass'},{nama:'Tanoko Insp',val:'tanoko_insp'}],
									[{nama: 'GL Ass',val: 'gl_ass'},{nama:'GL Insp',val:'gl_insp'}],
									[{nama: 'Line Leader',val: 'line_leader'},{nama:'Total',val:'total'}]
								];
					const view_mpdlpa=[
									[{nama: 'Cutting',val: 'cutting'},{nama:'Midle',val:'midle'}],
									[{nama: 'Manual',val: 'manual'},{nama:'Twist',val:'twist'}],
									[{nama: 'Shield',val: 'shield'},{nama:'Acc',val:'acc'}],
									[{nama: 'Bonder',val: 'bonder'},{nama:'Raycham',val:'raycham'}],
									[{nama: 'Joint',val: 'joint'},{nama:'HV',val:'hv'}],
									[{nama: 'End Strip',val: 'end_strip'},{nama:'Total',val:'total'}]
								];
					const view_mpidlpa=[
									[{nama: 'Line Leader',val: 'line_leader'},{nama:'Group leader',val:'group_leader'}],
									[{nama: 'inspector',val: 'inspector'},{nama:'Bundling',val:'bundling'}],
									[{nama: 'CSU',val: 'csu'},{nama:'Tanoko Ass',val:'tanoko_ass'}],
									[{nama: 'Tanoko Insp',val: 'tanoko_insp'},{nama:'Sao Bonder',val:'sao_bonder'}],
									[{nama: 'Helper Cuting',val: 'helper_cuting'},{nama:'chorobiki',val:'chorobiki'}],
									[{nama:'Total',val:'total'}]
								];

				var today =  new Date();
				var ystart='';
				var yend='';
				var mDataProd=[];
				var ppcData=[];
				var kom_dl = [];
				var kom_idl = [];
				var kom_dl_pa = [];
				var kom_idl_pa = [];
				var datashift = [];

				const wh = 7.88;
				var typeline = 'reg';
				var pil_sf = 0;
				var jenis = '';

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
							data.push({id:0,text:'TOTAL'});
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

			// Autoload
			loadCarline();
			loadLine( $('#select_carline').val() ); 
			getDataPeriode();
			// console.log('c:'+$('#select_carline').val()+'|l:'+$('#select_lin').val());


			// ====  START SHOW  ======/
				function getDataPeriode() { 
					// jika bulan belum diisi auto bulan +1
						if (!$('#pilih_monthrange').val()) { 
							ystart = today.getFullYear()+'-'+(today.getMonth()+1)+'-1';
							yend = (today.getFullYear())+'-'+(today.getMonth()+2)+'-1';

							if ((today.getMonth()+2)>12) {
								yend = (today.getFullYear()+1)+'-'+(1)+'-1';
							}
						} 
					// console.log(ystart+'|'+yend);
					// SHOW DATA PPC
		                $('#tbody_actual').html('');// clear tabel
		                $('#thead_act th.act').remove(); //Clear THEAD
					// Show Data PPC
						$.ajax({
							async : false,
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/simulasi/getSimulasiMonthPick",
		                    dataType : "JSON",
		                    data : { 
		                    	id_lstcrln: $('#select_lin').val(),
		                    	ystart:ystart,
		                    	yend: yend
		                    },
		                    success: function(data){
		                    	// console.log('data ppc:');
		                    	// console.log(data);
		                    	ppcData = data;

		                    	// Membuat header
		                    		if (data.length == 0) { // jika data kosong
		                    			var thead = $("#thead_act thead").find("tr");
		                    			thead.append($('<th class="act">').text('No Data'));
		                    		}
			                    	for (var i = 0; i < data.length; i++) {
			                    		var thead = $("#thead_act thead").find("tr");
				                    	var today = new Date(data[i].tanggal);
										var currentMonth = today.getMonth();
				                    	thead.append($('<th class="act">').text(monthName[currentMonth]));
			                    	}
		                    	
		                    	
		                    	// mengulang kebawah sebanyak item
		                    	for (var y = 0; y < item.length; y++) {

		                    		if (item[y].view ==true) { 

			                    		var tr = $('<tr>').append(
			                    						$('<th class="sticky_left">').text(item[y].name)
			                    					);   
			                    		// mengulang sebanyak Periode
			                    		for (var i = 0; i < data.length; i++) { 
			                    			var tmp_html='';

			                    			if (item[y].val=='efficiency' || item[y].val=='p_load') {
			                    				tmp_html = parseFloat(data[i][item[y].val]).toFixed(1)+'%';
			                    			}else if( item[y].val=='order_monthly' || item[y].val=='capacity'  || item[y].val=='balance' ){
			                    				tmp_html = parseFloat(data[i][item[y].val]).toFixed(2);
			                    			}else{
			                    				tmp_html = data[i][item[y].val];
			                    			}
			                    			 
			                    			tr.append(
			                    					$('<td>').text(tmp_html)
				                    			 	); 	
				                    	}

				                    	tr.appendTo('#tbody_actual');
				                    }

		                    	}   

		                      }
		                });
	                

	                // SHOW DATA PROD
		                $('#tbody_testing').html('');// clear tabel
		                $('#thead_testing th.monn').remove(); //Clear THEAD
		            // get Dataa PROD
		                $.ajax({
		                	async: false,
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/IData/getIDataMonthPickSimulasi",
		                    dataType : "JSON",
		                    data : { 
		                    	id_lstcrln: $('#select_lin').val(), 
		                    	ystart:ystart,
		                    	yend: yend
		                    },
		                    success: function(data){ 
		                    	// console.log('isi data prod:');
		                    	// console.log(data); 
		                    	mDataProd=[];
		                    	// Conf HEADER
		                    		var tg = '';
		                    		var lstcr = 0;
		                    		var i = 0, sf=1;
			                    	data.forEach(function(dat){ 
			                    		var thed = $('#thead_testing').find('tr'); 
			                			var tgl = new Date(dat.tanggal);
			                			var vald = false;
			                			// console.log('ike:'+i);
			                			// awal GET
			                			if (i==0) {

			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true; 
			                					}
			                				//in local DB
			                					var dl = [],idl=[],dlpa=[],idlpa=[];
			                					dl.push(dat.kom_dl);
			                					idl.push(dat.kom_idl);
			                					dlpa.push(dat.kom_dl_pa);
			                					idlpa.push(dat.kom_idl_pa);

				                				var u_dat = { 
				                							is_valid: vald,
				                							shift_qty: dat.shift_qty,
															mp_dl: dat.mp_dl,
															mp_idl: dat.mp_idl,
															umh_shift: dat.umh_shift,
															working_days: dat.working_days,
															order_monthly: dat.order_monthly,
															capacity: dat.umh_shift,
															balance: dat.balance,
															p_load: dat.p_load,
															ot_plan: dat.ot_plan,
															ot_hours: dat.ot_hours,
															efficiency: dat.efficiency, 
															exc_time: dat.exc_time,
															tot_productivity: dat.tot_productivity,
															tanggal: dat.tanggal, 
															mpbuffer: dat.mpbuffer,
															attendance: dat.attendance,
															downtime: dat.downtime, 
															kom_dl: dl,
															kom_idl: idl,
															kom_dl_pa: dlpa,
															kom_idl_pa: idlpa
														};
												mDataProd.push(u_dat);
			                			}
			                			// jika ini sama dengan sebelumya beda sif
			                			else if (tg == monthName[tgl.getMonth()] && lstcr == dat.id_carline_has_line ) { 
			                				var last = (mDataProd.length-1); 
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true; 
			                					}
			                				// Penggabungan data dengan sebelumnya 
			                					var dl = [],idl=[],dlpa=[],idlpa=[];
			                					dl = Array.from(mDataProd[last].kom_dl);
			                					idl = Array.from(mDataProd[last].kom_idl);
			                					dlpa = Array.from(mDataProd[last].kom_dl_pa);
			                					idlpa = Array.from(mDataProd[last].kom_idl_pa);
			                					//|
			                					dl.push(dat.kom_dl);
			                					idl.push(dat.kom_idl);
			                					dlpa.push(dat.kom_dl_pa);
			                					idlpa.push(dat.kom_idl_pa);

												var u_dat = {	
														is_valid: vald,
														shift_qty: dat.shift_qty,
														mp_dl: (Number(mDataProd[last].mp_dl)+Number(dat.mp_dl))/Number(dat.shift_qty),
														mp_idl: (Number(mDataProd[last].mp_idl)+Number(dat.mp_idl))/Number(dat.shift_qty),
														umh_shift: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														working_days:  dat.working_days,
														order_monthly: Number(mDataProd[last].order_monthly)+Number(dat.order_monthly),
														capacity: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														balance: Number(mDataProd[last].balance)+Number(dat.balance),
														p_load: Number(mDataProd[last].p_load)+Number(dat.p_load),
														ot_plan: Number(mDataProd[last].ot_plan)+Number(dat.ot_plan),
														ot_hours: (Number(mDataProd[last].ot_hours)+Number(dat.ot_hours))/Number(dat.shift_qty), 
														efficiency: (Number(mDataProd[last].efficiency)+Number(dat.efficiency))/Number(dat.shift_qty), 
														exc_time: Number(mDataProd[last].exc_time)+Number(dat.exc_time),
														tot_productivity: Number(mDataProd[last].tot_productivity)+Number(dat.tot_productivity), 
														mpbuffer: Number(mDataProd[last].mpbuffer)+Number(dat.mpbuffer),
														attendance: Number(mDataProd[last].attendance)+Number(dat.attendance),
														downtime: Number(mDataProd[last].downtime)+Number(dat.downtime),
														tanggal: dat.tanggal,
														kom_dl: dl,
														kom_idl: idl,
														kom_dl_pa: dlpa,
														kom_idl_pa: idlpa
													};
												mDataProd[last] = u_dat;
			                			}
			                			//  Blan baru
			                			else if (tg != monthName[tgl.getMonth()]){
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true; 
			                					}
			                				//in local DB
			                					var dl = [],idl=[],dlpa=[],idlpa=[];
			                					dl.push(dat.kom_dl);
			                					idl.push(dat.kom_idl);
			                					dlpa.push(dat.kom_dl_pa);
			                					idlpa.push(dat.kom_idl_pa);

				                				var u_dat = { 
				                							is_valid: vald,
				                							shift_qty: dat.shift_qty,
															mp_dl: dat.mp_dl,
															mp_idl: dat.mp_idl,
															umh_shift: dat.umh_shift,
															working_days: dat.working_days,
															order_monthly: dat.order_monthly,
															capacity: dat.capacity,
															balance: dat.balance,
															p_load: dat.p_load,
															ot_plan: dat.ot_plan,
															ot_hours: dat.ot_hours,
															efficiency: dat.efficiency, 
															exc_time: dat.exc_time,
															tot_productivity: dat.tot_productivity,
															tanggal: dat.tanggal, 
															mpbuffer: dat.mpbuffer,
															attendance: dat.attendance,
															downtime: dat.downtime,
															kom_dl: dl,
															kom_idl: idl,
															kom_dl_pa: dlpa,
															kom_idl_pa: idlpa
														};
												mDataProd.push(u_dat);
			                			} 

			                			// jika sif sesuai 
			                			if (dat.shift_qty== sf) {
			                				sf=0;
			                			}

			                			i++;
			                			sf++; 
				                    });

								//JIKA DATA KOSONG
				                    if (data.length==0) {
				                    	var thed = $('#thead_testing').find('tr'); 
			                    		thed.append(
			            						$('<th class="monn">').text( 'No Data' )
			            					); 
			                    	}
			                    
		                    }
		                }); 

	 				// HITUNG DUlu
	 				hitungRumus();

	 				// LOAD Char
	 				loadChart();
	 				showmData();
				}

				function getDataPeriodTotal() { 
					// console.log('isis carline');
					// console.log($('#select_carline').val()); 
						if (!$('#pilih_monthrange').val()) { 
							ystart = today.getFullYear()+'-'+(today.getMonth()+1)+'-1';
							yend = (today.getFullYear())+'-'+(today.getMonth()+2)+'-1';

							if ((today.getMonth()+2)>12) {
								yend = (today.getFullYear()+1)+'-'+(1)+'-1';
							}
						} 

					// SHOW DATA TOTAL PPC
		                $('#tbody_actual').html('');// clear tabel
		                $('#thead_act th.pcc').remove(); //Clear THEAD
					// Show Data TOTAL PPC
						$.ajax({
							async : false,
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/simulasi/getSimulasiTotalPpc",
		                    dataType : "JSON",
		                    data : { 
		                    	carline: $('#select_carline').val(),
		                    	ystart:ystart,
		                    	yend: yend
		                    },
		                    success: function(data){
		                    	console.log('data ppc:');
		                    	console.log(data); 
		                    	ppcData = [];

		                    	// var CONF HEAD
		                    		var tg = '',i=0,ti=1;

		                    	data.forEach(function(dat){
		                    		var thead = $('#thead_act thead').find('tr');
		                    		var tgl = new Date(dat.tanggal);


		                    		// AWAL get
		                    		if (i==0) {
		                    			tg = monthName[tgl.getMonth()];
		                    			thead.append(
		                    					$('<th class="pcc">').text(monthName[tgl.getMonth()])
		                    				);
		                    			// Add Varr Local
		                    			var u_dat = {
		                    						mp_dl: dat.mp_dl,
		                    						working_days: dat.working_days,
		                    						order_monthly: dat.order_monthly,
		                    						capacity: dat.capacity,
		                    						balance: dat.balance,
		                    						p_load: dat.p_load,
		                    						ot_plan: dat.ot_plan,
		                    						ot_hours: dat.ot_hours,
		                    						efficiency: dat.efficiency,
		                    						mhout_shift: dat.mhout_shift,
		                    						shift_qty: dat.shift_qty
		                    					};
		                    			ppcData.push(u_dat);
		                    		}else if( tg == monthName[tgl.getMonth()]){
		                    			var las = (ppcData.length-1);
		                    			// Hitung Untuk Nilai median (%load
			                    			var pload = Number(ppcData[las].p_load)+Number(dat.p_load);
			                    			var eff = Number(ppcData[las].efficiency)+Number(dat.efficiency);
			                    			// Mengetahui batas bulann 
			                    			if ( i == (data.length-1) ) {
	 											console.log('ini te:'+ti);
	 											pload = pload/ti;
	 											eff = eff/ti;
			                    			}else{
			                    				var tgo = new Date(data[i+1].tanggal); 

			                    				if (monthName[tgl.getMonth()] != monthName[tgo.getMonth()] ) {
				                    				console.log('ini te:'+ti);
				                    				pload = pload/ti;
				                    				eff = eff/ti;
				                    				ti=0;
				                    			}
			                    			}
		                    			 
		                    			// UPDaate var local 
		                    			var u_dat = {
		                    						mp_dl: Number(ppcData[las].mp_dl)+Number(dat.mp_dl),
		                    						working_days: Number(dat.working_days),
		                    						order_monthly: Number(ppcData[las].order_monthly)+Number(dat.order_monthly),
		                    						capacity: Number(ppcData[las].capacity)+Number(dat.capacity),
		                    						balance: Number(ppcData[las].balance)+Number(dat.balance),
		                    						p_load: pload,
		                    						ot_plan: Number(ppcData[las].ot_plan)+Number(dat.ot_plan),
		                    						ot_hours: Number(ppcData[las].ot_hours)+Number(dat.ot_hours),
		                    						efficiency: eff,
		                    						mhout_shift: Number(ppcData[las].mhout_shift)+Number(dat.mhout_shift),
		                    						shift_qty: Number(ppcData[las].shift_qty)+Number(dat.shift_qty)
		                    					};
		                    			
		                    			ppcData[las] = u_dat; 
		                    		}else if( tg != monthName[tgl.getMonth()] ){
		                    			tg = monthName[tgl.getMonth()];
		                    			thead.append(
		                    					$('<th class="pcc">').text(monthName[tgl.getMonth()])
		                    				);

		                    			// Add Varr Local
		                    			var u_dat = {
		                    						mp_dl: dat.mp_dl,
		                    						working_days: dat.working_days,
		                    						order_monthly: dat.order_monthly,
		                    						capacity: dat.capacity,
		                    						balance: dat.balance,
		                    						p_load: dat.p_load,
		                    						ot_plan: dat.ot_plan,
		                    						ot_hours: dat.ot_hours,
		                    						efficiency: dat.efficiency,
		                    						mhout_shift: dat.mhout_shift,
		                    						shift_qty: dat.shift_qty
		                    					};
		                    			ppcData.push(u_dat);
		                    		}

		                    		i++;
		                    		ti++;
		                    	});
 								console.log(i);
 								//Working Days * sf qty
	 								// i=0;
	 								// ppcData.forEach(function(dat){
	 								// 	ppcData[i].working_days = dat.working_days*dat.shift_qty; 

	 								// });

		                      }
		                });
	                  
	                // SHOW DATA TOTAL PROD
		                $('#tbody_testing').html('');// clear tabel
		                $('#thead_testing th.monn').remove(); //Clear THEAD
		            // get Dataa TOTAL PROD
		                $.ajax({
		                	async: false,
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Simulasi/getSimulasiTotalProdNew",
		                    dataType : "JSON",
		                    data : { 
		                    	carline: $('#select_carline').val(),
		                    	ystart:ystart,
		                    	yend: yend
		                    },
		                    success: function(data){ 
		                    	console.log('isi data total prod:');
		                    	console.log(data); 
		                    	
		                    	mDataProd=[];
		                    	// Conf HEADER
		                    		var tg = ''; 
		                    		var lstcr = 0;
		                    		var i = 0, sf=1,ti=1; 
		                    		var vald = true;

			                    	data.forEach(function(dat){
			                    		var thed = $('#thead_testing').find('tr'); 
			                			var tgl = new Date(dat.tanggal); 
			                			// console.log('ike:'+i);
			                			// console.log('mp:'+dat.mp_dl);
			                			// awal GET
			                			if (i==0) { 

			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				// cek isi line sudah diisi  
			                					if ( dat.mp_dl ==0) { 
			                						vald = false; 
			                					}
			                				//in local DB  
				                				var u_dat = { 
				                							is_valid: vald,
				                							shift_qty: dat.shift_qty, 
															mp_dl: dat.mp_dl,
															mp_idl: dat.mp_idl,
															umh_shift: dat.umh_shift,
															working_days: dat.working_days,
															order_monthly: dat.order_monthly,
															capacity: dat.umh_shift,
															balance: dat.balance,
															p_load: dat.p_load,
															ot_plan: dat.ot_plan,
															ot_hours: dat.ot_hours,
															efficiency: dat.efficiency, 
															exc_time: dat.exc_time,
															tot_productivity: dat.tot_productivity,
															tanggal: dat.tanggal, 
															mpbuffer: dat.mpbuffer,
															attendance: dat.attendance,
															downtime: dat.downtime
														};
												mDataProd.push(u_dat);
			                			}
			                			// jika ini sama dengan sebelumya beda sif
			                			else if (tg == monthName[tgl.getMonth()] ) { 
			                				var last = (mDataProd.length-1); 
			                				// cek isi line sudah diisi  
			                					if (dat.mp_dl ==0) { 
			                						vald = false; 
			                					}
			                				// Hitung Untuk Nilai median (%load
				                    			var pload = Number(ppcData[last].p_load)+Number(dat.p_load);
				                    			var eff = Number(ppcData[last].efficiency)+Number(dat.efficiency);
				                    			// Mengetahui batas bulann 
				                    			if ( i == (data.length-1) ) {
		 											console.log('ini te:'+ti);
		 											pload = pload/ti;
		 											eff = eff/ti;
				                    			}else{
				                    				var tgo = new Date(data[i+1].tanggal); 

				                    				if (monthName[tgl.getMonth()] != monthName[tgo.getMonth()] ) {
					                    				console.log('ini te:'+ti);
					                    				pload = pload/ti;
					                    				eff = eff/ti;
					                    				ti=0;
					                    			}
				                    			}
			                    			
			                				// Isi A  
												var u_dat = {	
														is_valid: vald,
														shift_qty: dat.shift_qty,
														mp_dl_tmp: dat.mp_dl, //temp for total in carline
														mp_dl: (Number(mDataProd[last].mp_dl)+Number(dat.mp_dl)),
														mp_idl: (Number(mDataProd[last].mp_idl)+Number(dat.mp_idl)),
														umh_shift: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														working_days:  Number(dat.working_days),
														order_monthly: Number(mDataProd[last].order_monthly)+Number(dat.order_monthly),
														capacity: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														balance: Number(mDataProd[last].balance)+Number(dat.balance),
														p_load: Number(mDataProd[last].p_load)+Number(dat.p_load),
														ot_plan: Number(mDataProd[last].ot_plan)+Number(dat.ot_plan),
														ot_hours: (Number(mDataProd[last].ot_hours)+Number(dat.ot_hours)), 
														efficiency: eff,//(Number(mDataProd[last].efficiency)+Number(dat.efficiency)), 
														exc_time: Number(mDataProd[last].exc_time)+Number(dat.exc_time),
														tot_productivity: Number(mDataProd[last].tot_productivity)+Number(dat.tot_productivity), 
														mpbuffer: Number(mDataProd[last].mpbuffer)+Number(dat.mpbuffer),
														attendance: Number(mDataProd[last].attendance)+Number(dat.attendance),
														downtime: Number(mDataProd[last].downtime)+Number(dat.downtime),
														tanggal: dat.tanggal
													};
												mDataProd[last] = u_dat;
			                			}
			                			//  Blan baru
			                			else if (tg != monthName[tgl.getMonth()]){
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				// cek isi line sudah diisi  
			                					if (dat.mp_dl ==0 ) { 
			                						vald = false; 
			                					}
			                				//in local DB  
				                				var u_dat = { 
				                							is_valid: vald,
				                							shift_qty: dat.shift_qty,
				                							mp_dl_tmp: dat.mp_dl, //temp for total in carline
															mp_dl: dat.mp_dl,
															mp_idl: dat.mp_idl,
															umh_shift: dat.umh_shift,
															working_days: dat.working_days,
															order_monthly: dat.order_monthly,
															capacity: dat.capacity,
															balance: dat.balance,
															p_load: dat.p_load,
															ot_plan: dat.ot_plan,
															ot_hours: dat.ot_hours,
															efficiency: dat.efficiency, 
															exc_time: dat.exc_time,
															tot_productivity: dat.tot_productivity,
															tanggal: dat.tanggal, 
															mpbuffer: dat.mpbuffer,
															attendance: dat.attendance,
															downtime: dat.downtime
														};
												mDataProd.push(u_dat);
			                			} 

			                			// jika sif sesuai 
			                			if (dat.shift_qty== sf) {
			                				sf=0;
			                				vald = true;
			                			}

			                			i++;
			                			sf++;
			                			ti++;
				                    });

								//JIKA DATA KOSONG
				                    if (data.length==0) {
				                    	var thed = $('#thead_testing').find('tr'); 
			                    		thed.append(
			            						$('<th class="monn">').text( 'No Data' )
			            					); 
			                    	}
			                    	
		                    }
		                }); 
	 				
	 				// console.log('end ISI md');
	 				// console.log(mDataProd);
	 				// HITUNG DUlu 
	 					hitungRumus();

	 				// LOAD Char
	 				loadChart();
	 				showmData();
	 				showmdPpc();
				}

				function showmdPpc() { 
					$('#tbody_actual').html('');// clear tabel
					$('#thead_act th.pcc').remove(); //Clear THEAD

                	// item Y kebawah
                	item.forEach(function(itm){
                		// jika itm ditampilkan
                		if (itm.view ==true) { 
                    		var tr = $('<tr>').append(
                    					$('<th scope="row">').text(itm.name));	

                    		// Data X samping 
                    		var x = 0;
                    		ppcData.forEach(function(dat){ 
                    			var htm = '';


                    			if (itm.val=='order_monthly' || itm.val=='capacity' || itm.val=='balance' || itm.val=='ot_plan' ) {
                    				htm = parseFloat(dat[itm.val]).toFixed(2);
                    			}else if(itm.val =='p_load' || itm.val=='efficiency'){
                    				htm = parseFloat(dat[itm.val]).toFixed(2)+'%';
                    			}else{
                    				htm = dat[itm.val];
                    			}


        						tr.append(
                						$('<td>').text( htm )
                					);
                				x++;
	                    	}); 

                    		tr.appendTo('#tbody_actual');
                		} 
                	});
				}

				function showmData() { 
					$('#tbody_testing').html(''); 
					// console.log(mDataProd);
                	// item Y kebawah
                	var y=0;
                	item_prod.forEach(function(itm){

                		// jika itm ditampilkan
                		if (itm.view ==true) { 

                    		var tr = $('<tr>').append(
                    					$('<th scope="row">').text(itm.name));	

                    		// Data X samping 
                    		var x = 0; 
                    		mDataProd.forEach(function(dat){  
                    			tmp_html = ''; 

                    			// awal TUlisan DAta kurang Lengkap
	                    			if (dat['is_valid']==false && item_prod[0].name==itm.name) {
										tmp_html = 'Data BELUM Lengkap'; 
										tr.append( $('<td>').text( tmp_html ) );
										x++;
										y++;
										return;                   				
	                    			}
	                    			else if(dat['is_valid']==false && y!=0){
	                    				tmp_html = '-'; 
										tr.append( $('<td>').text( tmp_html ) );
										x++;
										y++;
										return;                   				
	                    			}

	                    		// Formating
	                    			if (itm.val=='efficiency' || itm.val=='p_load' || itm.val=='tot_productivity' ) {  
	        							tmp_html = parseFloat(dat[itm.val]).toFixed(1)+'%' ; 
	        						}else if( itm.val=='order_monthly' || itm.val=='capacity' || itm.val=='balance' || itm.val=='umh_shift'){
	        							tmp_html = Math.abs(parseFloat(dat[itm.val]).toFixed(2)) ; 
	        						}else if(itm.val=='ot_plan' || itm.val=='exc_time' ){
	        							tmp_html = Math.abs(parseFloat(dat[itm.val]).toFixed(0)) ; 
	        						}else if(itm.val=='ot_hours'){
	        							tmp_html = parseFloat(dat[itm.val]).toFixed(1) ; 
	        						}else{ 
	                					tmp_html = dat[itm.val] ; 
	        						}

        						// console.log( Math.abs(parseFloat(dat.ot_hours).toFixed(1))+'='+Math.abs(parseFloat(ppcData[x].ot_hours).toFixed(1)) );
        						// Check Warna
        						if ( parseFloat(dat[itm.val]).toFixed(0) != parseFloat(ppcData[x][itm.val]).toFixed(0) && ppcData[x][itm.val]!=null) { 
        							tr.append( 
        								$(`<td class='inner' bgcolor='#FFF4C1' data-id='`+x+`' data-mpdl='`+JSON.stringify(dat.kom_dl)+`'  data-mpidl='`+JSON.stringify(dat.kom_idl)+`' data-kom_dl_pa='`+JSON.stringify(dat.kom_dl_pa)+`' data-kom_idl_pa='`+JSON.stringify(dat.kom_idl_pa)+`'  data-col='`+itm.val+`' data-val='`+dat[itm.val]+`'>`).text( tmp_html ) 
        								);
        						}else{
        							tr.append( 
        								$(`<td class='inner' data-id='`+x+`' data-mpdl='`+JSON.stringify(dat.kom_dl)+`'  data-mpidl='`+JSON.stringify(dat.kom_idl)+`'  data-kom_dl_pa='`+JSON.stringify(dat.kom_dl_pa)+`' data-kom_idl_pa='`+JSON.stringify(dat.kom_idl_pa)+`'  data-col='`+itm.val+`' data-val='`+dat[itm.val]+`'>`).text( tmp_html ) 
        								);
        						}
        						
        						y++;
                				x++;
	                    	}); 

                    		tr.appendTo('#tbody_testing');
                		} 
                	});
				}
			// ====  END SHOW  ======/


			// ====   CHART   ====  //
				function loadChart() {
					// Actual
		            	var options ={  
								    chart: {
								        renderTo: 'container'
								    },
								    title: {
								        text: 'Data PPC'
								    },
								    xAxis: {
								        categories: (
							        			function(){
							        				var da = [];

							        					ppcData.forEach(function(dat){
							        						var tgl = new Date(dat.tanggal);
							        						da.push(monthName[tgl.getMonth()]);
							        					});

							        				return da;
							        			}()
							        		),
								        crosshair: true
								    },
								    yAxis: [
								    	{ 
								    		max: 60000,
								    		labels: {
									            format: '{value}',
									            style: {
									                color: Highcharts.getOptions().colors[1]
									            }
									        },
									        title: {
									            text: '',
									            style: {
									                color: Highcharts.getOptions().colors[1]
									            }
									        },
									        lineWidth: 1
									    }, {
									    	max: 250,
									    	title: {
									            text: '% Load',
									            style: {
									                color: '#000000'
									            }
									        },
									        labels: {
									            format: '{value} %',
									            style: {
									                color: '#000000'
									            }
									        },
									        lineWidth: 1,
									        opposite: true,
									        plotLines: [{
											    color: 'red', // Color value 
											    dashStyle: 'dashdot', // Style of the plot line. Default to solid
											    value: 110, // Value of where the line will appear
											    width: 2 // Width of the line    
											}],
									        plotBands: [{
											    color: 'orange', // Color value
											    dashStyle: 'ShortDash',  
											    value: 100, // Value of where the line will appear
			    								width: 2
											  }]
										}
									], 
								    tooltip: {
								        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
								        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
								            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
								        footerFormat: '</table>',
								        shared: true,
								        useHTML: true
								    },
								    plotOptions: {
								        column: {
								            pointPadding: 0.2,
								            borderWidth: 0
								        }
								    },
								    series: [
								    	{
								    		type: 'column',
									        name: 'Kap Prod',
									        data: (
							        			function(){
							        				var da = [];

							        					ppcData.forEach(function(dat){ 
							        						da.push(parseFloat(dat.capacity));
							        					});

							        				return da;
							        			}()
							        		)
									    }, 
									    {
									    	type: 'column',
									        name: 'Order',
									        data:  (
							        			function(){
							        				var da = [];

							        					ppcData.forEach(function(dat){ 
							        						da.push(parseFloat(dat.order_monthly));
							        					});

							        				return da;
							        			}()
							        		),
									        color: '#B22625'

									    }, 
									    {
									        type: 'spline',
									        name: '% Load',
									        yAxis: 1,
									        data:  (
							        			function(){
							        				var da = [];

							        					ppcData.forEach(function(dat){ 
							        						da.push(parseFloat(dat.p_load));
							        					});

							        				return da;
							        			}()
							        		),
									        marker: {
									            lineWidth: 2,
									            lineColor: Highcharts.getOptions().colors[3],
									            fillColor: 'white'
									      	}
								    	}
								    ],
								    legend: {
										layout: 'vertical',
										align: 'left',
										verticalAlign: 'top',
										x: 70,
										y: -10,
										floating: true,
										borderWidth: 1,
										backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
									}

				            	};
		            	var chart = new Highcharts.Chart(options); 

		            // Testing
		            	var options_tes ={  
								    chart: {
								        renderTo: 'container_testing'
								    },
								    title: {
								        text: 'Data Produksi'
								    },
								    xAxis: {
								        categories: (
								        			function(){
								        				var da = [];

								        					mDataProd.forEach(function(dat){

								        						var tgl = new Date(dat.tanggal);
								        						// console.log(dat.tanggal);
								        						// if (dat.is_valid) {
									        						da.push(monthName[tgl.getMonth()]);
									        					// }
								        					});

								        				return da;
								        			}()
								        		),
								        crosshair: true
								    },
								    yAxis: [
								    	{ 
								    		max: 60000,
								    		labels: {
									            format: '{value}',
									            style: {
									                color: Highcharts.getOptions().colors[1]
									            }
									        },
									        title: {
									            text: '',
									            style: {
									                color: Highcharts.getOptions().colors[1]
									            }
									        },
									        lineWidth: 1
									    }, {
									    	max: 250,
									    	title: {
									            text: '% Load',
									            style: {
									                color: '#000000'
									            }
									        },
									        labels: {
									            format: '{value} %',
									            style: {
									                color: '#000000'
									            }
									        },
									        lineWidth: 1,
									        opposite: true,
									        plotLines: [{
											    color: 'red', // Color value 
											    dashStyle: 'dashdot', // Style of the plot line. Default to solid
											    value: 110, // Value of where the line will appear
											    width: 2 // Width of the line    
											}],
									        plotBands: [{
											    color: 'orange', // Color value
											    dashStyle: 'ShortDash',  
											    value: 100, // Value of where the line will appear
			    								width: 2
											  }]
										}
									], 
								    tooltip: {
								        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
								        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
								                      '<td style="padding:0"><b>{point.y:.0f}  </b></td></tr>',
								        footerFormat: '</table>',
								        shared: true,
								        useHTML: true
								    },
								    plotOptions: {
								        column: {
								            pointPadding: 0.2,
								            borderWidth: 0
								        }
								    },
								    series: [
								    	{
								    		type: 'column',
									        name: 'Kap Prod',
									        data: (
								        			function(){
								        				var da = [];

								        					mDataProd.forEach(function(dat){ 
								        						if (dat.is_valid) {
								        							da.push(parseFloat(dat.capacity));
								        						}else{
								        							da.push(0);
								        						}
								        					});

								        				return da;
								        			}()
								        		)
									    }, 
									    {
									    	type: 'column',
									        name: 'Order',
									        data: (
								        			function(){
								        				var da = [];

								        					mDataProd.forEach(function(dat){ 
								        						if (dat.is_valid) {
								        							da.push(parseFloat(dat.order_monthly));
								        						}else{
								        							da.push(0);
								        						}
								        					});

								        				return da;
								        			}()
								        		)
									    }, 
									    {
									        type: 'spline',
									        name: '% Load',
									        yAxis: 1,
									        data: (
								        			function(){
								        				var da = [];

								        					mDataProd.forEach(function(dat){ 
								        						if (dat.is_valid) {
								        							da.push(parseFloat(dat.p_load));
								        						}else{
								        							da.push(0);
								        						}
								        					});

								        				return da;
								        			}()
								        		),
									        marker: {
									            lineWidth: 2,
									            lineColor: Highcharts.getOptions().colors[3],
									            fillColor: 'white'
									      	}
								    	}
								    ],
								    legend: {
										layout: 'vertical',
										align: 'left',
										verticalAlign: 'top',
										x: 70,
										y: -10,
										floating: true,
										borderWidth: 1,
										backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
									}
				            	};
		            	var chart_plan = new Highcharts.Chart(options_tes); 
				} 

            // Trigger
				// select carline
					$('#select_carline').on('select2:select',function(e){
						var data = e.params.data;
						
						console.log(data.id); 
						loadLine(data.id);
						getDataPeriode();
					});
				// select Line
					$('#select_lin').on('select2:select',function(e){
						var data = e.params.data;
						// console.log(data.id);
						typeline = 'reg'; 

						if (data.text=='TOTAL') {
							typeline = 'TOTAL';
							getDataPeriodTotal(); 
						}else{
							if (data.text=='PA') {
								typeline = 'PA';
							}

							getDataPeriode();
						}   
					}); 
				// CALENDAR
					// DAtepickers
		 			$('.month_range').datepicker({ 
						language: 'en',
						minView: 'months',
						view: 'months',
						autoClose: true,
						range: true, 
						multipleDates: true,
						multipleDatesSeparator: " - ", 
						dateFormat: 'MM yyyy',  
						onSelect: function(start, end) {  
							if (end.length==2) {
								// console.log('okk');
								var s = new Date(end[0]); 
								var e = new Date(end[1]);
								var endInM = 32 - new Date(e.getFullYear(), e.getMonth(), 32).getDate();
								ystart = s.getFullYear()+'-'+(s.getMonth()+1)+'-1'; 
								yend = e.getFullYear()+'-'+(e.getMonth()+1)+'-'+endInM; 
								
								if ($('#select_lin').val()==0) {
									getDataPeriodTotal(); 
								}else{
									getDataPeriode();
								} 
							}  
						}
					});
				// ITEM PROD VIEW  
					$('#item_view').selectpicker({

					});
					$('#item_view').selectpicker('selectAll');

					$('#item_view').on('hide.bs.select', function (e, clickedIndex, isSelected, previousValue) {
					  	// do something...
					  	var sel = $('#item_view').val();
					  	
					  	item_prod.forEach(function(entry) {
						    entry.view = false;
						});

					  	for (var x = 0; x < sel.length; x++) {
				  			item_prod[sel[x]].view = true;
				  		}

				  		showmData();
					});
				// I PPC VIEW  
					$('#i_view').selectpicker({

					});
					$('#i_view').selectpicker('selectAll');

					$('#i_view').on('hide.bs.select', function (e, clickedIndex, isSelected, previousValue) {
					  	// do something...
					  	var sel = $('#i_view').val();

					  	item.forEach(function(entry) {
						    entry.view = false;
						});

					  	for (var x = 0; x < sel.length; x++) {
				  			item[sel[x]].view = true;
				  		}

				  		showmdPpc();
					});
				// Shift modal
					$('#select_shiftline').on('select2:select',function(e){
						var data = e.params.data;
						// console.log(data.id); 
						pil_sf = data.id;
						console.log('ganti ke '+pil_sf);
						buatTabelView();
					}); 

            // Update val NORMAL
			    $("#tbody_testing").on('dblclick','.inner',function (e) {
			        e.stopPropagation();
			        var currentEle = $(this); 
			        var id = $(this).data('id');
			        var col = $(this).data('col');
			        var val = $(this).data('val');

			        // Bukan total
			        if (typeline != 'TOTAL') {
			        	// ISi Data Base Local
				        // Data Dl
					        kom_dl = $(this).data('mpdl');
						        if (kom_dl) { var y=0; kom_dl.forEach(function(d){ kom_dl[y].mid = id; y++});};  
						        // console.log(kom_dl);
					        kom_idl = $(this).data('mpidl');  
						        if (kom_idl) { var y=0; kom_idl.forEach(function(d){ kom_idl[y].mid = id; y++}); } 
						        // console.log(kom_idl);
				        // PA
					        kom_dl_pa = $(this).data('kom_dl_pa');
						        if (kom_dl_pa) { var y=0; kom_dl_pa.forEach(function(d){ kom_dl_pa[y].mid = id; y++});  } 
						        // console.log(kom_dl_pa);

					        kom_idl_pa = $(this).data('kom_idl_pa');  
						        if (kom_idl_pa) {  var y=0; kom_idl_pa.forEach(function(d){ kom_idl_pa[y].mid = id; y++}); }
						        // console.log(kom_idl_pa); 
			        }
			        

			        console.log('id:'+id+'|col:'+col+'|val:'+val); 

			        // Mencari tahu click ini Inline \/ Modal
				        // Reguler MP_DL
				        if (col == 'mp_dl' && typeline=='reg') {

				        	document.getElementById('head_mp').innerHTML = 'ManPower DL'; 
				        	// isi Shift terpilih
				        		datashift = [];
				        		var y = 0;
				        		mDataProd[id].kom_dl.forEach(function(d){
				        			var isi = {id:y, text: d.keterangan+' ('+d.nama_line+')'};
				        			if (y==0) {
				        				isi = {id:y, text: d.keterangan+' ('+d.nama_line+')', selected: true}; 
				        			} 
				        			datashift.push(isi); y++;
				        		});

				        	$('#cek_mp').modal('show');
				        	jenis = 'mpdl';
				        	buatTabelView(); 
				        }
				        // Reguler IDL
				        else if (col == 'mp_idl' && typeline=='reg') {
				        	
				        	document.getElementById('head_mp').innerHTML = 'ManPower IDL'; 
				        	// isi Shift terpilih
				        		datashift = [];
				        		var y = 0;
				        		mDataProd[id].kom_idl.forEach(function(d){
				        			var isi = {id:y, text: d.keterangan+' ('+d.nama_line+')'};
				        			if (y==0) {
				        				isi = {id:y, text: d.keterangan+' ('+d.nama_line+')', selected: true}; 
				        			} 
				        			datashift.push(isi); y++;
				        		});

				        	$('#cek_mp').modal('show');
				        	jenis = 'mpidl';
				        	buatTabelView(); 
				        }
				        // PA DL
				        else if (col == 'mp_dl' && typeline=='PA') {

				        	document.getElementById('head_mp').innerHTML = 'ManPower DL PreAssy'; 
				        	// isi Shift terpilih PA
				        		datashift = [];
				        		var y = 0;
				        		mDataProd[id].kom_dl_pa.forEach(function(d){
				        			var isi = {id:y, text: d.keterangan+' ('+d.nama_line+')'};
				        			if (y==0) {
				        				isi = {id:y, text: d.keterangan+' ('+d.nama_line+')', selected: true}; 
				        			} 
				        			datashift.push(isi); y++;
				        		});

				        	$('#cek_mp').modal('show');
				        	jenis = 'mpdlpa';
				        	buatTabelView(); 
				        }
				        // PA IDL
				        else if (col == 'mp_idl' && typeline=='PA') {
				        	
				        	document.getElementById('head_mp').innerHTML = 'ManPower IDL PreAssy'; 
				        	// isi Shift terpilih PA IDL
				        		datashift = [];
				        		var y = 0;
				        		mDataProd[id].kom_idl_pa.forEach(function(d){
				        			var isi = {id:y, text: d.keterangan+' ('+d.nama_line+')'};
				        			if (y==0) {
				        				isi = {id:y, text: d.keterangan+' ('+d.nama_line+')', selected: true}; 
				        			} 
				        			datashift.push(isi); y++;
				        		});

				        	$('#cek_mp').modal('show');
				        	jenis = 'mpidlpa';
				        	buatTabelView(); 
				        }
				        // Jika Bukan Popup Modal
				        else{	
				        	updateVal(currentEle, id, col, val);
				        } 
			    });
				// func updt inline
			    function updateVal(currentEle, id, col, value) {
				    $(currentEle).html('<input class="thVal form-control" style="width: 100%;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select();
				    $(".thVal").keyup(function (event) {
				        if (event.keyCode == 13) {
				        	var val = $(".thVal").val();

				        	console.log('before');
				            console.log(mDataProd[id][col]);
				            console.log('after');
				            console.log(val);

				        	
				            mDataProd[id][col] = val;  
				            $(currentEle).html( $(".thVal").val() );  

				            if ( col=='mpbuffer' || col=='downtime' || col=='attendance' || col=='efficiency' || col=='ot_hours' || col=='mp_dl' || col=='working_days' ) {
				            	// Hutungan UMH
									// Jumlah UMH
										var umh = ((Number(mDataProd[id].mp_dl)*Number(mDataProd[id].shift_qty))/100*100)*7.88*Number(mDataProd[id].working_days);
										console.log('hasil umh: '+umh);
									// umh OT HOURS
										var ot_hours = (umh/wh)*mDataProd[id].ot_hours;
										console.log('hasil ot_hours: '+ot_hours);
									// umh MP BUFFER 
										var mp_buffer = Number(mDataProd[id].mpbuffer)*wh*Number(mDataProd[id].working_days)*(100/100);
										console.log('hasil mp_buffer: '+mp_buffer); 
									// umh EFFICIENCY
										var umh_eff = umh*((mDataProd[id].efficiency/100)-1);
										console.log('hasil umh_eff: '+umh_eff);
									// umh DOWNTIME
										var downtime = (mDataProd[id].downtime*umh)/100;
										console.log('hasil downtime: '+downtime); 
									// umh ATTENDANCE
										var attendance = (mDataProd[id].attendance/100)*umh;
										console.log('hasil attendance: '+attendance);
									// penambah dan pengurang
										var penambah = umh_eff+mp_buffer+ot_hours;
										var pengurang = downtime+attendance;
									// OT PLAN
										var excl = (7/60)*Number(mDataProd[id].working_days)*2*(Number(mDataProd[id].mp_dl)*Number(mDataProd[id].shift_qty));
										console.log('hasil excl: '+excl); 
									// total umh/shift 
										var total_umh = umh+(penambah-pengurang);
										console.log('hasil total: '+total_umh);

									mDataProd[id].capacity = total_umh;
				            }


				            // HITUNG DUlu 
				            hitungRumus();
				            loadChart();
				            showmData();
 
				        }
				    });

				    // Focus losss same state value
				    $(".thVal").focusout(function(){
				    	console.log('losss');
 						showmData(); 
				    }); 

				}
			// UPDATE VAL TABEL MODAL
				// ===== MAN POWER =====
				$('.tb_mp').on('dblclick','.inn',function(e){
					e.stopPropagation();
					var currentEle = $(this); 
					var val = $(this).data('val');
					var col = $(this).data('col'); 
 
					updateValMp(currentEle,val,col);
				})
				function updateValMp(elmnt,value,col) { // ==== MAN POWER =====
					$(elmnt).html('<input class="thVal form-control" style="width: 50%;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select(); 
				    // Enter
				    $(".thVal").keyup(function (event) {
				        if (event.keyCode == 13) {
				        	var val = $('.thVal').val();
				        	var mid = 0;

				        	// Update Reguler
					        	if (jenis=='mpdl' && typeline=='reg') {
					        		mid = kom_dl[pil_sf].mid;
					        		kom_dl[pil_sf][col] = val; 
					        		// hitung total
						        		var to = 0; 
						        		view_mpdl.forEach(function(d){  
							        			d.forEach(function(din){
							        				if(din.val!='total'){ 	 
								        				to+= Number(kom_dl[pil_sf][din.val]);
								        			}
							        			}); 
						        			});

					        		kom_dl[pil_sf]['total'] = to; 
					        		// Total AB
					        			var ab = 0;
					        			kom_dl.forEach(function(d){ ab += Number(d.total); });
					        			ab = ab/kom_dl.length;

					        		mDataProd[ mid ].mp_dl = ab;  // Memasukkan Data Dl
					        		mDataProd[ mid ].kom_dl = kom_dl; // memperbarui in data DL
					        	}
					        	else if( jenis=='mpidl' && typeline=='reg'){
					        		mid = kom_idl[pil_sf].mid;
					        		kom_idl[pil_sf][col] = val;
					        		// hitung total
						        		var to = 0; 
						        		view_mpidl.forEach(function(d){  
							        			d.forEach(function(din){
							        				if(din.val!='total'){ 	 
								        				to+= Number(kom_idl[pil_sf][din.val]);
								        			}
							        			}); 
						        			});

					        		kom_idl[pil_sf]['total'] = to;
					        		// Total AB
					        			var ab = 0;
					        			kom_idl.forEach(function(d){ ab += Number(d.total); });
					        			ab = ab/kom_idl.length;

					        		mDataProd[ mid ].mp_idl = ab;  // Memasukkan Data Dl
					        		mDataProd[ mid ].kom_idl = kom_idl ; // memperbarui in data master DL 
					        	}
					        // Update PA
					        	else if( jenis=='mpdlpa' && typeline=='PA'){
					        		console.log('edit PA DLL');
					        		mid = kom_dl_pa[pil_sf].mid;
					        		kom_dl_pa[pil_sf][col] = val;
					        		// hitung total
						        		var to = 0; 
						        		view_mpdlpa.forEach(function(d){  
							        			d.forEach(function(din){
							        				if(din.val!='total'){ 	 
								        				to+= Number(kom_dl_pa[pil_sf][din.val]);
								        			}
							        			}); 
						        			}); 
					        		kom_dl_pa[pil_sf]['total'] = to; 
					        		// Total AB
					        			var ab = 0;
					        			kom_dl_pa.forEach(function(d){ ab += Number(d.total); });
					        			ab = ab/kom_dl_pa.length;

					        		mDataProd[ mid ].mp_dl = ab;  // Memasukkan Data Dl
					        		mDataProd[ mid ].kom_dl_pa = kom_dl_pa ; // memperbarui in data master DL
					        	}
					        	else if( jenis=='mpidlpa' && typeline=='PA'){
					        		console.log('edit Pa idl');
					        		mid = kom_idl_pa[pil_sf].mid;
					        		kom_idl_pa[pil_sf][col] = val;
					        		// hitung total
						        		var to = 0; 
						        		view_mpidlpa.forEach(function(d){  
							        			d.forEach(function(din){
							        				if(din.val!='total'){ 	 
								        				to+= Number(kom_idl_pa[pil_sf][din.val]);
								        			}
							        			}); 
						        			});

					        		kom_idl_pa[pil_sf]['total'] = to; 
					        		// Total AB
					        			var ab = 0;
					        			kom_idl_pa.forEach(function(d){ ab += Number(d.total); });
					        			ab = ab/kom_idl_pa.length;

					        		mDataProd[ mid ].mp_idl = ab;  // Memasukkan Data Dl
					        		mDataProd[ mid ].kom_idl_pa = kom_idl_pa ; // memperbarui in data DL
					        	}


					        // Hutungan UMH
								// Jumlah UMH
									var umh = ((Number(mDataProd[mid].mp_dl)*Number(mDataProd[mid].shift_qty))/100*100)*7.88*Number(mDataProd[mid].working_days);
									// console.log('hasil umh: '+umh);
								// umh OT HOURS
									var ot_hours = (umh/wh)*mDataProd[mid].ot_hours;
									// console.log('hasil ot_hours: '+ot_hours);
								// umh MP BUFFER 
									var mp_buffer = Number(mDataProd[mid].mpbuffer)*wh*Number(mDataProd[mid].working_days)*(100/100);
									// console.log('hasil mp_buffer: '+mp_buffer); 
								// umh EFFICIENCY
									var umh_eff = umh*((mDataProd[mid].efficiency/100)-1);
									// console.log('hasil umh_eff: '+umh_eff);
								// umh DOWNTIME
									var downtime = (mDataProd[mid].downtime*umh)/100;
									// console.log('hasil downtime: '+downtime); 
								// umh ATTENDANCE
									var attendance = (mDataProd[mid].attendance/100)*umh;
									// console.log('hasil attendance: '+attendance);
								// penambah dan pengurang
									var penambah = umh_eff+mp_buffer+ot_hours;
									var pengurang = downtime+attendance;
								// Exclude Time
									var excl = (7/60)*Number(mDataProd[mid].working_days)*2*(Number(mDataProd[mid].mp_dl)*Number(mDataProd[mid].shift_qty));
									// console.log('hasil excl: '+excl); 
								// total umh/shift 
									var total_umh = umh+(penambah-pengurang);
									// console.log('hasil total: '+total_umh);

								mDataProd[mid].capacity = total_umh;


				        	// Refresh Tabel
				        	$(elmnt).html( val );
				        	buatTabelView(); 
				        }
				    });
				    // Loss Focus
				    $(".thVal").focusout(function(){
				    	$(elmnt).html( value ); 
				    }); 
				}

			// Creating Tabel  View
				function buatTabelView() {  
					$('.tb_mp').html('');
					var total = 0; 
					var type = '';
					var mDat = [];

					// Cek jenis Yang akan Ditampilkan
					if (jenis == 'mpdl') {
						view_tabel = view_mpdl;
						type = 'mpdl';
						mDat = kom_dl[pil_sf];
					}
					else if(jenis == 'mpidl') {
						view_tabel = view_mpidl;
						type = 'mpidl';
						mDat = kom_idl[pil_sf];
					}
					// ====== PRE ASSY ===========
					else if(jenis == 'mpdlpa') {
						view_tabel = view_mpdlpa;
						type = 'mpdlpa';
						mDat = kom_dl_pa[pil_sf];
					}else if(jenis == 'mpidlpa') {
						view_tabel = view_mpidlpa;
						type = 'mpidlpa';
						mDat = kom_idl_pa[pil_sf];
					}
					// ====== PRE ASSY ===========

					var tb = $('.tb_mp');  
					view_tabel.forEach(function(dat){
						var tr = $('<tr>');
						dat.forEach(function(d){ 
							
							// mencari data 
							if (d.nama=='Total') {
								tr.append(
									$('<th style="text-align: center">').text(d.nama),
									$('<td class="total_mp">').text( total )
								);
							}else{
								total += Number(mDat[d.val]);

								tr.append(
									$('<th>').text(d.nama),
									$('<td class="inn" data-val="'+mDat[d.val]+'" data-type="'+type+'" data-col="'+d.val+'">').text(mDat[d.val])
								);	
							}
							
						});
						
						tr.appendTo(tb);
					}); 
				}
 
			// RUMUS -RUMUS
				function hitungRumus() { 
					// Hutungan UMH
					// console.log('isi dartaa sebelum:');
					// console.log(mDataProd);

					var x=0;
					mDataProd.forEach(function(dat){ 

						// capacyty
						// 	mDataProd[x].capacity = ((parseFloat(dat.mp_dl)*100)/100)* 7.88*parseFloat(dat.working_days);
						// // hitung BALANCE
							mDataProd[x].balance = (parseFloat(mDataProd[x].capacity)- parseFloat(dat.order_monthly));
						// // hitung % LOAD 
							mDataProd[x].p_load = (parseFloat(dat.order_monthly)/parseFloat(mDataProd[x].capacity))*100;
							// console.log('pload :'+mDataProd[x].p_load);
						// Hitung OT Plan
							// mDataProd[x].ot_plan = (parseFloat(dat.order_monthly)-parseFloat(mDataProd[x].capacity));
						// OT HOURS
							// mDataProd[x].ot_hours = ((parseFloat(dat.ot_plan)/parseFloat(dat.mp_dl))*parseFloat(dat.working_days))/3600;
						// excl time
							var excl = (7/60)*Number(dat.working_days)*2*(Number(dat.mp_dl)*Number(dat.shift_qty));
							// console.log('hsil excl: '+excl);
							mDataProd[x].exc_time = excl;
						// TOT PROD
							// console.log('cap'+mDataProd[x].capacity+'|mp_dl');
							mDataProd[x].tot_productivity = (parseFloat(mDataProd[x].capacity)/(parseFloat( (dat.mp_dl*dat.shift_qty) )+parseFloat( (dat.mp_idl*dat.shift_qty))+parseFloat(mDataProd[x].exc_time)));
							// console.log('tot_productivity: '+mDataProd[x].tot_productivity);
						x++;
					});
					// console.log('setelah dihitung');
					// console.log(mDataProd);

				}

			// IMPORT FUNC
				$('#import_form').on('submit', function(event){
					event.preventDefault();
					document.getElementById('btn_importfil').disabled =true;
					Swal.fire({ 
					    allowEscapeKey: false,
					    allowOutsideClick: false,
					    title: "Tunggu Sebentar", 
					    showConfirmButton: false,
					    onOpen: () => {
					      swal.showLoading();
					    }
					});

					$.ajax({
						async: false,
						url:"<?php echo site_url(); ?>/Excel_import/import",
						method:"POST",
						data:new FormData(this),
						contentType:false,
						cache:false,
						processData:false, 
						success:function(data){ 

							if (!data) {
								swal.hideLoading();
								Swal.close();

								Swal.fire({ 
								  title: 'Selesai Menambahkan',
								  type: 'success', 
								  showConfirmButton: true,
								  timer: 1000
								}).then(function(){
									location.reload();
								});

								console.log('no error');
							}else{
								Swal.close();

								Swal.fire({ 
								  title: 'Terjadi Kesalahan',
								  type: 'error', 
								  showConfirmButton: true, 
								}).then(function(){
									location.reload();
								});

								console.log('is error');
							} 

							$('#file').val('');  
							$('#modal_importexcl').modal('hide');  
						}
					})
				});
			// Auto Sum
				$('#cek_mp').on('show.bs.modal', function(){
					// Selecct Shift modal
					$('#select_shiftline').empty();
					$('#select_shiftline').select2({ 
		 				placeholder: 'Pilih Line ',
		 				minimumResultsForSearch: -1,
		 				data: datashift
		 			});

		 			pil_sf = $('#select_shiftline').val();
				});

				$('#cek_mp').on('hide.bs.modal', function(){
					console.log('modal Hidde');  

					hitungRumus();
					loadChart();
	 				showmData();
				});
 
		}); 
	</script> 
</body>
</html>