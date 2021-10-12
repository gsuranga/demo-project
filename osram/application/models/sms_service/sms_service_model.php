<?php

/**
 * Description of sms_service_model
 *
 * @author Thilina
 */
class sms_service_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_firstLogin() {
        $date = date("Y-m-d");
        $sql = "select 
    a.sales_name, b.distributor_name,
    (select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as ful_name
from
    tbl_employee te
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
where
    te.employee_status = 1
        and ehp.id_employee_has_place in (select 
            ra.region_manager_emp_id
        from
            tbl_region_assign ra
                left join
            tbl_region_assign_details rad ON ra.region_assign_id = rad.region_assign_id
        where
            rad.distributor_emp_id = b.id_employee_has_place )
and te.id_employee_type=12)as regional_mng
from
    (select 
        te.id_employee,
            tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as sales_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Sales Rep'
            and te.employee_status = 1) as a
        left join
    (select 
        tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as distributor_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Distributor'
            and te.employee_status = 1) as b ON a.id_physical_place = b.id_physical_place
where
    a.id_employee not in (select 
            em.id_employee
        from
            tbl_gps_movement gm
                inner join
            tbl_employee_has_place ehp ON gm.id_employee_has_place = ehp.id_employee_has_place
                inner join
            tbl_employee em ON ehp.id_employee = em.id_employee
        where
            gm.status = 1
                and gm.added_date = '$date'
                and gm.added_time <= '08:00:00')";
        return $result = $this->db->mod_select($sql);
    }
//0715380403
    public function get_first_call() {
        $date = date("Y-m-d");
        $sql = "select 
    a.sales_name, b.distributor_name,
(select 
    concat(te.employee_first_name,
            ' ',
            te.employee_last_name) as ful_name
from
    tbl_employee te
        inner join
    tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
where
    te.employee_status = 1
        and ehp.id_employee_has_place in (select 
            ra.region_manager_emp_id
        from
            tbl_region_assign ra
                left join
            tbl_region_assign_details rad ON ra.region_assign_id = rad.region_assign_id
        where
            rad.distributor_emp_id = b.id_employee_has_place )
and te.id_employee_type=12)as regional_mng


from
    (select 
        te.id_employee,
            tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as sales_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Sales Rep'
            and te.employee_status = 1) as a
        left join
    (select 
        tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as distributor_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Distributor'
            and te.employee_status = 1) as b ON a.id_physical_place = b.id_physical_place
where
    a.id_employee not in (
select 
    tem.id_employee
from
    (select 
        so1.added_time, ehp1.id_employee, so1.added_date
    from
tbl_employee_has_place ehp1
inner join
        tbl_sales_order so1 on ehp1.id_employee_has_place=so1.id_employee_has_place
    inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
    inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
    where
        ou1.outlet_status = 1
            and so1.sales_order_status = 1 

union select 


        tun.added_time, ehp1.id_employee, tun.added_date
    from
tbl_employee_has_place ehp1
inner join
        tbl_unproduct tun on ehp1.id_employee_has_place=tun.id_employee_has_place
    inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
    inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
    where
        tu.outlet_status = 1) as tem
where
    tem.added_date = '$date'
and tem.added_time <='09:00:00'
group by tem.added_time
order by tem.added_time asc
)";
//        $sql = "select 
//    em.id_employee,
//    concat(em.employee_first_name,
//            ' ',
//            em.employee_last_name) as ful_name,
//    ehp.id_employee_has_place
//from
//    tbl_employee_has_place ehp
//        inner join
//    tbl_employee em ON ehp.id_employee = em.id_employee
//where
//em.employee_status=1
//and em.id_employee_type=3
//and ehp.id_employee_has_place not in(
//select 
//    tem.id_employee_has_place
//from
//    (select 
//        so1.added_time, so1.id_employee_has_place, so1.added_date
//    from
//        tbl_sales_order so1
//    inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
//    inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
//    where
//        ou1.outlet_status = 1
//            and so1.sales_order_status = 1 union select 
//        tun.added_time, tun.id_employee_has_place, tun.added_date
//    from
//        tbl_unproduct tun
//    inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
//    inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
//    where
//        tu.outlet_status = 1) as tem
//where
//    tem.added_date = '$date'
//and tem.added_time <='09:00:00'
//order by tem.added_time asc
//)";
        return $result = $this->db->mod_select($sql);
    }

    public function tab_idle() {
        $date = date("Y-m-d");
        $sql = "select 
    a.sales_name,
    b.distributor_name,
    (select 
            concat(te.employee_first_name,
                        ' ',
                        te.employee_last_name) as ful_name
        from
            tbl_employee te
                inner join
            tbl_employee_has_place ehp ON te.id_employee = ehp.id_employee
        where
            te.employee_status = 1
                and ehp.id_employee_has_place in (select 
                    ra.region_manager_emp_id
                from
                    tbl_region_assign ra
                        left join
                    tbl_region_assign_details rad ON ra.region_assign_id = rad.region_assign_id
                where
                    rad.distributor_emp_id = b.id_employee_has_place)
                and te.id_employee_type = 12) as regional_mng
from
    (select 
        te.id_employee,
            tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as sales_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Sales Rep'
            and te.employee_status = 1) as a
        left join
    (select 
        tehs.id_employee_has_place,
            tehs.id_physical_place,
            concat(te.employee_first_name, ' ', employee_last_name) as distributor_name
    from
        tbl_employee_has_place tehs
    left join tbl_employee as te ON tehs.id_employee = te.id_employee
    left join tbl_employee_type as tet ON te.id_employee_type = tet.id_employee_type
    where
        tet.employee_type = 'Distributor'
            and te.employee_status = 1) as b ON a.id_physical_place = b.id_physical_place
where
    a.id_employee not in (select 
            tem.id_employee
        from
            (select 
                so1.added_time, ehp1.id_employee , so1.added_date
            from
                tbl_employee_has_place ehp1
            inner join tbl_sales_order so1 ON ehp1.id_employee_has_place = so1.id_employee_has_place
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tun.added_time, ehp1.id_employee, tun.added_date
            from
                tbl_employee_has_place ehp1
            inner join tbl_unproduct tun ON ehp1.id_employee_has_place = tun.id_employee_has_place
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.added_date = '$date'
                and tem.added_time between (SELECT SUBTIME(curtime(), '01:00:00')) and curtime()
        group by tem.id_employee
        order by tem.added_time asc)";
//        $sql = "select 
//    em.id_employee,
//    concat(em.employee_first_name,
//            ' ',
//            em.employee_last_name) as ful_name,
//    ehp.id_employee_has_place
//from
//    tbl_employee_has_place ehp
//        inner join
//    tbl_employee em ON ehp.id_employee = em.id_employee
//where
//em.employee_status=1
//and em.id_employee_type=3
//and ehp.id_employee_has_place not in(
//select 
//    tem.id_employee_has_place
//from
//    (select 
//        so1.added_time, so1.id_employee_has_place, so1.added_date
//    from
//        tbl_sales_order so1
//    inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
//    inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
//    where
//        ou1.outlet_status = 1
//            and so1.sales_order_status = 1 union select 
//        tun.added_time, tun.id_employee_has_place, tun.added_date
//    from
//        tbl_unproduct tun
//    inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
//    inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
//    where
//        tu.outlet_status = 1) as tem
//where
//    tem.added_date = '$date'
// and tem.added_time between (SELECT SUBTIME(curtime(),'0:15:00')) and curtime()
//group by tem.id_employee_has_place
//order by tem.added_time asc
//
//
//)";
        return $result = $this->db->mod_select($sql);
    }

}
