<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('carline_model');
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
				for($row=2; $row<=$highestRow; $row++)
				{
					$order_ppc = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$kap_prod = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$Bal = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$Load_persen = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$ot_hour = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$dl_need = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$efficiency = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$tanggal = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$namaline = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$namacarline = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$distric = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
					$wd	= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
					// $data[] = array(
						// 'order_ppc'	=>	$order_ppc,
						// 'kap_prod'	=>	$kap_prod,
						// 'Bal'	=>	$Bal,
						// 'Load_persen'	=>	$Load_persen,
						// 'ot_hour'	=>	$ot_hour,
						// 'dl_need'	=>	$dl_need,
						// 'efficiency'	=>	$efficiency,
						// 'tanggal'	=>	$tanggal
					// );
					// mencari id district
					// echo json_encode($distric);
					// return;
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

							$dat = array('nama_line' => $namaLine );
						// insert new line
						$this->excel_import_model->createLine($dat);
						$line = $this->excel_import_model->cekNamaLine($namaLine);
					}

					$lstCarline = $this->excel_import_model->cekListCarlineOnCrnLn($carline->id,$line->id);
					// echo json_encode($lstCarline);
					// return;
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

					// $linMgr = $this->excel_import_model->ceklistcarline($lstCarline->id);
					// echo json_encode($linMgr);
					// return;
					if ($lstCarline) {
						// No Linemanager foundd
						$datas = array(
							'id_carline_has_line'	=>	$lstCarline->id,
							'order_ppc'	=>	$order_ppc,
							'kap_prod'	=>	$kap_prod,
							'Bal'	=>	$Bal,
							'Load_persen'	=>	$Load_persen,
							'ot_hour'	=>	$ot_hour,
							'dl_need'	=>	$dl_need,
							'efficiency'	=>	$efficiency,
							'tanggal'	=>	$tanggal,
							'working_days' => $wd
						);
						// echo json_encode($datas);
						// $this->excel_import_model->insert($datas);
						echo json_encode($tanggal);
						$updt_tanggal = $this->excel_import_model->cektanggal($tanggal);
						echo json_encode($updt_tanggal);
						// 	return;
						if($updt_tanggal){
							// echo json_encode($updt_tanggal);
							// return;
							
							$updt = $this->excel_import_model->update($datas, $updt_tanggal->id);
							echo json_encode('up');

						}else{
							$this->excel_import_model->insert($datas);	
							echo json_encode('in');
						}
					}  

				}
			}
			
			// echo 'Data Imported successfully';
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */