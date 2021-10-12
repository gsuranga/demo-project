<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bid_promotion_summary_model
 * 24-03-2015
 * @author Dilhari
 */
class bid_promotion_summary_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getBidName($q, $select) {
        $sql = "SELECT tt.promotion_name, tt.special_promotion_id, tt.description, tt.starting_date, tt.end_date
                FROM tbl_special_promotion tt 
                where tt.status='1' and tt.promotion_type = 'BID' and tt.promotion_name like '$q%' limit 10";
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
    
    public function getBidDetails(){
        $name = $_POST['name'];
        
        $sql = "SELECT tt.item_id, tty.item_part_no, tty.description, tty.selling_price, tt.special_prices, tt.proposed_qty
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id               
                
                where tt.status='1' and sp.promotion_type = 'BID' and sp.promotion_name like '$name%'";
        
        return $this->db->mod_select($sql);       
    }
    
    public function getDealerName($q, $select) {
        $user = $this->session->userdata('id');
        $sql = "SELECT tt.delar_name, tt.delar_account_no, tt.delar_id, tt.sales_officer_id
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
    
    public function get_vat(){
        $sql = "select amount from tbl_vat where status = '1'";
        return $this->db->mod_select($sql);
    }
    
    public function getSellingPrice(){
        $name = $_POST['name'];
        
        $sql = "SELECT tty.selling_price
                FROM tbl_special_promotion_detail tt 
                inner join
                tbl_item tty on tt.item_id = tty.item_id
                inner join
                tbl_special_promotion sp on tt.special_promotion_id = sp.special_promotion_id               
                
                where tt.status='1' and sp.promotion_type = 'BID' and sp.promotion_name like '$name%'";
        
        return $this->db->mod_select($sql);       
    }
    
    public function submitBidPromotionSummary(){
        $form_data = $_POST['data'];
        $other = $_POST['other'];
        $detail = $_POST['detail'];
//        print_r($form_data);
        
        $this->db->__beginTransaction();
        try {
        $order = array(
                "date" => date('Y-m-d'),
                "time" => date('H:i:s'),
                "sales_officer_id" => $form_data[8]['value'],
                "dealer_id" => $form_data[7]['value'],
                "amount" => $other[1],
                "complete" => 3,
                "current_vat" => $other[2],
//                "total_discount" => $form_data[12]['value'],
                "is_sales_officer" => 1,
                "status" => '1'
        );

        $this->db->insertData("tbl_dealer_purchase_order", $order);

        $po_id = $this->db->insert_id();
        $rows = $form_data[9]['value'];
        
        for ($x = 0; $x < $rows; $x++) {
            $details = array(
                "purchase_order_id" => $po_id,
                "item_id" => $detail[$x][0],
                "item_qty" => $detail[$x][1],
                "unit_price" => $detail[$x][2],
                "status" => '1'
            );
            
            $this->db->insertData('tbl_dealer_purchase_order_detail', $details);
        }
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }
}
