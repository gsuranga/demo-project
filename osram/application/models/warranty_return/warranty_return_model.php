<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of warranty_return_model
 *
 * @author lahiru
 */
class warranty_return_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getWarrantyReturn(){
     $query = "SELECT warrenty_return.item_id,warrenty_return.warrenty_return_id,warrenty_return.date,warrenty_return.	time,warrenty_return.timestamp,warrenty_return.reason,warrenty_return.quantity,warrenty_return.outlet_id,warrenty_return.sales_id,warrenty_return.serial_no,tbl_outlet.outlet_name,tbl_item.item_name
                FROM warrenty_return INNER JOIN tbl_outlet ON warrenty_return.outlet_id=tbl_outlet.id_outlet INNER JOIN tbl_item ON tbl_item.id_item = warrenty_return.item_id";
        return $result = $this->db->mod_select($query);
    }
}

?>
