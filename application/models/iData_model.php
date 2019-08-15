<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class iData_model extends CI_Model {


	public function cariDataPeriode($line,$sf,$stat,$end)
	{
		$q = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$line and id_shift=$sf AND tanggal>='$stat' AND tanggal<='$end'");
		return $q->result();
	}

	public function cariDataPeriodeSimulasi($line,$stat,$end)
	{
		$q = $this->db->query("SELECT * FROM main_lcp where id_carline_has_line=$line AND tanggal>='$stat' AND tanggal<='$end' ORDER BY tanggal ASC");
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
			$query = $this->db->query("SELECT 
											dl.id_lcp,
											dl.housing_bt,dl.insert_plug,dl.setting,dl.taping,dl.sp,dl.offline,dl.grommet,dl.housing_ck,dl.checker_gri,dl.dimchecker_sig,dl.vis,dl.total,
										    line.nama_line,shift.keterangan
										FROM komposisi_mp as dl
											JOIN main_lcp ON dl.id_lcp=main_lcp.id
											JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
										    JOIN line on carline_has_line.id_line=line.id
										    JOIN shift ON main_lcp.id_shift=shift.id
										WHERE id_lcp=$id"); 
			
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
			$query = $this->db->query("SELECT 
											idl.id_lcp,
											idl.tpo,idl.tpo,idl.material_supply,idl.circuit_supply,idl.supply_fuse,idl.chorobiki,idl.pic_repair,idl.tanoko_ass,idl.tanoko_insp,idl.gl_ass,idl.gl_insp,
										    idl.line_leader,idl.total,
										    line.nama_line,shift.keterangan
										FROM mp_idl as idl
											JOIN main_lcp ON idl.id_lcp=main_lcp.id
											JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
										    JOIN line on carline_has_line.id_line=line.id
										    JOIN shift ON main_lcp.id_shift=shift.id
										WHERE id_lcp=$id"); 
			
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

	// MP DL PA
		public function cariDLPAByIdLcp($id)
		{
			# code...
			$query = $this->db->query("SELECT 
											dlpa.id_lcp,
										    dlpa.cutting,dlpa.midle,dlpa.manual,dlpa.twist,dlpa.shield,dlpa.acc,dlpa.bonder,dlpa.raycham,dlpa.joint,dlpa.hv,dlpa.end_strip,dlpa.total,
										    line.nama_line,shift.keterangan
										FROM mp_dl_pa as dlpa
											JOIN main_lcp ON dlpa.id_lcp=main_lcp.id
											JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
										    JOIN line on carline_has_line.id_line=line.id
										    JOIN shift ON main_lcp.id_shift=shift.id
										WHERE id_lcp=$id"); 
			
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}

		}
		public function createDLPA($data)
		{
			# code...
			return $this->db->insert('mp_dl_pa', $data);
		}
		public function updateDLPA($id,$data)
		{
			# code...
			$this->db->where('id_lcp', $id);
			return $this->db->update('mp_dl_pa', $data);
		}

	// MP IDL PA 
		public function cariIDLPAByIdLcp($id)
		{
			# code...
			$query = $this->db->query("SELECT 
											idlpa.id_lcp,
										    idlpa.line_leader,idlpa.group_leader,idlpa.inspector,idlpa.bundling,idlpa.csu,idlpa.tanoko_ass,idlpa.tanoko_insp,idlpa.sao_bonder,
										    idlpa.helper_cuting,idlpa.chorobiki,idlpa.helper_raycham,idlpa.hunter,idlpa.total,
										    line.nama_line,shift.keterangan
										FROM mp_idl_pa as idlpa
											JOIN main_lcp ON idlpa.id_lcp=main_lcp.id
											JOIN carline_has_line on main_lcp.id_carline_has_line=carline_has_line.id
										    JOIN line on carline_has_line.id_line=line.id
										    JOIN shift ON main_lcp.id_shift=shift.id
										WHERE id_lcp=$id");  
			if($query->num_rows()>0){
				return $query->first_row();
			}else{
				return false;
			}
		}
		public function createIDLPA($data)
		{
			# code...
			return $this->db->insert('mp_idl_pa', $data);
		}
		public function updateIDLPA($id,$data)
		{
			# code...
			$this->db->where('id_lcp', $id);
			return $this->db->update('mp_idl_pa', $data);
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