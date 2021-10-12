<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_cheque_returns_model
 *
 * @author Iresha Lakmali
 */
class dealer_cheque_returns_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function dealerChequeReturns() {
        $append = '';

        if (isset($_POST['dealer_shop_name']) && $_POST['dealer_shop_name'] != '') {
            $dealer_shop_name = $_POST['dealer_shop_name'];
            $append = "and td.delar_shop_name='$dealer_shop_name'";
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

            $append = "and td.delar_shop_name='$dealer_shop_name' AND tcp.added_date between '$start_date' AND '$end_date'";
        }


        $sql = "select 
    tddo.deliver_order_id,
    tddo.wip_no,
    tddo.invoice_no,
    tb.bank_name,
    tcp.cheque_no,
    tcp.cheque_payment,
    tcp.realized_date,
    tcp.added_date,
    tcp.cheque_image,
    tcp.added_time,
    tcp.realized_status,
    tcp.cheque_payment_id,
    tcp.cheque_payment_id,
    trc.return_cheque_id,
    td.delar_shop_name,
    td.delar_name,
    td.delar_account_no
from
    tbl_dealer_deliver_order tddo
        INNER JOIN
    tbl_cheque_payment tcp ON tddo.deliver_order_id = tcp.deliver_order_id
        INNER JOIN
    tbl_bank tb ON tcp.bank_id = tb.bank_id
        LEFT JOIN
    tbl_return_cheque trc ON trc.cheque_payment_id = tcp.cheque_payment_id
        INNER JOIN
    tbl_dealer td ON td.delar_id = tddo.dealer_id
where
    tcp.realized_status = '0' {$append}";

        return $this->db->mod_select($sql);
    }

    public function createDealerReturnChequeReason($data_Array) {
        $data1 = array(
            'realized_status' => 3
        );

        $where = array(
            'cheque_payment_id' => $data_Array['hidden_cheque_id']
        );
       // print_r($data1);
        $this->db->__beginTransaction();
        $this->db->update("tbl_cheque_payment", $data1, $where);
        $data = array(
            'cheque_payment_id' => $data_Array['hidden_cheque_id'],
            'return_reason' => $data_Array['txt_return_reason'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
      //  print_r($data);

        $this->db->insertData("tbl_return_cheque", $data);
       // echo('JavaScript:(window.close(););');
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function dealerReturnCheque() {
        $sql = "select 
    tddo.deliver_order_id,
    tddo.wip_no,
    tddo.invoice_no,
    tb.bank_name,
    tcp.cheque_no,
    tcp.cheque_payment,
    tcp.realized_date,
    tcp.added_date,
    tcp.cheque_image,
    tcp.added_time,
    tcp.realized_status,
    tcp.cheque_payment_id,
    tcp.cheque_payment_id,
    trc.return_cheque_id,
    td.delar_shop_name,
    td.delar_name,
    td.delar_account_no,
    trc.return_reason
from
    tbl_dealer_deliver_order tddo
        INNER JOIN
    tbl_cheque_payment tcp ON tddo.deliver_order_id = tcp.deliver_order_id
        INNER JOIN
    tbl_bank tb ON tcp.bank_id = tb.bank_id
        LEFT JOIN
    tbl_return_cheque trc ON trc.cheque_payment_id = tcp.cheque_payment_id
        INNER JOIN
    tbl_dealer td ON td.delar_id = tddo.dealer_id
where
    tcp.realized_status = '3'";
        return $this->db->mod_select($sql);
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

}

?>
