<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_type_model
 *
 * @author Iresha Lakmali
 */
class user_type_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function viewAllUserType(){
        $sql = "select * from tbl_usertype  WHERE status='1'";
        return $this->db->mod_select($sql);
    }
    
    public function createUserType($data_Array){
         $data = array(
            'typename' => $data_Array['user_type'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
       
          $query = $this->db->get_where('tbl_usertype', array('typename' => $data_Array['user_type'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_usertype", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }}
    
    
    public function deleteUserType($dataArray){
         $where = array(
            'typeid' => $dataArray['token_user_type_id']
        );
        print_r($where);
        $data = array(
            'status' => 0
        );
        print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_usertype", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
    public function updateUserType($dataArray){
          $where = array(
            'typeid' => $dataArray['m_user_typeid']
        );
       

        $data = array(
            'typename' => $dataArray['m_user_type'],
            
        );
         $query = $this->db->get_where('tbl_usertype', array('typename' => $dataArray['m_user_type'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
        

        $this->db->__beginTransaction();
        $this->db->update("tbl_usertype", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }}
   
}

?>
