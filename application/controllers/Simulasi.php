<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi extends CI_Controller {

	function __construct(){
		parent::__construct();
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
}

/* End of file Simulasi.php */
/* Location: ./application/controllers/Simulasi.php */