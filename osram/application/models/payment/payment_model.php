<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_model
 *
 * @author kanishka
 */
class payment_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getSalesOrderDetails($column){
        $sql = "SELECT tbl_invoice.invoice_no,tbl_sales_order.id_sales_order,tbl_outlet.outlet_name , tbl_outlet_has_branch.branch_address 
            ,tbl_outlet_has_branch.branch_telephone ,tbl_outlet_has_branch.branch_contact_person 
            , tbl_outlet_has_branch.branch_address ,tbl_territory.territory_name , tbl_outlet_registration.outlet_code 
            , tbl_outlet_category.outlet_category_name , tbl_sales_order.added_date FROM tbl_sales_order tbl_sales_order 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place 
            INNER JOIN tbl_territory tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory 
            INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch 
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet 
            INNER JOIN tbl_outlet_category tbl_outlet_category ON tbl_outlet_category.id_outlet_category= tbl_outlet.id_outlet_category 
            INNER JOIN tbl_outlet_registration tbl_outlet_registration ON tbl_outlet_registration.id_outlet_registration = tbl_outlet.id_outlet_registration 
            INNER JOIN tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
            WHERE tbl_sales_order.id_sales_order=:id_sales_order";
        
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    
    public function getInviceNumber($column){
        $sql = "SELECT tbl_sales_order.id_sales_order, tbl_invoice.invoice_no 
            FROM tbl_sales_order tbl_sales_order 
            INNER JOIN tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order 
            WHERE tbl_sales_order.id_sales_order=:id_sales_order GROUP BY tbl_sales_order.id_sales_order";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    
    public function inserCash(){
        $cash = array(
            'id_sales_order' => $_POST['id_sales_ordertoken'],
            'cash_payment' => $_POST['txt_cash'],
             'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
        
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_cash_payment", $cash);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
     public function inserCredit($tot){
         $this->updateCredit($_POST['id_sales_ordertoken']); 
        $Date = date('Y-m-d');
        $date_crt = '';
        if(isset($_REQUEST['txt_credit_token']) && $_REQUEST['txt_credit_token'] != ''){
            $date_crt = $_REQUEST['txt_credit_token'];
        }  else {
            $date_crt = date('Y-m-d', strtotime($Date. ' + 30 days'));
        }
        $cash = array(
            'id_sales_order' => $_POST['id_sales_ordertoken'],
            'credit_value' => $tot,
            'due_date' => $date_crt,
             'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
       
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_credit_payment", $cash);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
    public function updateCredit($id_sales_order){
        $details = array("credit_status" => '0'
        );

        $where = array(
            "id_sales_order" => $id_sales_order
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_credit_payment', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

        public function insertCheq($cheque){
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_cheque_payment", $cheque);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function getCashPayment($column){
        $sql = "SELECT SUM(cash_payment) as total_cash ,added_date FROM tbl_cash_payment WHERE id_sales_order=:id_sales_order ORDER BY added_date DESC ";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    
    public function getChePayment($column){
        $sql = "SELECT SUM(cheque_payment) as total_cheq , added_date FROM tbl_cheque_payment WHERE id_sales_order=:id_sales_order ORDER BY added_date DESC";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    
    public function getLastPaymentCredit($column){
        $sql = "SELECT due_date FROM tbl_credit_payment WHERE id_sales_order=:id_sales_order AND credit_status='1' LIMIT 1";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    public function getLastPaymentCashTot($column){
        $sql = "SELECT SUM(cash_payment) as cash FROM tbl_cash_payment WHERE id_sales_order=:id_sales_order";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    public function getLastPaymentChque($column){
        $sql = "SELECT added_date FROM tbl_cheque_payment WHERE id_sales_order=:id_sales_order ORDER BY added_date DESC LIMIT 1";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    public function getLastPaymentChqueTot($column){
        $sql = "SELECT SUM(cheque_payment) as che FROM tbl_cheque_payment WHERE id_sales_order=:id_sales_order";
        return $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
    }
    
    
    public function getCurrentCreditAmount($id_sales_order){
        
        $column = array('credit_status' => '1' , 'id_sales_order' => $id_sales_order['id_sales_order'] );
        $sql = "SELECT * FROM tbl_credit_payment WHERE id_sales_order=:id_sales_order AND credit_status=:credit_status";
        $mod_select = $this->db->mod_select($sql,$column,PDO::FETCH_ASSOC);
        
        if(count($mod_select) > 0){
            return $mod_select[0]['credit_value'];
        }  else {
            return 0;
        }
    }
    
    public function getCashHistory($id_sales_order){
        $sql = "SELECT * FROM tbl_cash_payment WHERE id_sales_order=:id_sales_order";
        return $mod_select = $this->db->mod_select($sql,$id_sales_order,PDO::FETCH_ASSOC);
    }
    
    public function getChequeHistory($id_sales_order){
        $sql = "SELECT * FROM tbl_cheque_payment INNER JOIN tbl_bank ON tbl_bank.id_bank = tbl_cheque_payment.id_bank WHERE id_sales_order=:id_sales_order";
        return $mod_select = $this->db->mod_select($sql,$id_sales_order,PDO::FETCH_ASSOC);
    }
    
    public function getCreditHistory($id_sales_order){
        $sql = "SELECT * FROM tbl_credit_payment WHERE id_sales_order=:id_sales_order";
        return $mod_select = $this->db->mod_select($sql,$id_sales_order,PDO::FETCH_ASSOC);
    }
    
    
}

?>
