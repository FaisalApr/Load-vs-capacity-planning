<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisor_model extends CI_Model {

	public function createSpv($data)
	{
		# code...
		return $this->db->insert('supervisor',$data);
	}

	public function getSpv()
	{
		# code...
	
		$query = $this->db->query('SELECT *,spv_manager.id as id_manager, supervisor.id as id_sup from supervisor left join spv_manager on supervisor.id = spv_manager.id_supervisor ');
		return $query->result();
	}

	public function delSpv($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('supervisor');
		return $result;

	}

	public function updateSpv($id,$nik,$nama,$passcode)
	{
		# code...
		$data = array(
			'nama' => $nama,
			'nik' => $nik,
			'passcode' => $passcode
		);

		$this->db->where('id',$id);
		return $this->db->update('supervisor',$data);
	}

	// Spv Manager
	public function createSpvMan($data)
	{
		# code...
		return $this->db->insert('spv_manager', $data);
	}

	public function getSpvManById($id)
	{
		# code...
		$q = $this->db->query('SELECT line.nama_line FROM spv_manager join line on spv_manager.id_sisi = line.id_sisi where spv_manager.id='.$id.' ');
		return $q->result();
	}
	public function get_all_level()
	{
		# code...
		$query = $this->db->get('sisi');
        return $query->result();
	}
	
	public function delSpvMan($id)
	{
		# code...
		$this->db->where('id',$id);
		$result = $this->db->delete('spv_manager');
		return $result;
	}

}

/* End of file supervisor_model.php */
/* Location: ./application/models/supervisor_model.php */