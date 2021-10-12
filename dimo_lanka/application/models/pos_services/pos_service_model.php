<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class pos_service_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function addDealerSales($data_array) {
        $count = count($data_array);
        $dealer_acc_no = $data_array[$count - 1]['dealer_acc_no'];
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails('delar_account_no', $dealer_acc_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        for ($i = 0; $i < $count - 1; $i++) {
            $part_id = $this->getItemIDForPartNo($data_array[$i]['part_no']);
            $sales_data = array(
                'id_dealer' => $dealer_id,
                'id_item' => $part_id,
                'qty' => $data_array[$i]['qty'],
                'unit_price' => $data_array[$i]['unit_price'],
                'sold_date' => $data_array[$i]['date'],
                'status' => 1,
                'discount' => $data_array[$i]['discount'],
            );
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_dealer_sales", $sales_data);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function addDealerStocks($data_array) {
        $count = count($data_array);
        $dealer_acc_no = $data_array[$count - 1]['dealer_acc_no'];
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails('delar_account_no', $dealer_acc_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        for ($i = 0; $i < $count - 1; $i++) {
            $part_id = $this->getItemIDForPartNo(str_replace(" ", "", $data_array[$i]['part_no']));
            $dealerStockDetails = $this->getDealerStockDetails($dealer_id, $part_id);
            //echo(count($dealerStockDetails));
            if (count($dealerStockDetails) > 0) {
                $where = array(
                    'part_id' => $part_id,
                    'dealer_id' => $dealer_id
                );
                $stock_data = array(
                    'first_stock_date' => $data_array[$i]['first_stock_date'],
                    'last_stock_date' => $data_array[$i]['last_stock_date'],
                    'remaining_qty' => $data_array[$i]['remaining_stock_qty'],
                    'status' => 1
                );
                $this->db->__beginTransaction();
                $update = $this->db->update('tbl_dealer_stock', $stock_data, $where);
            } else if (count($dealerStockDetails) == 0 && isset($data_array[$i]['last_stock_date'])) {
                $sales_data = array(
                    'dealer_id' => $dealer_id,
                    'part_id' => $part_id,
                    'first_stock_date' => $data_array[$i]['first_stock_date'],
                    'last_stock_date' => $data_array[$i]['last_stock_date'],
                    'remaining_qty' => $data_array[$i]['remaining_stock_qty'],
                    'status' => 1,
                );
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_dealer_stock", $sales_data);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function addLossSalesDetails($data_array) {
        $count = count($data_array);
        $dealer_acc_no = $data_array[$count - 1]['delar_account_no'];
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails('delar_account_no', $dealer_acc_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        //echo $count."  ".$dealer_id;
        for ($i = 0; $i < ($count - 1); $i++) {
            $part_id = $this->getItemIDForPartNo($data_array[$i]['part_no']);
            $loss_sales_data = array(
                'dealer_id' => $dealer_id,
                'part_id' => $part_id,
                'loss_qty' => $data_array[$i]['loss_qty'],
                'loss_type' => $data_array[$i]['loss_type'],
                'loss_date' => $data_array[$i]['loss_date'],
                'status' => 1,
            );
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_dealer_loss_sales", $loss_sales_data);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getItemIDForPartNo($part_no) {
        $sql = "select item_id from tbl_item where item_part_no='" . $part_no . "'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select[0]->item_id;
    }

    public function getDealerStockDetails($dealer_id, $part_id) {
        $sql = "select * from tbl_dealer_stock where dealer_id=" . $dealer_id . " and part_id=" . $part_id . " and status=1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getUpdatedParts($dealer_acc_no) {
            
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails('delar_account_no',$dealer_acc_no);
        
        $dealer_id = $dealerDetails[0]->delar_id;
        $sql = "select 
    replace(it.item_part_no, ' ', '') as item_part_no,
    it.description,
    round(ifnull((select 
                            it.selling_price + it.selling_price * (select 
                                        amount
                                    from
                                        tbl_vat tv
                                    where
                                        status = 1) / 100
                        ),
                    0),
            2) as selling_price
from
    tbl_dealer_stock ds
        inner join
    tbl_item it ON ds.part_id = it.item_id
where
    ds.status = 1 and it.status = 1
        and ds.dealer_id = " . $dealer_id;
        
//        $sql="select 
//    replace(it.item_part_no, ' ', '') as item_part_no,
//    it.description,
//    round(ifnull((select 
//   it.selling_price + it.selling_price * (select 
//     amount
// from
// tbl_vat tv
//   where
//        status = 1) / 100
//                        ),
//                    0),
//            2) as selling_price
//from
//    tbl_dealer_stock ds
//        inner join
//    tbl_item it ON ds.part_id = it.item_id
//    
//    inner join tbl_dealer td on td.delar_id = ds.dealer_id
//where
//    ds.status = 1 and it.status = 1
//        and td.delar_account_no = '".$dealer_acc_no."' ";
        
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function insertNewDirectPurchaseOder($data_array) {
        $this->db->__beginTransaction();
        $this->load->model('auto_generate_id/auto_generate_id');
        $this->load->model('delar/delar_model');
        $lastPurchaseOrderID = $this->getLastPurchaseOrderID();
        $po_array = $data_array->po_data;
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $po_array->dealerAccountNo);
        $dealer_id = $dealerDetails[0]->delar_id;
        $reference_str = $dealerDetails[0]->branch_code . $dealerDetails[0]->sales_officer_code;
        $generateNextID = $this->auto_generate_id->generateID($lastPurchaseOrderID, $reference_str);
        $dealer_po_id = $po_array->dealerPurchaseOrderID;
        $po_data = array(
            'dealer_purchase_order_id' => $dealer_po_id,
            'purchase_order_number' => $generateNextID,
            'date' => $po_array->date,
            'time' => $po_array->time,
            'complete' => 0,
            'dealer_id' => $dealer_id,
            'amount' => $po_array->final_amount,
            'tour_status' => $po_array->tour_status,
            'is_sales_officer' => $po_array->is_sales_officer,
            'discount_percentage' => $po_array->discount_percentage,
            'current_vat' => $po_array->current_vat,
            'assigned' => 0,
            'total_discount' => $po_array->tot_disc,
            'status' => $po_array->status,
        );
        $this->db->insertData("tbl_dealer_purchase_order", $po_data);
        $last_id = $this->db->insert_id();
        if (isset($last_id)) {
            foreach ($data_array->parts_data as $json_obj) {
                $partData = $this->getPartData("item_part_no", $json_obj->partNo);
                $item_id = $partData[0]->item_id;
                $parts_detail = array(
                    'purchase_order_id' => $last_id,
                    'item_id' => $item_id,
                    'item_qty' => $json_obj->qty,
                    'unit_price' => $json_obj->unit_price,
                    'status' => $json_obj->status,
                );
                $this->db->insertData("tbl_dealer_purchase_order_detail", $parts_detail);
            }
        }
        $return_array = array(
            "admin_po_id" => $last_id,
            "po_number" => $generateNextID,
        );
        $this->db->__endTransaction();
        //$json_encode = json_encode($return_array, JSON_FORCE_OBJECT);
        return $return_array;
    }

    public function getLastInsertedID($dealer_id, $dealer_po_id) {
        $sql = "select purchase_order_id, purchase_order_number from tbl_dealer_purchase_order where  dealer_purchase_order_id='" . $dealer_po_id . "' and dealer_id='" . $dealer_id . "' and status=1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getPartData($search, $search_value) {
        $sql = "select * from tbl_item where " . $search . "='" . $search_value . "' and status = 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
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

    public function insertNewDealerReturn($data_array) {
        $this->db->__beginTransaction();
        $this->load->model('delar/delar_model');
        $ret_array = $data_array->return_data;
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $ret_array->dealer_acc_no);
        $deliver_order_data = $this->getDeliverOrderData($ret_array->invoice_no, $ret_array->wip_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        $dealer_ret_id = $ret_array->dealer_ret_id;
        $deliver_order_id = 0;
        (count($deliver_order_data) > 0 ? $deliver_order_id = $deliver_order_data[0]->deliver_order_id : $deliver_order_id = 0);
        $ret_data = array(
            'dealer_pos_ret_id' => $dealer_ret_id,
            'deliver_order_id' => $deliver_order_id,
            'added_date' => $ret_array->ret_date,
            'added_time' => $ret_array->ret_time,
            'complete_status' => 0,
            'dealer_id' => $dealer_id,
            'tour_status' => 0,
            'status' => 1,
        );
        $this->db->insertData("tbl_dealer_return", $ret_data);
        $last_id = $this->db->insert_id();
        $current_timestamp = date('Y-m-d H:i:s');
        if (isset($last_id)) {
            foreach ($data_array->return_parts as $json_obj) {
                $partData = $this->getPartData("item_part_no", $json_obj->part_no);
                $item_id = $partData[0]->item_id;
                $parts_detail = array(
                    'dealer_ret_id' => $last_id,
                    'item_id' => $item_id,
                    'ret_qty' => $json_obj->ret_qty,
                    'delivered' => $json_obj->is_delivered,
                    'selling_value' => $json_obj->selling_val,
                    'ret_reason' => $json_obj->ret_reason,
                    'return_reason' => $json_obj->ret_reason,
                    'status' => 1,
                );
                $this->db->insertData("tbl_dealer_return_detail", $parts_detail);
            }
        }
        $return_array = array(
            "admin_ret_id" => $last_id,
            "time_stamp" => $current_timestamp,
        );
        $this->db->__endTransaction();
        //$json_encode = json_encode($return_array, JSON_FORCE_OBJECT);
        return $return_array;
    }

    public function getDeliverOrderData($inv_no, $wip_no) {
        $sql = "SELECT 
    *
    FROM
    tbl_dealer_deliver_order
    WHERE
    invoice_no = " . $inv_no . " and wip_no = " . $wip_no . "
        and status = 1 order by deliver_order_id desc  limit 1";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getRepAcceptedReturns($dealer_data) {
      //  echo $dealer_data;
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $dealer_data->acc_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        $time_stamp = $dealer_data->time_stamp;
      $sql = "select 
      tdr.dealer_pos_ret_id,
      ti.item_part_no,
      ti.description,
      trr.accepted_date,
      trr.accepted_time,
      trr.time_stamp,
      trrd.accepted_qty,
      trrd.remarks,
      tso.sales_officer_name,
       trr.return_note_no
      from
      tbl_return_rep trr
      inner join
      tbl_return_rep_detail trrd ON trr.return_rep_id = trrd.ret_rep_id
      and trr.status = 1
      inner join
      tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
      and tdr.status = 1
      inner join
      tbl_item ti ON trrd.item_id = ti.item_id 
      inner join
        tbl_sales_officer tso ON trr.rep_id = tso.sales_officer_id
        and tso.status = 1
      where
      tdr.dealer_id = " . $dealer_id . "
      and trr.time_stamp > '" . $time_stamp . "' order by  tdr.dealer_pos_ret_id";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getAdminAcceptedReturns($dealer_data) {
        $this->load->model('delar/delar_model');
        $dealerDetails = $this->delar_model->getDealerDetails("delar_account_no", $dealer_data->acc_no);
        $dealer_id = $dealerDetails[0]->delar_id;
        $time_stamp = $dealer_data->time_stamp;
        $sql = "select 
      tdr.dealer_pos_ret_id,
      ti.item_id,
      ti.item_part_no,
      ti.description,
      tra.accepted_date,
      tra.accepted_time,
      tra.time_stamp,
      trad.accepted_qty as admin_accepted_qty,
      trad.remarks as admin_remarks,
      ifnull(tra.return_note_no,'-') as return_note_no
      from
      tbl_dealer_return tdr
      inner join
      tbl_dealer_return_detail tdrd ON tdr.dealer_ret_id = tdrd.dealer_ret_id
      and tdr.status = 1
      and tdrd.status = 1
      inner join
      tbl_return_rep trr ON tdr.dealer_ret_id = trr.dealer_return_id
      and trr.status = 1
      inner join
      tbl_return_rep_detail trrd ON trr.return_rep_id = trrd.ret_rep_id
      and tdrd.item_id = trrd.item_id
      and trrd.status = 1
      inner join
      tbl_item ti ON trrd.item_id = ti.item_id
      and ti.status = 1
      inner join
      tbl_return_admin tra ON trr.return_rep_id = tra.return_rep_id
      and tra.status = 1
      inner join
      tbl_return_admin_detail trad ON tra.return_admin_id = trad.return_admin_id
      and trad.item_id = trrd.item_id
      and trad.status = 1
      where
      tdr.dealer_id = " . $dealer_id . "
      and tra.time_stamp > '" . $time_stamp . "' order by tdr.dealer_pos_ret_id";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

}
