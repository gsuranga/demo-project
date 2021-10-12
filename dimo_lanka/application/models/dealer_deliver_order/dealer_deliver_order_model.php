<?php

//header("Access-Control-Allow-Origin: *");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_deliver_order_model
 *
 * @author SHDINESH
 */
class dealer_deliver_order_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insertNewDeliverOrder($data_array) {
        //  print_r($data_array);
        $current_vat = $this->getCurrentVatAmount();
        $vat_amount = $current_vat[0]->amount;
        $total = $data_array->total + ($data_array->total * $vat_amount / 100);
        $deliver_order_data = array(
            "dealer_id" => $data_array->delar_id,
            "invoice_no" => $data_array->invoice,
            "wip_no" => $data_array->wip,
            "total_amount" => $total,
            "added_date" => $data_array->date_edit,
            "added_time" => $data_array->time,
            "due_date" => $data_array->due_date,
            //"time_stamp" => date('Y-m-d H:i:s'),
            "status" => 2
        );

        $this->db->__beginTransaction();
        $this->db->insertData('tbl_dealer_deliver_order', $deliver_order_data);

        $this->db->__endTransaction();
        $this->db->status();
        return $data_array->wip;
    }

    public function insertDealerDeliverOrderDetail($data_array, $last_id) {
        // print_r($data_array);
        $current_vat = $this->getCurrentVatAmount();
        $vat_amount = $current_vat[0]->amount;

        $row_count = count($data_array);
        // for ($i = 0; $i < $row_count; $i++) {
        foreach ($data_array as $value) {


            $total_selling = $value->selling_val + ($value->selling_val * $vat_amount / 100);
            $total_retail = $value->retail_val + ($value->retail_val * $vat_amount / 100);
            $part_id = $this->getPartData('item_id', 'item_part_no', $value->part_no);
            //echo $part_id;
            if (!isset($part_id) || $part_id == 0) {
                $this->load->model('item/item_model');
                $part_no = $value->part_no;
                $description = $value->description;
                $added_date = date('Y-m-d');
                $added_time = date('H:i:s');
                $status = 1;
                $part_array = array(
                    "part_no" => $part_no,
                    "description" => $description,
                    "added_date" => $added_date,
                    "added_time" => $added_time,
                    "status" => $status,
                );
                //print_r($data_array);
                $this->item_model->insertNewPart($part_array);
                if (isset($value->part_no)) {
                    $part_id = $this->getPartData('item_id', 'item_part_no', $value->part_no);
                }


                //echo "no " . $data_array[$i]->part_no;
            }
            $deliver_order_detail_data = array(
                'deliver_order_id' => $last_id,
                'part_id' => $part_id,
                'selling_val' => $total_selling,
                'retail_val' => $total_retail,
                'quantity' => $value->qty,
                'status' => 1
            );

            $this->db->__beginTransaction();
            $this->db->insertData('tbl_delar_deliver_order_detail', $deliver_order_detail_data);
            // }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateStatus($data_array) {
        print_r($data_array);
        
        echo $data_array['txt_p_o_no'];
        $where = array(
            'purchase_order_id' => $data_array['txt_p_o_no']
        );
        $data = 0;
        //print_r($where);
        if (isset($data_array['submit_all_items'])) {
            $data = array(
                'complete'  => '1',
                'accpt_time'=> date("Y-m-d H:i:s"),
                'logger'=> $data_array['logger'],
            );
            //print_r($data);
        } elseif (isset($data_array['reject_purchase_order'])) {
            $data = array(
                'complete' => '2'
            );
        }
        $this->db->__beginTransaction();
        $this->db->update("tbl_dealer_purchase_order", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateAcceptedQty($data_array) {
        //print_r($data_array);
        $row_count = $data_array['txt_hidden2'];
        for ($i = 0; $i < $row_count; $i++) {
            $where = array(
                'purchase_order_id' => $data_array['txt_p_o_no'],
                'item_id' => $data_array['txt_item_id' . $i]
            );
            $accepted_qty = array(
                'accepted_qty' => $data_array['txt_qty_' . $i]
            );
            $this->db->__beginTransaction();
            $this->db->update('tbl_dealer_purchase_order_detail', $accepted_qty, $where);
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

//    public function getPurchaseOrderData($purchase_order) {
//        $sql = "select * from tbl_dealer_deliver_order where purchase_order_id='" . $purchase_order[0]['p_id'] . "' and status=1";
//        $mod_select = $this->db->mod_select($sql);
//        echo $mod_select[0]->deliver_order_id;
//    }
    public function jsonDeliverOrderData($purchase_order_id) {
        $sql = "select do.deliver_order_id,do.purchase_order_id,do.total_amount,do.accepted_date,do.accepted_time,u.username,do.status from tbl_dealer_deliver_order as do inner join tbl_user as u on do.accepted_by = u.id where do.purchase_order_id= '" . $purchase_order_id[0]['p_id'] . "' and do.status=1";
        $mod_select = $this->db->mod_select($sql);

        $deliver_order_id = $mod_select[0]->deliver_order_id;
        $total_amount = $mod_select[0]->total_amount;
        $accepted_date = $mod_select[0]->accepted_date;
        $accepted_time = $mod_select[0]->accepted_time;
        $username = $mod_select[0]->username;
        $status = $mod_select[0]->status;

        $json_encode = json_encode(array("deliver_order_id" => $deliver_order_id, "total_amount" => $total_amount, "accepted_date" => $accepted_date, "accepted_time" => $accepted_time, "username" => $username, "status" => $status), JSON_FORCE_OBJECT);
        return $json_encode;
    }

    public function getDeliverOrderDetailData($deliver_order_id) {
        $sql = "select dod.deliver_order_detail_id,dod.deliver_order_id,dod.part_id,i.item_part_no,dod.unit_price,dod.quantity,dod.status from tbl_delar_deliver_order_detail as dod inner join tbl_item as i on dod.part_id = i.item_id where deliver_order_id ='" . $deliver_order_id . "' and dod.status = 1";
        $mod_select = $this->db->mod_select($sql);
        $json_encode = json_encode($mod_select, JSON_FORCE_OBJECT);
        return $json_encode;
    }

    public function getDeliverOrderData($start_date, $end_date, $area_id) {
        $sql = "select 
    dl.delar_id,
    als.invoice,
    als.wip,
    als.date_edit,
    als.time,
    als.qty as qty,
    round(sum(als.selling_val), 2) as total,
    (concat((als.date_edit), ' ', time(als.time))) as date1,
    date_add(als.date_edit, INTERVAL 30 DAY) as due_date
from
    tbl_all_sales als
        inner join
    tbl_dealer dl ON lower(trim(als.acc_no)) = lower(trim(dl.delar_account_no))
where
    area_id = " . $area_id . " and qty > 0
group by als.wip
having date1 between '" . $start_date . "' and '" . $end_date . "'
order by dl.delar_id , als.invoice asc";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function getDeliverOrderDetail($start_date, $end_date, $wip, $area_id) {
        $sql = "select 
    als.part_no,
    als.description,
    als.invoice,
    als.wip,
    als.qty as qty,
    als.selling_val,
    als.retail_val,
    (concat((als.date_edit), ' ', time(als.time))) as date1
from
    tbl_all_sales als
        inner join
    tbl_dealer dl ON trim(als.acc_no) = trim(dl.delar_account_no)
where
    area_id = " . $area_id . " and qty > 0
having date1 between '" . $start_date . "' and '" . $end_date . "'
    and als.wip = " . $wip . "
order by dl.delar_id , als.invoice asc";

        return $this->db->mod_select($sql);
    }

    public function getPartData($search_for, $search_key, $key_value) {
        $sql = "select " . $search_for . " from tbl_item where " . $search_key . "='" . $key_value . "' and status=1";
        $mod_select = $this->db->mod_select($sql);
        if (isset($mod_select[0]->$search_for)) {
            return $mod_select[0]->$search_for;
        }
    }

    public function getCurrentVatAmount() {
        $sql = "select amount from tbl_vat where status = 1";
        return $mod_select = $this->db->mod_select($sql);
    }

}
