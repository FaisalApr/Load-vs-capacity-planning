<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class carlinehasline_model extends CI_Model {

	public function addCarhasLine($dat)
	{
		return $this->db->insert('carline_has_line',$dat);
	}
	
	public function getChLByCrln($id)
	{ 
		$que = $this->db->query("SELECT *,carline_has_line.id as id_carhasl from carline_has_line join line on carline_has_line.id_line=line.id where id_carline=$id ");

		return $que->result();
	}		

	public function getAllCarline()
	{
		$que = $this->db->query("SELECT carline.nama_carline,carline.id
									from carline 
									    Left JOIN carline_has_line ON carline_has_line.id_carline=carline.id 
                                    GROUP BY carline.id
									ORDER BY carline.nama_carline");
		return $que->result();
	}

	public function getChLbyId($id)
	{
		$que = $this->db->query("SELECT carline_has_line.id AS id, line.nama_line AS text
									FROM carline_has_line
										JOIN line ON carline_has_line.id_line=line.id
									WHERE 
										carline_has_line.id_carline=$id");
		return $que->result();
	}

	public function getChLbyId2($id)
	{
		$que = $this->db->query("SELECT *
									FROM carline_has_line
										JOIN line ON carline_has_line.id_line=line.id
									WHERE 
										carline_has_line.id_carline=$id");
		return $que->result();
	}

	public function delLstCarline($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('carline_has_line');
	}
}

/* End of file carlinehasline_model.php */
/* Location: ./application/models/carlinehasline_model.php */