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


	public function newMP()
	{
		# code... 
		// init
		$output = array('error' => false);

		//data new
		$dataMP = array(
			'id_lcp' => $this->input->post('id_lcp'),
			'housing_bt' => $this->input->post('housing_bt'),
			'insert_plug' => $this->input->post('insert_plug'),
			'setting' => $this->input->post('setting'),
			'taping' => $this->input->post('taping'),
			'sp' => $this->input->post('sp'),
			'offline' => $this->input->post('offline'),
			'grommet' => $this->input->post('grommet'),
			'housing_ck' => $this->input->post('housing_ck'),
			'checker_gri' => $this->input->post('checker_gri'),
			'dimchecker_sig	' => $this->input->post('dimchecker_sig'),
			'vis' => $this->input->post('vis'),
			'total' => $this->input->post('total'),
		);

		$cari = $this->iData_model->cariMpByIdLcp($this->input->post('id_lcp'));
		if($cari){
			$result = $this->iData_model->updateMP($cari->id_lcp,$dataMP);
		}else{
			// insert data new MP
			$result = $this->iData_model->createMP($dataMP);	
		}
		$updt = array(
			'mp_dl' => $this->input->post('total')
		);
		$res = $this->iData_model->updateDataI($this->input->post('id_lcp'),$updt);

		if($result){
			$output ['status'] = "sukses";
		}else{
			$output['error'] = true;
		}
		echo json_encode($result);
		

	}

	public function getIData()
	{
		$id_lstcrln = $this->input->post('id_lstcrln');
		$shift = $this->input->post('shift');
		$start = ($this->input->post('ystart')).'-07-01';
		$end = ($this->input->post('yend')).'-06-30';

		$data  =  $this->iData_model->cariDataPeriode($id_lstcrln,$shift,$start,$end);
		foreach ($data as $key => $value) {
			# code...
			$dat = $this->iData_model->cariMpByIdLcp($value->id);
			$value->kom_dl = $dat;
		}
		echo json_encode($data);
	}

	public function getIDataMonthPick()
	{
		$id_lstcrln = $this->input->post('id_lstcrln');
		$shift = $this->input->post('shift');
		$start = ($this->input->post('ystart'));
		$end = ($this->input->post('yend'));

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
			// cari
			$res = $this->iData_model->cariIdataafterinsert($this->input->post('sif'), $this->input->post('lst_cr'), $this->input->post('tgl'));
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