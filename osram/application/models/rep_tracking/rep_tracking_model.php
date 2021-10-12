<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rep_tracking_model
 *
 * @author Thilina
 */
class rep_tracking_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_rep_tracking(){
        $query_append = "";
        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '') {
           $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
            $query_append = "AND gm.id_employee_has_place='$txt_gps_emp_name_token' ";
        }

        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '' && isset($_POST['txt_st_date']) && $_POST['txt_st_date'] != '') {
            $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
            $txt_st_date = $_POST['txt_st_date'];
            $query_append = "AND gm.id_employee_has_place='$txt_gps_emp_name_token' AND gm.added_date='$txt_st_date' ";
        }  
        
       $sql="select 
   gm.move_id,
gm.id_employee_has_place,
gm.battry_level,
gm.gps_latitude,
gm.gps_longitude,
gm.added_date,
gm.added_time
from
    tbl_gps_movement gm
where
gm.status=1 {$query_append}";

        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
//            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            $subJson['lat'] = $row['gps_longitude'];
            $subJson['longi'] = $row['gps_latitude'];
            $subJson['bat'] = $row['battry_level'];
//            $subJson['amount'] = number_format(($row['amount'] - $row['returnamount']), 2);
//            $subJson['con'] = $row['outlet_name'];
            $subJson['occ'] = "Tracking";
//            $subJson['bill_status'] = "1";

            array_push($json_array['locations'], $subJson);
        }

        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }
    
            
        public function getEmployeNames($id, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

		        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        if ($userdata == "Distributor") {

            $appdend = " and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }

        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee  
            WHERE tbl_employee.employee_status=1
and tbl_employee.id_employee_type=3 and CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '%$id%' {$query_append} ";

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

