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
								{name:'MP DL',val: 'mp_dl', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},
								{name:'CAPACITY',val: 'capacity', view: true}, 
								{name:'BALANCE',val: 'balance', view: true},  
								{name:'% LOAD',val: 'p_load', view: true},
								{name:'OT PLAN',val: 'ot_plan', view: true},
								{name:'OT HOURS',val: 'ot_hours', view: true},
								{name:'EFFICIENCY (%)',val: 'efficiency', view: true}, 
								{name:'MH OUT/SHIFT',val: 'mhout_shift', view: true}, 
								{name:'SHIFT QTY',val: 'shift_qty', view: true}
							];
				const item_prod = [
								{name:'MP DL',val: 'mp_dl', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},
								{name:'CAPACITY',val: 'capacity', view: true},
								{name:'BALANCE',val: 'balance', view: true},  
								{name:'% LOAD',val: 'p_load', view: true},
								{name:'OT PLAN',val: 'ot_plan', view: true},
								{name:'OT HOURS',val: 'ot_hours', view: true}, 
								{name:'EFFICIENCY (%)',val: 'efficiency', view: true}, 
								{name:'MP IDL/SHIFT',val: 'mp_idl', view: true}, 
								{name:'EXCL TIME',val: 'exc_time', view: true},
								{name:'% Tot Prod',val: 'tot_productivity', view: true}
								// {name:'SHIFT QTY',val: 'shift_qty', view: true},
							]; 
				var today =  new Date();
				var ystart='';
				var yend='';
				var mDataProd=[];
				var ppcData=null;

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
							console.log('isi line');
							console.log(data);

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
			console.log('c:'+$('#select_carline').val()+'|l:'+$('#select_lin').val());


			// ====  START SHOW  ======/
				function getDataPeriode() { 

					if (!$('#pilih_monthrange').val()) {
						ystart = today.getFullYear()+'-'+(today.getMonth()+1)+'-1';
						yend = today.getFullYear()+'-'+(today.getMonth()+2)+'-1';
					} 

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

			                			// awal GET
			                			if (i=0) {
			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true;
			                						sf=0;
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
															tanggal: dat.tanggal
														};
												mDataProd.push(u_dat);
			                			}
			                			// jika ini sama dengan sebelumya beda sif
			                			else if (tg == monthName[tgl.getMonth()] && lstcr == dat.id_carline_has_line ) {
			                				thed.append(
			                					$('<th class="monn">').text(monthName[tgl.getMonth()])
			                				);
			                				var last = (mDataProd.length-1); 
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true;
			                						sf=0;
			                					}
			                				// Penggabungan data dengan sebelumnya 
												var u_dat = {	
														is_valid: vald,
														shift_qty: dat.shift_qty,
														mp_dl: Number(mDataProd[last].mp_dl)+Number(dat.mp_dl),
														mp_idl: Number(mDataProd[last].mp_idl)+Number(dat.mp_idl),
														umh_shift: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														working_days:  dat.working_days,
														order_monthly: Number(mDataProd[last].order_monthly)+Number(dat.order_monthly),
														capacity: Number(mDataProd[last].umh_shift)+Number(dat.umh_shift),
														balance: Number(mDataProd[last].balance)+Number(dat.balance),
														p_load: Number(mDataProd[last].p_load)+Number(dat.p_load),
														ot_plan: Number(mDataProd[last].ot_plan)+Number(dat.ot_plan),
														ot_hours: Number(mDataProd[last].ot_hours)+Number(dat.ot_hours),
														efficiency: (Number(mDataProd[last].efficiency)+Number(dat.efficiency)/Number(dat.shift_qty)),
														exc_time: Number(mDataProd[last].exc_time)+Number(dat.exc_time),
														tot_productivity: Number(mDataProd[last].tot_productivity)+Number(dat.tot_productivity),
														tanggal: dat.tanggal
													};
												mDataProd[last] = u_dat;
			                			}
			                			//  Blan baru
			                			else if (tg != monthName[tgl.getMonth()]){
			                				tg = monthName[tgl.getMonth()]; lstcr= dat.id_carline_has_line;
			                				// cek isi line sudah diisi  
			                					if (dat.shift_qty== sf & dat.mp_dl!=0) { 
			                						vald = true;
			                						sf=0;
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
															capacity: dat.capacity,
															balance: dat.balance,
															p_load: dat.p_load,
															ot_plan: dat.ot_plan,
															ot_hours: dat.ot_hours,
															efficiency: dat.efficiency, 
															exc_time: dat.exc_time,
															tot_productivity: dat.tot_productivity,
															tanggal: dat.tanggal
														};
												mDataProd.push(u_dat);
			                			} 

			                			// jika sif sesuai 
			                			if (dat.shift_qty== sf) {
			                				sf=0;
			                			}

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
	 				hitungRumus()

	 				// LOAD Char
	 				loadChart();
	 				showmData();
				}

				function showmD() { 
					$('#tbody_actual').html('');

                	// item Y kebawah
                	item.forEach(function(itm){
                		// jika itm ditampilkan
                		if (itm.view ==true) { 
                    		var tr = $('<tr>').append(
                    					$('<th scope="row">').text(itm.name));	

                    		// Data X samping 
                    		var x = 0;
                    		ppcData.forEach(function(dat){ 
        						tr.append(
                						$('<td>').text( dat[itm.val] )
                					);
                				x++;
	                    	}); 

                    		tr.appendTo('#tbody_actual');
                		} 
                	});
				}

				function showmData() { 
					$('#tbody_testing').html(''); 

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
									y++;
									return;                   				
                    			}
                    			else if(dat['is_valid']==false && y!=0){
                    				tmp_html = '-'; 
									tr.append( $('<td>').text( tmp_html ) );
									y++;
									return;                   				
                    			}


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
        						if(itm.val=='ot_hours' && Math.abs(parseFloat(dat.ot_hours).toFixed(1))== Math.abs(parseFloat(ppcData[x].ot_hours).toFixed(1)) ){
        							tr.append( $('<td class="inner" data-id="'+x+'" data-col="'+itm.val+'" data-val="'+dat[itm.val]+'">').text( tmp_html ) );	 
        						}else if ( parseFloat(dat[itm.val]).toFixed(0) != parseFloat(ppcData[x][itm.val]).toFixed(0) && ppcData[x][itm.val]!=null) { 
        							tr.append( $('<td class="inner" bgcolor="#FFF4C1" data-id="'+x+'" data-col="'+itm.val+'" data-val="'+dat[itm.val]+'">').text( tmp_html ) );
        						}else{
        							tr.append( $('<td class="inner" data-id="'+x+'" data-col="'+itm.val+'" data-val="'+dat[itm.val]+'">').text( tmp_html ) );	 
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
								        opposite: true
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
						console.log(data.id);  
						getDataPeriode();
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
								
								getDataPeriode();
							}  
						}
					});
				// ITEM VIEW  
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
				// I VIEW  
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

				  		showmD();
					});

            // Update val
			    $("#tbody_testing").on('dblclick','.inner',function (e) {
			        e.stopPropagation();
			        var currentEle = $(this); 
			        var id = $(this).data('id');
			        var col = $(this).data('col');
			        var val = $(this).data('val');

			        console.log('id:'+id+'|col:'+col+'|val:'+val);

			        updateVal(currentEle, id, col, val);
			    });

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
				             

				            // HITUNG DUlu 
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
 
			// RUMUS -RUMUS
				function hitungRumus() { 

					var x=0;
					mDataProd.forEach(function(dat){
						// hitung BALANCE
							mDataProd[x].balance = (parseFloat(dat.capacity)- parseFloat(dat.order_monthly));
						// hitung % LOAD 
							mDataProd[x].p_load = (parseFloat(dat.order_monthly)/parseFloat(dat.capacity))*100;
							// console.log('pload :'+mDataProd[x].p_load);
						// Hitung OT Plan
							mDataProd[x].ot_plan = (parseFloat(dat.order_monthly)-parseFloat(dat.capacity));
						// OT HOURS
							mDataProd[x].ot_hours = ((parseFloat(dat.ot_plan)/parseFloat(dat.mp_dl))*parseFloat(dat.working_days))/3600;
						// excl time
							var excl = (7/60)*parseFloat(dat.working_days)*2*parseFloat(dat.mp_dl);
							// console.log('hsil excl: '+excl);
							mDataProd[x].exc_time = excl;
						// TOT PROD
							// console.log('cap'+dat.capacity+'|mp_dl');
							mDataProd[x].tot_productivity = (parseFloat(dat.capacity)/(parseFloat(dat.mp_dl)+parseFloat(dat.mp_idl)+parseFloat(mDataProd[x].exc_time)));
							// console.log('tot_productivity: '+mDataProd[x].tot_productivity);
						x++;
					});
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
							// swal.hideLoading();
							// Swal.close();
							// console.log(data);
							// // return;

							if (!data) {
								swal.hideLoading();
								Swal.close();

								Swal.fire({ 
								  title: 'Selesai Menambahkan',
								  type: 'success', 
								  showConfirmButton: true,
								  timer: 1000
								});

								console.log('no error');
							}else{
								Swal.close();

								Swal.fire({ 
								  title: 'Terjadi Kesalahan',
								  type: 'error', 
								  showConfirmButton: true, 
								});
								console.log('is error');
							}
							

							$('#file').val(''); 

							$('#modal_importexcl').modal('hide');

							

							// show(); 
						}
					})
				});
		
		}); 
	</script> 
</body>
</html>