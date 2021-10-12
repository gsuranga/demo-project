<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kit_promotion_summary
 * 17-03-2015
 * @author Dilhari
 */
class kit_promotion_summary extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    private $resource = array(
        'JS' => array('kit_promotion_summary/js/kit_promotion_summary_js'),
        'CSS' => array('')
    );

    public function drawIndexKitPromotionSummary() {
        $this->template->attach($this->resource);
        $this->template->draw('kit_promotion_summary/index_all_kit_promotion_summary', TRUE);
    }

    public function drawAllKitPromotionSummary() {
        $this->template->attach($this->resource);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $date = date('Y-m-d');
        $type = 'KIT';
        $kit = $this->kit_promotion_summary_model->getKitPromotionDetails($date, $type);
        $this->template->draw('kit_promotion_summary/create_kit_promotion_summary', false, $kit);
    }
    
    public function drawIndexOrderKitPromotion() {
        $this->template->attach($this->resource);
        $this->template->draw('kit_promotion_summary/index_all_order_kit_promotion', TRUE);
    }
    
    public function drawAllOrderKitPromotion() {
        $id = $_REQUEST['promotion_id'];
        $this->template->attach($this->resource);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $result = $this->kit_promotion_summary_model->getKitName($id);
        $this->template->draw('kit_promotion_summary/create_order_kit_promotion', FALSE, $result);
    }
    
    public function getKitName() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $column = array('promotion_name', 'special_promotion_id', 'description', 'starting_date', 'end_date');
        $result = $this->kit_promotion_summary_model->getKitName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getTarget() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getTarget();
        echo json_encode($data);
    }
    
    public function getActual() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getActual();
        echo json_encode($data);
    }
    
    public function getKitDetails() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getKitDetails();
        echo json_encode($data);
    }
    
    public function getQty() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getQty();
        echo json_encode($data);
    }
    
    public function getVat() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->get_vat();
        echo json_encode($data);
    }
    
    public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->kit_promotion_summary_model->getDealerName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function getDealerDetails() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getDealerDetails();
        echo json_encode($data);
    }
    
    public function submitKitPromotionSummary(){
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        if ($this->kit_promotion_summary_model->submitKitPromotionSummary() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }

}
