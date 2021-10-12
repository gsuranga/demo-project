<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diswise_timereport_model
 *
 * @author Thilina
 */
class diswise_timereport_model extends C_Model{
    public function __construct() {
        parent::__construct();
    }
      public function timeReport() {
        $appendLast = '';
        if (isset($_REQUEST['time_report_employee_id']) && $_REQUEST['time_report_employee_id'] != null) {
            $emp = $_REQUEST['time_report_employee_id'];
            $append .= "and em.id_employee='$emp' ";
        }

        if (isset($_REQUEST['start_order_date']) && $_REQUEST['start_order_date'] != null) {
            $dateOne = $_REQUEST['start_order_date'];

            $appendLast .= "and so1.added_date = '$dateOne'";
            $appendLast1 .= "and so.added_date= '$dateOne'";
            $appendLast2 .= "where so.added_date ='$dateOne'";
        }

		$userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        
        
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
		

        $sql = "select 
    concat(em.employee_first_name,
            ' ',
            em.employee_last_name) as full_name,
        em.id_employee,
    (select 
            ou1.outlet_name
        from
            tbl_sales_order so1
                inner join
            tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
                inner join
            tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
        where
            so1.id_employee_has_place = ehp.id_employee_has_place
         and ou1.outlet_status = 1
                and so1.sales_order_status = 1
                {$appendLast}
        order by so1.id_sales_order asc
        limit 1) as firstoutlet,
    @ft:=(select 
             so1.added_time
        from
            tbl_sales_order so1
                inner join
            tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
                inner join
            tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
        where
            so1.id_employee_has_place = ehp.id_employee_has_place
                 and ou1.outlet_status = 1
                and so1.sales_order_status = 1
                 {$appendLast}
        order by so1.id_sales_order asc
        limit 1) as firstoutlettime,
    (select 
            ou1.outlet_name
        from
            tbl_sales_order so1
                inner join
            tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
                inner join
            tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
        where
            so1.id_employee_has_place = ehp.id_employee_has_place
                  and ou1.outlet_status = 1
                and so1.sales_order_status = 1
                 {$appendLast}
        order by so1.id_sales_order desc
        limit 1) as lastoutlet,
    (select 
            concat(so1.added_date, '/', so1.added_time)
        from
            tbl_sales_order so1
                inner join
            tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
                inner join
            tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
        where
            so1.id_employee_has_place = ehp.id_employee_has_place
                  and ou1.outlet_status = 1
                and so1.sales_order_status = 1
                {$appendLast}
        order by so1.id_sales_order desc
        limit 1) as lastoutletdatetime,
 @lt:=(select 
          so1.added_time
        from
            tbl_sales_order so1
                inner join
            tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
                inner join
            tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
        where
            so1.id_employee_has_place = ehp.id_employee_has_place
                 and ou1.outlet_status = 1
                and so1.sales_order_status = 1
                 {$appendLast}
        order by so1.id_sales_order desc
        limit 1) as lastoutlettime,
(TIMEDIFF(@ft,@lt))as timediff,
    ou.outlet_name,
sum((sop.product_price * sop.product_qty)) as tot,
            count(distinct so.id_sales_order)as count
from
    tbl_sales_order so
        inner join
    tbl_outlet_has_branch ohb ON so.id_outlet_has_branch = ohb.id_outlet_has_branch
        inner join
    tbl_outlet ou ON ohb.id_outlet = ou.id_outlet
        inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_employee em ON ehp.id_employee = em.id_employee
        inner join
    tbl_sales_order_products sop ON so.id_sales_order = sop.id_sales_order
    inner join
    tbl_employee_type tet ON em.id_employee_type = tet.id_employee_type
 {$append}
    where
ou.outlet_status = 1 and sop.sales_order_products_status =1
and so.sales_order_status=1
and tet.employee_type='Distributor'
{$appendLast1} {$query_append}
group by em.id_employee
        ";


        // echo $sql;
        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['fulname'] = $row['full_name'];
            $subJson['id_employee'] = $row['id_employee'];
            $subJson['firstoutlet'] = $row['firstoutlet'];
            $subJson['firstoutlettime'] = $row['firstoutlettime'];
            $subJson['lastoutlet'] = $row['lastoutlet'];
            $subJson['lastoutlettime'] = $row['lastoutlettime'];
            $subJson['tot'] = $row['tot'];
            $subJson['bill_value'] = $row['bill_value'];
            $subJson['count'] = $row['count'];
            $subJson['timediff'] = $row['timediff'];
            $subJson['last_order_outlet'] = $row['last_order_outlet'];
            $subJson['full_name'] = $row['full_name'];
            $subJson['ladded_timestamp'] = $row['ladded_timestamp'];
            $subJson['fadded_timestamp'] = $row['fadded_timestamp'];
            $subJson['hours'] = $row['hours'];
            array_push($json_array['report'], $subJson);
        }

        $productMovementReportJson = json_encode($json_array);
        return $productMovementReportJson;
    }
    
    public function search_by_time_report_employee($q, $select) {
	    $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        
        
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
        $sql = "select 
    
	
    tbl_employee_has_place.id_employee,
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
    
	
from
    tbl_sales_order,
    tbl_employee_has_place,
    tbl_employee,
    tbl_employee_type
where
    tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee and concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) like '%$q%' {$query_append}
	and tbl_employee.id_employee_type= tbl_employee_type.id_employee_type
and tbl_employee_type.employee_type='Distributor'
group by tbl_sales_order.id_employee_has_place";
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
