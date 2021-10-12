<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_take_model
 *
 * @author chathun
 */
class stock_take_model extends C_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function getStockTake(){
        $append ="";
        
        if ((isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != null) && (isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != null)) {
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];
            $append .= "where date between '$start_date' and '$end_date'";
        }
        
        $query = "SELECT 
    `outlet_take _stock`.`outlet_id`,
    `outlet_take _stock`.`date`,
    `outlet_take _stock`.`time`,
    `outlet_take _stock`.`emp_id`,
    `outlet_take _stock_products`.`product_id`,
    `outlet_take _stock_products`.`qty`,
    `tbl_outlet`.`outlet_name`,
    `tbl_item`.`item_name`
FROM
    `outlet_take _stock`
        INNER JOIN
    `outlet_take _stock_products` ON `outlet_take _stock`.`take_id` = `outlet_take _stock_products`.`take_id`
        INNER JOIN
    `tbl_outlet` ON `outlet_take _stock`.`outlet_id` = `tbl_outlet`.`id_outlet`
        INNER JOIN
    `tbl_item` ON `tbl_item`.`id_item` = `outlet_take _stock_products`.`product_id`
{$append}";
        return $result = $this->db->mod_select($query);
    }
}

?>
