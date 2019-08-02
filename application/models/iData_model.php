<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class iData_model extends CI_Model {


	public function cariDataPeriode($line,$sf)
	{
		$q = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$line and id_shift=$sf");
		return $q->result();
	}
	
	public function insertDataI($data)
	{ 
 		return $this->db->insert('main_lcp', $data);
	}

	public function updateDataI($id,$data)
	{ 
		$this->db->where('id',$id);
 		return $this->db->update('main_lcp', $data);
	}

}

/* End of file iData_model.php */
/* Location: ./application/models/iData_model.php */