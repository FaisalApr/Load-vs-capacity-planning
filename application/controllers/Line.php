<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('carlinehasline_model'); 

	}

	public function index()
	{
		
	}


	public function getDataListCarLineHasLine()
	{
		$id_cr = $this->input->post('crln');

		$chl = $this->carlinehasline_model->getChLByCrln($id_cr);
		$data = array();

		$i = 0;
		foreach ($chl as $key => $value) {
			
			if ($i==(count($chl)-1)) {
				$tmp = array(
						'id' => $value->id_carhasl, 
						'text' => $value->nama_line,
						"selected" => true
					);
			}else{
				$tmp = array(
						'id' => $value->id_carhasl,
						'text' => $value->nama_line
					);
			}
			array_push($data, $tmp);
		}

		echo json_encode($data);
	}	

}

/* End of file carline.php */
/* Location: ./application/controllers/carline.php */