<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carline extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('carline_model'); 

	}

	public function index()
	{
		
	}


	public function getDataCarline()
	{
		$carl = $this->carline_model->getAllCarline();
		$data = array();

		$i = 0;
		foreach ($carl as $key => $value) {
			
			if ($i==(count($carl)-1)) {
				$tmp = array(
						'id' => $value->id, 
						'text' => $value->nama_carline,
						"selected" => true
					);
			}else{
				$tmp = array(
						'id' => $value->id,
						'text' => $value->nama_carline
					);
			}
			array_push($data, $tmp);
		}

		echo json_encode($data);
	}	

}

/* End of file carline.php */
/* Location: ./application/controllers/carline.php */