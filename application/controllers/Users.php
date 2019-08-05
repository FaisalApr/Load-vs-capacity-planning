<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Users_model');   
		$this->load->model('carlinehasline_model'); 		 
	}

	public function index()
	{  	 
		$this->load->view('users/home_user');	
	}




	//  ======= AJAX. ========
	public function addUser()
	{  
		// new user data
		$us = array(
					'nama' => ($this->input->post('nama')),
					'nik' => ($this->input->post('nik')), 
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pass'),
					'level' => 2
				);	 

		$data = $this->Users_model->userBaru($us); 
		if ($data) {
			// cari data user yang baru di insert
			$usr = $this->Users_model->carUserNik($this->input->post('nik')); 
			$arrline = $this->input->post('linemgr');
			 
			if (is_array($arrline)) {
				$tmp = array();
				foreach($arrline as $vl) { 
				    $ne = array(
					    	'id_user' => $usr->id,
					    	'id_list_carline' => $vl
					    );
				    array_push($tmp, $ne);

				    $this->Users_model->newUserHasLine($ne);
				}
 
			}else{
				echo json_encode('NOOOO');
			}
		}

		echo json_encode($data); 
	}

	public function updateUser()
	{    
		$id = $this->input->post('idu');
		// new user data
		$usr = array(
					'nama' => ($this->input->post('nama')),
					'nik' => ($this->input->post('nik')), 
					'username' => $this->input->post('uname'),
					'password' => $this->input->post('pass')
				);	 
		// update data
		$data = $this->Users_model->editUserrr($usr,$id);  
		if ($data) {
			// jik sukses update data
			$arrline = $this->input->post('linemgr');
			// delete all has line
			$del = $this->Users_model->delUserHasLine($id);
			if ($del) {
				if (is_array($arrline)) {
					$tmp = array();
					foreach($arrline as $vl) { 
					    $ne = array(
						    	'id_user' => $id,
						    	'id_list_carline' => $vl
						    );
					    array_push($tmp, $ne);

					    $this->Users_model->newUserHasLine($ne);
					}
	 
				}else{
					echo json_encode('NOOOO');
				}
			} 
		}
		echo json_encode($del); 
	}

	public function delUser()
	{
		$data = $this->Users_model->deleteUserrr($this->input->post('id'));

		echo json_encode($data);
	}

	public function showUser()
	{
		$all = $this->Users_model->getAllUser();
		foreach ($all as $key => $value) {
			// mencari jobline si users
			$d = $this->Users_model->cariUserHasLine($value->id);
			$value->linemgr = $d;
		}
		echo json_encode($all);
	}

	public function searchUsername()
	{
		$data = $this->Users_model->getUsername($this->input->post('uname'));	
		echo json_encode($data);
	}

	public function joblineUser()
	{
		$job = $this->Users_model->cariUserHasLine($this->input->post('id'));
		
		$chl = $this->carlinehasline_model->getAllCarline();
		$data = array();
		

		foreach ($chl as $key => $value) {
			$da = $this->carlinehasline_model->getChLbyId($value->id);
			// mencari data didalam child
			foreach ($da as $va => $val) {
				
				foreach ($job as $k => $jobln) {
					// jika sama dengan jobline si user
					if ($jobln->id_list_carline==$val->id) {
						$val->selected = true;
					}
				}
			}
			array_push($data, 
							array(
								'text' => $value->nama_carline,
								'children' => $da
							)
						);
		}	 
		echo json_encode($data);
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */