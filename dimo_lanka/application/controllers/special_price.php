<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of special_price
 * 19-03-2015
 * @author Dilhari
 */
class special_price extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('special_price/js/special_price_js'),
        'CSS' => array('')
    );
    
    public function drawIndexSpecialPrice(){
        $this->template->attach($this->resource);
        $this->template->draw('special_price/index_all_special_price', TRUE);
    }
    
    public function drawAllSpecialPrice(){
        $this->template->attach($this->resource);
        $this->template->draw('special_price/create_special_price', false);
    }
    public function newView(){
        $_REQUEST['token'];
        $this->template->attach($this->resource);
        $this->template->draw('special_price/newView', false);
    }
    
    public function getPartNumber() {
        $q = strtolower($_GET['term']);
        $this->load->model('special_price/special_price_model');
        $column = array('item_part_no', 'item_id', 'description', 'vehicle_model_local', 'avg_monthly_demand', 'total_stock_qty', 'avg_cost', 'selling_price');
        $result = $this->special_price_model->getPartNumber($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
//    nameAso
    public function nameAso(){
        $aso = $this->input->get('id');
         
        $this->load->model('special_price/special_price_model');
        $data_set = array();
        $viewAso = $this->special_price_model->getAsonames($aso);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAso);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
        
    }
    public function getAsoAll(){
         $aso = $_REQUEST['id'];
        $this->load->model('special_price/special_price_model');
        $data_set = array();
        $viewAsoD = $this->special_price_model->getAsoAll($aso);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAsoD);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
      
    }


    public function getAsoName() {
        $q = strtolower($_GET['term']);
        $this->load->model('special_price/special_price_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'branch_name');
        $result = $this->special_price_model->getAsoName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function createSpecialPrice(){
        //print_r($_POST);
        $this->load->model('special_price/special_price_model');
        if ($this->special_price_model->createSpecialPrice() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
    public function nameAsoDistrct(){
        $aso = $_REQUEST['id'];
        $this->load->model('special_price/special_price_model');
        $data_set = array();
        $viewAsoD = $this->special_price_model->nameAsoDistrct($aso);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAsoD);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
      
      
    }
}
