<style>
	.aktip{
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
	.aktip:hover {
	  background-color: #DDF2FF;
	  color: #0099FF;
	}
	.hidenn{
	  display: none;
	} 
</style>
<?php 
	$sesi = $this->session->userdata('pdo_logged'); 
?>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="<?php echo site_url('') ?>">
				<img src="<?php echo base_url() ?>assets/vendors/images/SAI.PNG" alt="">
			</a>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<!-- start LI -->
					<li class="dropdown <?php echo $this->uri->segment(1) == '' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>" class="dropdown-toggle no-arrow">
							<span class="fa fa-home"></span><span class="mtext">DASHBOARD</span>
						</a> 
					</li>
					
					<li class=" <?php echo $this->uri->segment(1) == 'IData' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/IData" class="dropdown-toggle no-arrow">
							<span class="fa fa-chevron-circle-down"></span><span class="mtext">Data</span>
						</a>
					</li>

					<li class=" <?php echo $this->uri->segment(1) == 'Simulasi' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Simulasi" class="dropdown-toggle no-arrow">
							<span class="icon-copy fa fa-line-chart"></span><span class="mtext">Summary</span>
						</a>
					</li>

					<br><br><br><br>
					<hr>
					<li class=" <?php echo $this->uri->segment(1) == 'Users' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Users" class="dropdown-toggle no-arrow"> 
							<i class="icon-copy fa fa-id-card-o" aria-hidden="true"></i><span class="mtext">Users</span>
						</a>
					</li> 
					<li class=" <?php echo $this->uri->segment(1) == 'Carline' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Carline" class="dropdown-toggle no-arrow">
							<i class="icon-copy fa fa-car" aria-hidden="true"></i><span class="mtext">Carline</span>
						</a>
					</li>

					<li class=" <?php echo $this->uri->segment(1) == 'line' ? 'aktip': '' ?>">
						<a href="<?php echo site_url() ?>/Line" class="dropdown-toggle no-arrow">
							<i class="icon-copy fa fa-code-fork" aria-hidden="true"></i><span class="mtext">Line</span>
						</a>
					</li>


				</ul>
			</div>
		</div>
	</div>