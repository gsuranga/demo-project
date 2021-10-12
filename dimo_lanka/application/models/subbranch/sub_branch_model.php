<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sub_branch_model
 *
 * @author Iresha Lakmali
 */
class sub_branch_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllSubBranch() {
        $sql = "select * from tbl_sub_branch where status='1'";
        return $this->db->mod_select($sql);
    }
    
    public function createSubBranch($dataArray){
        $data = array(
            'sub_branch_name' =>$dataArray['sub_branch_name'],
            'location' =>$dataArray['location'],
            'added_date' =>date('Y:m:d'),
            'added_time' =>date('H:i:s'),
            'status' => 1
        );
     //   print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_sub_branch", $data);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
    public function remooveSubBranch($id){
        $where = array(
            'sub_branch_id' => $id
        );
      //  print_r($where);
        $data = array(
            'status' => 0
        );
     //    print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_sub_branch", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function manageSubBranch($dataArray){
         $where = array(
            'sub_branch_id' => $dataArray['m_sub_branch_id']
        );
        print_r($where);
        $data = array(
            'sub_branch_name' => $dataArray['m_sub_branch_name'],
            'location' => $dataArray['m_location']
        );
     //    print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_sub_branch", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
