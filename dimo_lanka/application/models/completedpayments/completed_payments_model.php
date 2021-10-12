<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of completed_payments_model
 *
 * @author Iresha Lakmali
 */
class completed_payments_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function completedPayments() {

        $sql = "SELECT 
    tddo.deliver_order_id,
    tddo.wip_no,
    tddo.invoice_no,
    td.delar_name,
    td.delar_shop_name,
    td.delar_address,
    ta.area_name,
    tb.branch_name,
    tddo.total_amount,
    tcqp.added_date,

    (SELECT 
            SUM(cheque_payment)
        FROM
            tbl_cheque_payment
        WHERE
            tbl_cheque_payment.deliver_order_id = tddo.deliver_order_id) as ch_total,
    (SELECT 
            SUM(cash_payment)
        FROM
            tbl_cash_payment
        WHERE
            tbl_cash_payment.deliver_order_id = tddo.deliver_order_id) as cash_total
FROM
    tbl_dealer_deliver_order tddo
        INNER JOIN
    tbl_dealer td ON tddo.dealer_id = td.delar_id
        INNER JOIN
    tbl_branch tb ON td.branch_id = tb.branch_id
        INNER JOIN
    tbl_area ta ON tb.area_id = ta.area_id
        INNER JOIN
    tbl_credit_payment tcqp ON tcqp.deliver_order_id = tddo.deliver_order_id
WHERE
    tcqp.status = '1'
        AND tcqp.credit_payment = '0'";


        return $this->db->mod_select($sql);
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

    public function searchCompletedPayments() {
        $append = '';
        if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '') {
            $dealer_id = $_POST['dealer_id'];
            $append = "WHERE tdpo.dealer_id='$dealer_id'";
        }
        if (isset($_POST['cmb_status']) && $_POST['cmb_status'] != '') {
            $cmb_status = $_POST['cmb_status'];
            if ($cmb_status != 3) {
                $append = "WHERE tdpo.status='$cmb_status'";
            } else {
                
            }
            if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '' && isset($_POST['cmb_status']) && $_POST['cmb_status'] != '') {
                $dealer_id = $_POST['dealer_id'];
                $cmb_status = $_POST['cmb_status'];
                if ($cmb_status != 3) {
                    $append = "WHERE tdpo.dealer_id='$dealer_id' AND tdpo.status='$cmb_status'";
                } else {
                    $append = "WHERE tdpo.dealer_id='$dealer_id'";
                }

                if (isset($_POST['end_date']) && $_POST['end_date'] != '') {
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    $append = "WHERE tdpo.date between '$start_date' AND '$end_date'";
                }
                if (isset($_POST['dealer_id']) && $_POST['dealer_id'] != '' && isset($_POST['cmb_status']) && $_POST['cmb_status'] != '' && isset($_POST['end_date']) && $_POST['end_date'] != '') {
                    $dealer_id = $_POST['dealer_id'];
                    $cmb_status = $_POST['cmb_status'];
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    if ($cmb_status != 3) {
                        $append = "WHERE tdpo.dealer_id='$dealer_id' AND tdpo.status='$cmb_status' AND tdpo.date between '$start_date' AND '$end_date'";
                    } else {
                        $append = "WHERE tdpo.dealer_id='$dealer_id' AND tdpo.date between '$start_date' AND '$end_date'";
                    }
                    $sql = "SELECT 
    tddo.deliver_order_id,
    tddo.wip_no,
    tddo.invoice_no,
    td.delar_name,
    td.delar_shop_name,
    td.delar_address,
    ta.area_name,
    tb.branch_name,
    tddo.total_amount,
    tcqp.added_date,

    (SELECT 
            SUM(cheque_payment)
        FROM
            tbl_cheque_payment
        WHERE
            tbl_cheque_payment.deliver_order_id = tddo.deliver_order_id) as ch_total,
    (SELECT 
            SUM(cash_payment)
        FROM
            tbl_cash_payment
        WHERE
            tbl_cash_payment.deliver_order_id = tddo.deliver_order_id) as cash_total
FROM
    tbl_dealer_deliver_order tddo
        INNER JOIN
    tbl_dealer td ON tddo.dealer_id = td.delar_id
        INNER JOIN
    tbl_branch tb ON td.branch_id = tb.branch_id
        INNER JOIN
    tbl_area ta ON tb.area_id = ta.area_id
        INNER JOIN
    tbl_credit_payment tcqp ON tcqp.deliver_order_id = tddo.deliver_order_id
WHERE
    tcqp.status = '1'
        AND tcqp.credit_payment = '0' {$append}";
                    return $this->db->mod_select($sql);
                }
            }
        }
    }

}

?>
