<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('iData_model'); 
		$this->load->model('Simulasi_model'); 
	}
	public function index()
	{
		$this->load->view('simulasi/simulasi');
	}
	public function getDat()
	{
		# code...
		$data = $this->Simulasi_model->getDat();
		echo json_encode($data);
	}

	public function getSimulasiMonthPick()
	{
		$id_lstcrln = $this->input->post('id_lstcrln');
		$start = ($this->input->post('ystart'));
		$end = ($this->input->post('yend'));

		$data  =  $this->Simulasi_model->cariDataPeriode($id_lstcrln,$start,$end);

		echo json_encode($data);
	}

	public function getSimulasiTotalPpc()
	{
		$id_carline = $this->input->post('carline');
		$start = ($this->input->post('ystart'));
		$end = ($this->input->post('yend'));

		$data  =  $this->Simulasi_model->cariDataPeriodeTotalPpc($id_carline,$start,$end);

		echo json_encode($data);
	}

	public function getSimulasiTotalProd()
	{
		$id_carline = $this->input->post('carline');
		$start = ($this->input->post('ystart'));
		$end = ($this->input->post('yend'));

		$data  =  $this->Simulasi_model->cariDataPeriodeTotalProd($id_carline,$start,$end);

		foreach ($data as $key => $value) {
			# code...
			$dat = $this->iData_model->cariMpByIdLcp($value->id);
			$value->kom_dl = $dat;

			$datr = $this->iData_model->cariMpByIdLcpN($value->id);
			$value->kom_idl = $datr;
			
			$d = $this->iData_model->cariDLPAByIdLcp($value->id);
			$value->kom_dl_pa = $d;
			$da = $this->iData_model->cariIDLPAByIdLcp($value->id);
			$value->kom_idl_pa = $da;
		}
		echo json_encode($data);
	}
 

	public function getSimulasiTotalProdNew()
	{
		$id_carline = $this->input->post('carline');
		$start = ($this->input->post('ystart'));
		$end = ($this->input->post('yend'));

		// Mencari Data Carline Terpilih
		$atemp = array();
		$data  =  $this->Simulasi_model->cariDataCarlineTerpilih($id_carline); 
		foreach ($data as $key => $value) {  
			$dat = $this->Simulasi_model->cariDataByListCr($value->id,$start,$end);
			$x= 0;
			foreach ($dat as $y => $v) {
				// tgl 
				if ($x==0) {
					$u_dat = array(  
							'shift_qty' => $v->shift_qty,
							'mp_dl' => $v->mp_dl,
							'mp_idl' => $v->mp_idl,
							'umh_shift' => $v->umh_shift,
							'working_days' => $v->working_days,
							'order_monthly' => $v->order_monthly,
							'capacity' => $v->umh_shift,
							'balance' => $v->balance,
							'p_load' => $v->p_load,
							'ot_plan' => $v->ot_plan,
							'ot_hours' => $v->ot_hours,
							'efficiency' => $v->efficiency, 
							'exc_time' => $v->exc_time,
							'tot_productivity' => $v->tot_productivity,
							'tanggal' => $v->tanggal, 
							'mpbuffer' => $v->mpbuffer,
							'attendance' => $v->attendance,
							'downtime' => $v->downtime
							); 
					array_push($atemp, $u_dat);

				}else if($v->tanggal == $atemp[sizeof($atemp)-1]['tanggal']){
					$u_dat = array(  
							'shift_qty' => $v->shift_qty,
							'mp_dl' => ($atemp[sizeof($atemp)-1]['mp_dl']+$v->mp_dl)/$v->shift_qty,
							'mp_idl' => ($atemp[sizeof($atemp)-1]['mp_idl']+$v->mp_idl)/$v->shift_qty,
							'umh_shift' => $v->umh_shift,
							'working_days' => $v->working_days,
							'order_monthly' => ($atemp[sizeof($atemp)-1]['order_monthly']+ $v->order_monthly),
							'capacity' => ($atemp[sizeof($atemp)-1]['capacity']+ $v->umh_shift),
							'balance' => $atemp[sizeof($atemp)-1]['balance']+$v->balance,
							'p_load' => $v->p_load,
							'ot_plan' => $v->ot_plan,
							'ot_hours' => $atemp[sizeof($atemp)-1]['ot_hours']+$v->ot_hours,
							'efficiency' => $v->efficiency, 
							'exc_time' => $v->exc_time,
							'tot_productivity' => $v->tot_productivity,
							'tanggal' => $v->tanggal, 
							'mpbuffer' => $v->mpbuffer,
							'attendance' => $v->attendance,
							'downtime' => $v->downtime
							); 
					$atemp[sizeof($atemp)-1] =  $u_dat;
				}else if($v->tanggal != $atemp[sizeof($atemp)-1]['tanggal']){
					$u_dat = array(  
							'shift_qty' => $v->shift_qty,
							'mp_dl' => $v->mp_dl,
							'mp_idl' => $v->mp_idl,
							'umh_shift' => $v->umh_shift,
							'working_days' => $v->working_days,
							'order_monthly' => $v->order_monthly,
							'capacity' => $v->umh_shift,
							'balance' => $v->balance,
							'p_load' => $v->p_load,
							'ot_plan' => $v->ot_plan,
							'ot_hours' => $v->ot_hours,
							'efficiency' => $v->efficiency, 
							'exc_time' => $v->exc_time,
							'tot_productivity' => $v->tot_productivity,
							'tanggal' => $v->tanggal, 
							'mpbuffer' => $v->mpbuffer,
							'attendance' => $v->attendance,
							'downtime' => $v->downtime
							); 
					array_push($atemp, $u_dat);
				}	
				$x++;
			}
			
		} 


		function cmp($a, $b)
		{
		    $a = $a['tanggal']; //date('Y-m-d', strtotime() );
		    $b = $b['tanggal']; //date('Y-m-d', strtotime() );

		    if ($a == $b) {
		        return 0;
		    }
		    return ($a < $b) ? -1 : 1;
		}
		usort($atemp, "cmp");
		
		echo json_encode($atemp);
	}

	
	// WIdget 
	public function getWidgetSaiT()
	{
		$sai = 1;
		$start = ($this->input->post('ystart')).'-07-01';
		$end = ($this->input->post('yend')).'-06-30';
		$out  =  $this->Simulasi_model->getWidgetT($start,$end,$sai); 

		echo json_encode($out);
	}

	public function getWidgetSaiB()
	{
		$sai = 2;
		$start = ($this->input->post('ystart')).'-07-01';
		$end = ($this->input->post('yend')).'-06-30';
		$out  =  $this->Simulasi_model->getWidgetT($start,$end,$sai); 
		
		echo json_encode($out);
	}

	public function getWidgetSaiTotal()
	{ 
		$start = ($this->input->post('ystart')).'-07-01';
		$end = ($this->input->post('yend')).'-06-30';
		$out  =  $this->Simulasi_model->getWidgetTotalSai($start,$end); 
		
		echo json_encode($out);
	}


	// PerCobaan
		public function coba1()
		{
			$id_lstcrln = $this->input->post('id_lstcrln');
			$start = ($this->input->post('ystart'));
			$end = ($this->input->post('yend'));
			// $main_data =  array();
			$mini_data = array();
			// Mengulang sebanyak BUlan Terpilih
			while (strtotime($start) <= strtotime($end)) {
				
				// Mencari data Di Bulan Tersebut
				$data  =  $this->iData_model->cariDataPeriodeSimulasiDate($id_lstcrln,$start);
				// Mengumpulkan Data"
				foreach ($data as $key => $value) {
					# code...
					$dat = $this->iData_model->cariMpByIdLcp($value->id);
					$value->kom_dl = $dat;

					$datr = $this->iData_model->cariMpByIdLcpN($value->id);
					$value->kom_idl = $datr;
					
					$d = $this->iData_model->cariDLPAByIdLcp($value->id);
					$value->kom_dl_pa = $d;
					
					$da = $this->iData_model->cariIDLPAByIdLcp($value->id);
					$value->kom_idl_pa = $da;
				}
				// variabel For Penjumlahan 
					$vald = true;
					$sf = 1; 
				// PENJUMLAHAN  DATA DI (i) BULAN SEKARANG
				for ($i=0; $i < sizeof($data) ; $i++) {  
					$last = sizeof($mini_data)-1;

					if ($i==0) { //Iterasi Pertama
						// cek isi line sudah diisi  
	    					if ($data[$i]->mp_dl==0  || $data[$i]->mp_idl==0) { 
	    						$vald = false; 
	    					}
	    				//in local DB
	    					$dl = array(); $idl=array(); $dlpa=array(); $idlpa=array();
	    					array_push($dl, $data[$i]->kom_dl);
	    					array_push($idl, $data[$i]->kom_idl);
	    					array_push($dlpa, $data[$i]->kom_dl_pa);
	    					array_push($idlpa, $data[$i]->kom_idl_pa); 
	    				// Isi data db
	        				$u_dat = array( 
		    							'is_valid' => $vald,
		    							'shift_qty' => $data[$i]->shift_qty,
										'mp_dl' => $data[$i]->mp_dl,
										'mp_idl' => $data[$i]->mp_idl,
										'umh_shift' => $data[$i]->umh_shift,
										'working_days' => $data[$i]->working_days,
										'order_monthly' => $data[$i]->order_monthly,
										'capacity' => $data[$i]->umh_shift,
										'balance' => $data[$i]->balance,
										'p_load' => $data[$i]->p_load,
										'ot_plan' => $data[$i]->ot_plan,
										'ot_hours' => $data[$i]->ot_hours,
										'efficiency' => $data[$i]->efficiency, 
										'exc_time' => $data[$i]->exc_time,
										'tot_productivity' => $data[$i]->tot_productivity,
										'tanggal' => $data[$i]->tanggal, 
										'mpbuffer' => $data[$i]->mpbuffer,
										'attendance' => $data[$i]->attendance,
										'downtime' => $data[$i]->downtime, 
										'kom_dl' => $dl,
										'kom_idl' => $idl,
										'kom_dl_pa' => $dlpa,
										'kom_idl_pa' => $idlpa
									);
	        				array_push($mini_data, $u_dat);
					}else{
						// cek isi line sudah diisi  
	    					if ( $data[$i]->mp_dl ==0  || $data[$i]->mp_idl == 0) { 
	    						$vald = false; 
	    					}
	    				//in local DB 
	    					// mengambil data dari db Sebelum
	    					$ddl = array_values($mini_data[$last]['kom_dl']);
	    					$iidl = array_values($mini_data[$last]['kom_idl']);
	    					$ddlpa = array_values($mini_data[$last]['kom_dl_pa']);
	    					$iidlpa = array_values($mini_data[$last]['kom_idl_pa']);
	    					// Menggabungkan dengan array sekarang
	    					array_push($ddl, $data[$i]->kom_dl);
	    					array_push($iidl, $data[$i]->kom_idl);
	    					array_push($ddlpa, $data[$i]->kom_dl_pa);
	    					array_push($iidlpa, $data[$i]->kom_idl_pa); 
	    				// Isi data db
	        				$u_dat = array( 
		    							'is_valid' => $vald,
		    							'shift_qty' => $data[$i]->shift_qty,
										'mp_dl' => ($mini_data[$last]['mp_dl']+$data[$i]->mp_dl)/$data[$i]->shift_qty,
										'mp_idl' => ($mini_data[$last]['mp_idl']+$data[$i]->mp_idl)/$data[$i]->shift_qty,
										'umh_shift' => ($mini_data[$last]['umh_shift']+$data[$i]->umh_shift),
										'working_days' => $data[$i]->working_days,
										'order_monthly' => ($mini_data[$last]['order_monthly']+$data[$i]->order_monthly),
										'capacity' => ($mini_data[$last]['umh_shift']+$data[$i]->umh_shift),
										'balance' => ($mini_data[$last]['balance']+$data[$i]->balance),
										'p_load' => ($mini_data[$last]['p_load']+$data[$i]->p_load),
										'ot_plan' => ($mini_data[$last]['ot_plan']+$data[$i]->ot_plan),
										'ot_hours' => ($mini_data[$last]['ot_hours']+$data[$i]->ot_hours),
										'efficiency' => ($mini_data[$last]['efficiency']+$data[$i]->efficiency)/$data[$i]->shift_qty,
										'exc_time' => ($mini_data[$last]['exc_time']+$data[$i]->exc_time),
										'tot_productivity' => ($mini_data[$last]['tot_productivity']+$data[$i]->tot_productivity),
										'tanggal' => $data[$i]->tanggal, 
										'mpbuffer' => ($mini_data[$last]['mpbuffer']+$data[$i]->mpbuffer),
										'attendance' => ($mini_data[$last]['attendance']+$data[$i]->attendance),
										'downtime' => ($mini_data[$last]['downtime']+$data[$i]->downtime), 
										'kom_dl' => $ddl,
										'kom_idl' => $iidl,
										'kom_dl_pa' => $ddlpa,
										'kom_idl_pa' => $iidlpa
									);
	        			$mini_data[$last] = $u_dat;
					}
					$sf++; 
				}

				// array_push($main_data, $mini_data);
				$start  = date( 'Y-m-d', strtotime("+1 months", strtotime($start)) ); 
			}  

			echo json_encode($mini_data);
		}

		public function coba1Total()
		{
			$id_crln = $this->input->post('id_crln');
			$start = ($this->input->post('ystart'));
			$end = ($this->input->post('yend'));
			// $main_data =  array();
			$mini_data = array();
			// Mengulang sebanyak BUlan Terpilih
			while (strtotime($start) <= strtotime($end)) {
				
				// Mencari data Di Bulan Tersebut
				$data  =  $this->iData_model->cariDataTotalPeriodeSimulasiDate($id_crln,$start);
				// Mengumpulkan Data"
					foreach ($data as $key => $value) {
						# code...
						$dat = $this->iData_model->cariMpByIdLcp($value->id);
						$value->kom_dl = $dat;

						$datr = $this->iData_model->cariMpByIdLcpN($value->id);
						$value->kom_idl = $datr;
						
						$d = $this->iData_model->cariDLPAByIdLcp($value->id);
						$value->kom_dl_pa = $d;
						
						$da = $this->iData_model->cariIDLPAByIdLcp($value->id);
						$value->kom_idl_pa = $da;
					}
				// variabel For Counter Penjumlahan 
					$vald = true;
					$sf = 1; 
					$carline_tot = 0; 
				// PENJUMLAHAN  DATA DI (i) BULAN SEKARANG
				for ($i=0; $i < sizeof($data) ; $i++) {  
					$last = sizeof($mini_data)-1;

					if ($i==0) { //Iterasi Pertama
						// cek isi line sudah diisi  
	    					if ($data[$i]->mp_dl==0 || $data[$i]->mp_idl==0) { 
	    						$vald = false; 
	    					} 
	    				// Isi data db
	        				$u_dat = array( 
		    							'is_valid' => $vald,
		    							'shift_qty' => $data[$i]->shift_qty,
		    							
		    							'mp_dl_tmp' => $data[$i]->mp_dl,
										'mp_dl' => 0 ,
										'mp_idl_tmp' => $data[$i]->mp_idl,
										'mp_idl' => 0 ,
										'eff_tmp' => $data[$i]->efficiency,
										'efficiency' => 0,

										'umh_shift' => $data[$i]->umh_shift,
										'working_days' => $data[$i]->working_days,
										'order_monthly' => $data[$i]->order_monthly,
										'capacity' => $data[$i]->umh_shift,
										'balance' => $data[$i]->balance,
										'p_load' => $data[$i]->p_load,
										'ot_plan' => $data[$i]->ot_plan,
										'ot_hours' => $data[$i]->ot_hours, 
										'exc_time' => $data[$i]->exc_time,
										'tot_productivity' => $data[$i]->tot_productivity,
										'tanggal' => $data[$i]->tanggal, 
										'mpbuffer' => $data[$i]->mpbuffer,
										'attendance' => $data[$i]->attendance,
										'downtime' => $data[$i]->downtime
									);
	        				array_push($mini_data, $u_dat);
					}else{
						// cek isi line sudah diisi  
	    					if ($data[$i]->mp_dl==0 || $data[$i]->mp_idl==0) { 
	    						$vald = false; 
	    					} 
	    				// Membagi rata 
	    					$dl_tmp = 0; $idl_tmp = 0; $eff_tmp=0;
	    					if ($data[$i]->shift_qty== $sf) {
	    						// DL
		    						$dlnow = ($mini_data[$last]['mp_dl_tmp']+$data[$i]->mp_dl)/$data[$i]->shift_qty;
		    						$dlnow = $dlnow + $mini_data[$last]['mp_dl']; //Tambah dengan sisa sebelumnya
		    					// IDL
		    						$idlnow = ($mini_data[$last]['mp_idl_tmp']+$data[$i]->mp_idl)/$data[$i]->shift_qty;
		    						$idlnow = $idlnow + $mini_data[$last]['mp_idl']; //Tambah dengan sisa sebelumnya
		    					// EFF
		    						$effnow = ($mini_data[$last]['eff_tmp']+$data[$i]->efficiency)/$data[$i]->shift_qty;
		    						$effnow = $effnow + $mini_data[$last]['efficiency']; //Tambah dengan sisa sebelumnya
		    					// carline end
		    						$carline_tot++;
	    					}else{
	    						// DL
		    						$dl_tmp = $data[$i]->mp_dl;
									$dlnow = $mini_data[$last]['mp_dl']; 
								// IDL
									$idl_tmp = $data[$i]->mp_idl;
									$idlnow = $mini_data[$last]['mp_idl']; 
								// EFF
									$eff_tmp = $data[$i]->efficiency;
									$effnow = $mini_data[$last]['efficiency']; 
	    					}
	    				// Membagi total dari Carline EFFICIENCY
	    					if ($i == (sizeof($data)-1) ) {
	    						$effnow = $effnow/$carline_tot; 
	    					}
	    				// Isi data db
	        				$u_dat = array( 
		    							'is_valid' => $vald,
		    							'shift_qty' => $data[$i]->shift_qty, 
		    							//DL
			    							'mp_dl_tmp' => $dl_tmp ,
											'mp_dl' => $dlnow ,
										// IDL
											'mp_idl_tmp' => $idl_tmp,
											'mp_idl' => $idlnow,
										// EFF
											'eff_tmp' => $eff_tmp,
											'efficiency' => $effnow,

										'umh_shift' => ($mini_data[$last]['umh_shift']+$data[$i]->umh_shift),
										'working_days' => $data[$i]->working_days,
										'order_monthly' => ($mini_data[$last]['order_monthly']+$data[$i]->order_monthly),
										'capacity' => $data[$i]->umh_shift + $mini_data[$last]['capacity'],
										'balance' => ($mini_data[$last]['balance']+$data[$i]->balance),
										'p_load' => ($mini_data[$last]['p_load']+$data[$i]->p_load),
										'ot_plan' => ($mini_data[$last]['ot_plan']+$data[$i]->ot_plan),
										'ot_hours' => ($mini_data[$last]['ot_hours']+$data[$i]->ot_hours), 
										'exc_time' => ($mini_data[$last]['exc_time']+$data[$i]->exc_time),
										'tot_productivity' => ($mini_data[$last]['tot_productivity']+$data[$i]->tot_productivity),
										'tanggal' => $data[$i]->tanggal, 
										'mpbuffer' => ($mini_data[$last]['mpbuffer']+$data[$i]->mpbuffer),
										'attendance' => ($mini_data[$last]['attendance']+$data[$i]->attendance),
										'downtime' => ($mini_data[$last]['downtime']+$data[$i]->downtime)
									);
	        			$mini_data[$last] = $u_dat;
					}
					// Mereset sif
					// jika sif sesuai 
            			if ($data[$i]->shift_qty== $sf) {
            				$sf=0; 
            			}

					$sf++; 
				}

				// array_push($main_data, $mini_data);
				$start  = date( 'Y-m-d', strtotime("+1 months", strtotime($start)) ); 
			}  

			echo json_encode($mini_data);
		}

	
	

}

/* End of file Simulasi.php */
/* Location: ./application/controllers/Simulasi.php */