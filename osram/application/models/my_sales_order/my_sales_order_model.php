<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_sales_order_model
 *
 * @author Kanchu
 */
class my_sales_order_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
//    public function getItemName($term) {
//       // echo 'ghjgj';
//        $query = "select * from posm_order_detail where item like '%$term%'";
//
//        return $result=$this->db->mod_select($query);
//    //put your code here
//}

    public function getItemName($term) {
       // echo 'ghjgj';
        $query = "SELECT * 
                    FROM  `tbl_item` 
                    WHERE  `item_name` LIKE '$term%'";

       // return $result=$this->db->mod_select($query);
        $sql=  $this->db->query($query);
        $result=$sql->result();
        return $result;
}
    
    }
