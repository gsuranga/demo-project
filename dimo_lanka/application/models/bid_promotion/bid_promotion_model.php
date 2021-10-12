<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bid_promotion_model
 * 21-03-2015
 * @author Dilhari
 */
class bid_promotion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPartNumber($q, $select) {
        $sql = "SELECT tt.item_part_no, tt.item_id, tt.description, tt.selling_price
                FROM tbl_item tt 
                where tt.status='1' and tt.item_part_no like '$q%' limit 10";
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

    public function createBidPromotion() {
        $form_data = $_POST['data'];

//        print_r($form_data);
        $this->db->__beginTransaction();
        try {
            $bid_promotion = array(
                "promotion_type" => 'BID',
                "promotion_name" => $form_data[0]['value'],
                "description" => $form_data[1]['value'],
                "starting_date" => $form_data[2]['value'],
                "end_date" => $form_data[3]['value'],
                "added_date" => date('Y:m:d'),
                "status" => 1
            );
            $this->db->insert('tbl_special_promotion', $bid_promotion);

            $promotion_id = $this->db->insert_id();
            $rowCount = $form_data[10]['value'];

            $value = 11 + (6 * ($rowCount - 1));

            $bid_details = array(
                "special_promotion_id" => $promotion_id,
                "item_id" => $form_data[5]['value'],
                "special_prices" => $form_data[8]['value'],
                "proposed_qty" => $form_data[9]['value'],
                "status" => 1
            );

            $this->db->insertData('tbl_special_promotion_detail', $bid_details);

            for ($x = 11; $x < $value; $x = $x + 6) {
                $bid_details = array(
                    "special_promotion_id" => $promotion_id,
                    "item_id" => $form_data[$x + 1]['value'],
                    "special_prices" => $form_data[$x + 4]['value'],
                    "proposed_qty" => $form_data[$x + 5]['value'],
                    "status" => 1
                );

                $this->db->insertData('tbl_special_promotion_detail', $bid_details);
            }

            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
    }

}
