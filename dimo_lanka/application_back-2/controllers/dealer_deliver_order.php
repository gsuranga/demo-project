<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_deliver_order
 *
 * @author SHDINESH
 */
class dealer_deliver_order extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    private $resours = array(
        'JS' => array('dealer_purchase_order/js/purchase_orders'),
        'CSS' => array('dealer_purchase_order/css/purchase_orders.css')
    );

//    public function addNewDeliverOrder() {
//        $this->form_validation->set_rules('txt_hidden3', 'Purchase Order ID', 'required');
//        $this->form_validation->set_rules('txt_total_amount', 'Total Amount');
//
//        if ($this->form_validation->run()) {
//            $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
//            $insertNewItem = $this->dealer_deliver_order_model->insertNewDeliverOrder($this->input->post());
//            $last_id = $this->db->insert_id();
//            $this->setAcceptedQuantity();
//            $this->addNewDeliverOrderDetail($last_id);
//            redirect('dealer_deliver_order/drawSuccessPage?token_purchase_order_iD=0');
//        } else {
////            redirect('item/drawIndexItem');
////            $this->drawIndexItem();
//        }
//    }

    public function createNewDeliverOrder($deliverOrderData) {

        if ($this->form_validation->run()) {
            $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
            $insertNewItem = $this->dealer_deliver_order_model->insertNewDeliverOrder($this->input->post());
            $last_id = $this->db->insert_id();
            $this->setAcceptedQuantity();
            $this->addNewDeliverOrderDetail($last_id);
            redirect('dealer_deliver_order/drawSuccessPage?token_purchase_order_iD=0');
        } else {
//            redirect('item/drawIndexItem');
//            $this->drawIndexItem();
        }
    }

    public function managePurchaseOrder() {
        if (isset($_POST['submit_all_items'])) {
            $this->setPurchaseOrderStatus();

            //$this->addNewDeliverOrder();
        } elseif (isset($_POST['reject_purchase_order'])) {
            $this->setPurchaseOrderStatus();
            // redirect('dealer_deliver_order/drawRejectSuccess?token_purchase_order_iD=0');
        } elseif ($_POST['discard_submit']) {
            
        }
    }

    public function setPurchaseOrderStatus() {
        $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
        $updateStatus = $this->dealer_deliver_order_model->updateStatus($_POST);
        if ($updateStatus > 0) {
            redirect('dealer_deliver_order/drawSuccessPage?token_purchase_order_iD=0');
        }
    }

//    public function addNewDeliverOrderDetail() {
//
//        $total_row_count = $_REQUEST['txt_hidden2'];
//        $last_id = $this->db->insert_id();
//        for ($i = 0; $i < $total_row_count; $i++) {
//
//            $this->form_validation->set_rules('txt_part_id_' . $i, 'Part No.', 'required');
//            $this->form_validation->set_rules('txt_unit_price_' . $i, 'Unit Price');
//            $this->form_validation->set_rules('txt_qty_' . $i, 'Quantity', 'required');
//            if ($this->form_validation->run()) {
//                $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
//                $this->dealer_deliver_order_model->dealerDeliverOrderDetail($this->input->post(), $last_id);
//            }
//        }
//    }
    public function addNewDeliverOrderDetail($last_id) {

        $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
        $this->dealer_deliver_order_model->insertDealerDeliverOrderDetail($_POST, $last_id);
    }

    public function drawSuccessPage() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_purchase_order/success_view', true);
    }

    public function drawRejectSuccess() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_purchase_order/reject_success_view', true);
    }

    public function setAcceptedQuantity() {
        $this->load->model('dealer_deliver_order/dealer_deliver_order_model');
        $this->dealer_deliver_order_model->updateAcceptedQty($_POST);
    }

    public function getDelierOrderDetails($data_array) {
        $sql = "select * from tbl_dealer_deliver_order where purchase_order_id='" . $data_array[0]['p_id'] . "' and status=1";
        $mod_select = $this->db->mod_select($sql);
    }

}
