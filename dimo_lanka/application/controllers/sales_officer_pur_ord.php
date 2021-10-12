<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class sales_officer_pur_ord extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('sales_officer_pur_ord/js/purchase'),
        'CSS' => array());

    public function drawIndex_S_O_Pur_Ord() {
        $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_ord/index_S_O_Pur_Ord', TRUE);
    }

    public function drawIndex_detail() {

        $this->template->draw('sales_officer_pur_ord/purchase_datail');
    }

    public function drawIndex_view_purchase_order() {
        $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_ord/view_purchase_order', TRUE);
    }

    public function auto_outlet() {
        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('delar_shop_name', 'delar_id', 'delar_name', 'delar_account_no');
        $result = $this->sales_officer_pur_order_model->getOutlet($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getProduct() {
        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->sales_officer_pur_order_model->get_product($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function setsalesofficer() {
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $salesofficerdetails = $this->sales_officer_pur_order_model->setsalesofficer();
        echo json_encode($salesofficerdetails);
    }

    public function addPurchaseOrder() {

        if ($this->input->post("salesOfficerID") != '' && $this->input->post("outletID") != '' && $this->input->post("rowCount") != '') {
            $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
            $insertSalesOfficerPurchaseOrder = $this->sales_officer_pur_order_model->insertSalesOfficerPurchaseOrder($this->input->post());
            redirect('sales_officer_pur_ord/drawIndex_S_O_Pur_Ord');
        } else {
            $this->session->set_flashdata('create_sales_officer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Please Enter S/O Details</spam>');
            redirect('sales_officer_pur_ord/drawIndex_S_O_Pur_Ord');
        }
    }

    public function get_sales_officer() {

        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('sales_officer_account_no', 'sales_officer_id', 'sales_officer_name');
        $result = $this->sales_officer_pur_order_model->getSalesOfficer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_sales_officer_by_name() {

        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'sales_officer_account_no');
        $result = $this->sales_officer_pur_order_model->getSalesOfficerByName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function viewAcceptedPurchaseOrder($data) {
        $this->template->draw('sales_officer_pur_ord/acceptedOrder');
    }

    public function viewPendingPurchaseOrder($data) {
        $this->template->draw('sales_officer_pur_ord/pendingOrder');
    }

    public function viewrejectPurchaseOrder($data) {
        $this->template->draw('sales_officer_pur_ord/rejectOrder');
    }

    public function getPurchaseOrder() {

        $id = $this->input->get('so_idd');
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $data_set = array();
        $viewacceptOrder = $this->sales_officer_pur_order_model->viewacceptOrder($id);
        $viewpendingOrder = $this->sales_officer_pur_order_model->viewPendingOrder($id);
        array_push($data_set, $viewacceptOrder);
        array_push($data_set, $viewpendingOrder);
        // header('Content-type: application/json');
        echo json_encode($data_set);
    }

    public function getPurchaseOrderDetail() {

        $id = $this->input->get('so_idd');
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $data_set2 = array();
        $viewacceptOrderDetail = $this->sales_officer_pur_order_model->viewacceptOrderDetail($id);
        //  array_push($data_set2, $viewacceptOrderDetail);
        header('Content-type: application/json');
        echo json_encode($viewacceptOrderDetail);
    }

    public function removePurcheOrder() {

        $id = $this->input->get('po_idd');
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');

        $this->sales_officer_pur_order_model->removePurcheOrder($id);
    }

    public function rejectPurcheOrder() {

        $id = $this->input->get('po_idd');
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');

        $this->sales_officer_pur_order_model->rejectPurcheOrder($id);
    }

    public function getrejectOrder() {

        $id = $this->input->get('so_idd');
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $data_set = array();
        $viewrejectOrder = $this->sales_officer_pur_order_model->viewrejectOrder($id);

        array_push($data_set, $viewrejectOrder);

        echo json_encode($data_set);
    }

    public function drawIndex_edit_purchase_order() {
        $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_ord/editPurchaseOrder', TRUE);
    }

    public function drawIndex_update_detail() {

        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $data_set = array();
        $viewgetOrder = $this->sales_officer_pur_order_model->viewgetUpdateOrder($_REQUEST['accc']);
        $viewgetOrderDetail = $this->sales_officer_pur_order_model->viewgetUpdateOrderDetail($_REQUEST['accc']);

        $this->template->draw('sales_officer_pur_ord/purchase_update_datail', FALSE, $viewgetOrder, $viewgetOrderDetail);
    }

    public function updatePurchaseOrder() {


        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $insertSalesOfficerPurchaseOrder = $this->sales_officer_pur_order_model->updateSalesOfficerPurchaseOrder($_REQUEST);
    }

    public function getDeliverPurchaseOrderDetail() {


        $id = $this->input->get('so_idd');

        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $data_set2 = array();
        $viewacceptOrderDetail = $this->sales_officer_pur_order_model->viewDeliverOrderDetail($id);
        // print_r($viewacceptOrderDetail);
        //  array_push($data_set2, $viewacceptOrderDetail);
        header('Content-type: application/json');
        echo json_encode($viewacceptOrderDetail);
    }
     public function drawIndex_S_O_Pur_Ord_history() {
        $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_ord/drawIndex_S_O_Pur_Ord_history',true);
    }
    public function view_dealer_history(){
      $this->template->draw('sales_officer_pur_ord/view_dealer_history',false);  
    }

}

?>
