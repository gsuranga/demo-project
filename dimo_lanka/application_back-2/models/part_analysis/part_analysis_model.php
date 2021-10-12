<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_analysis_model
 * 04-04-2015
 * @author Dilhari
 */
class part_analysis_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_dealer_name($q, $select) {
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

    public function submit_part_analysis() {
        $form_data = $_POST['data'];
//        print_r($form_data);

        $this->db->__beginTransaction();
        try {
        $part_analysis = Array(
            "dealer_id" => $form_data[1]['value'],
            "added_date" => date('Y-m-d'),
            "status" => 1
        );
        $this->db->insert('tbl_part_analysis', $part_analysis);
//        print_r($part_analysis);
        $part_analysis_id = $this->db->insert_id();

        $details = Array(
            "part_analysis_id" => $part_analysis_id,
            "item_part_id" => $form_data[4]['value'],
            "avg_movement_from_dimo_to_dealer" => $form_data[7]['value'],
            "avg_movement_from_dealer_to_customer" => $form_data[8]['value'],
            "reason_price" => $form_data[9]['value'],
            "reason_supply" => $form_data[10]['value'],
            "reason_packaging" => $form_data[11]['value'],
            "reason_awareness" => $form_data[12]['value'],
            "max_price" => $form_data[13]['value'],
            "qty_at_max_price" => $form_data[14]['value'],
            "remarks" => $form_data[15]['value'],
            "status" => 1
        );
//        print_r($details);
        $this->db->insert('tbl_part_analysis_details', $details);

        $row_count = $form_data[16]['value'];
        $value = 17 + 13 * ($row_count - 1);

        for ($x = 17; $x < $value; $x = $x + 13) {
            $details = Array(
                "part_analysis_id" => $part_analysis_id,
                "item_part_id" => $form_data[$x + 1]['value'],
                "avg_movement_from_dimo_to_dealer" => $form_data[$x + 4]['value'],
                "avg_movement_from_dealer_to_customer" => $form_data[$x + 5]['value'],
                "reason_price" => $form_data[$x + 6]['value'],
                "reason_supply" => $form_data[$x + 7]['value'],
                "reason_packaging" => $form_data[$x + 8]['value'],
                "reason_awareness" => $form_data[$x + 9]['value'],
                "max_price" => $form_data[$x + 10]['value'],
                "qty_at_max_price" => $form_data[$x + 11]['value'],
                "remarks" => $form_data[$x + 12]['value'],
                "status" => 1
            );
//            print_r($details);
            $this->db->insert('tbl_part_analysis_details', $details);
        }
        $this->db->commit_db();
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
        
    }

}
