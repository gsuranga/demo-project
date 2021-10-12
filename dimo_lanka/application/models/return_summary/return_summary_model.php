<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class return_summary_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getArea($q, $select) {
        $sql = "select 
    ta.area_name, ta.area_id
from
    tbl_area ta
where
    ta.status = 1 and ta.area_name LIKE '$q%' limit 10";
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

    public function getReturnSummaryDetail() {
//        print_r($_REQUEST['barnch_id']);
        $append = "";
        if (isset($_REQUEST['barnch_id']) && $_REQUEST['barnch_id'] != "") {
            $append.="AND tar.area_id = {$_REQUEST['barnch_id']}";
        }
        if (isset($_REQUEST['startDate']) && $_REQUEST['endDate'] != "") {
            $append.="  AND (tra.accepted_date BETWEEN '{$_REQUEST['startDate']}' AND '{$_REQUEST['endDate']}')";
        }
         $sql = "SELECT 
    tso.sales_officer_name,
    td.delar_account_no,
    td.delar_name,
    td.delar_address,
    ti.item_part_no,
    ti.description,
    trad.accepted_qty AS admin_accepted_qty,
    tdrd.return_reason AS dealer_ret_reason,
    tdr.added_date
FROM
    tbl_dealer_return tdr
        INNER JOIN
    tbl_dealer_return_detail tdrd ON tdr.dealer_ret_id = tdrd.dealer_ret_id
        AND tdr.status = 1
        AND tdrd.status = 1
        INNER JOIN
    tbl_return_rep trr ON tdr.dealer_ret_id = trr.dealer_return_id
        AND trr.status = 1
        INNER JOIN
    tbl_return_rep_detail trrd ON trr.return_rep_id = trrd.ret_rep_id
        AND tdrd.item_id = trrd.item_id
        AND trrd.status = 1
        INNER JOIN
    tbl_item ti ON trrd.item_id = ti.item_id
        AND ti.status = 1
        INNER JOIN
    tbl_return_admin tra ON trr.return_rep_id = tra.return_rep_id
        AND tra.status = 1
        INNER JOIN
    tbl_return_admin_detail trad ON tra.return_admin_id = trad.return_admin_id
        AND trad.item_id = trrd.item_id
        AND trad.status = 1
        INNER JOIN
    tbl_sales_officer tso ON trr.rep_id = tso.sales_officer_id
        AND tso.status = 1
        INNER JOIN
    tbl_dealer td ON tdr.dealer_id = td.delar_id
        AND td.status = 1
        INNER JOIN
    tbl_branch tbr ON td.branch_id = tbr.branch_id
        INNER JOIN
    tbl_area tar ON tbr.area_id = tar.area_id
WHERE
    trad.accepted_qty > 0 $append";
        return $this->db->mod_select($sql);
    }

}
