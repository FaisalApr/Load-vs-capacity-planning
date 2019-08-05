<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IData extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		$this->load->model('iData_model'); 

	}

	public function index()
	{  
		$this->load->view('idata/IData_v');
	}


	public function getIData()
	{
		$id_lstcrln = $this->input->post('id_lstcrln');
		$shift = $this->input->post('shift');
		$start = ($this->input->post('ystart')).'-07-01';
		$end = ($this->input->post('yend')).'-06-30';

		$data  =  $this->iData_model->cariDataPeriode($id_lstcrln,$shift,$start,$end);

		echo json_encode($data);
	}
	

	public function updateIData()
	{ 
		$id = $this->input->post('id');
		$col = $this->input->post('col');

		// jika ini data baru
		if ($id == 0) {//data baru
			$data = array(
						'id_shift' => $this->input->post('sif'), 
						'id_carline_has_line' => $this->input->post('lst_cr'), 
						$col => $this->input->post('val'),
						'tanggal' => $this->input->post('tgl')
					);
			$res = $this->iData_model->insertDataI($data);
		}else{//upadte data 
			$data = array(
						$col => $this->input->post('val')
					);

			$res = $this->iData_model->updateDataI($id,$data);
		} 

		echo json_encode($res);
	}



}

/* End of file iData.php */
/* Location: ./application/controllers/iData.php */