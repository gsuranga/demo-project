<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of s_o_monthly_target
 *
 * @author Iresha Lakmali
 */
class s_o_monthly_target extends C_Controller {

    private $resours = array(
        'JS' => array('somonthlytarget/js/somonthlytarget', 'somonthlytarget/js/jquery.mtz.monthpicker',),
        'CSS' => array('somonthlytarget/css/target', 'somonthlytarget/css/scroll'));

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
    }

    public function drawIndexSOMonthlyTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/index_s_o_monthly_target', true);
    }

    public function drawCreateSOMonthlyTarget() {
        $this->template->draw('somonthlytarget/create_s_o_monthly_target', false);
    }

    public function drawCurrentStockAtDealer() {
        $dealer_id = $_REQUEST['dealer_id'];
        $target_month = $_REQUEST['target_month'];
        $data_array['target_history'] = $this->s_o_monthly_target_model->currentStockAtDealer($dealer_id, $target_month);
        $fast_moving_items = $this->s_o_monthly_target_model->getFastMovingItemsForArea($dealer_id, $target_month);
        uasort($fast_moving_items, array($this, "my_sort"));
        $data_array['fast_moving_items'] = array_values($fast_moving_items);
        $json_encode = json_encode($data_array);
        print_r($json_encode);
        return $json_encode;
//        //$this->template->draw('somonthlytarget/current_stocks_at_dealer', false, $currentStockAtDealer);
    }

    public function my_sort($a, $b) {
        if ($a->turnover == $b->turnover) {
            return 0;
        } else if ($a->turnover > $b->turnover) {
            return -1;
        } else if ($a->turnover < $b->turnover) {
            return 1;
        }
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

    public function drindex() {
//        if (isset($_POST['btn_serach'])) {
//            $this->drawIndexSOMonthlyTarget();
//        }
        // if (isset($_POST['btn_meeting'])) {
        $this->createSalesOfficerMonthlyTarget();
        // }
    }

    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $q1 = $_GET['sales_officer_id'];
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no', 'discount_percentage');
        $result = $this->s_o_monthly_target_model->getAllDealerName($q, $column, $q1);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getDealerAccNo() {
        $q = strtolower($_GET['term']);
        $q1 = $_GET['sales_officer_id'];
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $column = array('delar_account_no', 'delar_id', 'delar_name', 'discount_percentage');
        $result = $this->s_o_monthly_target_model->getDealerAccNo($q, $column, $q1);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_part_no() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->item_model->getAllPartNumbers($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_description() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('description', 'item_id', 'item_part_no', 'selling_price');
        $result = $this->item_model->getAllPartDescription($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_branch_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->s_o_monthly_target_model->get_all_branch_name($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_area_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $column = array('area_name', 'area_id');
        $result = $this->s_o_monthly_target_model->get_all_area_name($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//    public function currentStocksAtDealer() {
//        $dealer_id = $_REQUEST['dealer_id'];
//        $this->load->model('somonthlytarget/s_o_monthly_target_model');
//        //print_r($_POST);
//        $currentStocksAtDealer = $this->s_o_monthly_target_model->currentStocksAtDealer($dealer_id);
//        //$this->template->draw('somonthlytarget/create_s_o_monthly_target', false, $currentStocksAtDealer);   
//    }
    //kalin query 1 target history 1ta
//    public function get_dealer_order_history(){
//         $this->load->model('somonthlytarget/s_o_monthly_target_model');
//         $_dealer_order_history = $this->s_o_monthly_target_model->get_dealer_order_history();
//         $this->template->draw('somonthlytarget/create_s_o_monthly_target', false, $_dealer_order_history);     
//    }

    public function drawIndexSOMonthlyTargetReport() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/index_s_o_monthly_target_report', true);
    }

    public function drawSOMonthlyTargetReport() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $drawSOMonthlyTargetReport = $this->s_o_monthly_target_model->drawSOMonthlyTargetReport();
        $this->template->draw('somonthlytarget/s_o_monthly_target_report', false, $drawSOMonthlyTargetReport);
    }

    public function drawIndexDelarWiseMonthlyTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/index_delar_wise_monthly_target', true);
    }

    public function drawDelarWiseMonthlyTarget() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $drawDelarWiseMonthlyTarget = $this->s_o_monthly_target_model->drawDelarWiseMonthlyTarget();
        $this->template->draw('somonthlytarget/delar_wise_monthly_target', false, $drawDelarWiseMonthlyTarget);
    }

    public function drawIndexAreaWiseMonthlyTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/index_area_wise_monthly_target', true);
    }

    public function drawAreaWiseMonthlyTarget() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $drawAreaWiseMonthlyTarget0 = $this->s_o_monthly_target_model->drawAreaWiseMonthlyTarget();
        $this->template->draw('somonthlytarget/area_wise_monthly_target', false, $drawAreaWiseMonthlyTarget0);
    }

    public function createSalesOfficerMonthlyTarget() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $status = $this->s_o_monthly_target_model->createSalesOfficerMonthlyTarget($_POST);
//        if ($status == 1) {
//            $this->session->set_flashdata('msg', 'Target added successfully.');
//        }
        switch ($status) {
            case 1:$this->session->set_flashdata('msg', '<br><span style="font-size: 13px;background-color: #FFFFFF;color: #0000bf;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Target added successfully.</span>');
                break;
            case 2:$this->session->set_flashdata('msg', '<br><span style="font-size: 13px;background-color: #FFFFFF;color: #FFA200;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Target you are trying to add is already exsist.</span>');
                break;
            default : $this->session->set_flashdata('msg', '<br><span style="font-size: 13px;background-color: #FFFFFF;color: red;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Target failed.</span>');
                break;
        }
        redirect('s_o_monthly_target/drawIndexSOMonthlyTarget');
    }

    public function dealerWiseOrder() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $dealerWiseOrder = $this->s_o_monthly_target_model->dealerWiseOrder();
        $this->template->draw('somonthlytarget/s_o_monthly_target_report', false, $dealerWiseOrder);
    }

    public function searchSalesOfficerMonthlyTarget() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $this->s_o_monthly_target_model->searchSalesOfficerMonthlyTarget($_POST);
    }

    public function index_test() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/index_test', true);
    }

    public function test() {
        $this->template->draw('somonthlytarget/test', false);
    }

    //////////update

    public function drawIndexAllTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('somonthlytarget/update_somonthlytarget/index_all_target', true);
    }

    public function drawAllTarget() {
        $this->load->model('somonthlytarget/s_o_monthly_target_model');
        $allTarget = $this->s_o_monthly_target_model->allTarget();
        $this->template->draw('somonthlytarget/update_somonthlytarget/all_target', false, $allTarget);
    }

    public function getCurrentSalesOfficer($emp_id) {
        //$this->load->model('somonthlytarget/s_o_monthly_target_model');
        $currentSalesOfficer = $this->s_o_monthly_target_model->getCurrentSalesOfficer($emp_id);
        return $currentSalesOfficer;
    }

    /* Line Item Wise target Web View */

    public function drawIndexAddTarget() {
        if ($_REQUEST['username'] != null && $_REQUEST['password'] != null) {
            $user_name = $_REQUEST['username'];
            $pass_word = $_REQUEST['password'];
            $this->load->library('encrypt');
            $this->load->model("android_service/android_service_model");
            $userDetails = $this->android_service_model->getUserDetails($user_name);
            $flag = FALSE;
            $json_inputs = array();
            $json_inputs['result'] = 0;
            if ($userDetails == NULL) {
                $json_inputs['data'] = "Username is not available";
                $json_inputs['result'] = -1;
            } else {
                $json_inputs['result'] = 1;
                $flag = TRUE;
            }
            if ($flag) {
                $password = $this->android_service_model->getPassword($user_name);
                $hashed_password = '';
                foreach ($password as $passwords) {
                    $hashed_password = $passwords->password;
                }
                $decode = $this->encrypt->decode($hashed_password);
                if ($decode != $pass_word) {
                    $json_inputs['data'] = "Password is wrong";
                    $json_inputs['result'] = 0;
                } else {
                    $json_inputs['result'] = 1;
                    $json_inputs['data'] = $userDetails;
                    $json_inputs['password'] = $pass_word;
                    foreach ($userDetails as $value) {
                        $user_detail = array(
                            'id' => $value->id,
                            'username' => $value->username,
                            'name' => $value->name,
                            'typename' => $value->typename,
                            'typeid' => $value->typeid,
                            'employe_id' => $value->employee_id,
                            'logged_in' => TRUE,
                        );

                        $this->session->set_userdata($user_detail);
                        $this->session->userdata('validated');
                    }
                    $this->template->attach($this->resours);
                    //$this->load->model('somonthlytarget/s_o_monthly_target_model');
                    $this->template->draw('somonthlytarget/index_s_o_monthly_target', true);
                }
            }
        }
    }

    public function drawAddTarget() {
        $this->template->draw('somonthlytarget/create_s_o_monthly_target', false);
    }

    /* Line Item Wise target Web View */

    public function getFastMovingItemsForArea() {
        
    }

}

?>
