<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delars_stock_report
 *
 * @author Pavithra
 */
class delars_stock_report extends C_Controller {

    //put your code here
    private $resours = array(
        'JS' => array('delars_stock_report/js/delars_stock_report', 'reports/stock_availability/js/stock_availability'),
        'CSS' => array('delars_stock_report/css/actual_parts_count'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexdelarsstockreport() {
        $this->template->attach($this->resours);
        $this->template->draw('delars_stock_report/indexdelarsstockreport', true);
    }

    public function drawViewdealersreport() {

        $this->form_validation->set_rules('dealername', 'Name ', 'required');
        $this->form_validation->set_rules('accno', 'Account number', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->template->draw('delars_stock_report/viewdealersreport', false);
//            // redirect('stock_report/drawIndexstockreport');
        } else {


            $this->load->model('delars_stock_report/delars_stock_report_model');
            $viewAll = $this->delars_stock_report_model->getDealerStock($_POST);
            $this->template->draw('delars_stock_report/viewdealersreport', false, $viewAll);
        }
    }

    public function get_Name() {
        $q = strtolower($_GET['term']);

        $this->load->model('delars_stock_report/delars_stock_report_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->delars_stock_report_model->get_Name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAccNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $column = array('delar_account_no', 'delar_name', 'delar_id',);
        $result = $this->delars_stock_report_model->getAccNo($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    //--------------------------------------------------Stock Availability : Dinesh-------------------------------------

    public function drawIndexStockAvailability() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/stock_availability/index_stock_availability', true);
    }

    public function drawViewStockAvailability() {
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $this->template->draw('reports/stock_availability/view_stock_availability', false);
    }

    public function getAllDealerStock() {
        $dealer_id = $_REQUEST['dealer_id'];
        $month_from = $_REQUEST['month_from'];
        $month_to = $_REQUEST['month_to'];
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $dealerStock = $this->delars_stock_report_model->getDealerStock($dealer_id, $month_from, $month_to);
        $json_encode = json_encode($dealerStock);
        print_r($json_encode);
        return $json_encode;
    }

    public function getAllPartNumbers() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->item_model->getAllPartNumbers($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAllPartDescriptions() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('description', 'item_id', 'item_part_no', 'selling_price');
        $result = $this->item_model->getAllPartDescription($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getStockAvailability() {
        $part_id = $_REQUEST['partID'];
        $month_from = $_REQUEST['month_from'];
        $month_to = $_REQUEST['month_to'];
        $user_type = $this->session->userdata('typeid');
        $emp_id = $this->session->userdata('employe_id');
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $stocksAvailability = $this->delars_stock_report_model->getStocksAvailability($user_type, $emp_id, $part_id, $month_from, $month_to);
        $json_encode = json_encode($stocksAvailability, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

}
