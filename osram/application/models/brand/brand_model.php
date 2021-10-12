<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brand_model
 *
 * @author Thilina
 */
class brand_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    function insertbrand($dataset){
         echo  $data_insert = array(
            'brand_name' => $dataset['brand_name'],
            'brand_staus' => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_item_brand", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
       
    }
    function getAllbrand(){
        $sql="select item_brand_id,brand_name from tbl_item_brand where brand_staus = '1'";
        $result=  $this->db->mod_select($sql);
        return $result;
    }
    function deleteBatch($item_id){
         $data_delete = array(
            "brand_staus" => 0
        );
        $where = array(
            "item_brand_id" => $item_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_brand", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    function updateBrand($dataset){
        
        $id = $dataset['managebrand_id'];
        $dataset = array(
            "brand_name" => $dataset['managebrand_name']
        );
        $where = array(
            "item_brand_id" => $id
        );
        //print_r($dataset);
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_brand", $dataset, $where);
        $this->db->__endTransaction();
        return $this->db->status();
        
    }
    
}
