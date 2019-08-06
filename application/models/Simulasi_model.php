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
}

/* End of file simulasi.php */
/* Location: ./application/models/simulasi.php */