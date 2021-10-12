<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kit_promotion
 * 10-03-2015
 * @author Dilhari
 */
class kit_promotion extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    private $resource = array(
        'JS' => array('kit_promotion/js/kit_promotion_js'),
        'CSS' => array('')
    );

    public function drawIndexKitPromotion() {
        $this->template->attach($this->resource);
        $this->template->draw('kit_promotion/index_all_kit_promotion', TRUE);
    }

    public function drawAllKitPromotion() {
        $this->template->attach($this->resource);
        $this->template->draw('kit_promotion/create_kit_promotion', false);
    }

    public function getPartNumber() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion/kit_promotion_model');
        $column = array('item_part_no', 'description', 'item_id', 'vehicle_model_local', 'avg_monthly_demand', 'total_stock_qty', 'avg_cost', 'selling_price');
        $result = $this->kit_promotion_model->getPartNumber($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAsoName() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion/kit_promotion_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'branch_name');
        $result = $this->kit_promotion_model->getAsoName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function createKitPromotion() {
//        $this->form_validation->set_rules('promotion_name', 'Promotion Name', 'required');
//        $this->form_validation->set_rules('date_from', 'Duration From', 'required');
//        $this->form_validation->set_rules('date_to', 'Duration To', 'required');
//        $this->form_validation->set_rules('part_number_1', 'Part Number', 'required');
//        $this->form_validation->set_rules('discunt_1', 'Discount', 'required');
//        $this->form_validation->set_rules('specl_discount_1', 'Special Discount', 'required');
//        $this->form_validation->set_rules('proposed_qty_1', 'Proposed Quantity', 'required');
//        if ($this->form_validation->run()) {
        $this->load->model('kit_promotion/kit_promotion_model');
        if ($this->kit_promotion_model->createKitPromotion() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }

//        } else {
//$this->drawIndexKitPromotion();
//        }
    }

}
