<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of special_price_summary
 * 20-03-2015
 * @author Dilhari
 */
class special_price_summary extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('special_price_summary/js/special_price_summary_js'),
        'CSS' => array('')
    );
    
    public function drawIndexSpecialPriceSummary(){
        $this->template->attach($this->resource);
        $this->template->draw('special_price_summary/index_all_special_price_summary', TRUE);
    }
    
    public function drawAllSpecialPriceSummary() {
        $this->template->attach($this->resource);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $date = date('Y-m-d');
        $type = 'Special_prices';
        $sp = $this->kit_promotion_summary_model->getKitPromotionDetails($date, $type);
        $this->template->draw('special_price_summary/create_special_price_summary', false, $sp);
    }
    
    public function drawIndexOrderSpecialPrice() {
        $this->template->attach($this->resource);
        $this->template->draw('special_price_summary/index_all_order_special_price', TRUE);
    }
    
    public function drawAllOrderSpecialPrices() {
        $id = $_REQUEST['promotion_id'];
        $this->template->attach($this->resource);
        $this->load->model('special_price_summary/special_price_summary_model');
        $result = $this->special_price_summary_model->getKitName($id);
        $this->template->draw('special_price_summary/create_order_special_price', FALSE, $result);
    }
    
    public function getPromotionName() {
        $q = strtolower($_GET['term']);
        $this->load->model('special_price_summary/special_price_summary_model');
        $column = array('promotion_name', 'special_promotion_id', 'description', 'starting_date', 'end_date');
        $result = $this->special_price_summary_model->getPromotionName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function getTarget() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->getTarget();
        echo json_encode($data);
    }
    
    public function getActual() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->getActual();
        echo json_encode($data);
    }
    
    public function getPromotionDetails() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->getPromotionDetails();
        echo json_encode($data);
    }
    
    public function getQty() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->getQty();
        echo json_encode($data);
    }
    
    public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('special_price_summary/special_price_summary_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->special_price_summary_model->getDealerName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function getVat() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->get_vat();
        echo json_encode($data);
    }
    
    public function getDealerDetails() {
        $this->load->model('special_price_summary/special_price_summary_model');
        $data = $this->special_price_summary_model->getDealerDetails();
        echo json_encode($data);
    }
    
    public function submitSpPromotionSummary(){
        $this->load->model('special_price_summary/special_price_summary_model');
        if ($this->special_price_summary_model->submitSpecialPriceOrder() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
}
