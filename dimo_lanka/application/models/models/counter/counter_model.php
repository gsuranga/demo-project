<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of counter_model
 *
 * @author Iresha Lakmali
 */
class counter_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllCounter() {
        $sql = "select *,ta.area_name from tbl_counter tc INNER JOIN tbl_area ta ON tc.area_id=ta.area_id  WHERE tc.status='1'";
        return $this->db->mod_select($sql);
    }

    public function createCounter($data_Array) {
        $data = array(
            'counter_code' => $data_Array['counter_code'],
            'counter_name' => $data_Array['counter_name'],
            'counter_account_no' => $data_Array['counter_account_number'],
            'area_id' => $data_Array['area_id'],
            'identifier' => $data_Array['identifier'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_counter", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateCounter($dataArray) {
        $where = array(
            'counter_id' => $dataArray['counter_id']
        );
        print_r($where);

        $data = array(
            'counter_code' => $dataArray['counter_code'],
            'counter_name' => $dataArray['counter_name'],
            'counter_account_no' => $dataArray['counter_account_number'],
            'area_id' => $dataArray['area_id'],
            'identifier' => $dataArray['identifier'],
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_counter", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function remooveCounter($id) {
        $where = array(
            'counter_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        // print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_counter", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getAllArea($q, $select) {
        $sql = "select area_id,area_name from tbl_area WHERE area_name LIKE '$q%'";
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

}

?>
