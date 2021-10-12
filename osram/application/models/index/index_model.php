<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index_model
 *
 * @author Thilina
 */
class index_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSalesDetails() {
        $lastday=  date("Y-m-t", strtotime("-1 month") ) ;
//        $fstDate = '2014-06-01';   //date('Y-m', strtotime(" -1 month")) . '-01';
         $fstDate = date('Y-m', strtotime(" -1 month")) . '-01';
       $sql = "SELECT 
    date_format(so.added_date, '%Y-%m') as month,
    tib.brand_name,
    ifnull((ifnull((sum((ifnull(((ifnull(tsop.product_qty, 0)) * (ifnull(tsop.product_price, 0))),
                            0)))),
                    0) - ifnull((sum((ifnull((ifnull(trnp.return_product_qty, 0) * ifnull(trnp.return_price, 0)),
                            0)))),
                    0)),
            0) as totalsales

FROM
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
        inner join
    tbl_sales_order_products tsop ON so.id_sales_order = tsop.id_sales_order
        inner join
    tbl_products tp ON tsop.id_products = tp.id_products
        inner join
    tbl_item tim ON tp.iditem = tim.id_item
        inner join
    tbl_item_category tic ON tim.id_item_category = tic.id_item_category
        inner join
    tbl_item_brand tib ON tic.id_brand = tib.item_brand_id
        left join
    tbl_return_note as trn ON so.id_sales_order = trn.id_sales_order
        left join
    tbl_return_note_product as trnp ON trn.id_return_note = trnp.id_return_note
WHERE
    so.sales_order_status = '1'
        and so.added_date between '$fstDate' and curdate()
group by date_format(so.added_date, '%Y-%m') , tib.item_brand_id";
//       $sql = "SELECT 
//    date_format(so.added_date, '%Y-%m') as month,
//    tib.brand_name,
//    sum(tsop.product_qty * tsop.product_price) as totalsales
//FROM
//    tbl_invoice ti
//        inner join
//    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
//        inner join
//    tbl_sales_order_products tsop ON so.id_sales_order = tsop.id_sales_order
//        inner join
//    tbl_products tp ON tsop.id_products = tp.id_products
//        inner join
//    tbl_item tim ON tp.iditem = tim.id_item
//        inner join
//    tbl_item_category tic ON tim.id_item_category = tic.id_item_category
//        inner join
//    tbl_item_brand tib ON tic.id_brand = tib.item_brand_id
//WHERE
//    so.sales_order_status = '1' and so.added_date between '$fstDate' and curdate()
//group by date_format(so.added_date, '%Y-%m'),tib.item_brand_id";

        return $this->db->mod_select($sql);
    }
    
    public function getDis_ranking(){
        $fdate=date('Y-m-01');
        $sql="select 
    (select 
            concat(tem.employee_first_name,' ',tem.employee_last_name )
        from
            tbl_employee tem
                inner join
            tbl_employee_has_place teamp ON tem.id_employee = teamp.id_employee
        where
            teamp.id_physical_place = ehp.id_physical_place
                and tem.id_employee_type = 2) as fullname,
    ifnull(sum(sop.product_qty * sop.product_price),
            0) as sales,
(@row:=@row+1) AS rank
from
    tbl_employee te
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
        inner join
    tbl_sales_order so ON so.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_sales_order_products sop ON so.id_sales_order = sop.id_sales_order
        inner join
    tbl_invoice ti ON so.id_sales_order = ti.id_sales_order,
(SELECT @row:=0) AS row_count
where
    so.sales_order_status = 1
        and sop.sales_order_products_status = 1
        and so.added_date between '$fdate' and CURDATE()
group by ehp.id_physical_place
order by sales DESC
LIMIT 0 , 5
";
        return $this->db->mod_select($sql);
        
    }
    
    public function getItem_ranking(){
        $fdate=date('Y-m-01');
        $sql="select 
itm.item_name ,
    ifnull(sum(sop.product_qty), 0) as qty
from
    tbl_invoice ti
        inner join
    tbl_sales_order so ON so.id_sales_order = ti.id_sales_order
        inner join
    tbl_sales_order_products sop ON so.id_sales_order = sop.id_sales_order
        inner join
    tbl_products tp ON sop.id_products = tp.id_products
        inner join
    tbl_item itm on tp.iditem=itm.id_item
where
    so.sales_order_status = 1
        and sop.sales_order_products_status = 1
        and so.added_date between '$fdate' and CURDATE()
group by itm.id_item
order by qty DESC
limit 0,5";
        return $this->db->mod_select($sql);
    }

}
