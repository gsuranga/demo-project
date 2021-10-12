<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disexpenses
 *
 * @author user
 */
class disexpenses_model extends C_Model {

    //put your code here 
    var $id;

    function __construct() {

        parent::__construct();
    }

    /**
     * Function insertBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertDisExpenses($dataset) {
        $userdata = $this->session->userdata('id_employee_has_place');
        $data_insert = array(
            'id_employee_has_place' => $userdata,
            'status' => 1,
            'date' => date('Y:m:d'),
            'time' => date('H :i:s'),
            'exp_date' => $dataset['exp_date'],
            'des' => $dataset['description'],
            'amount' => $dataset['amount']
        );
       // echo ($data_insert);
        
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_exp_dis", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function getEmployeeDetailsBySession() {
        $userId = $this->session->userdata('id_user');
        $sql = "select 
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name,
    tbl_employee.id_employee
from
tbl_employee
inner join tbl_user on tbl_employee.id_employee_registration = tbl_user.id_employee_registration
where tbl_user.id_user = '$userId'";

        $result = $this->db->mod_select($sql);
        $this->id = $result[0]->id_employee;
        return $result;
    }

    public function getAllExpenses() {
        $userdata = $this->session->userdata('id_employee_has_place');
        $append = "";
        if ((isset($_REQUEST['exp_date_rangeOne']) && $_REQUEST['exp_date_rangeOne'] != null) && (isset($_REQUEST['exp_date_rangeTwo']) && $_REQUEST['exp_date_rangeTwo'] != null)) {
            $dateOne = $_REQUEST['exp_date_rangeOne'];
            $dateTwo = $_REQUEST['exp_date_rangeTwo'];
            $append = " and exp_date between '$dateOne' and '$dateTwo'";
        }
        $result = $this->db->mod_select("SELECT * FROM tbl_exp_dis WHERE tbl_exp_dis.id_employee_has_place='$userdata' {$append}");
        
        return $result;
    }

    public function cashExpensesSummary() {
        
        $append = "";
        if ((isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != null) && (isset($_REQUEST['date_Two']) && $_REQUEST['date_Two'] != null)) {
            $dateOne = $_REQUEST['date_One'];
            $dateTwo = $_REQUEST['date_Two'];
            $append = " and tbl_cash_payment.added_date between '$dateOne' and '$dateTwo'";
        }
        
        $userId = $this->session->userdata('id_user');
        $sql = "select 
    
    sum(tbl_cash_payment.cash_payment) as cash_total
	
    
from
    
    tbl_cash_payment,
	
	tbl_sales_order,
    tbl_employee_has_place,
	tbl_employee,
	tbl_user
where  tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_user.id_employee_registration = tbl_employee.id_employee_registration and tbl_user.id_user = '$userId'
and tbl_cash_payment.id_sales_order = tbl_sales_order.id_sales_order {$append}
group by tbl_employee.id_employee ";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function chequeExpensesSummary() {
        $userId = $this->session->userdata('id_user');
        $append = "";
        if ((isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != null) && (isset($_REQUEST['date_Two']) && $_REQUEST['date_Two'] != null)) {
            $dateOne = $_REQUEST['date_One'];
            $dateTwo = $_REQUEST['date_Two'];
            $append = " and tbl_cheque_payment.added_date between '$dateOne' and '$dateTwo'";
        }
        if(isset($_REQUEST['hasPlaceId']) && $_REQUEST['hasPlaceId'] != ''){
            $hasplace = $_REQUEST['hasPlaceId'];
            $append = "AND tbl_employee_has_place.id_employee_has_place=$hasplace";
        }
        $sql = "select 
    
    sum(tbl_cheque_payment.cheque_payment) as cheque_total
	
    
from
    
                    tbl_cheque_payment,

                        tbl_sales_order,
                    tbl_employee_has_place,
                        tbl_employee,
                        tbl_user
                where  tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
                and tbl_employee.id_employee = tbl_employee_has_place.id_employee
                and tbl_user.id_employee_registration = tbl_employee.id_employee_registration and tbl_user.id_user = '$userId'
                and tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
                and tbl_cheque_payment.realized_status = '0' {$append}
                group by tbl_employee.id_employee";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function disexpenses() {
        $append = "";
        if ((isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != null) && (isset($_REQUEST['date_Two']) && $_REQUEST['date_Two'] != null)) {
            $dateOne = $_REQUEST['date_One'];
            $dateTwo = $_REQUEST['date_Two'];
            $append = " and tbl_exp_dis.exp_date between '$dateOne' and '$dateTwo'";
        }
        
        $userId = $this->session->userdata('id_user');
        
        $sql = "SELECT 
    sum(tbl_exp_dis.amount) as amount
FROM
    tbl_exp_dis,
    tbl_employee,
	tbl_user
where
    tbl_exp_dis.id_employee = tbl_employee.id_employee
and tbl_employee.id_employee_registration = tbl_user.id_employee_registration {$append}
and tbl_user.id_user = '$userId' ";
     
        $result = $this->db->mod_select($sql);
        
        return $result;
    }
    
    public function getCashSummaryReportEmployes(){
        
        $append = '';
        $userdata = $this->session->userdata('user_type');
        $userdata_placeid = $this->session->userdata('id_employee_has_place');
        $column = array('sales_order_status' => 1);
               
        if($userdata == "Distributor"){
            
            $append = "AND tbl_employee_has_place.id_employee_has_place='$userdata_placeid'";
        }
        
           if(isset($_REQUEST['hasPlaceId']) && $_REQUEST['hasPlaceId'] != ''){
            $hasplace = $_REQUEST['hasPlaceId'];
                        $append = "AND tbl_employee_has_place.id_employee_has_place=$hasplace";
        }
        
        
        $sql = "SELECT CONCAT(tbl_employee.employee_first_name , ' ',tbl_employee.employee_last_name) as "
                . "fullname,tbl_employee_has_place.id_employee_has_place  "
                . "FROM tbl_employee tbl_employee "
                . "INNER JOIN tbl_employee_has_place tbl_employee_has_place "
                . "ON tbl_employee_has_place.id_employee = tbl_employee.id_employee  "
                . "WHERE  tbl_employee.id_employee_type=2 " 
                . "AND tbl_employee_has_place.employee_has_place_status=1 {$append} "
                . "AND tbl_employee.employee_status=1";
        
        $mod_select = $this->db->mod_select($sql , $column , PDO::FETCH_ASSOC);
        return $mod_select;
    }
    
    public function getChequeSummary($emlpoyee_hasplceid){
        $pyscialplac = $this->getpyscialplac($emlpoyee_hasplceid);
        $cash_total = 0;
        $append = '';
        
         if(isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != ''){
            $date_One = $_REQUEST['date_One'];
            $date_Two = $_REQUEST['date_Two'];
            $append = "AND tbl_cash_payment.added_date BETWEEN '$date_One' AND '$date_Two'";
        }
        
        
        foreach($pyscialplac as $value){
            //echo $value->id_employee_has_place."</br>";
            $sql_tot = "SELECT SUM(tbl_cash_payment.cash_payment) cash_total  
                FROM tbl_sales_order tbl_sales_order 
                INNER JOIN tbl_cash_payment tbl_cash_payment 
                ON tbl_cash_payment.id_sales_order =  tbl_sales_order.id_sales_order 
                WHERE tbl_sales_order.id_employee_has_place='$value->id_employee_has_place' {$append}";
            
            $mod_select = $this->db->mod_select($sql_tot);
           // echo $mod_select[0]->cash_total."</br>";
            $cash_total += $mod_select[0]->cash_total;
            
        }
        
        return $cash_total;
    }
    
    
    
    public function getChequeSummary2($emlpoyee_hasplceid){
        $pyscialplac = $this->getpyscialplac($emlpoyee_hasplceid);
        $cash_total = 0;
        
        $append = '';
        
         if(isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != ''){
            $date_One = $_REQUEST['date_One'];
            $date_Two = $_REQUEST['date_Two'];
            $append = "AND tbl_cheque_payment.added_date BETWEEN '$date_One' AND '$date_Two'";
        }
        
        foreach($pyscialplac as $value){
            //echo $value->id_employee_has_place."</br>";
            $sql_tot = "SELECT SUM(tbl_cheque_payment.cheque_payment) cheque_tot  
                FROM tbl_sales_order tbl_sales_order 
                INNER JOIN tbl_cheque_payment tbl_cheque_payment 
                ON tbl_cheque_payment.id_sales_order =  tbl_sales_order.id_sales_order  
                WHERE tbl_sales_order.id_employee_has_place='$value->id_employee_has_place' {$append}";
            
            $mod_select = $this->db->mod_select($sql_tot);
           // echo $mod_select[0]->cash_total."</br>";
            $cash_total += $mod_select[0]->cheque_tot;
            
        }
        
        return $cash_total;
    }
    
    public function getpyscialplac($emlpoyee_hasplceid) {
        $sql = "SELECT id_employee_has_place FROM tbl_employee_has_place 
            WHERE id_physical_place=(SELECT id_physical_place FROM tbl_employee_has_place 
            WHERE id_employee_has_place='$emlpoyee_hasplceid' LIMIT 1)  AND employee_has_place_status=1";

        return $mod_select = $this->db->mod_select($sql);
    }
    
    public function getExpenses($employee_has_place){
        $append = '';
        
        if(isset($_REQUEST['date_One']) && $_REQUEST['date_One'] != ''){
            $date_One = $_REQUEST['date_One'];
            $date_Two = $_REQUEST['date_Two'];
            $append = "AND tbl_exp_dis.date BETWEEN '$date_One' AND '$date_Two'";
        }
        
            $sql = "SELECT SUM(amount) as amount FROM `tbl_exp_dis` WHERE id_employee_has_place='$employee_has_place' AND status=1 {$append} GROUP BY id_employee_has_place";
         $mod_select = $this->db->mod_select($sql);
         return $mod_select[0]->amount;
    }

    public function getDistributorNames($disName,$select){
        $sql="SELECT 
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_first_name,
    tbl_employee_has_place.id_employee_has_place
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
WHERE
    tbl_employee.id_employee_type = 2
        AND tbl_employee_has_place.employee_has_place_status = 1
        AND tbl_employee.employee_status = 1
        and tbl_employee.employee_first_name like '$disName%' ";
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
