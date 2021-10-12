<?php

/**
 * Description of item_keyword_model
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class report_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function get_Autogen_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getTrackingDetails() {
        $query_append = "";

        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '') {
            if (isset($_POST['emptype']) && $_POST['emptype'] == 2) {
                echo $hcmb_dispyc = $_POST['hcmb_dispyc'];
                $query_append = "AND tbl_employee_has_place.id_physical_place='$hcmb_dispyc ' AND tbl_sales_order.sales_order_status=1";
            } else {
                $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
                $query_append = "AND tbl_sales_order.id_employee_has_place='$txt_gps_emp_name_token' AND tbl_sales_order.sales_order_status=1";
            }
        }

        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '' && isset($_POST['txt_st_date']) && $_POST['txt_st_date'] != '') {
            if (isset($_POST['emptype']) && $_POST['emptype'] == 2) {
                $hcmb_dispyc = $_POST['hcmb_dispyc'];
                $txt_st_date = $_POST['txt_st_date'];
                $query_append = "AND tbl_employee_has_place.id_physical_place='$hcmb_dispyc'  AND tbl_sales_order.added_date='$txt_st_date' AND tbl_sales_order.sales_order_status=1";
            } else {
                $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
                $txt_st_date = $_POST['txt_st_date'];
                $query_append = "AND tbl_sales_order.id_employee_has_place='$txt_gps_emp_name_token' AND tbl_sales_order.added_date='$txt_st_date' AND tbl_sales_order.sales_order_status=1";
            }
        }

        /* if (isset($_POST['txt_st_date'])) {

          $txt_st_date = $_POST['txt_st_date'];
          if ($txt_st_date != '') {
          $query_append .= "AND `tbl_sales_order`.added_date='$txt_st_date'";
          }
          }

          if (isset($_POST['txt_st_date']) && isset($_POST['txt_gps_emp_name_token'])) {

          $txt_st_date = $_POST['txt_st_date'];

          $txt_emp_name = $_POST['txt_gps_emp_name_token'];
          if ($txt_st_date != '' && $txt_emp_name != '') {
          $query_append .= "AND `tbl_sales_order`.added_date='$txt_st_date' AND tbl_sales_order.id_employee_has_place='$txt_emp_name'";
          }
          }

          if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '') {

          $txt_emp_name = $_POST['txt_gps_emp_name_token'];
          if ($txt_emp_name != '') {
          $query_append .= "AND tbl_sales_order.id_employee_has_place='$txt_emp_name' AND `tbl_sales_order`.`added_date`=CURDATE()";
          }
          }
          $userdata = $this->session->userdata('user_type');
          $id_employee = $this->session->userdata('id_employee_has_place');

          if ($userdata == "Distributor") {

          $query_append .= "AND tbl_sales_order.id_employee_has_place='$id_employee'";
          }//

          echo $query_append; */

        $sql = "SELECT 
`tbl_sales_order`.`id_sales_order`,
`tbl_sales_order`.`added_date`,
`tbl_sales_order`.`added_time`,
`tbl_outlet`.`outlet_name`,
`tbl_gps_info`.`gps_latitude`,
`tbl_gps_info`.`gps_longitude`,
`tbl_gps_info`.`battry_level`,
(SELECT SUM(`tbl_sales_order_products`.`product_qty`*`tbl_sales_order_products`.`product_price`) FROM `tbl_sales_order_products` WHERE `tbl_sales_order_products`.`id_sales_order`=`tbl_sales_order`.`id_sales_order` GROUP BY `tbl_sales_order_products`.`id_sales_order`) AS amount,
(SELECT SUM(`tbl_return_note_product`.`return_product_qty`*`tbl_return_note_product`.`return_price`) FROM `tbl_return_note`, `tbl_return_note_product` WHERE
`tbl_return_note`.`id_return_note`=`tbl_return_note_product`.`id_return_note`
 AND
 `tbl_return_note`.`id_sales_order`=`tbl_sales_order`.`id_sales_order` GROUP BY `tbl_return_note`.`id_sales_order`) AS returnamount
FROM `tbl_sales_order`, `tbl_gps_info`, `tbl_outlet_has_branch`, `tbl_outlet` ,tbl_employee_has_place
WHERE 
`tbl_sales_order`.`id_sales_order`=`tbl_gps_info`.`id_sales_order`
AND 
`tbl_sales_order`.`id_outlet_has_branch`=`tbl_outlet_has_branch`.`id_outlet_has_branch`
AND 
`tbl_outlet_has_branch`.`id_outlet`=`tbl_outlet`.`id_outlet`
and tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place {$query_append}
";
        //echo "sql sales :"."</br>".$sql."</br>";
        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            $subJson['lat'] = $row['gps_longitude'];
            $subJson['longi'] = $row['gps_latitude'];
            $subJson['bat'] = $row['battry_level'];
            $subJson['amount'] = number_format(($row['amount'] - $row['returnamount']), 2);
            $subJson['con'] = $row['outlet_name'];
            $subJson['occ'] = "sales";
            $subJson['bill_status'] = "1";

            array_push($json_array['locations'], $subJson);
        }

        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function selectGpsTrackingDetailsByDate($dateOne, $dateTwo) {
        $sql = "select 
    id_sales_order,
    temp_outlet_has.added_date,
    temp_outlet_has.added_time,
    gps_latitude,
    gps_longitude,
    amount,
    outlet_name,
	battry_level
from
    tbl_outlet O,
(select 
    id_sales_order,
    ohb.added_date,
    ohb.added_time,
    gps_latitude,
    gps_longitude,
    amount,
    battry_level,
    ohb.id_outlet
from
    tbl_outlet_has_branch ohb,
    (select 
        P.id_sales_order,
            P.added_date,
            P.added_time,
            gps_latitude,
            gps_longitude,
            (product_qty * product_price) as amount,
            battry_level,
            id_outlet_has_branch
    from
        tbl_sales_order_products P, (select 
        G.id_sales_order,
            added_date,
            added_time,
            gps_latitude,
            gps_longitude,
            battry_level,
            id_outlet_has_branch
    from
        tbl_gps_info G, (select 
        id_sales_order, added_date, added_time, id_outlet_has_branch
    from
        tbl_sales_order
    where
        added_date between '$dateOne' and '$dateTwo') temp_so
    where
        temp_so.id_sales_order = G.id_sales_order) temp_gps
    where
        temp_gps.id_sales_order = P.id_sales_order) temp_ohb
where
    ohb.id_outlet_has_branch = temp_ohb.id_outlet_has_branch)temp_outlet_has
where
    temp_outlet_has.id_outlet = O.id_outlet";

        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            $subJson['lat'] = $row['gps_longitude'];
            $subJson['longi'] = $row['gps_latitude'];
            $subJson['bat'] = $row['battry_level'];
            $subJson['amount'] = number_format($row['amount'], 2);
            $subJson['con'] = $row['outlet_name'];
            $subJson['occ'] = "sales";
            $subJson['bill_status'] = "1";

            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function dailySalesReport() {
        $id_physical_place = $this->session->userdata('id_physical_place');
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

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

        if (isset($_POST['txt_st_date']) && isset($_POST['txt_en_date'])) {

            $txt_st_date = $_POST['txt_st_date'];
            $txt_en_date = $_POST['txt_en_date'];
            if ($txt_st_date != '' && $txt_en_date != '') {
                $query_append .= "AND tso.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }

        if (isset($_POST['txt_st_date']) && isset($_POST['txt_en_date']) && isset($_POST['txt_emp_name_token'])) {

            $txt_st_date = $_POST['txt_st_date'];
            $txt_en_date = $_POST['txt_en_date'];
            $txt_emp_name = $_POST['txt_emp_name_token'];
            if ($txt_st_date != '' && $txt_en_date != '' && $txt_emp_name != '') {
                $query_append .= "AND tso.added_date between '$txt_st_date' AND '$txt_en_date' AND tso.id_employee_has_place='$txt_emp_name'";
            }
        }

//        if (isset($_POST['txt_emp_name_token'])) {
//
//            $txt_emp_name = $_POST['txt_emp_name_token'];
//            if ($txt_emp_name != '' && $userdata != "Distributor") {
//                $query_append .= "AND tso.id_employee_has_place='$txt_emp_name'";
//            }
//        }

        if (isset($_POST['id_physical_place'])) {
            $id_phy_place = $_POST['id_physical_place'];
            if ($id_phy_place != '' && $userdata != "Distributor") {
                $query_append .= "AND tehp.id_physical_place='$id_phy_place'";
            }
        }


        if (isset($_POST['txt_terid'])) {

            $txt_terid = $_POST['txt_terid'];
            if ($txt_terid != '') {
                $query_append .= "AND tehp.id_territory='$txt_terid'";
            }
        }

        if (isset($_POST['txt_outid'])) {

            $txt_outid = $_POST['txt_outid'];
            if ($txt_outid != '') {
                $query_append .= "AND tohc.id_outlet='$txt_outid'";
            }
        }




        if ($userdata == "Distributor") {

            $query_append .= "AND tehp.id_physical_place='$id_physical_place'";
        }

        $sql = "SELECT 
    tso.id_sales_order,
    (select 
            CONCAT(employee_first_name,
                        ' ',
                        employee_last_name) as employee_first_name
        from
            tbl_employee
        where
            id_employee = tehp.id_employee) as employee_first_name,
    (select 
            physical_place_name
        from
            tbl_physical_place
        where
            id_physical_place = tehp.id_physical_place) as physical_place_name,
    (select 
            territory_name
        from
            tbl_territory
        where
            id_territory = tehp.id_territory) territory_name,
    (select 
            division_name
        from
            tbl_division
        where
            id_division = tehp.id_division) as division_name,
    (select 
            outlet_name
        from
            tbl_outlet
        where
            id_outlet = tohc.id_outlet) as outlet_name,
    (select 
            branch_address
        from
            tbl_outlet_has_branch
        where
            id_outlet_has_branch = tohc.id_outlet_has_branch) as branch_address,
    tso.sales_order_code,
    tso.sales_order_remark,
    (SELECT 
            SUM(product_price * product_qty) as total
        FROM
            tbl_sales_order_products
        WHERE
            id_sales_order = tso.id_sales_order
        GROUP BY id_sales_order) as salesordertotal,
    (SELECT 
            SUM(`tbl_return_note_product`.`return_price` * `tbl_return_note_product`.`return_product_qty`) as returntotal
        FROM
            `tbl_return_note`,
            `tbl_return_note_product`
        WHERE
            `tbl_return_note`.`id_sales_order` = tso.id_sales_order
                AND `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
                AND `tbl_return_note_product`.`id_return_type` = 1
        GROUP BY `tbl_return_note`.`id_sales_order`) as salesreturnproducttotal,
    (SELECT 
            SUM(`tbl_return_note_product`.`return_price` * `tbl_return_note_product`.`return_product_qty`) as returntotal
        FROM
            `tbl_return_note`,
            `tbl_return_note_product`
        WHERE
            `tbl_return_note`.`id_sales_order` = tso.id_sales_order
                AND `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
                AND `tbl_return_note_product`.`id_return_type` = 2
        GROUP BY `tbl_return_note`.`id_sales_order`) as marketreturnproducttotal,
    (select 
            sum(tp.product_price * tsop.product_qty) as amount
        from
            tbl_sales_order tso1
                inner join
            tbl_sales_order_products tsop ON tsop.id_sales_order = tso1.id_sales_order
                inner join
            tbl_products tp ON tsop.id_products = tp.id_products
                inner join
            tbl_item ti ON tp.iditem = ti.id_item
        where
            tsop.sales_order_products_status = 1
                and tso1.sales_order_status = 1
                and tsop.product_price = '0'
                and tsop.product_qty <> '0'
                and tso1.id_sales_order = tso.id_sales_order) as freetotal
FROM
    tbl_sales_order tso
        inner join
    tbl_employee_has_place tehp ON tso.id_employee_has_place = tehp.id_employee_has_place
        inner join
    tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch = tohc.id_outlet_has_branch {$query_append}
where
    tehp.id_employee LIKE '%'
        AND tehp.id_physical_place LIKE '%'
        AND tehp.id_territory LIKE '%'
        AND tehp.id_division LIKE '%'
        AND tohc.id_outlet LIKE '%'
        AND tohc.id_outlet_has_branch LIKE '%'
        AND tso.sales_order_status = '1'
         group by tso.id_sales_order desc";
//        echo $sql;
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['employee_first_name'] = $row['employee_first_name'];
            $subJson['physical_place_name'] = $row['physical_place_name'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            $subJson['territory_name'] = $row['territory_name'];
            $subJson['division_name'] = $row['division_name'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['branch_address'] = $row['branch_address'];
            $subJson['salesordertotal'] = $row['salesordertotal'];
            $subJson['salesreturnproducttotal'] = $row['salesreturnproducttotal'];
            $subJson['marketreturnproducttotal'] = $row['marketreturnproducttotal'];
            $subJson['freetotal'] = $row['freetotal'];

            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $dailySalesReport = json_encode($json_array);
        return $dailySalesReport;
    }

    public function get_users($id, $select) {
        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee  
            WHERE tbl_employee.employee_status=1
and tbl_employee.id_employee_type=3 and CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '$id%'  ";

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

    public function getEmployeNames($id, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');

        if ($userdata == "Distributor") {

            $appdend .= " and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $appdend .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }

//        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
//            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
//            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee 
//            INNER JOIN tbl_sales_order tbl_sales_order ON tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
//            WHERE  CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '%$id%' GROUP BY tbl_sales_order.id_employee_has_place";

        $sql = "SELECT 
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_first_name,
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee_has_place.id_physical_place
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
           
WHERE
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) LIKE '%$id%' {$appdend}";

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

    /*
     * gps tarck
     */

    public function getEmployeNamestracking($id, $select, $q_pysid = '', $q_area_id = '') {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');

        if ($userdata == "Distributor") {

            // $appdend = " and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }

        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee 
            INNER JOIN tbl_sales_order tbl_sales_order ON tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
            WHERE  CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '$id%'and tbl_employee.id_employee_type=3 and tbl_employee_has_place.id_physical_place=$q_pysid and tbl_employee_has_place.id_territory=$q_area_id GROUP BY tbl_sales_order.id_employee_has_place";

        //echo $sql;

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

    public function getEmployeeNamesWise($q, $select) {
        $sql = "SELECT distinct
    temptable.full_name, temptable.id_employee
FROM
    (SELECT 
        concat(tbl_employee.employee_first_name, ' ', tbl_employee.employee_last_name) as full_name,
            tbl_employee.id_employee
    FROM
        tbl_sales_order_products, tbl_products, tbl_territory, tbl_outlet_has_branch, tbl_employee_has_place, tbl_employee
    WHERE
        tbl_sales_order_products.id_products = tbl_products.id_products
            AND tbl_territory.id_territory = tbl_outlet_has_branch.id_territory
            and tbl_employee_has_place.id_employee = tbl_employee.id_employee and concat(tbl_employee.employee_first_name, ' ', tbl_employee.employee_last_name) like '%$q%') temptable

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

    public function getTerritoryNamesWise($q, $select) {
        $sql = "SELECT distinct
    temptable.id_territory, temptable.territory_name
FROM
    (SELECT 
        tbl_territory.id_territory,
            tbl_territory.territory_name
    FROM
        tbl_sales_order_products, tbl_products, tbl_territory, tbl_outlet_has_branch, tbl_employee_has_place, tbl_employee
    WHERE
        tbl_sales_order_products.id_products = tbl_products.id_products
            AND tbl_territory.id_territory = tbl_outlet_has_branch.id_territory
            and tbl_employee_has_place.id_employee = tbl_employee.id_employee and tbl_territory.territory_name like '%$q%') temptable";
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

    public function getSalesItemWise() {



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


        //============widuranga============start======
        if (isset($_REQUEST['txt_division']) && $_REQUEST['txt_division'] != '') {
            $txt_division = $_REQUEST['txt_division'];
            $division = "AND tbl_item.id_division= '$txt_division'";
        }
        //============widuranga============end======

        $sql = "SELECT COUNT(tbl_sales_order.id_sales_order) as no_of_sales ,tbl_item.item_name,tbl_item.item_no,tbl_sales_order_products.id_products,tbl_sales_order.id_employee_has_place ,SUM(tbl_sales_order_products.product_qty) as sales_qty, SUM(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price ) as total_sales, tbl_outlet_has_branch.id_territory

FROM tbl_sales_order tbl_sales_order INNER JOIN tbl_sales_order_products tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_sales_order_products.id_products INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
inner join tbl_outlet_has_branch on tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch

WHERE tbl_sales_order.sales_order_status =:sales_order_status {$apeend} {$division} {$apeend1} {$query_append} {$apeend2}
            GROUP BY tbl_sales_order_products.id_products";
//        echo $sql;
        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getsalesReturnItemWise() {
        $apeend = '';

        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $apeend = "AND tbl_return_note_product.id_products='$iIdHidden'";
        }
        if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != '') {
            $iIdempid = $_REQUEST['employee_id'];
            $apeend1 = "AND tbl_sales_order.id_employee_has_place in (select id_employee_has_place from tbl_employee_has_place where id_physical_place in(SELECT `id_physical_place` FROM tbl_employee_has_place WHERE `id_employee_has_place` like '$iIdempid%')";
        }
        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];



            if ($txt_st_date != '' && $txt_en_date != '') {
                $query_append .= "AND tbl_return_note_product.added_date between '$txt_st_date' AND '$txt_en_date' ";
            }
        }

        if (isset($_REQUEST['txt_terid']) && $_REQUEST['txt_terid'] != '') {

            $txt_terid = $_REQUEST['txt_terid'];
            $apeend2 = "AND tbl_outlet_has_branch.id_territory = '$txt_terid'";
        }
        //============widuranga============start======
        if (isset($_REQUEST['txt_division']) && $_REQUEST['txt_division'] != '') {
            $txt_division = $_REQUEST['txt_division'];
            $division = "AND tbl_item.id_division= '$txt_division'";
        }
        //============widuranga============end======


        $sql = "SELECT tbl_item.item_name,tbl_item.item_no,tbl_return_note_product.id_products,tbl_sales_order.id_employee_has_place
            ,SUM(tbl_return_note_product.return_product_qty) as salesrr_qty
            , SUM(tbl_return_note_product.return_product_qty * tbl_return_note_product.return_price ) 
            as sr_return,tbl_outlet_has_branch.id_territory
            FROM tbl_sales_order tbl_sales_order INNER JOIN tbl_return_note tbl_return_note 
            ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order 
            INNER JOIN tbl_return_note_product tbl_return_note_product 
            ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note  
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products  
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
            inner join tbl_outlet_has_branch 
on tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
            WHERE tbl_sales_order.sales_order_status =:sales_order_status 
            AND tbl_return_note_product.id_return_type=1 {$apeend} {$division}  {$apeend1} {$query_append} {$apeend2}
            GROUP BY tbl_return_note_product.id_products";

        // echo $sql;
        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getSalesMarketItemWise() {

        $apeend = '';

        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $apeend = "AND tbl_return_note_product.id_products='$iIdHidden'";
        }

        $sql = "SELECT tbl_item.item_name,tbl_item.item_no,tbl_return_note_product.id_products
            ,SUM(tbl_return_note_product.return_product_qty) as mr_qty
            , SUM(tbl_return_note_product.return_product_qty * tbl_return_note_product.return_price )
            as mr_return  FROM tbl_sales_order tbl_sales_order INNER JOIN tbl_return_note tbl_return_note 
            ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order 
            INNER JOIN tbl_return_note_product tbl_return_note_product 
            ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products  
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem 
            WHERE tbl_sales_order.sales_order_status = '1'  
            AND tbl_return_note_product.id_return_type=2 {$apeend} GROUP BY tbl_return_note_product.id_products";

        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    /*
     * knet funtion added for temp 
     */

    public function getProdcutDetail($product_id) {
        $column = array('id_products' => $product_id);
        $sql = "SELECT tbl_item.id_item,tbl_item.item_no,tbl_item.item_account_code
            ,tbl_item.item_name FROM tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem  
            WHERE tbl_products.id_products=:id_products";

        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getSlaesQty($product_id) {
        $column = array('id_products' => $product_id);
        $sql = "SELECT SUM(product_qty) as sales_qty,SUM(product_qty * product_price) as sles_tot FROM `tbl_sales_order_products` WHERE id_products=:id_products GROUP BY id_products";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    public function getReturnQty($product_id, $return_type) {
        $column = array('id_products' => $product_id, 'id_return_type' => $return_type);
        $sql = "SELECT SUM(return_product_qty) as return_qty,SUM(return_price * return_product_qty) as return_tot FROM `tbl_return_note_product`
             WHERE id_products=:id_products AND id_return_type=:id_return_type GROUP BY id_products ";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    /*
     * end of knet
     */

    /*    public function itemWiseSalesOrderReportModel() {
      // echo 'dsfs';
      $appendLast = '';
      if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != null) {
      $append = $_REQUEST['iIdHidden'];
      $appendLast .= "and tbl_item.id_item='$append'";
      }
      if (isset($_REQUEST['eId']) && $_REQUEST['eId'] != null) {
      $append = $_REQUEST['eId'];
      $appendLast .= "and tbl_employee.id_employee='$append'";
      }
      if (isset($_REQUEST['tId']) && $_REQUEST['tId'] != null) {
      $append = $_REQUEST['tId'];
      $appendLast .= "and tbl_territory.id_territory='$append'";
      }

      $userdata = $this->session->userdata('user_type');
      $id_employee = $this->session->userdata('id_employee');

      if ($userdata == "Distributor") {

      $appendLast .= "AND tbl_employee.id_employee='$id_employee'";
      }

      $sql = "SELECT
      temptable.id_item,
      temptable.item_no,
      temptable.item_account_code,
      temptable.item_name,
      temptable.full_name,
      temptable.territory_name,
      SUM(temptable.sumqty) AS fsalesqty,
      COUNT(temptable.id_sales_order) AS fnooforders,
      SUM(temptable.retailtotal) AS fretailtotal,
      SUM(temptable.salestotal) AS fsalestotal
      FROM
      (SELECT
      tbl_item.id_item,
      tbl_item.item_no,
      tbl_item.item_account_code,
      tbl_item.item_name,
      concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
      tbl_territory.territory_name,
      sum(tbl_sales_order_products.product_qty) AS sumqty,
      tbl_sales_order_products.id_sales_order,
      SUM(tbl_products.product_price * tbl_sales_order_products.product_qty) AS retailtotal,
      SUM(tbl_sales_order_products.product_price * tbl_sales_order_products.product_qty) AS salestotal
      FROM
      tbl_sales_order_products, tbl_products, tbl_item,tbl_territory,tbl_outlet_has_branch,tbl_employee_has_place,tbl_employee
      WHERE
      tbl_sales_order_products.id_products= tbl_products.id_products
      AND tbl_products.iditem = tbl_item.id_item and tbl_territory.id_territory= tbl_outlet_has_branch.id_territory and tbl_employee_has_place.id_employee = tbl_employee.id_employee {$appendLast}
      GROUP BY tbl_item.id_item , tbl_sales_order_products.id_sales_order) temptable
      GROUP BY temptable.id_item";

      //echo $sql;
      $query = $this->db->query($sql);
      $result = $query->result('array');
      $json_array = array();
      $json_array['report'] = array();
      foreach ($result as $row) {
      $subJson = array();
      $subJson['id_item'] = $row['id_item'];
      $subJson['item_no'] = $row['item_no'];
      $subJson['item_account_code'] = $row['item_account_code'];
      $subJson['item_name'] = $row['item_name'];
      $subJson['fsalesqty'] = $row['fsalesqty'];
      $subJson['fretailtotal'] = $row['fretailtotal'];
      $subJson['fsalestotal'] = $row['fsalestotal'];
      $subJson['fnooforders'] = $row['fnooforders'];


      array_push($json_array['report'], $subJson);
      }

      $salesReportItemWise = json_encode($json_array);
      return $salesReportItemWise;
      }
     */

    ///

    /*
     * @author Faazi ahamed 
     * 
     * @contact faaziahamed
     */

    public function getProdcutDetails($product_id) {
        $column = array('id_products' => $product_id);
        $sql = "SELECT tbl_item.id_item,tbl_item.item_no,tbl_item.item_account_code
            ,tbl_item.item_name FROM tbl_products tbl_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem  
            WHERE tbl_products.id_products=:id_products";

        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    /*  public function getSlaesQtys($product_id) {
      $column = array('id_products' => $product_id);
      $sql = "SELECT SUM(product_qty) as sales_qty,SUM(product_qty * product_price) as sles_tot FROM `tbl_sales_order_products` WHERE id_products=:id_products GROUP BY id_products";
      $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
      return $mod_select;
      } */

    public function getSlaesQtys($product_id, $id_physical) {

//        $sql = "SELECT SUM(product_qty) as sales_qty,SUM(product_qty * product_price) as sles_tot FROM `tbl_sales_order_products` WHERE id_products=:id_products GROUP BY id_products";

        $append = "";

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

    public function getReturnQtys($product_id, $return_type) {

        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $physical_place = $this->session->userdata('id_physical_place');

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

    public function getdivisionNames($q, $select) {
        $sql = "select 
    tbl_item.id_division, tbl_division.division_name
from
    tbl_item tbl_item
        INNER JOIN
    tbl_division tbl_division on tbl_division.id_division= tbl_item.id_division where tbl_division.division_name LIKE'$q%' group by tbl_item.id_division";
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

    /*
     * End ItemWise Report 
     */


    /*
     * Item Wise Report 
     * @author Faazy ahamed
     * @contact faaziahamed@gmail.com
     */

    public function getSalesItemWises() {


        $userdata = $this->session->userdata('user_type');
        $physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $append = '';
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

            $append .= " and ehp.id_physical_place='$physical_place'";
        }

        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != '') {
            $iIdHidden = $_REQUEST['iIdHidden'];
            $append = " AND tbl_sales_order_products.id_products='$iIdHidden'";
        }

        if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != '' && $userdata != "Distributor") {

            $iIdempid = $_REQUEST['employee_id'];
            $append .= " and ehp.id_physical_place='$iIdempid'";
        }

        if (isset($_REQUEST['txt_st_date']) && isset($_REQUEST['txt_en_date'])) {

            $txt_st_date = $_REQUEST['txt_st_date'];
            $txt_en_date = $_REQUEST['txt_en_date'];



            if ($txt_st_date != '' && $txt_en_date != '') {
                $append .= " AND tbl_sales_order_products.added_date between '$txt_st_date' AND '$txt_en_date' ";
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

        $sql = "SELECT 
    COUNT(tbl_sales_order.id_sales_order) as no_of_sales,
    tbl_item.item_name,
    tbl_item.item_no,
    tbl_sales_order_products.id_products,
    tbl_sales_order.id_employee_has_place,
    SUM(tbl_sales_order_products.product_qty) as sales_qty,
    SUM(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as total_sales,
    tbl_outlet_has_branch.id_territory
FROM
    tbl_sales_order tbl_sales_order
        INNER JOIN
    tbl_sales_order_products tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
        INNER JOIN
    tbl_products tbl_products ON tbl_products.id_products = tbl_sales_order_products.id_products
        INNER JOIN
    tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
        inner join
    tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_employee_has_place ehp ON tbl_sales_order.id_employee_has_place = ehp.id_employee_has_place
WHERE
    tbl_sales_order.sales_order_status = 1
         {$append} {$query_append}
GROUP BY tbl_sales_order_products.id_products";

//        echo $sql;
        $column = array('sales_order_status' => 1);
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
    tbl_return_note_product.id_return_type = 1  {$append}{$query_append}
       
GROUP BY tbl_return_note_product.id_products";
// echo $append;
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
    tbl_return_note_product.id_return_type = 2  {$append} {$query_append}
       
GROUP BY tbl_return_note_product.id_products";

//echo $sql;

        $column = array('sales_order_status' => 1);
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }

    /*  public function stockAvailability() {
      $append = "";
      $userdata = $this->session->userdata('user_type');
      if ($userdata != "Distributor") {

      if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != null) {
      $idEmployee = $_REQUEST['employee_id'];
      $append .= "and temp.id_employee='$idEmployee'";
      }
      }
      if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != null) {
      $item_id = $_REQUEST['item_id'];
      $append .= "and ti.id_item='$item_id'";
      }
      if (isset($_REQUEST['item_category_id']) && $_REQUEST['item_category_id'] != null) {

      $item_category_id = $_REQUEST['item_category_id'];
      $append .= "and tic.id_item_category='$item_category_id'";
      }

      $userdata = $this->session->userdata('user_type');
      $id_employee = $this->session->userdata('id_employee');

      if ($userdata == "Distributor") {

      $append .= "AND temp.id_employee='$id_employee'";
      }

      $lastOne = "";
      if (strlen($append) > 0) {
      $splitOne = substr($append, 3, strlen($append));
      $lastOne = "where " . $splitOne;
      } else {
      $lastOne = "";
      }


      $sql = "select
      concat(temp.employee_first_name,' ',temp.employee_last_name) as emp_name,
      (tsk.qty) as stock_quantity,
      tsk.id_products,
      ti.item_name,ti.item_account_code,
      tpr.product_price,
      (tsk.qty*tpr.product_price) as total

      from
      tbl_store tst
      inner join
      tbl_stock tsk ON tst.id_store = tsk.id_store
      inner join
      tbl_employee temp on temp.id_employee_registration = tst.id_employee_registration
      inner join
      tbl_products tpr on tsk.id_products = tpr.id_products
      inner join
      tbl_item ti on ti.id_item = tpr.iditem
      inner join
      tbl_item_category tic on tic.id_item_category = ti.id_item_category where tsk.stock_status=1 and temp.employee_status = 1 {$append}

      ";



      $query = $this->db->query($sql);
      $result = $query->result('array');
      $json_array = array();
      $json_array['stock'] = array();
      foreach ($result as $row) {
      $subJson = array();
      $subJson['id_products'] = $row['id_products'];
      $subJson['item_Name'] = $row['item_name'];
      $subJson['stock_quantity'] = $row['stock_quantity'];
      $subJson['emp_name'] = $row['emp_name'];
      $subJson['item_account_code'] = $row['item_account_code'];

      $subJson['product_price'] = $row['product_price'];
      $subJson['total'] = $row['total'];


      array_push($json_array['stock'], $subJson);
      }
      //array_push($json_array, $new_row);
      $jsonEncode = json_encode($json_array);
      return $jsonEncode;
      } */

    public function stockAvailability() {
        $append = "";
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        if ($userdata != "Distributor") {

            if (isset($_REQUEST['employee_id']) && $_REQUEST['employee_id'] != null) {
                $idEmployee = $_REQUEST['employee_id'];
                $append .= "and ehp.id_employee_has_place = '$idEmployee'";
//                echo $append;
            }
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


        if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != null) {
            $item_id = $_REQUEST['item_id'];
            $append .= "and ti.id_item='$item_id'";
        }
        if (isset($_REQUEST['item_category_id']) && $_REQUEST['item_category_id'] != null) {

            $item_category_id = $_REQUEST['item_category_id'];
            $append .= "and tic.id_item_category='$item_category_id'";
        }

        // $userdata = $this->session->userdata('user_type');


        if ($userdata == "Distributor") {

            $append .= "AND temp.id_employee='$id_employee'";
        }

        $lastOne = "";
        if (strlen($append) > 0) {
            $splitOne = substr($append, 3, strlen($append));
            $lastOne = "where " . $splitOne;
        } else {
            $lastOne = "";
        }
        if (isset($_REQUEST['brand_id']) && $_REQUEST['brand_id'] != null) {

            $brand_id = $_REQUEST['brand_id'];
            $append .= "and tic.id_brand='$brand_id'";
        }

        $sql = "select 
    concat(temp.employee_first_name,
            ' ',
            temp.employee_last_name) as emp_name,
    (tsk.qty) as stock_quantity,
    tsk.id_products,
    ti.item_name,
    ti.item_account_code,
    tpr.product_cost as product_price,
    (tsk.qty * tpr.product_cost) as total,
    ehp.id_employee_has_place
from
    tbl_store tst
        inner join
    tbl_stock tsk ON tst.id_store = tsk.id_store
        inner join
    tbl_employee temp ON temp.id_employee_registration = tst.id_employee_registration
        inner join
    tbl_products tpr ON tsk.id_products = tpr.id_products
        inner join
    tbl_item ti ON ti.id_item = tpr.iditem
        inner join
    tbl_item_category tic ON tic.id_item_category = ti.id_item_category
        inner join
    tbl_employee_has_place ehp ON temp.id_employee = ehp.id_employee
where
    tsk.stock_status = 1
        and temp.employee_status = 1 {$append}";




        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['stock'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_products'] = $row['id_products'];
            $subJson['item_Name'] = $row['item_name'];
            $subJson['stock_quantity'] = $row['stock_quantity'];
            $subJson['emp_name'] = $row['emp_name'];
            $subJson['item_account_code'] = $row['item_account_code'];

            $subJson['product_price'] = $row['product_price'];
            $subJson['total'] = $row['total'];


            array_push($json_array['stock'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    /*
     * Stock Availability Autocomplete
     * @author Faazy ahamed
     *
     */

    public function getEmployeeNames($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
            $append = "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }



        $sql = "select distinct
    tbl_store.store_name,
    tbl_store.store_code,
	tbl_store.id_store,
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee_has_place.id_employee,
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
from
    tbl_store
        inner join
    tbl_stock ON tbl_stock.id_store = tbl_store.id_store
        inner join
    tbl_employee_has_place ON tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place
        inner join
    tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee where concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) like '%$q%' and tbl_employee.id_employee_type = 2 {$append}
    order by tbl_store.store_name";
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

    public function getProductName($q, $select) {
        $sql = "select distinct
    
    tbl_products.id_products,
    tbl_products.iditem,
    tbl_item.item_Name
from
    tbl_store
        inner join
    tbl_stock ON tbl_stock.id_store = tbl_store.id_store
        inner join
    tbl_products ON tbl_stock.id_products = tbl_products.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_item_category on tbl_item_category.id_item_category = tbl_item.id_item_category
        inner join
    tbl_employee_has_place ON tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place
        inner join
    tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        inner join
    tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory
        inner join
    tbl_territory_has_division ON tbl_territory_has_division.id_territory = tbl_territory.id_territory
        inner join
    tbl_division ON tbl_division.id_division = tbl_territory_has_division.id_division where tbl_item.item_Name like '%$q%'
order by tbl_store.store_name";
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

    public function getProductNameCategory($q, $select) {
        $sql = "select distinct
    
	tbl_item_category.tbl_item_category_name,
        tbl_item_category.id_item_category
from
    tbl_store
        inner join
    tbl_stock ON tbl_stock.id_store = tbl_store.id_store
        inner join
    tbl_products ON tbl_stock.id_products = tbl_products.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_item_category on tbl_item_category.id_item_category = tbl_item.id_item_category
        inner join
    tbl_employee_has_place ON tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place
        inner join
    tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        inner join
    tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory
        inner join
    tbl_territory_has_division ON tbl_territory_has_division.id_territory = tbl_territory.id_territory
        inner join
    tbl_division ON tbl_division.id_division = tbl_territory_has_division.id_division where tbl_item_category.tbl_item_category_name like '%$q%'
order by tbl_store.store_name";
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

    public function getArea($q, $select) {
        $sql = "select distinct
    tbl_employee_has_place.id_territory,
    
    tbl_territory.territory_name
    from
    tbl_store
        inner join
    tbl_stock ON tbl_stock.id_store = tbl_store.id_store
        inner join
    tbl_products ON tbl_stock.id_products = tbl_products.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_item_category on tbl_item_category.id_item_category = tbl_item.id_item_category
        inner join
    tbl_employee_has_place ON tbl_employee_has_place.id_physical_place = tbl_store.id_physical_place
        inner join
    tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        inner join
    tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory
        inner join
    tbl_territory_has_division ON tbl_territory_has_division.id_territory = tbl_territory.id_territory
        inner join
    tbl_division ON tbl_division.id_division = tbl_territory_has_division.id_division where tbl_territory.territory_name like '%$q%'";
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

    //----------------------------------------------------------------------------------------------------------------------------------------------------

    public function marketReturn() {
        $append = "";

        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        if (isset($_REQUEST['route_id']) && $_REQUEST['route_id'] != null) {
            $route_id = $_REQUEST['route_id'];
            $append .= "and tbl_territory.id_territory = '$route_id'";
        }
        if ($userdata != "Distributor") {
            if (isset($_REQUEST['distributor_id']) && $_REQUEST['distributor_id'] != null) {
                $distributor_id = $_REQUEST['distributor_id'];
//                $append .= "and tbl_employee.id_employee = '$distributor_id'";
                $append .= " and tbl_employee_has_place.id_physical_place = '$distributor_id'";
            }
        }
        if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != null) {
            $item_id = $_REQUEST['item_id'];
            $append .= "and tbl_item.id_item='$item_id'";
        }
        if (isset($_REQUEST['start_date_mr']) && isset($_REQUEST['end_date_mr']) && ($_REQUEST['start_date_mr'] != null && $_REQUEST['start_date_mr'] != null)) {

            $start_date = $_REQUEST['start_date_mr'];
            $end_date = $_REQUEST['end_date_mr'];
            $append .= "and tbl_return_note.added_date between '$start_date' and '$end_date'";
        }



        if ($userdata == "Distributor") {

            $append .= "and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }

        // regional manager
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
            //               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "and tbl_employee_has_place.id_physical_place in (select 
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
    tbl_return_note.id_return_note,tbl_return_note.added_date, 
    tbl_return_note.added_date,
    tbl_return_note_product.discount,
    tbl_return_note_product.id_return_note_product,
    tbl_return_type.return_type,
    tbl_outlet_has_branch.id_outlet,
    tbl_outlet.outlet_name,
    tbl_return_note_product.return_price,
    tbl_return_note_product.return_product_qty,
    tbl_item.item_name,
    tbl_item.id_item,
	tbl_territory.territory_name,
	tbl_division.division_name,
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
        tbl_return_note.added_date
from
    
    tbl_return_note  
        inner join
    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        inner join
    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        
    
        inner join
    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
		inner join
	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
		inner join
	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
		inner join
	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		inner join
	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee where tbl_return_note_product.id_return_type='2' AND tbl_return_note.return_note_status=1 {$append} 
	";
//echo $sql;

        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['marketReturn'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['full_name'] = $row['full_name'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['discount'] = $row['discount'];
            $subJson['territory_name'] = $row['territory_name'];
            $subJson['division_name'] = $row['division_name'];
            $subJson['item_name'] = $row['item_name'];
            $subJson['return_price'] = $row['return_price'];
            $subJson['return_product_qty'] = $row['return_product_qty'];
            $subJson['return_value'] = $row['return_value'];
            $subJson['added_date'] = $row['added_date'];
            array_push($json_array['marketReturn'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function getItemForMarketReturn($q, $select) {
//        $sql = "select 
//    tbl_item.item_name,
//    tbl_item.id_item
//from
//    tbl_sales_order
//        inner join
//    tbl_return_note ON tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
//        inner join
//    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
//        inner join
//    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
//        inner join
//    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
//        inner join
//    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
//        inner join
//    tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
//        inner join
//    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
//        inner join
//    tbl_item ON tbl_item.id_item = tbl_products.iditem
//        inner join
//    tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
//        inner join
//    tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
//        inner join
//    tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
//        inner join
//    tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
//        inner join
//    tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee
//    where item_name like '%$q%' GROUP BY tbl_item.id_item";


        $sql = "select 
    i.id_item, i.item_name
from
    tbl_return_note trn
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
        inner join
    tbl_return_type trt
        inner join
    tbl_products tp ON trnp.id_products = tp.id_products
        inner join
    tbl_item i ON tp.iditem = i.id_item
where
    trn.return_note_status = 1
        and i.item_name like '%$q%'
        and trt.id_return_type = trnp.id_return_type
        and trnp.id_return_type = 2
group by i.id_item";


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

    public function getRouteForMarketReturn($q, $select) {

//        $sql = "select 
//    
//	tbl_territory.territory_name,
//	tbl_territory.id_territory
//	
//from
//    tbl_sales_order
//        inner join
//    tbl_return_note ON tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
//        inner join
//    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
//        inner join
//    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
//        inner join
//    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
//        inner join
//    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
//        inner join
//    tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
//        inner join
//    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
//        inner join
//    tbl_item ON tbl_item.id_item = tbl_products.iditem
//		inner join
//	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
//		inner join
//	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
//		inner join
//	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
//		inner join
//	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
//		inner join
//	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee
//	where territory_name like '%$q%' GROUP BY territory_name";

        $sql = "select 
    tr.id_territory, tr.territory_name
from
    tbl_return_note trn
        inner join
    tbl_outlet_has_branch ohb ON trn.id_outlet_has_branch = ohb.id_outlet_has_branch
        inner join
    tbl_territory tr ON tr.id_territory = ohb.id_territory
where tr.territory_name like '%$q%' GROUP BY tr.territory_name";

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

    public function getDistributorForMarketReturn($q, $select) {
//        $sql = "select 
//    	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
//        tbl_employee.id_employee
//from
//    tbl_sales_order
//        inner join
//    tbl_return_note ON tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
//        inner join
//    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
//        inner join
//    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
//        inner join
//    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
//        inner join
//    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
//        inner join
//    tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
//        inner join
//    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
//        inner join
//    tbl_item ON tbl_item.id_item = tbl_products.iditem
//		inner join
//	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
//		inner join
//	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
//		inner join
//	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
//		inner join
//	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
//		inner join
//	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee
//	where concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%' GROUP BY concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name)";


        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager") {
            $append .="and tbl_employee_has_place.id_physical_place in (select 
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
        AND employee_first_name LIKE '%$q%' {$append}
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

    //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    public function salesReturn() {
        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        $physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        $append = "";
        if (isset($_REQUEST['route_id']) && $_REQUEST['route_id'] != null) {
            $route_id = $_REQUEST['route_id'];
            $append .= "and tbl_territory.id_territory = '$route_id'";
        }
//        if ($userdata == "Distributor") {
//            if (isset($_REQUEST['distributor_id']) && $_REQUEST['distributor_id'] != null) {
//                $distributor_id = $_REQUEST['distributor_id'];
//                $append .= "and tbl_employee_has_place.id_physical_place='$distributor_id'";
//            }
//        }

        if (isset($_REQUEST['distributor_id']) && $_REQUEST['distributor_id'] != null) {
            $distributor_id = $_REQUEST['distributor_id'];
            $append .= "and tbl_employee_has_place.id_physical_place='$distributor_id'";
        }


        if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != null) {
            $item_id = $_REQUEST['item_id'];
            $append .= "and tbl_item.id_item='$item_id'";
        }
        if (isset($_REQUEST['start_date_sr']) && isset($_REQUEST['end_date_sr']) && ($_REQUEST['start_date_sr'] != null && $_REQUEST['start_date_sr'] != null)) {

            $start_date = $_REQUEST['start_date_sr'];
            $end_date = $_REQUEST['end_date_sr'];
            $append .= "and tbl_return_note.added_date between '$start_date' and '$end_date'";
        }
        if ($userdata == "Distributor") {

            $append .= "and tbl_employee_has_place.id_physical_place='$physical_place'";
        }
        // regional manager
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
            echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "and tbl_employee_has_place.id_physical_place in (select 
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
    tbl_return_note.id_return_note,tbl_return_note.added_date, 
    tbl_return_note.added_date,
    
    tbl_return_note_product.id_return_note_product,
    tbl_return_type.return_type,
    tbl_outlet_has_branch.id_outlet,
    tbl_outlet.outlet_name,
    tbl_return_note_product.return_price,
    tbl_return_note_product.return_product_qty,
    tbl_item.item_name,
    tbl_item.id_item,
	tbl_territory.territory_name,
	tbl_division.division_name,
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
        tbl_return_note.added_date
from
    
    tbl_return_note  
        inner join
    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        inner join
    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        
    
        inner join
    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
		inner join
	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
		inner join
	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
		inner join
	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		inner join
	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee where tbl_return_note_product.id_return_type='1' AND tbl_return_note.return_note_status=1 {$append}
	";
//        echo $sql;

        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['salesReturn'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['full_name'] = $row['full_name'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['territory_name'] = $row['territory_name'];
            $subJson['division_name'] = $row['division_name'];
            $subJson['item_name'] = $row['item_name'];
            $subJson['return_price'] = $row['return_price'];
            $subJson['return_product_qty'] = $row['return_product_qty'];
            $subJson['return_value'] = $row['return_value'];
            $subJson['added_date'] = $row['added_date'];
            array_push($json_array['salesReturn'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function getItemForSalesReturn($q, $select) {
        $sql = "select 
    i.id_item, i.item_name
from
    tbl_return_note trn
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
        inner join
    tbl_return_type trt
        inner join
    tbl_products tp ON trnp.id_products = tp.id_products
        inner join
    tbl_item i ON tp.iditem = i.id_item
where
    trn.return_note_status = 1
        and i.item_name like '%%'
        and trt.id_return_type = trnp.id_return_type
        and trnp.id_return_type = 1
        and item_name like '%$q%'
group by i.id_item";

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

    public function getRouteForSalesReturn($q, $select) {
        $sql = $sql = "select 
    
	tbl_territory.territory_name,
	tbl_territory.id_territory
	
from
    tbl_sales_order
        inner join
    tbl_return_note ON tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
        inner join
    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        inner join
    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        inner join
    tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
        inner join
    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
		inner join
	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
		inner join
	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
		inner join
	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		inner join
	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee
	where territory_name like '%$q%'";
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

    public function getDistributorForSalesReturn($q, $select) {
        $sql = "select 
    
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
        tbl_employee.id_employee
from
    tbl_sales_order
        inner join
    tbl_return_note ON tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
        inner join
    tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
        inner join
    tbl_return_type ON tbl_return_note_product.id_return_type = tbl_return_type.id_return_type
        inner join
    tbl_outlet_has_branch ON tbl_return_note.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        inner join
    tbl_sales_order_products ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
        inner join
    tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
        inner join
    tbl_item ON tbl_item.id_item = tbl_products.iditem
		inner join
	tbl_territory on tbl_territory.id_territory= tbl_outlet_has_branch.id_territory
		inner join
	tbl_territory_has_division on tbl_territory_has_division.id_territory = tbl_territory.id_territory
		inner join
	tbl_division on tbl_division.id_division = tbl_territory_has_division.id_division
		inner join
	tbl_employee_has_place on tbl_return_note.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		inner join
	tbl_employee on tbl_employee.id_employee = tbl_employee_has_place.id_employee
	where concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'";

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

    //--------------------------------------- 2013-12-07 -----------------------Viraj Amarasinghe-----------------------------------------


    public function getFreeIssue() {
        $id_employee = $this->session->userdata('id_employee');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        // echo ($id_employeeHas);

        $append = "";
        if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != null) {
            $item_id = $_REQUEST['item_id'];
            $append .= "and ti.id_item = '$item_id'";
        }
        if (isset($_REQUEST['distributor_id']) && $_REQUEST['distributor_id'] != null) {
            $distributor_id = $_REQUEST['distributor_id'];
            $append .= "and ehp.id_physical_place='$distributor_id'";
        }


        if ((isset($_REQUEST['fe_start_date']) && $_REQUEST['fe_start_date'] != null) && (isset($_REQUEST['fe_end_date']) && $_REQUEST['fe_end_date'] != null)) {
            $fe_start_date = $_REQUEST['fe_start_date'];
            $fe_end_date = $_REQUEST['fe_end_date'];
            $append .= "and tso.added_date  between '$fe_start_date' and '$fe_end_date'";
        }

        $user_type = $this->session->userdata('user_type');
        $physical_place = $this->session->userdata('id_physical_place');
        if ($user_type == "Distributor") {
            $append .= "and ehp.id_physical_place ='$physical_place'";

//                 echo $append;
        }

        // regional manager
        if ($user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") {
            //echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "and ehp.id_physical_place in (select 
            distributor_psy_id
        from
            tbl_region_assign tra
                inner join
            tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
        where
            tra.status = 1 and trad.status = 1
                and tra.region_manager_emp_id ='$id_employeeHas')";
        }
        if (isset($_REQUEST['brand_id']) && $_REQUEST['brand_id'] != null) {
            $brand_id = $_REQUEST['brand_id'];
            $append .= "and ti.item_brand_id='$brand_id'";
        }
        if (isset($_REQUEST['item_category_id']) && $_REQUEST['item_category_id'] != null) {
            $item_category_id = $_REQUEST['item_category_id'];
            $append .= "and ti.id_item_category='$item_category_id'";
        }


        $sql = "select 
	concat(te.employee_first_name,' ',te.employee_last_name) as emp_name,
    tso.id_sales_order,
    ti.id_item,
    ti.item_account_code,
    ti.item_name,
    ti.item_no,
    tso.product_qty as free_issue_qty,
    tso.product_price,
    tso.free_qty,
    tso.discount,
    tso.added_date,
    tso.added_time
FROM
    tbl_sales_order
        right join
    tbl_sales_order_products tso ON tbl_sales_order.id_sales_order = tso.id_sales_order
        inner join
    tbl_products tp ON tso.id_products = tp.id_products
        inner join
    tbl_item ti ON tp.iditem = ti.id_item
        inner join
    tbl_employee_has_place ehp ON tbl_sales_order.id_employee_has_place = ehp.id_employee_has_place
inner join tbl_employee te on te.id_employee = ehp.id_employee
where
    tso.sales_order_products_status = 1
        and tbl_sales_order.sales_order_status = 1
        and tso.product_price = '0' 
		and tso.product_qty <> '0'{$append}";

//        echo $sql;




        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['freeIssue'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['added_date'] = $row['added_date'];
            $subJson['added_time'] = $row['added_time'];
            $subJson['free_issue_qty'] = $row['free_issue_qty'];
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['item_name'] = $row['item_name'];
            $subJson['item_no'] = $row['item_no'];
            $subJson['item_account_code'] = $row['item_account_code'];
            $subJson['id_free_issue'] = $row['id_free_issue'];
            $subJson['emp_name'] = $row['emp_name'];
            array_push($json_array['freeIssue'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function getDistributorForFreeIssue($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
            $append .="and tbl_employee_has_place.id_physical_place in (select 
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
        AND employee_first_name LIKE '%$q%'{$append}
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

    public function getFreeIssueByItem($q, $select) {
        $sql = "select 
    temptable.item_name, temptable.id_item
from
    (select 
    tbl_item.item_name, tbl_item.id_item
from
    tbl_sales_order,
    tbl_products,
    tbl_item,
    tbl_sales_order_products
where
    tbl_sales_order_products.id_products = tbl_products.id_products
        and tbl_products.iditem = tbl_item.id_item
group by tbl_products.id_products) temptable
where
    temptable.item_name like '%$q%'";

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

    public function productMovementReport() {
        $userdata = $this->session->userdata('user_type');
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
        $appendLast = '';
        if (isset($_REQUEST['iIdHidden']) && $_REQUEST['iIdHidden'] != null) {
            $appendLast = $_REQUEST['iIdHidden'];
            $appendLast = "and id_item=$appendLast";
        }
        $employe_wise = '';
        $employe_wise1 = '';
        $employe_wise2 = '';
        if (isset($_REQUEST['txt_emp_name_token']) && $_REQUEST['txt_emp_name_token'] != '') {
            $txt_emp_name = $_REQUEST['txt_emp_name_token'];
            $employe_wise = "AND tbl_sales_order.id_employee_has_place ='$txt_emp_name'";
            $employe_wise1 = "and tbl_return_note.id_employee_has_place='$txt_emp_name'";
            $employe_wise2 = "and tbl_employee_has_place.id_employee_has_place='$txt_emp_name'";
        }

//        $phycical='';
//           if (isset($_REQUEST['txt_emp_name_token']) && $_REQUEST['txt_emp_name_token'] != '') {
//            $txt_phy_name = $_REQUEST['txt_emp_name_token'];
//            $phycical = "and tbl_employee_has_place.id_physical_place='$txt_phy_name'";
//            
//        }

        $phycical = '';
        if (isset($_REQUEST['id_physical_place']) && $_REQUEST['id_physical_place'] != '') {
            $txt_phy_name = $_REQUEST['id_physical_place'];
            $phycical_place = "and tbl_store.id_physical_place='$txt_phy_name'";
        }

        if (isset($_REQUEST['brand_id']) && $_REQUEST['brand_id'] != '') {
            $brand_id = $_REQUEST['brand_id'];
            $lastappend .= "and tbl_item.item_brand_id='$brand_id'";
        }
        if (isset($_REQUEST['item_category_name']) && $_REQUEST['item_category_name'] != '') {
            $item_category_name = $_REQUEST['item_category_id'];
            $lastappend .= "and tbl_item.id_item_category='$item_category_name'";
        }

        if ((isset($_REQUEST['sDate']) && isset($_REQUEST['eDate'])) && ($_REQUEST['sDate'] != null && $_REQUEST['eDate'] != null)) {
            $dateOne = $_REQUEST['sDate'];
            $dateTwo = $_REQUEST['eDate'];
            $appendLast1 = "and tbl_sales_order_products.added_date between '$dateOne' and '$dateTwo'";
            $appendLast2 = "AND tbl_return_note_product.added_date between '$dateOne' and '$dateTwo'";
            $appendLast3 = "AND tbl_return_note_product.added_date between '$dateOne' and '$dateTwo'";
            $appendLast4 = "AND tbl_good_received_products.added_date between '$dateOne' and '$dateTwo'";
        }


        /*  $sql = "SELECT 
          `tbl_products`.`id_products`,
          `tbl_item`.`item_name`,
          (SELECT
          SUM(`tbl_sales_order_products`.`product_qty`)
          FROM
          `tbl_sales_order_products`
          INNER JOIN
          `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
          WHERE
          `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
          and tbl_sales_order_products.sales_order_products_status = 1
          {$appendLast1} {$employe_wise}
          GROUP BY `tbl_sales_order_products`.`id_products`) AS salesqty,
          (SELECT
          SUM(`tbl_return_note_product`.`return_product_qty`)
          FROM
          `tbl_return_note`
          INNER JOIN
          `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
          WHERE
          `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
          AND `tbl_return_note_product`.`id_return_type` = 2
          AND tbl_return_note_product.return_product_status = 1
          {$appendLast2}
          GROUP BY `tbl_return_note_product`.`id_products`) AS marketreturns,
          (SELECT
          SUM(`tbl_return_note_product`.`return_product_qty`)
          FROM
          `tbl_return_note`
          INNER JOIN
          `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
          WHERE
          `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
          AND `tbl_return_note_product`.`id_return_type` = 1
          AND tbl_return_note_product.return_product_status = 1
          {$appendLast3}
          GROUP BY `tbl_return_note_product`.`id_products`) AS salesreturns,
          (SELECT
          SUM(tbl_good_received_products.received_qty)
          FROM
          tbl_good_received_products tbl_good_received_products
          INNER JOIN
          tbl_good_received tbl_good_received ON tbl_good_received_products.id_good_received = tbl_good_received.id_good_received
          where
          tbl_good_received_products.id_products = tbl_products.id_products
          AND tbl_good_received.good_received_status = 1
          {$appendLast4}
          GROUP BY tbl_good_received_products.id_products) AS GRN,
          (SELECT
          SUM(tbl_stock.qty)
          FROM
          tbl_stock
          where
          tbl_stock.id_products = tbl_products.id_products
          and tbl_stock.stock_status = 1
          GROUP BY tbl_stock.id_products) AS StockQty
          FROM
          `tbl_products`,
          `tbl_item`
          WHERE
          `tbl_products`.`iditem` = `tbl_item`.`id_item` {$appendLast}"; */


        $sql = "SELECT 
    `tbl_products`.`id_products`,
    `tbl_item`.`item_name`,
    ifnull((SELECT 
            round(SUM(`tbl_sales_order_products`.`product_qty`),0)
        FROM
        `tbl_sales_order_products`
         INNER JOIN
        `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
	inner join
	tbl_employee_has_place on tbl_sales_order.id_employee_has_place=tbl_employee_has_place.id_employee_has_place        WHERE
            `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
                and tbl_sales_order_products.sales_order_products_status = 1
                and tbl_sales_order_products.product_price !=0
				and tbl_sales_order.sales_order_status=1
                {$appendLast1} {$employe_wise} {$query_append}
        GROUP BY `tbl_sales_order_products`.`id_products`),0) AS salesqty,
    ifnull((SELECT 
            round(SUM(`tbl_return_note_product`.`return_product_qty`),0)
        FROM
            tbl_employee_has_place
				inner join
            `tbl_return_note` on tbl_employee_has_place.id_employee_has_place=tbl_return_note.id_employee_has_place
                 INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
                AND `tbl_return_note_product`.`id_return_type` = 2
                AND tbl_return_note_product.return_product_status = 1
				and tbl_return_note.return_note_status=1
                {$appendLast2} {$employe_wise1} {$query_append}
        GROUP BY `tbl_return_note_product`.`id_products`),0) AS marketreturns,
    ifnull((SELECT 
            round(SUM(`tbl_return_note_product`.`return_product_qty`),0)
        FROM
            tbl_employee_has_place
				inner join
            `tbl_return_note` on tbl_employee_has_place.id_employee_has_place=tbl_return_note.id_employee_has_place
                INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
                AND `tbl_return_note_product`.`id_return_type` = 1
                AND tbl_return_note_product.return_product_status = 1
				and tbl_return_note.return_note_status=1
                {$appendLast3}{$employe_wise1} {$query_append}
        GROUP BY `tbl_return_note_product`.`id_products`),0) AS salesreturns,
    ifnull((SELECT 
            round(SUM(tbl_good_received_products.received_qty),0)
        FROM
             tbl_good_received_products tbl_good_received_products
                INNER JOIN
            tbl_good_received tbl_good_received ON tbl_good_received_products.id_good_received = tbl_good_received.id_good_received
                inner join
            tbl_dilivery_note ON tbl_good_received.id_dilivery_note = tbl_dilivery_note.id_dilivery_note
                inner join
            tbl_purchase_order ON tbl_dilivery_note.id_purchase_order = tbl_purchase_order.id_purchase_order
				inner join
			tbl_employee_has_place on tbl_purchase_order.id_employee_has_place=tbl_employee_has_place.id_employee_has_place
        where
            tbl_good_received_products.id_products = tbl_products.id_products
                AND tbl_good_received.good_received_status = 1
                {$appendLast4}{$employe_wise2} {$query_append}
        GROUP BY tbl_good_received_products.id_products),0.00) AS GRN,
        
ifnull((select 

   round(sum(tbl_sales_order_products.product_qty),0) 

FROM        
     `tbl_sales_order_products` 
                        INNER JOIN
                    `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
                        inner join
                    tbl_employee_has_place ON tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
	where
tbl_sales_order_products.id_products=tbl_products.id_products
   and tbl_sales_order_products.sales_order_products_status = 1
        and tbl_sales_order_products.product_price = '0' 
{$appendLast1} {$employe_wise} {$query_append}        
group by  tbl_sales_order_products.id_products),0)as free_issue
,
 
    ifnull((SELECT 
            SUM(tbl_stock.qty)
        FROM
            tbl_employee_has_place
        inner join
    tbl_employee on tbl_employee_has_place.id_employee= tbl_employee.id_employee
        inner join
    tbl_store ON tbl_employee.id_employee_registration = tbl_store.id_employee_registration
        inner join
    tbl_stock ON tbl_store.id_store = tbl_stock.id_store
                
        where
            tbl_stock.id_products = tbl_products.id_products
                and tbl_stock.stock_status = 1 {$phycical_place} {$query_append}
        GROUP BY tbl_stock.id_products),0) AS StockQty
FROM
    `tbl_products`,
    `tbl_item`
WHERE
    `tbl_products`.`iditem` = `tbl_item`.`id_item`  {$appendLast} {$lastappend}
    ";

        // echo $sql;

        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_item'] = $row['id_products'];
            $subJson['item_name'] = $row['item_name'];
            $subJson['product_qty'] = $row['salesqty'];
            $subJson['GRN'] = $row['GRN'];
            $subJson['free_issue'] = $row['free_issue'];
            $subJson['Return_Market_Return'] = $row['marketreturns'];
            $subJson['Return_SAles_Return'] = $row['salesreturns'];
            $subJson['StockQty'] = $row['StockQty'];





            array_push($json_array['report'], $subJson);
        }

        $productMovementReportJson = json_encode($json_array);
        return $productMovementReportJson;
    }

    public function getOutletNamesForSalesOrder($q, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Distributor") {
            $append = "where tehp.id_physical_place = '$id_physical_place'";
        }
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append = "and tehp.id_physical_place in (select 
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
    distinct
    tohc.id_outlet, ou.outlet_name
FROM
    tbl_sales_order tso
        inner join
    tbl_employee_has_place tehp ON tso.id_employee_has_place = tehp.id_employee_has_place
        inner join
    tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch = tohc.id_outlet_has_branch
inner join tbl_outlet ou on ou.id_outlet= tohc.id_outlet 
where ou.outlet_name like '%$q%' {$append}";



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

    public function getTerritoryNamesForSalesOrder($q, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Distributor") {
            $append = "where tehp.id_physical_place = '$id_physical_place'";
        }
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
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
//        echo $append;

        $sql = "SELECT distinct
    tehp.id_territory,tr.territory_name
FROM
    tbl_sales_order tso
        inner join
    tbl_employee_has_place tehp ON tso.id_employee_has_place = tehp.id_employee_has_place
        inner join
    tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch = tohc.id_outlet_has_branch
        inner join
    tbl_territory tr ON tehp.id_territory = tr.id_territory
where tr.territory_name like '%$q%' {$append} {$query_append}";

//    echo $sql;
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

    /* public function timeReport() {
      $appendLast = '';


      /*  $sql = "select
      first_order_id,
      last_order_id,
      id_employee as main_id_employee,
      full_name,
      fadded_date,
      fadded_time,
      fadded_timestamp,
      ladded_date,
      ladded_time,
      ladded_timestamp,
      (SELECT
      SUM(`tbl_return_note_product`.`return_price` * `tbl_return_note_product`.`return_product_qty`) as returntotal
      FROM
      `tbl_return_note`,
      `tbl_return_note_product`,
      tbl_sales_order,
      tbl_employee_has_place,
      tbl_employee
      WHERE
      tbl_return_note.id_return_note = tbl_return_note_product.id_return_note
      and tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order
      and tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
      and tbl_employee_has_place.id_employee = tbl_employee.id_employee
      and tbl_employee.id_employee = main_id_employee
      group by tbl_employee.id_employee) as return_total,
      (select
      count(tbl_sales_order.id_sales_order)
      from
      tbl_sales_order
      where
      tbl_sales_order.added_date between fadded_date and ladded_date) as no_of_orders,
      (select
      (sum((tbl_sales_order_products.product_price * tbl_sales_order_products.product_qty) - (tbl_sales_order_products.discount)) - return_total) as sum
      from
      tbl_sales_order_products
      where
      tbl_sales_order_products.added_date between fadded_date and ladded_date) as bill_value,
      (select
      tbl_outlet.outlet_name
      from
      tbl_outlet,
      tbl_employee_has_place,
      tbl_outlet_has_branch,
      tbl_sales_order
      where
      tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
      and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
      and tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
      and tbl_sales_order.id_sales_order = last_order_id) as last_order_outlet,
      (select
      tbl_outlet.outlet_name
      from
      tbl_outlet,
      tbl_employee_has_place,
      tbl_outlet_has_branch,
      tbl_sales_order
      where
      tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
      and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
      and tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
      and tbl_sales_order.id_sales_order = first_order_id) as first_order_outlet,
      (select
      timestampdiff(second,
      fadded_timestamp,
      ladded_timestamp)
      ) as hours
      from
      tbl_sales_order,
      (select
      first_order_id,
      last_order_id,
      id_employee,
      full_name,
      (select tbl_sales_order.added_date from tbl_sales_order where tbl_sales_order.id_sales_order=first_order_id ) as fadded_date,
      (select tbl_sales_order.added_date from tbl_sales_order where tbl_sales_order.id_sales_order=last_order_id ) as ladded_date,
      (select tbl_sales_order.added_time from tbl_sales_order where tbl_sales_order.id_sales_order=first_order_id ) as fadded_time,
      (select tbl_sales_order.added_time from tbl_sales_order where tbl_sales_order.id_sales_order=last_order_id ) as ladded_time,
      (select tbl_sales_order.added_timestamp from tbl_sales_order where tbl_sales_order.id_sales_order=first_order_id ) as fadded_timestamp,
      (select tbl_sales_order.added_timestamp from tbl_sales_order where tbl_sales_order.id_sales_order=last_order_id ) as ladded_timestamp
      from
      tbl_sales_order, (select
      MIN(tbl_sales_order.id_sales_order) as first_order_id,
      MAX(tbl_sales_order.id_sales_order) as last_order_id,
      tbl_employee_has_place.id_employee,
      concat(tbl_employee.employee_first_name, ' ', tbl_employee.employee_last_name) as full_name
      from
      tbl_sales_order, tbl_employee_has_place, tbl_employee
      where
      tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
      and tbl_employee.id_employee = tbl_employee_has_place.id_employee {$appendLast}
      group by tbl_sales_order.id_employee_has_place) tmp
      where
      id_sales_order = tmp.first_order_id) tmp2
      where
      id_sales_order = tmp2.last_order_id
      ";


      $sql = "select
      concat(em.employee_first_name,
      ' ',
      em.employee_last_name) as fullname,
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
      and so1.added_date = '2014-03-05'
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
      and so1.added_date = '2014-03-05'
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
      and so1.added_date = '2014-03-05'
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
      and so1.added_date = '2014-03-05'
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
      and so1.added_date = '2014-03-05'
      order by so1.id_sales_order desc
      limit 1) as lastoutlettime,
      (TIMEDIFF(@ft,@lt))as timediff,
      ou.outlet_name,
      (select
      sum((sop.product_price * sop.product_qty) - sop.discount)
      from
      tbl_sales_order_products sop
      where
      sop.id_sales_order = so.id_sales_order
      and so.added_date = '2014-03-05') as tot,
      count(ou.id_outlet)as count
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
      where
      so.added_date = '2014-03-05'
      group by em.id_employee";

      $sql;
      $query = $this->db->query($sql);


      $result = $query->result('array');


      $json_array = array();
      $json_array['report'] = array();
      foreach ($result as $row) {
      $subJson = array();
      $subJson['first_order_id'] = $row['first_order_id'];
      $subJson['last_order_id'] = $row['last_order_id'];
      $subJson['fadded_date'] = $row['fadded_date'];
      $subJson['ladded_date'] = $row['ladded_date'];
      $subJson['ladded_time'] = $row['ladded_time'];
      $subJson['fadded_time'] = $row['fadded_time'];
      $subJson['bill_value'] = $row['bill_value'];
      $subJson['no_of_orders'] = $row['no_of_orders'];
      $subJson['first_order_outlet'] = $row['first_order_outlet'];
      $subJson['last_order_outlet'] = $row['last_order_outlet'];
      $subJson['full_name'] = $row['full_name'];
      $subJson['ladded_timestamp'] = $row['ladded_timestamp'];
      $subJson['fadded_timestamp'] = $row['fadded_timestamp'];
      $subJson['hours'] = $row['hours'];
      array_push($json_array['report'], $subJson);
      }

      $productMovementReportJson = json_encode($json_array);
      return $productMovementReportJson;
      } */

    public function timeReport() {
          $time = date("H:i:s"); 
        $appendLast = '';
        if (isset($_REQUEST['time_report_employee_id']) && $_REQUEST['time_report_employee_id'] != null) {
            if($_REQUEST['idempType']==3){
                 $emp = $_REQUEST['time_report_employee_id'];
                 $append .= "and em.id_employee='$emp' ";
            }  else {
                $empphy = $_REQUEST['idphy'];
                 $append .= "and ehp.id_physical_place='$empphy' ";
            }
           
            
        }

        if (isset($_REQUEST['start_order_date']) && $_REQUEST['start_order_date'] != null) {
            $dateOne = $_REQUEST['start_order_date'];
            $appendLast="";

            $appendLast .= "and tem.added_date = '$dateOne'";
            $appendLast1 .= "and so.added_date= '$dateOne'";
//            $appendLast2 .= "where so.added_date ='$dateOne'";
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
                {$appendLast}
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
                {$appendLast}
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
                {$appendLast}
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
                {$appendLast}
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
                {$appendLast}
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
                    and so1.sales_order_status = 1 ) as tem
        where
            tem.id_employee_has_place = ehp.id_employee_has_place
                {$appendLast} ) as count,
                    

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
                {$appendLast} ) as unpro
                    

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
    ou.outlet_status = 1
        and sop.sales_order_products_status = 1
        and so.sales_order_status = 1
        and tet.employee_type != 'Distributor'
       
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
            $subJson['unpro'] = $row['unpro'];
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
            tbl_employee.employee_last_name) as full_name,
    tbl_employee.id_employee_type,
	tbl_employee_has_place.id_physical_place
    from
    tbl_sales_order,
    tbl_employee_has_place,
    tbl_employee
where
    tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee and concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) like '%$q%' {$query_append}
	
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

    //---------------------------------------- poya day ---------------------------------------------------------------------

    public function unproductiveCall() {
        $userdata = $this->session->userdata('user_type');
        $disPhy = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }
        $appendLast = '';
        if ($userdata == "Distributor") {
            $appendLast .=" and tbl_employee_has_place.id_physical_place='$disPhy'";
        }
        if (isset($_REQUEST['outlet_id_uc']) && $_REQUEST['outlet_id_uc'] != null) {
            $emp = $_REQUEST['outlet_id_uc'];
            $appendLast .= " and tbl_outlet.id_outlet=$emp";
        }

        if (isset($_REQUEST['emp_id_uc']) && $_REQUEST['emp_id_uc'] != null) {
            $emp = $_REQUEST['emp_id_uc'];
            $appendLast .= " and tbl_employee.id_employee=$emp";
        }

        if ((isset($_REQUEST['start_date_ucs'])) && ($_REQUEST['start_date_ucs'] != null)) {
            $dateOne = $_REQUEST['start_date_ucs'];

            $appendLast .= " and tbl_unproduct.added_date = '$dateOne' ";
        }


        $sql = "SELECT 
    concat(tbl_employee.`employee_first_name`,
            ' ',
            tbl_employee.`employee_last_name`) as full_name,
    tbl_unproduct.`id_employee_has_place`,
    tbl_unproduct.`remarks`,
    tbl_unproduct.`branch_id`,
    tbl_unproduct.`added_date`,
    tbl_unproduct.`added_time`,
    tbl_outlet.outlet_name
from
    tbl_unproduct,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_employee_registration,
    tbl_user,
    tbl_user_type
where
    tbl_employee_has_place.`id_employee` = tbl_employee.`id_employee`
        and tbl_employee_has_place.id_employee_has_place = tbl_unproduct.`id_employee_has_place`
        and tbl_unproduct.branch_id = tbl_outlet_has_branch.id_outlet_has_branch
        and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        and tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_user_type = tbl_user_type.id_user_type
         {$appendLast} {$append}
order by tbl_unproduct.id_unproduct desc
";
        //echo $sql;
        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['full_name'] = $row['full_name'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['remarks'] = $row['remarks'];
            $subJson['added_date'] = $row['added_date'];
            $subJson['added_time'] = $row['added_time'];

            array_push($json_array['report'], $subJson);
        }
        $json_encode = json_encode($json_array);
        return $json_encode;
    }

    public function search_by_employee_report_unproductive_call($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $disPhy = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }
        $sql = "SELECT distinct
    concat(tbl_employee.`employee_first_name`,
            ' ',
            tbl_employee.`employee_last_name`) as full_name,
    tbl_employee.id_employee
from
    tbl_unproduct,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_employee_registration,
    tbl_user,
    tbl_user_type
where
    tbl_employee_has_place.`id_employee` = tbl_employee.`id_employee`
        and tbl_employee_has_place.id_employee_has_place = tbl_unproduct.`id_employee_has_place`
        and tbl_unproduct.branch_id= tbl_outlet_has_branch.id_outlet_has_branch
        and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        and tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_user_type = tbl_user_type.id_user_type
         and concat(tbl_employee.`employee_first_name`,
            ' ',
            tbl_employee.`employee_last_name`) like '%$q%' {$append} ";

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

    public function search_by_outlet_report_unproductive_call($q, $select) {
        $sql = "SELECT distinct
    
    tbl_outlet.outlet_name,
	tbl_outlet.id_outlet
from
    tbl_unproduct,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_employee_registration,
    tbl_user,
    tbl_user_type
where
    tbl_employee_has_place.`id_employee` = tbl_employee.`id_employee`
        and tbl_employee_has_place.id_employee_has_place = tbl_unproduct.`id_employee_has_place`
        and tbl_unproduct.branch_id = tbl_outlet_has_branch.id_outlet_has_branch
        and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        and tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_employee_registration = tbl_employee_registration.id_employee_registration
        and tbl_user.id_user_type = tbl_user_type.id_user_type
        and tbl_outlet.outlet_name like '%$q%'";

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

    public function viewSalesOrderByter($adat) {
        $appen = '';
        if (isset($_POST['txt_idter_name']) && $_POST['txt_idter_name'] != '') {
            $txt_ter_name = $_POST['txt_idter_name'];
            $appen .= " and tbl_terotery_wise_target.id_territory='$txt_ter_name' ";
        }

        if (isset($_POST['txt_idter_name']) && $_POST['txt_idter_name'] != '' && isset($_POST['txttrend_date']) && $_POST['txttrend_date'] != '') {
            $txttren_date = $_POST['txttren_date'];
            $txttrend_date = $_POST['txttrend_date'];
            $appen .= " and tbl_terotery_wise_target.id_territory='$txt_ter_name' AND tbl_terotery_wise_target.added_date between '$txttren_date' AND '$txttrend_date'";
        }
        $sql = "SELECT tbl_terotery_wise_target.added_time,tbl_terotery_wise_target.target_en_date,tbl_terotery_wise_target.target_st_date,tbl_item.item_name,tbl_terotery_wise_target.added_date,tbl_terotery_wise_target.product_qty ,tbl_territory.territory_name ,tbl_products.product_price  FROM tbl_terotery_wise_target INNER JOIN tbl_territory ON tbl_territory.id_territory = tbl_terotery_wise_target.id_territory INNER JOIN tbl_products ON tbl_products.id_products = tbl_terotery_wise_target.id_products INNER JOIN tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_terotery_wise_target.status=:status {$appen} ORDER BY tbl_terotery_wise_target.added_date DESC";

        return $result = $this->db->mod_select($sql, $adat, PDO::FETCH_ASSOC);
    }

    public function viewSalesOrderByteremploye($adat) {
        $userdata = $this->session->userdata('user_type');
        $id_employee_has_place = $this->session->userdata('id_employee_has_place');

        $appen = '';
        $appendWhere = '';

        if ($userdata == "Sales Rep") {
            //echo $userdata;
            $appen .= " and tbl_employye_wise_target.id_employee_has_place='$id_employee_has_place'";
        }

        if ($userdata != "Sales Rep") {
            if (isset($_POST['txt_isfsdfdter_name']) && $_POST['txt_isfsdfdter_name'] != '') {
                $txt_ter_name = $_POST['txt_isfsdfdter_name'];
                $appen = " and tbl_employye_wise_target.id_employee_has_place='$txt_ter_name' ";
            }
        }

        if (isset($_POST['txt_isfsdfdter_name']) && $_POST['txt_isfsdfdter_name'] != '' && isset($_POST['txttrend_date']) && $_POST['txttrend_date'] != '') {
            $txttren_date = $_POST['txttren_date'];
            $txttrend_date = $_POST['txttrend_date'];
            $appen .= " and tbl_employye_wise_target.id_employee_has_place='$txt_ter_name' AND tbl_employye_wise_target.added_date between '$txttren_date' AND '$txttrend_date'";
        }
        $sql = "SELECT tbl_employye_wise_target.added_time,tbl_employye_wise_target.target_en_date,tbl_employye_wise_target.target_st_date,tbl_item.item_name,tbl_employye_wise_target.added_date,tbl_employye_wise_target.qty ,CONCAT(tbl_employee.employee_first_name, ' ',tbl_employee.employee_last_name ) as fullname ,tbl_products.product_price  FROM tbl_employye_wise_target INNER JOIN tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_employye_wise_target.id_employee_has_place INNER JOIN  tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee INNER JOIN tbl_products ON tbl_products.id_products = tbl_employye_wise_target.id_products INNER JOIN tbl_item ON tbl_item.id_item = tbl_products.iditem where tbl_employye_wise_target.status=:status  {$appen} ORDER BY tbl_employye_wise_target.added_date DESC";

        return $result = $this->db->mod_select($sql, $adat, PDO::FETCH_ASSOC);
    }

    /*
     * sammera 2013-12-21
     * 
     */

    public function targetVsAchievement() {


        $appendLast2 = '';

        if (isset($_REQUEST['item_ter_id']) && $_REQUEST['item_ter_id'] != null) {
            $emp = $_REQUEST['item_ter_id'];
            $appendLast2 .= "and tbl_item.id_item=$emp";
        }


        if (isset($_REQUEST['ter_id']) && $_REQUEST['ter_id'] != null) {
            $emp = $_REQUEST['ter_id'];
            $appendLast2 .= "and tbl_territory.id_territory=$emp";
        }

        $sql = "select 
    tbl_terotery_wise_target.id_products, tbl_item.item_name,tbl_products.product_price,
	tbl_terotery_wise_target.target_st_date,tbl_terotery_wise_target.target_en_date,tbl_terotery_wise_target.added_date,tbl_terotery_wise_target.added_time,
(SELECT 
            SUM(`tbl_sales_order_products`.`product_qty`)
        FROM
            `tbl_sales_order_products`
                INNER JOIN
            `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        WHERE
            `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
                and tbl_sales_order_products.sales_order_products_status = 1
                
        GROUP BY `tbl_sales_order_products`.`id_products`) AS salesqty,
(SELECT 
            SUM(`tbl_sales_order_products`.`product_price` * `tbl_sales_order_products`.`product_qty`)
        FROM
            `tbl_sales_order_products`
                INNER JOIN
            `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        WHERE
            `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
                and tbl_sales_order_products.sales_order_products_status = 1
                
        GROUP BY `tbl_sales_order_products`.`id_products`) AS total_price,
(SELECT 
            SUM(`tbl_terotery_wise_target`.`product_qty`)
        ) AS targetqty,
(select 
    tbl_territory.territory_name
from
    tbl_territory
    
where
    tbl_territory.id_territory = tbl_terotery_wise_target.id_territory
group by tbl_terotery_wise_target.id_ter_wise_target  ) as teritory,
(SELECT 
            SUM(`tbl_return_note_product`.`return_product_qty`* tbl_return_note_product.return_price)
        FROM
            `tbl_return_note`
                INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
              
                AND tbl_return_note_product.return_product_status = 1
               
        GROUP BY `tbl_return_note_product`.`id_products`) AS returns_price,
(SELECT 
            SUM(`tbl_return_note_product`.`return_product_qty`)
        FROM
            `tbl_return_note`
                INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
              
                AND tbl_return_note_product.return_product_status = 1
               
        GROUP BY `tbl_return_note_product`.`id_products`) AS returns_qty,
(SELECT 
            concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp
        FROM
            `tbl_employee_has_place`
                INNER JOIN
            `tbl_employee` ON `tbl_employee_has_place`.`id_employee` = `tbl_employee`.`id_employee`
        WHERE
            `tbl_employee_has_place`.`id_territory` = `tbl_terotery_wise_target`.`id_territory` 
        GROUP BY `tbl_terotery_wise_target`.`id_territory`) AS employee

from
    tbl_terotery_wise_target,
    tbl_item,
    tbl_products,
	tbl_territory
where
    tbl_terotery_wise_target.id_products = tbl_products.id_products
and tbl_products.iditem = tbl_item.id_item 
and tbl_territory.id_territory = tbl_terotery_wise_target.id_territory {$appendLast2}
   group by   tbl_terotery_wise_target.id_products";


        //echo $sql;
        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['item_name'] = $row['item_name'];
            $subJson['salesqty'] = $row['salesqty'];
            $subJson['teritory'] = $row['teritory'];
            $subJson['returns_qty'] = $row['returns_qty'];
            $subJson['returns_price'] = $row['returns_price'];
            $subJson['total_price'] = $row['total_price'];
            $subJson['targetqty'] = $row['targetqty'];
            $subJson['employee'] = $row['employee'];
            $subJson['product_price'] = $row['product_price'];
            $subJson['target_st_date'] = $row['target_st_date'];
            $subJson['target_en_date'] = $row['target_en_date'];
            $subJson['added_date'] = $row['added_date'];
            $subJson['added_time'] = $row['added_time'];


            array_push($json_array['report'], $subJson);
        }
        $json_encode = json_encode($json_array);
        return $json_encode;
    }

    public function search_by_ter_for_targetAchievement($q, $select) {



        $sql = "select 
    distinct

tbl_territory.id_territory,
tbl_territory.territory_name

from
    tbl_terotery_wise_target,
    tbl_item,
    tbl_products,
	tbl_territory
where
    tbl_terotery_wise_target.id_products = tbl_products.id_products
and tbl_products.iditem = tbl_item.id_item 
and tbl_territory.id_territory = tbl_terotery_wise_target.id_territory and tbl_territory.territory_name like '%$q%'
   group by   tbl_terotery_wise_target.id_products  ";

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

    public function search_by_item_for_targetAchievement($q, $select) {
        $sql = "select distinct 
     tbl_item.item_name,tbl_item.id_item,

(select 
    tbl_territory.territory_name
from
    tbl_territory
    
where
    tbl_territory.id_territory = tbl_terotery_wise_target.id_territory
group by tbl_terotery_wise_target.id_ter_wise_target) as teritory,
(select 
    tbl_territory.id_territory
from
    tbl_territory
    
where
    tbl_territory.id_territory = tbl_terotery_wise_target.id_territory 
group by tbl_terotery_wise_target.id_ter_wise_target ) as teritory_id,


(SELECT 
            tbl_employee.employee_first_name
        FROM
            `tbl_employee_has_place`
                INNER JOIN
            `tbl_employee` ON `tbl_employee_has_place`.`id_employee` = `tbl_employee`.`id_employee`
        WHERE
            `tbl_employee_has_place`.`id_territory` = `tbl_terotery_wise_target`.`id_territory`
        GROUP BY `tbl_terotery_wise_target`.`id_territory`) AS employee

from
    tbl_terotery_wise_target,
    tbl_item,
    tbl_products
where
    tbl_terotery_wise_target.id_products = tbl_products.id_products
and tbl_products.iditem = tbl_item.id_item  and tbl_item.item_name like '%$q%'
   group by   tbl_terotery_wise_target.id_products";

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

    public function search_by_emp_for_targetAchievement($q, $select) {
        $sql = "select distinct 
     
(SELECT concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name
        FROM
            `tbl_employee_has_place`
                INNER JOIN
            `tbl_employee` ON `tbl_employee_has_place`.`id_employee` = `tbl_employee`.`id_employee`
        WHERE
            `tbl_employee_has_place`.`id_territory` = `tbl_terotery_wise_target`.`id_territory` and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'
        GROUP BY `tbl_terotery_wise_target`.`id_territory`  ) AS employee,
        
(SELECT 
            tbl_employee.id_employee
        FROM
            `tbl_employee_has_place`
                INNER JOIN
            `tbl_employee` ON `tbl_employee_has_place`.`id_employee` = `tbl_employee`.`id_employee`
        WHERE
            `tbl_employee_has_place`.`id_territory` = `tbl_terotery_wise_target`.`id_territory` 
        GROUP BY `tbl_terotery_wise_target`.`id_territory` ) AS id_employee

from
    tbl_terotery_wise_target,
    tbl_item,
    tbl_products
where
    tbl_terotery_wise_target.id_products = tbl_products.id_products
and tbl_products.iditem = tbl_item.id_item 
   group by   tbl_terotery_wise_target.id_products




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

    public function targetVsAchievementEmployeeWise() {
        $userdata = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        $appendLast = '';
        if (isset($_REQUEST['item_tar_id']) && $_REQUEST['item_tar_id'] != null) {
            $emp = $_REQUEST['item_tar_id'];
            $appendLast .= "and tbl_item.id_item=$emp";
        }
        if ($userdata != "Distributor") {
            if (isset($_REQUEST['emp_id']) && $_REQUEST['emp_id'] != null) {

                $emp = $_REQUEST['emp_id'];
                $appendLast .= "and tbl_employee.id_employee=$emp";
            }
        }
        if ($userdata == "Distributor" || $userdata == "Sales Rep") {

            $appendLast .= "AND tbl_employee.id_employee='$id_employee'";
        }




        $sql = "SELECT (SELECT 
            SUM(`tbl_sales_order_products`.`product_qty`)
        FROM
            `tbl_sales_order_products`
                INNER JOIN
            `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        WHERE
            `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
                and tbl_sales_order_products.sales_order_products_status = 1
                
        GROUP BY `tbl_sales_order_products`.`id_products`) AS salesqty,
(SELECT 
            SUM(`tbl_sales_order_products`.`product_qty` * tbl_sales_order_products.product_price)
        FROM
            `tbl_sales_order_products`
                INNER JOIN
            `tbl_sales_order` ON `tbl_sales_order_products`.`id_sales_order` = `tbl_sales_order`.`id_sales_order`
        WHERE
            `tbl_sales_order_products`.`id_products` = `tbl_products`.`id_products`
                and tbl_sales_order_products.sales_order_products_status = 1
                
        GROUP BY `tbl_sales_order_products`.`id_products`) AS total_price,
(SELECT 
            SUM(`tbl_return_note_product`.`return_product_qty`)
        FROM
            `tbl_return_note`
                INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
              
                AND tbl_return_note_product.return_product_status = 1
               
        GROUP BY `tbl_return_note_product`.`id_products`) AS returns_qty,
(SELECT 
            SUM(`tbl_return_note_product`.`return_product_qty` * tbl_return_note_product.return_price)
        FROM
            `tbl_return_note`
                INNER JOIN
            `tbl_return_note_product` ON `tbl_return_note`.`id_return_note` = `tbl_return_note_product`.`id_return_note`
        WHERE
            `tbl_return_note_product`.`id_products` = `tbl_products`.`id_products`
              
                AND tbl_return_note_product.return_product_status = 1
               
        GROUP BY `tbl_return_note_product`.`id_products`) AS returns_price,

tbl_products.product_price,
tbl_employye_wise_target.`id_products`,tbl_employye_wise_target.`qty`,tbl_employye_wise_target.`id_employee_has_place`,tbl_employye_wise_target.`target_en_date`,tbl_employye_wise_target.`target_st_date`,tbl_employye_wise_target.`added_date`,tbl_employye_wise_target.`added_time`, tbl_item.`item_name`,concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name  FROM `tbl_employye_wise_target`,tbl_employee_has_place,tbl_employee, tbl_products,tbl_item
WHERE tbl_employye_wise_target.`status`=1 and tbl_employye_wise_target.`id_employee_has_place`= tbl_employee_has_place.`id_employee_has_place` and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and  tbl_products.`id_products` =  tbl_employye_wise_target.`id_products` and tbl_products.`iditem` = tbl_item.id_item {$appendLast}";



        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['full_name'] = $row['full_name'];
            $subJson['item_name'] = $row['item_name'];
            $subJson['salesqty'] = $row['salesqty'];
            $subJson['product_price'] = $row['product_price'];
            $subJson['returns_qty'] = $row['returns_qty'];
            $subJson['returns_price'] = $row['returns_price'];
            $subJson['total_price'] = $row['total_price'];
            $subJson['qty'] = $row['qty'];
            $subJson['target_en_date'] = $row['target_en_date'];
            $subJson['target_st_date'] = $row['target_st_date'];
            $subJson['added_date'] = $row['added_date'];
            $subJson['added_time'] = $row['added_time'];

            array_push($json_array['report'], $subJson);
        }
        $json_encode = json_encode($json_array);
        return $json_encode;
    }

    public function search_by_emp_targetVsAch($q, $select) {
        $sql = "SELECT distinct  concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,tbl_employee.`id_employee` FROM `tbl_employye_wise_target`,tbl_employee_has_place,tbl_employee, tbl_products,tbl_item
WHERE tbl_employye_wise_target.`status`=1 and tbl_employye_wise_target.`id_employee_has_place`= tbl_employee_has_place.`id_employee_has_place` and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and  tbl_products.`id_products` =  tbl_employye_wise_target.`id_products` and tbl_products.`iditem` = tbl_item.id_item
and  concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name)   like '%$q%'";

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

    public function search_by_item_targetVsAch($q, $select) {
        $sql = "SELECT distinct  tbl_item.item_name, tbl_item.id_item FROM `tbl_employye_wise_target`,tbl_employee_has_place,tbl_employee, tbl_products,tbl_item
WHERE tbl_employye_wise_target.`status`=1 and tbl_employye_wise_target.`id_employee_has_place`= tbl_employee_has_place.`id_employee_has_place` and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and  tbl_products.`id_products` =  tbl_employye_wise_target.`id_products` and tbl_products.`iditem` = tbl_item.id_item
and   tbl_item.item_name  like '%$q%'";

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

    public function chequeDetails() {

        // echo $_REQUEST['txttren_date'];
        // echo $_REQUEST['txttrend_date'];

        $userdata = $this->session->userdata('id_user');
        $usertype = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        $appendLast = '';
        $datarange = '';
        if (isset($_REQUEST['outlet_id']) && $_REQUEST['outlet_id'] != null) {
            $emp = $_REQUEST['outlet_id'];
            $appendLast .= " and tbl_outlet.id_outlet=$emp";
        }

        if (isset($_REQUEST['emp_id']) && $_REQUEST['emp_id'] != null) {
            $emp = $_REQUEST['emp_id'];
            $appendLast .= " and tbl_employee.id_employee=$emp";
        }

        if (isset($_POST['txttren_date']) && $_POST['txttren_date'] != '') {
            $start_date = $_REQUEST['txttren_date'];
            $end_date = $_REQUEST['txttrend_date'];
            $datarange = " and tbl_cheque_payment.added_date BETWEEN '$start_date' AND '$end_date'";
        }



        if (isset($_REQUEST['status']) && $_REQUEST['status'] != null) {

            $emp = $_REQUEST['status'];
            if ($emp == 3) {
                $appendLast .= "";
            } else {
                $appendLast .= " and tbl_cheque_payment.realized_status=$emp";
            }
        }

        $sql2 = "select tbl_employee.id_employee from tbl_employee,tbl_user where
 tbl_employee.id_employee_registration = tbl_user.id_employee_registration
and tbl_user.id_user= '$userdata'";
        $query2 = $this->db->query($sql2);
        $result2 = $query2->result('array');
        $emp_id = $result2[0]['id_employee'];

        $sql1 = "SELECT tbl_user.id_user_type FROM cl_distributorhayleys2.tbl_user
where tbl_user.id_user='$userdata';";
        $query1 = $this->db->query($sql1);
        $result1 = $query1->result('array');
        $user_type = $result1[0]['id_user_type'];
        //echo $user_type;
        $sql = '';
        if ($this->session->userdata('user_type') == "Distributor") {
            //echo "2";
            $sql = "select 
    tbl_cheque_payment.added_date,
    tbl_cheque_payment.added_time,
    tbl_cheque_payment.cheque_no,
    tbl_cheque_payment.cheque_payment,
    tbl_cheque_payment.id_sales_order,
    tbl_cheque_payment.realized_date,
    tbl_outlet.outlet_name,
    concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
    tbl_bank.bank_name
from
    tbl_cheque_payment,
    tbl_sales_order,
    tbl_employee_has_place,
    tbl_employee,
    tbl_bank,
    tbl_outlet_has_branch,
    tbl_outlet
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_cheque_payment.cheque_payment_status='1'
and tbl_bank.id_bank = tbl_cheque_payment.id_bank and tbl_employee.id_employee = '$emp_id' {$appendLast} {$datarange} 
 group by tbl_cheque_payment.id_cheque_payment";
        } else if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "Assist Manager" || $this->session->userdata('user_type') == "Area Sales manager" || $this->session->userdata('user_type') == "Manager") {

            // echo "1";
            $sql = "select 
    tbl_cheque_payment.added_date,
    tbl_cheque_payment.added_time,
    tbl_cheque_payment.cheque_no,
    tbl_cheque_payment.cheque_payment,
    tbl_cheque_payment.id_sales_order,
    tbl_cheque_payment.realized_date,
    tbl_outlet.outlet_name,
    concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
    tbl_bank.bank_name
from
    tbl_cheque_payment,
    tbl_sales_order,
    tbl_employee_has_place,
    tbl_employee,
    tbl_bank,
    tbl_outlet_has_branch,
    tbl_outlet
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_bank.id_bank = tbl_cheque_payment.id_bank 
and tbl_cheque_payment.cheque_payment_status='1' {$appendLast}  {$datarange}
 group by tbl_cheque_payment.id_cheque_payment";

            //  print_r($sql);
        }
        // echo $sql;

        $query = $this->db->query($sql);


        $result = $query->result('array');


        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['full_name'] = $row['full_name'];
            $subJson['added_date'] = $row['added_date'];
            $subJson['cheque_no'] = $row['cheque_no'];
            $subJson['cheque_payment'] = $row['cheque_payment'];
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['realized_date'] = $row['realized_date'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['full_name'] = $row['full_name'];
            $subJson['bank_name'] = $row['bank_name'];
            $subJson['added_time'] = $row['added_time'];


            array_push($json_array['report'], $subJson);
        }
        $json_encode = json_encode($json_array);
        return $json_encode;
    }

    public function search_by_employee_name_for_cheque_details($q, $select) {
        $sql = "select 
                 distinct
	
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
	tbl_employee.id_employee
from
    tbl_cheque_payment,
	tbl_sales_order,
	tbl_employee_has_place,
	tbl_employee,
	tbl_outlet_has_branch,
	tbl_outlet,
	tbl_bank
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_outlet_has_branch.id_outlet =  tbl_outlet.id_outlet
and tbl_bank.id_bank = tbl_cheque_payment.id_bank and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'
 group by tbl_cheque_payment.id_cheque_payment";
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

    public function search_by_outlet_name_for_cheque_details($q, $select) {
        $sql = "select 
    distinct
	tbl_outlet.outlet_name,
	tbl_outlet.id_outlet
from
    tbl_cheque_payment,
	tbl_sales_order,
	tbl_employee_has_place,
	tbl_employee,
	tbl_outlet_has_branch,
	tbl_outlet,
	tbl_bank
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_outlet_has_branch.id_outlet =  tbl_outlet.id_outlet
and tbl_bank.id_bank = tbl_cheque_payment.id_bank and tbl_outlet.outlet_name like '%$q%'
 group by tbl_cheque_payment.id_cheque_payment";
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

    public function payment_outstanding() {
        $id_user = $this->session->userdata('id_user');
        $appendLast = '';
        $sql = '';
        if ((isset($_REQUEST['start_date_po']) && isset($_REQUEST['end_date_po'])) && ($_REQUEST['start_date_po'] != null && $_REQUEST['end_date_po'] != null)) {
            $dateOne = $_REQUEST['start_date_po'];
            $dateTwo = $_REQUEST['end_date_po'];
            $appendLast .= "and tbl_sales_order.added_date between '$dateOne' and '$dateTwo'";
        }

        if (isset($_REQUEST['emp_id']) && $_REQUEST['emp_id'] != null) {
            $id_employee_hidden = $_REQUEST['emp_id'];
            $appendLast .= " and tbl_employee.id_employee = '$id_employee_hidden'";
        }
        if (isset($_REQUEST['hout_id']) && $_REQUEST['hout_id'] != null) {
            $id_out = $_REQUEST['hout_id'];
            $appendLast .= " and tbl_outlet.id_outlet = '$id_out'";
        }

        if ($this->session->userdata('user_type') == "Distributor") {

            $sql = "select  
    tbl_sales_order.id_sales_order,tbl_outlet.outlet_name, 
    sum(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as sales_amount, 
     sum(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as sales_amount,
    tbl_sales_order.added_date, 
tbl_sales_order.added_time, 
    concat(tbl_employee.employee_first_name, ' ', tbl_employee.employee_last_name) as full_name,
    (select  
            sum(tbl_cash_payment.cash_payment) 
        from 
            tbl_cash_payment 
                where tbl_cash_payment.id_sales_order = tbl_sales_order.id_sales_order 
group by tbl_cash_payment.id_sales_order ) as cash_payment, 
(select  
            sum(tbl_cheque_payment.cheque_payment) 
        from 
            tbl_cheque_payment 
               where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order 
and     tbl_cheque_payment.realized_status = '0'            
group by tbl_cheque_payment.id_sales_order) as cheque_payment 
from 
    tbl_sales_order, 
    tbl_sales_order_products, 
    tbl_employee_has_place, 
    tbl_employee, 
tbl_outlet_has_branch, 
tbl_outlet, 
    tbl_user 
where 
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order 
        and tbl_user.id_employee_registration = tbl_employee.id_employee_registration 
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee AND tbl_sales_order.sales_order_status=1 
        and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place and tbl_outlet_has_branch.id_outlet_has_branch =  tbl_sales_order.id_outlet_has_branch and tbl_outlet_has_branch.id_outlet = tbl_outlet.id_outlet and tbl_user.id_user = $id_user {$appendLast} 
         
         
group by tbl_sales_order.id_sales_order  
 
";
        } else if ($this->session->userdata('user_type') == "Admin" || $this->session->userdata('user_type') == "SBU Head") {



            $sql = "select 
    tbl_sales_order.id_sales_order,
    tbl_outlet.outlet_name,
    sum(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as sales_amount,
    tbl_sales_order.added_date,
    tbl_sales_order.added_time,
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name,
    (select 
            sum(tbl_cash_payment.cash_payment)
        from
            tbl_cash_payment
        where
            tbl_cash_payment.id_sales_order = tbl_sales_order.id_sales_order
        group by tbl_cash_payment.id_sales_order) as cash_payment,
    (select 
            sum(tbl_cheque_payment.cheque_payment)
        from
            tbl_cheque_payment
        where
            tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
                and tbl_cheque_payment.realized_status = '0'
        group by tbl_cheque_payment.id_sales_order) as cheque_payment
from
    tbl_sales_order,
    tbl_sales_order_products,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_user
where
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        and tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee
        AND tbl_sales_order.sales_order_status = 1
        and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        and tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        and tbl_outlet_has_branch.id_outlet = tbl_outlet.id_outlet {$appendLast}
group by tbl_sales_order.id_sales_order";
        } else if ($this->session->userdata('user_type') == "Sales Rep") {
            $sql = "select  
    tbl_sales_order.id_sales_order,tbl_outlet.outlet_name, 
    sum(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as sales_amount, 
     sum(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as sales_amount,
    tbl_sales_order.added_date, 
tbl_sales_order.added_time, 
concat(tbl_employee.employee_first_name, ' ', tbl_employee.employee_last_name) as full_name,
    (select  
            sum(tbl_cash_payment.cash_payment) 
        from 
            tbl_cash_payment 
                where tbl_cash_payment.id_sales_order = tbl_sales_order.id_sales_order 
group by tbl_cash_payment.id_sales_order ) as cash_payment, 
(select  
            sum(tbl_cheque_payment.cheque_payment) 
        from 
            tbl_cheque_payment 
               where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order 
and     tbl_cheque_payment.realized_status = '0'            
group by tbl_cheque_payment.id_sales_order) as cheque_payment 
from 
    tbl_sales_order, 
    tbl_sales_order_products, 
    tbl_employee_has_place, 
    tbl_employee, 
tbl_outlet_has_branch, 
tbl_outlet, 
    tbl_user 
where 
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order 
        and tbl_user.id_employee_registration = tbl_employee.id_employee_registration 
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee AND tbl_sales_order.sales_order_status=1  
        and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place and tbl_outlet_has_branch.id_outlet_has_branch =  tbl_sales_order.id_outlet_has_branch and tbl_outlet_has_branch.id_outlet = tbl_outlet.id_outlet 
      and tbl_employee_has_place.id_employee_has_place =" . $this->session->userdata('id_employee_has_place') . " {$appendLast}       
group by tbl_sales_order.id_sales_order";
        }


        // echo $sql; 
        $query = $this->db->query($sql);


        $result = $query->result('array');

        //  print_r($result);

        $json_array = array();
        $json_array['report'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['sales_amount'] = $row['sales_amount'];
            $subJson['cheque_no'] = $row['cheque_no'];
            $subJson['cash_payment'] = $row['cash_payment'];
            $subJson['cheque_payment'] = $row['cheque_payment'];
            $subJson['added_date'] = $row['added_date'];
            $subJson['added_time'] = $row['added_time'];
            $subJson['outlet_name'] = $row['outlet_name'];
            $subJson['full_name'] = $row['full_name'];



            array_push($json_array['report'], $subJson);
        }
        $json_encode = json_encode($json_array);
        return $json_encode;
    }

//        public function dailySalesAndInvoice() {
//
//        $physical_place = $this->session->userdata('id_physical_place');
//        $user_type = $this->session->userdata('user_type');
//        $id_employee = $this->session->userdata('id_employee');
//        $id_employeeHas = $this->session->userdata('id_employee_has_place');
//
//
//        $append = "";
////        $id_emp = $_REQUEST['id_emp'];
//        if ((isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) && ($_REQUEST['start_date'] != null && $_REQUEST['end_date'] != null)) {
//            $dateOne = $_REQUEST['start_date'];
//            $dateTwo = $_REQUEST['end_date'];
//            $append .= "and tso.added_date between '$dateOne' and '$dateTwo'";
//        }
//
//        if (isset($_REQUEST['id_emp']) && $_REQUEST['id_emp'] != null) {
//            $distributor_id = $_REQUEST['id_emp'];
//            $append .= "and ehp.id_physical_place='$distributor_id'";
//        }
//
////        if (isset($_REQUEST['id_emp']) && ($_REQUEST['id_emp']) != null) {
////            $id_emp = $_REQUEST['id_emp'];
////            $append.=" and tem.id_employee = '$id_emp'";
////        }
////        if ($user_type == "Distributor") {
////            $append .=" and tem.id_employee ='$id_employee'";
////        }
//
//        if ($user_type == "Distributor") {
//            $append .= "and ehp.id_physical_place='$physical_place'";
//        }
//        if ($user_type == "Regional Manager"){
//            $append .= "and ehp.id_physical_place in (select 
//            distributor_psy_id
//        from
//            tbl_region_assign tra
//                inner join
//            tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
//        where
//            tra.status = 1 and trad.status = 1
//                and tra.region_manager_emp_id = '$id_employeeHas')";
//        }
//
//
//        $sql = "select 
//    concat(tem.employee_first_name,
//            ' ',
//            tem.employee_last_name) as emp_name,
//    ehp.id_employee_has_place,
//    tem.id_employee,
//    sum((select 
//            sum((sop.product_qty * sop.product_price) - sop.discount) as sales
//        from
//            tbl_sales_order_products sop
//        where
//            sop.id_sales_order = tso.id_sales_order
//                and tso.sales_order_status = 1
//        group by tso.id_sales_order)) as sales_amount_a,
//    sum((select 
//            sum(sop.product_qty * sop.product_price)
//        from
//            tbl_sales_order_products sop
//                inner join
//            tbl_invoice tbin
//        where
//            sop.id_sales_order = tso.id_sales_order
//                and tbin.id_sales_order = tso.id_sales_order
//                and tso.sales_order_status = 1)) as invoice_amount_a,
//    @return_amount:=sum((select 
//            sum(rnp.return_product_qty * rnp.return_price)
//        from
//            tbl_return_note_product rnp
//                inner join
//            tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
//        where
//            rn.id_sales_order = tso.id_sales_order
//                and tso.sales_order_status = 1)) as sales_return_amount,
//    (select 
//            sum(rnp.return_product_qty * rnp.return_price)
//        from
//            tbl_return_note_product rnp
//                inner join
//            tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
//                inner join
//            tbl_sales_order tsot ON rn.id_sales_order = tsot.id_sales_order
//                inner join
//            tbl_invoice ti ON tsot.id_sales_order = ti.id_sales_order
//                and tsot.sales_order_status = 1
//        group by ti.id_sales_order and tsot.sales_order_status = 1) as invoice_return_amount
//from
//    tbl_sales_order tso
//        inner join
//    tbl_employee_has_place ehp ON tso.id_employee_has_place = ehp.id_employee_has_place
//        inner join
//    tbl_employee tem ON ehp.id_employee = tem.id_employee
//        and tso.sales_order_status = 1
//group by tso.id_employee_has_place {$append}";
//
//        //echo "$sql";
//
//
//        $sql;
//        $mod_select = $this->db->mod_select($sql);
//        return $mod_select;
//    }

    public function dailySalesAndInvoice() {
        $physical_place = $this->session->userdata('id_physical_place');
        $user_type = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');



        $append = "";
        $append1 = "";
//        $id_emp = $_REQUEST['id_emp'];
        if ((isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) && ($_REQUEST['start_date'] != null && $_REQUEST['end_date'] != null)) {
            $dateOne = $_REQUEST['start_date'];
            $dateTwo = $_REQUEST['end_date'];
            $append .= "and tso.added_date between '$dateOne' and '$dateTwo'";
        }

        if (isset($_REQUEST['id_emp']) && $_REQUEST['id_emp'] != null) {
            $distributor_id = $_REQUEST['id_emp'];
            $append1 .= "and tehp.id_physical_place= '$distributor_id'";
        }

        if ($user_type == "Distributor") {
            $append1 .= "and tehp.id_physical_place='$physical_place'";
        }

        if ($user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") {
            $append1 .= "and tehp.id_physical_place in (select 
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
    tehp.id_physical_place,
    tehp.id_employee_has_place,
    te.id_employee_type,
    CONCAT(te.employee_first_name,
            ' ',
            te.employee_last_name) as employee_first_name,
    sum(ifnull(sales.sales_tot, 0)) as sales_tot,
    sum(ifnull(sales.inv_tot, 0)) as inv_tot
FROM
    tbl_employee_has_place tehp
        inner join
    tbl_employee te ON te.id_employee = tehp.id_employee
        left join
    (select 
        tso.id_employee_has_place,
            sum(ifnull(tsop.product_price * tsop.product_qty, 0) - ifnull((select 
                    sum(trnps.return_price * trnps.return_product_qty)
                from
                    tbl_return_note trns
                inner join tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
                where
                    tso.id_sales_order = trns.id_sales_order), 0)) as sales_tot,
            ((select 
                    ifnull(sum(itsop.product_price * itsop.product_qty), 0)
                from
                    tbl_invoice iti
                inner join tbl_sales_order_products itsop ON iti.id_sales_order = itsop.id_sales_order
                where
                    iti.id_sales_order = tso.id_sales_order) - (ifnull((select 
                    sum(trnps.return_price * trnps.return_product_qty)
                from
                    tbl_invoice ti
                inner join tbl_return_note trns ON ti.id_sales_order = trns.id_sales_order
                inner join tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
                where
                    tso.id_sales_order = ti.id_sales_order), 0))) as inv_tot
    from
        tbl_sales_order tso
    inner join tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
    where
        tso.sales_order_status = 1 {$append}
    group by tso.id_sales_order) sales ON sales.id_employee_has_place = tehp.id_employee_has_place
where
    tehp.employee_has_place_status = 1 {$append1}
        and te.employee_status = 1
        and te.id_employee_type in (2 , 3)
group by tehp.id_employee_has_place order by tehp.id_physical_place,tehp.id_employee_has_place,te.id_employee_type";
        return $this->db->mod_select($sql);
    }

    public function getsalesTot($employee_id = 0) {
        $net_sales_total = 0;
        $net_sales = 0;
        $net_return = 0;
        $sales = '';

        if (isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != '') {
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];
            $sales = " AND tbl_sales_order.added_date BETWEEN '$start_date' AND '$end_date'";
        }

        $refanddis = $this->getrefanddis($employee_id);
        foreach ($refanddis as $value) {

            $sql_sales_tot = "SELECT 
ifnull(SUM(tsop.product_qty * tsop.product_price),0) as sales_tot 
FROM
 tbl_sales_order tso INNER JOIN tbl_sales_order_products tsop ON tsop.id_sales_order = tso.id_sales_order 
 WHERE
 tso.sales_order_status=1
 AND 
tso.id_employee_has_place='$value->id_employee_has_place'
AND
tso.id_sales_order not in(select id_sales_order from tbl_invoice where id_sales_order=tso.id_sales_order) {$sales}";
            // echo $sql_sales_tot;
            $mod_sales_tot = $this->db->mod_select($sql_sales_tot);
            if (isset($mod_sales_tot[0]->sales_tot)) {

                $net_sales += $mod_sales_tot[0]->sales_tot;
            }


            $sql_return_tot = "SELECT 
ifnull(SUM((ifnull(trnp.return_product_qty,0) * ifnull(trnp.return_price,0))),0) as sales_return_tot 
FROM tbl_sales_order tso LEFT JOIN tbl_return_note trn ON tso.id_sales_order =  trn.id_sales_order
INNER JOIN tbl_return_note_product trnp ON trnp.id_return_note = trn.id_return_note
WHERE trn.return_note_status=1
 AND
trnp.id_return_type=1
AND
trn.id_employee_has_place='$value->id_employee_has_place'
AND
tso.id_sales_order not in(select id_sales_order from tbl_invoice where id_sales_order=tso.id_sales_order) {$sales}";

            $mod_sales_return = $this->db->mod_select($sql_return_tot);
            if (isset($mod_sales_return[0]->sales_return_tot)) {

                $net_return += $mod_sales_return[0]->sales_return_tot;
            }
        }

        $net_sales_total = ($net_sales - $net_return);

        return $net_sales_total;
    }

    public function getinvoiceTot($employee_id = 0) {
        $net_sales_total = 0;
        $net_sales = 0;
        $net_return = 0;
        if (isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != '') {
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];
            $sales = " AND tbl_sales_order.added_date BETWEEN '$start_date' AND '$end_date'";
        }

        $refanddis = $this->getrefanddis($employee_id);
        foreach ($refanddis as $value) {

            $sql_sales_tot = "SELECT SUM(tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as 
                sales_tot FROM tbl_sales_order tbl_sales_order 
                INNER JOIN tbl_sales_order_products tbl_sales_order_products 
                ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order INNER JOIN tbl_invoice  tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order  
                WHERE tbl_sales_order.sales_order_status=1 AND tbl_invoice.invoice_status=1
                AND tbl_sales_order.id_employee_has_place='$value->id_employee_has_place' {$sales}";
            $mod_sales_tot = $this->db->mod_select($sql_sales_tot);
            //echo $sql_sales_tot;
            if (isset($mod_sales_tot[0]->sales_tot)) {

                $net_sales += $mod_sales_tot[0]->sales_tot;
            }


            $sql_return_tot = "SELECT SUM(tbl_return_note_product.return_product_qty * tbl_return_note_product.return_price) as 
                sales_return_tot FROM tbl_return_note tbl_return_note 
                INNER JOIN tbl_return_note_product tbl_return_note_product 
                ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note 
                INNER JOIN tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_return_note.id_sales_order
                WHERE tbl_return_note.return_note_status=1 AND tbl_return_note_product.id_return_type=1
                AND tbl_return_note.id_sales_order = tbl_invoice.id_sales_order AND tbl_return_note.return_note_status=1
                AND tbl_return_note.id_employee_has_place='$value->id_employee_has_place'' {$sales}";

            $mod_sales_return = $this->db->mod_select($sql_return_tot);
            if (isset($mod_sales_return[0]->sales_return_tot)) {

                $net_return += $mod_sales_return[0]->sales_return_tot;
            }
        }

        $net_sales_total = ($net_sales - $net_return);

        return $net_sales_total;
    }

    public function getDisbrts() {
        $append = '';
        if (isset($_REQUEST['id_emp']) && $_REQUEST['id_emp'] != '') {
            $id_emp = $_REQUEST['id_emp'];
            $append = "AND tbl_employee_has_place.id_employee_has_place='$id_emp'";
        }

        $sql = "SELECT tbl_employee_has_place.id_employee_has_place,tbl_employee.id_employee
            ,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name 
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            ON tbl_employee_has_place.id_employee = tbl_employee.id_employee 
            INNER JOIN  tbl_user tbl_user ON tbl_user.id_employee_registration =  tbl_employee.id_employee_registration 
            INNER JOIN tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type 
            WHERE tbl_user_type.user_type='Distributor' AND employee_status=1 {$append}
            AND tbl_employee.employee_status =1 AND tbl_employee_has_place.employee_has_place_status =1  
            GROUP BY tbl_employee_has_place.id_employee_has_place";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getrefanddis($emlpoyee_hasplceid) {
        $sql = "SELECT id_employee_has_place FROM tbl_employee_has_place 
            WHERE id_physical_place=(SELECT id_physical_place FROM tbl_employee_has_place 
            WHERE id_employee_has_place='$emlpoyee_hasplceid' LIMIT 1)  AND employee_has_place_status=1";

        return $mod_select = $this->db->mod_select($sql);
    }

//    public function dailySalesFromSales() {
//        $append = "";
//        if ((isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) && ($_REQUEST['start_date'] != null && $_REQUEST['end_date'] != null)) {
//            $dateOne = $_REQUEST['start_date'];
//            $dateTwo = $_REQUEST['end_date'];
//            $append .= "and tbl_sales_order_products.added_date between '$dateOne' and '$dateTwo'";
//        }
//
//        if (isset($_REQUEST['id_emp']) && ($_REQUEST['id_emp']) != null) {
//            $id_emp = $_REQUEST['id_emp'];
//            $append.="and tbl_employee.id_employee = '$id_emp'";
//        }
//        $user_type = $this->session->userdata('user_type');
//        $id_employee = $this->session->userdata('id_employee');
//
//        if ($user_type == "Distributor") {
//            $append .="and tbl_employee.id_employee ='$id_employee'";
//        }
//
//
//        $sql = "select 
//    concat(tem.employee_first_name,
//            ' ',
//            tem.employee_last_name) as emp_name,
//    (select 
//            sum(sop.product_qty * sop.product_price)
//        from
//            tbl_sales_order_products sop
//                inner join
//            tbl_sales_order tsot ON sop.id_sales_order = tsot.id_sales_order) as sales_amount_a,
//    (select 
//            sum(rnp.return_product_qty * rnp.return_price)
//        from
//            tbl_return_note_product rnp
//                inner join
//            tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
//                inner join
//            tbl_sales_order tsot ON rn.id_sales_order = tsot.id_sales_order) as return_amount_b,
//            (select ifnull(sales_amount_a,0)-ifnull(return_amount_b,0)) as sales_amount
//from
//    
//    tbl_sales_order tso 
//        inner join
//    tbl_employee_has_place ehp ON tso.id_employee_has_place = ehp.id_employee_has_place
//        inner join
//    tbl_employee tem ON ehp.id_employee = tem.id_employee {$append}
//group by tem.id_employee;";
//        //echo $sql;
//        $mod_select = $this->db->mod_select($sql);
//        return $mod_select;
//    }

    public function nonInvoicedOutlet() {
        $append = "";
        $user_type = $this->session->userdata('user_type');
        $id_employee = $this->session->userdata('id_employee');
        $id_phycical = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($user_type == "Regional Manager" || $user_type == "Area Sales Manager - User") {
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
        if ($user_type == "Distributor") {
            $append .="and tbl_employee_has_place.id_physical_place='$id_phycical'";
        } else {
            if (isset($_REQUEST['emp_id']) && $_REQUEST['emp_id'] != null) {
                $emp_id = $_REQUEST['emp_id'];
                $append .="and tbl_employee.id_employee ='$emp_id'";
            }
        }



        if (isset($_REQUEST['outlet_id']) && $_REQUEST['outlet_id'] != null) {
            $outlet_id = $_REQUEST['outlet_id'];
            $append .="and tbl_outlet.id_outlet ='$outlet_id'";
        }
        if ((isset($_REQUEST['start_date']) && isset($_REQUEST['end_date'])) && ($_REQUEST['start_date'] != null && $_REQUEST['end_date'] != null)) {
            $dateOne = $_REQUEST['start_date'];
            $dateTwo = $_REQUEST['end_date'];
            $append .= "and tbl_sales_order_products.added_date between '$dateOne' and '$dateTwo'";
        }



        $sql = "select 
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name,
    tbl_sales_order.id_sales_order, tbl_outlet.outlet_name,sum(tbl_sales_order_products.product_price*tbl_sales_order_products.product_qty) as sales_amount
from
    tbl_sales_order
        left join
    tbl_invoice ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
        left join
    tbl_sales_order_products ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        inner join
    tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_outlet.id_outlet
		left join
	tbl_employee_has_place on tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		left join
	tbl_employee on  tbl_employee_has_place.id_employee = tbl_employee.id_employee
where
    tbl_invoice.id_invoice is null {$append} {$query_append}
group by tbl_sales_order.id_sales_order;";

        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function search_by_emp_name_daily_sales($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($userdata == "Regional Manager" || $userdata == "Area Sales Manager - User") {
            $append .="and tbl_employee_has_place.id_physical_place in (select 
            distributor_psy_id
        from
            tbl_region_assign tra
                inner join
            tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
        where
            tra.status = 1 and trad.status = 1
                and tra.region_manager_emp_id = '$id_employeeHas')";
        }




        $sql = "SELECT CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as 
            emp_name ,tbl_employee_has_place.id_employee_has_place
            ,tbl_employee.id_employee,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place 
            ON tbl_employee_has_place.id_employee = tbl_employee.id_employee 
            INNER JOIN  tbl_user tbl_user ON tbl_user.id_employee_registration =  tbl_employee.id_employee_registration 
            INNER JOIN tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type 
            WHERE tbl_user_type.user_type='Distributor'
            AND employee_status=1 AND     tbl_employee.employee_status =1 
            AND tbl_employee_has_place.employee_has_place_status =1 
            AND employee_first_name LIKE '$q%'{$append} GROUP BY tbl_employee_has_place.id_employee_has_place";
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

    public function search_by_emp_name_non_invoiced($q, $select) {

        $userdata = $this->session->userdata('user_type');
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

        $sql = "select distinct
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name,
	tbl_employee.id_employee
from
    tbl_sales_order
        left join
    tbl_invoice ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
        left join
    tbl_sales_order_products ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        inner join
    tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_outlet.id_outlet
		left join
	tbl_employee_has_place on tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		left join
	tbl_employee on  tbl_employee_has_place.id_employee = tbl_employee.id_employee
where
    tbl_invoice.id_invoice is null and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%' {$query_append}
group by tbl_sales_order.id_sales_order;";
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

    public function search_by_outlet_name_non_invoiced($q, $select) {
        $userdata = $this->session->userdata('user_type');
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
        $sql = "select distinct
	tbl_outlet.outlet_name,
	tbl_outlet.id_outlet
from
    tbl_sales_order
        left join
    tbl_invoice ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
        left join
    tbl_sales_order_products ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        inner join
    tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
        inner join
    tbl_outlet ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_outlet.id_outlet
		left join
	tbl_employee_has_place on tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
		left join
	tbl_employee on  tbl_employee_has_place.id_employee = tbl_employee.id_employee
where
    tbl_invoice.id_invoice is null and tbl_outlet.outlet_name like '%$q%' {query_append} 
group by tbl_sales_order.id_sales_order;";
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

    public function islandWideTracking() {
        $userdata = $this->session->userdata('user_type');
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

        $append = "";

        if ((isset($_REQUEST['start_sales_date']) && $_REQUEST['start_sales_date'] != null) && (isset($_REQUEST['start_sales_date']) && $_REQUEST['start_sales_date'] != null)) {
            $start_island_sales = $_REQUEST['start_sales_date'];
            $end_island_sales = $_REQUEST['end_sales_date'];
            $append .= " and ti.added_date between'$start_island_sales' AND '$end_island_sales'";
        }


        $sql = "select 
    sum(tsob.product_price * tsob.product_qty) as sales_amount,
    tt.id_territory,
    tt.territory_hierarchy,
tt.territory_name,
    ifnull((select 
            sum(trnps.return_price * trnps.return_product_qty)
        from
tbl_invoice tin
inner join
            tbl_sales_order tsos on tin.id_sales_order = tsos.id_sales_order
                left join
            tbl_return_note trns ON tsos.id_sales_order = trns.id_sales_order
                inner join
            tbl_return_note_product trnps ON trns.id_return_note = trnps.id_return_note
where
tso.id_sales_order = trns.id_sales_order
),0) as return_amount,
        
(select DISTINCT
            tr.territory_name
        from
            tbl_territory tr
        where
            tr.id_territory = tt.id_parent) as area

from
    tbl_sales_order tso,
    tbl_sales_order_products tsob,
    tbl_invoice ti,
    tbl_outlet_has_branch tohb,
    tbl_territory tt,
    tbl_employee_has_place ehp
where
tso.id_sales_order = tsob.id_sales_order and ti.id_sales_order = tso.id_sales_order and tso.id_outlet_has_branch = tohb.id_outlet_has_branch and tohb.id_territory = tt.id_territory
and tso.sales_order_status = 1 and tso.id_employee_has_place=ehp.id_employee_has_place {$append} {$query_append}
group by
area";
        //echo $sql;
        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['territory_name'] = $row['territory_name'];
            $subJson['id_territory'] = $row['id_territory'];
            $subJson['invoice_amount'] = $row['sales_amount'] - $row['return_amount'];
            $subJson['area'] = $row['area'];
            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function outstanding_emp_names($q, $select) {
        $sql = "select distinct
    tbl_employee.id_employee,
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name
from
    tbl_sales_order,
    tbl_sales_order_products,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_user
where
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        and tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee
        and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        and tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        and tbl_outlet_has_branch.id_outlet = tbl_outlet.id_outlet and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'
group by tbl_sales_order.id_sales_order
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

    public function outstanding_outlet_names($q, $select) {
        $sql = "select distinct
    tbl_outlet.id_outlet,
	tbl_outlet.outlet_name
from
    tbl_sales_order,
    tbl_sales_order_products,
    tbl_employee_has_place,
    tbl_employee,
    tbl_outlet_has_branch,
    tbl_outlet,
    tbl_user
where
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        and tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        and tbl_employee.id_employee = tbl_employee_has_place.id_employee
        and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        and tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        and tbl_outlet_has_branch.id_outlet = tbl_outlet.id_outlet
        and tbl_outlet.outlet_name like '%$q%'
group by tbl_sales_order.id_sales_order
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

    public function getTrackingUnproductDetails() {

        $query_append = "";

        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '') {
            $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
            $query_append = "AND tbl_unproduct.id_employee_has_place='$txt_gps_emp_name_token'";
        }

        if (isset($_POST['txt_gps_emp_name_token']) && $_POST['txt_gps_emp_name_token'] != '' && isset($_POST['txt_st_date']) && $_POST['txt_st_date'] != '') {
            $txt_gps_emp_name_token = $_POST['txt_gps_emp_name_token'];
            $txt_st_date = $_POST['txt_st_date'];
            $query_append = "AND tbl_unproduct.id_employee_has_place='$txt_gps_emp_name_token' AND tbl_unproduct.added_date='$txt_st_date'";
        }

        /* if (isset($_POST['txt_st_date'])) {

          $txt_st_date = $_POST['txt_st_date'];
          if ($txt_st_date != '') {
          $query_append .= "AND `tbl_unproduct`.added_date='$txt_st_date'";
          }
          }

          if (isset($_POST['txt_st_date']) && isset($_POST['txt_gps_emp_name_token'])) {

          $txt_st_date = $_POST['txt_st_date'];

          $txt_emp_name = $_POST['txt_gps_emp_name_token'];
          if ($txt_st_date != '' && $txt_emp_name != '') {
          $query_append .= "AND `tbl_unproduct`.added_date='$txt_st_date' AND tbl_unproduct.id_employee_has_place='$txt_emp_name'";
          }
          }

          if (isset($_POST['txt_emp_name_token'])) {

          $txt_emp_name = $_POST['txt_gps_emp_name_token'];
          if ($txt_emp_name != '') {
          $query_append .= "AND tbl_unproduct.id_employee_has_place='$txt_emp_name' AND `tbl_unproduct`.`added_date`=CURDATE()";
          }
          } */
        $sql = "select  tbl_outlet.outlet_name,tbl_unproduct.gps_latitude,tbl_unproduct.gps_longitude,tbl_unproduct.remarks,tbl_unproduct.added_date,tbl_unproduct.added_time from tbl_unproduct tbl_unproduct Left Join tbl_outlet_has_branch tbl_outlet_has_branch on tbl_unproduct.branch_id=tbl_outlet_has_branch.id_outlet_has_branch Join tbl_outlet tbl_outlet on tbl_outlet_has_branch.id_outlet=tbl_outlet.id_outlet {$query_append}";
        // echo "sql not sales :"."</br>".$sql ."</br>";
        $query = $this->db->query($sql);
        $result = $query->result('array');


        $json_array['locations'] = array();

        foreach ($result as $row) {
            $subJson = array();
            $subJson['id_unproduct'] = $row['id_unproduct'];
            $subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['added_time'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            $subJson['lat'] = $row['gps_longitude'];
            $subJson['longi'] = $row['gps_latitude'];
            $subJson['bat'] = $row['battry_level'];
            $subJson['amount'] = number_format(($row['amount'] - $row['returnamount']), 2);
            $subJson['con'] = $row['outlet_name'];
            $subJson['occ'] = $row['remarks'];
            $subJson['bill_status'] = "1";

            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    /*
     * get daily items 
     * kanishka 2014-02-24
     */

    public function getdailyItems() {

        $column = array('sales_order_status' => 1);

        //  $employe = '';
        $outlet = '';
        $order = '';
        $append = '';

        if (isset($_POST['htxt_emp_name']) && $_POST['htxt_emp_name'] != '') {
            $htxt_emp_name = $_POST['htxt_emp_name'];
//            $employe = "AND tbl_employee_has_place.id_employee_has_place = '$htxt_emp_name'";
            $append .= "AND tbl_employee_has_place.id_physical_place ='$htxt_emp_name'";
        }
        // echo ($append);

        if (isset($_POST['htxt_outlet_name']) && $_POST['htxt_outlet_name'] != '') {
            $htxt_outlet_name = $_POST['htxt_outlet_name'];
            $outlet = "AND tbl_sales_order.id_outlet_has_branch = '$htxt_outlet_name'";
        }

        if (isset($_POST['order_code']) && $_POST['order_code'] != '') {
            $order_code = $_POST['order_code'];
            $order = "AND tbl_sales_order.id_sales_order = '$order_code'";
        }

        if (isset($_REQUEST['start_date_ucs']) && $_REQUEST['start_date_ucs'] != '') {
            $txt_so_date1 = $_REQUEST['start_date_ucs'];
            $txt_so_date2 = $_REQUEST['end_date_uce'];
            $append = "AND tbl_sales_order.added_date BETWEEN '$txt_so_date1' AND '$txt_so_date2'";
        }



        $sql = "SELECT distinct  tbl_item.item_name,tbl_sales_order_products.discount
            ,tbl_sales_order_products.product_price,tbl_sales_order_products.product_qty 
            ,concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name
            , tbl_outlet.outlet_name,tbl_outlet_has_branch.branch_address,tbl_sales_order.added_date
            ,tbl_sales_order.added_time,tbl_invoice.id_sales_order FROM tbl_invoice tbl_invoice 
            INNER JOIN tbl_sales_order tbl_sales_order ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order 
            INNER JOIN tbl_sales_order_products tbl_sales_order_products 
            ON tbl_sales_order_products.id_sales_order =  tbl_sales_order.id_sales_order 
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place 
            INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee 
            INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch 
            ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch 
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_sales_order_products.id_products  
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem  WHERE  tbl_sales_order.sales_order_status =:sales_order_status  {$outlet} {$order} {$append}";

        // echo ($sql);

        $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_outlets_names($q, $select) {
        //        $sql = "SELECT tbl_outlet.outlet_name,tbl_outlet_has_branch.id_outlet_has_branch  FROM tbl_sales_order INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch =tbl_sales_order.id_outlet_has_branch INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet  WHERE tbl_outlet.outlet_name LIKE '$q%'";
        $sql = "SELECT distinct
    tbl_outlet.outlet_name,
    tbl_outlet_has_branch.id_outlet_has_branch
FROM
    tbl_sales_order
        INNER JOIN
    tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        INNER JOIN
    tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
WHERE
    tbl_outlet.outlet_name LIKE '$q%'
order by tbl_outlet.outlet_name asc";

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

    public function getordercodes($q, $select) {
        $sql = "SELECT id_sales_order,id_employee_has_place FROM tbl_sales_order WHERE id_sales_order LIKE '$q%'";
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

    /*
     * fazey added
     */

    public function getDailySalesRoute($id) {

        $sql = "select 
    sum(tsop.product_price * tsop.product_qty) as tot_sale,
    tt.territory_name,tt.id_territory
from
    (select 
        id_territory
    FROM
        tbl_territory
    where
        territory_status = 1
            AND id_territory in (SELECT 
                id_territory
            FROM
                tbl_employee_has_place
            where
                id_employee_has_place = '$id')
            and territory_status = 1) tempMap,
    tbl_sales_order tso
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
        inner join
    tbl_outlet_has_branch tohb ON tso.id_outlet_has_branch = tohb.id_outlet_has_branch
        inner join
    tbl_territory tt ON tohb.id_territory = tt.id_territory


where (tt.id_territory = tempMap.id_territory
        OR ((tt.territory_hierarchy like concat('', tempMap.id_territory)
        OR tt.territory_hierarchy like concat(tempMap.id_territory, ',%')
        OR tt.territory_hierarchy like concat('%,', tempMap.id_territory, ',%')
        OR tt.territory_hierarchy like concat('%', tempMap.id_territory)))
        and tt.territory_status = 1) group by tt.territory_name";


        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    function getDailySalesOutlet($id) {

        $sql = " select 
    sum(tsop.product_price * tsop.product_qty) as tot_sale,
    ut.outlet_name
from
    (select 
        id_territory
    FROM
        tbl_territory
    where
        territory_status = 1
            AND id_territory in (SELECT 
                id_territory
            FROM
                tbl_employee_has_place
            where
                id_employee_has_place = 2)
            and territory_status = 1) tempMap,
    tbl_sales_order tso
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
        inner join
    tbl_outlet_has_branch tohb ON tso.id_outlet_has_branch = tohb.id_outlet_has_branch
        inner join
    tbl_territory tt ON tohb.id_territory = tt.id_territory
        inner join
    tbl_outlet ut ON tohb.id_outlet = ut.id_outlet
where
    (tt.id_territory = tempMap.id_territory
        OR ((tt.territory_hierarchy like concat('', tempMap.id_territory)
        OR tt.territory_hierarchy like concat(tempMap.id_territory, ',%')
        OR tt.territory_hierarchy like concat('%,', tempMap.id_territory, ',%')
        OR tt.territory_hierarchy like concat('%', tempMap.id_territory)))
        and tt.territory_status = 1) and tt.id_territory='$id'
group by ut.outlet_name

";

        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    /*
     * 
     * fazy end
     */

    public function search_by_outlet_name_for_payment_outstanding($q, $select) {
        $sql = "select 
    distinct
	tbl_outlet.outlet_name,
	tbl_outlet.id_outlet
from
    tbl_cheque_payment,
	tbl_sales_order,
	tbl_employee_has_place,
	tbl_employee,
	tbl_outlet_has_branch,
	tbl_outlet,
	tbl_bank
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_outlet_has_branch.id_outlet =  tbl_outlet.id_outlet
and tbl_bank.id_bank = tbl_cheque_payment.id_bank and tbl_outlet.outlet_name like '%$q%'
 group by tbl_cheque_payment.id_cheque_payment";
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

    public function search_by_employee_name_for_payment_outstanding($q, $select) {
        $sql = "select 
                 distinct
	
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
	tbl_employee.id_employee
from
    tbl_cheque_payment,
	tbl_sales_order,
	tbl_employee_has_place,
	tbl_employee,
	tbl_outlet_has_branch,
	tbl_outlet,
	tbl_bank
where tbl_cheque_payment.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
and tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
and tbl_employee.id_employee = tbl_employee_has_place.id_employee
and tbl_outlet_has_branch.id_outlet =  tbl_outlet.id_outlet
and tbl_bank.id_bank = tbl_cheque_payment.id_bank and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'
 group by tbl_cheque_payment.id_cheque_payment";
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

    public function reportPayment() {

//        $user_type = $this->session->userdata('user_type');
//        $id_employee = $this->session->userdata('id_employee');
//        $id_employee_phy_place = $this->session->userdata('id_physical_place');

        $emp_name = '';
        $append = '';
        $append1 = '';
        $id_physical_place1 = '';
        $sql_query = '';


        if (isset($_POST['start_date_payments']) && $_POST['start_date_payments'] != '') {
            $start_date = $_REQUEST['start_date_payments'];
            $end_date = $_REQUEST['end_date_payments'];
            $append = " and tcp.added_date BETWEEN '$start_date' AND '$end_date'";
        }




        $user_type = $_POST['log_type'];
        if ($user_type == "Assist Manager" || $user_type == "Manager" || $user_type == "SBU Head" || $user_type == "Admin" || $user_type == "Area Sales manager") {
            $sql_query = '';
            if (isset($_POST['emp_id']) && $_POST['emp_id'] != '') {
                $emp_id = $_POST['emp_id'];
                $append = "AND em.id_employee= '$emp_id'";
            }
        } else {


            $user_id = '';
            if (($_POST['id_physical_place']) != '') {
                $user_id = $_POST['id_physical_place'];
            } else {
                $user_id = $data_array['emp_id'];
            }

            $sql_query .= "and emhp.id_physical_place='$user_id'";
        }




//        if(isset($_POST['id_physical_place']) && $_POST['id_physical_place'] != ''){
//            
//            $id_physical_place1=$_POST['id_physical_place'];
//            $id_physical_place1 = "and emhp.id_physical_place='$id_physical_place1'";
//        }

        $sql = "select 
            tso.id_sales_order,

            ifnull(tcp.cash_payment, 0) as cash_payment,
            ifnull(tcp.added_date, 0) as cash_date,
            ifnull(tcp.added_time, 0) as cash_time,
            concat(em.employee_first_name,
                    ' ',
                    em.employee_last_name) as EmpName
        from
            tbl_sales_order tso
                left join
            tbl_cash_payment tcp ON tso.id_sales_order = tcp.id_sales_order
                inner join
            tbl_employee_has_place emhp ON tso.id_employee_has_place = emhp.id_employee_has_place
                inner join
            tbl_employee em ON emhp.id_employee = em.id_employee
        where
            tso.id_sales_order = tcp.id_sales_order 
                and cash_payment > 0
                and tcp.cash_payment_status= '1' {$append} {$append1} {$id_physical_place1}{$sql_query}
        ";
        //print_r($sql);
        $mod_select = $this->db->mod_select($sql);
        // print_r($mod_select);
        return $mod_select;
    }

    public function reportPayment1() {

        $emp_name = '';
        $append = '';
        $append1 = '';
        $id_physical_place1 = '';
        $sql_query = '';

//        if (isset($_POST['emp_id']) && $_POST['emp_id'] != '') {
//            //$emp_id = $_POST['emp_id'];
//            $id_employee_phy_place = $this->session->userdata('id_physical_place');
//            $append = "AND emhp.id_employee_has_place= '$emp_id'";
//        }

        if (isset($_POST['start_date_payments']) && $_POST['start_date_payments'] != '') {
            $start_date = $_REQUEST['start_date_payments'];
            $end_date = $_REQUEST['end_date_payments'];
            $append = "and tchp.realized_date BETWEEN '$start_date' AND '$end_date'";
        }


        $user_type = $_POST['log_type'];
        if ($user_type == "Assist Manager" || $user_type == "Manager" || $user_type == "SBU Head" || $user_type == "Admin" || $user_type == "Area Sales manager") {
            $sql_query = '';
            if (isset($_POST['emp_id']) && $_POST['emp_id'] != '') {
                $emp_id = $_POST['emp_id'];
                $append = "AND em.id_employee= '$emp_id'";
            }
        } else {


            $user_id = '';
            if (($_POST['id_physical_place']) != '') {
                $user_id = $_POST['id_physical_place'];
            } else {
                $user_id = $data_array['emp_id'];
            }

            $sql_query .= "and emhp.id_physical_place='$user_id'";
        }


        $sql_1 = "select 
            tso.id_sales_order,
            ifnull(tchp.cheque_payment, 0) as cheque_payment,
            ifnull(tchp.realized_status, 0) as realized_status,
            ifnull(tchp.realized_date, 0) as cheque_date,
            ifnull(tchp.added_time, 0) as cheque_time,
            concat(em.employee_first_name,
                    ' ',
                    em.employee_last_name) as EmpName
        from
            tbl_sales_order tso
                left join
            tbl_cheque_payment tchp ON tso.id_sales_order = tchp.id_sales_order
                inner join
            tbl_employee_has_place emhp ON tso.id_employee_has_place = emhp.id_employee_has_place
                inner join
            tbl_employee em ON emhp.id_employee = em.id_employee
        where
            tso.id_sales_order = tchp.id_sales_order
            {$append} {$sql_query}
        and 
        
            realized_status = 0 
        and 
            tchp.cheque_payment_status ='1'
        and cheque_payment > 0
            ";


        $mod_select = $this->db->mod_select($sql_1);
        return $mod_select;
    }

    public function search_by_emp_name_payments($q, $select) {
        $sql = "select distinct
                concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as emp_name,
                tbl_employee.id_employee
        from
            tbl_sales_order
                left join
            tbl_invoice ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
                left join
            tbl_sales_order_products ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
                inner join
            tbl_outlet_has_branch ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
                inner join
            tbl_outlet ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_outlet.id_outlet
                        left join
                tbl_employee_has_place on tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
                        left join
                tbl_employee on  tbl_employee_has_place.id_employee = tbl_employee.id_employee
        where
            tbl_invoice.id_invoice is null and concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) like '%$q%'
        group by tbl_sales_order.id_sales_order;";



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

    /*
     * 
     * item list summery report
     * 2014-05-14
     */

    public function item_list_summery() {
        $itemId = '';
        $append = '';

        if (isset($_REQUEST['hiddenItemId']) && $_REQUEST['hiddenItemId'] != '' && $_REQUEST['hiddenCodeItemId'] == '') {
            $itemId = $_REQUEST['hiddenItemId'];
            $append = "AND tbl_item.id_item= '$itemId'";
        }
        if (isset($_REQUEST['hiddenCodeItemId']) && $_REQUEST['hiddenCodeItemId'] != '' && $_REQUEST['hiddenItemId'] == '') {
            $itemId = $_REQUEST['hiddenCodeItemId'];
            $append = "AND tbl_item.id_item= '$itemId'";
        }

        if (isset($_REQUEST['hiddenStoreId']) && $_REQUEST['hiddenStoreId'] != '') {
            $storeId = $_REQUEST['hiddenStoreId'];
            $append = "AND tbl_store.id_store= '$storeId'";
        }
        if (isset($_REQUEST['hiddenempId']) && $_REQUEST['hiddenempId'] != '') {
            $empId = $_REQUEST['hiddenempId'];
            $append = "AND tbl_store.id_employee_registration= '$empId'";
        }


        $sql = "select 
    tbl_item.id_item,
    tbl_item.item_name,
    tbl_item.item_account_code,
    tbl_stock.qty,
    tbl_products.product_cost,
    tbl_products.product_price,
    (tbl_stock.qty*tbl_products.product_cost)as total_cost,
    (tbl_stock.qty*tbl_products.product_price)as total_price
from
    tbl_item tbl_item 
		INNER JOIN
    tbl_products tbl_products
		INNER JOIN
	tbl_stock
left join 
tbl_store on tbl_store.id_store=tbl_stock.id_store
where
    tbl_item.id_item = tbl_products.iditem
	and tbl_products.id_products = tbl_stock.id_products {$append}
        ORDER BY `tbl_item`.`id_item` ASC";

        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

    public function search_by_item_name_for_itemListSummery($q, $select) {

        $sql = "select 
    tbl_item.id_item,
    tbl_item.item_name
  
from
    tbl_item tbl_item
        INNER JOIN
    tbl_products tbl_products
        INNER JOIN
    tbl_stock
where
    tbl_item.id_item = tbl_products.iditem
        and tbl_products.id_products = tbl_stock.id_products
		and tbl_item.item_name LIKE '$q%'
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

    public function search_by_item_accountCode_for_itemListSummery($q, $select) {

        $sql = "select 
    tbl_item.id_item,
    tbl_item.item_account_code
  
from
    tbl_item tbl_item
        INNER JOIN
    tbl_products tbl_products
        INNER JOIN
    tbl_stock
where
    tbl_item.id_item = tbl_products.iditem
        and tbl_products.id_products = tbl_stock.id_products
		and tbl_item.item_account_code LIKE '$q%'";

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

    public function getStore_name_for_ItemListSummery($q, $select) {

        $sql = "select 
    tbl_store.store_name, tbl_store.id_store
from
    tbl_item tbl_item
        INNER JOIN
    tbl_products tbl_products
        INNER JOIN
    tbl_stock tbl_stock
        right join
    tbl_store ON tbl_stock.id_store = tbl_store.id_store
where
			tbl_item.id_item = tbl_products.iditem
        and tbl_products.id_products = tbl_stock.id_products
        and tbl_store.id_store = tbl_stock.id_store
        and tbl_store.store_name LIKE '$q%'
group by tbl_stock.id_store";


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

    public function getEmpName_for_ItemListSummery($q, $select) {
        $sql = "select 
    tbl_employee.id_employee, concat(employee_first_name, ' ' ,employee_last_name)as full_name
from
    tbl_item tbl_item
        INNER JOIN
    tbl_products tbl_products
        INNER JOIN
    tbl_stock tbl_stock
        right join
    tbl_store ON tbl_stock.id_store = tbl_store.id_store
	 inner join tbl_employee
where
			tbl_item.id_item = tbl_products.iditem
        and tbl_products.id_products = tbl_stock.id_products
        and tbl_store.id_store = tbl_stock.id_store
		and tbl_store.id_employee_registration=tbl_employee.id_employee_registration
        and tbl_employee.employee_first_name LIKE '$q%'
group by tbl_stock.id_store";


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

    /*
     * 
     * item list summery report
     * 2014-05-14
     * end............
     */

    public function getdetailTimeReport($dataArray) {


        if (isset($dataArray['emp_id']) && $dataArray['emp_id'] != "") {

            $id = $dataArray['emp_id'];
            //$date = $dataArray['date'];
        }
        if (isset($dataArray['date']) && $dataArray['date'] != "") {
            $date = $dataArray['date'];
            $apppend = "and tbl_sales_order.added_date='$date' and tbl_sales_order_products.added_date='$date'";
        }

        $sql = "select distinct
    tbl_sales_order.id_sales_order,
	tbl_employee.id_employee  ,
    tbl_sales_order_products.id_sales_order_products,
    tbl_outlet.outlet_name,
    sum((tbl_sales_order_products.product_price * tbl_sales_order_products.product_qty)) as amount,
    tbl_sales_order.added_date,
    tbl_sales_order.added_time
from
    tbl_outlet
        inner join
    tbl_outlet_has_branch ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        inner join
    tbl_sales_order ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        inner join
    tbl_sales_order_products ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        inner join
    tbl_employee_has_place ON tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        inner join
    tbl_employee ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
where
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        and tbl_employee.id_employee ='$id'
        and tbl_outlet.outlet_status=1
        and tbl_sales_order.sales_order_status = 1
        and tbl_sales_order_products.sales_order_products_status = 1
        and tbl_employee.employee_status = 1
        {$apppend} group by tbl_sales_order.id_sales_order";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function getItesms_for_time_report($oder_id) {

        $sql = "select 
   tsop.product_qty,tsop.product_price,tsop.discount, ((tsop.product_price*tsop.product_qty)) as amount, ti.item_name,ti.item_account_code
from
    tbl_sales_order tso
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
        inner join
    tbl_products tp ON tsop.id_products = tp.id_products
        inner join
    tbl_item ti ON ti.id_item = tp.iditem
where
    tso.id_sales_order = {$oder_id}
        and tso.sales_order_status = 1
        and tp.product_status = 1
        and tsop.sales_order_products_status = 1";
        return $this->db->mod_select($sql);
    }

    public function get_employee_names_for_daily_items($q, $select) {
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
    #tbl_user_type.user_type = 'Distributor'
         employee_status = 1
        AND tbl_employee.employee_status = 1
        AND tbl_employee_has_place.employee_has_place_status = 1
        AND employee_first_name LIKE '%$q%'
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

    /*
     * Sales Order Report- Distributor Autocomplete
     * 
     * @author Faazy ahamed
     * @contact faaziahamed@gmail.com
     */

    public function getDstributorforsalesReport($id, $select) {

        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
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

        if ($userdata == "Distributor") {

            $appdend = " and tbl_employee_has_place.id_physical_place = '$id_physical_place'";
        }

//        $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as employee_first_name  
//            ,tbl_employee_has_place.id_employee_has_place,tbl_employee_has_place.id_physical_place FROM tbl_employee tbl_employee 
//            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee 
//            INNER JOIN tbl_sales_order tbl_sales_order ON tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place 
//            WHERE  CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) LIKE '%$id%' {$query_append} GROUP BY tbl_sales_order.id_employee_has_place";

        $sql = "SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee_has_place.id_physical_place,
    tbl_employee.id_employee,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_first_name
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
        AND employee_first_name LIKE '%$id%' {$query_append}
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

    public function getviewPurchaseing_detais() {
        $pOderId = $_REQUEST['pOder_id'];
        $sql = "select 
    tbl_item.id_item,
    tbl_products.id_products,
    tbl_item.item_name,
    tbl_item.item_account_code,
    tbl_products.product_cost as product_price,
    tbl_purchase_order_has_products.item_qty,
    round((tbl_products.product_cost * tbl_purchase_order_has_products.item_qty),
            2) as amount,
concat( tbl_employee.employee_first_name,' ', tbl_employee.employee_last_name )as full_name,
tbl_purchase_order.purchase_order_number,
tbl_purchase_order.purchase_order_remark,
tbl_purchase_order.purchase_order_date

from
    tbl_item
        inner join
    tbl_products ON tbl_item.id_item = tbl_products.iditem
        inner join
    tbl_purchase_order_has_products ON tbl_products.id_products = tbl_purchase_order_has_products.id_products
inner join
tbl_purchase_order on tbl_purchase_order_has_products.id_purchase_order= tbl_purchase_order.id_purchase_order
inner join
tbl_employee_has_place on tbl_purchase_order.id_employee_has_place= tbl_employee_has_place.id_employee_has_place
inner join 
tbl_employee on tbl_employee_has_place.id_employee= tbl_employee.id_employee
where
    tbl_purchase_order_has_products.item_status = 1
        and tbl_purchase_order_has_products.id_purchase_order =$pOderId ";

        return $this->db->mod_select($sql);
    }

    public function purchaseDetails() {


        if (isset($_REQUEST['manage_employee_name_id']) && $_REQUEST['manage_employee_name_id'] != null) {
            $emp = $_REQUEST['manage_employee_name_id'];
//            $append .= "and em.id_employee='$emp' ";
            $append = "and tbl_employee_has_place.id_employee_has_place=$emp";
        }

        if (isset($_REQUEST['manage_podprimary_no']) && $_REQUEST['manage_podprimary_no'] != null) {
            $pno = $_REQUEST['manage_podprimary_no'];
            $append = "and tbl_purchase_order.id_purchase_order=$pno";
        }

        if (isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != '') {
            $start_date = $_REQUEST['start_date'];
            $end_date = $_REQUEST['end_date'];
            $append = " AND tbl_purchase_order.added_date BETWEEN '$start_date' AND '$end_date'";
        }
        $log_type = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if ($log_type == "Distributor") {
            $append .= "and tbl_employee_has_place.id_physical_place='$id_physical_place'";
        }
        if ($log_type == "Regional Manager" || $log_type == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append1 = "and tbl_employee_has_place.id_physical_place in (select 
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
    tbl_purchase_order.added_time,
    tbl_dilivery_note.id_dilivery_note,
    tbl_purchase_order.purchase_order_number,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_first_name,
    tbl_purchase_order.purchase_order_date,
    tbl_purchase_order.id_purchase_order,
    tbl_employee_has_place.id_employee_has_place,
    sum(tbl_purchase_order_has_products.item_qty) totalQty,
    tbl_products.product_price,
    tr.territory_name, tbl_purchase_order_has_products.id_products,
	sum( tbl_products.product_cost * tbl_purchase_order_has_products.item_qty) total
FROM
    tbl_employee_has_place tbl_employee_has_place
        INNER JOIN
    tbl_employee tbl_employee
        INNER JOIN
    tbl_purchase_order tbl_purchase_order
        inner join
    tbl_purchase_order_has_products ON tbl_purchase_order.id_purchase_order = tbl_purchase_order_has_products.id_purchase_order
        inner join
    tbl_products ON tbl_purchase_order_has_products.id_products = tbl_products.id_products
        LEFT JOIN
    tbl_dilivery_note tbl_dilivery_note ON tbl_purchase_order.id_purchase_order = tbl_dilivery_note.id_purchase_order
        inner join
    tbl_territory tr ON tbl_employee_has_place.id_territory = tr.id_territory
WHERE
    tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
        AND tbl_purchase_order.purchase_order_status = '1'
        AND tbl_employee.id_employee = tbl_employee_has_place.id_employee
		and tbl_purchase_order_has_products.item_status=1
        {$append} {$append1}
	group by tbl_purchase_order.purchase_order_number
ORDER BY tbl_purchase_order.purchase_order_date desc";
        return $this->db->mod_select($sql);
    }

    public function getPurchaseOrderNoData($order_no, $select) {
        $sql = '';
        if (isset($_GET['manage_employee_name_id_hidden']) && $_GET['manage_employee_name_id_hidden'] != '') {
            $manage_employee_name_id = $_GET['manage_employee_name_id_hidden'];
            $sql = "id_employee_has_place ='$manage_employee_name_id' AND";
        }
        //term
        $query = "SELECT purchase_order_number,id_purchase_order FROM tbl_purchase_order WHERE 
            {$sql} purchase_order_number LIKE '%$order_no%'";
        $query_result = $this->db->query($query);
        $result = $query_result->result('array');
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

    public function getPurchaseOrderNo_employes($emp_id, $select) {
        $log_type = $this->session->userdata('user_type');
//        $id_physical_place=$this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        if ($log_type == "Regional Manager" || $log_type == "Area Sales Manager - User") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $append = "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }

        $sql = "SELECT tbl_purchase_order.id_employee_has_place,CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name
            FROM tbl_employee tbl_employee INNER JOIN tbl_employee_has_place tbl_employee_has_place
            INNER JOIN tbl_purchase_order tbl_purchase_order WHERE  
            tbl_purchase_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place and tbl_purchase_order.purchase_order_status=1  and
            tbl_employee_has_place.id_employee = tbl_employee.id_employee AND tbl_employee.employee_first_name LIKE '$emp_id%' {$append} GROUP BY tbl_employee.employee_first_name";

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

    public function getBrand_for_stock_availability($q, $select) {
        $sql = "select 
                ib.brand_name, ib.item_brand_id
            from
                tbl_item_brand ib
            where
            ib.brand_staus=1 and ib.brand_name like '%$q%' ";
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

    /*
     * map filters model funtion
     */

    public function getRegions($q, $select) {
        $sql = "SELECT 
    tt.territory_name,tt.id_territory,tt.territory_hierarchy
FROM
    tbl_territory_type tty
        inner join
    tbl_territory tt ON tty.id_territory_type = tt.id_territory_type
WHERE
    tty.territory_type_status = 1 and tt.territory_status = 1 and tt.id_territory_type = 2
    and tt.territory_name like '$q%'";
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

    public function getAreas($id = '') {

        $sqli = "SELECT 
            group_concat(id_territory) as ter
        FROM
            tbl_territory
        WHERE
            id_parent = (SELECT 
                    id_territory
                FROM
                    tbl_territory
                WHERE
                    id_territory = $id)";
        $mod_select0 = $this->db->mod_select($sqli);
        $val = $mod_select0[0]->ter . ",$id";

        $sql = "SELECT 
    tt.id_territory, tt.territory_name
FROM
    tbl_territory_type tty
        inner join
    tbl_territory tt ON tty.id_territory_type = tt.id_territory_type
WHERE
    tty.territory_type_status = 1 and tt.territory_status = 1 and tt.id_territory_type = 3 and tt.id_parent in ($val) or tt.id_parent in (SELECT 
            id_territory
        FROM
            tbl_territory
        WHERE
            id_territory = $id) ";

        $mod_select = $this->db->mod_select($sql);

        $json_array = array();

        if (count($mod_select) > 0 && $mod_select != '') {

            $json_array['response'] = count($mod_select);
            $json_array['collection_data'] = $mod_select;

            if (count($mod_select_emp) > 0 && $mod_select_emp != '') {
                $json_array['emp_data'] = $mod_select_emp;
                $json_array['emp_response'] = count($mod_select_emp);
            } else {
                $json_array['emp_response'] = 0;
            }
        } else {
            $json_array['response'] = 0;
        }

        echo json_encode($json_array);
        ;
    }

    public function getDistributor() {
        $area = $_REQUEST['area'];
        $sql = "select 
    CONCAT(te.employee_first_name,
            ' ',
            te.employee_last_name) as name,
    tehp.id_employee_has_place,
    tehp.id_physical_place,
	te.id_employee_type
    
from
    tbl_employee_has_place tehp
        inner join
    tbl_employee te ON tehp.id_employee = te.id_employee
where
    te.employee_status = 1
        and tehp.employee_has_place_status = 1
        and tehp.id_territory = $area";


        $mod_select1 = $this->db->mod_select($sql);

        $json_array = array();

        if (count($mod_select1) > 0) {
            $json_array['rep_name'] = $mod_select1;

            $sql_dis = "select 
    CONCAT(te.employee_first_name,
            ' ',
            te.employee_last_name) as name,
    tehp.id_employee_has_place,
    tehp.id_physical_place,
    tehp.id_territory
from
    tbl_employee_has_place tehp
        inner join
    tbl_employee te ON tehp.id_employee = te.id_employee
where
    te.employee_status = 1
        and tehp.employee_has_place_status = 1
        and tehp.id_physical_place =" . $mod_select1[0]->id_physical_place . " and te.id_employee_type=2";

            $mod_selectdis = $this->db->mod_select($sql_dis);
            $json_array['dis_name'] = $mod_selectdis;
        }

        echo json_encode($json_array);
    }

    /*
     * end
     */
}
?>

