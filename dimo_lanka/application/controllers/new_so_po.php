<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * changed and updates dilhari ./ harshan===>>>
 */

class new_so_po extends C_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Colombo');
    }

    private $resours = array(
        'JS' => array('new_so_po/js/new_so_po'), //,'kit_promotion_summary/js/kit_promotion_summary_js'
        'CSS' => array('new_so_po/css/new_so_po')
    );
    
     private $resource = array(
        'JS' => array('kit_promotion_summary/js/kit_promotion_summary_js'),
        'CSS' => array('')
    );

    function drawIndex_new_so_po() {
        $this->template->attach($this->resours);
        $this->template->draw('new_so_po/drawIndex_new_so_po', TRUE);
    }

    function drawView_new_so_po() {
        $this->load->model('vat/vat_model');
        $vat_detail = $this->vat_model->getvatamount();

        $this->template->draw('new_so_po/drawView_new_so_po', FALSE, $vat_detail);
    }

    public function setsalesofficer() {
        $this->load->model('new_so_po/new_so_po_model');
        $salesofficerdetails = $this->new_so_po_model->setsalesofficer();
        echo json_encode($salesofficerdetails);
    }

    public function get_averages() {
        $this->load->model('new_so_po/new_so_po_model');
        $item_id = $_REQUEST['item_id'];
        $dealer_id = $_REQUEST['dealer_id'];
        $rep_id = $_REQUEST['rep_id'];

        $mainarray = array();
        $area_movement = $this->new_so_po_model->get_avg_movement_in_area($rep_id, $item_id);
        $area_movement_dealer = $this->new_so_po_model->get_avg_movement_in_dealer($dealer_id, $item_id);
        array_push($mainarray, $area_movement);
        array_push($mainarray, $area_movement_dealer);
        echo json_encode($mainarray);
    }

    public function get_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_so_po/new_so_po_model');
        $column = array('delar_name', 'delar_shop_name', 'delar_id', 'delar_account_no', 'discount_percentage', 'credit_limit');
        $result = $this->new_so_po_model->get_dealer_name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_dealer_account_number() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_so_po/new_so_po_model');
        $column = array('delar_account_no', 'delar_name', 'delar_shop_name', 'delar_id', 'discount_percentage', 'credit_limit');
        $result = $this->new_so_po_model->get_dealer_account_number($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_dealer_shop_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_so_po/new_so_po_model');
        $column = array('delar_shop_name', 'delar_account_no', 'delar_name', 'delar_id', 'discount_percentage', 'credit_limit');
        $result = $this->new_so_po_model->get_dealer_shop_name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_part_description() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_so_po/new_so_po_model');
        $column = array('description', 'item_part_no', 'item_id', 'selling_price', 'total_stock_qty');
        $result = $this->new_so_po_model->get_part_description($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_part_no() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_so_po/new_so_po_model');
        $column = array('item_part_no', 'description', 'item_id', 'selling_price', 'total_stock_qty');
        $result = $this->new_so_po_model->get_part_no($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_sold_part_detal() {
        $dealer_id = $this->input->get('dealer_id');
        $this->load->model('new_so_po/new_so_po_model');
        $sold_parts = $this->new_so_po_model->get_sold_part_detal($dealer_id);
        echo json_encode($sold_parts);
    }

    public function add_purchse_order() {
        $data_array = $_REQUEST;
        $this->load->model('new_so_po/new_so_po_model');
        $sold_parts = $this->new_so_po_model->add_new_purchase_order($data_array);
        return 'dcd';
    }

    public function getdeb() {
        $dealer_id = $this->input->get('dealer_id');
        $this->load->model('new_so_po/new_so_po_model');
        $deb_detail = $this->new_so_po_model->getDEb($dealer_id);
        $total_Amount = 0;
        $cheque_payment = 0;
        $Diposit_payment = 0;
        $Cash_payment = 0;
        foreach ($deb_detail AS $val) {
            $total_Amount+=$val->Deliver_Total_amount;
            $cheque_payment+=$val->Cheque_payment;
            $Diposit_payment+=$val->Diposit_payment;
            $Cash_payment+=$val->Cash_payment;

            //print_r($val);
        }
        $payied = $cheque_payment + $Diposit_payment + $Cash_payment;
        $deb_amount = $total_Amount - $payied;
        echo json_encode($deb_amount);
        // print_r($deb_detail);
    }

    //--------------------------------------Manage Order---------------------------------
    function draw_index_manage_order() {
        $this->template->attach($this->resours);
        $this->template->draw('new_so_po/manage_order/draw_index_manage_order', TRUE);
    }

    function draw_view_manage_purchase_order() {
        $this->template->draw('new_so_po/manage_order/draw_view_manage_order', FALSE);
    }

    function get_purchaseorder_sales_officer_wise() {
        $search_type = $this->input->get('search_type');
        $first_date = $this->input->get('first_date');
        $second_date = $this->input->get('second_date');
        $this->load->model('new_so_po/new_so_po_model');


        if ($search_type == 1) {
            $dealer_purchase = $this->new_so_po_model->get_all_pur_order($first_date, $second_date);
            echo json_encode($dealer_purchase);
        } else {
            $dealer_id = $search_type = $this->input->get('dealer_id');
            $dealer_purchase = $this->new_so_po_model->get_all_pur_order_by_filter($dealer_id, $first_date, $second_date);
            echo json_encode($dealer_purchase);
        }
    }

// get kit promotionns for manage purchase orders=== harshan==== >>>
    function get_kit() {
        //added
        $this->load->model('new_so_po/new_so_po_model');
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $date = date('Y-m-d');
        $type = 'KIT';
//added end
        $kit = $this->kit_promotion_summary_model->getKitPromotionDetails($date, $type);
        echo json_encode($kit);
    }

    public function drawIndexOrderKitPromotion() {       
        $this->template->attach($this->resource);
        $this->template->draw('new_so_po/kit/index_kit_in_new_so_po', TRUE);
    }
//for get kit promototion to android tab in purchase order manage tab  =====harshan =======>>>>>
    public function drawAllOrderKitPromotion() {
        $id = $_REQUEST['promotion_id'];
        $this->template->attach($this->resource);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $result = $this->kit_promotion_summary_model->getKitName($id);
        $this->template->draw('new_so_po/kit/create_order_kit_promotion_for_new_So_po', FALSE, $result);
    }

       public function getKitName() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $column = array('promotion_name', 'special_promotion_id', 'description', 'starting_date', 'end_date');
        $result = $this->kit_promotion_summary_model->getKitName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getTarget() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getTarget();
        echo json_encode($data);
    }
    
    public function getActual() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getActual();
        echo json_encode($data);
    }
    
    public function getKitDetails() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getKitDetails();
        echo json_encode($data);
    }
    
    public function getQty() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getQty();
        echo json_encode($data);
    }
    
    public function getVat() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->get_vat();
        echo json_encode($data);
    }
    
        public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->kit_promotion_summary_model->getDealerName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
   public function getDealerDetails() {
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        $data = $this->kit_promotion_summary_model->getDealerDetails();
        echo json_encode($data);
    }
    
    public function submitKitPromotionSummary(){
        $this->load->model('kit_promotion_summary/kit_promotion_summary_model');
        if ($this->kit_promotion_summary_model->submitKitPromotionSummary() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }  
//for get kit promototion to android tab in purchase order manage tab  =====harshan ===end====>>>>>


//     //-------------------Get Purchase Order Detail-------------------------
    //eddited by Dilhari
    function get_purchase_order_detail() {
        $order_id = $this->input->get('order_id');
        $tab_order = $this->input->get('tab_order');
        $assigned_type = $this->input->get('assigned_type');
        $amount = $this->input->get('amount');
        $discount_per = $this->input->get('discount_per');
        $cur_vat = $this->input->get('cur_vat');
        $kit = $this->input->get('kit');
        $this->load->model('new_so_po/new_so_po_model');
        $order_detail1 = $this->new_so_po_model->get_order_detail($order_id);
        $vat = $cur_vat;

        $order_detail = array($order_detail1, $order_id, $tab_order, $assigned_type, $amount, $discount_per, $vat, $kit);

        $this->template->draw('new_so_po/order_detail/draw_order_detail', FALSE, $order_detail);
    }

    function update_po_kit_detail() {
        $po_id = $this->input->get('po_id');
        $kits = $this->input->get('kits');
        $this->load->model('new_so_po/new_so_po_model');
        echo $this->new_so_po_model->update_kit_po_detail($po_id, $kits);
    }

    /**
     * 2014-11-30 6:00 PM
     * @author Infas <insaf@ceylonlinux.lk>
     * @modified SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @desc avg monthly movement of items in area which particular dealer not purchased during last 6 months;
     * 
     */
    //---------------------Get Past Moving Parts --Dealer wise------------
    function get_past_moving_part() {
        $dealer_id = $this->input->get('dealer_id');
        $this->load->model("android_service/android_service_model");
        $past_moving_detail = $this->android_service_model->getFastMoovingItemsInArea($dealer_id);
        echo json_encode($past_moving_detail);
    }

    function get_not_achived() {
        $dealer_id = $this->input->get('so_id');
        $this->load->model('new_so_po/new_so_po_model');
        $past_moving_detail = $this->new_so_po_model->get_not_achived($dealer_id);
        echo json_encode($past_moving_detail);
    }

    function set_assign_po() {
        $assign_type = $this->input->get('chek_type');
        $sopoid = $this->input->get('po');
        $this->load->model('new_so_po/new_so_po_model');
        $this->new_so_po_model->set_assign_po($assign_type, $sopoid);
    }

    function update_po_detail() {
        $oder_detail_id = $this->input->get('oder_detail_id');
        $item_id = $this->input->get('item_id');
        $update_qty = $this->input->get('update_qty');
        $this->load->model('new_so_po/new_so_po_model');
        echo $this->new_so_po_model->update_po_detail($oder_detail_id, $item_id, $update_qty);
    }

//    function server_sent() {
//        header('Content-Type: text/event-stream');
//        header('Cache-Control: no-cache');
//
//        //$time = date('r');
//      //  echo "data: The server time is: {$time}\n\n";
//        echo "data: \n\n";
//      echo 'fuck..';
//        //flush();
//    }
    function insert_new_part_to_po() {
        $order_id = $this->input->get('order_id');
        $item_id = $this->input->get('item_id');
        $qty = $this->input->get('qty');
        $selling_price = $this->input->get('selling_price');
        $detail_array = array($order_id, $item_id, $qty, $selling_price);
        $this->load->model('new_so_po/new_so_po_model');
        $order_detail_id = $this->new_so_po_model->insert_new_part_po($detail_array);
        echo json_encode($order_detail_id);
    }

    function reject_order() {
        $order_id = $this->input->get('order_id');
        $reason = $this->input->get('reason');
        $this->load->model('new_so_po/new_so_po_model');
        $this->new_so_po_model->reject_fu($order_id, $reason);
    }

    //----------------------------Update Order---------------------
    function update_po() {
        $order_id = $this->input->get('order_id');
        $amount = $this->input->get('amount');
        $without_vat = $this->input->get('without_vat');
        $tot_dis = $this->input->get('tot_dis');
        $this->load->model('new_so_po/new_so_po_model');
        $this->new_so_po_model->update_po($order_id, $amount, $without_vat, $tot_dis);
    }

    function submit_like_order() {
        $order_id = $this->input->get('order_id');
        $this->load->model('new_so_po/new_so_po_model');
        $this->new_so_po_model->submit_like_order($order_id);
    }

    //--Remove Parts--------------
    function remove_parts() {
        $order_detail_id = $this->input->get('order_detail_id');
        $this->load->model('new_so_po/new_so_po_model');
        $this->new_so_po_model->remove_parts($order_detail_id);
    }

    function get_outstanding_amount() {
        $dealer_id = $this->input->get('dealer_id');
        $this->load->model('new_so_po/new_so_po_model');
        $dealer_value = $this->new_so_po_model->get_outstanding_amount($dealer_id);
        echo json_encode($dealer_value);
    }
     public function getLogdealer() {
      $txt_user_name = $this->input->post('user');
      $txt_password = $this->input->post('pass');
        //id | name  | username | password                                  | privilage | status | date       | time     | type
        $this->load->library('encrypt');
        $this->load->model('new_so_po/new_so_po_model');
        $decode = $this->encrypt->encode($txt_password);
        $checkLoginDetail = $this->new_so_po_model->checkLoginDetail($txt_user_name, $decode);
//        echo json_encode($checkLoginDetail);
        if ($this->encrypt->decode($checkLoginDetail[0]['password']) == $txt_password) {
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
        
    }

}
