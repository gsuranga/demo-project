<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pos_services extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        date_default_timezone_set('Asia/Colombo');
    }

    public function addSalesDataToDB() {
        $arg = $_REQUEST['sales_args'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);

        $json_S = json_decode($str_replace, TRUE);
        $this->load->model('pos_services/pos_service_model');

        $addDealerSales = $this->pos_service_model->addDealerSales($json_S);
        $addDealerStocks = $this->pos_service_model->addDealerStocks($json_S);

        $message = array(
            'value' => 1
        );
        $json_encode = json_encode($message);
        print_r($json_encode);
    }

    public function addLossSaleDetails() {
        $arg = $_REQUEST['loss_sales_args'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_S = json_decode($str_replace, TRUE);
        $this->load->model('pos_services/pos_service_model');
        $addDealerSales = $this->pos_service_model->addLossSalesDetails($json_S);
        $array = null;
        if ($addDealerSales > 0){
            $array = Array(
                "status" => 1,
            );
        } else {
            $array = Array(
                "status" => 0,
            );
        }
        $json_encode = json_encode($array);
        print_r($json_encode);
        return $json_encode;
    }

    public function addDealerStockDetails() {

        $arg = $_REQUEST['stock_args'];
        $json_encode = json_encode($arg);

        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_S = json_decode($str_replace, TRUE);
        $this->load->model('pos_services/pos_service_model');
        $addDealerStocks = $this->pos_service_model->addDealerStocks($json_S);
        $array = array("status" => "0",);
        if ($addDealerStocks > 0) {
            $array = array(
                "status" => "1",
            );
        } else {
            $array = array(
                "status" => "0",
            );
        }
        $json_encode = json_encode($array, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    public function getUpdatedPartsForDealer() {
        /* @var $account_no type */
        $account_no = $_REQUEST['acc_no'];
        $json_encode = json_encode($account_no);
        $str_replacen = str_replace("%30", "\\n", $account_no);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_S = json_decode($str_replace, TRUE);
        $acc = $json_S['dealer_acc_no'];
        $this->load->model('pos_services/pos_service_model');
        $updatedParts = $this->pos_service_model->getUpdatedParts($acc);
       
        $part_data_array = array("part_data" => $updatedParts);
        $json_encode = json_encode($part_data_array, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    public function insertNewDirectPurchaseOder() {
        $arg = $_REQUEST['po_data'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_decode = json_decode($str_replace);
        $this->load->model('pos_services/pos_service_model');
        $this->load->model('email/email_model');
        $return_data = $this->pos_service_model->insertNewDirectPurchaseOder($json_decode);
        $json_encode = json_encode($return_data, JSON_FORCE_OBJECT);
        print_r($json_encode);
        $this->email_model->sendMailForPO($json_decode, $return_data["po_number"]);
        return $json_encode;
    }

    public function insertNewDealerReturn() {
        $arg = $_REQUEST['return_data'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_decode = json_decode($str_replace);
        $this->load->model('pos_services/pos_service_model');
        //$this->load->model('email/email_model');
        $return_data = $this->pos_service_model->insertNewDealerReturn($json_decode);
        $json_encode = json_encode($return_data, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    public function getRepAcceptedReturns() {
        $dealer_data = $_REQUEST['dealer_data'];
        $str_replacen = str_replace("%30", "\\n", $dealer_data);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_decode = json_decode($str_replace);
        $this->load->model('pos_services/pos_service_model');
        $rep_return_data['rep_accepted'] = $this->pos_service_model->getRepAcceptedReturns($json_decode);
        $count = count($rep_return_data);
        $status = 0;
        if ($count > 0) {
            $status = 1;
        }
        $rep_return_data['status'] = $status;
        $json_encode = json_encode($rep_return_data, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    public function getAdminAcceptedReturns() {
        $dealer_data = $_REQUEST['dealer_data'];
        $str_replacen = str_replace("%30", "\\n", $dealer_data);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_decode = json_decode($str_replace);
        $this->load->model('pos_services/pos_service_model');
        $rep_return_data['admin_accepted'] = $this->pos_service_model->getAdminAcceptedReturns($json_decode);
        $count = count($rep_return_data);
        $status = 0;
        if ($count > 0) {
            $status = 1;
        }
        $rep_return_data['status'] = $status;
        $json_encode = json_encode($rep_return_data, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

}
