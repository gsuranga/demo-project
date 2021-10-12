<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_analysis_report_model
 * 06-04-2015
 * @author Dilhari
 */
class part_analysis_report_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get_details() {
        
        $sql = "select pa.item_part_id, i.item_part_no, i.description, i.vehicle_model_local, count(i.item_part_no) as entries
                from tbl_part_analysis_details pa
                inner join 
                tbl_item i on pa.item_part_id = i.item_id
                where pa.status = '1'
                group by i.item_part_no";
        
        return $this->db->mod_select($sql);
    }
    
    public function view_part_number_details($id) {
        
        $sql = "select item_part_no, description, selling_price
                from tbl_item
                where status = '1' and item_id = '$id%'";
        
        return $this->db->mod_select($sql);
    }
    
    public function view_part_details($id, $date) {
        
        $sql = "select td.delar_account_no, td.delar_name, TIMESTAMPDIFF(day,tp.added_date,'$date') as DiffDate,
                tpa.avg_movement_from_dimo_to_dealer, tpa.avg_movement_from_dealer_to_customer,
                tpa.reason_price, tpa.reason_supply, tpa.reason_packaging,tpa.reason_awareness,
                tpa.max_price, tpa.qty_at_max_price, tpa.remarks
                
                from tbl_part_analysis_details tpa
                inner join
                tbl_part_analysis tp on tpa.part_analysis_id = tp.part_analysis_id
                inner join
                tbl_dealer td on tp.dealer_id = td.delar_id
                where tpa.status = '1' and tpa.item_part_id = '$id'";
        
        return $this->db->mod_select($sql);
    }
}
