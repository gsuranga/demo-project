<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tour_itenerary_daily_model extends C_Model {

    public function __construct() {
        parent::__construct();
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

    public function get_tour_itenerary_daily($userId, $select_date) {
        
       // print_r($userId);
       
        $sql = "select 
    (tso.sales_officer_name) as nam,
    (tc.city_name) as town,
    (tvc.category_name) as category,
    (tvp.purpose_id_name) as purpose,
    (tsov.description) as details,
    (tsov.visit_date) as last_visit_date,
    tsov.sales_officer_id,
    tsov.branch_id
from
    tbl_sales_officer_visit as tsov
        inner join
    tbl_sales_officer as tso ON tsov.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_city as tc ON tsov.city_id = tc.city_id
        inner join
    tbl_visit_category as tvc ON tsov.visit_category = tvc.visit_category_id
        inner join
    tbl_visit_purpose as tvp ON tsov.visit_purpose = tvp.visit_purpose_id
where
    tsov.sales_officer_id = {$userId}
        and tsov.visit_date = '$select_date'";


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
