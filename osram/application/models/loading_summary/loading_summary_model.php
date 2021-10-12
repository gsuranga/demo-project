<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loading_summary_model
 *
 * @author Thilina
 */
class loading_summary_model extends C_Model {

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
    public function get_summeryDetails() {
        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        $date = $_POST['date'];
        $append = '';
        $dis_phy = '';
        if ($userdata == "Distributor") {
            $append .= " and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$id_physical_place'
        and te.employee_status = 1)";
        }
        if (isset($_POST['dis_phy']) && $_POST['dis_phy'] != '') {
            $dis_phy = $_POST['dis_phy'];
            $append .=" and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$dis_phy'
        and te.employee_status = 1)
";
        }

        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "        and so.id_employee_has_place in (select 
            ehp.id_employee_has_place
        from
            tbl_employee_has_place ehp
                inner join
            tbl_employee te ON ehp.id_employee = te.id_employee
        where
            ehp.id_physical_place in ( select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')
                and te.employee_status = 1)";
        }

         $sql = "select 
    ti.id_item,
    ti.item_name,
    ti.item_account_code,
    count(inv.id_invoice) as count,
    inv.added_date,
sop.product_price ,
ifnull(sum((select 
            (sop1.product_qty)
        from
            tbl_sales_order_products sop1
        where
            sop1.id_sales_order_products = sop.id_sales_order_products
                and sop1.product_price != 0
)),0) as sales_qty,
ifnull(sum((select 
            (sop1.product_qty)
        from
            tbl_sales_order_products sop1
        where
            sop1.id_sales_order_products = sop.id_sales_order_products
                and sop1.product_price = 0
				and sop1.type_sale !='Warrenty'
)),0) as free_qty,
ifnull(sum((select 
            (sop1.product_qty)
        from
            tbl_sales_order_products sop1
        where
            sop1.id_sales_order_products = sop.id_sales_order_products
                and sop1.product_price = 0
				and sop1.type_sale ='Warrenty'
)),0) as wr_qty
from
    tbl_item ti
        inner join
    tbl_products tp ON ti.id_item = tp.iditem
        inner join
    tbl_sales_order_products sop ON tp.id_products = sop.id_products
        inner join
    tbl_sales_order so ON sop.id_sales_order = so.id_sales_order
        inner join
    tbl_invoice inv ON so.id_sales_order = inv.id_sales_order
where
		ti.item_status = 1
			and inv.added_date = '$date'
                            {$append}
group by ti.id_item
";
        return $result = $this->db->mod_select($sql);
    }

    public function get_disName($q, $select) {
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

    function get_summeryDetails1() {
        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        $append = '';
        $dis_phy = '';
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "        and so.id_employee_has_place in (select 
            ehp.id_employee_has_place
        from
            tbl_employee_has_place ehp
                inner join
            tbl_employee te ON ehp.id_employee = te.id_employee
        where
            ehp.id_physical_place in ( select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')
                and te.employee_status = 1)";
        }
        if ($userdata == "Distributor") {
            $append .= " and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$id_physical_place'
        and te.employee_status = 1)";
        }
        if (isset($_POST['dis_phy']) && $_POST['dis_phy'] != '') {
            $dis_phy = $_POST['dis_phy'];
            $append .=" and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$dis_phy'
        and te.employee_status = 1)
";
        }
        
        if(isset($_POST['brand_type']) && $_POST['brand_type']!=0 && $_POST['brand_type']!=''){
            $brand_id=$_POST['brand_type'];
            $append .=" and tib.item_brand_id=$brand_id";
        }
        if(isset($_POST['category_type']) && $_POST['category_type']!=0 && $_POST['category_type']!=''){
            $category_type=$_POST['category_type'];
            $append .=" and tic.id_item_category=$category_type";
        }
        if(isset($_POST['it_item_name']) && $_POST['it_item_name']!=0 && $_POST['it_item_name']!=''){
            $it_item_name=$_POST['it_item_name'];
            $append .=" and tp.id_products=$it_item_name";
        }
        if(isset($_POST['date']) && $_POST['date']!=0 && $_POST['date']!=''){
            $date = $_POST['date'];
            $append .="  and inv.added_date = '$date'";
        }
        $sql = "select 
    tem.id_item,
    tem.id_products,
    tem.item_name,
    tem.item_account_code
from
    (select 
        ti.id_item,
            tp.id_products,
            ti.item_name,
            ti.item_account_code,
            tib.item_brand_id,
            tic.id_item_category
    from
       tbl_item_brand tib
    inner join tbl_item_category tic ON tib.item_brand_id = tic.id_brand
    inner join tbl_item ti ON tic.id_item_category = ti.id_item_category
    inner join tbl_products tp ON ti.id_item = tp.iditem
    inner join tbl_sales_order_products tsop ON tp.id_products = tsop.id_products
    inner join tbl_sales_order so ON tsop.id_sales_order = so.id_sales_order
    inner join tbl_invoice inv ON so.id_sales_order = inv.id_sales_order
    where
        ti.item_status = 1
           
        {$append}
            and so.sales_order_status = 1 union select 
        ti.id_item,
            tp.id_products,
            ti.item_name,
            ti.item_account_code,
            tib.item_brand_id,
            tic.id_item_category
    from
         tbl_item_brand tib
    inner join tbl_item_category tic ON tib.item_brand_id = tic.id_brand
    inner join tbl_item ti ON tic.id_item_category = ti.id_item_category
    inner join tbl_products tp ON ti.id_item = tp.iditem
    inner join tbl_return_note_product rnp ON tp.id_products = rnp.id_products
    inner join tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
    inner join tbl_sales_order so ON rn.id_sales_order = so.id_sales_order
    inner join tbl_invoice inv ON inv.id_sales_order = so.id_sales_order
    where
        ti.item_status = 1
        {$append}
            ) as tem
                
group by tem.id_item
";
        return $result = $this->db->mod_select($sql);
    }

    function get_ProductDetails($id, $date, $phy_id) {
        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        $append = '';
        $dis_phy = '';
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "        and so.id_employee_has_place in (select 
            ehp.id_employee_has_place
        from
            tbl_employee_has_place ehp
                inner join
            tbl_employee te ON ehp.id_employee = te.id_employee
        where
            ehp.id_physical_place in ( select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')
                and te.employee_status = 1)";
        }
        if ($userdata == "Distributor") {
            $append .= " and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$id_physical_place'
        and te.employee_status = 1)";
        }
        if (isset($phy_id) && $phy_id != '') {
            $append .=" and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$phy_id'
        and te.employee_status = 1)
";
        }
        $sql = "select 
sop.id_products,
    ifnull(count(inv.id_invoice),0) as count,
    inv.added_date,
    sop.product_price,
    ifnull(sum((select 
                    (sop1.product_qty)
                from
                    tbl_sales_order_products sop1
                where
                    sop1.id_sales_order_products = sop.id_sales_order_products
                        and sop1.product_price != 0)),
            0) as sales_qty,
    ifnull(sum((select 
                    (sop1.product_qty)
                from
                    tbl_sales_order_products sop1
                where
                    sop1.id_sales_order_products = sop.id_sales_order_products
                        and sop1.product_price = 0
                        and sop1.type_sale != 'Warrenty')),
            0) as free_qty,
    ifnull(sum((select 
                    (sop1.product_qty)
                from
                    tbl_sales_order_products sop1
                where
                    sop1.id_sales_order_products = sop.id_sales_order_products
                        and sop1.product_price = 0
                        and sop1.type_sale = 'Warrenty')),
            0) as wr_qty
from
    tbl_sales_order_products sop
        inner join
    tbl_sales_order so ON sop.id_sales_order = so.id_sales_order
        inner join
    tbl_invoice inv ON so.id_sales_order = inv.id_sales_order
where
    so.sales_order_status=1
	and inv.invoice_status=1
and sop.id_products=$id
and inv.added_date='$date'
    {$append}
group by sop.id_products";
        return $this->db->mod_select($sql);
    }

    function getProdcutReturns($id, $date, $phy_id) {

        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        $append = '';
        $dis_phy = '';
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "        and so.id_employee_has_place in (select 
            ehp.id_employee_has_place
        from
            tbl_employee_has_place ehp
                inner join
            tbl_employee te ON ehp.id_employee = te.id_employee
        where
            ehp.id_physical_place in ( select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')
                and te.employee_status = 1)";
        }
        if ($userdata == "Distributor") {
            $append .= " and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$id_physical_place'
        and te.employee_status = 1)";
        }
        if (isset($phy_id) && $phy_id != '') {
            $append .=" and so.id_employee_has_place in(select 
    ehp.id_employee_has_place
from
    tbl_employee_has_place ehp
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
where
    ehp.id_physical_place = '$phy_id'
        and te.employee_status = 1)
";
        }
         $sql = "select 
    ifnull((select 
            sum(rnp1.return_product_qty)
        from
            tbl_return_note_product rnp1
        where
            rnp1.id_return_type = 1
                and rnp1.id_return_note = rn.id_return_note),0) as s_return,
    ifnull((select 
            sum(rnp1.return_product_qty)
        from
            tbl_return_note_product rnp1
        where
            rnp1.id_return_type = 2
                and rnp1.id_return_note = rn.id_return_note),0) as m_return,
    tp.id_products
from
    tbl_products tp
        inner join
    tbl_return_note_product rnp ON tp.id_products = rnp.id_products
        inner join
    tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
        inner join
    tbl_sales_order so ON rn.id_sales_order = so.id_sales_order
        right join
    tbl_invoice inv ON so.id_sales_order = inv.id_sales_order
where
    so.sales_order_status = 1
        and rnp.id_products = $id
        and inv.invoice_status = 1
        and inv.added_date = '$date'
            {$append}
group by tp.id_products
";
        return $this->db->mod_select($sql);
    }
    function get_items_names() {
        $id_catogory=$_POST['id_item_category'];
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
        and ti.id_item_category = $id_catogory  order by ti.item_name asc";
        $mod_select = $this->db->mod_select($sql, array(), PDO::FETCH_ASSOC);
        return $mod_select;
    }

}
