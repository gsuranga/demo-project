<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class manth_wise_summary_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_monthwise_summary($typeid, $userid) {
        // print_r($userid);
        $del = 1;
        $gar = 2;
        $Fleet = 3;
        $Newshop = 4;
        $Vehicleowner = 5;

        $sql = "";
        if ($del == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (td.delar_name) as nam,
    (td.delar_account_no) as account,
    (td.delar_address) as address,
    (td.Contact_number) as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
             concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_dealer as td ON tsov.selected_id = td.delar_id
where
    tsov.visit_category = '1'
        and tsov.status = '1'
        and tsov.sales_officer_id = {$userid}
group by td.delar_account_no , yearMonthNotaion";
        } elseif ($gar == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    (tg.garage_name)as nam,
    (tg.garage_account_no)as account,
    (tg.garage_address)as address,
    (tg.garage_contact_no)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_garage as tg ON tsov.selected_id = tg.garage_id
where
    tsov.visit_category = '2'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tg.garage_account_no , yearMonthNotaion";
        } elseif ($Fleet == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (tc.customer_name)as nam,
    (tc.cust_account_no)as account,
    (tc.cust_address)as address,
    (tc.cust_contact_no)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_customer as tc ON tsov.selected_id = tc.customer_id
where
    tsov.visit_category = '3'
        and tc.customer_type = '3'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tc.cust_account_no , yearMonthNotaion
";
        } elseif ($Newshop == $typeid) {
            $sql = "";
        } elseif ($Vehicleowner == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (tvm.vehicle_model_name)as nam,
    (tv.vehicle_reg_no)as account,
    (tv.address) as address,
    (tv.contact_number)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_vehicle as tv ON tsov.selected_id = tv.vehicle_id
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id
where
    tsov.visit_category = '5'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tv.vehicle_reg_no , yearMonthNotaion";
        }
        return $this->db->mod_select($sql);
        //echo $sql;
    }

    public function get_all_month_summary($typeid, $userid) {
        $all = 0;
        $sql = "";
        if ($all == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (td.delar_name) as nam,
    (td.delar_account_no) as account,
    (td.delar_address) as address,
    (td.Contact_number) as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
             concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_dealer as td ON tsov.selected_id = td.delar_id
where
    tsov.visit_category = '1'
        and tsov.status = '1'
        and tsov.sales_officer_id = {$userid}
group by td.delar_account_no , yearMonthNotaion";
            //$sql4="";
        }

        return $this->db->mod_select($sql);
    }

    public function get_all_month_summary1($typeid, $userid) {
        $all = 0;
        $sql = "";
        if ($all == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    (tg.garage_name)as nam,
    (tg.garage_account_no)as account,
    (tg.garage_address)as address,
    (tg.garage_contact_no)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_garage as tg ON tsov.selected_id = tg.garage_id
where
    tsov.visit_category = '2'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tg.garage_account_no , yearMonthNotaion";
            //$sql4="";
        }

        return $this->db->mod_select($sql);
    }

    public function get_all_month_summary2($typeid, $userid) {
        $all = 0;
        $sql = "";
        if ($all == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (tc.customer_name)as nam,
    (tc.cust_account_no)as account,
    (tc.cust_address)as address,
    (tc.cust_contact_no)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_customer as tc ON tsov.selected_id = tc.customer_id
where
    tsov.visit_category = '3'
        and tc.customer_type = '3'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tc.cust_account_no , yearMonthNotaion";
            //$sql4="";
        }

        return $this->db->mod_select($sql);
    }

    public function get_all_month_summary3($typeid, $userid) {
        $all = 0;
        $sql = "";
        if ($all == $typeid) {
            $sql = "select 
    count(tsov.selected_id) as count,
    tsov.visit_date,
    tsov.visit_time,
    (tvm.vehicle_model_name)as nam,
    (tv.vehicle_reg_no)as account,
    (tv.address) as address,
    (tv.contact_number)as contact,
    concat(year(tsov.visit_date),
            '-',
            month(tsov.visit_date)) as yearMonthNotaion,
            concat(month(tsov.visit_date)) as Months
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_vehicle as tv ON tsov.selected_id = tv.vehicle_id
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id
where
    tsov.visit_category = '5'
        and tsov.status = '1'
        and tsov.sales_officer_id ={$userid}
group by tv.vehicle_reg_no , yearMonthNotaion";
            //$sql4="";
        }

        return $this->db->mod_select($sql);
    }

    public function get_sales_officerId($q, $select) {

        $sql = "select sales_officer_name,sales_officer_id from tbl_sales_officer WHERE sales_officer_name like '$q%'";
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

    public function viewAllDistrict() {
        $sql = "SELECT 
    tvc.category_name, tvc.visit_category_id
FROM
    tbl_visit_category as tvc
where
    status = '1'";
        return $this->db->mod_select($sql);
    }

    public function get_salesOfficerInAPM($q, $select) {
        $userid = $this->session->userdata('employe_id');
        $sql = "tso.sales_officer_name,
tso.sales_officer_id
from
    tbl_apm as ta
        inner join
    tbl_sales_officer as tso ON ta.branch_id =tso.branch_id where ta.apm_id={$userid}";

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
