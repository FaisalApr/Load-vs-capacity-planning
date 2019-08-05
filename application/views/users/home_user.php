<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Users Dashboard</title> 
	<!-- Site favicon -->
	<!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico"> -->

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">c
	 <!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/datatables/media/css/responsive.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.css"> 
	<!-- SELEct 2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/src/plugins/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/src/plugins/select2/theme/select2-bootstrap.min.css">
 	
</head>
<body>  
<?php $this->load->view('include/header_users'); ?>
<?php $this->load->view('include/sidebar_users'); ?>


<!-- main container -->
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-5-p height-50-p xs-pd-5-10">
		
		<!-- HOME Container -->
		<div id="container_home" >
			<!-- Top Widget -->
			<div class="row clearfix progress-box" style="display: none;">
				 <div class="col-md-2 col-sm-12 mb-30" style="margin-left: -10px; margin-right: -20px">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-50-p" style="height: 140px">
						<div class="project-info clearfix" style="margin-top: 10px">
							<div class="text-center">
								<p class="weight-400 font-18" style="font-size: 22px">Users Total</p>
							</div>
							<div class=" text-center project-info-left">
								<div class="icon box-shadow bg-blue text-white" style="margin-left: 15px">
									<i class="icon-copy fa fa-address-card-o"></i>
								</div>
							</div>
							<div class=" text-center project-info">
								<span class="no text-blue weight-500 font-24" style="font-size: 50px" id="u_tot"></span>
							</div>
						</div> 
					</div>
				 </div>

			</div>
			<!-- Tabel -->
			<!-- Simple Datatable start -->
			<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
				<div class="clearfix mb-10">
					<div class="pull-left">
						<h5 class="text-blue">Data Users</h5>
						<p class="font-14">Daftar data seluruh user</p>
					</div>
					<div class="pull-right">
						<a href="#" class="btn btn-success" id="btn_addusr" style="width: 190px"><span class="fa fa-plus"></span> Tambah </a>
					</div>
				</div> 
				<div class="row">
					<table class="data-table stripe hover nowrap" id="t_user">
						<thead>
							<tr> 
								<th>NIK</th>
								<th>Nama</th>
								<th>Username</th>
								<th class="table-plus datatable-nosort">Password</th> 
								<th class="table-plus datatable-nosort">Job-line</th>   
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody id="body_user"> 
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
		</div>
 

	</div>
</div>
 
<!-- Modal -->
	<!-- START MODAL NEW USER --> 
		<div class="modal fade bs-example-modal-md" id="modal_new_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100">USER BARU</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form id="fom_newusr">  
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-control-label">NIK</label>
										<input id="inew_nik" name="inew_nik" type="Number" class="form-control" min="0"> 
									</div>
									<div class="form-group">
										<label class="form-control-label">Nama</label>
										<input id="inew_nama" name="inew_nama" type="text" class="form-control" minlength="4"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="fom_iusername1">
										<label class="form-control-label">Username</label>
										<input id="inew_user" name="inew_user" type="text" class="form-control">
										<div id="tipsss1" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
									</div>

									<div class="form-group">
										<label class="form-control-label">Password</label>
										<input id="inew_pass" name="inew_pass" type="Password" class="form-control" minlength="4"> 
									</div> 
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Job Line :</label>   
										<select class="select2 form-control" id="selectlinee" name="selectlinee" multiple="multiple" style="width: 100%;height: 300px;">
  
										</select>
									</div>
								</div> 
							</div>    
							<br>
							<center>
								<button type="button" class="btn btn-secondary" style="margin-right: 40px;" data-dismiss="modal" >Close</button> 
								<button type="button" class="btn btn-primary" id="btn_submit_newusr">Simpan</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div> 
	<!-- END MODAL NEW USER -->

	<!-- START MODAL EDIT USER --> 
		<div class="modal fade bs-example-modal-md" id="modal_edit_user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100">USER EDIT</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<form id="fom_editusr">  
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="form-control-label">NIK</label>
										<input id="iedit_nik" name="iedit_nik" type="Number" class="form-control" min="0"> 
									</div>
									<div class="form-group">
										<label class="form-control-label">Nama</label>
										<input id="iedit_nama" name="iedit_nama" type="text" class="form-control" minlength="4"> 
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" id="fom_iusername1">
										<label class="form-control-label">Username</label>
										<input id="iedit_user" name="iedit_user" type="text" class="form-control">
										<div id="tipsss1" style="display: none;" class="form-control-feedback">maaf, username ini sudah digunakan. Coba yang lain?</div> 
									</div>

									<div class="form-group">
										<label class="form-control-label">Password</label>
										<input id="iedit_pass" name="iedit_pass" type="Password" class="form-control" minlength="4"> 
									</div> 
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Job Line :</label>   
										<select class="select2 form-control" id="selectlineeedit" name="selectlineeedit" multiple="multiple" style="width: 100%;height: 300px;">
  
										</select>
									</div>
								</div> 
								<input type="hidden" id="id_editusr" value="">
							</div>    
							<br>
							<center>
								<button type="button" class="btn btn-secondary" style="margin-right: 40px;" data-dismiss="modal" >Close</button> 
								<button type="button" class="btn btn-primary" id="btn_submit_editusr">Simpan</button>
							</center>
						</form>
					</div>
				</div>
			</div>
		</div> 
	<!-- END MODAL EDIT USER -->

	<!-- START MODAL DELETE -->
		<div class="modal fade" id="confim_delete" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body text-center font-18">
						<h4 class="padding-top-30 mb-30 weight-500" id="info_del"></h4>
						<input type="hidden" id="id_u_delete">
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
	<!-- END MODAL DELETE -->
<!-- END -->
</body>
	<!-- Script Main -->
		<script src="<?php echo base_url() ?>assets/vendors/scripts/script.js"></script>  
		<!-- add sweet alert js & css in footer -->
		<script src="<?php echo base_url() ?>assets/src/plugins/dist_sweetalert2/sweetalert2.min.js"></script>   
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>  
		<script src="<?php echo base_url() ?>assets/src/plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
		<script src="<?php echo base_url() ?>assets/src/plugins/select2/dist/js/select2.min.js"></script>
	<script> 
		$('document').ready(function(){  
			// Confg
				function loadLinePicker() {
					$.ajax({ 
						type : 'AJAX',
						url: '<?php  echo site_url('CarlineHasLine/getLisAllCHL') ?>',
						dataType: "JSON", 
						success: function(response){
							$('#selectlinee').select2({ 
				 				placeholder: 'Pilih Line ', 
				 				closeOnSelect: false,
				 				tags: true,
				 				data:response 
				 			});
						}
					});
				} 


			// ====  AUTOLOAD =====  
			showUser();
			loadLinePicker();


			function showUser() { 
				$("#t_user").DataTable().destroy(); 
				$('#body_user').html('');

				$.ajax({
                    type : "ajax",
                    url  : "<?php echo site_url(); ?>/Users/showUser",
                    dataType : "JSON", 
                    success: function(data){  

                    	data.forEach(function(entry){
                    		// isi jobline si users
                    		var isi = ''; var i = 1;
                    		entry.linemgr.forEach(function(itm){
                    			// sparator awal
                    			if (i==1){ isi += itm.nama_line;}
                    			else{ isi += ','+itm.nama_line;}
                    			i++;
                    		});
                    		isi += ' ('+entry.linemgr.length+')'; //total line job

                    		var tr = $('<tr>').append(
                						$('<td>').text(entry.nik),
                						$('<td>').text(entry.nama),
                						$('<td>').text(entry.username),
                						$('<td>').text(entry.password),
                						$('<td>').text(isi),
                						$('<td>').html(
                							`<a href='#' class='edit_usr' data-id='`+entry.id+`' data-nama='`+entry.nama+`' data-nik='`+entry.nik+`' data-pass='`+entry.password+`' data-uname='`+entry.username+`' data-lmgr='`+JSON.stringify(entry.linemgr)+`'><span class='badge badge-primary'>Edit</span></a>  &nbsp&nbsp&nbsp`+
                							`<a href='#' class='delete_usr' data-id='`+entry.id+`' data-nama='`+entry.nama+`'><span class='badge badge-danger'>hapus</span></a>`
                							)
                					);   

                    		tr.appendTo('#body_user');
                    	});  
                    	$('#t_user').DataTable({
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

			// =====.  DeLETE USER ======== //
				$('#body_user').on('click','.delete_usr',function(){
					var id = $(this).data('id');
					var nama = $(this).data('nama');

					$('#id_u_delete').val(id);
					document.getElementById('info_del').innerHTML= 'Anda akan Menghapus akun <br>`'+nama+'` ?';
					$('#confim_delete').modal('show');
				});
				$('#btn_usr_delete').on('click',function(){
					 
					$.ajax({
	                    type : "POST",
	                    url  : "<?php echo site_url(); ?>/Users/delUser",
	                    dataType : "JSON", 
	                    data:{
	                    	id: $('#id_u_delete').val()
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
	                   		console.log(data);
	                   		showUser();
	                    }
	                }); 
					$('#confim_delete').modal('hide');
				});
			// =====.  New User.  ========= //
				// triger
					$('#btn_addusr').on('click',function(){

						$('#modal_new_user').modal('show');
					});
				// Validate
					$("#fom_newusr").validate({
					  rules: {
					  	inew_nik: {
					      required: true
					    },
					    inew_nama: {
					      required: true
					    },
					    inew_user: {
					      required: true
					    },
					    inew_pass: {
					      required: true
					    },
					    selectlinee:{
					      required: true	
					    }
					  }
					});
				// on Submit new
					$('#btn_submit_newusr').on('click', function(){
						var nik = $('#inew_nik').val();
						var nama = $('#inew_nama').val();
						var uname = $('#inew_user').val();
						var pass = $('#inew_pass').val();

						// Cek Valid?
						if (!$("#fom_newusr").valid()) {
							return;
						}

						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Users/addUser",
		                    dataType : "JSON", 
		                    data:{ 
		                    	nik:nik,
		                    	nama:nama,
		                    	uname:uname,
		                    	pass:pass,
		                    	linemgr:$('#selectlinee').val()
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
		                   		$('#modal_new_user').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "User Baru telah Ditambahkan",
								    type: 'success'
								});

		                   		$('#selectlinee').val(null).trigger('change');
		                   		$('#fom_newusr').trigger('reset');
		                   		showUser();
		                    }
		                }); 
						
					});
			// =====.  Edit User. ========= //
				//click
					$('#body_user').on('click','.edit_usr',function(){
						var id = $(this).data('id');
						var nik = $(this).data('nik');
						var nama = $(this).data('nama');
						var pass = $(this).data('pass');
						var uname = $(this).data('uname');
						var lmgr = $(this).data('lmgr');

						// console.log(lmgr);

						$('#iedit_nik').val(nik);
						$('#iedit_nama').val(nama);
						$('#iedit_user').val(pass);
						$('#iedit_pass').val(uname);
						$('#id_editusr').val(id);

						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Users/joblineUser",
		                    dataType : "JSON", 
		                    data:{ 
		                    	id:id
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
		                   		$('#modal_edit_user').modal('show');

		                   		$('#selectlineeedit').empty();
		                   		$('#selectlineeedit').select2({ 
					 				placeholder: 'Pilih Line ', 
					 				closeOnSelect: false,
					 				tags: true,
					 				data:data 
					 			}); 
					 			Swal.close();  
		                    }
		                }); 
						
					});
				// Validate
					$("#fom_editusr").validate({
					  rules: {
					  	iedit_nik: {
					      required: true
					    },
					    iedit_nama: {
					      required: true
					    },
					    iedit_user: {
					      required: true
					    },
					    iedit_pass: {
					      required: true
					    },
					    selectlineeedit:{
					      required: true	
					    }    
					  }
					});
				// submit edit usr
					$('#btn_submit_editusr').on('click',function(){
						// Cek Valid?
						if (!$("#fom_editusr").valid()) {
							return;
						}

						$.ajax({
		                    type : "POST",
		                    url  : "<?php echo site_url(); ?>/Users/updateUser",
		                    dataType : "JSON", 
		                    data:{ 
		                    	idu: $('#id_editusr').val(),
		                    	nik: $('#iedit_nik').val(),
		                    	nama: $('#iedit_nama').val(),
		                    	uname: $('#iedit_user').val(),
		                    	pass: $('#iedit_pass').val(),
		                    	linemgr: $('#selectlineeedit').val()
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
		                   		$('#modal_edit_user').modal('hide');

		                   		Swal.fire({  
								    title: "Berhasil",  
								    text: "User telah di Edit",
								    type: 'success'
								});

		                   		$('#fom_editusr').trigger('reset');
		                   		showUser();
		                    }
		                }); 
					});

		});
	</script>
</html>