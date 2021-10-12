<?php

/**
 * @Decription rep wise target model
 * @author Faazi ahamed <faaziahamed@gmail.com>
 * @copyright (c) 2014, 
 */
class targetreport_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getreptarget($dataArray) {

        $append = "";

        if (isset($dataArray['txttren_date']) && $dataArray['txttren_date'] != "") {
            $date = $dataArray['txttren_date'];
            $append = "and trt.target_month = '$date'";
        }else{
             $start_date = date("Y-m");
             $append = "and trt.target_month = '$start_date'";
        }
        if (isset($dataArray['distributor_id']) && $dataArray['distributor_id'] != "") {
            $distributor = $dataArray['distributor_id'];
            $append .= " and trt.id_physical_place = '$distributor'";
        }
        $user_type= $this->session->userdata('user_type');
        $id_physical_place=$this->session->userdata('id_physical_place');
       $id_employeeHas = $this->session->userdata('id_employee_has_place'); 
        if ($user_type== "Distributor"){
            $append="and trt.id_physical_place='$id_physical_place'";
        }
        if ($user_type== "Sales Rep"){
            $append="and trt.id_employee_has_place='$id_employeeHas'";
            
        }


        $sql = "SELECT 
    trt.id_employee_has_place,
    trt.id_physical_place,
    trt.target_amount,
    trt.target_month,trt.added_date,
    (SELECT 
            concat(tem.employee_first_name,' ',tem.employee_last_name)
        FROM
            tbl_employee tem,
            tbl_employee_has_place ehp
        where
            tem.id_employee = ehp.id_employee
                and ehp.id_employee_has_place = trt.id_employee_has_place) as rep,
    (SELECT 
            concat(tem.employee_first_name,' ',tem.employee_last_name)
        FROM
            tbl_employee tem,
            tbl_employee_has_place ehp
        where
            tem.id_employee = ehp.id_employee
                and ehp.id_physical_place = trt.id_physical_place
        Limit 1) as distributor
FROM
    tbl_rep_target trt
where  
    trt.rep_target_status = '1' {$append}
       
       # and trt.id_employee_has_place = '49'
order by trt.id_physical_place desc";

//        echo $sql;
        $result = $this->db->mod_select($sql);

        return $result;
    }

    public function getreptargettotal($id_phy, $date) {

        $totalTarget = 0.00;
        $append = "";

        if (isset($date) && $date != "") {
            $dates = $date;
            $append .= "and trt.target_month = '$dates'";
        } else {
            $start_date = date("Y-m");
            $append .= "and trt.target_month = '$start_date'";
        }
        if (isset($id_phy) && $id_phy != "") {
            $distributor = $id_phy;
            $append .= " and trt.id_physical_place = '$distributor'";
        }



        $sql = "SELECT 
   sum(trt.target_amount) as totaltarget
FROM
    tbl_rep_target trt
where  
    trt.rep_target_status = '1' {$append}
       
       # and trt.id_employee_has_place = '49'
order by trt.id_physical_place desc";

        $result = $this->db->mod_select($sql);
        if (count($result) > 0) {
            $totalTarget = $result[0]->totaltarget;
        }


//    echo $sql;


        return $totalTarget;
    }
    public function getsales($id_phy = '', $id_ehp = '', $date = ''){
                $append = "";
        $append2 = "";
        if (isset($date) && $date != "") {
            $dateFull = $date . "-01";
            $dateEnd = $date . "-31";
            $append = " and tbl_sales_order.added_date BETWEEN '$dateFull' AND '$dateEnd'";
            $append2 = " and trn.added_date between '$dateFull' and '$dateEnd' ";
        } else {

            $start_date = date("Y-m-d");
            $end_date = date("Y-m") . "-31";

            $append = " and tbl_sales_order.added_date BETWEEN '$start_date' AND '$end_date'";
            $append2 = " and trn.added_date between '$start_date' and '$end_date' ";
        }

//        if (isset($id_phy) && isset($id_ehp) && $id_ehp != "" && $id_phy != "") {
//            
//        }

        $repachievemet = 0.00;
        $totalSales = 0.00;
        $totalReturn = 0.00;


        $sql_sales = "SELECT distinct
    tbl_sales_order.id_sales_order,
   
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_name,
    sum(tsop.product_qty * tsop.product_price) as totalsales
FROM
    tbl_sales_order tbl_sales_order
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        INNER JOIN
    tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        inner join
    tbl_sales_order_products tsop ON tbl_sales_order.id_sales_order = tsop.id_sales_order
WHERE
    tbl_sales_order.sales_order_status = '1'
        AND tbl_sales_order.id_employee_has_place = '$id_ehp' {$append}";

//        echo $sql_sales;

        $result_sales = $this->db->mod_select($sql_sales);

//        print_r($result_sales);

        $sql_return = "SELECT 
    ifnull(sum(trnp.return_product_qty * trnp.return_price),
            0.00) as reqty
FROM
    tbl_sales_order tsr
        inner join
    tbl_return_note trn ON tsr.id_sales_order = trn.id_sales_order
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
        inner join
    tbl_employee_has_place ehp ON trn.id_employee_has_place = ehp.id_employee_has_place
WHERE
    tsr.sales_order_status = 1
        and trn.return_note_status = 1
        and trnp.return_product_status = 1
        and trn.id_employee_has_place = '$id_ehp'
		and ehp.id_physical_place = '$id_phy' {$append2}";

        $result_retun = $this->db->mod_select($sql_return);


        if (count($result_sales) > 0) {
            $totalSales = $result_sales[0]->totalsales;
        }

        if (count($result_retun) > 0) {
            $totalReturn = $result_retun[0]->reqty;
        }

        $repachievemet = ($totalSales - $totalReturn);



        return $repachievemet;
    }

    public function getAchievement($id_phy = '', $id_ehp = '', $date = '') {
        $append = "";
        $append2 = "";
        if (isset($date) && $date != "") {
            $dateFull = $date . "-01";
            $dateEnd = $date . "-31";
            $append = " and tbl_sales_order.added_date BETWEEN '$dateFull' AND '$dateEnd'";
            $append2 = " and trn.added_date between '$dateFull' and '$dateEnd' ";
        } else {

            $start_date = date("Y-m-d");
            $end_date = date("Y-m") . "-31";

            $append = " and tbl_sales_order.added_date BETWEEN '$start_date' AND '$end_date'";
            $append2 = " and trn.added_date between '$start_date' and '$end_date' ";
        }

//        if (isset($id_phy) && isset($id_ehp) && $id_ehp != "" && $id_phy != "") {
//            
//        }

        $repachievemet = 0.00;
        $totalSales = 0.00;
        $totalReturn = 0.00;


        $sql_sales = "SELECT distinct
    tbl_sales_order.id_sales_order,
    tbl_invoice.id_invoice,
    concat(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as employee_name,
    sum(tsop.product_qty * tsop.product_price) as totalsales
FROM
    tbl_sales_order tbl_sales_order
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        INNER JOIN
    tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        inner JOIN
    tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
        inner join
    tbl_sales_order_products tsop ON tbl_sales_order.id_sales_order = tsop.id_sales_order
WHERE
    tbl_sales_order.sales_order_status = '1'
        AND tbl_sales_order.id_employee_has_place = '$id_ehp' {$append}";

//        echo $sql_sales;

        $result_sales = $this->db->mod_select($sql_sales);



        $sql_return = "SELECT 
    ifnull(sum(trnp.return_product_qty * trnp.return_price),
            0.00) as reqty
FROM
    tbl_sales_order tsr
        inner join
    tbl_return_note trn ON tsr.id_sales_order = trn.id_sales_order
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
        inner join
    tbl_employee_has_place ehp ON trn.id_employee_has_place = ehp.id_employee_has_place
WHERE
    tsr.sales_order_status = 1
        and trn.return_note_status = 1
        and trnp.return_product_status = 1
        and trn.id_employee_has_place = '$id_ehp'
		and ehp.id_physical_place = '$id_phy' {$append2}";

        $result_retun = $this->db->mod_select($sql_return);


        if (count($result_sales) > 0) {
            $totalSales = $result_sales[0]->totalsales;
        }

        if (count($result_retun) > 0) {
            $totalReturn = $result_retun[0]->reqty;
        }

        $repachievemet = ($totalSales - $totalReturn);



        return $repachievemet;
    }

    function getDistributorname($q, $select) {

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

}
