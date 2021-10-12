<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stockreport_model
 *
 * @author pavithra
 */
class stockreport_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAll($item_id) {

        $sql = "select 
    item_part_no,
    description,
    item_id,
    coalesce(total_stock_qty, 0) as total_stock_qty,
    round(coalesce(selling_price, 0), 2) as selling_price,
    (select 
            amount
        from
            tbl_vat
        where
            status = 1) as vat
FROM
    tbl_item
WHERE
    status = 1 and item_id = " . $item_id;
        return $this->db->mod_select($sql);
    }

    public function get_product($q, $select) {
        $sql = "SELECT * FROM tbl_item where status='1' and item_part_no like '$q%' limit 10";
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

    public function getDes($q, $select) {
        $sql = "SELECT * FROM tbl_item where status='1' and description like '$q%' limit 10";
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
