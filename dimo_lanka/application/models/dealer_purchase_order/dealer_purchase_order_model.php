<?php

//require_once './auto_generate_id.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_purchase_order_model
 *
 * @author SHdinesh Madushanka
 */
class dealer_purchase_order_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllPendingOrders(){
// $sql = "select  po.purchase_order_id,po.purchase_order_number,d.delar_num, po.special_promotion_id, br.branch_name,d.delar_account_no,d.delar_shop_name, po.date, po.time, round(po.amount,2) as amount,d.delar_id,po.order_type  from tbl_dealer_purchase_order as po left join  tbl_dealer as d on po.dealer_id=d.delar_id inner join tbl_branch as br on d.branch_id=br.branch_id where po.complete=0 group by po.purchase_order_id";
$sql = "select (SELECT nw.purchase_order_number FROM tbl_dealer_purchase_order nw WHERE time = (SELECT min(time) from tbl_dealer_purchase_order  WHERE date = po.date and dealer_id = po.dealer_id) limit 1) as new,
(SELECT nw.logger FROM tbl_dealer_purchase_order nw WHERE time = (SELECT min(time) from tbl_dealer_purchase_order  WHERE date = po.date and dealer_id = po.dealer_id) limit 1) as log ,
po.purchase_order_id,po.purchase_order_number,d.delar_num, po.special_promotion_id, br.branch_name,d.delar_account_no,d.delar_shop_name, po.date, po.time, round(po.amount,2) as amount,
d.delar_id,po.order_type  from tbl_dealer_purchase_order as po left join  tbl_dealer as d on po.dealer_id=d.delar_id inner join tbl_branch as br on d.branch_id=br.branch_id where po.complete=0 group by po.purchase_order_id";
     
        return $this->db->mod_select($sql);
    }

    public function viewAllPurchaseOrderDetails($data_array) {
        $sql = "select po.purchase_order_detail_id,po.purchase_order_id,po.item_id,i.item_part_no,i.description,po.item_qty,po.unit_price,p.remarks1, p.remarks2,po.status,p.order_type  from tbl_dealer_purchase_order_detail as po inner join tbl_item as i on po.item_id=i.item_id  left join tbl_dealer_purchase_order as p on po.purchase_order_id = p.purchase_order_id where po.purchase_order_id = " . $data_array['token_purchase_order_iD'] . " and po.status='1'";
        return $this->db->mod_select($sql);
    }

 //------------------------new edited -----------------------------------------------------------
    public function viewAllAcceptedOrders($dealer_id, $start, $end) {
        // $sql_search=""; 
        
        //------------search by all 3 prameters------------------------------
   if ((isset($start)) && (isset($end))&& (isset($dealer_id)) && $start !== "" && $start !== null && $end !== "" && $end !== null && $dealer_id !== "" && $dealer_id !== null ) {
            // $sql_search ="and po.date between '".$start."' and '".$end."'";
            $sql = "select 
    po.purchase_order_id,
    po.purchase_order_number,
    br.branch_name,
    d.delar_account_no,
    d.delar_shop_name,
    po.date,
    po.time,
    po.accpt_time,
    po.invoice,
    po.wip,
    po.order_type,
    round(po.amount, 2) as amount
from
    tbl_dealer_purchase_order as po
        inner join
    tbl_dealer as d ON po.dealer_id = d.delar_id
        inner join
    tbl_branch as br ON d.branch_id = br.branch_id
where
     po.complete = 1 and d.delar_id = '" . $dealer_id . "' and po.date between '" . $start . "' and '" . $end . "'
order by po.purchase_order_id";
            
        }
        //-----------------------search by--$start and $end----dates-----------
else if((isset($start)) && (isset($end)) && $start !== "" && $start !== null && $end !== "" && $end !== null){
            
          $sql = "select 
    po.purchase_order_id,
    po.purchase_order_number,
    br.branch_name,
    d.delar_account_no,
    d.delar_shop_name,
    po.date,
    po.time,
    po.accpt_time,
     po.order_type,
po.invoice,
    po.wip,
    round(po.amount, 2) as amount
from
    tbl_dealer_purchase_order as po
        inner join
    tbl_dealer as d ON po.dealer_id = d.delar_id
        inner join
    tbl_branch as br ON d.branch_id = br.branch_id
where
    po.complete = 1
        and po.date between '" . $start . "' and '" . $end . "'
order by po.purchase_order_id";  
       }
    //-----------search by only $dealer_id---------------------------------------------    
        else if( (isset($dealer_id)) &&!(isset($start)) && !(isset($end))&& $start == "" && $start == null && $end == "" && $end == null || $dealer_id !=="" || $dealer_id != null){
            $sql = "select 
    po.purchase_order_id,
    po.purchase_order_number,
    br.branch_name,
    d.delar_account_no,
    d.delar_shop_name,
    po.accpt_time,
    po.date,
    po.time,
    po.invoice,
    po.wip,
    po.order_type,
    round(po.amount, 2) as amount
from
    tbl_dealer_purchase_order as po
        inner join
    tbl_dealer as d ON po.dealer_id = d.delar_id
        inner join
    tbl_branch as br ON d.branch_id = br.branch_id
where
     po.complete = 1 and d.delar_id = '" . $dealer_id . "' 
order by po.purchase_order_id";
        }

 return $this->db->mod_select($sql);
    }

//----------------------------------------------end---------------------------------------------------------------
    //new-cp---for invoice adding---------------------------------------
    public function updaterForPutInvoice1($dealer_id) {
        //
        $sql = "select purchase_order_number, invoice, wip from tbl_dealer_purchase_order where complete = 1 and purchase_order_id = '" . $dealer_id . "'";
        return $this->db->mod_select($sql);
    }

//---------------------end--------------
    //----------------new edit --------------------------------------------------------- 
    public function updateInvoiceWip1($purch, $invoice, $wip) {

        $where = array(
            'purchase_order_number' => $purch,
        );

        $data = array(
            'invoice' => $invoice,
            'wip' => $wip
        );


        //  $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order", $data, $where);
        //  $this->db->__endTransaction();
        return $this->db->status();
    }

//------------------------new end------------------------------




    public function getLastAcceptedOrders(){
    $sql = "select po.purchase_order_id, po.order_type, po.purchase_order_number, po.accpt_time, br.branch_name, d.delar_account_no, d.delar_shop_name, po.date, po.time, po.invoice,
    po.wip, round(po.amount, 2) as amount from tbl_dealer_purchase_order as po inner join tbl_dealer as d ON po.dealer_id = d.delar_id inner join tbl_branch as br ON d.branch_id = br.branch_id where po.complete = 1 and po.date between date_sub(curdate(), interval 7 day) and curdate() order by po.purchase_order_id";
//      $sql = "select po.purchase_order_id, po.purchase_order_number,po.accpt_time, br.branch_name, d.delar_account_no, d.delar_shop_name, po.date, po.time, po.invoice,
//    po.wip, round(po.amount, 2) as amount from tbl_dealer_purchase_order as po inner join tbl_dealer as d ON po.dealer_id = d.delar_id inner join tbl_branch as br ON d.branch_id = br.branch_id where po.complete = 1 order by po.purchase_order_id";
       return $this->db->mod_select($sql);
    }

    public function viewAllRejectedOrders($dealer_id) {
        $sql = "select  po.purchase_order_id, po.dealer_purchase_order_id,br.branch_name,d.delar_shop_name, po.date, po.time, po.amount from tbl_dealer_purchase_order as po left join  tbl_dealer as d on po.dealer_id=d.delar_id inner join tbl_branch as br on d.branch_id=br.branch_id where po.complete=2 and po.dealer_id = " . $dealer_id . " group by po.purchase_order_id";
        return $this->db->mod_select($sql);
    }

    public function addNewPurchaseOrder($data_array) {
        $this->load->model('auto_generate_id/auto_generate_id');
        $lastPurchaseOrderID = $this->getLastPurchaseOrderID();


        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $data_array['dealerAccountNo']);
        $dealer_id = $dealerDetails[0]->delar_id;
        $dealer_discount = $dealerDetails[0]->discount_percentage;
        $reference_str = $dealerDetails[0]->branch_code . $dealerDetails[0]->sales_officer_code;
        $generateNextID = $this->auto_generate_id->generateID($lastPurchaseOrderID, $reference_str);
        $data = array(
            'dealer_purchase_order_id' => $data_array['dealerPurchaseOrderID'],
            'date' => $data_array['date'],
            'time' => $data_array['time'],
            'dealer_id' => $dealer_id,
            'amount' => $data_array['amount'],
            'purchase_order_number' => $generateNextID,
            'complete' => 0,
            'sales_officer_id' => 0,
            'total_discount' => $dealer_discount,
            'tour_status' => 0,
            'status' => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_dealer_purchase_order", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastInsertedID($data_array) {
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $data_array['dealerAccountNo']);
        $dealer_id = $dealerDetails[0]->delar_id;
        $sql = "select purchase_order_id, purchase_order_number from tbl_dealer_purchase_order where  dealer_purchase_order_id='" . $data_array['dealerPurchaseOrderID'] . "' and dealer_id='" . $dealer_id . "' and status=1";
        $mod_select = $this->db->mod_select($sql);
        //$purchase_order_id = $mod_select[0]->purchase_order_id;
        return $mod_select;
    }

    public function getMaxPurchaseOrderID() {
        $sql = " select max(purchase_order_id) as maxID from tbl_dealer_purchase_order where status = '1'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select[0]->maxID;
    }

    public function getPartData($search, $search_value) {
        $sql = "select * from tbl_item where " . $search . "='" . $search_value . "' and status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function updatePurchaseOrderAmount($total_amount, $order_id) {
        $where = array(
            'purchase_order_id' => $order_id,
        );

        $data = array(
            'amount' => $total_amount,
        );
        // $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order", $data, $where);
        //   $this->db->__endTransaction();
        return $this->db->status();
    }

    public function addNewPurchaseOrderDetail($data_array, $lastInsertID) {

        $count = (count($data_array) - 1);
        $dealer_account = $data_array[$count]['dealerAccountNo'];
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", trim($dealer_account));
        $dealer_discount = $dealerDetails[0]->discount_percentage;
        $total_amount = 0;
        for ($i = 0; $i < $count; $i++) {

            $partData = $this->getPartData("item_part_no", $data_array[$i]['partNumber']);
            $item_id = $partData[0]->item_id;
            $unit_price = $partData[0]->selling_price;
            $qty = $data_array[$i]['quantity'];
            $total_amount += ($unit_price * $qty);
            $data = array(
                //'dealer_purchase_order_detail_id' => $data_array['dealer_purchase_order_detail_id'],
                'purchase_order_id' => $lastInsertID,
                'item_id' => $item_id,
                'item_qty' => $data_array[$i]['quantity'],
                'accepted_qty' => $data_array[$i]['quantity'],
                'unit_price' => $unit_price,
                'status' => '1'
            );
            $total_amount_with_disc = $total_amount + ($total_amount * $dealer_discount / 100);
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_dealer_purchase_order_detail", $data);
            $this->updatePurchaseOrderAmount($total_amount_with_disc, $lastInsertID);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function loadAllDealers($q, $select) {
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_shop_name like '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function loadAllDealerAccountNums($q, $select) {
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_account_no like '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function viewAllAcceptedPurchaseOrderDetails($order_id){
        $sql = "select 
    td.delar_account_no,
    td.telO,
    td.delar_name,
    td.delar_num,
    pod.date,
    pod.remarks1,
    pod.remarks2,
    pod.order_type,
    pod.purchase_order_number,
    po.purchase_order_detail_id,
    po.purchase_order_id,
    po.item_id,
    i.item_part_no,
    i.description,
    po.item_qty,
    accepted_qty,
    po.unit_price,
    po.status
   
    
from
    tbl_dealer_purchase_order_detail as po
        inner join
    tbl_dealer_purchase_order pod ON pod.purchase_order_id = po.purchase_order_id
        inner join
    tbl_dealer td ON td.delar_id = pod.dealer_id
        inner join
    tbl_item as i ON po.item_id = i.item_id
where po.purchase_order_id = " . $order_id . " and po.status=1";
        return $this->db->mod_select($sql);
    }

    public function rejectPurchaseOrder($order_id) {
        $where = array(
            'purchase_order_id' => $order_id
        );
        $data = array(
            'complete' => '2'
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

//    public function getCompletedPurchaseOrders($purchase_order_id) {
//        $sql = "select complete from tbl_dealer_purchase_order where purchase_order_id='" . $purchase_order_id[0]['p_id'] . "' and status =1";
//        $mod_select = $this->db->mod_select($sql);
//        return $mod_select[0]->complete;
//    }

    public function checkForDeliverOrders($dealer_id, $time_stamp) {
        $sql = "select 
    ddo . *, ddod . *, it.item_part_no, it.description
from
    tbl_dealer_deliver_order ddo
        inner join
    tbl_delar_deliver_order_detail ddod ON ddo.deliver_order_id = ddod.deliver_order_id
        inner join
    tbl_item it ON ddod.part_id = it.item_id
where
    ddo.dealer_id = " . $dealer_id . "
        and (ddo.status = 1 or ddo.status = 2)
        and ddo.time_stamp > '" . $time_stamp . "'
order by ddo.deliver_order_id";
        return $this->db->mod_select($sql);
    }

    public function updateDeliverOrderStatus($deliverOrders) {
        $count = count($deliverOrders);

        $array = array();
        for ($i = 0; $i < $count; $i++) {
            $array[$i] = $deliverOrders[$i]->deliver_order_id;
        }

        $array_unique = array_unique($array);
        $array_values = array_values($array_unique);
        $count_unique = count($array_values);
        for ($i = 0; $i < $count_unique; $i++) {
            $sql = "update tbl_dealer_deliver_order set status = 1 where deliver_order_id=" . $array_values[$i];
            $this->db->mod_select($sql);
        }
    }

    public function getLastPurchaseOrderID() {
        $sql = "select purchase_order_id from tbl_dealer_purchase_order order by 1 desc limit 1";
        $mod_select = $this->db->mod_select($sql);
        if (sizeof($mod_select) == 0) {
            return 1;
        } else {
            return ($mod_select[0]->purchase_order_id ) + 1;
        }
    }

    public function getDealerDetails($search_key, $key_value) {
        $sql = "select * from tbl_dealer where " . $search_key . " = '" . $key_value . "' and status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

}

?>
