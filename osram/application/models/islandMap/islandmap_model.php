<?php

/**
 * Jul 23, 2014 3:16:50 PM
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class islandmap_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    function getRep_invoice_Info() {
        $userdata = $this->session->userdata('user_type');
	$id_employeeHas = $this->session->userdata('id_employee_has_place');
         if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_append .= "and tehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $dt = date('Y-m-d'); //'2014-07-18'; 
        $t = date('H:i:s', strtotime('-1 hour')); // '11:00:20'; 
        $query = "select 
    (select 
            count(*)
        from
            (SELECT 
                1
            FROM
                tbl_sales_order tso
            inner join tbl_employee_has_place tehp ON tso.id_employee_has_place = tehp.id_employee_has_place
                and tso.sales_order_status = 1
                and tehp.employee_has_place_status = 1
                and tso.added_date = '$dt'
            inner join tbl_employee te ON te.id_employee = tehp.id_employee
                and te.id_employee_type = 3
                and te.employee_status = 1 {$query_append}
            group by tso.id_employee_has_place) as a) as working,
    (select 
            count(1)
        from
            (SELECT 
                1
            FROM
                tbl_sales_order tso
            inner join tbl_employee_has_place tehp ON tso.id_employee_has_place = tehp.id_employee_has_place
                and tso.sales_order_status = 1
                and tehp.employee_has_place_status = 1
                and tso.added_date = '$dt'
                and tso.added_time >= '$t'
            inner join tbl_employee te ON te.id_employee = tehp.id_employee
                and te.id_employee_type = 3
                and te.employee_status = 1
                {$query_append}
            group by tso.id_employee_has_place) as t) as lhour,
    (SELECT 
            count(*)
        FROM
           tbl_employee
                inner join
            tbl_employee_has_place tehp ON tbl_employee.id_employee = tehp.id_employee
        where
            id_employee_type = 3
            {$query_append}
) as allc";
        return $this->db->mod_select($query);
    }

    function getSalInfo() {
        $query = "select 
    sum(tsob.product_price * tsob.product_qty - ifnull((select 
                    sum(trnps.return_price * trnps.return_product_qty)
                from
                    tbl_sales_order tsos
                        left join
                    tbl_return_note trns ON tsos.id_sales_order = trns.id_sales_order
                        inner join
                    tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
                where
                    tsos.sales_order_status = 1
                        and tsos.id_sales_order = tso.id_sales_order),
            0)) as tot,
    count(tso.id_sales_order) cnt,
    (SELECT 
            count(1)
        FROM
            tbl_outlet_has_branch
        where
            outlet_has_branch_status = 1
                and id_territory = tohb.id_territory) as ocount,
    fkn.territory_name,
    fkn.id_territory,
    mp.left,
    mp.top,
    (select 
            count(1)
        from
            tbl_territory trc
        where
            trc.id_parent = fkn.id_territory) as repcnt
from
    tbl_sales_order tso
        inner join
    tbl_sales_order_products tsob ON tso.id_sales_order = tsob.id_sales_order
        and tso.sales_order_status = 1
        inner join
    tbl_invoice ti ON ti.id_sales_order = tso.id_sales_order
        inner join
    tbl_outlet_has_branch tohb ON tso.id_outlet_has_branch = tohb.id_outlet_has_branch
        inner join
    tbl_territory tt ON tohb.id_territory = tt.id_territory
        and tt.id_territory_type = 4
        inner join
    tbl_territory tp ON tt.id_parent = tp.id_territory
        inner join
    tbl_territory as fkn ON tp.id_parent = fkn.id_territory
        left join
    map_pos mp ON fkn.id_territory = mp.id_ter
group by fkn.id_territory"; //        and tso.added_date = '2014-07-18'
        return $this->db->mod_select($query);
    }

    function getReps() {
	$userdata = $this->session->userdata('user_type');
	$id_employeeHas = $this->session->userdata('id_employee_has_place');
    if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
   $query_apapend .= "and tehp.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
            }
        $query = "SELECT 
    te.id_employee,
    tt.id_territory,
    tt.territory_name,
    tt.id_territory_type,
    mp.left,
    mp.top,
    tehp.id_employee_has_place,
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as name
FROM
    tbl_employee te
        inner join
    tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
        inner join
    tbl_territory tt ON tt.id_territory = tehp.id_territory
        inner join
    map_pos mp ON tt.id_territory = mp.id_ter
where
    tt.territory_status = 1
        and te.id_employee_type = 3
        and te.employee_status = 1
		 {$query_apapend} ";
        return $this->db->mod_select($query);
    }

    function getRepStatus($tid, $typ) {
        $dt = date('Y-m-d'); //'2014-07-18'; 
        $query = "";
        switch ($typ) {
            case 3:
                $query = "select 
    sum(tsop.product_price * tsop.product_qty - ifnull((select 
                    sum(trnps.return_price * trnps.return_product_qty)
                from
                    tbl_sales_order tsos
                        left join
                    tbl_return_note trns ON tsos.id_sales_order = trns.id_sales_order
                        inner join
                    tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
                where
                    tsos.sales_order_status = 1
                        and tsos.id_sales_order = tso.id_sales_order),
            0)) as tot,
    count(distinct tso.id_sales_order) cnt,
    (select 
            count(1)
        from
            tbl_territory tt
                inner join
            tbl_outlet_has_branch tohb ON tt.id_territory = tohb.id_territory
        where
            tt.id_parent = $tid and tohb.outlet_has_branch_status=1) allols
from
    tbl_territory tt
        inner join
    tbl_outlet_has_branch tohb ON tt.id_territory = tohb.id_territory
        inner join
    tbl_sales_order tso ON tso.id_outlet_has_branch = tohb.id_outlet_has_branch
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
where
    tt.id_parent = $tid
        and tso.sales_order_status = 1 and tso.added_date='$dt'";
                break;
            case 4:
                $query = "select 
    sum(tsop.product_price * tsop.product_qty - ifnull((select 
                    sum(trnps.return_price * trnps.return_product_qty)
                from
                    tbl_sales_order tsos
                        left join
                    tbl_return_note trns ON tsos.id_sales_order = trns.id_sales_order
                        inner join
                    tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
                where
                    tsos.sales_order_status = 1
                        and tsos.id_sales_order = tso.id_sales_order),
            0)) as tot,
    count(distinct tso.id_sales_order) cnt,
    (select 
            count(1)
        from
            tbl_territory tt
                inner join
            tbl_outlet_has_branch tohb ON tt.id_territory = tohb.id_territory
        where
            tt.id_territory = $tid and tohb.outlet_has_branch_status=1) allols
from
    tbl_territory tt
        inner join
    tbl_outlet_has_branch tohb ON tt.id_territory = tohb.id_territory
        inner join
    tbl_sales_order tso ON tso.id_outlet_has_branch = tohb.id_outlet_has_branch
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
where
    tt.id_territory = $tid
        and tso.sales_order_status = 1 and tso.added_date='$dt'";
                break;
        }
        return $this->db->mod_select($query);
    }

    function lastHourStatus($eid) {
        $dt = date('Y-m-d'); //'2014-07-18'; 
        $t = date('H:i:s', strtotime('-1 hour')); // '11:00:20';
        $query = "SELECT 
    1
FROM
    tbl_sales_order
where
    added_date = '$dt'
        and added_time >= '$t'
        and id_employee_has_place = $eid";
        $r = $this->db->mod_select($query);
        return count($r);
    }

}
