<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch_type_model
 *
 * @author Iresha Lakmali
 */
class branch_type_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function viewAllBranchType(){
         $sql = "select * from tbl_branch_type where status='1'";
        return $this->db->mod_select($sql);
    }
    
    public function createBranchType($dataArray){
        $data = array(
            'branch_type_name' => $dataArray['branch_type_name'],
           'added_date' =>date('Y:m:d'),
            'added_time' =>date('H:i:s'),
            'status' => 1
        );
       print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_branch_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
    public function manageBranchType($dataArray){
         $where = array(
            'branch_type_id' => $dataArray['m_branch_type_id']
        );
        print_r($where);
        $data = array(
            'branch_type_name' => $dataArray['m_location'],
            
        );
         print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_branch_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function remooveBranchType($id){
           $where = array(
            'branch_type_id' => $id
        );
        print_r($where);
        $data = array(
            'status' => 0
        );
         print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_branch_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
   
}

?>
