<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rep_wise_target_model
 *
 * @author Kanchu
 */
class rep_wise_target_model extends C_Model{
    function __construct() {
        parent::__construct();
    }
    
    
    public function getDistributor($q, $select) {
		$userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $appdend='';
        if ($userdata == "Distributor") {

            $appdend .= " and tbl_employee_has_place.id_employee_has_place = '$id_employeeHas'";
        }
        $sql = " SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee.id_employee,
	tbl_employee_has_place.id_physical_place,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
        INNER JOIN
    tbl_user tbl_user ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        INNER JOIN
    tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type
WHERE
    tbl_user_type.user_type = 'Distributor' AND employee_status = 1 AND tbl_employee.employee_status = 1 AND tbl_employee_has_place.employee_has_place_status = 1 AND employee_first_name LIKE '%$q%'
 {$appdend}
	GROUP BY tbl_employee_has_place.id_employee_has_place";

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
    
    
    
    public function getRepNames(){
               
        $pyid = $_REQUEST['pyid'];
        $sql = " SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee.id_employee,
	tbl_employee_has_place.id_physical_place,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
        INNER JOIN
    tbl_user tbl_user ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        INNER JOIN
    tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type
WHERE
    tbl_user_type.user_type = 'Sales Rep' AND employee_status = 1 AND tbl_employee.employee_status = 1 AND tbl_employee_has_place.employee_has_place_status = 1
and tbl_employee_has_place.id_physical_place='$pyid' GROUP BY tbl_employee_has_place.id_employee_has_place order by full_name";
        
//        $query = $this->db->query($sql);
        $result = $this->db->mod_select($sql);
//        $json_array = array();


        return $result;
        
        
        
    }
    public function insert_rep_target($datapack){
        $count = $datapack['hidden_token_row'];
        for ($i = 1; $i < ($count + 1); $i++) {
            $data2 = array(
                'id_employee_has_place' => $_POST['repname_'.$i],
                'id_physical_place' => $_POST['dis_phy_place'],
                
                'target_month' => $_POST['tar_month_'. $i],
                'target_amount' =>$_POST['amount_'. $i],
                'rep_target_status' =>'1',
                'added_date' => date('y:m:d'),
                'added_time' => date('H:i:s')
            );
            $this->db->insertData("tbl_rep_target", $data2);
           // print_r($data2);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
	 public function getViewTarget(){
        $sql="SELECT 
    trt.id_rep_target,
    trt.id_employee_has_place,
    trt.id_physical_place,
    trt.target_month,
    trt.target_amount,
    CONCAT(te.employee_first_name,
            ' ',
            te.employee_last_name) AS RepName,
    (select 
            concat(te.employee_first_name,
                        ' ',
                        te.employee_last_name) 
        from
            tbl_employee te
                inner join
            tbl_employee_has_place tep ON te.id_employee = tep.id_employee
        where
            tep.employee_has_place_status = 1
                and tep.id_physical_place = trt.id_physical_place
                and te.id_employee_type = 2) as disName
FROM
    tbl_rep_target trt
        INNER JOIN
    tbl_employee_has_place tehp ON trt.id_employee_has_place = tehp.id_employee_has_place
        INNER JOIN
    tbl_employee te ON tehp.id_employee = te.id_employee
WHERE
    rep_target_status = 1
	order by trt.id_rep_target desc
";
        $result=$this->db->mod_select($sql);
        return $result;
    }
    
    public function deletetarget($id){
        $data_delete = array(
            "rep_target_status" => 0
        );
        $where = array(
            "id_rep_target" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_rep_target", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
	
    public function updatetarget($dataset){
        $id = $dataset['id_rep_target'];
     $data = array(
            "id_employee_has_place" => $dataset['mngrepname_1'],
            "id_physical_place" => $dataset['dis_phy_place'],
            "target_month" => $dataset['tar_month_1'],
            "target_amount" => $dataset['amount_1']
        );
        $where = array(
            "id_rep_target" => $id
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_rep_target", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
	
	
	 public function get_alltarget(){
        $append='';
        if (isset($_REQUEST['disphyId']) && $_REQUEST['disphyId'] != '') {
            $txt_phy_id = $_REQUEST['disphyId'];
           $append="and trt.id_physical_place='$txt_phy_id'";
        }
        if (isset($_REQUEST['tar_month_1']) && $_REQUEST['tar_month_1'] != '') {
            $txt_month = $_REQUEST['tar_month_1'];
           $append= "and trt.target_month= '$txt_month' ";
        }
        
        $user_type= $this->session->userdata('user_type');
        $id_physical_place=$this->session->userdata('id_physical_place');
		$id_employeeHas = $this->session->userdata('id_employee_has_place'); 
        if ($user_type== "Distributor"){
            $append="and trt.id_physical_place='$id_physical_place'";
        }
        if ($user_type== "Sales Rep"){
            $append="and tehp.id_employee_has_place='$id_employeeHas'";
            
        }
        $sql="SELECT 
    trt.id_rep_target,
    trt.id_employee_has_place,
    trt.id_physical_place,
    trt.target_month,
    trt.target_amount,
    CONCAT(te.employee_first_name,
            ' ',
            te.employee_last_name) AS RepName,
    (select 
            concat(te.employee_first_name,
                        ' ',
                        te.employee_last_name) 
        from
            tbl_employee te
                inner join
            tbl_employee_has_place tep ON te.id_employee = tep.id_employee
        where
            tep.employee_has_place_status = 1
                and tep.id_physical_place = trt.id_physical_place
                and te.id_employee_type = 2) as disName
FROM
    tbl_rep_target trt
        INNER JOIN
    tbl_employee_has_place tehp ON trt.id_employee_has_place = tehp.id_employee_has_place
        INNER JOIN
    tbl_employee te ON tehp.id_employee = te.id_employee
WHERE
    rep_target_status = 1
        {$append}
order by trt.id_rep_target desc
";
        $result=$this->db->mod_select($sql);
        return $result;
    }
    
    
    public function getDisName($q, $select){
        $sql = " SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee.id_employee,
	tbl_employee_has_place.id_physical_place,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
        INNER JOIN
    tbl_user tbl_user ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        INNER JOIN
    tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type
WHERE
    tbl_user_type.user_type = 'Distributor' AND employee_status = 1 AND tbl_employee.employee_status = 1 AND tbl_employee_has_place.employee_has_place_status = 1 AND employee_first_name LIKE '%$q%'
GROUP BY tbl_employee_has_place.id_employee_has_place";

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
