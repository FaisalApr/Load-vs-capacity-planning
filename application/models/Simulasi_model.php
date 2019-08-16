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
		$q = $this->db->query("SELECT *,main_lcp.id
								FROM main_lcp 
								    JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
								    JOIN carline on carline_has_line.id_carline=carline.id
								WHERE 
									carline.id=$carline AND tanggal>='$stat' AND tanggal<='$end' 
								ORDER BY tanggal ASC");
		return $q->result();
	}

	public function cariDataCarlineTerpilih($carline)
	{
		# code...
		$q = $this->db->query("SELECT *
									FROM carline_has_line 
								WHERE 
								    carline_has_line.id_carline=$carline
								ORDER BY carline_has_line.id_line ASC");
		return $q->result();
	}

	public function cariDataByListCr($lstcr,$stat,$end)
	{
		# code...
		$q = $this->db->query("SELECT *
								FROM main_lcp
								WHERE  
									main_lcp.id_carline_has_line=$lstcr AND
								    main_lcp.tanggal >= '$stat' AND main_lcp.tanggal <= '$end' 
								ORDER BY main_lcp.tanggal ASC");
		return $q->result();
	}

	// Widget TOP SIMULASI
	public function getLstCarlineSai($sai)
	{
		# code...
		$q = $this->db->query("SELECT *,carline.id
								FROM carline  
								    JOIN district ON carline.id_district=district.id
								WHERE
								    district.id=$sai");
		return $q->result();
	}
	public function getWidgetT($stat,$end,$sai)
	{
		$q = $this->db->query("SELECT COALESCE(sum(mp_dl),0) as to_dl,COALESCE(sum(mp_idl),0) as to_idl,COALESCE(sum(umh_shift),0) as cap, COALESCE(sum(order_monthly),0) as mon 
								FROM main_lcp
									JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
								    JOIN carline on carline_has_line.id_carline=carline.id
								    JOIN district on carline.id_district=district.id
								WHERE
									tanggal>='$stat' AND tanggal<='$end' AND
									district.id=$sai"); 
		if($q->num_rows()>0){
			return $q->first_row();
		}else{
			return false;
		} 
	}

	public function getWidgetTotalSai($stat,$end)
	{
		$q = $this->db->query("SELECT COALESCE(sum(mp_dl),0) as to_dl,COALESCE(sum(mp_idl),0) as to_idl,COALESCE(sum(umh_shift),0) as cap, COALESCE(sum(order_monthly),0) as mon 
								FROM main_lcp
									JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
								    JOIN carline on carline_has_line.id_carline=carline.id
								    JOIN district on carline.id_district=district.id
								WHERE
									tanggal>='$stat' AND tanggal<='$end'
								"); 
		if($q->num_rows()>0){
			return $q->first_row();
		}else{
			return false;
		} 
	}


}

/* End of file simulasi.php */
/* Location: ./application/models/simulasi.php */