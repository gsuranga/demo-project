<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bid
 * 20-03-2015
 * @author Dilhari
 */
class bid_promotion extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('bid_promotion/js/bid_promotion_js'),
        'CSS' => array('')
    );

    public function drawIndexBidPromotion() {
        $this->template->attach($this->resource);
        $this->template->draw('bid_promotion/index_all_bid_promotion', TRUE);
    }
    
    public function drawAllBidPromotion() {
        $this->template->attach($this->resource);
        $this->template->draw('bid_promotion/create_bid_promotion', false);
    }
    
    public function getPartNumber() {
        $q = strtolower($_GET['term']);
        $this->load->model('bid_promotion/bid_promotion_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->bid_promotion_model->getPartNumber($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function createBidPromotion() {
        $this->load->model('bid_promotion/bid_promotion_model');
        if ($this->bid_promotion_model->createBidPromotion() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
}
