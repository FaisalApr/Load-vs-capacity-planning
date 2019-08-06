<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('carline_model');
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
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				// echo "string";
				// return;
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=3; $row<=$highestRow; $row++)
				{
					$tanggal = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$wd	= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$distric = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$namacarline = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$namaline = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$mhout_shift = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$month_order = $worksheet->getCellByColumnAndRow(7, $row)->getValue();	
					$efficiency = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$mpdl_shift = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$shift_qyt = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$capacity_month = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					$ot_plan = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
					$ot_hour = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
					// mencari id district
					
					$comp = $this->excel_import_model->cekComp($distric); 
					// jika Distric Notfound
					if (!$comp) {
						echo json_encode('ERROR - Distric');
						return;
					}

					$carline = $this->excel_import_model->cekNamaCarline($namacarline,$comp->id);

					if (!$carline) {
						echo json_encode('ERROR - Nama Carline Not Found');
						$dat = array(
										'id_district' => $comp->id,
										'nama_carline' => $namacarline,
										'status' => 1
									);
						$this->carline_model->newCarline($dat);
						$carline = $this->excel_import_model->cekNamaCarline($namacarline,$comp->id);
					}

					$line = $this->excel_import_model->cekNamaLine($namaline);
					if (!$line) { 
						echo json_encode('ERROR - Line Not Found / new Line');

							$dat = array('nama_line' => $namaline );
						// insert new line
						$this->excel_import_model->createLine($dat);
						$line = $this->excel_import_model->cekNamaLine($namaline);
					}

					$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);

					// jika tidak ada di list carline
					if (!$lstCarline) {
						echo json_encode('TIdak Ada Di listCarline'); 
						
						$dat = array('id_carline' => $carline->id ,
										'id_line' => $line->id );
						// insert new listCarline
						$this->carlinehasline_model->addCarhasLine($dat);
						// carilagi
						$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					}

					
					if ($lstCarline) {
						// No Linemanager foundd
						$datas = array(
							'tanggal' => $tanggal,
							'working_days' => $wd,
							'mhout_shift' => $mhout_shift,
							'order_monthly' => $month_order,
							'efficiency' => $efficiency,
							'mp_dl' => $mpdl_shift,
							'shift_qty' => $shift_qyt,
							'capacity' => $capacity_month,
							'ot_hours' => $ot_plan,
							'ot_plan' => $ot_hour,
							'p_load' => $month_order/$capacity_month*100
						);
						
						echo json_encode($tanggal);
						return;
						$updt_tanggal = $this->excel_import_model->cektanggal($tanggal);
						echo json_encode($updt_tanggal);
						// 	return;
						if($updt_tanggal){
							$updt = $this->excel_import_model->update($datas, $updt_tanggal->id);
							echo json_encode('up');

						}else{
							$this->excel_import_model->insert($datas);	
							echo json_encode('in');
						}
					}  

				}
			}
			
			echo 'Data Imported successfully';
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */