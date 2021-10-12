<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bid_promotion_summary
 * 23-03-2015
 * @author Dilhari
 */
class bid_promotion_summary extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('bid_promotion_summary/js/bid_promotion_summary_js'),
        'CSS' => array('')
    );

    public function drawIndexBidPromotionSummary() {
        $this->template->attach($this->resource);
        $this->template->draw('bid_promotion_summary/index_all_bid_promotion_summary', TRUE);
    }
    
    public function drawAllBidPromotionSummary() {
        $this->template->attach($this->resource);
        $this->template->draw('bid_promotion_summary/create_bid_promotion_summary', false);
    }
    
    public function getBidName() {
        $q = strtolower($_GET['term']);
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        $column = array('promotion_name', 'special_promotion_id', 'description', 'starting_date', 'end_date');
        $result = $this->bid_promotion_summary_model->getBidName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function getBidDetails() {
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        $data = $this->bid_promotion_summary_model->getBidDetails();
        echo json_encode($data);
    }
    
    public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id', 'sales_officer_id');
        $result = $this->bid_promotion_summary_model->getDealerName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function getVat() {
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        $data = $this->bid_promotion_summary_model->get_vat();
        echo json_encode($data);
    }
    
    public function getSellingPrice() {
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        $data = $this->bid_promotion_summary_model->getSellingPrice();
        echo json_encode($data);
    }
    
    public function submitBidPromotionSummary(){
        $this->load->model('bid_promotion_summary/bid_promotion_summary_model');
        if ($this->bid_promotion_summary_model->submitBidPromotionSummary() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
}
