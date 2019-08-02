<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import_model extends CI_Model {

	public function insert($data)
		{
			# code...
			$this->db->insert_batch('ppc_data', $data);
		}	

}

/* End of file excel_import_model.php */
/* Location: ./application/models/excel_import_model.php */