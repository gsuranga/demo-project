<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of special_price_model
 * 19-03-2015
 * @author Dilhari
 */
class special_price_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPartNumber($q, $select) {
        $sql = "SELECT tt.item_part_no, tt.item_id, tt.description, tt.vehicle_model_local, tt.avg_monthly_demand, tt.total_stock_qty, tt.avg_cost, tt.selling_price
                FROM tbl_item tt 
                where tt.status='1' and tt.item_part_no like '$q%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . ' ' . $row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }
        return $json_array;
    }
    //getAsonames
    public function getAsonames($id){
       
        $sql = "SELECT tt.sales_officer_name, tt.sales_officer_id
                FROM tbl_sales_officer tt ";
        return $this->db->mod_select($sql);
    }
    public function nameAsoDistrct($id){
        $sql = "SELECT tty.branch_name
                FROM tbl_sales_officer tt 
                inner join 
                tbl_branch tty on tt.branch_id = tty.branch_id 
                where tt.status='1' and tt.sales_officer_id = '".$id."'";
        return $this->db->mod_select($sql);
    }

    public function getAsoName($q, $select) {
        $sql = "SELECT tt.sales_officer_name, tt.sales_officer_id, tty.branch_name
                FROM tbl_sales_officer tt 
                inner join 
                tbl_branch tty on tt.branch_id = tty.branch_id 
                where tt.status='1' and tt.sales_officer_name like '$q%' limit 10";
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

    public function createSpecialPrice() {
        $form_data = $_POST['data'];
        //print_r($form_data);
        $details = $_POST['details'];
        print_r($details);

        $this->db->__beginTransaction();
//        try {
        
        $spcl_price = array(
            "promotion_type" => 'Special_prices',
            "promotion_name" => $form_data[0]['value'],
            "description" => $form_data[1]['value'],
            "starting_date" => $form_data[2]['value'],
            "end_date" => $form_data[3]['value'],
            "added_date" => date('Y:m:d'),
            "status" => 1
        );
        $this->db->insert('tbl_special_promotion', $spcl_price);

        $promotion_id = $this->db->insert_id();

        $sp_details = array(
            "special_promotion_id" => $promotion_id,
            "item_id" => $form_data[5]['value'],
            "discount" => $form_data[12]['value'],
            "discounted_selling_price" => $form_data[13]['value'],
            "special_discount" => $form_data[14]['value'],
            "special_prices" => $form_data[15]['value'],
            "per_unit" => $form_data[16]['value'],
            "break_even_quantity" => $form_data[17]['value'],
            "proposed_qty" => $form_data[18]['value'],
            "status" => 1
        );

        $this->db->insertData('tbl_special_promotion_detail', $sp_details);
        $promotion_detail = $this->db->insert_id();
        for ($m = 1; $m <= $details[1][0][0]; $m++) {
            $target = array(
                "special_promotion_id" => $promotion_id,
//                "special_promotion_detail_id" => $promotion_detail,
                "sales_officer_id" => $details[1][$m][0],
                "branch" => $details[1][$m][1],
                "qty_per_month" => $details[1][$m][2],
                "status" => 1
            );
            $this->db->insertData('tbl_special_promotion_detail_target', $target);
        }

        $row = $form_data[19]['value'];
        $val = 20 + ($row - 1) * 15;

        for ($x = 20; $x < $val; $x += 15) {
            for ($a = 2; $a <= $row; $a++) {
                $sp_details = array(
                    "special_promotion_id" => $promotion_id,
                    "item_id" => $form_data[$x + 1]['value'],
                    "discount" => $form_data[$x + 8]['value'],
                    "discounted_selling_price" => $form_data[$x + 9]['value'],
                    "special_discount" => $form_data[$x + 10]['value'],
                    "special_prices" => $form_data[$x + 11]['value'],
                    "per_unit" => $form_data[$x + 12]['value'],
                    "break_even_quantity" => $form_data[$x + 13]['value'],
                    "proposed_qty" => $form_data[$x + 14]['value'],
                    "status" => 1
                );

                $this->db->insertData('tbl_special_promotion_detail', $sp_details);

                $promotion_detail = $this->db->insert_id();
                $rw = $details[$a][0][0];
                print_r($rw);
                for ($b = 1; $b <= $rw; $b++) {
                    
                   
                    $target1 = array(
                        "special_promotion_id" => $promotion_id,
//                        "special_promotion_detail_id" => $promotion_detail,
                        "sales_officer_id" => $details[$a][$b][0],
                        "branch" => $details[$a][$b][1],
                        "qty_per_month" => $details[$a][$b][2],
                        "status" => 1
                    );
                    $this->db->insertData('tbl_special_promotion_detail_target', $target1);
//                    print_r($target1);
                }
            }
        }

        $other_details = array(
            "special_promotion_id" => $promotion_id,
            "current_gross_margine" => $form_data[$val]['value'],
            "proposed_gross_margine" => $form_data[$val + 1]['value'],
            "gross_margine_increase" => $form_data[$val + 2]['value'],
            "current_turn_over" => $form_data[$val + 3]['value'],
            "proposed_turn_over" => $form_data[$val + 4]['value'],
            "turn_over_increase" => $form_data[$val + 5]['value'],
            "status" => 1
        );

        $this->db->insertData('tbl_special_promotion_other_details',$other_details);

        $this->db->__endTransaction();
        return $this->db->status();

//            $this->db->commit_db();
//            return 1;
//        } catch (PDOException $exc) {
//            $this->db->roll_back_db();
//            return 0;
//        }
    }
    
    function getAsoAll(){
        $sql = "SELECT tt.sales_officer_name, tt.sales_officer_id, tty.branch_name
                FROM tbl_sales_officer tt 
                inner join 
                tbl_branch tty on tt.branch_id = tty.branch_id where tt.sales_type_id = '1'
                ";
    
         return $this->db->mod_select($sql);
        
    }

}
