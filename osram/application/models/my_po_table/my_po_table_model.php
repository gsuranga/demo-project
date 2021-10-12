<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_po_table_model
 *
 * @author Kanchu
 */
class my_po_table_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_po_data() {
       // echo "qq";
//        $query="SELECT posm_order.posm_order_id, posm_order.outlet_has_branch, posm_order_detail.posm_order_detail_id, posm_order_detail.item,posm_order_detail.quantity, posm_order_detail.posm_order_id
//                FROM posm_order INNERJOIN posm_order_detail
//                ON posm_order.posm_order_id=posm_order_detail.posm_order_id
//            ";
       $query="SELECT * from posm_order_detail";
        
        return $result=$this->db->mod_select($query);
        
    }
    //put your code here
}
