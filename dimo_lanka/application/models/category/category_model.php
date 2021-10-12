<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category_model
 *
 * @author user
 */
class category_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function insert_category($data_Array){
        $data = array(
            'category_name' => $data_Array['category_name'],
            'date' => date('Y:m:D'),
            'time' => date('H:i:s'),
            'status' => '1' 
        );
        $this->db->__beginTransaction();
        $this->db->insertData("category", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function view_all_category(){
        $sql = "select * from  category";
        return $this->db->mod_select($sql);
    }
    
    public function update_category(){
        $sql = "update category set category_name='update' where category_id='9'";
        return $this->db->mod_select($sql);
    }
   
}
