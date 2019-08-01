
<style>
	.hidenn{
	  display: none;
	} 
	.dipilih{

	}
	.select2-selection__rendered {
	    line-height: 55px !important;
	}
	.select2-container .select2-selection--single {
	    height: 50px !important;
	}
	.select2-selection__arrow {
	    height: 50px !important;
	}

	/* REMOVE SECOND CALENDAR */
	.drp-calendar.right thead>tr:nth-child(2) {
	    display: none;
	}
	.drp-calendar.right tbody {
	    display: none;
	}
	.daterangepicker.ltr .ranges, .daterangepicker.ltr .drp-calendar {
	    float: none !important;
	}
	.daterangepicker .drp-calendar.right .daterangepicker_input {
	    position: absolute;
	    top: 45px;
	    left: 15px;
	    width: 230px;
	}
	.drp-calendar.left .drp-calendar-table {
	    margin-top: 45px;
	}

	.daterangepicker .drp-calendar.right {
	    display: none;
	    right: 0 !important;
	    top: 0 !important;
	}
	/* REMOVE SECOND CALENDAR */
</style>


	<div class="pre-loader"></div>
	<div class="header clearfix">

		<div class="header-right">

			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name">Jhonson</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right"> 
						<a class="dropdown-item" href="profile.php"><i class="fa fa-cog" aria-hidden="true"></i> Setting</a>
						<a class="dropdown-item" href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> Help</a>
						<!-- <a class="dropdown-item" href="<?php echo site_url('Login/logout') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a> -->
					</div>
				</div>
			</div> 


			<div class="brand-logo">
				<a href="<?php echo site_url('') ?>">
					<img src="<?php echo base_url() ?>assets/vendors/images/ico.png" alt="" class="mobile-logo">
				</a>
			</div>

			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span> 
			</div>
  			
  			<div class="row">
  				<div class="dropdown">  
					<div class="input-group custom input-group-sm" style="margin-top: 10px; margin-left: 15px;">
						
						<div style="margin-top: -10px;"><font size="46">Line:</font> </div>
						<select class="select2 js-states form-control" id="select_line" name="select_line" style="width: 100px; "> 
							
						</select> 
					</div>
				</div>

				<div style="margin: 0 10px 0 50px;"><font size="7">Range:</font> </div>
				<div style="margin-top: 20px;"> 
					<div class="input-group custom input-group-sm" style="width: 250px">
						<input class="form-control month_range" placeholder="Select Month"  type="text">
						<div class="input-group-append custom">
							<span class="input-group-text" style="margin-top: -5px"><span class="icon-copy ti-calendar"></span></span>
						</div>
					</div>
	  			</div>



			</div>
 


		
		</div>
	</div>
