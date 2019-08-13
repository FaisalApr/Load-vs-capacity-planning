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

		// echo json_encode($atemp);
		// echo json_encode($data); 
	}

	   
	

}

/* End of file Simulasi.php */
/* Location: ./application/controllers/Simulasi.php */