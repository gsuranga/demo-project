<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delars_stock_report_model
 *
 * @author Pavithra
 */
class delars_stock_report_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    //put your code here

    public function get_Name($q, $select) {
        $sql = "SELECT * FROM tbl_dealer where status=1 and delar_name like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]])) . "    " . htmlentities(stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAccNo($q, $select) {
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_account_no like '$q%' limit 10";
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

    public function getDealerStock($dealer_id, $month_from, $month_to) {

        if (isset($dealer_id) && isset($month_from) && isset($month_to)) {
            $start_date = $month_from . "-01";
            $end_date = $month_to . "-31";
            $first_date_of_last_month = $month_to . "-01";
            $date_create = date_create($first_date_of_last_month);
            date_sub($date_create, date_interval_create_from_date_string("6 months"));
            $first_date_after_6months = date_format($date_create, "Y-m-d");

            $sql = "select 
    it.item_part_no,
    it.description,
    ds.remaining_qty,
    ifnull((select 
                    max(tals.date_edit) as last_invoice_date
                from
                    tbl_all_sales tals
                        inner join
                    tbl_item ti ON tals.part_no = ti.item_part_no
                        and ti.status = 1
                        inner join
                    tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                        and td1.status = 1
                where
                    td1.delar_id = td.delar_id
                        and ti.item_id = it.item_id),
            '0000-00-00') as last_invoice_date,
    @movement_to_the_dealer_qty:=round(ifnull((select 
                            sum(tals.qty)
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and tals.status = 1
                                and ti.status = 1
                                inner join
                            tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                                and td1.status = 1
                        where
                            ti.item_id = it.item_id
                                and td1.delar_id = td.delar_id
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $end_date . "'),
                    0),
            2) as movement_to_the_dealer_qty,
    round(ifnull((@movement_to_the_dealer_qty / 6), 0),
            2) as movement_to_the_dealer_avg,
    @movement_to_the_customer_qty:=round(ifnull((select 
                            sum(tds.qty)
                        from
                            tbl_dealer_sales tds
                        where
                            tds.status = 1
                                and tds.id_item = it.item_id
                                and tds.id_dealer = td.delar_id
                                and tds.sold_date between '" . $first_date_after_6months . "' and '" . $end_date . "'),
                    0),
            2) as movement_to_the_customer_qty,
    round(ifnull((@movement_to_the_customer_qty / 6), 0),
            2) as movement_to_the_customer_avg,
    round(ifnull((select 
                            sum(tds.qty)
                        from
                            tbl_dealer_sales tds
                        where
                            tds.status = 1
                                and tds.id_item = it.item_id
                                and tds.id_dealer = td.delar_id
                                and tds.sold_date between '" . $start_date . "' and '" . $end_date . "'),
                    0),
            2) as movement_for_the_period,
    round(ifnull((select 
                            sum(tals.selling_val) / 6
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and tals.status = 1
                                and ti.status = 1
                                inner join
                            tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                                and td1.status = 1
                        where
                            ti.item_id = it.item_id
                                and td1.delar_id = td.delar_id
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $end_date . "'),
                    0),
            2) as turnover
from
    tbl_dealer_stock ds
        inner join
    tbl_item it ON ds.part_id = it.item_id
        inner join
    tbl_dealer td ON ds.dealer_id = td.delar_id
where
    ds.status = 1 and td.delar_id = " . $dealer_id . "
group by it.item_id
order by turnover desc";
            return $this->db->mod_select($sql);
        }
    }

    //--------------------------------------------------Stock Availability : Dinesh-------------------------------------

    public function getStocksAvailability($type_id, $employee_id, $part_id, $month_from, $month_to) {
        $start_date = $month_from . "-01";
        $end_date = $month_to . "-31";
        $first_date_of_last_month = $month_to . "-01";
        $date_create = date_create($first_date_of_last_month);
        date_sub($date_create, date_interval_create_from_date_string("6 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");
        $query_part = "";
        $full_sql = "";
        $main_sql = "select 
    td.delar_id,
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tar.area_name,
    round(coalesce((select 
                            remaining_qty
                        from
                            tbl_dealer_stock
                        where
                            part_id = " . $part_id . "
                                and dealer_id = td.delar_id
                                and td.status = 1),
                    0),
            0) as available_qty,
    @movement_to_the_dealer_qty:=round(ifnull((select 
                            sum(tals.qty)
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and tals.status = 1
                                and ti.status = 1
                                inner join
                            tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                                and td1.status = 1
                        where
                            ti.item_id = " . $part_id . "
                                and td1.delar_id = td.delar_id
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $end_date . "'),
                    0),
            2) as movement_to_the_dealer_qty,
    round((@movement_to_the_dealer_qty / 6), 2) as movement_to_the_dealer_avg,
    @movement_to_the_customer_qty:=round(ifnull((select 
                            sum(tds.qty)
                        from
                            tbl_dealer_sales tds
                        where
                            tds.status = 1 and tds.id_item = " . $part_id . "
                                and tds.id_dealer = td.delar_id
                                and tds.sold_date between '" . $first_date_after_6months . "' and '" . $end_date . "'),
                    0),
            2) as movement_to_the_customer_qty,
    round((@movement_to_the_customer_qty / 6), 2) as movement_to_the_customer_avg,
    round(ifnull((select 
                            sum(tds.qty)
                        from
                            tbl_dealer_sales tds
                        where
                            tds.status = 1 and tds.id_item = " . $part_id . "
                                and tds.id_dealer = td.delar_id
                                and tds.sold_date between '" . $start_date . "' and '" . $end_date . "'),
                    0),
            2) as movement_for_the_period
from
    tbl_dealer td
        left join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
        left join
    tbl_branch tbr ON tso.branch_id = tbr.branch_id
        and tbr.status = 1
        left join
    tbl_area tar ON tbr.area_id = tar.area_id
        and tar.status = 1
where ";
        if ($type_id == 3) {
            $query_part = "td.sales_officer_id = " . $employee_id . " and td.status = 1 order by available_qty desc";
            $full_sql = $main_sql . $query_part;
        } elseif ($type_id == 1) {
            $query_part = "td.status = 1 order by available_qty desc";
            $full_sql = $main_sql . $query_part;
        }
        return $this->db->mod_select($full_sql);
    }

}
