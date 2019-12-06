<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style;

class Excel_export extends CI_Controller {
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

	public function downloadSimulasi()
	{
		$data = $this->input->post('data'); 
		$item = $this->input->post('item'); 
        $crline = $this->input->post('crline');
        $line = $this->input->post('line'); 
		
		// Styling
			$s_default = array(
                            'font' => array(   
                                        'size' => 12,
                                        'name' => 'Times New Roman'
                                    )
                        );
			$s_header = array(
                            'font' => array(  
                                        'bold' =>true,
                                        'size' => 16,
                                        'name' => 'Times New Roman'
                                    )
                        );
			$s_border_tabel_info = array( 
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 
                                'color' => array( 
                                    'rgb' => '000000' ) 
                            ); 
		// funcc
			$lett = range('A', 'Z');
			$lett = array_filter(array_merge(array(0), $lett)); 

		// Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            // SEt Default STYLE 
            $spreadsheet->getDefaultStyle()->applyFromArray($s_default);
            // Set document properties
            $spreadsheet->getProperties()->setCreator('PRO-Departement')
                ->setLastModifiedBy('Wi&Fa Media')
                ->setTitle('Office 2007 XLSX Test Document')
                ->setSubject('Office 2007 XLSX Test Document')
                ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Simulasi Data Reports');
            
            // Starting style
            $spreadsheet->getActiveSheet()->getStyle('A:ZZ')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('ffffff');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B2', 'Data Simulasi' )
                        ->setCellValue('A3', 'Carline: '.$crline )
                        ->setCellValue('A4', 'Line: '.$line );
            $spreadsheet->getActiveSheet()->getStyle('B2')->getAlignment()->setHorizontal('center');
            $spreadsheet->getActiveSheet()->getStyle('B2')->applyFromArray($s_header);

            // == Start Tbody ==\
            $row = 7; //=> row start data
            foreach ($item as $it) { 
            	if ($it['view'] == 'true') { // item terpilih untuk di export
            		// CREATE HeRows
            		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$row, $it['name'] );
            		// for isi data
            		$col = 2;
            		foreach ($data as $dkey) {

                        if ( $dkey['is_valid'] == 'true' ) { // jika dat lengkap
                            // cari yang sesuai 
                            $spreadsheet->setActiveSheetIndex(0)->setCellValue( $lett[$col].$row, $dkey[$it['val']] ); 
                        }else{
                            //cukup baris 1
                            if ($row == 7) {
                                $spreadsheet->setActiveSheetIndex(0)->setCellValue( $lett[$col].$row, 'Belum lengkap' );
                            }else{$spreadsheet->setActiveSheetIndex(0)->setCellValue( $lett[$col].$row, '-' );}
                            
                        }
            			
            			$col++;
            		}
            		$row++;
            	} 
            } 
            // == END Tbody ==\\
            // =Start THEAD =\\
            	$col = 2;
            	$row1 = 6; //=> row start header data
            	foreach ($data as $dkey) {
            		// tanggal 
                		$tglparse = DateTime::createFromFormat('Y-m-d', $dkey['tanggal'] );
        			// cari yang sesuai 
        			$spreadsheet->setActiveSheetIndex(0)->setCellValue( $lett[$col].$row1, $tglparse->format('F-Y') );
        			// style dimensi column
        			$spreadsheet->getActiveSheet()->getColumnDimension( $lett[$col])->setWidth(14);
        			$col++;
        		}
            // =ENd THEAD =\\
 			

        //=============================   FINISHING ======================================== 
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18); 
            $spreadsheet->getActiveSheet()->getStyle('A6'.':'.$lett[($col-1)].($row-1))->getBorders()->getAllBorders()->applyFromArray($s_border_tabel_info);
            // END FOCUS
            $spreadsheet->getActiveSheet()->setSelectedCell('A1');
            // Rename worksheet 
            $spreadsheet->getActiveSheet()->setTitle('Simulasi Data');
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);
            
            $writer = new Xlsx($spreadsheet);  
            $filename = "Simulasi Data_".date('Y-m-d g-i').".xlsx";
             
            // unlink('./assets/temp_file/'.$filename);// hapus file lama
            $writer->save('assets/temp_file/'.$filename); // will create and save the file in the root of the project
        
        echo base_url('assets/temp_file/'.$filename); 
	}


}

/* End of file Excel_import.php */
/* Location: ./application/controllers/Excel_import.php */