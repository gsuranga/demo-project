<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sales_item_model
 *
 * @author Iresha Lakmali
 */
class sales_item_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function viewAllSalesItem($config, $page){
        $sql = "select * from tbl_sales_items LIMIT $page, $config";
        return $this->db->mod_select($sql);
    }
    
    public function record_count() {
        $this->db->from('tbl_sales_items');
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
   
}

?>
