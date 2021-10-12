<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of realized_model
 *
 * @author kanishka
 */
class realized_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getOutelets($q, $emp_id, $select) {
       
        $query = '';
        
        if ($emp_id != '') {
            
            $query = "AND tbl_sales_order.id_employee_has_place='$emp_id'";
        } else {
            
        }


        $sql = "SELECT tbl_outlet_has_branch.branch_address,tbl_outlet.outlet_name,tbl_sales_order.id_outlet_has_branch,tbl_sales_order.id_sales_order 
            FROM tbl_sales_order tbl_sales_order 
            INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch 
            ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch 
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet 
            WHERE tbl_outlet.outlet_status='1' AND tbl_outlet.outlet_name LIKE '$q%' 
             {$query} GROUP BY tbl_outlet_has_branch.id_outlet_has_branch";
        
        $query2 = $this->db->query($sql);
        $result = $query2->result('array');
        $json_array = array();
        //echo $sql;
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
    
    public function getCheckPaymentDetails(){
        
        $sid= "";
        $append = "";
        $date_cyr = "";
        $status = '';
        
        if (isset($_POST['txt_outlet_namehidden']) && $_POST['txt_outlet_namehidden'] != '') {

            $sid = $_POST['txt_outlet_namehidden'];
            $append = "and tbl_cheque_payment.id_sales_order = '$sid'";
           
        }
        
        if (isset($_POST['txttren_date']) && $_POST['txttren_date'] != '') {
            $txt_ter_name = $_POST['txttren_date'];
            $txttrend_date = $_POST['txttrend_date'];
            $date_cyr = "AND realized_date BETWEEN '$txt_ter_name' AND '$txttrend_date'";
        }
        
        if(isset($_POST['cmb_status'])){
            if($_POST['cmb_status'] == 0){
                $status = "AND tbl_cheque_payment.realized_status='0'";
            }elseif ($_POST['cmb_status'] == 1) {
                $status = "AND tbl_cheque_payment.realized_status='1'";
            }
        }
        
        $sql= " SELECT 
    tbl_bank.bank_name,
    tbl_cheque_payment.cheque_payment,
    tbl_cheque_payment.id_cheque_payment,
    tbl_cheque_payment.cheque_no,
    tbl_cheque_payment.realized_date,
    tbl_cheque_payment.added_date,
    tbl_cheque_payment.added_time,
    tbl_cheque_payment.realized_status,
    tbl_cheque_payment.id_sales_order,
    tbl_outlet.outlet_name
FROM
    
 
    tbl_bank  
inner join
	tbl_cheque_payment on tbl_cheque_payment.id_bank= tbl_bank.id_bank
inner join
tbl_sales_order on tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
inner join
tbl_outlet_has_branch on tbl_sales_order.id_outlet_has_branch= tbl_outlet_has_branch.id_outlet_has_branch
inner join
tbl_outlet on tbl_outlet.id_outlet= tbl_outlet.id_outlet
where tbl_cheque_payment.cheque_payment_status=1   {$append} {$date_cyr} {$status}
    group by tbl_cheque_payment.id_cheque_payment
order by tbl_cheque_payment.id_cheque_payment DESC ";
        
        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];
            $subJson['cheque_payment'] = $row['cheque_payment'];
            $subJson['cheque_no'] = $row['cheque_no'];
            $subJson['realized_date'] = $row['realized_date'];
            $subJson['bank_name'] = $row['bank_name'];
            $subJson['realized_status'] = $row['realized_status'];
            $subJson['id_cheque_payment'] = $row['id_cheque_payment'];
            $subJson['outlet_name'] = $row['outlet_name'];
            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }
    
    public function changetoRealized(){
        $where = array(
            'id_cheque_payment' => $_REQUEST['id_cheque_payment']
        );
        
        $details = array(
            'realized_status' => 0
        );
        
        $this->db->__beginTransaction();
        $this->db->update('tbl_cheque_payment', $details, $where);
        $this->db->__endTransaction();
    }

}

?>
