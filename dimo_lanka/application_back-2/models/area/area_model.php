<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of area_model
 *
 * @author Iresha Lakmali
 */
class area_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    //area_id, area_account_no, area_name, added_date, added_time, status
    public function createArea($data_Array) {
        print_r($data_Array);
        $data = array(
            'area_name' => $data_Array['area_name'],
            'area_account_no' => $data_Array['area_account_no'],
            'area_code' => $data_Array['area_code'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => '1'
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_area", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllArea() {
        $sql = "select * from tbl_area WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function updateArea($dataArray) {
        $where = array(
            'area_id' => $dataArray['area_id']
        );

        $data = array(
            'area_code' => $dataArray['area_code'],
            'area_account_no' => $dataArray['u_area_account_no'],
            'area_name' => $dataArray['u_area_name']
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_area", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deleteArea($id) {
        $where = array(
            'area_id' => $id
        );
        $data = array(
            'status' => 0
        );
        $this->db->__beginTransaction();

        $this->db->update("tbl_area", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getAllAreas() {
        $sql = "select area_id,area_name from tbl_area WHERE status='1'";
        return $this->db->mod_select($sql);
    }

}

?>
