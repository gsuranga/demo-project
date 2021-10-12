<?php

/*
  Create By Insaf Zakariya (insaf.zak@gmail.com)
 */

class summary_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBranchDetail() {
        $sql = "SELECT area_id AS id ,area_name As name FROM tbl_area WHERE area_id !=1";
        return $this->db->mod_select($sql);
    }

    public function getDealerSales($areaid, $fromdate, $todate) {

        $sql = "SELECT 
    IFNULL(ROUND(SUM(tbl_all_sales.selling_val), 2),
            0) AS dealersaleValue,IFNULL(ROUND(SUM(tbl_all_sales.cost_price*tbl_all_sales.qty), 2),
            0) AS dealercostValue
FROM
    tbl_all_sales
        INNER JOIN
    tbl_dealer ON tbl_all_sales.acc_no = tbl_dealer.delar_account_no
WHERE
    tbl_all_sales.status = 1 AND date_edit BETWEEN '$fromdate' AND  '$todate' AND tbl_all_sales.area_id=$areaid";
        $res = $this->db->mod_select($sql);
        $dealervsd=$this->getDealerSaleeBYVSD($areaid, $fromdate, $todate);
        //echo $dealervsd[0];
        $res[0]->dealersaleValue=($dealervsd[0]->dealersaleValue)+($res[0]->dealersaleValue);
        $res[0]->dealercostValue=($dealervsd[0]->dealercostValue)+($res[0]->dealercostValue);
        return $res;
    }

    public function getDealerSaleeBYVSD($areaid, $fromdate, $todate) {

        $sql = "SELECT 
    IFNULL(ROUND(SUM(
    tbl_all_sales.selling_val), 2),
            0) AS dealersaleValue,
    IFNULL(ROUND(SUM(tbl_all_sales.cost_price * tbl_all_sales.qty),
                    2),
            0) AS dealercostValue
FROM
    tbl_all_sales
        INNER JOIN
    tbl_dealer ON tbl_all_sales.acc_no = tbl_dealer.delar_account_no
        INNER JOIN
    tbl_branch ON tbl_dealer.branch_id = tbl_branch.branch_id
        INNER JOIN
    tbl_area ON tbl_branch.area_id = tbl_area.area_id
WHERE
    tbl_all_sales.status = 1
        AND date_edit BETWEEN '$fromdate' AND '$todate'
        AND tbl_all_sales.area_id = 1
        AND tbl_area.area_id = $areaid";
        return $res = $this->db->mod_select($sql);
        //print_r($res);
    }

    public function getWorkShopNCount($areaid, $fromdate, $todate) {

        $sql = "SELECT 
    IFNULL(ROUND(SUM(als.selling_val), 2), 0) workshopncountValue,IFNULL(ROUND(SUM(als.cost_price*als.qty), 2), 0) workshopncountcostValue
FROM
    tbl_all_sales als
        INNER JOIN
    tbl_area ar ON als.area_id = ar.area_id
        AND als.status = 1
        AND ar.status = 1
        INNER JOIN
    tbl_workshop tw ON ar.area_id = tw.area_id
        AND tw.status = 1
        AND tw.workshop_id IN (SELECT 
            workshop_id
        FROM
            tbl_workshop)
        AND als.de = tw.identifier
        AND als.area_id = $areaid
        AND als.date_edit BETWEEN '$fromdate' AND  '$todate'
        AND als.acc_no NOT LIKE '000w%'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function workShopWCount($areaid, $fromdate, $todate) {

        $sql = "SELECT 
    IFNULL(ROUND(SUM(als.selling_val), 2), 0) workshopwcountValue,IFNULL(ROUND(SUM(als.cost_price*als.qty), 2), 0) workshopwcountcostValue
FROM
    tbl_all_sales als
        INNER JOIN
    tbl_area ar ON als.area_id = ar.area_id
        AND als.status = 1
        AND ar.status = 1
        INNER JOIN
    tbl_workshop tw ON ar.area_id = tw.area_id
        AND tw.status = 1
        AND tw.workshop_id IN (SELECT 
            workshop_id
        FROM
            tbl_workshop)
        AND als.de = tw.identifier
        AND als.area_id = $areaid
        AND als.date_edit BETWEEN '$fromdate' AND  '$todate'
        AND als.acc_no LIKE '000w%'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function insutSale($areaid, $fromdate, $todate) {
        $sql = "SELECT 
    ifnull(round(sum(als.selling_val), 2), 0) as insValue,
    ifnull(round(sum(als.cost_price * als.qty), 2),
            0) as insCostValue
FROM
    tbl_all_sales als
        INNER JOIN
    tbl_area ar ON als.area_id = ar.area_id
        AND als.status = 1
        AND ar.status = 1
        INNER JOIN
    tbl_sales_officer tso ON als.s_e_code = tso.sales_officer_code
        AND tso.status = 1
WHERE
    tso.sales_type_id = 5 AND ar.area_id = $areaid
        AND als.date_edit BETWEEN '$fromdate' AND  '$todate'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function pdi($areaid, $fromdate, $todate) {
        $sql = "SELECT 
    IFNULL(ROUND(sum(selling_val), 2), 0) AS pdiValue,
    IFNULL(ROUND(sum(cost_price * qty), 2), 0) AS pdiCostValue
FROM
    tbl_all_sales
WHERE
    de = 'I' AND  status = 1
        AND date_edit BETWEEN '$fromdate' AND  '$todate'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function counterSale($areaid, $fromdate, $todate) {
//        $sql = "SELECT 
//    IFNULL(round(sum(tbl_all_sales.selling_val),2),0) AS value,
//    IFNULL(round(sum(tbl_all_sales.cost_price * tbl_all_sales.qty),2),0) AS costvalue
//FROM
//    tbl_all_sales
//        INNER JOIN
//    tbl_counter ON tbl_all_sales.de = tbl_counter.identifier
//        INNER JOIN
//    tbl_dealer ON tbl_all_sales.acc_no != tbl_dealer.delar_account_no
//WHERE
//    tbl_counter.area_id = 2
//        AND tbl_all_sales.area_id = tbl_counter.area_id
//        AND tbl_all_sales.date_edit BETWEEN '2014-01-01' AND '2014-06-03'";
        $sql = "SELECT 
    IFNULL(round(sum(selling_val), 2), 0) AS value,
    IFNULL(round(sum(cost_price * qty), 2), 0) AS costvalue
FROM
    tbl_all_sales
        INNER JOIN
    tbl_counter ON tbl_all_sales.de = tbl_counter.identifier
WHERE
    tbl_counter.area_id = $areaid AND tbl_all_sales.status=1
        AND tbl_all_sales.area_id = tbl_counter.area_id
        AND tbl_all_sales.date_edit BETWEEN '$fromdate' AND  '$todate'
        AND tbl_all_sales.acc_no NOT IN (SELECT 
            delar_account_no
        FROM
            tbl_dealer)";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function totalValues($areaid, $fromdate, $todate) {
        $sql = "SELECT IFNULL(round(sum(selling_val), 2), 0) AS totallvalue,
    IFNULL(round(sum(cost_price * qty), 2), 0) AS totalcostvalue
FROM
    tbl_all_sales
               
WHERE
    tbl_all_sales.area_id=$areaid
        AND date_edit BETWEEN '$fromdate' AND  '$todate' AND  status=1";
        $res = $this->db->mod_select($sql);

        return $res;
    }

}
