<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carline extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		$this->load->model('carline_model'); 
		$this->load->model('carlinehasline_model'); 
	}

	public function index()
	{
		$this->load->view('carline/carline_home');
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


	public function showCarline()
	{
		$data = $this->carline_model->getAllCarline();
		foreach ($data as $key => $value) {
			// mengisi atribut data
			$value->data = $this->carlinehasline_model->getChLbyId($value->id);
		}
		echo json_encode($data);
	}

	public function showListCarline()
	{
		$id = $this->input->post('id');
		$dat = $this->carlinehasline_model->getChLbyId($id);
		
		echo json_encode($dat);
	}

	public function newCarline()
	{
		$data = array(
					'id_district' => $this->input->post('dis'),
					'nama_carline' => $this->input->post('nama'),
					'status' => 1
				);
		$res = $this->carline_model->newCarline($data);
		echo json_encode($res);
	}

	public function deleteCarline()
	{
		$id = $this->input->post('id');
		$res = $this->carline_model->delCarline($id);

		echo json_encode($res);
	}

	public function editCarline()
	{
		$id = $this->input->post('id');
		$data = array(
					'id_district' => $this->input->post('dis'),
					'nama_carline' => $this->input->post('nama')
				);
		$res = $this->carline_model->editCarline($data, $id);
		echo json_encode($res);
	}

	public function deleteLstCarline()
	{
		$id = $this->input->post('id');

		$res = $this->carlinehasline_model->delLstCarline($id);
		echo json_encode($res);
	}
}

/* End of file carline.php */
/* Location: ./application/controllers/carline.php */