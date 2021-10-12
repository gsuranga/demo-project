<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class root_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertRoot($dataset) {
       
        $data1 = array(
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s'),
            "root_account_no" => $dataset['root_account_no'],
            "root_name" => $dataset['root_name'],
            "area_id" => $dataset['areaid'],
            "status" => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_root", $data1);
        $this->db->__endTransaction();
    }
    public function viewAllroot(){
        $sql="select * from tbl_root tr left join tbl_area ta on tr.area_id =ta.area_id	 where tr.status='1' " ;
        return $this->db->mod_select($sql);
    }
     public function getArea($q, $select) {
        $sql = "SELECT * FROM tbl_area where status='1' and area_name like '$q%'";
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
    
    
     function deleteRoot($id1) {
        $id = $id1;
        $data1 = array(
            "status" => 0
        );
        $where = array(
            "root_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_root", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
     public function updateRoot($datas){
        
      $d1=$datas['rootid'];
      
      $update=array(
          "root_account_no"=>$datas['root_account_no'],
          "root_name"=>$datas['root_name'],
          "area_id"=>$datas['areaid'],
          
          
          
      );
      $where = array(
            "root_id" => $d1
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_root", $update, $where);
        $this->db->__endTransaction();
    }


}

?>
