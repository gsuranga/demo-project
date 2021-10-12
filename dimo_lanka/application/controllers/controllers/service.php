<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//http://localhost/dimo_lanka/service/getPassword?username=dinesh&password=123
//http://gateway.ceylonlinux.com/TATA2/service/getPassword?username=sri&password=123
/**
 * Description of service
 *
 *
 */
class service extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        date_default_timezone_set('Asia/Colombo');
    }

    public function item() {
        $time_stamp = $_REQUEST['timestamp'];
        $this->load->model("service/service_model");
        $this->load->library('encrypt');
        $item_dt = $this->service_model->item_details($time_stamp);
        $json_encode['data'] = $item_dt;
        echo str_replace("'", "`", json_encode($json_encode));
    }

    public function dealer() {
        $time_stamp = $_REQUEST['timestamp'];
        $sales_officer_id = $_REQUEST['officer_id'];
        $this->load->model("service/service_model");
        $this->load->library('encrypt');
        $item_dt = $this->service_model->dealer_details($time_stamp, $sales_officer_id);
        $json_encode['data'] = $item_dt;
        echo json_encode($json_encode);
    }

//     public function dealer() {
//        $time_stamp = $_REQUEST['timestamp'];
//        $sales_officer_id = $_REQUEST['officer_id'];
//        $this->load->model("service/service_model");
//        $this->load->library('encrypt');
//        $item_dt = $this->service_model->dealer_details($time_stamp, $sales_officer_id);
//        $json_encode['data'] = $item_dt;
//        echo json_encode($json_encode);
//    }



    public function getPassword() {
        if ($_REQUEST['username'] != null && $_REQUEST['password'] != null) {
            $user_name = $_REQUEST['username'];
            $pass_word = $_REQUEST['password'];
            $this->load->model("service/service_model");
            $this->load->library('encrypt');
            $userDetails = $this->service_model->getUserDetails($user_name);
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

                $password = $this->service_model->getPassword($user_name);
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
                }
            }
            echo json_encode($json_inputs);
        } else {
            $json_encode['result'] = -1;
            echo json_encode($json_encode);
        }
//        $decode = $this->encrypt->decode($hashed_password);
//        if ($pass_word == $decode) {
//            $user_data = array();
//            $userDetails = $this->service_model->getUserDetails($user_name);
//            foreach ($userDetails as $value) {
//                $user_data['user_id'] = $value->id;
//                $user_data['name'] = $value->name;
//                $user_data['username'] = $value->username;
//                $user_data['typeid'] = $value->typeid;
//                $user_data['employee_id'] = $value->employee_id;
//                $user_data['token_user_id'] = $value->token_user_id;
//                $user_data['password'] = $hashed_password;
//                $user_data['success_result'] = "true";
//            }
//        } else {
//            $user_data['success_result'] = "Password is wrong";
//        }
//        $json_encode = json_encode($user_data);
//        print_r($json_encode);
//        return $json_encode;
    }

////------------------------------------------------------------------------------------------
//
//    public function posDealerSuggestPurchaseOrder() {
//        $account_number = $_REQUEST['accountnumber'];
//        //echo $account_number;
//        $this->getDealerDetailforPos($account_number);
//    }
//
//    public function getDealerDetailforPos($account_number) {
//        $this->load->model('service/service_model');
//        $dealer_id = $this->service_model->getDealerDetailforPos($account_number);
//        $suggestOrderDetail = $this->service_model->getsuggestOrderDetail($dealer_id[0]->delar_id);
//        $jsaon = Array('suggesOrder' => $suggestOrderDetail);
//
//        //echo json_encode($jsaon);
//        echo json_encode($jsaon);
//    }
//
//    public function getItemForSuggestOrder() {
//        $pur_order_id = $_REQUEST['pur_order_id'];
//        $this->load->model('service/service_model');
//        $item_group = $this->service_model->getItemForSuggestOrder($pur_order_id);
//        $json2 = Array('itemDetail' => $item_group);
//        echo json_encode($json2);
//    }
//
//    function acceptsuggestPurchaseOrder() {
//
//        $pur_order_id = $_REQUEST['pur_order_id'];
//
//        $this->load->model('service/service_model');
//        $this->service_model->acceptsuggestPurchaseOrder($pur_order_id);
//        echo "1";
//    }
//--------------------------------------------------------Order Submit BY Insaf Zakariya-------------*********---------
    public function posDealerSuggestPurchaseOrder() {

        $account_number = $_REQUEST['accountnumber'];
        //echo $account_number;
        $this->getDealerDetailforPos($account_number);
    }

    public function getDealerDetailforPos($account_number) {
        $this->load->model('service/service_model');
        $dealer_id = $this->service_model->getDealerDetailforPos($account_number);
        $suggestOrderDetail = $this->service_model->getsuggestOrderDetail($dealer_id[0]->delar_id);
        $jsaon = Array('suggesOrder' => $suggestOrderDetail);

        //echo json_encode($jsaon);
        echo json_encode($jsaon);
    }

    public function getItemForSuggestOrder() {
        $pur_order_id = $_REQUEST['pur_order_id'];
        $this->load->model('service/service_model');
        $item_group = $this->service_model->getItemForSuggestOrder($pur_order_id);
        $json2 = Array('itemDetail' => $item_group);
        echo json_encode($json2);
    }

    function acceptsuggestPurchaseOrder() {

        $pur_order_id = $_REQUEST['pur_order_id'];

        $this->load->model('service/service_model');
        $this->service_model->acceptsuggestPurchaseOrder($pur_order_id);
        echo "1";
    }

    //----------------------------------------------VAT ---------------------------------------------------
    public function get_vat_for_pos() {

        $this->load->model('service/service_model');

        $suggestOrderDetail = $this->service_model->get_vat_amount();

        $jsaon = Array('vat' => $suggestOrderDetail);

        //echo json_encode($jsaon);
        echo json_encode($jsaon);
    }

    public function accept_purchase_order_by_dealer() {

        $this->load->model('service/service_model');
        $pur_order = $this->input->get('pur_order_id');
        $tawd_double = $this->input->get('tawd_double');
        $tawv_double = $this->input->get('tawv_double');
        $get_aso_detail = $this->service_model->get_aso_detail($pur_order);
        $prifix = $get_aso_detail[0]->prefix;

        $pur_order_sig = $this->generateNextID($prifix, 'tbl_dealer_purchase_order');
        $get = $this->input->get('items');
        $array = json_decode($get);

        $this->service_model->acceptsuggestPurchaseOrder($pur_order, $tawd_double, $tawv_double, $pur_order_sig);
        $this->service_model->remove_old_items($pur_order);
        $result = $this->service_model->insert_as_new($pur_order, $array);
        print_r($result);
    }

    public function reject_fun() {
        $pur_order = $this->input->get('pur_order_id');
        $reason = $this->input->get('reason');
        $this->load->model('service/service_model');
        $res = $this->service_model->reject_fu($pur_order, $reason);
        print_r($res);
    }

    //---------------------------Auto Genarate----------------------
    public function generateNextID($prefix, $table) {
        $id = $this->service_model->getId($table);
        $ef = substr($id, 1) + 1;
        $invID = str_pad($ef, 5, '0', STR_PAD_LEFT);

        return $prefix . $invID;
    }

    //--------------Dealer Payment-------------

    public function getDP() {
        $this->load->model('service/service_model');
        $respnse = array();
        $allDealerPaymentDetail = $this->service_model->getAllDealerPaymentDetail();
        if (count($allDealerPaymentDetail) > 0) {
            $respnse['response'] = 1;
            $respnse['data'] = $allDealerPaymentDetail;
            echo json_encode($respnse);
        } else {
            $respnse['response'] = 0;
            echo json_encode($respnse);
        }
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//

    public function getAllPendingPayments() {
        $officer_id = $_REQUEST['officer_id'];
        $this->load->model('service/service_model');
        $pending_payments = $this->service_model->getAllPendingPayments($officer_id);
        $jsonS = Array('pending_payments' => $pending_payments);
        echo json_encode($jsonS);
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//
}
