<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of competitor_parts
 *
 * @author Iresha Lakmali
 */
class competitor_parts extends C_Controller {

    private $resours = array(
        'JS' => array('competitorparts/js/competitorparts'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexCompetitorPart() {
        $this->template->attach($this->resours);
        $this->template->draw('competitorparts/index_competitor_part', true);
    }

    public function drawCreateCompetitorPart() {
        $this->template->draw('competitorparts/create_competitor_part', false);
    }

    public function get_all_sales_officer() {
        $q = strtolower($_GET['term']);
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->s_o_monthly_target_model->getSalesOfficer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('competitorparts/competitor_part_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->competitor_part_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getMovementAtTGPDealer() {
        $this->load->model('competitorparts/competitor_part_model');
        $dealer_id = $_REQUEST['delar_id'];
        $item_id = $_REQUEST['part_no'];
        $movementAtTheTGPDealer = $this->competitor_part_model->getMovementAtTheTGPDealer($dealer_id, $item_id);
        $json_encode = json_encode($movementAtTheTGPDealer);
        echo $json_encode;
    }

    public function getOverallTGPMovementArea() {
        $this->load->model('competitorparts/competitor_part_model');
        $sales_officer_id = $_REQUEST['sales_officer_id'];
        $part_no = $_REQUEST['part_no'];
        // $id = $_REQUEST['id'];
        $overallTGPMovementArea = $this->competitor_part_model->getOverallTGPMovementArea($sales_officer_id, $part_no);
        $json_encode = json_encode($overallTGPMovementArea);
        echo $json_encode;
    }

    public function test() {
        $this->load->model('competitorparts/competitor_part_model');
        $sales_officer_id = $_REQUEST['sales_officer_id'];
        $dealer_id = $_REQUEST['delar_id'];
        $item_id = $_REQUEST['part_no'];
        $movementAtTheTGPDealer = $this->competitor_part_model->getMovementAtTheTGPDealer($dealer_id, $item_id);
        $overallTGPMovementArea = $this->competitor_part_model->getOverallTGPMovementArea($sales_officer_id, $item_id);
        $data_array = array("dealer_movement" => $movementAtTheTGPDealer, "overall_movement" => $overallTGPMovementArea);
        $json_encode0 = json_encode($data_array);
        return $json_encode0;
    }

    public function get_all_tgp_number() {
        $q = strtolower($_GET['term']);
        $this->load->model('competitorparts/competitor_part_model');
        $column = array('item_part_no', 'item_id', 'selling_price_with_vat', 'description');
        $result = $this->competitor_part_model->getAllTGPNumber($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_description() {
        $q = strtolower($_GET['term']);
        $this->load->model('competitorparts/competitor_part_model');
        $column = array('description', 'item_id', 'selling_price', 'item_part_no', 'selling_price_with_vat');
        $result = $this->competitor_part_model->getAllDescription($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createCompetitorParts() {
        $this->load->model('competitorparts/competitor_part_model');
        $this->competitor_part_model->createCompetitorParts($_POST);
        redirect('competitor_parts/drawIndexCompetitorPart');
    }

    public function drawIndexSalesManWiseCompetitorParts() {
        $this->template->attach($this->resours);
        $this->template->draw('competitorparts/index_sales_man_wise_competitor_parts', true);
    }

    public function drawSalesManWiseCompetitorPartsReport() {
        $this->load->model('competitorparts/competitor_part_model');
        $salesManWiseCompetitorPartsReport = $this->competitor_part_model->salesManWiseCompetitorPartsReport();
        $this->template->draw('competitorparts/sales_man_wise_competitor_parts_report', false, $salesManWiseCompetitorPartsReport);
    }

    public function drawAlCategories() {
        $this->load->model('branding/branding_model');
        $viewAll = $this->branding_model->getAlCategories();
        $this->template->draw('competitorparts/load_all', FALSE, $viewAll);
    }

    public function set_category_type() {
        $q = strtolower($_GET['term']);
        $user_type = $_GET['user_type'];
        $this->load->model('branding/branding_model');
        $column = array();
        if ($user_type == "Dealer") {
            $column = array('delar_name', 'delar_id', 'delar_account_no');
        }
        if ($user_type == "Garage") {
            $column = array('garage_name', 'garage_id', 'garage_account_no');
        }
        if ($user_type == "Fleet Owner") {
            $column = array('vehicle_reg_no', 'customer_id', 'cust_account_no');
        }
        if ($user_type == "New Shop") {
            $column = array('shop_name', 'shop_id', 'shop_code');
        }
        if ($user_type == "Vehicle Owner") {
            $column = array('vehicle_reg_no', 'vehicle_id');
        }
        $result = $this->branding_model->set_category_type($q, $column, $user_type);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            ;
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//    public function searchCompetitterParts() {
//        $this->load->model('competitorparts/competitor_part_model');
//        $this->competitor_part_model->searchCompetitterParts($_POST);
//    }
}

?>
