<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delar_payment_model
 *
 * @author Iresha Lakmali
 */
class delar_payment_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllDelarPayment($form_data) {
        $append = '';
        $officer_id = '';
        $userdata = $this->session->userdata('sales_officer_id');
        $typename = $this->session->userdata('typename');
        if ($typename == "Sales Officer") {
            $officer_id = $typename = $this->session->userdata('employe_id');
            $append .= " and td.sales_officer_id = " . $officer_id;
        }
        if (!empty($form_data['dealer_id'])) {
            $append .= " and td.delar_id = " . $form_data['dealer_id'];
        }
        if (isset($form_data['start_date']) && isset($form_data['end_date'])) {
            $append .= " and ddo.added_date between '" . $form_data['start_date'] . "' and '" . $form_data['end_date'] . "'";
        }

        $sql = "select 
    td.delar_id,        
    ddo.deliver_order_id,
    ddo.invoice_no,
    ddo.wip_no,
    ddo.added_date,
    ddo.added_time,
    round(ddo.total_amount, 2) total_amount,
    0.00 as return_amount,
    td.delar_account_no,
    td.delar_name,
    td.business_address,
    br.branch_name,
    ddo.due_date,
    td.sales_officer_id,
    @cash_payment:=coalesce((select 
                    round(coalesce(sum(cash_payment), 0), 2)
                from
                    tbl_cash_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                        and status = 1
                group by deliver_order_id),
            0) as cash_payment,
    @realized_cheque_amount:=coalesce((select 
                    sum(cheque_payment)
                from
                    tbl_cheque_payment
                where
                    status = 1 and realized_status = 1
                        and deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as realized_cheque_amount,
    @unrealized_cheque_amount:=coalesce((select 
                    sum(cheque_payment)
                from
                    tbl_cheque_payment
                where
                    status = 1 and realized_status = 0
                        and deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as unrealized_cheque_amount,
    @bank_dep_payment:=coalesce((select 
                    round(coalesce(sum(deposit_payment), 0), 2)
                from
                    tbl_bank_deposit_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as bank_dep_payment,
    @tpawourc:=round((@cash_payment + @realized_cheque_amount + @bank_dep_payment),
            2) as total_paid_amount,
    round((ddo.total_amount - @tpawourc), 2) as total_pending_amount,
    datediff(ddo.due_date, curdate()) as number_of_days
from
    tbl_dealer_deliver_order ddo
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
        inner join
    tbl_branch br ON td.branch_id = br.branch_id
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
where
    (ddo.status = 1 or ddo.status = 2)
        and td.status = 1 
group by ddo.deliver_order_id
having total_pending_amount > 0 " . $append . " order by ddo.due_date desc limit 100";
        //echo $sql;
        return $this->db->mod_select($sql);
    }

    public function getBankDepositPayment($column) {
        $sql = "SELECT SUM(deposit_payment) as total_deposit ,added_date FROM tbl_bank_deposit_payment WHERE deliver_order_id=:deliver_order_id  ORDER BY added_date DESC;";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
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

//    public function getDealerDetail($column) {
//        $sql = "select tddo.deliver_order_id,ta.area_name,tb.branch_name,tb.branch_account_no,tso.sales_officer_name,td.delar_name,td.delar_shop_name,td.delar_address,tdpo.purchase_order_id,tdpo.dealer_purchase_order_id from tbl_dealer_purchase_order tdpo  INNER JOIN tbl_dealer td ON td.delar_id = tdpo.dealer_id INNER JOIN tbl_branch tb ON tb.branch_id = td.branch_id  INNER JOIN tbl_area ta ON ta.area_id = tb.area_id INNER JOIN tbl_sales_officer tso ON tso.sales_officer_id = td.sales_officer_id INNER JOIN tbl_dealer_deliver_order tddo ON tddo.purchase_order_id = tdpo.purchase_order_id WHERE tddo.deliver_order_id=:deliver_order_id";
//        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
//    }

    public function getDealerDetail($column) {
        $sql = "select 
    tddo.deliver_order_id,
    ta.area_name,
    tb.branch_name,
    tb.branch_code,
    tso.sales_officer_name,
    td.delar_name,
    td.delar_shop_name,
    td.delar_address
from
        tbl_dealer td INNER JOIN tbl_dealer_deliver_order tddo   ON td.delar_id = tddo.dealer_id
        INNER JOIN
    tbl_branch tb ON tb.branch_id = td.branch_id
        INNER JOIN 
    tbl_area ta ON ta.area_id = tb.area_id
        INNER JOIN
    tbl_sales_officer tso ON tso.sales_officer_id = td.sales_officer_id
        
    
WHERE
    tddo.deliver_order_id =:deliver_order_id";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function inserCash($lastRow) {
        $cash = array(
            'deliver_order_id' => $lastRow,
            'cash_payment' => $_POST['txt_cash'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_cash_payment", $cash);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastPaymentCashTot($column) {
        $sql = "SELECT SUM(cash_payment) as cash FROM tbl_cash_payment WHERE deliver_order_id=:deliver_order_id";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getLastPaymentChqueTot($column) {
        $sql = "SELECT SUM(cheque_payment) as che FROM tbl_cheque_payment WHERE deliver_order_id=:deliver_order_id and realized_status=1";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function insertCheq($cheque) {

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_cheque_payment", $cheque);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function insertdeposit($deposit) {

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_bank_deposit_payment", $deposit);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getCashPayment($column) {
        $sql = "SELECT SUM(cash_payment) as total_cash ,added_date FROM tbl_cash_payment WHERE deliver_order_id=:deliver_order_id ORDER BY added_date DESC ";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getDepostPayment($column) {
        $sql = "SELECT SUM(deposit_payment) as total_cashdis ,added_date FROM tbl_bank_deposit_payment WHERE deliver_order_id=:deliver_order_id ORDER BY added_date DESC ";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getReturnAmmount($column, $wip_no) {
        $sql = "select         
    tdr.dealer_return_id,
    tdr.invoice_no,
    tdr.wip_no,
    tdrd.item_id,
    tdrd.return_qty,
    ti.selling_price,
   @tot:= round((tdrd.return_qty * ti.selling_price),2) as return_amount,
    round(sum(@tot),2) as total_return_amount
from
    tbl_dealer_return tdr
        INNER JOIN
    tbl_dealer_return_detail tdrd ON tdr.dealer_return_id = tdrd.dealer_return_id
        INNER JOIN
    tbl_item ti ON tdrd.item_id = ti.item_id where tdr.wip_no='$wip_no'";
        return $this->db->mod_select($sql, $column);
    }

    public function getLastPaymentCredit($column) {
        $sql = "SELECT due_date FROM tbl_credit_payment WHERE deliver_order_id=:deliver_order_id AND status='1' LIMIT 1";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getDueAmount() {
        $sql = "select 
   
    sum(cheque_payment) as total_cheque_payment
from
    
    tbl_cheque_payment 
      where realized_status='0' and  deliver_order_id=7";
        return $this->db->mod_select($sql);
    }

    public function getCurrentCreditAmount($id_sales_order) {

        $column = array('status' => '1', 'deliver_order_id' => $id_sales_order['deliver_order_id']);
        $column1 = array('deliver_order_id' => $id_sales_order['deliver_order_id']);
        $sql = "SELECT * FROM tbl_credit_payment WHERE deliver_order_id=:deliver_order_id AND status=:status";

        $sql1 = "SELECT SUM(cheque_payment) as total_cheq , added_date FROM tbl_cheque_payment WHERE deliver_order_id=:deliver_order_id and realized_status=0  ORDER BY added_date DESC";
        // echo $sql;
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        $mod_select1 = $this->db->mod_select($sql1, $column1, PDO::FETCH_ASSOC);
        $total_cheq = 0;
        if (count($mod_select1) > 0) {
            $total_cheq = $mod_select1[0]['total_cheq'];
        }
        if (count($mod_select) > 0) {
            return ($mod_select[0]['credit_payment'] - $total_cheq);
        } else {
            return 0;
        }
    }

    public function getAllReturnCheque($column) {
        $sql = "SELECT SUM(cheque_payment) as total_reject_cheque FROM tbl_cheque_payment WHERE deliver_order_id=:deliver_order_id and realized_status=2 ORDER BY added_date DESC;";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getChePayment($column) {
        $sql = "SELECT SUM(cheque_payment) as total_cheq , added_date FROM tbl_cheque_payment WHERE deliver_order_id=:deliver_order_id and realized_status=1 ORDER BY added_date DESC";
        // echo $sql;
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getChequePayment($column) {
        $sql = "SELECT 
    SUM(cheque_payment) as total_cheq, added_date
FROM
    tbl_cheque_payment
WHERE
    deliver_order_id=:deliver_order_id and realized_status != 3  
ORDER BY added_date DESC";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    // reject cheqes
    public function getRejectCheque($column) {
        $sql = "SELECT 
    cheque_payment as total_reject_cheque_amount, added_date
FROM
    tbl_cheque_payment 
WHERE
    deliver_order_id=:deliver_order_id and realized_status=3
ORDER BY added_date DESC";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function inserCredit($tot) {
        $this->updateCredit($_REQUEST['dtoken_delar_deliver_order_id']);
        $Date = date('Y-m-d');
        $date_crt = '';
        if (isset($_REQUEST['txt_credit_token']) && $_REQUEST['txt_credit_token'] != '') {
            $date_crt = $_REQUEST['txt_credit_token'];
        } else {
            $date_crt = date('Y-m-d', strtotime($Date . ' + 30 days'));
        }
        $cash = array(
            'deliver_order_id' => $_REQUEST['dtoken_delar_deliver_order_id'],
            'credit_payment' => $tot,
            'due_date' => $date_crt,
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_credit_payment", $cash);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function insertDealerPayment($data_Array) {
        $data = array(
            'delar_deliver_order_id' => $data_Array['dtoken_delar_deliver_order_id'],
            'payed_amount' => $data_Array['dtoken_amountd'],
            'date' => date('Y:m:d'),
            'time' => date('H:i:s'),
            'status' => 1
        );


        $this->db->__beginTransaction();
        $this->db->insertData("tbl_delar_payment", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateCredit($id_sales_order) {
        $details = array("status" => '0'
        );

        $where = array(
            "deliver_order_id" => $id_sales_order
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_credit_payment', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function getDueDate($due_date) {
        $column = array('deliver_order_id' => $due_date);
        $sql = "SELECT due_date FROM tbl_credit_payment  WHERE deliver_order_id=:deliver_order_id  ORDER BY added_date AND  added_time ASC LIMIT 1";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            
        }
    }

    public function dealerReturn() {
        
    }

    public function getAllUnrealizedCheque($column) {
        $sql = "select 
    deliver_order_id,
    cheque_no,
    cheque_payment,
    realized_date,
    added_date,
    added_time,
    realized_status,
    cheque_payment_id,
    
    sum(cheque_payment) as total_cheque_payment
from
    
    tbl_cheque_payment 
      where realized_status='0' and  deliver_order_id=:deliver_order_id";
        return $this->db->mod_select($sql, $column);
    }

}

?>
