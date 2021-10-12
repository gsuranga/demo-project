<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service_model
 *
 *
 */
class service_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPassword($user_name) {
        $sql = "select password from tbl_user where username= '" . $user_name . "' and status = 1";
        return $this->db->mod_select($sql);
    }

    public function getUserDetails($user_name) {
        $sql = "select employee_id,name,username from tbl_user where username = '" . $user_name . "' and status =1";
        return $this->db->mod_select($sql);
    }

    public function item_details($ts) {
        $sql = "select item_id,item_part_no,description,selling_price,total_stock_qty,status,time_stamp  FROM tbl_item WHERE time_stamp>'" . $ts . "'";
        return $this->db->mod_select($sql);
    }

    public function dealer_details($ts, $so) {
        $time_stamp = $ts;
        $sales_officer = $so;
        $sql = "SELECT 
    delar_id,
    delar_account_no,
    delar_name,
    delar_address,
    status,
    delar_shop_name,
    so_update_status
FROM
    tbl_dealer
WHERE
    branch_id = (SELECT 
            branch_id
        FROM
            tbl_sales_officer
        WHERE
            sales_officer_id = " . $so . ")
        AND dealer_time_stamp > " . $ts;
        return $this->db->mod_select($sql);
    }

    //------------------------Suggest Order----------------------------------------
//    public function getDealerDetailforPos($account_number) {
//
//        $sql = "select delar_id from tbl_dealer where delar_account_no='$account_number'";
//        return $dealer_id = $this->db->mod_select($sql);
//    }
//
//    public function getsuggestOrderDetail($dealer_id) {
//        $sql = "select * from tbl_dealer_purchase_order tsopo Left Join tbl_sales_officer tso on tsopo.sales_officer_id=tso.sales_officer_id join tbl_dealer td on tsopo.dealer_id=td.delar_id join tbl_branch tb on td.branch_id=tb.branch_id where tsopo.status='1' and tsopo.complete='3' and tsopo.dealer_id=$dealer_id";
//        return $this->db->mod_select($sql);
//    }
//
//    public function getItemForSuggestOrder($order_id) {
//        $sql = "select tbl_item.item_part_no,tbl_item.description,tbl_dealer_purchase_order_detail.item_qty,tbl_dealer_purchase_order_detail .unit_price from tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail RIGHT JOIN tbl_item tbl_item on  tbl_dealer_purchase_order_detail.item_id=tbl_item.item_id where tbl_dealer_purchase_order_detail.status='1' and tbl_dealer_purchase_order_detail.purchase_order_id=$order_id";
//        return $this->db->mod_select($sql);
//    }
//
//    function acceptsuggestPurchaseOrder($pur_order_id) {
//
//        $sql = "update tbl_dealer_purchase_order SET complete=0 where  purchase_order_id=$pur_order_id";
//        $this->db->mod_select($sql);
//    }
    //------------------------Suggest Order----------------------------------------
    public function getDealerDetailforPos($account_number) {

        $sql = "select delar_id from tbl_dealer where delar_account_no='$account_number'";
        return $dealer_id = $this->db->mod_select($sql);
    }

    public function getsuggestOrderDetail($dealer_id) {
        $sql = "select * from tbl_dealer_purchase_order tsopo Left Join tbl_sales_officer tso on tsopo.sales_officer_id=tso.sales_officer_id join tbl_dealer td on tsopo.dealer_id=td.delar_id join tbl_branch tb on td.branch_id=tb.branch_id where tsopo.status='1' and tsopo.complete='3' and tsopo.dealer_id=$dealer_id";
        return $this->db->mod_select($sql);
    }

    public function getItemForSuggestOrder($order_id) {
        $sql = "select tbl_item.item_part_no,tbl_item.description,tbl_dealer_purchase_order_detail.item_qty,tbl_dealer_purchase_order_detail .unit_price from tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail RIGHT JOIN tbl_item tbl_item on  tbl_dealer_purchase_order_detail.item_id=tbl_item.item_id where tbl_dealer_purchase_order_detail.status='1' and tbl_dealer_purchase_order_detail.purchase_order_id=$order_id";
        return $this->db->mod_select($sql);
    }

    //----------------------------------------------VAT ---------------------------------------------------
    function get_vat_amount() {
        $sql = "Select * FROM tbl_vat";
        return $this->db->mod_select($sql);
    }

    //------------------Accept Pur Order----------------------------------------------------------------
    function acceptsuggestPurchaseOrder($pur_order_id, $tawd_double, $tawv_double, $pur_order_sig) {
        $sql = "update tbl_dealer_purchase_order SET complete=0,purchase_order_number='$pur_order_sig',without_vat=$tawd_double,amount=$tawv_double where  purchase_order_id=$pur_order_id";
        $this->db->mod_select($sql);
    }

    function remove_old_items($pur_order_id) {
        $sql = "UPDATE tbl_dealer_purchase_order_detail SET `status`=0 where `purchase_order_id`=$pur_order_id";
        $this->db->mod_select($sql);
    }

    function insert_as_new($pur_order, $get) {
        $main_array = array();
        // print_r($get);
        foreach ($get AS $val) {
            $part_no = $val->part_no;
            $qty = $val->qty;
            $unit_price = $val->unit_price;
            $sql = "SELECT `item_id` FROM `tbl_item` WHERE `item_part_no`='$part_no'";
            $item = $this->db->mod_select($sql);
            $item_id = $item[0]->item_id;
            $insert_array = array(
                'purchase_order_id' => $pur_order,
                'item_id' => $item_id,
                'item_qty' => $qty,
                'unit_price' => $unit_price,
                'status' => 1
            );
            array_push($main_array, $insert_array);
        }

        $this->db->insert_batch('tbl_dealer_purchase_order_detail', $main_array);
        return $this->db->status();
    }

    //---------------------Reject-----------------
    public function reject_fu($pur_order, $reason) {
        $sql = "UPDATE tbl_dealer_purchase_order SET `complete`=4,reason='$reason' where `purchase_order_id`=$pur_order";
        $cd = $this->db->mod_select($sql);
        return $this->db->status();
    }

    //-----------Auto Genarate---------------------
    public function getId($table) {

        $sql = "SELECT * FROM " . $table . " ORDER BY 3 DESC LIMIT 1";
        $mod_select = $this->db->mod_select($sql);
        $purchase_order_number = $mod_select[0]->purchase_order_number;
        return $purchase_order_number;
    }
   //--------------------Get Aso Detail------------
    public function get_aso_detail($pur_order){
        $sql="SELECT concat( branch_code,tbl_sales_officer.sales_officer_code) AS prefix FROM `tbl_dealer_purchase_order` LEFT JOIN tbl_sales_officer ON tbl_dealer_purchase_order.`sales_officer_id`=tbl_sales_officer.sales_officer_id LEFT JOIN tbl_branch ON tbl_sales_officer.branch_id=tbl_branch.branch_id where tbl_dealer_purchase_order.purchase_order_id=$pur_order";
        return $this->db->mod_select($sql);
    }
    //-------------------Dealer Payment---------------------------

    public function getAllDealerPaymentDetail() {
        $sql = "select
tddo.deliver_order_id,
ta.area_name,
tb.branch_name,
tb.branch_account_no,
tso.sales_officer_name,
td.delar_name,
td.delar_shop_name,
td.delar_address,
tddo.added_date,
tddo.added_time,
tddo.invoice_no,
tddo.total_amount,
tddo.wip_no
from
tbl_dealer_deliver_order tddo 
INNER JOIN 
tbl_dealer td ON td.delar_id = tddo.dealer_id 
INNER JOIN tbl_branch tb ON tb.branch_id = td.branch_id  
INNER JOIN tbl_area ta ON ta.area_id = tb.area_id 
INNER JOIN tbl_sales_officer tso ON tso.sales_officer_id = td.sales_officer_id";
        return $this->db->mod_select($sql);
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//
    public function getAllPendingPayments($officer_id) {
        $sql = "select 
    ddo . *,
    @cash_payment:=coalesce((select 
                    round(coalesce(sum(cash_payment), 0), 2)
                from
                    tbl_cash_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                        and status = 1
                group by deliver_order_id),
            0) as cash_payment,
    @cheque_payment:=coalesce((select 
                    round(coalesce((cp.cheque_payment), 0), 2)
                from
                    tbl_cheque_payment cp
                        left join
                    tbl_return_cheque rc ON cp.cheque_payment_id = rc.cheque_payment_id
                where
                    cp.realized_status = 1
                        and cp.cheque_payment_id not in (select 
                            cheque_payment_id
                        from
                            tbl_return_cheque)
                        and cp.deliver_order_id = ddo.deliver_order_id
                group by cp.deliver_order_id),
            0) as cheque_payment,
    @bank_dep_payment:=coalesce((select 
                    round(coalesce(sum(deposit_payment), 0), 2)
                from
                    tbl_bank_deposit_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as bank_dep_payment,
    @total_payment:=round((@cash_payment + @cheque_payment + @bank_dep_payment),
            2) as total_payment,
    @pending_amount:=round((ddo.total_amount - @total_payment), 2) as pending_amount
from
    tbl_dealer_deliver_order ddo
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
where
    (ddo.status = 1 or ddo.status = 2)
        and td.status = 1
        and td.sales_officer_id = " . $officer_id . "
group by ddo.deliver_order_id
having pending_amount > 0
";
        return $mod_select = $this->db->mod_select($sql);
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//
}
