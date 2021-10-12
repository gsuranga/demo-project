<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brnd_wise_new
 *
 * @author kanishka
 */
class brnd_wise_new_model extends C_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function get_brands() {

        $sql = "select 
    tib.item_brand_id, tib.brand_name
from
    tbl_item_brand tib
where
    tib.brand_staus = 1 order by tib.brand_name asc";
        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        echo json_encode($mod_select);
    }

    public function get_items_catgory() {
        $item_brand_id = $_POST['item_brand_id'];
        $sql = "select 
    tic.id_item_category, tic.tbl_item_category_name
from
    tbl_item_brand tib
        inner join
    tbl_item_category tic ON tib.item_brand_id = tic.id_brand
where
    tib.brand_staus = 1
        and tic.tbl_item_category_status = 1
        and tib.item_brand_id = $item_brand_id order by tic.tbl_item_category_name";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);

        echo json_encode($mod_select);
    }

    public function get_items_names() {
        $id_item_category = $_POST['id_item_category'];
        $it_distributor = $_POST['id_physical_place'];
        $it_item_name = $_POST['it_item_name'];
        $sql = '';
        
        $xprodcut = '';
        $xprodcut1 = '';
        
        if($it_item_name != '' && $it_item_name != 0){
            
            $xprodcut = "and tp.id_products=$it_item_name";
            $xprodcut1 = "and tsok.id_products=$it_item_name";
        }
        
        if ($it_distributor == 0) {
            $sql = "select 
    tp.id_products,
    concat(ti.item_name, ' - ', ti.item_account_code) as full_item_name,ti.item_account_code,ti.item_name
from
    tbl_item_category tic
        inner join
    tbl_item ti ON tic.id_item_category = ti.id_item_category
        inner join
    tbl_products tp ON ti.id_item = tp.iditem
where
    tic.tbl_item_category_status = 1
        and ti.item_status = 1
        and tp.product_status = 1
        and ti.id_item_category = $id_item_category {$xprodcut} order by ti.item_name asc";
           // echo $sql;
        } else {
            $sql = "select 
    tp.id_products,
    concat(ti.item_name,
            ' - ',
            ti.item_account_code) as full_item_name,ti.item_account_code,ti.item_name
from
    tbl_store tst
        inner join
    tbl_stock tsok ON tst.id_store = tsok.id_store
        inner join
    tbl_products tp ON tsok.id_products = tp.id_products
        inner join
    tbl_item ti ON ti.id_item = tp.iditem
where
    tst.store_status = 1
        and tsok.stock_status = 1
        and tp.product_status = 1
        and ti.item_status = 1 and ti.id_item_category = $id_item_category
        and tst.id_physical_place = $it_distributor {$xprodcut1} order by ti.item_name ";
        }

       // echo $sql;
        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function get_distributors_name() {

        $sql = "select 
    concat(tem.employee_first_name,
            ' ',
            tem.employee_last_name) as full_name,
    temp.id_physical_place
from
    tbl_employee tem
        inner join
    tbl_employee_has_place temp ON tem.id_employee = temp.id_employee
where
    tem.employee_status = 1
        and temp.employee_has_place_status = 1
        and tem.id_employee_type = 2";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        echo json_encode($mod_select);
    }

    public function get_salesrep_name() {
        $it_distributor = $_POST['it_distributor'];

        $sql = "select 
    concat(tem.employee_first_name,
            ' ',
            tem.employee_last_name) as full_name,
    temp.id_employee_has_place
from
    tbl_employee tem
        inner join
    tbl_employee_has_place temp ON tem.id_employee = temp.id_employee
where
    tem.employee_status = 1
        and temp.employee_has_place_status = 1
        and tem.id_employee_type = 3 and temp.id_physical_place=$it_distributor";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        echo json_encode($mod_select);
    }

    public function get_sales_qty($id_product, $id_pyhscal_place, $date_1 = '', $date_2 = '', $it_salesrep = '') {


        $phical = '';
        $dates = '';

        if ($it_salesrep == 0) {
            if ($id_pyhscal_place != 0) {
                $phical = 'and tspm.id_employee_has_place in (select 
            temp_pl.id_employee_has_place
        from
            tbl_employee_has_place temp_pl
                inner join
            tbl_employee tem ON temp_pl.id_employee = tem.id_employee
        where
            temp_pl.employee_has_place_status = 1
                and tem.employee_status = 1
                and tem.id_employee_type in (2 , 3)
                and temp_pl.id_physical_place = "' . $id_pyhscal_place . '")';
            }
        } else {
            $phical = "and tspm.id_employee_has_place=$it_salesrep";
        }

        if ($date_1 != '') {
            $dates = "and tspm.added_date between '$date_1' and '$date_2'";
        }

        $sql = "select 
    tsopm.id_products, 
    ifnull(sum(tsopm.product_qty),0) as qty_sales 
from
    tbl_sales_order tspm
        inner join
    tbl_sales_order_products tsopm ON tsopm.id_sales_order = tspm.id_sales_order
    inner join tbl_employee_has_place temphmq on tspm.id_employee_has_place = temphmq.id_employee_has_place
    inner join tbl_employee temsq on temsq.id_employee = temphmq.id_employee
where
    tsopm.sales_order_products_status = 1
        and tspm.sales_order_status = 1 and temsq.employee_status=1 and temphmq.employee_has_place_status=1
        and tsopm.id_products = '$id_product' {$dates} {$phical}
        
group by tsopm.id_products
";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        return $mod_select[0]['qty_sales'];
    }

    public function get_free_qty($id_product, $id_pyhscal_place, $date_1 = '', $date_2 = '', $it_salesrep = '') {

        $phical = '';

        if ($it_salesrep == 0) {
            if ($id_pyhscal_place != 0) {
                $phical = 'and tspm.id_employee_has_place in (select 
            temp_pl.id_employee_has_place
        from
            tbl_employee_has_place temp_pl
                inner join
            tbl_employee tem ON temp_pl.id_employee = tem.id_employee
        where
            temp_pl.employee_has_place_status = 1
                and tem.employee_status = 1
                and tem.id_employee_type in (2 , 3)
                and temp_pl.id_physical_place = "' . $id_pyhscal_place . '")';
            }
        } else {
            $phical = "and tspm.id_employee_has_place=$it_salesrep";
        }


        $dates = '';
        if ($date_1) {
            $dates = "and tspm.added_date between '$date_1' and '$date_2'";
        }

        $sql = "select 
    tsopm.id_products,
    ifnull(sum(tsopm.product_qty), 0) as freeitem
from
    tbl_sales_order tspm
        inner join
    tbl_sales_order_products tsopm ON tsopm.id_sales_order = tspm.id_sales_order
    inner join tbl_employee_has_place temphmq on tspm.id_employee_has_place = temphmq.id_employee_has_place
    inner join tbl_employee temsq on temsq.id_employee = temphmq.id_employee
where
    tsopm.sales_order_products_status = 1 and temsq.employee_status=1 and temphmq.employee_has_place_status=1
        and tspm.sales_order_status = 1
        and (tsopm.product_price = 0
        or tsopm.type_sale = 'Free Issues')
        and tsopm.id_products ='$id_product' {$dates} {$phical}
group by tsopm.id_products
";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        if (count($mod_select) > 0) {
            return $mod_select[0]['freeitem'];
        } else {
            return 0;
        }
    }

    public function get_warranty_qty($id_product, $id_pyhscal_place, $date_1 = '', $date_2 = '', $it_salesrep = '') {

        $phical = '';

        if ($it_salesrep == 0) {

            if ($id_pyhscal_place != 0) {
                $phical = 'and tspm.id_employee_has_place in (select 
            temp_pl.id_employee_has_place
        from
            tbl_employee_has_place temp_pl
                inner join
            tbl_employee tem ON temp_pl.id_employee = tem.id_employee
        where
            temp_pl.employee_has_place_status = 1
                and tem.employee_status = 1
                and tem.id_employee_type in (2 , 3)
                and temp_pl.id_physical_place = "' . $id_pyhscal_place . '")';
            }
        } else {
            $phical = "and tspm.id_employee_has_place=$it_salesrep";
        }

        $dates = '';
        if ($date_1) {
            $dates = "and tspm.added_date between '$date_1' and '$date_2'";
        }

        $sql = "select 
    tsopm.id_products,
    ifnull(sum(tsopm.product_qty), 0) as waranty
from
    tbl_sales_order tspm
        inner join
    tbl_sales_order_products tsopm ON tsopm.id_sales_order = tspm.id_sales_order
    inner join tbl_employee_has_place temphmq on tspm.id_employee_has_place = temphmq.id_employee_has_place
    inner join tbl_employee temsq on temsq.id_employee = temphmq.id_employee
where
    tsopm.sales_order_products_status = 1 and temsq.employee_status=1 and temphmq.employee_has_place_status=1
        and tspm.sales_order_status = 1
        and tsopm.type_sale = 'Warrenty'
        and tsopm.id_products ='$id_product' {$dates} {$phical}
group by tsopm.id_products
";
        
        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        if (count($mod_select) > 0) {
            return $mod_select[0]['waranty'];
        } else {
            return 0;
        }
    }

    public function get_retun_qty($id_product, $id_pyhscal_place, $date_1 = '', $date_2 = '', $it_salesrep = '') {

        $phical = '';

        if ($id_pyhscal_place != 0) {
            $phical = 'and tsp.id_employee_has_place in (select 
            temp_pl.id_employee_has_place
        from
            tbl_employee_has_place temp_pl
                inner join
            tbl_employee tem ON temp_pl.id_employee = tem.id_employee
        where
            temp_pl.employee_has_place_status = 1
                and tem.employee_status = 1
                and tem.id_employee_type in (2 , 3)
                and temp_pl.id_physical_place = "' . $id_pyhscal_place . '")';
        }

        $dates = '';
        if ($date_1) {
            $dates = "and tsp.added_date between '$date_1' and '$date_2'";
        }

        $sql = "select 
    trnp.id_products,
    ifnull(sum(trnp.return_product_qty), 0.00) as qty_return,trnp.id_return_type
from
    tbl_sales_order tsp
        inner join
    tbl_return_note trn ON tsp.id_sales_order = trn.id_sales_order
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
    inner join tbl_employee_has_place temphmq on tsp.id_employee_has_place = temphmq.id_employee_has_place
    inner join tbl_employee temsq on temsq.id_employee = temphmq.id_employee
where
    tsp.sales_order_status = 1
        and trn.return_note_status = 1 and temsq.employee_status=1 and temphmq.employee_has_place_status=1
        and trnp.return_product_status = 1
and trnp.id_products = '$id_product' {$dates} {$phical} group by trnp.id_products,trnp.id_return_type order by trnp.id_return_type asc";

        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        return $mod_select;
    }

}

?>
