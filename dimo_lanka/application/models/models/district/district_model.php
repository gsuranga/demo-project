<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of district_model
 *
 * @author Iresha Lakmali
 */
class district_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function createDistrict($dataArray){
        $data = array(
            'district_name' => $dataArray['district_name'] ,
            'district_code' => $dataArray['district_code'] ,
            'status' => 1
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_district", $data);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
    public function viewAllDistrict(){
        $sql = "select * from tbl_district WHERE status='1'";
        return $this->db->mod_select($sql);
    }
    
    public function getAllDistrict($q, $select){
         $sql = "select district_id,district_name from tbl_district WHERE status='1' AND district_name LIKE '$q%'";
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
