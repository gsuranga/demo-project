<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of excelReader
 *
 * @author warunaoshan@gmail.com
 */
class excelReader extends C_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function drawexcelimport() {
        $this->template->draw('excelimport/excelimport', TRUE);
    }

    public function insertToDB() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xml';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error['error']);
        } else {
            $upfile = array('upload_data' => $this->upload->data());

            $this->load->library('/lib/PHPExcel.php');
            $inputFileName = $upfile['upload_data']['full_path'];
            try {

                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objReader->setReadDataOnly(true);
                $objPHPExcel = $objReader->load($inputFileName);

                $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // first sheet  
                $highestRow = $objWorksheet->getHighestRow(); // here 5  
                $highestColumn = $objWorksheet->getHighestColumn(); // here 'E'  
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  // here 5 
                $data = array();
                for ($row = 5; $row <= $highestRow; ++$row) {
                    $rA = array();
                    for ($col = 1; $col < $highestColumnIndex - 1; ++$col) {
                        $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                        if ($col === 1) {
                            $value = gmdate('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($value));
                        }
                        $head = $objWorksheet->getCellByColumnAndRow($col, 4)->getValue();
                        if ($col === 9) {
                            $value = ($objWorksheet->getCellByColumnAndRow($col - 2, $row)->getValue() - $objWorksheet->getCellByColumnAndRow($col - 1, $row)->getValue());
                        }
                        $rA[$head] = $value;
                    }
                    array_push($data, $rA);
                }
                //  $toArray = $objPHPExcel->getActiveSheet()->toArray();
                // $rangeToArray = $objPHPExcel->getActiveSheet()->rangeToArray('B6:J6');
                // print_r($rangeToArray);
                //   print_r(PHPExcel_Shared_Date::ExcelToPHP(40189));

                if (empty($data)) {
                    echo 'Empty';
                } else {
                    $this->load->model('excelreader/excelreader_model');
                    echo $this->excelreader_model->insertToDB($data);
                }
                $objPHPExcel->disconnectWorksheets();
                unset($objPHPExcel);
            } catch (Exception $e) {
                print_r('Format Error');
            }
        }
    }

}
