<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	
	public function getAllUser()
	{
		$q = $this->db->get('user');
		return $q->result();
	}


	public function deleteUserrr($id)
	{ 
		$this->db->where('id',$id);
 		return $this->db->delete('user');
	}

	public function userBaru($data)
	{  
 		return $this->db->insert('user',$data);
	}

	public function newUserHasLine($data)
	{
		return $this->db->insert('user_has_line',$data);
	}

	public function editUserrr($data,$id)
	{ 
		$this->db->where('id',$id);
 		return $this->db->update('user',$data);
	}

	public function carUserNik($nik)
	{
		$que = $this->db->query("select * from user where nik=$nik");
		return $que->first_row();
	}

	public function delUserHasLine($id)
	{ 
		return $this->db->query("DELETE FROM user_has_line WHERE user_has_line.id_user = $id");
	}

	public function cariUserHasLine($usr)
	{
		$que = $this->db->query("select *
								from user_has_line 
									join carline_has_line on user_has_line.id_list_carline=carline_has_line.id 
									join line on carline_has_line.id_line=line.id
									where id_user=$usr");
		return $que->result();
	}


}

/* End of file users_model.php */
/* Location: ./application/models/users_model.php */