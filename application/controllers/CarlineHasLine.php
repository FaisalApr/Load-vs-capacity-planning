<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarlineHasLine extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('carlinehasline_model');
		$this->load->model('line_model');
	}

	public function index()
	{
		
	}


	public function getLisAllCHL()
	{
		$chl = $this->carlinehasline_model->getAllCarline();
		$data = array();
		foreach ($chl as $key => $value) {
			$da = $this->carlinehasline_model->getChLbyId($value->id);
			array_push($data, 
							array(
								'text' => $value->nama_carline,
								'children' => $da
							)
						);
		}

		echo json_encode($data);
	}

	public function getListChlNotPick()
	{ 
		$idcrln  = $this->input->post('id');
		
		$lineselected = $this->carlinehasline_model->getChLbyId2($idcrln);
		$arr_where = [];
		// jika ini array
		if (is_array($lineselected)) {  
			foreach ($lineselected as $key) {
				$tmp = array(
					'key' => 'id !=',
					'value' => $key->id_line
					);
				array_push($arr_where, $tmp);
			}
		}
		$data = $this->line_model->getLineArrWhere($arr_where);

		echo json_encode($data);
	}

	public function addCarHasLine()
	{
		$id = $this->input->post('id');
		$selctmgr = $this->input->post('lnmgr'); 
		$ins = true;

		if (is_array($selctmgr)) {
			foreach ($selctmgr as $key => $value) {
				$da = array(
							'id_carline' => $id,
							'id_line' => $value
						);	
				$ins = $this->carlinehasline_model->addCarhasLine($da);
			}	

		}

		echo json_encode($ins);
	}

}

/* End of file carlineHasLine.php */
/* Location: ./application/controllers/carlineHasLine.php */