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
		<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
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
			<div class="pull-right" style="margin-top: -80px;">
				<a href="#"><input type="text" id="periode_th" class="yearpicker asd form-control" style="width: 250px;  font-size: 38px;text-align: right;" value="2019-2020"></a>
			</div>
			
			<table class="table table-bordered table-hover">
				<thead>
					<tr style=" background-color: grey">
						<th style="width: 15%"></th>
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
								{name:'MH OUT/SHIFT',val: 'mhout_shift'},
								{name:'MONTHLY ORDER',val: 'order_monthly'},
								{name:'EFFICIENCY (%)',val: 'efficiency'},
								{name:'MP DL/SHIFT',val: 'mp_dl'},
								{name:'SHIFT QTY',val: 'shift_qty'},
								{name:'OT HOURS',val: 'ot_hours'},
								{name:'CAPACITY',val: 'capacity'},
								{name:'OT PLAN',val: 'ot_plan'},
								{name:'WORKING DAYS',val: 'working_days'}
							]; 
			// method
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
					  year: null, 
					  startYear: '2002', 
					  endYear: null
					}).on('change', function (ev) {
					    alert('message?: DOMString');
					});

					// $('.yearpicker').val('2019-2020');
				
				// $('#periode_th').on('change',function(){
				// 	console.log('ganti');
				// });


			// Autoload
			loadCarline();
			loadLine($('#select_carline').val());
			loadShift();  
			getDataPeriode($('#select_lin').val(), $('#select_shif').val());
			// console.log('carline : '+$('#select_carline').val() +'| lne : '+$('#select_lin').val()+'| sif: '+$('#select_shif').val() );



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
	                    	shift:sf
	                    },
	                    success: function(data){
	                    	// console.log(data);

	                    	
	                    	// mengulang kebawah sebanyak item
	                    	for (var y = 0; y < item.length; y++) {
	                    		var tr = $('<tr>').append(
	                    						$('<th>').text(item[y].name)
	                    					);   
	                    		// mengulang sebanyak Periode
	                    		for (var i = 0; i < periode.length; i++) {

	                    			var tmp_html='';
	                    			var id =0;
	                    			var col = ''; 

	                    				for (var x = 0; x < data.length; x++) { 

	                    					var tgl = new Date(data[x].tanggal);
	                    					// Jika bulan sama  maka ada data 
	                    					if (tgl.getMonth()==periode[i]) {
	                    						tmp_html = data[x][item[y].val];

	                    						// get data 
	                    						id = data[x].id;
	                    						col = item[y].val;
	                    					}

	                    				}      	

	                    			if (col=='') {col = item[y].val;}

	                    			tr.append(
	                    						$('<td class="inner" data-id="'+id+'" data-col="'+col+'" data-periode_bln="'+periode[i]+'" >').text(tmp_html)
		                    			 	); 	
		                    	}

		                    	tr.appendTo('#tbody_data');
	                    	}   

	                      }
	                  });
				} 


			// Update val
			    $("#tbody_data").on('dblclick','.inner',function (e) {
			        e.stopPropagation();
			        var currentEle = $(this);
			        var value = $(this).html(); 
			        var id = $(this).data('id');
			        var col = $(this).data('col');
			        var bln = $(this).data('periode_bln');

			        console.log('id data: '+id+' col: '+col +'| bln: '+bln);

			        updateVal(currentEle, value, id, col, bln);
			    });

			    function updateVal(currentEle, value, id, col, bln) {

				    $(currentEle).html('<input class="thVal form-control" style="width: 85px;" type="number" value="' + value + '" />');
				    $(".thVal").focus();
				    $(".thVal").select();
				    $(".thVal").keyup(function (event) {

				        if (event.keyCode == 13) {
				        	var tgl;
				        	// jika data baru
					        	if (id==0) {
					        		// jika tahun periode bulan dibawah juni 
					        		th = Number($('.yearpicker').val());
					        		if (bln<7) {
					        			th +=1;
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
				        }
				    });
 					
 					// Focus losss same state value
				    $(".thVal").focusout(function(){
				    	console.log('losss');
				    	$(currentEle).html( value ); 
				    });
				}
 


		});
	</script>
</body>
</html>