<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import_model extends CI_Model {

	public function insert($data)
	{
		# code...
		$this->db->insert('ppc_data', $data);
	}
	public function update($data, $id)
	{
		# code...
		$this->db->where('id',$id);
		return $this->db->update('ppc_data', $data);
	}

	// import
		public function cektanggal($nama)
		{ 
			# code...
			$query = $this->db->query("SELECT * 
										FROM ppc_data 
										where year(tanggal)=year('$nama') AND month(tanggal)=month('$nama')");
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}
		public function cekComp($nama)
		{ 
			# code...
			$query = $this->db->query('SELECT * FROM district where nama="'.$nama.'"');
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}

		public function cekNamaCarline($nama,$id)
		{ 
			# code...
			$query = $this->db->query("SELECT * FROM carline WHERE id_district='".$id."' AND nama_carline='".$nama."'");
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}

		public function cekNamaLine($nama)
		{ 
			# code...
			$query = $this->db->query('SELECT * FROM line where nama_line="'.$nama.'"');
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}
		// mencari di list carline id carline n Line
			public function cekListCarlineOnCrnLn($cl,$ln)
			{ 
				# code...
				$query = $this->db->query("SELECT * FROM carline_has_line WHERE id_carline=$cl AND id_line=$ln");
				if($query->num_rows()>0){
					return $query->first_row();
				}else{
					return false;
				}
			}
	// Line
		public function createLine($data)
		{
			# code...
			return $this->db->insert('line',$data);
		}


}

/* End of file excel_import_model.php */
/* Location: ./application/models/excel_import_model.php */