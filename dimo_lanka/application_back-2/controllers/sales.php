<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of all_sales
 *
 * @author SHDINESH
 */
class sales extends C_Controller {

    private static $message;

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexUploadSales() {
        //$this->template->attach($this->resours);
        $this->template->draw('sales/index_upload_sales', true);
    }

    public function getMessage() {
        // return $message;
    }

    public function drawUploadSales() {
        $this->load->model('area/area_model');
        $allAreas = $this->area_model->getAllAreas();
        $this->template->draw('sales/upload_sales_sheets', false, $allAreas);
    }

    public function drawUploadSuccess() {
        $this->template->draw('sales/upload_success', true);
    }

    public function insertSalesToDB() {
        try {
            // ob_start();
            if (!is_dir('upload_DLR/')) {
                mkdir('./upload_DLR/', 0777, TRUE);
            }
            $config['upload_path'] = './upload_DLR/';
            $config['allowed_types'] = 'xlsx|xml|xls';
            // $config['max_size'] = '5120';
            $config['overwrite'] = FALSE;
            $area = $_REQUEST['select_area'];
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                //$this->message = $error['error'];
                $this->session->set_userdata('message', $error['error']);
                $this->drawUploadSuccess();
            } else {
                ini_set('max_execution_time', -1);
                $upfile = array('upload_data' => $this->upload->data());

                $this->load->library('/lib/PHPExcel.php');
                $inputFileName = $upfile['upload_data']['full_path'];
                try {

                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objReader->setReadDataOnly(true);

                    $setLoadSheetsOnly = $objReader->setLoadSheetsOnly(0);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $sheetNames = $objPHPExcel->getSheetCount();
                    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // first sheet  
                    $highestRow = $objWorksheet->getHighestRow(); // here 5  
                    $highestColumn = $objWorksheet->getHighestColumn(); // here 'E'  
                    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
                    //echo $highestColumnIndex . " " . $highestRow;
                    if ($highestColumnIndex == 24) {
                        $data = array();
                        for ($row = 2; $row < $highestRow + 2; ++$row) {
                            $rA = array();
                            for ($col = 0; $col < $highestColumnIndex; $col++) {
                                $value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();

                                if ($col == 0) {
                                    $raw_part = str_replace(" ", "", $value);
                                    $value = $raw_part;
                                } else if ($col === 2 || $col === 3) {
                                    $words = explode('/', $value);
                                    $value = (isset($words[2]) ? $words[2] : '') . "-" . (isset($words[1]) ? $words[1] : '') . "-" . $words[0];
                                    //echo $value . " ";
                                }


                                $columnLetter = PHPExcel_Cell::stringFromColumnIndex($col);
                                $rA[$columnLetter] = $value;
                            }
                            array_push($data, $rA);
                        }
                        $json_encode = json_encode($data);
                        $first_date_time = $data[0]['D'] . " " . $data[0]['E'] . ":00";
                        $this->load->model('sales/sales_model');
                        $lastSalesDateTime = $this->sales_model->getLastSalesDateTime($area);
                        if (sizeof($lastSalesDateTime) > 0) {
                            $last_date_time = $lastSalesDateTime[0]->max_date . " " . $lastSalesDateTime[0]->max_time;
                        } else {
                            $last_date_time = '0000-00-00 00:00:00';
                        }
                        if (empty($data) || (strtotime($last_date_time) > strtotime($first_date_time))) {
                            //$this->message = "You are trying to uplod a expired file. Pleae check again. This file may have uploaded before";
                            $this->session->set_userdata('message', "You are trying to uplod a expired file. Pleae check again. This file may have uploaded before");
                            $this->drawUploadSuccess();
                        } else {
                            $this->load->model('sales/sales_model');
                            $insertToDB = $this->sales_model->insertToDB($json_encode, $highestRow, $area);
//                            ob_flush();
//                            ob_clean();
                            $insertToDB == 1 ? $this->session->set_userdata('message', "DLR report successfully uploaded") : $this->session->set_userdata('message', "Some error occured while uploading");

                            //$this->message = "Master file successfully uploaded" : "Some errors occured while uploading";
                            $this->drawUploadSuccess();
                            if ($insertToDB > 0) {
                                $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
                                $newLastSalesDateTime = $this->sales_model->getLastSalesDateTime($area);
                                if (sizeof($newLastSalesDateTime) > 0) {
                                    $new_last_date_time = $newLastSalesDateTime[0]->max_date . " " . $newLastSalesDateTime[0]->max_time;
                                } else {
                                    $new_last_date_time = '0000-00-00 00:00:00';
                                }
                                // echo $first_date_time . " " . $new_last_date_time;
                                $deliverOrderData = $this->dealer_deliver_order_model->getDeliverOrderData($first_date_time, $new_last_date_time, $area);
                                $detail_count = count($deliverOrderData);
                                for ($i = 0; $i < $detail_count; $i++) {
                                    $wip = $this->dealer_deliver_order_model->insertNewDeliverOrder($deliverOrderData[$i]);
                                    $insert_id = $this->db->insert_id();
                                    $deliverOrderDetail = $this->dealer_deliver_order_model->getDeliverOrderDetail($first_date_time, $new_last_date_time, $wip, $area);
                                    $this->dealer_deliver_order_model->insertDealerDeliverOrderDetail($deliverOrderDetail, $insert_id);
                                }
                            }
                        }
                        $objPHPExcel->disconnectWorksheets();
                        //unlink($inputFileName);
                        //unset($objPHPExcel);
                    } else {
                        $this->session->set_userdata('message', "Invalid column count");
                        $this->drawUploadSuccess();
                    }
                } catch (Exception $e) {
                    //print_r('Format Error');
                    $this->session->set_userdata('message', $error['error']);
                    $this->drawUploadSuccess();
                    // $this->message = $error['error'];
                }
            }
            // redirect('sales/drawIndexUploadSales');
        } catch (Exception $exc) {
            
        }
    }

}

?>