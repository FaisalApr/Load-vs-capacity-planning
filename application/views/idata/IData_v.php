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
		.asd {
		    background:rgba(0,0,0,0);
		    border:none;
		}
	</style>

<body>
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>
 
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
	 			
	<!-- Container  Start -->
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" style="min-height: 600px;">
			<div class="pull-left">
				<h5 class="text-blue" style="font-size: 32px">Data Production Meeting</h5> 	
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
			 
			<table class="table table-bordered table-hover">
				<thead class="thead-light">
					<tr>
						<th style="width: 13%">
							<select class="form-control" id="item_view" multiple data-actions-box="true" data-selected-text-format="count" data-width="auto">
								<option value="0">MH OUT/SHIFT</option>
								<option value="1">MONTHLY ORDER</option>
								<option value="2">EFFICIENCY (%)</option>
								<option value="3">MP DL/SHIFT</option>
								<option value="4">SHIFT QTY</option>
								<option value="5">OT HOURS</option>
								<option value="6">CAPACITY</option>
								<option value="7">OT PLAN</option>
								<option value="8">WORKING DAYS</option>
								<option value="9">LOAD</option>
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

	<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/Year-Picker/yearpicker.js"></script>
	<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>  

	<script type="text/javascript">
		$('document').ready(function(){
			//Var Core
				const monthName = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
				var periode = [6,7,8,9,10,11,0,1,2,3,4,5];
				const item = [
								{name:'MH OUT/SHIFT',val: 'mhout_shift', view: true},
								{name:'MONTHLY ORDER',val: 'order_monthly', view: true},
								{name:'EFFICIENCY (%)',val: 'efficiency', view: true},
								{name:'MP DL/SHIFT',val: 'mp_dl', view: true},
								{name:'MP IDL/SHIFT',val: 'mp_idl', view: true},
								{name:'SHIFT QTY',val: 'shift_qty', view: true},
								{name:'OT HOURS',val: 'ot_hours', view: true},
								{name:'CAPACITY',val: 'capacity', view: true},
								{name:'OT PLAN',val: 'ot_plan', view: true},
								{name:'WORKING DAYS',val: 'working_days', view: true},
								{name:'% LOAD',val: 'p_load', view: true},
								{name:'EXCL TIME',val: 'exc_time', view: true}
							]; 
				var today = new Date();
				var ystart = today.getFullYear();
				var yend = (today.getFullYear()+1);
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


			// Show Data
				function getDataPeriode(lin,sf) {
					$("#tbody_data").empty();
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
	                    	// console.log(data);

	                    	
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
		                    			var id =0,mor=0,cap=0,val=0;
		                    			var col = ''; 

		                    				for (var x = 0; x < data.length; x++) { 

		                    					var tgl = new Date(data[x].tanggal);
		                    					// Jika bulan sama  maka ada data 
		                    					if (tgl.getMonth()==periode[i]) {

		                    						if (item[y].val=='efficiency' || item[y].val=='p_load' ) {
		                    							tmp_html = parseFloat(data[x][item[y].val]).toFixed(1)+'%';
		                    						}else{
		                    							tmp_html = data[x][item[y].val];
		                    						} 

		                    						// get data 
		                    						id = data[x].id;
		                    						val = data[x][item[y].val];
		                    						col = item[y].val; 
		                    						mor = data[x].order_monthly;
		                    						cap = data[x].capacity; 
		                    					}

		                    				}      	

		                    			if (col=='') {col = item[y].val;}

		                    			tr.append(
		                    						$('<td class="inner" data-id="'+id+'" data-col="'+col+'" data-periode_bln="'+periode[i]+'" data-cap="'+cap+'" data-mor="'+mor+'" data-val="'+val+'">').text(tmp_html)
			                    			 	); 	
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
			        var mor = $(this).data('mor');
			        var cap = $(this).data('cap'); 
			        var bln = $(this).data('periode_bln');

			        // console.log('id data: '+id+' col: '+col +'| bln: '+bln+'|mor: '+mor+'|cap: '+cap);

			        updateVal(currentEle, value, id, col, bln, mor,cap);
			    });

			    function updateVal(currentEle, value, id, col, bln, mor, cap) {

				    $(currentEle).html('<input class="thVal form-control" style="width: 85px;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select();
				    $(".thVal").keyup(function (event) {

				        if (event.keyCode == 13) {
				        	var tgl;
				        	// jika data baru
					        	if (id==0) {
					        		// jika tahun periode bulan dibawah juni 
					        		th = ystart;
					        		if (bln<7) {
					        			th = yend;
					        		}

					        		tgl = th+'-'+(bln+1)+'-1';
					        		console.log('tgl: '+tgl);
					        	}
				        	// return;
				        	// post data
					        	$.ajax({
				                    type : "POST",
				                    url  : "<?php echo site_url(); ?>/IData/updateIData",
				                    dataType : "JSON",
				                    data : { 
				                    	id:id,
				                    	col:col,
				                    	val:$(".thVal").val(),
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
				                    	Swal.close(); 
				                    	if (!data) {
				                    		$(currentEle).html( value );
				                    	}else{
				                    		// sukses
				                    		$(currentEle).html( $(".thVal").val() ); 
				                    		getDataPeriode($('#select_lin').val(), $('#select_shif').val());
				                    	}

				                    }
				                });

					        // JIKA ITU,  AUTO % LOAD
				            if (col=='capacity' || col=='order_monthly') {
				            	var has = (Number(mor)/Number(cap))*100;

				            	console.log('has : '+has);
				            	// POST
				            	$.ajax({
				                    type : "POST",
				                    url  : "<?php echo site_url(); ?>/IData/updateIData",
				                    dataType : "JSON",
				                    data : { 
				                    	id:id,
				                    	col: 'p_load',
				                    	val: has,
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
				                    	Swal.close();  
				                    }
				                });
				            }
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
 


		});
	</script>
</body>
</html>