<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin CarLine</title>

	<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
 
<body>	 

	<?php $this->load->view('include/header_users'); ?>
	<?php $this->load->view('include/sidebar_users'); ?>
	 
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			
			<!-- BODY CONTAINER --> 
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_1"> 
					<div class="pull-left">
						<h5 class="text-blue" style="font-size: 46px">CarLine Data</h5> 	
					</div>
					<div class="pull-right">
						<div class="row clearfix">	
							<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal_importexcl' style="margin-right: 25px;">Import File .Xlsx</a> -->

							<a href="#" class="btn btn-success" data-backdrop="static" data-toggle="modal" data-target="#i_carlinemodal" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
						</div>
					</div>
					<br><br><br>

					<!-- TABEL -->
					<table class="data-table stripe hover nowrap" id="t_carline">
						<thead style="vertical-align: middle; text-align: center;">
							<tr>
								<th style="width: 5%">No</th> 
								<th style="width: 20%;">Car Line</th>
								<th style="width: 15%">Company</th> 
								<th style="width: 45%">Data-Line</th>
								<th style="width: 10%" class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="tbl_bodycarline" class="text-center">
							
						</tbody>
					</table>
				</div>  

			<!-- BODY 2 CONTAINER -->
				<div class="pd-20 bg-white border-radius-4 box-shadow mb-30" id="cont_2" style="display: none;"> 
					<br>
					<div class="row ">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
							<a href="#" id="btnclose_view" class="btn btn-danger" style="width: 100px; margin-right: 70px;"><i class="icon-copy fa fa-close" aria-hidden="true"></i>&nbsp Kembali</a> 
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
							<h5 class="text-blue" style="font-size: 46px" id="nam_carline_head">CarLine Data</h5> 
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3  text-center">
							<a href="#" class="btn btn-success" id="btm_add_lstcrln" style="margin-right: 30px; width: 193px"><span class="fa fa-plus"></span> Tambah </a>
						</div> 
					</div> 
					<hr><br>
					<!-- TABEL -->
					<table class="data-table stripe hover nowrap" id="t_lstcrl">
						<thead style="vertical-align: middle; text-align: center;">
							<tr>
								<th style="width: 5%">No</th> 
								<th style="width: 20%;">Line</th> 
								<th style="width: 10%" class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="tbl_bodylstcrl" class="text-center">
							
						</tbody>
					</table>
				</div> 


		</div>
	</div>

	<!-- cccc CONTAINER 1 cccc -->
		<!-- modal INSERT Carline -->
	        <div class="modal fade" id="i_carlinemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Carline Baru</h2>
	                <!-- form start -->
	                <form id="form_input_carline">
	                  <!-- input -->
	                  	<div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="pilihcom" id="pilihcom">
								<option disabled selected> District </option>
								<option value="1">SAI T</option>
								<option value="2">SAI B</option>
							</select>
						</div> 
	                  <!-- input -->
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Nama Line " id="i_nama" name="i_nama" required>
							<div class="valid-feedback"></div> 
						</div>  
	                  <!-- button submit -->
	                  	<div class="row">
							<div class="col-sm-12">
								<div class="input-group">	
									<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_ncarline_submit">Buat Craline</a>
								</div>
							</div>
						</div>
	                </form>
	                <!-- form end -->
	              </div>
	            </div>
	          </div>
	        </div>
	    <!-- MODAL DELETE  Carline-->
			<div class="modal fade" id="delete_carline_mod" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body text-center font-18">
							<h4 class="padding-top-30 mb-30 weight-500" id="info_del_carl"></h4>
							<input type="hidden" id="id_carl_delete">
							<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
								<div class="col-6">
									<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
									NO
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_usr_delete"><i class="fa fa-check"></i></button>
									YES
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- MOdal EDIT Carline -->
			<div class="modal fade" id="edit_carlinemodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Carline Edit</h2>
	                <!-- form start -->
	                <form id="form_edit_carline">
	                  <!-- input -->
	                  	<div class="input-group custom input-group-lg">
							<select class="custom-select col-12" name="edt_pilihcom" id="edt_pilihcom">
								<option disabled selected> District </option>
								<option value="1">SAI T</option>
								<option value="2">SAI B</option>
							</select>
						</div> 
	                  <!-- input -->
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" id="edt_nama" name="edt_nama"> 
							<input type="hidden" id="id_edt_carl">
						</div>  
	                  <!-- button submit -->
	                  	<div class="row">
							<div class="col-sm-12">
								<div class="input-group">	
									<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_editcarline_submit">Update Craline</a>
								</div>
							</div>
						</div>
	                </form>
	                <!-- form end -->
	              </div>
	            </div>
	          </div>
	        </div>
    <!-- xxxx  CONTAINER 2  xxxx -->
    	<!-- MODAL DELETE  Carline-->
			<div class="modal fade" id="delete_lstcrl_mod" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-body text-center font-18">
							<h4 class="padding-top-30 mb-30 weight-500" id="info_del_lstcrln"></h4>
							<input type="hidden" id="id_lstcarl_delete">
							<div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
								<div class="col-6">
									<button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
									NO
								</div>
								<div class="col-6">
									<button type="button" class="btn btn-primary border-radius-100 btn-block confirmation-btn" id="btn_lstcrln_delete"><i class="fa fa-check"></i></button>
									YES
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- modal input -->
	        <div class="modal fade" id="addline_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	          <div class="modal-dialog modal-dialog-lg">
	            <div class="modal-content">
	              <div class="bg-white box-shadow pd-ltr-20 border-radius-5">
	                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	                <h2 class="text-center mb-30">Tambahkan Line </h2>
	                <!-- form start -->
	                <form id="form_add_linecr">
	                 <!-- input -->
	                  	<div class="input-group custom input-group-lg"> 
	                  		<label>Pilih Line :</label>
							<select class="select2 js-states form-control" id="pilihline_forcarline" name="pilihline_forcarline" multiple="multiple" style="width: 100%;height: 400px;">

							</select>
						</div>
	                  	<p id="txt_totlineselect">Total Line : 200</p>
	                  <!-- button submit -->
	                  <div class="row">
							<div class="col-sm-12">
								<div class="input-group">	
									<a class="btn btn-primary btn-lg btn-block" href="#" id="btn_submit_foraddline">Tambahkan Line</a>
								</div>
							</div>
						</div>

	                </form>
	                <!-- form end -->
	              </div>
	            </div>
	          </div>
	        </div>

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
								<img src="<?php echo base_url()?>/assets/src/images/format_carline.png">
							</div>
							<p><label>Select Excel File</label>
							<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
							<br />
							<input type="submit" name="import" value="Import" class="btn btn-info" />
						</form>

					</div> 
				</div>
			</div>
		</div>

	<!-- grup script -->
		<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
		<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script> 
		<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
	<script> 
		$('document').ready(function(){ 
			// var CORE
				var namaCrln = '';
				var idCarln = 0;


			// ==== Autoload ==== //
			showCarline();


			function showCarline() {
				$("#t_carline").DataTable().destroy(); 
				$('#tbl_bodycarline').html('');

				$.ajax({
					// async: false,
                    type : "ajax",
                    url  : "<?php echo site_url(); ?>/Carline/showCarline",
                    dataType : "JSON", 
                    success: function(data){ 
                    	console.log(data);

                    	var y =1;
                    	data.forEach(function(itms){
                    		// isi line cr
	                    		var isi = ''; var i = 1;
	                    		itms.data.forEach(function(lin){
	                    			// sparator awal
	                    			if (i==1){ isi += lin.text;}
	                    			else{ isi += ','+lin.text;}
	                    			i++;
	                    		});
	                    		isi += ' ('+itms.data.length+')'; //total line
                    		// main 
                    		var tr = $('<tr>').append(
                						$('<td>').text(y),
                						$('<td>').text(itms.nama_carline),
                						$('<td>').text(itms.nama),
                						$('<td>').text(isi),
                						$('<td>').html(
                							`<div class='dropdown' style='vertical-align: middle; text-align: center;'>`+
						                      `<a class='btn btn-outline-primary dropdown-toggle' href='#' role='button' data-toggle='dropdown'>`+
						                        `<i class='fa fa-ellipsis-h'></i>`+
						                      `</a>`+                     
						                      `<div class='dropdown-menu dropdown-menu-right'>`+
						                      	`<a class='dropdown-item item_view' href='#' data-id='`+itms.id+`' data-nama='`+itms.nama_carline+`' data-itms='`+JSON.stringify(itms.data)+`'><i class='fa fa-eye'></i> Detail </a>`+
						                        `<a class='dropdown-item item_edit_carl' href='#' data-nama='`+itms.nama_carline+`' data-id='`+itms.id+`' data-dis='`+itms.id_district+`'><i class='fa fa-pencil'></i> Edit </a>`+
						                        `<a class='dropdown-item item_del_carl' href='#' data-nama='`+itms.nama_carline+`' data-id='`+itms.id+`'><i class='fa fa-trash'></i> Hapus </a>`+ 						                      
						                      `</div>`+
						                    `</div>`
                							)
                					);   

                    		tr.appendTo('#tbl_bodycarline');
                    		y++;
                    	});  

                    	$('#t_carline').DataTable({
							scrollCollapse: true,
							autoWidth: false,
							responsive: true,
							columnDefs: [{
								targets: "datatable-nosort",
								orderable: false,
							}],
							"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							"language": {
								"info": "_START_-_END_ of _TOTAL_ entries",
								searchPlaceholder: "Search"
							},
						});
                    } 
                }); 
			}

			// ++++  CARLINE MAIN ++++ //
				// Buat Line Baru
					$("#form_input_carline").validate({
					  rules: {
					  	pilihcom: {
					      required: true
					    },
					    i_nama: {
					      required: true
					    }
					  }
					});
					$('#btn_ncarline_submit').on('click',function(){
						if (!$("#form_input_carline").valid()) {
							return;
						}
						// POST
						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Carline/newCarline",
		                    dataType : "JSON", 
		                    data:{ 
		                    	dis: $('#pilihcom').val(),
		                    	nama: $('#i_nama').val()
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
		                   		$('#i_carlinemodal').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "Carline Baru telah Ditambahkan",
								    type: 'success'
								});
	 
		                   		$('#form_input_carline').trigger('reset');
		                   		showCarline();
		                    }
		                }); 
					});
				// Delete Carline
					$('#tbl_bodycarline').on('click','.item_del_carl',function(){
						var nama = $(this).data('nama');
						var id = $(this).data('id');

						$('#id_carl_delete').val(id);
						document.getElementById('info_del_carl').innerHTML= 'Anda akan menghapus <br> `'+nama+'` ?';
						$('#delete_carline_mod').modal('show');
					});
					$('#btn_usr_delete').on('click',function(){
						
						// POST
						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Carline/deleteCarline",
		                    dataType : "JSON", 
		                    data:{ 
		                    	id: $('#id_carl_delete').val()
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
		                   		$('#delete_carline_mod').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "Carline telah Dihapus",
								    type: 'success'
								});
	  
		                   		showCarline();
		                    }
		                }); 
					});
				// Edit Carline
					$('#tbl_bodycarline').on('click','.item_edit_carl',function(){
						var id = $(this).data('id');
						var nam = $(this).data('nama');
						var dis = $(this).data('dis');

						$('#edt_nama').val(nam);
						$('#edt_pilihcom').val(dis);
						$('#id_edt_carl').val(id);

						$('#edit_carlinemodal').modal('show');
					});
					$("#form_edit_carline").validate({
					  rules: {
					  	edt_pilihcom: {
					      required: true
					    },
					    edt_nama: {
					      required: true
					    }
					  }
					});
					$('#btn_editcarline_submit').on('click',function(){
						if (!$("#form_edit_carline").valid()) {
							return;
						}
						// POST
						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Carline/editCarline",
		                    dataType : "JSON", 
		                    data:{ 
		                    	id: $('#id_edt_carl').val(),
		                    	dis: $('#edt_pilihcom').val(),
		                    	nama: $('#edt_nama').val()
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
		                   		$('#edit_carlinemodal').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "Carline telah Perbarui",
								    type: 'success'
								});
	 
		                   		$('#form_edit_carline').trigger('reset');
		                   		showCarline();
		                    }
		                }); 					
					});
			// xxxx LIST CARLINE xxxx //
				// conf Triger
					$('#tbl_bodycarline').on('click','.item_view',function(){
						var nam = $(this).data('nama');
						var itms = $(this).data('itms');
						var id = $(this).data('id');

						showtmpline(itms); 
						document.getElementById('nam_carline_head').innerHTML = nam;
						namaCrln = nam;
						idCarln = id; 

						document.getElementById('cont_1').style.display = 'none'; 
						$("#cont_2").fadeIn("slow");
					});
					$('#btnclose_view').on('click',function(){ 
						showCarline();
						document.getElementById('cont_2').style.display = 'none';  
						$("#cont_1").fadeIn("slow");
					});
				// SHOW 
					function showtmpline(itms) {
						$("#t_lstcrl").DataTable().destroy(); 
						$('#tbl_bodylstcrl').html('');

						var i =1;
						itms.forEach(function(dat){ 
							var tr = $('<tr>').append(
										$('<td>').text(i),
										$('<td>').text(dat.text),
										$('<td>').html(
											`<a href='#' class='delete_lstcr' data-id='`+dat.id+`' data-nama='`+dat.text+`'><span class='badge badge-danger'>hapus</span></a>`
											)
									);
							tr.appendTo('#tbl_bodylstcrl');
							i++;
						});
						$('#t_lstcrl').DataTable({
							scrollCollapse: true,
							autoWidth: false,
							responsive: true,
							columnDefs: [{
								targets: "datatable-nosort",
								orderable: false,
							}],
							"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
							"language": {
								"info": "_START_-_END_ of _TOTAL_ entries",
								searchPlaceholder: "Search"
							},
						});
					}
					function showLstCarline() {
						$("#t_lstcrl").DataTable().destroy(); 
						$('#tbl_bodylstcrl').html('');

						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Carline/showListCarline",
		                    dataType : "JSON", 
		                    data:{
		                    	id: idCarln
		                    },
		                    success: function(data){  
		                    	var i =1;
								data.forEach(function(dat){ 
									var tr = $('<tr>').append(
												$('<td>').text(i),
												$('<td>').text(dat.text),
												$('<td>').html(
													`<a href='#' class='delete_lstcr' data-id='`+dat.id+`' data-nama='`+dat.text+`'><span class='badge badge-danger'>hapus</span></a>`
													)
											);
									tr.appendTo('#tbl_bodylstcrl');
									i++;
								});
								$('#t_lstcrl').DataTable({
									scrollCollapse: true,
									autoWidth: false,
									responsive: true,
									columnDefs: [{
										targets: "datatable-nosort",
										orderable: false,
									}],
									"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
									"language": {
										"info": "_START_-_END_ of _TOTAL_ entries",
										searchPlaceholder: "Search"
									},
								});
		                    } 
		                }); 

					}
				// Delete LstCrl
					$('#tbl_bodylstcrl').on('click','.delete_lstcr',function(){
						var id = $(this).data('id');
						var nam = $(this).data('nama');

						$('#id_lstcarl_delete').val(id);
						document.getElementById('info_del_lstcrln').innerHTML = 'Anda akan menghapus Line <br> `'+nam+'` di Carline '+namaCrln+' ?';

						$('#delete_lstcrl_mod').modal('show');
					});
 					$('#btn_lstcrln_delete').on('click',function(){ 
 						// POST
						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Carline/deleteLstCarline    ",
		                    dataType : "JSON", 
		                    data:{ 
		                    	id: $('#id_lstcarl_delete').val()
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
		                   		$('#delete_lstcrl_mod').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "Line telah Dihapus",
								    type: 'success'
								});
 								
 								showLstCarline();
		                    }
		                });
 					});
            	// Add LiSTCArline
            		$('#btm_add_lstcrln').on('click',function(){
            			// for isi pilih line
            			$.ajax({ 
		                    type  : 'POST',
		                    url   : '<?php echo site_url();?>/CarlineHasLine/getListChlNotPick',
		                    dataType : 'JSON',
		                    data:{
		                    	id:idCarln
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
		                    success : function(dat){ 
		                    	Swal.close();  
		                     	// console.log(dat); 

		                     	document.getElementById('txt_totlineselect').innerHTML= 'Sisa Line : '+dat.length;
		                     	$('#pilihline_forcarline').empty();
								$('#pilihline_forcarline').select2({ 
					 				placeholder: 'Pilih Line ', 
					 				closeOnSelect: false,
					 				tags: true,
					 				data: dat 
					 			});
		                     	 
		                    }
		                });

            			$('#addline_modal').modal('show');
            		});
            		$("#form_add_linecr").validate({
					  rules: {
					  	pilihline_forcarline: {
					      required: true
					    }
					  }
					});
            		$('#btn_submit_foraddline').on('click',function(){ 

            			if (!$("#form_add_linecr").valid()) {
            				return;
            			}

            			$.ajax({ 
		                    type  : 'POST',
		                    url   : '<?php echo site_url();?>/CarlineHasLine/addCarHasLine',
		                    dataType : 'JSON',
		                    data:{
		                    	id: idCarln,
		                    	lnmgr: $('#pilihline_forcarline').val()
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
		                    success : function(dat){ 
		                    	Swal.close();   
		                    	$('#addline_modal').modal('hide');
		                    	
		                    	if (dat) {
		                    		Swal.fire({  
									    title: "Berhasil",  
									    text: "Line telah Dihapus",
									    type: 'success'
									});
		                    	}else{
		                    		Swal.fire({  
									    title: "Gagal",  
									    text: "Terjadi kesalahan",
									    type: 'error'
									});
		                    	}
		                    	showLstCarline();
		                    }
		                });

            		});

		});
	</script> 
</body> 
</html>