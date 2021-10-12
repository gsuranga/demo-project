<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class dealer_accept_order extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('dealer_accept_order/js/delarAccept'),
        'CSS' => array('dealer_accept_order/css/delearAcc'));

    function drawIndexDelearAccept() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_accept_order/indexdelearAccept', TRUE);
    }

    function drawViewOrders() {
        $this->load->model('dealer_accept_order/dealer_accept_order_model');
        $allPendingOrders['order'] = $this->dealer_accept_order_model->viewDelarOrder();
        $allPendingOrders['callOrder'] = $this->dealer_accept_order_model->viewDelarCallOrder();
        
        $this->template->draw('dealer_accept_order/viewOrders', FALSE, $allPendingOrders);
    }

    public function drawIndex_edit_delear_Accept_order() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_accept_order/editAcceptOrder', TRUE);
    }
  

    public function drawIndex_update_delar_detail() {
if(isset($_REQUEST['accc'])){
        $this->load->model('dealer_accept_order/dealer_accept_order_model');
        $data_set = array();
        $viewgetOrder = $this->dealer_accept_order_model->viewgetUpdateOrder($_REQUEST['accc']);
        $viewgetOrderDetail = $this->dealer_accept_order_model->viewgetUpdateOrderDetail($_REQUEST['accc']);
        $this->template->draw('dealer_accept_order/update_accept_detail', FALSE, $viewgetOrder, $viewgetOrderDetail);
}
        
if(isset($_REQUEST['acccCall'])){
        $this->load->model('dealer_accept_order/dealer_accept_order_model');
        $data_set = array();
        $viewgetOrder = $this->dealer_accept_order_model->viewgetUpdateOrder($_REQUEST['acccCall']);
        $viewgetOrderDetail = $this->dealer_accept_order_model->viewgetUpdateOrderDetail($_REQUEST['acccCall']);
        $this->template->draw('dealer_accept_order/update_accept_detail', FALSE, $viewgetOrder, $viewgetOrderDetail);
}
        
    }

    public function getPurchaseOrderDetail(){

        $id = $this->input->get('so_idd');
        $this->load->model('dealer_accept_order/dealer_accept_order_model');
        $data_set2 = array();
        $viewacceptOrderDetail = $this->dealer_accept_order_model->viewacceptOrderDetail($id);
        //  array_push($data_set2, $viewacceptOrderDetail);
        header('Content-type: application/json');
        echo json_encode($viewacceptOrderDetail);
    }

    public function getOrderDetailForAccept(){


//        $config = Array(
//            'protocol' => 'smtp',
//            'smtp_host' => 'ssl://smtp.googlemail.com',
//            'smtp_port' => 465,
//            'smtp_user' => 'dimolankaceylonlinux@gmail.com',
//            'smtp_pass' => 'dimolanka',
//            'mailtype' => 'html',
//            'charset' => 'iso-8859-1',
//            'wordwrap' => TRUE
//        );
//        $this->load->library('email', $config);
//
//        $message = 'Dear ' ;
//        $this->email->set_newline("\r\n");
//        $message = 'This is a reminder to everyone about the upcoming ';
//
//        $this->email->set_newline("\r\n");
//
//
//        $this->email->set_newline("\r\n");
//
//        $this->email->from('dimolankaceylonlinux@gmail.com'); // change it to yours
//
//        $this->email->to('insaf.zak@gmail.com'); // change it to yours
//
//        $this->email->subject('test');
//
//        $this->email->message($message);
//
//        if ($this->email->send()) {
//
//            echo 'Email sent.';
//        } else {
//
//            show_error($this->email->print_debugger());
//        }

          $this->load->model('dealer_accept_order/dealer_accept_order_model');

          $row = $_REQUEST['updateRowCount'];
          for ($i = 1; $i <= $row; $i++) {
          if ($_REQUEST['delete_' . $i] > 0) {
          ///---------------Remove-----------------------
          $this->dealer_accept_order_model->removeItems($_REQUEST['orderdetail_' . $i]);
          } else {
          //-----------------Update------------------------
          $this->dealer_accept_order_model->updateItems($_REQUEST['orderdetail_' . $i], $_REQUEST['item_qty_' . $i]);
          }
          }
          $this->dealer_accept_order_model->updateDelarPurchaseOrder($_REQUEST['total_amount1'], $_REQUEST['total_discount'], $_REQUEST['sopoid']);       
    }

    
    //
    public function getOrderDetailForAcceptCall(){
     $this->load->model('dealer_accept_order/dealer_accept_order_model');

          $row = $_REQUEST['updateRowCount'];
          for ($i = 1; $i <= $row; $i++) {
          if ($_REQUEST['delete_' . $i] > 0) {
          ///---------------Remove-----------------------
          $this->dealer_accept_order_model->removeItems($_REQUEST['orderdetail_' . $i]);
          } else {
          //-----------------Update------------------------
          $this->dealer_accept_order_model->updateItems($_REQUEST['orderdetail_' . $i], $_REQUEST['item_qty_' . $i]);
          }
          }
          $this->dealer_accept_order_model->updateDelarPurchaseCall($_REQUEST['total_amount1'], $_REQUEST['total_discount'], $_REQUEST['sopoid']);  
    
    }
}
?>
