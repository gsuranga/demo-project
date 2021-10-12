<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class partmovement_profile_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBranchDetail() {
        $sql = "SELECT `area_id`,`area_name`,`area_code` FROM `tbl_area` WHERE 1";
        return $this->db->mod_select($sql);
    }

    public function get_parts() {
        $sql = "SELECT tbl_item.item_part_no,tbl_item.model,tbl_item.description, ifnull(round(sum(tbl_all_sales.qty),2),0) AS qty ,ifnull(round(sum(tbl_all_sales.selling_val) ,2),0) AS val ,ifnull(round(sum(tbl_all_sales.cost_price) ,2),0) AS costval FROM `tbl_item` LEFT JOIN tbl_all_sales ON  tbl_item.item_part_no=tbl_all_sales.part_no where tbl_item.status=1 GROUP BY  tbl_item.item_id ORDER by val DESC   ";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function getCounterQty($partno) {
        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }
        $apendarea = "";


        $sql = "SELECT    
    ifnull(round(sum(als.qty),2),0) AS counter ,ifnull(round(sum(als.selling_val),2),0) AS counterValue  
FROM
    tbl_all_sales als
        INNER JOIN
    tbl_area ar ON als.area_id = ar.area_id
        AND als.status = 1
        AND ar.status = 1
        
        INNER JOIN
    tbl_counter tco ON ar.area_id = tco.area_id
        AND als.de = tco.identifier
        AND tco.counter_id in (SELECT counter_id FROM tbl_counter where status=1 $apendarea) AND als.part_no='$newpart'";

//        $sql="SELECT 
//    IFNULL(ROUND(SUM(als.qty), 2), 0) AS counter
//FROM
//    tbl_all_sales als
//        INNER JOIN
//    tbl_area ar ON als.area_id = ar.area_id
//        AND als.status = 1
//        AND ar.status = 1
//        INNER JOIN
//    tbl_counter tco ON ar.area_id = tco.area_id
//        AND als.de = tco.identifier
//        AND tco.counter_id IN (SELECT 
//            counter_id
//        FROM
//            tbl_counter
//        WHERE
//            status = 1)
//        AND als.part_no = '$newpart'
//        AND als.acc_no IN (SELECT 
//            acc_no
//        FROM
//            tbl_all_sales
//                INNER JOIN
//            tbl_dealer ON tbl_all_sales.acc_no = tbl_dealer.delar_account_no
//        WHERE
//            tbl_all_sales.part_no = '$newpart')";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function dealerSaleINCounter($partno) {
        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }

        $sql = "SELECT 
    IFNULL(ROUND(SUM(als.qty), 2), 0) AS dealersalescounter,IFNULL(ROUND(SUM(als.selling_val), 2), 0) AS dealersalescounterValue
FROM
    tbl_all_sales als
        INNER JOIN
    tbl_area ar ON als.area_id = ar.area_id
        AND als.status = 1
        AND ar.status = 1
            
        INNER JOIN
    tbl_counter tco ON ar.area_id = tco.area_id INNER JOIN tbl_dealer ON als.acc_no=tbl_dealer.delar_account_no
        AND als.de = tco.identifier
        AND tco.counter_id IN (SELECT 
            counter_id
        FROM
            tbl_counter
        WHERE
            status = 1)
        AND als.part_no = '$newpart'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function getdealercount($partno) {

        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }
        $sql = "SELECT ifnull(round(sum(tbl_all_sales.qty),2),0) as dealersale,ifnull(round(sum(tbl_all_sales.selling_val),2),0) as dealersaleValue FROM tbl_all_sales INNER JOIN tbl_dealer ON tbl_all_sales.acc_no=tbl_dealer.delar_account_no where tbl_all_sales.part_no='$newpart' ";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function getWorkShopWCount($partno) {
        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }
        $sql = "select 
    ifnull(round(sum(als.qty),2),0) workshopcount,ifnull(round(sum(als.selling_val),2),0) workshopcountValue
    from
    tbl_all_sales als
    inner join
    tbl_area ar ON als.area_id = ar.area_id
    and als.status = 1
    and ar.status = 1
       inner join
    tbl_workshop tw ON ar.area_id = tw.area_id
    and tw.status = 1
    and tw.workshop_id IN (Select workshop_id FROM tbl_workshop)
    and als.de = tw.identifier and part_no='$newpart' AND als.acc_no LIKE  '000w%'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function getWorkShopNCount($partno) {
        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }
        $sql = "select 
    ifnull(round(sum(als.qty),2),0) workshopcount,ifnull(round(sum(als.selling_val),2),0) workshopcountValue
    from
    tbl_all_sales als
    inner join
    tbl_area ar ON als.area_id = ar.area_id
    and als.status = 1
    and ar.status = 1
   
    inner join
    tbl_workshop tw ON ar.area_id = tw.area_id
    and tw.status = 1
    and tw.workshop_id IN (Select workshop_id FROM tbl_workshop)
    and als.de = tw.identifier and part_no='$newpart' AND als.acc_no Not LIKE  '000w%'";
        $res = $this->db->mod_select($sql);

        return $res;
    }

    public function institutonalCount($partno) {
        $newpart = $partno;
        if (strpos($partno, "\\") !== false) {
            $newpart = str_replace("\\", "\\\\", $partno);
        }
        if (strpos($partno, "'") !== false) {
            $newpart = str_replace("'", '"', $partno);
        }
        $sql = "SELECT 
     ifnull(round(sum( als.qty),2),0) as insCount,ifnull(round(sum( als.selling_val),2),0) as insCountValue
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
    tso.sales_type_id = 5 AND ar.area_id in(SELECT area_id FROM tbl_area WHERE status=1 )AND als.part_no='$newpart'

";
        $res = $this->db->mod_select($sql);

        return $res;
    }

}
