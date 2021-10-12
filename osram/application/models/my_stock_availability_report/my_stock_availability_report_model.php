<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_stock_availability_report_model
 *
 * @author Kanchu
 */
class my_stock_availability_report_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function stockAvailability() {
         $sql = "select 
    concat(temp.employee_first_name,
            ' ',
            temp.employee_last_name) as emp_name,
    (tsk.qty) as stock_quantity,
    tsk.id_products,
    ti.item_name,
    ti.item_account_code,
    tpr.product_price,
    (tsk.qty * tpr.product_price) as total
from
    tbl_store tst
        inner join
    tbl_stock tsk ON tst.id_store = tsk.id_store
        inner join
    tbl_employee temp ON temp.id_employee_registration = tst.id_employee_registration
        inner join
    tbl_products tpr ON tsk.id_products = tpr.id_products
        inner join
    tbl_item ti ON ti.id_item = tpr.iditem
        inner join
    tbl_item_category tic ON tic.id_item_category = ti.id_item_category
where
    tsk.stock_status = 1
    
";
           
             $query = $this->db->mod_select($sql);
             return $query;

             
    }
    


    
    //put your code here
}
