<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of promotion_view_model
 * 25-03-2015
 * @author Dilhari
 */
class promotion_view_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    ////////////////////// KIT and Special Promotion Details \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    
    public function kitPromotionDetails() {
        $sql = "select * 
                from tbl_special_promotion
                where status = '1' and promotion_type = 'KIT'";
        
        return $this->db->mod_select($sql);
    }
    
    public function SpecialPriceDetails() {
        $sql = "select * 
                from tbl_special_promotion
                where status = '1' and promotion_type = 'Special_prices'";
        
        return $this->db->mod_select($sql);
    }
    
    public function PromotionDetails($id) {
        $sql = "select * 
                from tbl_special_promotion
                where status = '1' and special_promotion_id = '$id%'";
        
        return $this->db->mod_select($sql);
    }

    public function PromotionSummary($id){
        $sql = "select tty.item_part_no, tty.description, tty.vehicle_model_local, tty.selling_price, tt.special_prices, tt.per_unit, tt.proposed_qty, tt.detail_id
                from tbl_special_promotion_detail tt
                inner join 
                tbl_item tty on tt.item_id = tty.item_id
                where tt.status = '1' and tt.special_promotion_id like '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
    public function asoDetails($id){
        $sql = "select tty.sales_officer_name, tt.qty_per_month
                from tbl_special_promotion_detail_target tt
                inner join
                tbl_sales_officer tty on tt.sales_officer_id = tty.sales_officer_id
                where tt.status = '1' and tt.special_promotion_id like '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
    public function otherDetails($id){
        $sql = "select spo.current_gross_margine, spo.proposed_gross_margine, spo.gross_margine_increase, 
                spo.current_turn_over, spo.proposed_turn_over, spo.turn_over_increase
                from tbl_special_promotion_other_details spo
                where spo.status = '1' and spo.special_promotion_id like '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
    public function get_aso($id){
        $sql = "select so.sales_officer_name
                from tbl_sales_officer so
                inner join
                tbl_special_promotion_detail_target spt on so.sales_officer_id = spt.sales_officer_id
                where spt.status = '1' and spt.special_promotion_id like '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
    public function AsoTargetDetails($id){
        $sql = "select tty.sales_officer_name, tt.qty_per_month
                from tbl_special_promotion_detail_target tt
                inner join
                tbl_sales_officer tty on tt.sales_officer_id = tty.sales_officer_id
                where tt.status = '1' and tt.special_promotion_detail_id like '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
//    public function OtherDetails($id){
//        $sql = "select *
//                from tbl_special_promotion_other_details
//                where status = '1' and special_promotion_id like '$id%'";
//        
//        return $this->db->mod_select($sql);
//    }
    
    //////////////////////// BID Promtion Details \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    
    public function bidPromotion() {
        $sql = "select * 
                from tbl_special_promotion
                where status = '1' and promotion_type = 'BID'";
        
        return $this->db->mod_select($sql);
    }
}
