<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
class sales_officer_pur_ord_deliver extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    private $resours = array(
        'JS' => array('sales_officer_pur_order_deliver/js/deliverOrder'),
        'CSS' => array());
    public function drawIndex_S_O_Pur_Ord_deliver(){
          $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_order_deliver/index_deliver_order',TRUE);
    }
    
    public function draw_deliver(){
       
         $this->load->model('sales_officer_pur_order_deliver/sales_officer_pur_order_deliver_model');
        $allPendingOrders=$this->sales_officer_pur_order_deliver_model->getAllDeliverOrder();
        $this->template->draw('sales_officer_pur_order_deliver/diliverpurchase',FALSE,$allPendingOrders);
    }
     public function drawIndex_edit_deliver_order() {
        $this->template->attach($this->resours);
        $this->template->draw('sales_officer_pur_order_deliver/editdeliverOrder',TRUE);
    }
    public function drawIndex_update_deliver_detail() {
      
        
        $this->load->model('sales_officer_pur_order_deliver/sales_officer_pur_order_deliver_model');
           $data_set = array();
        $viewgetOrder = $this->sales_officer_pur_order_deliver_model->viewgetUpdateOrder($_REQUEST['accc']);
       $viewgetOrderDetail = $this->sales_officer_pur_order_deliver_model->viewgetUpdateOrderDetail($_REQUEST['accc']);

        $this->template->draw('sales_officer_pur_order_deliver/purchase_update_deliver_detail',FALSE,$viewgetOrder,$viewgetOrderDetail);
    }
     public function getPurchaseOrderDetail() {

        $id = $this->input->get('so_idd');
        $this->load->model('sales_officer_pur_order_deliver/sales_officer_pur_order_deliver_model');
        $data_set2 = array();
        $viewacceptOrderDetail = $this->sales_officer_pur_order_deliver_model->viewacceptOrderDetail($id);
        //  array_push($data_set2, $viewacceptOrderDetail);
        header('Content-type: application/json');
        echo json_encode($viewacceptOrderDetail);
    }
    public function addDeliverOrder(){
        
        $this->load->model('sales_officer_pur_order_deliver/sales_officer_pur_order_deliver_model');
         $insertSalesOfficerPurchaseOrder = $this->sales_officer_pur_order_deliver_model->insertSalesOfficerdeliverOrder($_REQUEST);
        
      
//       $k=$_REQUEST['deliverdetail'][0]['itemID'];
//       $kd=$_REQUEST['deliverdetail'][0]['discount'];
//       $k1=$_REQUEST['deliverdetail'][1]['itemID'];
//       $k2=$_REQUEST['deliverdetail'][2]['itemID'];
//        print_r($k);
//        print_r($kd);
        //print_r($k1);
        //print_r($k2);
//        $id = $this->input->get('addST');
//         echo $id;
      //  print_r($id);
      
    //print $obj->accounting[0]; // 12345
        
    }
      public function rejectPurcheOrder() {

        $id = $this->input->get('po_idd');
        $this->load->model('sales_officer_pur_order_deliver/sales_officer_pur_order_deliver_model');

        $this->sales_officer_pur_order_deliver_model->rejectPurcheOrder($id);
    }
    
}
?>
