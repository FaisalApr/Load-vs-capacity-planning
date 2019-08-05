<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulasi_model extends CI_Model {
	public function getDat()
	{
		# code...
		$q = $this->db->query('SELECT *
								FROM ppc_data');
		return $q->result();
	}
	

}

/* End of file simulasi.php */
/* Location: ./application/models/simulasi.php */