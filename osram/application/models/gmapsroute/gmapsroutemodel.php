<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class gmapsroutemodel extends C_Controller {

//put your code here
    public function __construct() {
        parent::__construct();
    }

       public function getEmployeNames($id, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
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
        if ($userdata == "Distributor") {

            $appdend = " and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }

        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee  
            WHERE tbl_employee.employee_status=1
and tbl_employee.id_employee_type=3 and CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '%$id%' {$query_append} ";

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
    
    
    public function getProductiveGeoCodes() {
       /* $query = "SELECT 
    gpsinfo.idinvoice, lat, lon as lng
FROM
    gpsinfo
        inner join
    tbl_invoice ON gpsinfo.idinvoice = tbl_invoice.idinvoice
        inner join
    session ON session.idsession = tbl_invoice.idsession
where
    session.idposition_rep = {$_GET['rep']}
        and tbl_invoice.i_date = '{$_GET['date']}'";*/
        
        
        $query = "SELECT 
    tsp.id_sales_order as idinvoice,
    tgi.gps_latitude as lat,
    tgi.gps_longitude as lng
FROM
    tbl_sales_order tsp
        inner join
    tbl_gps_info tgi ON tsp.id_sales_order = tgi.id_sales_order
WHERE
    tsp.sales_order_status = 1
        #and ti.invoice_status = 1
        and tsp.id_employee_has_place ={$_GET['rep']}
        and tsp.added_date = '{$_GET['date']}'";
       // echo $query;
        return $this->db->mod_select($query);
    }

    public function getTruckGeoCodes() {
       $query="select 
gm.gps_latitude as lat,
gm.gps_longitude as lng,
gm.battry_level,
gm.`added_date`,
gm.`added_time` 

from
    tbl_gps_movement gm
where
gm.status=1
and  gm.id_employee_has_place='{$_REQUEST['rep']}'
 AND gm.added_date='{$_REQUEST['date']}'
     group by gm.gps_latitude,gm.gps_longitude
     order by gm.move_id asc";
//        $query = "SELECT 
//    lat, lon as lng
//FROM
//    repGeoPosition
//where
//    idposition = {$_GET['rep']}
//        and date_format(synctimestamp, '%Y-%m-%d') = '{$_GET['date']}'
//order by idrepgpspos asc";
        return $this->db->mod_select($query);
    }

    public function getSessionInfo() {
        
        $date=$_GET['date'];
        $emp=$_GET['rep'];
       echo $query = "select 
    concat(em.employee_first_name,
            ' ',
            em.employee_last_name) as full_name,
    em.id_employee,
    (select 
            outlet_name
        from
            (select 
                ou1.outlet_name,
                    so1.added_time,
                    so1.id_employee_has_place,
                    so1.added_date
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tu.outlet_name,
                    tun.added_time,
                    tun.id_employee_has_place,
                    tun.added_date
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date'
        order by tem.added_time asc
        limit 1) as firstoutlet,
    @ft:=(select 
            added_time
        from
            (select 
                so1.added_time, so1.id_employee_has_place, so1.added_date
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tun.added_time, tun.id_employee_has_place, tun.added_date
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date'
        order by tem.added_time asc
        limit 1) as firstoutlettime,
    (select 
            outlet_name
        from
            (select 
                ou1.outlet_name,
                    so1.added_date,
                    so1.added_time,
                    so1.id_employee_has_place
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tu.outlet_name,
                    tun.added_date,
                    tun.added_time,
                    tun.id_employee_has_place
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date'
        order by tem.added_time desc
        limit 1) as lastoutlet,
    (select 
            concat(added_date, '/', added_time)
        from
            (select 
                so1.added_date, so1.added_time, so1.id_employee_has_place
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tun.added_date, tun.added_time, tun.id_employee_has_place
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date'
        order by tem.added_time desc
        limit 1) as lastoutletdatetime,
    @lt:=(select 
            added_time
        from
            (select 
                so1.added_time, so1.added_date, so1.id_employee_has_place
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1 union select 
                tun.added_time, tun.added_date, tun.id_employee_has_place
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date'
        order by tem.added_time desc
        limit 1) as lastoutlettime,
    (TIMEDIFF(@ft, @lt)) as timediff,
    ou.outlet_name,
    sum((sop.product_price * sop.product_qty)) as tot,
    (select 
            count(branch_id)
        from
            (select 
                so1.id_outlet_has_branch as branch_id,
                    so1.added_date,
                    so1.id_employee_has_place
            from
                tbl_sales_order so1
            inner join tbl_outlet_has_branch ohb1 ON so1.id_outlet_has_branch = ohb1.id_outlet_has_branch
            inner join tbl_outlet ou1 ON ohb1.id_outlet = ou1.id_outlet
            where
                ou1.outlet_status = 1
                    and so1.sales_order_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date') as pro,
    (select 
            count(branch_id)
        from
            (select 
                tun.branch_id, tun.added_date, tun.id_employee_has_place
            from
                tbl_unproduct tun
            inner join tbl_outlet_has_branch ohb ON tun.branch_id = ohb.id_outlet_has_branch
            inner join tbl_outlet tu ON ohb.id_outlet = tu.id_outlet
            where
                tu.outlet_status = 1) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                and tem.added_date = '$date') as unpro
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
        
where
    ou.outlet_status = 1
        and sop.sales_order_products_status = 1
        and so.sales_order_status = 1
        and tet.employee_type != 'Distributor'
        and so.added_date = '$date'
        and ehp.id_employee_has_place = '$emp' 
group by em.id_employee";
        return $this->db->mod_select($query);
    }
    
    public function get_unproduct(){
        $sql = "SELECT 
    tot.id_outlet,
    tot.outlet_image as url,
    tp.gps_latitude as latitude,
    tp.gps_longitude as longitude,
    tp.added_date,tot.outlet_name , tp.remarks
FROM
    tbl_unproduct tp
        inner join
    tbl_outlet_has_branch tohb ON tohb.id_outlet_has_branch = tp.branch_id
        inner join
    tbl_outlet tot ON tot.id_outlet = tohb.id_outlet
WHERE
    tot.outlet_status = 1
        and tp.id_employee_has_place = {$_GET['rep']}
        and tp.added_date = '{$_GET['date']}'";
        
        return $this->db->mod_select($sql);
    }
    
    public function getinvoice_data(){
        $sql = "SELECT 
    `tbl_sales_order`.`id_sales_order`,
    `tbl_sales_order`.`added_date`,
    `tbl_sales_order`.`added_time`,
    `tbl_outlet`.`outlet_name`,
    `tbl_gps_info`.`gps_latitude`,
    `tbl_gps_info`.`gps_longitude`,
    `tbl_gps_info`.`battry_level`,
    (SELECT 
            SUM(`tbl_sales_order_products`.`product_qty` * `tbl_sales_order_products`.`product_price`)
        FROM
            `tbl_sales_order_products`
        WHERE
            `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        GROUP BY `tbl_sales_order_products`.`id_sales_order`) AS amount,
    ifnull((SELECT 
            SUM(`tbl_return_note_product`.`return_product_qty` * `tbl_return_note_product`.`return_price`)
        FROM
            `tbl_return_note`,
            `tbl_return_note_product`
        WHERE
            `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
                AND `tbl_return_note`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        GROUP BY `tbl_return_note`.`id_sales_order`),0) AS returnamount
FROM
    `tbl_sales_order`,
    `tbl_gps_info`,
    `tbl_outlet_has_branch`,
    `tbl_outlet`,
    tbl_employee_has_place
WHERE
    `tbl_sales_order`.`id_sales_order` = `tbl_gps_info`.`id_sales_order`
        AND `tbl_sales_order`.`id_outlet_has_branch` = `tbl_outlet_has_branch`.`id_outlet_has_branch`
        AND `tbl_outlet_has_branch`.`id_outlet` = `tbl_outlet`.`id_outlet`
        and tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        and tbl_sales_order.id_sales_order = {$_POST['idinvoice']}";
        
        return  $this->db->mod_select($sql);
    }

}
