<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kit_promotion_model
 * 10-03-2015
 * @author Dilhari
 */
class kit_promotion_model extends C_Model {

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
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . ' ' . $row[$select[1]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }
        return $json_array;
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

    public function getId($id) {
        $sql = "SELECT *
                FROM tbl_special_promotion_detail tt  
                where tt.status='1' and tt.detail_id like '$id%' limit 10";
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

    public function createKitPromotion() {
        $form_data = $_POST['data'];
//        print_r($form_data);
        $this->db->__beginTransaction();
        try {
            $kit_promotion = array(
                "promotion_type" => 'KIT',
                "promotion_name" => $form_data[0]['value'],
                "description" => $form_data[1]['value'],
                "starting_date" => $form_data[2]['value'],
                "end_date" => $form_data[3]['value'],
                "added_date" => date('Y:m:d'),
                "status" => 1
            );
            $this->db->insert('tbl_special_promotion', $kit_promotion);

            $kit_promotion_id = $this->db->insert_id();

            $kit_details = array(
                "special_promotion_id" => $kit_promotion_id,
                "item_id" => $form_data[6]['value'],
                "discount" => $form_data[12]['value'],
                "discounted_selling_price" => $form_data[13]['value'],
                "special_discount" => $form_data[14]['value'],
                "special_prices" => $form_data[15]['value'],
                "per_unit" => $form_data[16]['value'],
                "break_even_quantity" => $form_data[17]['value'],
                "proposed_qty" => $form_data[18]['value'],
                "status" => 1
            );

            $this->db->insertData('tbl_special_promotion_detail', $kit_details);

            $rowCount = $form_data[19]['value'];
            $value = 20 + (14 * ($rowCount - 1));

            for ($r = 20; $r < $value; $r = $r + 14) {
                $kit_details = array(
                    "special_promotion_id" => $kit_promotion_id,
                    "item_id" => $form_data[$r]['value'],
                    "discount" => $form_data[$r + 8]['value'],
                    "discounted_selling_price" => $form_data[$r + 9]['value'],
                    "special_discount" => $form_data[$r + 10]['value'],
                    "special_prices" => $form_data[$r + 11]['value'],
                    "per_unit" => $form_data[$r + 12]['value'],
                    "break_even_quantity" => $form_data[$r + 13]['value'],
                    "proposed_qty" => $form_data[18]['value'],
                    "status" => 1
                );
                $this->db->insertData('tbl_special_promotion_detail', $kit_details);
            }

            $target = array(
                "special_promotion_id" => $kit_promotion_id,
                "sales_officer_id" => $form_data[$value + 8]['value'],
                "branch" => $form_data[$value + 9]['value'],
                "qty_per_month" => $form_data[$value + 10]['value'],
                "status" => 1
            );
            $this->db->insertData('tbl_special_promotion_detail_target', $target);

            $rw_count = $form_data[$value + 11]['value'];
            $count = ($value + 12) + (4 * ($rw_count - 1));

            for ($b = ($value + 12); $b < $count; $b = $b + 4) {
                $target = array(
                    "special_promotion_id" => $kit_promotion_id,
                    "sales_officer_id" => $form_data[$b + 1]['value'],
                    "branch" => $form_data[$b + 2]['value'],
                    "qty_per_month" => $form_data[$b + 3]['value'],
                    "status" => 1
                );
                $this->db->insertData('tbl_special_promotion_detail_target', $target);
            }

            $kit_promotion_other_details = array(
                "special_promotion_id" => $kit_promotion_id,
                "current_gross_margine" => $form_data[$value]['value'],
                "proposed_gross_margine" => $form_data[$value + 1]['value'],
                "gross_margine_increase" => $form_data[$value + 2]['value'],
                "current_turn_over" => $form_data[$value + 3]['value'],
                "proposed_turn_over" => $form_data[$value + 4]['value'],
                "turn_over_increase" => $form_data[$value + 5]['value'],
                "status" => 1
            );

            $this->db->insertData('tbl_special_promotion_other_details', $kit_promotion_other_details);
            $this->db->commit_db();
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }

}
