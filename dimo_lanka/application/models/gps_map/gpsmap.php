<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class gpsmap extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllBranch($q, $select) {
        $sql = "select branch_id,branch_name from tbl_branch WHERE branch_name LIKE '" . $q . "%'";
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

    public function getSalesOfficer($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE sales_officer_name LIKE '" . $q . "%' ";
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

    public function getAlldealers($q, $select) {
        $sql = "select td.delar_name,td.delar_id from tbl_dealer as td where td.delar_name LIKE '" . $q . "%' ";
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

    public function getGPSdetails() {
//        print_r();
//        print_r();
        $s_id = $_REQUEST['sales_officer_id'];

        $s_date = $_REQUEST['date'];

//        if ((isset($_REQUEST['s_name'])&& isset($_REQUEST['s_officer_name'])) && ($_REQUEST['s_name'] != null && $_REQUEST['s_officer_name'] != null)) {
//           
//            $s_id = $_REQUEST['h_s_officer_name'];
//           
//            $s_date = $_REQUEST['s_name'];
//           
//        }

        $sql = "select 
    tdpo.purchase_order_id,
    tdpo.lat,
    tdpo.lon,
    tdpo.complete,
    tdpo.battery,
    tdpo.time
from
    tbl_dealer_purchase_order as tdpo
where tdpo.status = 1 
        and
    tdpo.sales_officer_id = {$s_id}
        and tdpo.date = '{$s_date}' and (tdpo.complete = 0 
        or tdpo.complete = 1)";
        return $this->db->mod_select($sql);
    }

    public function getGPSdetails_set($pur_id) {

        // print_r($get_p_id);
        $sql = "select 
    tso.sales_officer_name,
    tb.branch_name,
    td.delar_name,
    tdpo.amount,
    tdpo.without_vat,
    tdpo.complete
from
    tbl_dealer_purchase_order as tdpo
        inner join
    tbl_sales_officer as tso ON tdpo.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_branch as tb ON tso.branch_id = tb.branch_id
        inner join
    tbl_dealer as td ON tdpo.dealer_id = td.delar_id
where  tdpo.status = 1
        and
     tdpo.purchase_order_id ={$pur_id}";
        return $this->db->mod_select($sql);
    }

    public function tour_details() {
        //print_r($_REQUEST);
        $s_id = '';
        $s_date = '';
        if (isset($_REQUEST['h_s_officer_name_id']) && isset($_REQUEST['start_date_id'])) {

            $s_id = $_REQUEST['h_s_officer_name_id'];

            $s_date = $_REQUEST['start_date_id'];
            //print_r($s_date);
            //print_r($s_id);
        }
        //print_r($s_date);
        //print_r($s_id);
        $sql = "select 
    tsol.latitude,
    tsol.longitude,
    tsol.location_name,
    tsol.batteryLevel,
    tsol.time
from
    tbl_sales_officer_location as tsol
where
    tsol.user_id = {$s_id}
        and tsol.date = '{$s_date}'";
        //print_r($sql);
        //return $this->db->mod_select($sql);
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        $json_array['locations'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['location_names'] = $row['location_name'];
            //$subJson['date'] = $row['added_date'];
            $subJson['time'] = $row['time'];
//            $subJson['lat']=$row['gps_latitude'];
//            $subJson['longi']=$row['gps_longitude'];
            //$subJson['lat'] = $row['latitude'];
            $subJson['longi'] = $row['latitude'];
            //$subJson['longi'] = $row['longitude'];
            $subJson['lat'] = $row['longitude'];
            $subJson['bat'] = $row['batteryLevel'];
            

            array_push($json_array['locations'], $subJson);
        }
        //array_push($json_array, $new_row);
        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

}
