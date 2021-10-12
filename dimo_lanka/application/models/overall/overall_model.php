<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class overall_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTotalValues($fromdate, $todate) {
        $sql = "SELECT 
    SUM(selling_val) AS sellingval, SUM(cost_price*qty) AS costval
FROM
    tbl_all_sales
WHERE
    date_edit BETWEEN '$fromdate' AND '$todate'
        AND Status = 1 and part_no like 'T%'  OR tbl_all_sales.part_no like 'V%'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function get_parts($fromdate, $todate) {
        $sql = "SELECT 
    item_part_no AS itemparts,
    model,
    description,
    (SELECT 
            IFNULL(ROUND(SUM(tbl_all_sales.qty), 2), 0)
        FROM
            tbl_all_sales
        WHERE
            part_no = itemparts
                AND date_edit BETWEEN '$fromdate' AND '$todate') AS qty,
    (SELECT 
            IFNULL(ROUND(SUM(tbl_all_sales.selling_val), 2),
                        0)
        FROM
            tbl_all_sales
        WHERE
            part_no = itemparts
                AND date_edit BETWEEN '$fromdate' AND '$todate') AS val,
    (SELECT 
            IFNULL(ROUND(SUM(tbl_all_sales.cost_price*qty), 2),
                        0)
        FROM
            tbl_all_sales
        WHERE
            part_no = itemparts
                AND date_edit BETWEEN '$fromdate' AND '$todate') AS costval
FROM
    tbl_item WHERE  Status = 1 AND item_part_no like 'T%'  OR item_part_no like 'V%' 
ORDER BY val DESC   ";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function get_parts2($fromdate, $todate) {
        $sql = "SELECT part_no,sum(selling_val) AS val,sum(cost_price*qty) AS costval,
   IFNULL(round((sum(selling_val)-sum(cost_price*qty)),2),0) AS prof
FROM
    tbl_all_sales
WHERE
    date_edit BETWEEN '$fromdate' AND '$todate'
        AND Status = 1
        AND part_no like 'T%' 
        OR part_no like 'V%'
GROUP BY part_no
ORDER BY prof DESC";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function getDealerSales($fromdate, $todate) {
//        $sql = "SELECT 
//    IFNULL(tbl_all_sales.part_no,0) AS part_no,
//    IFNULL(ROUND(SUM(tbl_all_sales.qty), 2), 0) AS qty,
//    IFNULL(ROUND(SUM(tbl_all_sales.selling_val), 2),
//            0) AS tovalue
//FROM
//    tbl_all_sales
//        INNER JOIN
//    tbl_dealer ON tbl_all_sales.acc_no = tbl_dealer.delar_account_no Where tbl_all_sales.date_edit BETWEEN '$fromdate' AND '$todate' and  tbl_all_sales.acc_no AND tbl_all_sales.part_no like 'T%'  OR tbl_all_sales.part_no like 'V%' 
//GROUP BY tbl_all_sales.part_no
//ORDER BY tovalue DESC  ";
        $sql = "SELECT 
    IFNULL(tbl_all_sales.part_no,0) AS part_no,
    IFNULL(ROUND(SUM(tbl_all_sales.qty), 2), 0) AS qty,
    IFNULL(ROUND(SUM(tbl_all_sales.selling_val), 2),
            0) AS tovalue, IFNULL(ROUND(SUM(tbl_all_sales.cost_price*tbl_all_sales.qty), 2),
            0) AS costvalue
FROM
    tbl_all_sales
        INNER JOIN
    tbl_dealer ON tbl_all_sales.acc_no = tbl_dealer.delar_account_no Where tbl_all_sales.date_edit BETWEEN '$fromdate' AND '$todate' and  (tbl_all_sales.part_no like 'T%'  OR tbl_all_sales.part_no like 'V%') 
GROUP BY tbl_all_sales.part_no
ORDER BY tovalue DESC";
        $res = $this->db->mod_select($sql);

        return $res;
    }

}
