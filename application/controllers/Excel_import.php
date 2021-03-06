<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('carline_model');
		$this->load->model('iData_model');
		$this->load->model('carlinehasline_model');
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}
	
	public function index()
	{
		
	}
	public function import()
	{
		# code...
		if(isset($_FILES["file"]["name"]))
		{
			$err = false;
			$not_insert = array(); 

			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				// echo "string";
				// return;
				$highestRow = $worksheet->getHighestRow();
				// $highestRow = 10;
				$highestColumn = $worksheet->getHighestColumn();
				for($row=3; $row<=$highestRow; $row++)
				{
					$tanggal = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$dat = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($tanggal); 
					$tanggal = date_format($dat, 'Y-m-d'); 

					// Cek Isi Column
						$wd	= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						if($wd==null){
							$wd=0;
						}
						$distric = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$namacarline = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$namaline = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

						$mhout_shift = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						if($mhout_shift==null){
							$mhout_shift=0;
						}
						$month_order = $worksheet->getCellByColumnAndRow(7, $row)->getValue();	
						if($month_order==null){
							$month_order=0;
						}
						$efficiency = $worksheet->getCellByColumnAndRow(8, $row)->getFormattedValue();
						if($efficiency==null){
							$efficiency=0;
						}
						$mpdl_shift = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						if($mpdl_shift==null){
							$mpdl_shift=0;
						}
						$shift_qyt = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						if($shift_qyt==null){
							$shift_qyt=0;
						}
						$posisi_sif = $worksheet->getCellByColumnAndRow(11, $row)->getValue(); 
						$capacity_month = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						if($capacity_month==null){
							$capacity_month=0;
						}
						$ot_plan = $worksheet->getCellByColumnAndRow(13, $row)->getFormattedValue();  
						$ot_plan = str_replace(",", ".", $ot_plan);
						if($ot_plan==null || $ot_plan=='#VALUE!' || $ot_plan=='#DIV\/0!'){
							$ot_plan=0;
						}
					
					// mencari id district | STEP 1
					$comp = $this->excel_import_model->cekComp($distric); 
					// jika Distric Notfound
					if (!$comp) {
						// echo json_encode('ERROR - Distric (Baris:'+$row+')');
						return;
					} 

					// Mencari nama Carline | STEP 2
					$carline = $this->excel_import_model->cekNamaCarline($namacarline,$comp->id);
					if (!$carline) {
						// echo json_encode('ERROR - Nama Carline Not Found');
						$dat = array(
										'id_district' => $comp->id,
										'nama_carline' => $namacarline,
										'status' => 1
									); 
						$in = $this->carline_model->newCarline($dat);// Insert Jika Carline Kosong
						if ($in) {
						 	$carline = $this->excel_import_model->cekNamaCarline($namacarline,$comp->id);
						} 
					}

					//  Mencari Nama Line | STEP 3
					$line = $this->excel_import_model->cekNamaLine($namaline);
					if (!$line) { 
						// echo json_encode('ERROR - Line Not Found / new Line');
							$dat = array('nama_line' => $namaline );
						// insert new line
						$this->excel_import_model->createLine($dat);
						$line = $this->excel_import_model->cekNamaLine($namaline);
					}

					// Mencari LIST CARLINE | STEP 4
					$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					// jika tidak ada di list carline
					if (!$lstCarline) {
						// echo json_encode('TIdak Ada Di listCarline'); 		
						$dat = array('id_carline' => $carline->id ,
										'id_line' => $line->id );
						// insert new listCarline
						$carl_insrt = $this->carlinehasline_model->addCarhasLine($dat);
						// carilagi
						$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					} 


					// Jika list Carline Ditemukan
					if ($lstCarline) {
						// pload
						$plod = 0;
						if ($month_order!=0 && $capacity_month!=0 ) {
							$plod = $month_order/$capacity_month*100;	
						} 

						// Membuat Data PPC
						$datas = array(
							'id_carline_has_line' => $lstCarline->id,
							'tanggal' => $tanggal,
							'working_days' => $wd,
							'mhout_shift' => $mhout_shift,
							'order_monthly' => $month_order,
							'efficiency' => $efficiency,
							'mp_dl' => $mpdl_shift,
							'shift_qty' => $shift_qyt,
							'capacity' => $capacity_month,
							'ot_plan' => $ot_plan,
							'p_load' => $plod,
							'balance' => ($capacity_month-$month_order)
						); 

						// Mencari Di Tabel PPC Jika ada data yang sama
						$updt_tanggal = $this->excel_import_model->cektanggal($tanggal,$lstCarline->id); 
						if($updt_tanggal){
							// Jika ditemukan Sama =--> UPDATE
							$updt = $this->excel_import_model->update($datas, $updt_tanggal->id); 
							// Jka terjadi error update
							if (!$updt) {
								$err = true;
								array_push($not_insert, $row);
								// echo json_encode('err:'.$row);
							}

						}else{
							// Tidak ada Data Sama =--> CREATE
							$updt = $this->excel_import_model->insert($datas);	  
 
							// Jka terjadi error insert
							if (!$updt) {
								$err = true;
								array_push($not_insert, $row);
								// echo json_encode('err:'.$row);
							}
						}

						// Memasukkan Data | MAIN LCP
							// order dibagi 
								if ($month_order!=0) {
									$month_order = $month_order/$shift_qyt; 
								}
								
							// jumlah sif
							$sfi = array('1','2');
							for ($i=0; $i <$shift_qyt; $i++) {  

								$i_sif = $sfi[$i];
								// Data notmal LCP (2 Shift)
								$dat = array(
										'id_shift' => $i_sif,
										'id_carline_has_line' => $lstCarline->id,
										'working_days' => $wd,
										'shift_qty' => $shift_qyt,
										'order_monthly' => $month_order,
										'tanggal' => $tanggal
									); 
								// Jika SATU/1 Shift
								if ($shift_qyt==1) {
									
									//Jika Posisi Sif Telah Ditentukan
									if ($posisi_sif!=null) { 
										// Jika Tentukan B
										if ($posisi_sif=='B' || $posisi_sif=='b' ) {
											$i_sif = 2;
											$dat = array(
													'id_shift' => 2,
													'id_carline_has_line' => $lstCarline->id,
													'working_days' => $wd,
													'shift_qty' => $shift_qyt,
													'order_monthly' => $month_order,
													'tanggal' => $tanggal
												); 
										}  
									}

								} 
								
								$cekidat = $this->iData_model->cekIdatasudahada($lstCarline->id, $i_sif, $tanggal);	 

								if ($cekidat) { 
									// jika sudah ada, ===--> mak update 
									$inpro = $this->iData_model->updateDataI($cekidat->id,$dat);
								}else{ 
									// Jika belom , ===--> mak insert
									$inpro = $this->iData_model->insertDataI($dat);
								}

							}

						// END ITERATION 
					}  

				}
			}
			
			echo json_encode($err);
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */