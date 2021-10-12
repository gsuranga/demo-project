<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_history_model
 *
 * @author Iresha Lakmali
 */
class payment_history_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllDealerName($q, $select) {
        $sql = "select delar_id,delar_name from tbl_dealer WHERE delar_name LIKE '$q%'";
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

    public function dealerPaymentHistory() {
        $sql = "select do.delar_purchase_order_id,do.deliverd_date,do.deliverd_time,do.total_amount,d.delar_shop_name,b.branch_name,a.area_name from tbl_delar d INNER JOIN tbl_delar_deliver_order do ON do.delar_id=d.delar_id INNER JOIN tbl_branch b ON b.branch_id=d.branch_id INNER JOIN tbl_area a ON a.area_id=b.area_id";
        return $this->db->mod_select($sql);
    }

    public function cashPaymentHistory() {
        $token_delar_deliver_order_id = $_REQUEST['token_delar_deliver_order_id'];
        //   $sql = "select c.added_date,c.added_time,c.cash_payment,do.purchase_order_id from tbl_cash_payment c INNER JOIN tbl_dealer_purchase_order do ON c.purchase_order_id=do.purchase_order_id where c.status= '1' AND do.purchase_order_id='$token_delar_deliver_order_id'";
        $sql = "select 
    c.added_date, c.added_time, c.cash_payment
from
    tbl_cash_payment c
        LEFT JOIN
    tbl_dealer_deliver_order tddo ON c.deliver_order_id = tddo.deliver_order_id
where
    tddo.deliver_order_id = '$token_delar_deliver_order_id'";
        return $this->db->mod_select($sql);
    }

    public function searchPayment() {
        $append = '';
        if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '') {
            $dealer_id = $_POST['dealer_id'];
            $append = "WHERE td.delar_id='$dealer_id'";
        }

        if (isset($_POST['payment_date']) && $_POST['payment_date'] != '') {
            $payment_date = $_POST['payment_date'];
            $end_date = $_POST['end_date'];
            $append = "WHERE tdpo.date between '$payment_date' AND '$end_date'";
        }

        if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '' && isset($_POST['payment_date']) && $_POST['payment_date'] != '') {
            $dealer_id = $_POST['dealer_id'];
            $payment_date = $_POST['payment_date'];
            $append = "WHERE td.delar_id='$dealer_id' AND tdpo.date between '$payment_date' AND '$end_date'";
        }
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
INNER JOIN tbl_sales_officer tso ON tso.sales_officer_id = td.sales_officer_id
 {$append}";

        return $this->db->mod_select($sql);
    }

    public function chequePaymentHistory() {
        $token_delar_deliver_order_id = $_REQUEST['token_delar_deliver_order_id'];
        //    $sql = "select c.added_date,c.added_time,b.bank_name,c.cheque_no,c.realized_date,c.cheque_payment,c.purchase_order_id,c.realized_date from tbl_cheque_payment c INNER JOIN tbl_bank b ON c.bank_id=b.bank_id INNER JOIN tbl_dealer_purchase_order do ON c.purchase_order_id=do.purchase_order_id WHERE c.status='1' AND do.purchase_order_id='$token_delar_deliver_order_id'";
        $sql = "select 
    c.added_date, c.added_time, c.cheque_payment,c.realized_date,c.cheque_no,tb.bank_name,c.cheque_image
from
    tbl_cheque_payment c
        LEFT JOIN
    tbl_dealer_deliver_order tddo ON c.deliver_order_id = tddo.deliver_order_id
INNER JOIN tbl_bank tb ON tb.bank_id=c.bank_id
where
    tddo.deliver_order_id = '$token_delar_deliver_order_id'";
        return $this->db->mod_select($sql);
    }

    public function bankDepositPayment() {
        $token_delar_deliver_order_id = $_REQUEST['token_delar_deliver_order_id'];
        $sql = "select 
    tbbdp.added_date,
    tbbdp.added_time,
    tbbdp.deposit_payment,
    tbbdp.deposit_date,
    tbbdp.account_no,
    tb.bank_name,
    tbbdp.deposit_slip_image,
    tddo.deliver_order_id
from
    tbl_bank_deposit_payment tbbdp
        LEFT JOIN
    tbl_dealer_deliver_order tddo ON tbbdp.deliver_order_id = tddo.deliver_order_id
        INNER JOIN
    tbl_bank tb ON tb.bank_id = tbbdp.bank_id
where
    tddo.deliver_order_id = '$token_delar_deliver_order_id'
";
        return $this->db->mod_select($sql);
    }

    public function creditPaymentHistory() {
        $token_delar_deliver_order_id = $_REQUEST['token_delar_deliver_order_id'];
        $sql = "select c.added_date,c.due_date,c.credit_payment,c.purchase_order_id from tbl_credit_payment c INNER JOIN tbl_dealer_purchase_order do ON c.purchase_order_id=do.purchase_order_id WHERE do.purchase_order_id='$token_delar_deliver_order_id'";
        return $this->db->mod_select($sql);
    }

}

?>
