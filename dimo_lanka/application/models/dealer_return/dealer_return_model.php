<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_return_model
 *
 * @author SHDINESH
 */
class dealer_return_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

//===============================widuranaga jayawickrama=====================================================
    public function viewAllPendingReturns($rep_id) {
        $sql = "select 
    tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    td.delar_name,
    td.delar_account_no,
    tdr.dealer_ret_id
from
    tbl_dealer_return tdr
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
where
    tdr.status = 1 and tddo.status = 1
        and tdr.complete_status = 0
        and td.status = 1
        and tso.sales_officer_id = " . $rep_id;
        return $this->db->mod_select($sql);
    }

    public function viewReturnDetail() {

        $sql = "select 
    ti.item_part_no,
    tdrd.ret_qty,
    tdrd.selling_value,
    ti.description,
    tdrd.delivered,
    tdrd.return_reason,
    tdrd.dealer_ret_id,
    ti.item_id
from
    tbl_dealer_return_detail tdrd
        inner join
    tbl_item ti ON tdrd.item_id = ti.item_id
where
    tdrd.status = 1 and tdrd.dealer_ret_id={$_REQUEST['return_id']}";
        return $this->db->mod_select($sql);
    }

    public function ReturenDeta() {
        $salesOfficerId = $this->session->userdata('employe_id');
        $cd = $_REQUEST['data'];
        $cfg = json_decode($cd);
        $test = 0;
        $ret_rep_id = 0;
        foreach ($cfg As $val) {

            if ($val[0]->ret_id !== $test) {
                $test = $val[0]->ret_id;
                $data_set = array(
                    'dealer_return_id' => $val[0]->ret_id,
                    'rep_id' => $salesOfficerId,
                    'accepted_date' => date('Y-m-d'),
                    'accepted_time' => date('H:i:s'),
                    'time_stamp' => date('Y-m-d H:i:s', time()),
                    'status' => '1',
                    'completed_status' => '0',
                );
                //print_r($data_set);
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_return_rep", $data_set);
                $ret_rep_id = $this->db->insert_id();
            }

            $data = array(
                'item_id' => $val[0]->partId,
                'ret_rep_id' => $ret_rep_id,
                'accepted_qty' => $val[0]->accqty,
                'remarks' => $val[0]->rema,
                'status' => '1'
            );
            $this->db->insertData("tbl_return_rep_detail", $data);
            $where = array(
                'dealer_ret_id' => $val[0]->return_rep,
            );
            $comp = array(
                'complete_status' => 1,
            );
            $this->db->update("tbl_dealer_return", $comp, $where);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getAllDealerName($q, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
        $sql = "select 
    td.delar_id, td.delar_name,td.delar_account_no
from
    tbl_dealer td
WHERE
    td.sales_officer_id = {$salesOfficerId} and td.delar_name LIKE '$q%' limit 10";
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

    public function getDealerName($q, $select) {
        $sql = "select 
    td.delar_id, td.delar_name,td.delar_account_no
from
    tbl_dealer td
WHERE
     td.delar_name LIKE '$q%' limit 10";
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

    public function getAllDealeAccountNo($q, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
        $sql = "select 
    td.delar_id, td.delar_account_no, td.delar_name
from
    tbl_dealer td
WHERE
    td.sales_officer_id = {$salesOfficerId} and td.delar_account_no LIKE '$q%' limit 10";
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

    public function getDealeAccountNo($q, $select) {
        $sql = "select 
    td.delar_id, td.delar_account_no, td.delar_name
from
    tbl_dealer td
WHERE
    td.delar_account_no LIKE '$q%' limit 10";
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

    public function viewAcceptedOrder() {
        $salesOfficerId = $this->session->userdata('employe_id');
        $append = " ";
        if (isset($_REQUEST['startDate']) && $_REQUEST['startDate'] != "") {
            $append .=" and trr.accepted_date between  '{$_REQUEST['startDate']}'and'{$_REQUEST['endDate']}'";
        }
        if (isset($_REQUEST['dealer_id']) && $_REQUEST['dealer_id'] != "") {
            $append .=" and tdr.dealer_id={$_REQUEST['dealer_id']}";
        }

        if (isset($append) && $append != " ") {
            $sql = "select 
     tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    td.delar_name,
    td.delar_account_no,
    tdr.dealer_ret_id,
    trr.accepted_date,
    trr.accepted_time,
    tdr.dealer_ret_id,
    trr.return_rep_id
from
    tbl_return_rep trr
        inner join
    tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
where
    trr.status = 1 and tdr.status = 1 and trr.rep_id=$salesOfficerId $append
         and (trr.completed_status = 0
        or trr.completed_status = 1)
group by tdr.dealer_ret_id
order by trr.accepted_date";
            return $this->db->mod_select($sql);
        }
    }

    public function ViewAcceptedForLastSavenDealer() {
        $salesOfficerId = $this->session->userdata('employe_id');
        $sql = "select 
     tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    td.delar_name,
    td.delar_account_no,
    tdr.dealer_ret_id,
    trr.accepted_date,
    trr.accepted_time,
    tdr.dealer_ret_id,
    trr.return_rep_id
from
    tbl_return_rep trr
        inner join
    tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
where
    trr.status = 1 and tdr.status = 1 and trr.rep_id=$salesOfficerId 
         and (trr.completed_status = 0
        or trr.completed_status = 1)
group by tdr.dealer_ret_id
order by trr.accepted_date 
and trr.accepted_date between date_sub(curdate(), interval 7 day) and curdate()";
        return $this->db->mod_select($sql);
    }

    public function viewAcceptedDetails() {

        $sql = "select 
    ti.item_part_no,
    trrd.accepted_qty,
    ti.description,
    tdrd.ret_qty,
    tdrd.return_reason,
    tdrd.selling_value,
    trrd.remarks,
    tdrd.delivered,
    trr.return_rep_id
from
    tbl_return_rep trr
        inner join
    tbl_return_rep_detail trrd ON trr.return_rep_id = trrd.ret_rep_id
        and trr.status = 1
        inner join
    tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
        and tdr.status = 1
        inner join
    tbl_dealer_return_detail tdrd ON tdr.dealer_ret_id = tdrd.dealer_ret_id
        and trrd.item_id = tdrd.item_id
        inner join
    tbl_item ti ON trrd.item_id = ti.item_id
where
    trr.return_rep_id = {$_REQUEST['id']}";
        return $this->db->mod_select($sql);
    }

    //======================================widuranga=jayawickrama===================================================

    public function viewAllDealerReturnDetails($data_array) {
        $sql = "select drd.dealer_return_detail_id,drd.dealer_return_id,drd.item_id,i.item_part_no,i.description,drd.return_qty,drd.dealer_return_reason,drd.delivered,drd.status from tbl_dealer_return_detail as drd inner join tbl_item as i on drd.item_id=i.item_id where drd.dealer_return_id = " . $data_array['token_purchase_order_iD'] . " and drd.status='1'";
        return $this->db->mod_select($sql);
    }

    public function addNewDealerReturn($data_array) {
        $data = array(
            'invoice_no' => $data_array['invoiceNO'],
            'purchase_order_id' => $data_array['purchaseOrderID'],
            'submitted_date' => $data_array['date'],
            'submitted_time' => $data_array['time'],
            'dealer_id' => $data_array['dealerID'],
            'status' => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_dealer_return", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastInsertedReturnID($data_array) {

        $sql = "select dealer_return_id from tbl_dealer_return where  invoice_no='" . $data_array['invoiceNO'] . "' and dealer_id='" . $data_array['dealerID'] . "' and status=1";
        $mod_select = $this->db->mod_select($sql);
        //$purchase_order_id = $mod_select[0]->purchase_order_id;
        return $mod_select[0]->dealer_return_id;
    }

    public function addNewDealerReturnDetail($data_array, $lastInsertID) {
        $count = (count($data_array) - 1);
        for ($i = 0; $i < $count; $i++) {
            $item_id = $this->getItemIDForPartNo($data_array[$i]['item_part_no']);
            $data = array(
                //'dealer_purchase_order_detail_id' => $data_array['dealer_purchase_order_detail_id'],
                'dealer_return_id' => $lastInsertID,
                'item_id' => $item_id,
                'return_qty' => $data_array[$i]['return_qty'],
                'dealer_return_reason' => $data_array[$i]['dealer_return_reason'],
                'delivered' => $data_array[$i]['delivered'],
                'status' => '1'
            );

            $this->db->__beginTransaction();
            $this->db->insertData("tbl_dealer_return_detail", $data);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getItemIDForPartNo($part_no) {
        $sql = "select item_id from tbl_item where item_part_no='" . $part_no . "'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select[0]->item_id;
    }

//==================================widuranga==============================================

    public function RejectedOrder() {
        $salesOfficerId = $this->session->userdata('employe_id');
        $cd = $_REQUEST['data'];

        $cfg = json_decode($cd);
        //print_r($cfg);
        $test = 0;
        $ret_rep_id = 0;
        foreach ($cfg As $val) {

            if ($val[0]->ret_id !== $test) {
                $test = $val[0]->ret_id;
                $data_set = array(
                    'dealer_return_id' => $val[0]->ret_id,
                    'rep_id' => $salesOfficerId,
                    'accepted_date' => date('Y-m-d'),
                    'accepted_time' => date('H:i:s'),
                    'time_stamp' => date('Y-m-d H:i:s', time()),
                    'status' => '1',
                    'completed_status' => '2',
                );
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_return_rep", $data_set);
                $ret_rep_id = $this->db->insert_id();
            }

            $data = array(
                'item_id' => $val[0]->partId,
                'ret_rep_id' => $ret_rep_id,
                'accepted_qty' => $val[0]->accqty,
                'remarks' => $val[0]->rema,
                'status' => '1'
            );
//            print_r($data);
            $this->db->insertData("tbl_return_rep_detail", $data);
            $where = array(
                'dealer_ret_id' => $val[0]->return_rep,
            );
            $comp = array(
                'complete_status' => 1,
            );
//            print_r($comp);
            $this->db->update("tbl_dealer_return", $comp, $where);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function rejectDetails() {
        $salesOfficerId = $this->session->userdata('employe_id');
        $append = " ";
        if (isset($_REQUEST['startDate']) && $_REQUEST['startDate'] != "") {
            $append .=" and trr.accepted_date between  '{$_REQUEST['startDate']}'and'{$_REQUEST['endDate']}'";
        }
        if (isset($_REQUEST['dealer_id']) && $_REQUEST['dealer_id'] != "") {
            $append .=" and tdr.dealer_id={$_REQUEST['dealer_id']}";
        }

        if (isset($append) && $append != " ") {
            $sql = "select 
     tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    td.delar_name,
    td.delar_account_no,
    tdr.dealer_ret_id,
    trr.accepted_date,
    trr.accepted_time,
    tdr.dealer_ret_id,
    trr.return_rep_id
from
    tbl_return_rep trr
        inner join
    tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
where
    trr.status = 1 and trr.completed_status = 2 and tdr.status = 1 and trr.rep_id=$salesOfficerId $append
group by trr.return_rep_id
order by trr.accepted_date";

            return $this->db->mod_select($sql);
        }
    }

    public function veiwReturnDetails() {
        $sql = "select 
    ti.item_id,
    ti.item_part_no,
    trrd.accepted_qty,
    ti.description,
    tdrd.ret_qty,
    tdrd.return_reason,
    tdrd.selling_value,
    trrd.remarks,
    tdrd.delivered,
    trr.return_rep_id
from
    tbl_return_rep trr
        inner join
    tbl_return_rep_detail trrd ON trr.return_rep_id = trrd.ret_rep_id
        and trr.status = 1
        inner join
    tbl_dealer_return tdr ON trr.dealer_return_id = tdr.dealer_ret_id
        and tdr.status = 1
        inner join
    tbl_dealer_return_detail tdrd ON tdr.dealer_ret_id = tdrd.dealer_ret_id
        and trrd.item_id = tdrd.item_id
        inner join
    tbl_item ti ON trrd.item_id = ti.item_id
where
    trr.return_rep_id = {$_REQUEST['return_id']}";
        return $this->db->mod_select($sql);
    }

//===================================================admin==============================================
    public function penddingDetailsAdmin() {
        $sql = "select 
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    trr.accepted_date,
    trr.accepted_time,
    trr.return_rep_id,
    td.mobileO,
    td.mobileP
from
    tbl_return_rep trr
        inner join
    tbl_dealer_return tdr ON trr.return_rep_id = tdr.dealer_ret_id
        and trr.status = 1
        and tdr.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
        and tddo.status = 1
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
where
    trr.completed_status = 0";
        return $this->db->mod_select($sql);
    }

    public function AdminViewfullPebddingDetails() {
        $sql = "select 
    ti.item_id,
    ti.item_part_no,
    ti.description,
    tdrd.ret_qty as dealer_ret_qty,
    tdrd.return_reason as dealer_ret_reason,
    tdrd.selling_value,
    tdrd.delivered,
    trrd.accepted_qty as rep_accepted_qty,
    trrd.remarks as rep_remarks,
    tdr.dealer_ret_id,
    trr.return_rep_id,
    tdr.dealer_id
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
where
    tdr.complete_status = 1
        and trr.return_rep_id = {$_REQUEST['return_id']}";
        return $this->db->mod_select($sql);
    }

    public function AdminReturenDeta() {
        $salesOfficerId = $this->session->userdata('id');
        $cd = $_REQUEST['data'];
        $cfg = json_decode($cd);
        $test = 0;
        $ret_rep_id = 0;
        foreach ($cfg As $val) {
            if ($val[0]->ret_id !== $test) {
                $test = $val[0]->ret_id;
                $DealerId = $val[0]->DealerId;
                $this->load->model('auto_generate_id/auto_generate_id');
                $this->load->model('delar/delar_model');
                $dealerDetails = $this->delar_model->getDealerDetails("delar_id", $DealerId);
                $reference_str = $dealerDetails[0]->branch_code . $dealerDetails[0]->sales_officer_code;
                $sql = "select 
    max(trr.return_admin_id)as returnId
from
    tbl_return_admin trr
where
    trr.status = 1
        and trr.completed_status = 1";
                $mod_select = $this->db->mod_select($sql);
                $lastPurchaseOrderID = $mod_select[0]->returnId;
                $generateNextID = $this->auto_generate_id->generateID($lastPurchaseOrderID, $reference_str);
                $data_set = array(
                    'return_rep_id' => $val[0]->ret_id,
                    'admin_id' => $salesOfficerId,
                    'accepted_date' => date('Y-m-d'),
                    'accepted_time' => date('H:i:s'),
                    'time_stamp' => date('Y-m-d H:i:s', time()),
                    'status' => '1',
                    'completed_status' => '1',
                    'return_note_no' => $generateNextID,
                );
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_return_admin", $data_set);
                $ret_rep_id = $this->db->insert_id();
            }


            $data = array(
                'item_id' => $val[0]->partId,
                'return_admin_id' => $ret_rep_id,
                'accepted_qty' => $val[0]->accqty,
                'remarks' => $val[0]->rema,
                'status' => '1'
            );
            $this->db->insertData("tbl_return_admin_detail", $data);
            $where = array(
                'return_rep_id' => $val[0]->return_rep,
            );
            $comp = array(
                'completed_status' => 1,
            );
            $this->db->update("tbl_return_rep", $comp, $where);
        }
        $this->db->__endTransaction();
//        return $this->db->status();
        return $generateNextID;
    }

    public function getAdminAcceptedDetails() {
        $append = "";
        if (isset($_REQUEST['startDate']) && $_REQUEST['startDate'] != "") {
            $append .=" and tra.accepted_date between '{$_REQUEST['startDate']}'and'{$_REQUEST['endDate']}'";
        }
        if (isset($_REQUEST['dealer_id']) && $_REQUEST['dealer_id'] != "") {
            $append .=" and tdr.dealer_id = {$_REQUEST['dealer_id']}";
        }
        if (isset($append) && $append != " ") {
            $sql = "select 
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    tra.accepted_date,
    tra.accepted_time,
    tra.return_admin_id,
    td.mobileO,
    td.mobileP,
    tra.return_note_no
from
    tbl_dealer_return tdr
        inner join
    tbl_return_rep trr ON tdr.dealer_ret_id = trr.dealer_return_id
        and trr.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
        and tddo.status = 1
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
        inner join
    tbl_return_admin tra ON trr.return_rep_id = tra.return_rep_id
        and tra.status = 1
where
    trr.status = 1
        and tra.completed_status = 1 $append";
            return $this->db->mod_select($sql);
        }
    }

    public function viewAcceptedOredeForAdminTosevenDay() {
        $sql = "select 
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    tra.accepted_date,
    tra.accepted_time,
    tra.return_admin_id,
    td.mobileO,
    td.mobileP,
    tra.return_note_no
from
    tbl_dealer_return tdr
        inner join
    tbl_return_rep trr ON tdr.dealer_ret_id = trr.dealer_return_id
        and trr.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
        and tddo.status = 1
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
        inner join
    tbl_return_admin tra ON trr.return_rep_id = tra.return_rep_id
        and tra.status = 1
where
    trr.status = 1
        and tra.completed_status = 1
        and tra.accepted_date between date_sub(curdate(), interval 7 day) and curdate()";
        return $this->db->mod_select($sql);
    }

    public function VeiwAdminAcceptedDetails() {
        $sql = "select 
    ti.item_id,
    ti.item_part_no,
    ti.description,
    tdrd.ret_qty as dealer_ret_qty,
    tdrd.return_reason as dealer_ret_reason,
    tdrd.selling_value,
    tdrd.delivered,
    trrd.accepted_qty as rep_accepted_qty,
    trrd.remarks as rep_remarks,
    trad.accepted_qty as admin_accepted_qty,
    trad.remarks as admin_remarks,
    tra.return_note_no
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
    tra.return_admin_id = {$_REQUEST['id']}";
        return $this->db->mod_select($sql);
    }

    public function getAdminRejectedDetails() {
        $append = "";
        if (isset($_REQUEST['startDate']) && $_REQUEST['startDate'] != "") {
            $append .=" and tra.accepted_date between '{$_REQUEST['startDate']}'and'{$_REQUEST['endDate']}'";
        }
        if (isset($_REQUEST['dealer_id']) && $_REQUEST['dealer_id'] != "") {
            $append .=" and tdr.dealer_id = {$_REQUEST['dealer_id']}";
        }

        if (isset($append) && $append != " ") {
            $sql = "select 
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tddo.wip_no,
    tddo.invoice_no,
    tdr.added_date,
    tdr.added_time,
    tra.accepted_date,
    tra.accepted_time,
    tra.return_admin_id
from
    tbl_dealer_return tdr
        inner join
    tbl_return_rep trr ON tdr.dealer_ret_id = trr.dealer_return_id
        and trr.status = 1
        inner join
    tbl_dealer_deliver_order tddo ON tdr.deliver_order_id = tddo.deliver_order_id
        and tddo.status = 1
        inner join
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        and td.status = 1
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
        inner join
    tbl_return_admin tra ON trr.return_rep_id = tra.return_rep_id
        and tra.status = 1
where
    trr.status = 1
        and tra.completed_status = 2 $append";
            return $this->db->mod_select($sql);
        }
    }

    public function viewAdminRejectedDetails() {
        $sql = "select 
    ti.item_id,
    ti.item_part_no,
    ti.description,
    tdrd.ret_qty as dealer_ret_qty,
    tdrd.return_reason as dealer_ret_reason,
    tdrd.selling_value,
    tdrd.delivered,
    trrd.accepted_qty as rep_accepted_qty,
    trrd.remarks as rep_remarks,
    trad.accepted_qty as admin_accepted_qty,
    trad.remarks as admin_remarks
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
    tra.return_admin_id = {$_REQUEST['id']}";
        return $this->db->mod_select($sql);
    }

    public function adminRejectedreturn() {
        $salesOfficerId = $this->session->userdata('id');
        $cd = $_REQUEST['data'];
        $cfg = json_decode($cd);
        $test = 0;
        $ret_rep_id = 0;
        foreach ($cfg As $val) {

            if ($val[0]->ret_id !== $test) {
                $test = $val[0]->ret_id;
                $data_set = array(
                    'return_rep_id' => $val[0]->ret_id,
                    'admin_id' => $salesOfficerId,
                    'accepted_date' => date('Y-m-d'),
                    'accepted_time' => date('H:i:s'),
                    'time_stamp' => date('Y-m-d H:i:s', time()),
                    'status' => '1',
                    'completed_status' => '2',
                );
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_return_admin", $data_set);
                $ret_rep_id = $this->db->insert_id();
            }


            $data = array(
                'item_id' => $val[0]->partId,
                'return_admin_id' => $ret_rep_id,
                'accepted_qty' => $val[0]->accqty,
                'remarks' => $val[0]->rema,
                'status' => '1'
            );
            $this->db->insertData("tbl_return_admin_detail", $data);
            $where = array(
                'return_rep_id' => $val[0]->return_rep,
            );
            $comp = array(
                'completed_status' => 1,
            );
            $this->db->update("tbl_return_rep", $comp, $where);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

}
