<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pending_payments_model
 *
 * @author Iresha Lakmali
 */
class pending_payments_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
     public function getAllDealerName($q, $select) {
        $sql = "select delar_id,delar_name from tbl_delar WHERE delar_name LIKE '$q%'";
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
    
    public function PendingPayments(){
        $sql = "select do.delar_purchase_order_id,do.deliverd_date,do.deliverd_time,do.total_amount,d.delar_shop_name,b.branch_name,a.area_name,tcp.due_date,tcp.credit_payment from tbl_delar d INNER JOIN tbl_delar_deliver_order do ON do.delar_id=d.delar_id INNER JOIN tbl_branch b ON b.branch_id=d.branch_id INNER JOIN tbl_area a ON a.area_id=b.area_id INNER JOIN tbl_credit_payment tcp ON tcp.delar_deliver_order_id = do.delar_deliver_order_id WHERE tcp.status='1' AND tcp.credit_payment !='0'";
         return $this->db->mod_select($sql);
    }
    
    public function searchPendingPayment(){
        $append = '';
        if(isset($_POST['dealer_id']) && $_POST['dealer_id'] != ''){
         $dealer_id = $_POST['dealer_id'];
         $append = "AND do.dealer_id='$dealer_id'";
            
        }
        
        if(isset($_POST['end_date']) && $_POST['end_date'] != ''){
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $append = "AND do.date between '$start_date' AND '$end_date'";
            
        }
        
        if(isset($_POST['dealer_id']) && $_POST['dealer_id'] != '' && isset($_POST['end_date']) && $_POST['end_date']){
         $dealer_id = $_POST['dealer_id'];
         $start_date = $_POST['start_date'];
         $end_date = $_POST['end_date'];
         $append = "AND do.delar_id='$dealer_id' AND do.date between '$start_date' AND '$end_date'";
            
        }
        
        $sql = "select do.dealer_purchase_order_id,do.purchase_order_id,do.date,do.time,do.amount,d.delar_shop_name,b.branch_name,a.area_name,tcp.due_date,tcp.credit_payment,do.dealer_id from tbl_dealer d INNER JOIN tbl_dealer_purchase_order do ON do.dealer_id=d.delar_id INNER JOIN tbl_branch b ON b.branch_id=d.branch_id INNER JOIN tbl_area a ON a.area_id=b.area_id INNER JOIN tbl_credit_payment tcp ON tcp.purchase_order_id = do.purchase_order_id WHERE tcp.status='1' AND tcp.credit_payment !='0' {$append}";
        
        return $this->db->mod_select($sql);
    }
    
    
  
}

?>
