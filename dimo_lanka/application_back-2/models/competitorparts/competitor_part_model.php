<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of competitor_part_model
 *
 * @author Iresha Lakmali
 */
class competitor_part_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAlCategories() {
        $sql = "SELECT visit_category_id,category_name FROM tbl_visit_category WHERE status=1";
        return $this->db->mod_select($sql);
    }

    public function getSalesOfficer($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE sales_officer_name LIKE '$q%'";
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

    public function set_category_type($q, $select, $user_type) {
        $sql = '';
        $cmb_category = $user_type;
        if ($cmb_category == "Dealer") {
            $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE status='1' AND delar_name LIKE '$q%' ";
        }
        if ($cmb_category == "Garage") {
            $sql = "select garage_id,garage_name,garage_account_no from tbl_garage WHERE status='1' AND garage_name LIKE '$q%' ";
        }
        if ($cmb_category == "Fleet Owner") {
            $sql = "select tc.customer_id, tc.customer_name, tc.cust_account_no,tv.vehicle_reg_no from  tbl_customer tc INNER JOIN tbl_vehicle tv ON tc.customer_id=tv.customer_id WHERE tc.status = '1' AND customer_type = '3' AND tv.vehicle_reg_no LIKE '$q%'";
        }
        if ($cmb_category == "New Shop") {
            $sql = "select shop_id,shop_name,shop_code from tbl_non_reg_shops WHERE status='1' AND shop_name LIKE '$q%'";
        }
        if ($cmb_category == "Vehicle Owner") {
            $sql = "select vehicle_id,vehicle_reg_no from tbl_vehicle WHERE status='1' AND vehicle_reg_no LIKE '$q%'";
        }


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

    public function getAllDealerName($q, $select) {
        $sql = "select delar_id,delar_name from tbl_dealer WHERE delar_name LIKE '$q%'";
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

    public function getAllTGPNumber($q, $select) {
        $sql = "select 
    ti.item_id,
    ti.description,
    ROUND((ti.selling_price * (tv.amount+100)/100),2) as selling_price_with_vat,
    ti.selling_price,
    ti.item_part_no
from
    tbl_item ti
        INNER JOIN
    tbl_vat tv
WHERE
    ti.status = '1' AND ti.item_part_no LIKE '$q%' LIMIT 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . '  ' . $row[$select[3]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAllDescription($q, $select) {
        $sql = "select 
    ti.item_id,
    ti.description,
    ROUND((ti.selling_price * (tv.amount+100)/100),2) as selling_price_with_vat,
    ti.selling_price,
    ti.item_part_no
from
    tbl_item ti
        INNER JOIN
    tbl_vat tv
WHERE
    ti.status = '1' AND ti.description LIKE '$q%' LIMIT 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . '  ' . $row[$select[3]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getMovementAtTheTGPDealer($dealer_id,$item_id) {
//        $sql ="select 
//    tas.all_sales_id,
//    tas.part_no,
//    tas.description,
//    tas.qty,
//    td.delar_id,
//    @start_month:=DATE_SUB(CURDATE(), INTERVAL 3 MONTH),
//    @end_month:=CURDATE()
//from
//    tbl_all_sales tas
//        INNER JOIN
//    tbl_dealer td ON tas.acc_no = td.delar_account_no
//where
//    td.delar_id = '96'
//        and tas.part_no = 'TE252518130139'
//        and tas.date_edit BETWEEN '2014-04-08' and '2014-07-08';
//";
        $sql = "select coalesce(sum(tas.qty), 0) as qty from tbl_all_sales tas  INNER JOIN tbl_dealer td ON tas.acc_no = td.delar_account_no where td.delar_id = '$dealer_id'  and tas.part_no='$item_id' and tas.date_edit BETWEEN '2014-04-08' and '2014-07-08' GROUP BY tas.part_no";

          // echo $sql;
        return $this->db->mod_select($sql);
    
    }

    public function getOverallTGPMovementArea($sales_officer_id,$part_no) {
//        $sql = "select 
//    tas.part_no,
//    tas.part_no,
//    tas.acc_no,
//    td.sales_officer_id,
//    tas.all_sales_id,
//    tas.qty,
//    sum(tas.qty) as overall_tgp_area
//from
//    tbl_all_sales tas
//        INNER JOIN
//    tbl_dealer td ON tas.acc_no = td.delar_account_no
//where
//    td.sales_officer_id = '12'
//        and tas.part_no = 'TE252518130139'";
        $sql = "select 
    
    sum(tas.qty) as overall_tgp_area
from
    tbl_all_sales tas
        INNER JOIN
    tbl_dealer td ON tas.acc_no = td.delar_account_no
where
    td.sales_officer_id = '$sales_officer_id'
        and tas.part_no = '$part_no'";
    //    echo $sql;
        return $this->db->mod_select($sql);
    }

    public function createCompetitorParts($dataArray) {
        $rows = $dataArray['competitor_count'];
        $rows++;


        $insert_id = $this->session->userdata('id');
        echo $insert_id;

        if (!is_dir('competitor_part_image/')) {
            mkdir('./competitor_part_image/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './competitor_part_image/';
        $config['allowed_types'] = 'gif|jpg|png|xlsx';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_tgp_number_id_' . $x]) && $dataArray['txt_tgp_number_id_' . $x] != '') {
                $dataArray1 = array(
                    'sales_officer_id' => $dataArray['sales_officer_id'],
                    'category_id' => $dataArray['cmb_category'],
                    'selected_id' => $dataArray['txt_category_type_id'],
                    'item_id' => $dataArray['txt_tgp_number_id_' . $x],
                    'competitor_part_no' => $dataArray['txt_part_number_' . $x],
                    'brand' => $dataArray['txt_brand_' . $x],
                    'importer' => $dataArray['txt_importer_' . $x],
                    'selling_price_with_vat' => $dataArray['txt_selling_price_with_vat_' . $x],
                    'movement_of_tgp_dealer' => $dataArray['txt_movement_of_the_tgp_dealer_' . $x],
                    'cost_price_to_the_dealer' => $dataArray['txt_cost_price_to_the_dealer_' . $x],
                    'selling_price_to_the_customer' => $dataArray['txt_selling_price_to_the_customer_' . $x],
                    'movement' => $dataArray['txt_movement_' . $x],
                    'overall_movement_of_the_daler' => $dataArray['txt_overall_movement_at_the_dealer_' . $x],
                    'marcket_share_with_the_brand' => $dataArray['txt_marcket_share_with_dealer_' . $x],
                    'marcket_share_overall' => $dataArray['txt_marcket_share_overall_' . $x],
                    'overall_tgp_movement_in_area' => $dataArray['txt_overall_tgp_movement_in_the_area_' . $x],
                    'image' => 0,
                    'added_by_id' => $insert_id,
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($dataArray1);
                $this->db->__beginTransaction();
                $this->db->insertData("tbl_competitor_parts", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function salesManWiseCompetitorPartsReport() {
        $sql = "select c.competitor_part_no,c.brand,c.importer,c.selling_price_non_tgp,c.movement_in_dealer,i.item_part_no,i.description,i.selling_price from tbl_competitor_parts c INNER JOIN tbl_item i ON c.item_id=i.item_id WHERE c.status='1'";
        return $this->db->mod_select($sql);
    }

    function getTO() {
        $currentdate = date("Y-m-d");
        $before3month = date("Y-m-d", strtotime("-3 Months"));

        $dealerID = $_REQUEST['dealerid'];
        $this->db->__beginTransaction();
        $sql = "select sum(qty*unit_price/3) As T_O from tbl_dealer_sales  where id_dealer=$dealerID and sold_date between '$before3month' and '$currentdate' and status='1'";
        return $cs = $this->db->mod_select($sql);
    }

//    public function salesManWiseCompetitorPartsReport() {
//        $append = '';
//        if (isset($_POST['sales_officer_id']) && $_POST['sales_officer_id'] != '' && isset($_POST['dealer_id']) && $_POST['dealer_id'] != '') {
//            $sales_officer_id = $_POST['sales_officer_id'];
//            $dealer_id = $_POST['dealer_id'];
//            $append = "sales_officer_id='$sales_officer_id' AND delar_id='$dealer_id'";
//        }
//        $sql = "select c.competitor_part_no,c.brand,c.importer,c.selling_price_non_tgp,c.movement_in_dealer,i.item_part_no,i.description,i.selling_price from tbl_competitor_parts c INNER JOIN tbl_item i ON c.item_id=i.item_id WHERE c.status='1' AND {$append}";
//        return $this->db->mod_select($sql);
//    }
}

?>
