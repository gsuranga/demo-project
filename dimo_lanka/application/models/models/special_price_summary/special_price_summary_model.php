<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of special_price_summary_model
 * 20-03-2015
 * @author Dilhari
 */
class special_price_summary_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPromotionName($q, $select) {
        $sql = "SELECT tt.promotion_name, tt.special_promotion_id, tt.description, tt.starting_date, tt.end_date
                FROM tbl_special_promotion tt 
                where tt.status='1' and tt.promotion_type = 'Special_prices' and tt.promotion_name like '$q%' limit 10";
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

    public function getTarget() {
        $q = $_POST['id'];
        $user = $this->session->userdata('id');
        $sql = "SELECT tt.qty_per_month, tt.sales_officer_id
                FROM tbl_special_promotion_detail_target tt 
                inner join
                tbl_special_promotion_detail tty on tt.special_promotion_id = tty.special_promotion_id
                inner join 
                tbl_user ty on tt.sales_officer_id = ty.employee_id
                where tt.status='1' and ty.id like '$user%' and tty.special_promotion_id like '$q%' limit 10";

        return $this->db->mod_select($sql);
    }

    public function getActual() {
        $start = $_POST['start'];
        $end = $_POST['end'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tt.qty, tt.part_no
                FROM tbl_all_sales tt 
                inner join
                tbl_item tty on tt.part_no = tty.item_part_no
                inner join 
                tbl_special_promotion_detail ty on tty.item_id = ty.item_id
                inner join
                tbl_special_promotion_detail_target tb on ty.special_promotion_id = tb.special_promotion_id
                inner join 
                tbl_user tby on tb.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%' and tt.date_edit between '$start%' and '$end%'";

        return $this->db->mod_select($sql);
    }

    public function getPromotionDetails() {
        $name = $_POST['name'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tt.item_id, tty.item_part_no, tty.description, tty.vehicle_model_local, tty.selling_price, tt.special_prices, tt.special_discount, tt.per_unit
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id
                
                inner join
                tbl_special_promotion_detail_target tb on tt.special_promotion_id = tb.special_promotion_id
                inner join 
                tbl_user tby on tb.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%' and sp.promotion_type = 'Special_prices' and sp.promotion_name like '$name%'";

        return $this->db->mod_select($sql);
    }

    public function getQty() {
        $name = $_POST['name'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tt.per_unit, tt.special_prices
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id
                
                inner join
                tbl_special_promotion_detail_target tb on tt.special_promotion_id = tb.special_promotion_id
                inner join 
                tbl_user tby on tb.sales_officer_id = tby.employee_id
                where tt.status='1' and tby.id like '$user%' and sp.promotion_type = 'Special_prices' and sp.promotion_name like '$name%'";

        return $this->db->mod_select($sql);
    }

    public function getDealerName($q, $select) {
        $user = $this->session->userdata('id');
        $sql = "SELECT tt.delar_name, tt.delar_account_no, tt.delar_id
                FROM tbl_dealer tt
                inner join
                tbl_user tty on tt.sales_officer_id = tty.employee_id
                where tt.status='1' and tty.id like '$user%' and delar_name like '$q%' limit 10";
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

    public function getDealerDetails() {
        $dealer = $_POST['dealer'];
        $user = $this->session->userdata('id');

        $sql = "SELECT tt.delar_name, tt.delar_account_no, tt.telO
                FROM tbl_dealer tt
                inner join
                tbl_user tty on tt.sales_officer_id = tty.employee_id
                where tt.status='1' and tty.id like '$user%' and delar_name like '$dealer%' limit 10";

        return $this->db->mod_select($sql);
    }

    public function get_vat() {
        $sql = "select amount from tbl_vat where status = '1'";
        return $this->db->mod_select($sql);
    }

    public function submitSpecialPriceOrder() {
        $form_data = $_POST['data'];
        $other = $_POST['other'];

        $this->db->__beginTransaction();
        try {
            $order = array(
                "date" => date('Y-m-d'),
                "time" => date('H:i:s'),
                "sales_officer_id" => $other[0],
                "dealer_id" => $form_data[8]['value'],
                "amount" => $other[1],
                "complete" => 3,
                "discount_percentage" => $other[2],
                "current_vat" => $other[3],
                "total_discount" => $other[4],
                "is_sales_officer" => 1,
                "status" => '1'
            );

            $this->db->insertData("tbl_dealer_purchase_order", $order);

            $po_id = $this->db->insert_id();
            
            $detail = array(
                "purchase_order_id" => $po_id,
                "item_id" => $other[5],
                "item_qty" => $other[6],
                "unit_price" => $other[7],
                "status" => '1'
            );
            
            $this->db->insertData('tbl_dealer_purchase_order_detail', $detail);
            
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }

}
