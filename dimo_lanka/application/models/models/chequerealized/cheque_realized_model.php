<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cheque_realized_model
 *
 * @author Iresha Lakmali
 */
class cheque_realized_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllDealerShopName($q, $select) {
        $sql = "select delar_shop_name,delar_id from tbl_dealer WHERE delar_shop_name LIKE '$q%'";
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

    public function chequeRealized() {
        $append = '';

        if (isset($_POST['dealer_shop_name']) && $_POST['dealer_shop_name'] != '') {
            $dealer_shop_name = $_POST['dealer_shop_name'];
            $append = "and td.delar_shop_name='$dealer_shop_name'";
        }

        if (isset($_POST['cmb_cheque_status']) && $_POST['cmb_cheque_status'] != '') {
            $cmb_cheque_status = $_POST['cmb_cheque_status'];
            $append = "and tcp.realized_status='$cmb_cheque_status'";
        }

        if (isset($_POST['end_date']) && $_POST['end_date'] != '') {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $append = "and tcp.added_date between '$start_date' AND '$end_date'";
        }

        if (isset($_POST['dealer_shop_name']) && $_POST['dealer_shop_name'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '') {
            $dealer_shop_name = $_POST['dealer_shop_name'];

            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $append = "and td.delar_shop_name='$dealer_shop_name' AND tcp.added_date between '$start_date' AND '$end_date' AND tcp.realized_status='$cmb_cheque_status'";
        }

        $sql = "select 
    tddo.deliver_order_id,
    tb.bank_name,
    tcp.cheque_no,
    tcp.cheque_payment,
    tcp.realized_date,
    tcp.added_date,
    tcp.added_time,
    tcp.realized_status,
    tcp.cheque_payment_id,
    td.delar_account_no,
    td.delar_shop_name,
    td.delar_name,
    tddo.wip_no,
	tddo.invoice_no
from
    tbl_dealer_deliver_order tddo
        INNER JOIN
    tbl_cheque_payment tcp ON tddo.deliver_order_id = tcp.deliver_order_id
        INNER JOIN
    tbl_bank tb ON tcp.bank_id = tb.bank_id
        INNER JOIN
    tbl_dealer td ON td.delar_id = tddo.dealer_id where tcp.realized_status!=2 {$append}
       

";

        return $this->db->mod_select($sql);
    }

    public function searchChequeRealized() {
        $append = '';
        if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '') {
            $dealer_id = $_POST['dealer_id'];
            $append = "WHERE tdpo.dealer_id='$dealer_id'";
        }
    }

    public function manageChequeRealized($dataArray) {
        $where = array(
            'cheque_payment_id' => $dataArray['token_cheque_payment_id']
        );

        $data = array(
            'realized_status' => 1
        );

        $this->db->__beginTransaction();

        $this->db->update("tbl_cheque_payment", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function rejectCheque($dataArray) {
        $where = array(
            'cheque_payment_id' => $dataArray['token_cheque_payment_id']
        );

        $data = array(
            'realized_status' => 2
        );

        $this->db->__beginTransaction();

        $this->db->update("tbl_cheque_payment", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
