<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brandWisereport_model
 *
 * @author Thilina
 */
class brandwisereport_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getSalesItemWises() {
        $userdata = $this->session->userdata('user_type');
        $physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $append = '';
        $query_append = '';
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $apeend = '';
        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $apeend = "AND tbl_sales_order_products.id_products='$iIdHidden'";
        }

        if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != '') {

            $iIdempid = $_REQUEST['employee_id'];
            $apeend1 = "AND tbl_sales_order.id_employee_has_place in(select id_employee_has_place from tbl_employee_has_place where id_physical_place in(SELECT `id_physical_place` FROM tbl_employee_has_place WHERE `id_employee_has_place` like '$iIdempid%'))";
        }

        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];



            if ($txt_st_date != '' && $txt_en_date != '') {
                $query_append .= "AND tbl_sales_order_products.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }

        if (isset($_REQUEST['txt_terid']) && $_REQUEST['txt_terid'] != '') {

            $txt_terid = $_REQUEST['txt_terid'];
            $apeend2 = "AND tbl_outlet_has_branch.id_territory = '$txt_terid'";
        }

    
        if (isset($_REQUEST['txt_division']) && $_REQUEST['txt_division'] != '') {
            $txt_division = $_REQUEST['txt_division'];
            $division = "AND tbl_item.id_division= '$txt_division'";
        }
       

        if (isset($_REQUEST['bId']) && $_REQUEST['bId'] != '') {
            $txt_brand_id = $_REQUEST['bId'];
            $brand= "and tbl_item.item_brand_id= '$txt_brand_id'";
        }
//        
        $sql = "SELECT COUNT(tbl_sales_order.id_sales_order) as no_of_sales ,tbl_item.item_name,tbl_item.item_no,tbl_sales_order_products.id_products,tbl_sales_order.id_employee_has_place ,SUM(tbl_sales_order_products.product_qty) as sales_qty, SUM(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price ) as total_sales, tbl_outlet_has_branch.id_territory,
	tbl_item_brand.item_brand_id,
	tbl_item_brand.brand_name

FROM tbl_employee_has_place
	inner join
    tbl_sales_order tbl_sales_order on tbl_employee_has_place.id_employee_has_place= tbl_sales_order.id_employee_has_place
        INNER JOIN
    tbl_sales_order_products tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
        INNER JOIN
    tbl_products tbl_products ON tbl_products.id_products = tbl_sales_order_products.id_products
        INNER JOIN
    tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
        inner join
    tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_item_brand ON tbl_item.item_brand_id = tbl_item_brand.item_brand_id
WHERE tbl_sales_order.sales_order_status =:sales_order_status {$apeend} {$division} {$apeend1} {$query_append} {$apeend2} {$brand}
            GROUP BY tbl_sales_order_products.id_products";
//        echo $sql;
        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getProdcutDetails($product_id) {
        $column = array('id_products' => $product_id);
        $sql = "SELECT tbl_item.id_item,tbl_item.item_no,tbl_item.item_account_code
            ,tbl_item.item_name,tib.brand_name,tbl_item.item_brand_id 
            FROM tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem  
            inner join tbl_item_brand tib ON tbl_item.item_brand_id = tib.item_brand_id
            WHERE tbl_products.id_products=:id_products";

        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getsalesReturnItemWises() {
        $userdata = $this->session->userdata('user_type');
        $physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

		        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and ehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $append = '';

        if ($userdata == "Distributor") {
            $append .= "and ehp.id_physical_place='$physical_place'";
        }

        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $append .= " and tbl_return_note_product.id_products='$iIdHidden'";
        }

        if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != '') {
            $iIdempid = $_REQUEST['employee_id'];
            $append .= " and ehp.id_physical_place = '$iIdempid'";
        }
        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];

            if ($txt_st_date != '' && $txt_en_date != '') {
                $append .= " AND tbl_return_note_product.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }

        if (isset($_REQUEST['txt_terid']) && $_REQUEST['txt_terid'] != '') {

            $txt_terid = $_REQUEST['txt_terid'];
            $append .= " AND tbl_outlet_has_branch.id_territory = '$txt_terid'";
        }
        //============widuranga============start======
        if (isset($_REQUEST['txt_division']) && $_REQUEST['txt_division'] != '') {
            $txt_division = $_REQUEST['txt_division'];
            $append = " AND tbl_item.id_division= '$txt_division'";
        }
        //============widuranga============end======

            if (isset($_REQUEST['bId']) && $_REQUEST['bId'] != '') {
            $txt_brand_id = $_REQUEST['bId'];
            $brand= "and tbl_item.item_brand_id= '$txt_brand_id'";
        }
        
        $sql = "SELECT 
    tbl_item.item_name,
    tbl_item.item_no,
    tbl_return_note_product.id_products,
    tbl_sales_order.id_employee_has_place,
    SUM(tbl_return_note_product.return_product_qty) as salesrr_qty,
    SUM(tbl_return_note_product.return_product_qty * tbl_return_note_product.return_price) as sr_return,
    tbl_outlet_has_branch.id_territory
FROM
    tbl_sales_order tbl_sales_order
        right JOIN
    tbl_return_note tbl_return_note ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order
        INNER JOIN
    tbl_return_note_product tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        INNER JOIN
    tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        INNER JOIN
    tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_employee_has_place ehp ON tbl_return_note.id_employee_has_place = ehp.id_employee_has_place
WHERE
    tbl_return_note_product.id_return_type = 1  {$append} {$brand} {$query_append}
       
GROUP BY tbl_return_note_product.id_products";
// echo $sql;
        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getSalesMarketItemWises() {


        $userdata = $this->session->userdata('user_type');
        $physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

		        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and ehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $append = '';

        if ($userdata == "Distributor") {
            $append .= "and ehp.id_physical_place='$physical_place'";
        }

        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $append .= " and tbl_return_note_product.id_products='$iIdHidden'";
        }
        if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != '') {
            $iIdempid = $_REQUEST['employee_id'];
            $append .= " and ehp.id_physical_place = '$iIdempid'";
        }
        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];

            if ($txt_st_date != '' && $txt_en_date != '') {
                $append .= " AND tbl_return_note_product.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }

        if (isset($_REQUEST['txt_terid']) && $_REQUEST['txt_terid'] != '') {

            $txt_terid = $_REQUEST['txt_terid'];
            $append .= " AND tbl_outlet_has_branch.id_territory = '$txt_terid'";
        }

        //============widuranga============start======
        if (isset($_REQUEST['txt_division']) && $_REQUEST['txt_division'] != '') {
            $txt_division = $_REQUEST['txt_division'];
            $append .= " AND tbl_item.id_division= '$txt_division'";
        }
        //============widuranga============end======
//        echo $append;
           if (isset($_REQUEST['bId']) && $_REQUEST['bId'] != '') {
            $txt_brand_id = $_REQUEST['bId'];
            $brand= "and tbl_item.item_brand_id= '$txt_brand_id'";
        }
        
        

        $sql = "SELECT 
    tbl_item.item_name,
    tbl_item.item_no,
    tbl_return_note_product.id_products,
    tbl_sales_order.id_employee_has_place,
    SUM(tbl_return_note_product.return_product_qty) as salesrr_qty,
    SUM(tbl_return_note_product.return_product_qty * tbl_return_note_product.return_price) as sr_return,
    tbl_outlet_has_branch.id_territory
FROM
    tbl_sales_order tbl_sales_order
        right JOIN
    tbl_return_note tbl_return_note ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order
        INNER JOIN
    tbl_return_note_product tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        INNER JOIN
    tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        INNER JOIN
    tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_employee_has_place ehp ON tbl_return_note.id_employee_has_place = ehp.id_employee_has_place
WHERE
    tbl_return_note_product.id_return_type = 2  {$append} {$brand} {$query_append}
       
GROUP BY tbl_return_note_product.id_products";

//echo $sql;

        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }
    public function getSlaesQtys($product_id, $id_physical) {

//        $sql = "SELECT SUM(product_qty) as sales_qty,SUM(product_qty * product_price) as sles_tot FROM `tbl_sales_order_products` WHERE id_products=:id_products GROUP BY id_products";

        $append = "";
        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];
            if ($txt_st_date != '' && $txt_en_date != '') {
                $query_append .= "AND tso.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }
        if (isset($id_physical) && $id_physical != "") {

            $appdend = " and ehp.id_physical_place ='$id_physical'";
        }
        $userdata = $this->session->userdata('user_type');
	$id_employeeHas = $this->session->userdata('id_employee_has_place');
        $appdend .= '';

		        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and ehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }


        $sql = "SELECT 
    SUM(tsop.product_qty) as sales_qty,
    SUM(tsop.product_qty * tsop.product_price) as sles_tot
FROM
    tbl_sales_order tso
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
        inner join
    tbl_employee_has_place ehp ON ehp.id_employee_has_place = tso.id_employee_has_place
WHERE
    id_products = '$product_id'
        and tso.sales_order_status = 1
        and tsop.product_price != '0'
        {$appdend} {$query_append}
GROUP BY id_products";

        $query = $this->db->query($sql);
        $result = $query->result('array');

        return $result;
    }
        public function getReturnQtys($product_id, $return_type) {        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $physical_place = $this->session->userdata('id_physical_place');
        
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User" ) {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
    if ($userdata == "Distributor") {
        $query_append .= "and tbl_employee_has_place.id_physical_place = '$physical_place' ";
    }
        
        $column = array('id_products' => $product_id, 'id_return_type' => $return_type);
        $sql = "SELECT SUM(return_product_qty) as return_qty,SUM(return_price * return_product_qty) as return_tot FROM `tbl_return_note_product`
        inner join
    tbl_return_note on tbl_return_note_product.id_return_note= tbl_return_note.id_return_note
inner join
tbl_employee_has_place on tbl_return_note.id_employee_has_place= tbl_employee_has_place.id_employee_has_place
             WHERE id_products=:id_products AND id_return_type=:id_return_type and tbl_return_note.return_note_status=1
and tbl_return_note_product.return_product_status=1 {$query_append} GROUP BY id_products ";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }
        public function getItemNames($q, $select) {
        $sql = "SELECT distinct
    `tbl_item`.`item_name` ,tbl_item.id_item
FROM
    `tbl_sales_order_products`,
    `tbl_products`,
    `tbl_item`
WHERE
    `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
        AND `tbl_products`.`iditem` = `tbl_item`.`id_item` and `tbl_item`.`item_name` like '%$q%'
GROUP BY `tbl_item`.`item_name` , `tbl_sales_order_products`.`id_sales_order` ";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
        public function getEmployeNamesbyStores($q, $select) {
             $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
//        
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $sql = "SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee_has_place.id_physical_place,
    tbl_employee.id_employee,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
        INNER JOIN
    tbl_user tbl_user ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        INNER JOIN
    tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type
WHERE
    tbl_user_type.user_type = 'Distributor'
        AND employee_status = 1
        AND tbl_employee.employee_status = 1
        AND tbl_employee_has_place.employee_has_place_status = 1
        AND employee_first_name LIKE '%$q%' {$query_append}
GROUP BY tbl_employee_has_place.id_employee_has_place";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    function getBrandName($q, $select){
        $sql = "select distinct
    tib.item_brand_id, tib.brand_name
from
    tbl_item_brand tib
                inner join
    tbl_item ti on tib.item_brand_id= ti.item_brand_id
where
    tib.brand_staus = 1 
    and tib.brand_name like '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
}
