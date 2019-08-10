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

}

/* End of file Simulasi.php */
/* Location: ./application/controllers/Simulasi.php */