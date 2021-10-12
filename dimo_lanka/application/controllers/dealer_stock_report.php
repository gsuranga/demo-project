<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_stock_report
 *
 * @author HASARA
 */
class dealer_stock_report extends C_Controller {
    
   private $resours = array(
        'JS' => array('dealer_stock_report/js/dealerstock'),
        'CSS' => array());
   
    public function __construct() {
        parent::__construct();
    }
    
    public function dealer_stock() {
        
        $this->template->attach($this->resours);
        $this->template->draw('dealer_stock_report/indexdealerstock_report', true);
        
    }
    
    public function drawViewreport() {

//        $this->form_validation->set_rules('partnumber', 'Item Part Number ', 'required');
//        $this->form_validation->set_rules('description', 'Description', 'required');
//        $this->form_validation->set_rules('model', 'model', 'required');
//        if ($this->form_validation->run() == FALSE) {



            $this->template->draw('dealer_stock_report/view_report', false);
            // redirect('stock_report/drawIndexstockreport');
//        } else {
//
//            $this->template->draw('dealer_stock_report/view_report', false);
//        }
    }
    
    
    public function getAllPartNumbers() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_stock_report/dealer_stock_report_model');
        $column = array('item_part_no', 'item_id', 'description');
        $result = $this->dealer_stock_report_model->getAllPartNumbers($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAllPartDescriptions() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_stock_report/dealer_stock_report_model');
        $column = array('description', 'item_id', 'item_part_no');
        $result = $this->dealer_stock_report_model->getAllPartDescription($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function searchitem(){
         
            $this->load->model('dealer_stock_report/dealer_stock_report_model');
            echo json_encode($this->dealer_stock_report_model->viewAll());
       
    }

//        public function searchitem() {
//        //echo "eeee";                                                
//      //  $itemid = $_REQUEST['item_id'];
//        
//        $this->load->model('dealer_stock_report/dealer_stock_report_model');
//        
//        $view = $this->dealer_stock_report_model->viewAll();
//        $this->template->draw('dealer_stock_report/view_report', false);
//        
//        
////        
////        $itemArray = array();
////
////        foreach ($view as $value) {
////           
////            
////          
////            array_push($itemArray, array("delar_name" => $value->delar_name, "delar_account_no" => $value->delar_account_no, "sales_officer_name" => $value->sales_officer_name, "movement_to_the_dealer_avg" => $value->movement_to_the_dealer_avg, "last_invoice_date" => $value->last_invoice_date,"last_invoice_qty" => $value->last_invoice_qty, "movement_to_the_customer_avg" => $value->movement_to_the_customer_avg, "remaining_qty" => $value->remaining_qty));
////        //    print_r($value);
////        }
////        
////
////        echo json_encode($itemArray);
//    }
    
    
//    public function getAllPartmodel() {
//        $q = strtolower($_GET['term']);
//        $this->load->model('item/item_model');
//        $column = array('model', 'item_id', 'item_part_no','description');
//        $result = $this->item_model->getAllPartmodel($q, $column);
//        $result_data = array('label' => 'no result...');
//        if (count($result) > 0) {
//            echo json_encode($result);
//        } else {
//            echo json_encode($result_data);
//        }
//    }
}
