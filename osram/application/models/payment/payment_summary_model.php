<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_summary_model
 *
 * @author kanishka
 */
class payment_summary_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getEmpployeNamesByso($select , $q){
        $employee_name = $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name');
        $sql = "SELECT  tbl_employee_has_place.id_employee_has_place , CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as fullname 
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            ON tbl_employee_has_place.id_employee = tbl_employee.id_employee  INNER JOIN tbl_user tbl_user ON tbl_user.id_employee_registration =  tbl_employee.id_employee_registration INNER JOIN tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type  WHERE tbl_user_type.user_type='Distributor'  AND tbl_employee_has_place.employee_has_place_status='1' 
            AND CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name)  LIKE '$q%'";
        
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
    
    public function gettempPaymentSummary($sales_id){
          
        $sql = "SELECT * FROM tbl_payment_remark WHERE payment_type='Cheque' AND id_sales_order='$sales_id'";
        return $this->db->mod_select($sql);
    }
    
    public function getDispaymentSummary($sales_id){
       
        $sql = "SELECT t.cheque_no,t.cheque_payment,t.realized_date,b.bank_name FROM tbl_cheque_payment t INNER JOIN tbl_bank b ON t.id_bank = b.id_bank WHERE cheque_payment_status='1' AND id_sales_order='$sales_id'";
        return $this->db->mod_select($sql);
    }
    
    public function getSalesOrderIDs(){
        
        $append = '';
        
        if(isset($_REQUEST['txt_empsonamehid']) && $_REQUEST['txt_empsonamehid'] != ''){
            $txt_empsonamehid = $_REQUEST['txt_empsonamehid'];
            $append = "AND id_employee_has_place='$txt_empsonamehid'";
        }
        
        if(isset($_REQUEST['txt_so_date2']) && $_REQUEST['txt_so_date2'] != ''){
            $txt_so_date1 = $_REQUEST['txt_so_date1'];
            $txt_so_date2 = $_REQUEST['txt_so_date2'];
            $append = "AND added_date BETWEEN '$txt_so_date1' AND '$txt_so_date2'";
        }
        
        if(isset($_REQUEST['txt_so_date2']) && $_REQUEST['txt_so_date2'] != '' && isset($_REQUEST['txt_empsonamehid']) && $_REQUEST['txt_empsonamehid'] != ''){
            $txt_so_date1 = $_REQUEST['txt_so_date1'];
            $txt_so_date2 = $_REQUEST['txt_so_date2'];
            $txt_empsonamehid = $_REQUEST['txt_empsonamehid'];
            $append = "AND id_employee_has_place='$txt_empsonamehid' AND added_date BETWEEN '$txt_so_date1' AND '$txt_so_date2'";
        }
        
        $sql = "SELECT id_sales_order,added_date FROM `tbl_sales_order` WHERE sales_order_status='1' {$append}  ORDER BY `added_date` DESC";
        
        return $this->db->mod_select($sql);
    }
    
}

?>
