<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of warranty_return_model
 *
 * @author lahiru
 */
class posm_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getposm(){
        
        $userdata = $this->session->userdata('user_type');
        $userid = $this->session->userdata('id_employee_has_place');
        
       if($userdata=="Distributor"){
           $append="AND tbl_employee_has_place.id_physical_place = (select 
            tbl_employee_has_place.id_physical_place
        from
            tbl_employee_has_place
        where
            tbl_employee_has_place.id_employee_has_place = '$userid')";
       }  else {
           if (isset($_REQUEST['phyid']) && $_REQUEST['phyid'] != "") {
            $id = $_REQUEST['phyid'];
           $append="and tbl_employee_has_place.id_physical_place='$id'";
        }
       }
        
     
        if (isset($_REQUEST['iname']) && $_REQUEST['iname'] != "") {
            $name= $_REQUEST['iname'];
           $append="and posm_order_detail.item='$name'";
        }
         $query = "SELECT 
    posm_order_detail.posm_order_detail_id,
    posm_order.posm_order_id,
    posm_order.outlet_has_branch,
    posm_order.date,
    posm_order_detail.item,
    posm_order_detail.quantity,
    tbl_outlet.outlet_name,
	tbl_employee_has_place.id_employee_has_place,
	tbl_employee_has_place.id_physical_place
FROM
    tbl_employee_has_place
        inner join
    tbl_employee on tbl_employee_has_place.id_employee= tbl_employee.id_employee
        inner join
    tbl_user ON tbl_employee.id_employee_registration = tbl_user.id_employee_registration
        right join
    posm_order ON tbl_user.id_user = posm_order.id_user
        INNER JOIN
    posm_order_detail ON posm_order.posm_order_id = posm_order_detail.posm_order_id
        INNER JOIN
    tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = posm_order.outlet_has_branch
        INNER JOIN
    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
WHERE
    tbl_outlet.outlet_status = '1'
    {$append}
group by posm_order_detail.posm_order_detail_id";
        return $result = $this->db->mod_select($query);
    }
    
     function getEmployeNames($emp_id, $select){
      
        $sql="select concat(emp.employee_first_name,' ', emp.employee_last_name) as employee_first_name,emhp.id_physical_place from
    tbl_employee emp
        inner join
    tbl_employee_has_place emhp ON emp.id_employee = emhp.id_employee
where
    emp.id_employee_type = 2 and emp.employee_status = 1
        and emhp.employee_has_place_status = 1
        and emp.employee_first_name like '$emp_id%'";
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
    
    function getItemNames($item, $select){
      $sql="select item from posm_order_detail where item like '$item%' group by item";
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
