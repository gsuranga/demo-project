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
        $this->load->model('special_price/special_price_model');
        if ($this->special_price_model->createSpecialPrice() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
}
