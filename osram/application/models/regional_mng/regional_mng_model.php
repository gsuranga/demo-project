<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of regional_mng_model
 *
 * @author Thilina
 */
class regional_mng_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getregionalName($q, $select){
        $sql="select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as fullName,
    tehp.id_employee_has_place,
    tehp.id_physical_place,
te.id_employee_type
from
   tbl_employee_type tet
inner join
    tbl_employee te on tet.id_employee_type=te.id_employee_type
        inner join
    tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
where
    te.employee_status = 1
        and tehp.employee_has_place_status = 1
      and te.employee_first_name like '%$q%'
	  and tet.employee_type='Regional Manager' or tet.employee_type='Area Sales manager'
";
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
    
    public function getDisName($q, $select){
        $sql="select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as fullName,
    tehp.id_employee_has_place,
    tehp.id_physical_place,
te.id_employee_type
from
   tbl_employee_type tet
inner join
    tbl_employee te on tet.id_employee_type=te.id_employee_type
        inner join
    tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
where
    te.employee_status = 1
        and tehp.employee_has_place_status = 1
and tet.employee_type='Distributor'
and te.employee_first_name like '%$q%'
       ";
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
    public function insert_regional_mng(){
        $assign = array(
            'region_manager_emp_id'=> $_REQUEST['idemployeeHplace'],
            'region_manager_psy_id'=> $_REQUEST['idphy'],
            'added_date'=>date('Y:m:d'),
            'added_time'=>date('H:i:s'),
            'status'=>'1'           
        );
        print_r($assign);      
     $this->db->insertData("tbl_region_assign", $assign);
      $region_assign_id = $this->db->insertId();
//        echo "<br>";
       echo $count = ($_REQUEST['hidden_token_row']);      
        for ($i = 1; $i < ($count +1); $i++) {
            $data2 = array(
                'region_assign_id' => $region_assign_id,
                'distributor_emp_id' => $_REQUEST['dis_emp_has_placeId'. $i],                
                'distributor_psy_id' => $_REQUEST['dis_phyId'. $i],
                'added_date'=>date('Y:m:d'),
                'added_time'=>date('H:i:s'),
                'status'=>'1' 
            );
            $this->db->insertData("tbl_region_assign_details", $data2);
            print_r($data2);  
            echo $aaaaa=$_REQUEST['dis_phyId'. $i];
        }
        $this->db->__endTransaction();
        return $this->db->status();
        
        
        
    }
        
        
        
//        
    
    public function ViewRegional_mng(){
        $sql="select 
    tra.region_assign_id,
    trad.region_detail_id, trad.added_date ,
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as fulname,
    (select 
            concat(te.employee_first_name,
                        ' ',
                        te.employee_last_name) as fulname
        from
            tbl_employee te
                inner join
            tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
        where
            trad.status = 1
                and tehp.id_employee_has_place = trad.distributor_emp_id) as DisName
from
    tbl_employee te
        inner join
    tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
        inner join
    tbl_region_assign tra ON tehp.id_employee_has_place = tra.region_manager_emp_id
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1";
        $result=  $this->db->mod_select($sql);
        return $result;
    }
    public function deleteMng($id){
        $data_delete = array(
            "status" => 0
        );
        $where = array(
            "region_detail_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_region_assign_details", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
     public function get_previous_assinged(){
        $dis_emp_has_place=$_REQUEST['dis_emp_has_place'];
        $manger_emp_has_place=$_REQUEST['manger_emp_has_place'];
        $sql="select 
    ra.region_assign_id
from
    tbl_region_assign ra
inner join
tbl_region_assign_details rad on ra.region_assign_id=rad.region_assign_id
where
ra.status=1
and rad.status=1
and ra.region_manager_emp_id='$manger_emp_has_place'
and rad.distributor_emp_id='$dis_emp_has_place'";
        $result=$this->db->mod_select($sql);
        return $result;
    }
}
