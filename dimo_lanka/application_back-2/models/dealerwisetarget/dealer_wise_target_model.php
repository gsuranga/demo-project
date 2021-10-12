<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_wise_target_model
 *
 * @author Iresha Lakmali
 */
class dealer_wise_target_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dealerWiseTarget(){
        $sql = "select tas.part_no,tas.description,tas.selling_val from tbl_all_sales tas";
         return $this->db->mod_select($sql);
    }
   
}

?>
