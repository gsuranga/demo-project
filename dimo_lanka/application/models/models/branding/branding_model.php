<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branding_model
 *
 * @author Iresha Lakmali
 */
class branding_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAlCategories() {
        $sql = "SELECT visit_category_id,category_name FROM tbl_visit_category WHERE status=1";
        return $this->db->mod_select($sql);
    }
    
    public function set_category_type_no($q, $select, $user_type){
          $sql = '';
        $cmb_category = $user_type;
        if ($cmb_category == "Dealer") {
            $sql = "select delar_id,delar_account_no,delar_name from tbl_dealer WHERE status='1' AND delar_account_no LIKE '$q%' ";
        }
        if ($cmb_category == "Garage") {
            $sql = "select garage_id,garage_account_no,garage_name from tbl_garage WHERE status='1' AND garage_account_no LIKE '$q%' ";
        }
        if ($cmb_category == "Fleet Owner") {
            $sql = "select customer_id,cust_account_no,customer_name from tbl_customer WHERE status='1' AND customer_type='3' AND cust_account_no LIKE '$q%'";
        }
        if ($cmb_category == "New Shop") {
            $sql = "select shop_id,shop_code,shop_name from tbl_non_reg_shops WHERE status='1' AND shop_code LIKE '$q%'";
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

    public function createBrandig($data_Array,$path) {
        $id = 0;
        if(isset($data_Array['txt_category_type_id']) && $data_Array['txt_category_type_id'] != ''){
            $id = $data_Array['txt_category_type_id'];
        }
         if(isset($data_Array['txt_category_type_no_id']) && $data_Array['txt_category_type_no_id'] != ''){
            $id = $data_Array['txt_category_type_no_id'];
        }
        $data = array(
            'description' => $data_Array['txt_description'],
            'sales_officer_id' => $data_Array['sales_officer_id'],
            'category_id' => $data_Array['cmb_category'],
            'selected_id' => $id,
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'tour_status' => 0,
            'status' => 1,
            'branding_image' => $path
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_branding_details", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllBranding() {
        $sql = "select 
    tbd.branding_detail_id,
    tbd.description,
    ts.sales_officer_name,
    tvc.category_name,
    tbd.selected_id,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_sales_officer ts ON tbd.sales_officer_id = ts.sales_officer_id
        INNER JOIN
    tbl_visit_category tvc ON tvc.visit_category_id = tbd.category_id where  tbd.status='1'  ORDER BY  tbd.branding_detail_id DESC";
        return $this->db->mod_select($sql);
    }

// category selected qureies
    public function loadDealerDetail() {
        $sql = "
select 
    tbd.branding_detail_id,
    vk.category_name,
    td.delar_name,
    td.delar_account_no,
    tbd.description,
    tbd.added_date,
    tbd.added_time,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_dealer td ON tbd.selected_id = td.delar_id
        inner join
    tbl_visit_category vk ON tbd.category_id = vk.visit_category_id
where
    tbd.category_id = 1 and tbd.status=1";
        return $this->db->mod_select($sql);
    }

    public function loadGarageDetail() {
        $sql = "
select 
    tbd.branding_detail_id,
    vk.category_name,
    tg.garage_name,
    tg.garage_account_no,
    tbd.description,
    tbd.added_date,
    tbd.added_time,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_garage tg ON tbd.selected_id = tg.garage_id
        inner join
    tbl_visit_category vk ON tbd.category_id = vk.visit_category_id
where
    tbd.category_id = 2 and tbd.status=1";
        return $this->db->mod_select($sql);
    }

    public function loadFleetOwnerDetail() {
        $sql = "select 
    tbd.branding_detail_id,
    vk.category_name,
    tc.customer_name,
    tc.cust_account_no,
    tbd.description,
    tbd.added_date,
    tbd.added_time,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_customer tc ON tbd.selected_id = tc.customer_id
        inner join
    tbl_visit_category vk ON tbd.category_id = vk.visit_category_id
where
    tbd.category_id = 3 and tbd.status=1";
        return $this->db->mod_select($sql);
    }

    public function loadNewShopDetail() {
        $sql = "select 
    tbd.branding_detail_id,
    vk.category_name,
    tnrs.shop_name,
    tnrs.shop_code,
    tbd.description,
    tbd.added_date,
    tbd.added_time,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_non_reg_shops tnrs ON tbd.selected_id = tnrs.shop_id
        inner join
    tbl_visit_category vk ON tbd.category_id = vk.visit_category_id
where
    tbd.category_id = 4 and tbd.status=1";
        return $this->db->mod_select($sql);
    }

    public function loadVehicleOwnerDetail() {
        $sql = "select 
    tbd.branding_detail_id,
    vk.category_name,
    tv.vehicle_reg_no,
    tbd.description,
    tbd.added_date,
    tbd.added_time,
    tbd.branding_image
from
    tbl_branding_details tbd
        INNER JOIN
    tbl_vehicle tv ON tbd.selected_id = tv.vehicle_id
        inner join
    tbl_visit_category vk ON tbd.category_id = vk.visit_category_id
where
    tbd.category_id = 5 and tbd.status=1";
        return $this->db->mod_select($sql);
    }

    public function remooveBranding($dataArray) {
        $where = array(
            'branding_detail_id' => $dataArray['token_branding_id']
        );
        print_r($where);
        $data = array(
            'status' => 0
        );
        print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_branding_details", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
