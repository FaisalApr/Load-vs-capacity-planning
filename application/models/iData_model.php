<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class iData_model extends CI_Model {


	public function cariDataPeriode($line,$sf,$stat,$end)
	{
		$q = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$line and id_shift=$sf AND tanggal>='$stat' AND tanggal<='$end'");
		return $q->result();
	}

	public function cariIdataafterinsert($sf,$lstcr,$tgl)
	{
		$q = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$lstcr and id_shift=$sf AND tanggal='$tgl'");
		return $q->first_row();
	}

	public function cekIdatasudahada($lstcr,$sf,$tgl)
	{
		$query = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$lstcr and id_shift=$sf AND tanggal='$tgl'"); 
		if($query->num_rows()>0){
			return $query->first_row();
		}else{
			return false;
		}
	}

	// MP DL
		public function cariMpByIdLcp($id)
		{
			# code...
			$query = $this->db->query("SELECT * FROM komposisi_mp WHERE id_lcp=$id"); 
			
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}

		}
		public function createMP($data)
		{
			# code...
			return $this->db->insert('komposisi_mp', $data);
		}
		public function updateMP($id,$data)
		{
			# code...
			$this->db->where('id_lcp', $id);
			return $this->db->update('komposisi_mp', $data);
		}

	// MP IDL
		public function cariMpByIdLcpN($id)
		{
			# code...
			$query = $this->db->query("SELECT * FROM mp_idl WHERE id_lcp=$id"); 
			
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}
		public function createIdl($data)
		{
			# code...
			return $this->db->insert('mp_idl', $data);
		}
		public function updateIdl($id,$data)
		{
			# code...
			$this->db->where('id_lcp', $id);
			return $this->db->update('mp_idl', $data);
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