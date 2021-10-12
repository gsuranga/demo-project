<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of deleted_invoices_model
 *
 * @author Thilina
 */
class deleted_invoices_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
    public function view_deletedInvoices(){
        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
	$id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

        if($userdata == "Distributor"){
            $append .=" and ehp.id_physical_place=$id_physical_place ";
        }
        
    if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $append .= "and ehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        
        if (isset($_REQUEST['hasPlaceId']) && $_REQUEST['hasPlaceId'] != '') {
            if($_REQUEST['etype']==2){
                $phyId=$_REQUEST['phyId'];
               $append .=" and ehp.id_physical_place=$phyId ";
            }  else {
                $ehpId=$_REQUEST['hasPlaceId'];
                $append .=" and ehp.id_employee_has_place=$ehpId";
            }
        }
        if (isset($_REQUEST['outletId']) && $_REQUEST['outletId'] != '') {
           
                $outletId=$_REQUEST['outletId'];
               $append .="and tot.id_outlet=$outletId ";
            
        }
        $sql="select 
    ti.id_sales_order,
    ti.added_date,
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as full_name,
    sum(sop.product_price * sop.product_qty) as sales_amount,
    ifnull((select 
            sum(rnp.return_product_qty * rnp.return_price)
        from
            tbl_return_note_product rnp
                inner join
            tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
        where
            rn.id_sales_order = so.id_sales_order), 0) as returnmount,
tot.outlet_name,
ohb.branch_address
from
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
        inner join
    tbl_sales_order_products sop ON so.id_sales_order = sop.id_sales_order
        inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_employee te ON ehp.id_employee = te.id_employee
        inner join
    tbl_outlet_has_branch ohb ON so.id_outlet_has_branch = ohb.id_outlet_has_branch
inner join
tbl_outlet tot on ohb.id_outlet=tot.id_outlet
where
    so.sales_order_status = 0
        and sop.sales_order_products_status = 1
        {$append}
group by so.id_sales_order

";
        return $this->db->mod_select($sql);
    }
    public function getEmployeNames($q, $select){
              $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
	$id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

        if($userdata == "Distributor"){
            $append .=" and ehp.id_physical_place=$id_physical_place ";
        }
        
    if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $append .= "and ehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $sql="select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name)as full_name,
    ehp.id_employee_has_place,te.id_employee_type, ehp.id_physical_place
from
    tbl_employee te
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
where
te.employee_status=1
and te.id_employee_type in (3,2) and concat(te.employee_first_name,
            ' ',
            te.employee_last_name)like '%$q%' {$append} ";
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
    public function getOutletNames($q, $select){
       
        $sql="select 
    tou.outlet_name, tou.id_outlet
from
    tbl_outlet tou
        inner join
    tbl_outlet_has_branch ohb ON tou.id_outlet = ohb.id_outlet
        inner join
    tbl_sales_order so ON ohb.id_outlet_has_branch = so.id_outlet_has_branch
        inner join
    tbl_invoice ti on so.id_sales_order=ti.id_sales_order
where
    tou.outlet_status = 1
    and tou.outlet_name like '%$q%'
group by tou.id_outlet";
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
    public function view_deletedInvoicesDetalis(){
       $sql="";
       return $this->db->mod_select($sql);
    }
            
}
