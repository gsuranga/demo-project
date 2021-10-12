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
class payment_remark_model extends C_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function getpaymentremark(){
        $query = "SELECT tpr.id_sales_order,tpr.credit_date,
if(payment_type='cash',tpr.payment_amount,if(payment_type='credit',tpr.credit_payment,tpr.chequepayment)) as payment_amount,
tpr.payment_type,(select invoice_no from tbl_invoice where id_sales_order=tpr.id_sales_order)as invoiceNo, 
(SELECT outlet_name FROM tbl_outlet where id_outlet in
(select id_outlet from tbl_outlet_has_branch where id_outlet_has_branch in(select id_outlet_has_branch from tbl_sales_order where id_sales_order in (select id_sales_order from tbl_payment_remark where tpr.id_sales_order=id_sales_order)))) as outletName FROM tbl_payment_remark tpr";
        return $this->db->mod_select($query);
    }
}

?>
