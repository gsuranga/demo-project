<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_excell
 *
 * @author Lucky212
 */
class stock_excell extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function importExcellData() {

        try {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xlsx|xml|xls';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $GLOBALS['message'] = $error['error'];
            } else {

                $upfile = array('upload_data' => $this->upload->data());

                $this->load->library('/lib/PHPExcel.php');
                $inputFileName = $upfile['upload_data']['full_path'];

                try {

                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    print_r($objReader);
                    $objReader->setReadDataOnly(true);











                    $setLoadSheetsOnly = $objReader->setLoadSheetsOnly(0);
//                    echo 'A';
                    $objPHPExcel = $objReader->load($inputFileName);

                    $sheetNames = $objPHPExcel->getSheetCount();

                    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

                    $highestRow = $objWorksheet->getHighestRow();
                    $highestColumn = $objWorksheet->getHighestColumn(); // here 'E'
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  // here 5
//                    echo $highestColumnIndex . " " . $highestRow;

                    $data = array();
                    for ($row = 1; $row < $highestRow + 1; ++$row) {
                        $rA = array();
                        for ($col = 0; $col < $highestColumnIndex; $col++) {
                            $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                            $columnLetter = PHPExcel_Cell::stringFromColumnIndex($col);
                            $rA[$columnLetter] = $value;
                        }
                        array_push($data, $rA);
                    }
                    $json_encode = json_encode($data);
                    $this->load->model('stockexcell/stockexcell_model');
                    $insertToDB = $this->stockexcell_model->updateExportExcel($json_encode, $highestRow);



//                    $insertToDB == 1 ? $GLOBALS['message'] = "Master file successfully uploaded" : "Some errors occured while uploading";
//                    $this->drawUploadSuccess();
                    //if ($insertToDB > 0) {
                    //redirect('reports/drawindexTer', 'refresh');
                    // }





                    $objPHPExcel->disconnectWorksheets();
                    unlink($inputFileName);
                    unset($objPHPExcel);
                } catch (Exception $e) {
//                    print_r('Format Error');
//                    $GLOBALS['message'] = $error['error'];
//                    $this->drawUploadSuccess();
                }
            }
            header('Location:' . base_url() . 'item/drawIndexManageItem');
        } catch (Exception $exc) {
            
        }
    }

    public function importExcellData2() {
        

        try {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'xlsx|xml|xls';
            $this->load->library('upload', $config);
            
//            new parts
            
          
            
            //end new
            
            

            if (!$this->upload->do_upload()) {

                $error = array('error' => $this->upload->display_errors());
                $GLOBALS['message'] = $error['error'];
            } else {

                $upfile = array('upload_data' => $this->upload->data());

                $this->load->library('/lib/PHPExcel.php');
                $inputFileName = $upfile['upload_data']['full_path'];

                try {

                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    print_r($objReader);
                    $objReader->setReadDataOnly(true);

 

                    $setLoadSheetsOnly = $objReader->setLoadSheetsOnly(0);
//                    echo 'A';
                    $objPHPExcel = $objReader->load($inputFileName);

                    $sheetNames = $objPHPExcel->getSheetCount();

                    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

                    $highestRow = $objWorksheet->getHighestRow();
                    $highestColumn = $objWorksheet->getHighestColumn(); // here 'E'
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  // here 5
//                    echo $highestColumnIndex . " " . $highestRow;

                    $data = array();
                    for ($row = 1; $row < $highestRow + 1; ++$row) {
                        $rA = array();
                        for ($col = 0; $col < $highestColumnIndex; $col++) {
                            $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                            $columnLetter = PHPExcel_Cell::stringFromColumnIndex($col);
                            $rA[$columnLetter] = $value;
                        }
                        array_push($data, $rA);
                    }
                    $json_encode = json_encode($data);
                    $this->load->model('stockexcell/stockexcell_model');
                    $insertToDB = $this->stockexcell_model->updateExportExcelStock($json_encode, $highestRow);

 
                    $objPHPExcel->disconnectWorksheets();
                    unlink($inputFileName);
                    unset($objPHPExcel);
                } catch (Exception $e) {
                    
                }
            }
            header('Location:' . base_url() . 'stock/drawIndexStock');
        } catch (Exception $exc) {
            
        }
    }

}

?>
