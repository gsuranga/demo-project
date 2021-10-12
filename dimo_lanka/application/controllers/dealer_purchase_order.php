<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_purchase_order
 *
 * @author user
 */
class dealer_purchase_order extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    private $resours = array(
        'JS' => array('dealer_purchase_order/js/purchase_orders'),
        'CSS' => array('dealer_purchase_order/css/purchase_order_detail'),
    );

    public function drawIndexAllPurchaseOrders() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_purchase_order/index_all_dealer_purchase_order', TRUE);
    }

    public function drawAllPendingOrders() {

        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $viewAllPendingOrders = $this->dealer_purchase_order_model->viewAllPendingOrders();
        $this->template->draw('dealer_purchase_order/view_all_dealer_pending_orders', false, $viewAllPendingOrders);
    }

    public function drawAllAcceptedOrders() {
        $lastAcceptedOrders = $this->dealer_purchase_order_model->getLastAcceptedOrders();
        $this->template->draw('dealer_purchase_order/view_all_accepted_orders', false, $lastAcceptedOrders);
    }

    public function drawAllRejectedOrders() {
        $this->template->draw('dealer_purchase_order/view_all_dealer_rejected_orders');
    }

    public function drawIndexPurchaseOrderDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_purchase_order/index_purchase_order_detail', true);
    }

    public function drawPurchaseOrderDetails() {
        $dealer_id = $_REQUEST['dealer_id'];
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $this->load->model('delar/delar_model');
        $extra_data['dealer_data'] = $this->delar_model->getDealerDetails("delar_id", $dealer_id);
        $extra_data['P_o_data'] = $this->dealer_purchase_order_model->viewAllPurchaseOrderDetails($_REQUEST);
        $this->template->draw('dealer_purchase_order/view_all_purchase_order_detail', false, $extra_data);
    }

    public function getSystemURL() {
        $system_url = $System['URL'];
        $url = array("system_url" => $system_url);
        $json_encode = json_encode($url);
        echo $json_encode;
        return $json_encode;
    }

    public function addNewPurchaseOrder() {

        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
//        $arg = $_REQUEST['args1'];
//        $str_replacen = str_replace("%30", "\\n", $arg);
//        $str_replace = str_replace("%20", "\\s", $str_replacen);
//        $json_S = json_decode($str_replace, TRUE);
        $this->dealer_purchase_order_model->addNewPurchaseOrder($json_S);
        $lastInsertedID = $this->dealer_purchase_order_model->getLastInsertedID($json_S);
        echo json_encode(array("id" => "$lastInsertedID"));
//        echo json_encode($lastInsertedID);
//        $insert_id = $this->db->insert_id();
//        echo $insert_id;
//        return $insert_id;
//        redirect('area/drawIndexArea');
    }

    public function abc() {
        $_REQUEST['args3'];
        return json_encode(array("abc" => 1));
    }

    public function addNewPurchaseOrderDetail() {
        $arg = $_REQUEST['args2'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);

        $json_S = json_decode($str_replace, TRUE);
        $count = count($json_S);
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');

        $this->dealer_purchase_order_model->addNewPurchaseOrder($json_S[($count - 1)]);
        $last_ids = $this->dealer_purchase_order_model->getLastInsertedID($json_S[($count - 1)]);

        $lastInsertedID = $last_ids[0]->purchase_order_id;
        $purchase_order_number = $last_ids[0]->purchase_order_number;
        if ($lastInsertedID > 0) {
            $this->dealer_purchase_order_model->addNewPurchaseOrderDetail($json_S, $lastInsertedID);
        }
        $data_array = array(
            "id" => $lastInsertedID,
            "number" => $purchase_order_number
        );
        // print_r($data_array);
        $json_encode = json_encode($data_array, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    public function getAllDealerNames() {

        $q = strtolower($_GET['term']);
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $column = array('delar_shop_name','delar_account_no','delar_id');
        $result = $this->dealer_purchase_order_model->loadAllDealers($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllDealerAccountNums() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $column = array('delar_account_no', 'delar_shop_name', 'delar_id');
        $result = $this->dealer_purchase_order_model->loadAllDealerAccountNums($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getDealerPurchaseOrders() {

        $id = $this->input->get('hidden_dealer_id');
        /* new  */ $start = $this->input->get('start');
        /* new  */ $end = $this->input->get('endd');
        
        

        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $data_set = array();
        $viewAcceptedOrders = $this->dealer_purchase_order_model->viewAllAcceptedOrders($id, $start, $end);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }

    public function getPurchaseOrderDetail(){
        $get = $this->input->get('poid');
        //    $dealer_id = $this->input->get('dealer_id');
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $data_set1 = array();
        $this->load->model('delar/delar_model');
        $extra_data = $this->dealer_purchase_order_model->viewAllAcceptedPurchaseOrderDetails($get);
        //   $extra_data['dealer_data'] = $this->delar_model->getDealerDetails("delar_id", $dealer_id);

        $data_set1 = array(
            $extra_data,
                //           $extra_data['dealer_data']
        );
        //  array_push($data_set2, $viewacceptOrderDetail);
        header('Content-type: application/json');
        $json_encode = json_encode($data_set1);

        print_r($json_encode);
        return $json_encode;
    }

    public function rejectPurchaseOrder() {
        $order_id = $_REQUEST['po_idd'];
        
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $this->dealer_purchase_order_model->rejectPurchaseOrder($order_id);
    }

    public function getPurchaseOrderStatus() {
        $arg = $_REQUEST['args3'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_S = json_decode($str_replace);
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails('delar_account_no', $json_S[0]->acc_no);
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $deliverOrders = $this->dealer_purchase_order_model->checkForDeliverOrders($dealerDetails[0]->delar_id, $json_S[0]->time_stamp);
        //status 2 not sent----------------------
        $count = count($deliverOrders);
        if ($count > 0) {
            $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
            $data_array = array("order_data" => $deliverOrders, "status" => 1);
            $json_encode = json_encode($data_array);
            $this->dealer_purchase_order_model->updateDeliverOrderStatus($deliverOrders);
            print_r($json_encode);
            return $json_encode;
        } else {
            $status_json_encode = json_encode(array("status" => 0));
            print_r($status_json_encode);
            return $status_json_encode;
        }
    }

    //-------------------new edit to add invoice tbl_d_p_o-----
    public function updaterForPutInvoice() {
        $id = $this->input->get('PO_ID');
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $data_set = array();
        $viewAcceptedOrders = $this->dealer_purchase_order_model->updaterForPutInvoice1($id);
        array_push($data_set, $viewAcceptedOrders);
        echo json_encode($data_set);
    }
    
 //-------------------new-----------------------------------------------------------------------   
    public function updateInvoiceWip(){
        
                   $purch = $this->input->get('purch');
        /* new  */ $invoice = $this->input->get('invoice');
        /* new  */ $wip = $this->input->get('wip');
        $this->load->model('dealer_purchase_order/dealer_purchase_order_model');
        $data_set = array();
        $invoiceData = $this->dealer_purchase_order_model->updateInvoiceWip1($purch, $invoice, $wip);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $invoiceData);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
        
        
    }

}
