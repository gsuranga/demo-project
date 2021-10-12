<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salesdesignation_model
 *
 * @author shamil
 */
class salesdesignation_model extends C_Model {
     public function __construct() {
        parent::__construct();
    }
    
    public function createdesignation($data_Array) {
       
        $data = array(
            'des_type' => $data_Array['designation'],
            
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => '1'
        );
       
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_designation", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
     public function viewAll() {
        $sql = "select * from tbl_designation WHERE status='1'";
        return $this->db->mod_select($sql);
    }
    
    
     public function updatedes($dataArray) {
        $where = array(
            'des_Id' => $dataArray['desID']
        );

        $data = array(
            'des_type' => $dataArray['u_Destype']
           
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_designation", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
     public function deleteArea($id) {
        $where = array(
            'des_Id' => $id
        );
        $data = array(
            'status' => 0
        );
        $this->db->__beginTransaction();

        $this->db->update("tbl_designation", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
}
