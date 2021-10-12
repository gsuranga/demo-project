<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of foc_model
 *
 * @author Thilina
 */
class foc_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_foc() {
        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee_has_place');
        $id_physical_place = $this->session->userdata('id_physical_place');
        if ($userdata == "Distributor") {
            $append .= " and ehp.id_physical_place='$id_physical_place'";
        }
        if ($userdata == "Sales Rep") {
            $append .= " and ehp.id_employee_has_place='$id_employee'";
        }
        
        if (isset($_POST['emp_has']) && $_POST['emp_has'] !="") {            
            $emp_type=$_POST['emp_type'];
           
            if ($emp_type=="2") {
               $emp_phy=$_POST['emp_phy'];
               $query_append .=" and ehp.id_physical_place=$emp_phy"; 
            }  else {
                $emp_has=$_POST['emp_has'];
                $query_append .=" and ehp.id_employee_has_place=$emp_has"; 
            }            
        }
        if (isset($_POST['id_item']) && $_POST['id_item'] !="") {            
            $id_item=$_POST['id_item'];
           $query_append .=" and ti.id_item=$id_item"; 
                     
        }
        if (isset($_POST['id_Outlet']) && $_POST['id_Outlet'] !="") {            
            $id_Outlet=$_POST['id_Outlet'];
           $query_append .=" and tout.id_outlet=$id_Outlet";         
        }
        if (isset($_POST['from']) && $_POST['from'] !="" && isset($_POST['to']) && $_POST['to'] !="") {            
            $from=$_POST['from'];
            $to=$_POST['to'];
            $query_append .=" and wr.date between '$from' and '$to'";         
        }


         $sql = "select 
    wr.warrenty_return_id,
    wrt.warrenty_return_type as reason,
    wr.quantity,
    wr.sales_id,
    wr.serial_no,
    tout.outlet_name,
    wr.date,
    wr.time,
    ti.item_name,
    ti.item_account_code,
    ti.id_item,
    concat(em.employee_first_name,' ', em.employee_last_name ) as full_name,
wr.accept_wr_status,
ehp.id_employee_has_place
from
    tbl_item ti
        inner join
    tbl_products tp ON ti.id_item = tp.iditem
        inner join
    warrenty_return wr ON tp.id_products = wr.item_id
        inner join
    tbl_outlet tout ON wr.outlet_id = tout.id_outlet
        inner join
    tbl_employee_has_place ehp ON wr.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_employee em on ehp.id_employee=em.id_employee
    inner join
warrenty_return_type wrt on wr.reason=wrt.id
    where
    wr.warrenty_return_status=1
     {$query_append} {$append}
order by wr.warrenty_return_id desc

";
        return $result = $this->db->mod_select($sql);
    }
    
    
    public function get_free() {
                $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee_has_place');
        $id_physical_place = $this->session->userdata('id_physical_place');
        if ($userdata == "Distributor") {
            $append .= " and ehp.id_physical_place='$id_physical_place'";
        }
        if ($userdata == "Sales Rep") {
            $append .= " and ehp.id_employee_has_place='$id_employee'";
        }
        
        if (isset($_POST['emp_has']) && $_POST['emp_has'] !="") {            
            $emp_type=$_POST['emp_type'];
           
            if ($emp_type=="2") {
               $emp_phy=$_POST['emp_phy'];
               $query_append .=" and ehp.id_physical_place=$emp_phy"; 
            }  else {
                $emp_has=$_POST['emp_has'];
                $query_append .=" and ehp.id_employee_has_place=$emp_has"; 
            }            
        }
        if (isset($_POST['id_item']) && $_POST['id_item'] !="") {            
            $id_item=$_POST['id_item'];
           $query_append .=" and ti.id_item=$id_item"; 
                     
        }
        if (isset($_POST['id_Outlet']) && $_POST['id_Outlet'] !="") {            
            $id_Outlet=$_POST['id_Outlet'];
           $query_append .=" and tout.id_outlet=$id_Outlet";         
        }
        if (isset($_POST['from']) && $_POST['from'] !="" && isset($_POST['to']) && $_POST['to'] !="") {            
            $from=$_POST['from'];
            $to=$_POST['to'];
            $query_append .=" and tbl_sales_order.added_date between '$from' and '$to'";         
        }
        $sql="select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as emp_name,
    tso.id_sales_order,
    ti.id_item,
    ti.item_account_code,
    ti.item_name,
    ti.item_no,
    tso.product_qty as free_issue_qty,
    tso.product_price,
    tso.free_qty,
    tso.discount,
    tbl_sales_order.added_date,
    tbl_sales_order.added_time,
tout.outlet_name,
tso.type_sale
FROM
    tbl_outlet tout
        inner join
    tbl_outlet_has_branch ohb on tout.id_outlet=ohb.id_outlet
        inner join
    tbl_sales_order ON ohb.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        right join
    tbl_sales_order_products tso ON tbl_sales_order.id_sales_order = tso.id_sales_order
        inner join
    tbl_products tp ON tso.id_products = tp.id_products
        inner join
    tbl_item ti ON tp.iditem = ti.id_item
        inner join
    tbl_employee_has_place ehp ON tbl_sales_order.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_employee te ON te.id_employee = ehp.id_employee
where
    tso.sales_order_products_status = 1
        and tbl_sales_order.sales_order_status = 1
        and tso.product_price = '0'
        {$query_append} {$append}
order by tso.id_sales_order_products desc        
";
        return $result = $this->db->mod_select($sql);
    }

    public function warrenty_accept() {
//        $id=$_POST['warrenty_id'];
        $this->db->__beginTransaction();
        foreach ($_POST['warrenty_id'] as $value) {

            $sql = "select 
    ts.qty, ts.id_products, ts.id_store
from
    tbl_item ti
        inner join
    tbl_products tp ON ti.id_item = tp.iditem
        inner join
    tbl_stock ts ON tp.id_products = ts.id_products
        inner join
    tbl_store tsr ON ts.id_store = tsr.id_store
        inner join
    tbl_physical_place phy ON tsr.id_physical_place = phy.id_physical_place
        inner join
    tbl_employee_has_place ehp ON phy.id_physical_place = ehp.id_physical_place
where
    ts.stock_status = 1
        and ti.id_item = {$value['id_item']}
and ehp.id_employee_has_place={$value['emp_has']}";
            $qty = $this->db->mod_select($sql);
            foreach ($qty as $data) {
                 $available_qty = $data->qty;
//                echo "</br>";
                 $store = $data->id_store;
                 $id_products = $data->id_products;
            }
            if ($available_qty >0) {
                echo 'ok';
                $w_id = $value['warr_id'];
                $data = array(
                    "accept_wr_status" => 1
                );
                $where = array(
                    "warrenty_return_id" => $w_id
                );
                $this->db->update("warrenty_return", $data, $where);
                
                
                $tot_qty = $available_qty - $value['item_qty'];
                $data1 = array(
                    "qty" => $tot_qty
                );
                $where1 = array(
                    "id_store" => $store,
                    "id_products" => $id_products
                );
//                print_r($where1);
                echo '</br>';
//                print_r($data1);
                $this->db->update("tbl_stock", $data1, $where1);
           $this->db->__endTransaction();
        return $this->db->status();
                }  else {
                echo 'not_inodhd qty';
            }
        }
        
    }
    public function search_empName($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee_has_place');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $query_append='';
        if ($userdata == "Distributor") {
            $query_append .= "and ehp.id_physical_place='$id_physical_place'";
        }
        $sql="select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as ful_name,
    te.id_employee_type,
ehp.id_employee_has_place,
ehp.id_physical_place
from
    tbl_employee te
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
where
te.employee_status
and te.id_employee_type in(2,3)
and concat(te.employee_first_name,
            ' ',
            te.employee_last_name) like '%$q%' 
        {$query_append}     
";
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
    public function search_item($q, $select) {
        $sql="select 
    te.item_name, te.id_item
from
    tbl_item te
        inner join
    tbl_products tp ON te.id_item = tp.iditem

where
    te.item_status = 1
and tp.product_status=1
and te.item_name like '%$q%'";
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
    public function search_Outlet($q, $select) {
        $sql="select 
    tout.id_outlet,
tout.outlet_name
from
    tbl_outlet tout
where
tout.outlet_status=1
and  tout.outlet_name like '%$q%'";
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

