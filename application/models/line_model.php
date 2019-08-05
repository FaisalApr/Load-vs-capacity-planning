<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class line_model extends CI_Model {

	



	public function getLineArrWhere($arr)
	{
		$this->db->select('id,nama_line as text');
		foreach ($arr as $key => $value) {
			$this->db->where($value['key'],$value['value']);
		}
		$q = $this->db->get('line');
		return $q->result();
	}

}

/* End of file line_model.php */
/* Location: ./application/models/line_model.php */