<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_import extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
					$data[] = array(
						'order_ppc'	=>	$order_ppc,
						'kap_prod'	=>	$kap_prod,
						'Bal'	=>	$Bal,
						'Load_persen'	=>	$Load_persen,
						'ot_hour'	=>	$ot_hour,
						'dl_need'	=>	$dl_need,
						'efficiency'	=>	$efficiency,
						'tanggal'	=>	$tanggal
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}
	}

}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */