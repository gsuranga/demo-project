<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of promotion_view
 * 25-03-2015
 * @author Dilhari
 */
class promotion_view extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resource = array(
        'JS' => array('promotion_view/js/promotion_view_js'),
        'CSS' => array('')
    );

    public function drawIndexPromotionView() {
        $this->template->attach($this->resource);
        $this->template->draw('promotion_view/index_all_promotion_view', TRUE);
    }

    ////////////////// KIT Promotion ////////////////////////////////////////////////////////////
    
    public function drawAllKitPromotion() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $kitPromotion = $this->promotion_view_model->kitPromotionDetails();
        $this->template->draw('promotion_view/kit_promotion/create_kit_promotion', false, $kitPromotion);
    }

    public function drawIndexKitPromotionDetail() {
        $id = $_REQUEST['promotion_id'];
        $this->template->attach($this->resource);
//        $this->load->model('promotion_view/promotion_view_model');
//        $aso = $this->promotion_view_model->get_aso($id);
        $this->template->draw('promotion_view/kit_promotion/index_kit_promotion_details', true);
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////

    public function drawAllPromotionDetails() {
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->PromotionDetails($id);
        $this->template->draw('promotion_view/create_promotion_details', FALSE, $extraData);
    }
    
    public function drawAllPromotionSummary() {
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->PromotionSummary($id);
        $this->template->draw('promotion_view/create_promotion_details_summary', FALSE, $extraData);
    }

    public function drawAllAsoTargetDetails() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->asoDetails($id);
        $this->template->draw('promotion_view/create_aso_target_details', FALSE, $extraData);
    }
    
    public function drawAllOtherDetails() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->otherDetails($id);
        $this->template->draw('promotion_view/create_other_details', FALSE, $extraData);
    }
    
    public function drawAllDealerTargetDetails() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->dealerDetails($id);
        $this->template->draw('promotion_view/create_dealer_target_details', FALSE, $extraData);
    }

    ////////////////// Special Prices ////////////////////////////////////////////////////////////

    public function drawAllSpecialPrices() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $Promotion = $this->promotion_view_model->SpecialPriceDetails();
        $this->template->draw('promotion_view/special_price/create_special_prices', false, $Promotion);
    }

    public function drawIndexSpecialPriceDetail() {
        $this->template->attach($this->resource);
        $this->template->draw('promotion_view/special_price/index_special_price_details', true);
    }
    
    public function drawAllSpSummary() {
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->PromotionSummary($id);
        $this->template->draw('promotion_view/special_price/create_sp_details_summary', FALSE, $extraData);
    }
    
    public function AsoTargetDetails() {
        $id = $_REQUEST['promotion_id'];
        $this->load->model('promotion_view/promotion_view_model');
        $data = $this->promotion_view_model->AsoTargetDetails($id);
        echo json_encode($data);
    }

    ////////////////// BID Promotion ////////////////////////////////////////////////////////////
    
    public function drawAllBidPromotion() {
        $this->template->attach($this->resource);
        $this->load->model('promotion_view/promotion_view_model');
        $Promotion = $this->promotion_view_model->bidPromotion();
        $this->template->draw('promotion_view/bid_promotion/create_bid_promotion', false, $Promotion);
    }
    
    public function drawIndexBidPromotionDetail() {
        $this->template->attach($this->resource);
        $this->template->draw('promotion_view/bid_promotion/index_bid_promotion_details', true);
    }
    
    public function drawAllBIDPromotionSummary() {
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->PromotionSummary($id);
        $this->template->draw('promotion_view/bid_promotion/create_bid_promotion_details_summary', FALSE, $extraData);
    }
    
    public function drawAllBidPromotionDetails() {
        $this->load->model('promotion_view/promotion_view_model');
        $id = $_REQUEST['promotion_id'];
        $extraData = $this->promotion_view_model->PromotionDetails($id);
        $this->template->draw('promotion_view/create_promotion_details', FALSE, $extraData);
    }

}
