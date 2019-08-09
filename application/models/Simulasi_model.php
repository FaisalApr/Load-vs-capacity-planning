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
	
	public function cariDataPeriode($line,$stat,$end)
	{
		# code...
		$q = $this->db->query("SELECT * FROM ppc_data where id_carline_has_line=$line AND tanggal>='$stat' AND tanggal<='$end'");
		return $q->result();
	}

	public function cariDataPeriodeTotalPpc($carline,$stat,$end)
	{
		# code...
		$q = $this->db->query("SELECT * 
								FROM ppc_data 
									JOIN
									carline_has_line on ppc_data.id_carline_has_line=carline_has_line.id
								    JOIN carline on carline_has_line.id_carline=carline.id
								WHERE 
									carline.id=$carline AND tanggal>='$stat' AND tanggal<='$end' ORDER BY tanggal ASC");
		return $q->result();
	}

	public function cariDataPeriodeTotalProd($carline,$stat,$end)
	{
		# code...
		$q = $this->db->query("SELECT * 
								FROM main_lcp 
								    JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
								    JOIN carline on carline_has_line.id_carline=carline.id
								WHERE 
									carline.id=$carline AND tanggal>='$stat' AND tanggal<='$end' ORDER BY tanggal ASC");
		return $q->result();
	}


}

/* End of file simulasi.php */
/* Location: ./application/models/simulasi.php */