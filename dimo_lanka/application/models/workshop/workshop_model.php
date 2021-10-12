<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of workshop_model
 *
 * @author Iresha Lakmali
 */
class workshop_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getArea($q, $select) {
        $sql = "SELECT * FROM tbl_area where status='1' and area_name like '$q%'";
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

    public function viewWorkShop() {
        $sql = "select *,ta.area_name from tbl_workshop tw INNER JOIN tbl_area ta ON tw.area_id=ta.area_id where tw.status='1'";
        return $this->db->mod_select($sql);
    }

    public function createWorkshop($data_Array) {
        $data = array(
            'workshop_code' => $data_Array['workshop_code'],
            'workshop_name' => $data_Array['workshop_name'],
            'workshop_account_no' => $data_Array['workshop_account_no'],
            'area_id' => $data_Array['area_id'],
            'identifier' => $data_Array['identifier'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_workshop", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function manageWorkshop($dataArray) {
        $where = array(
            'workshop_id' => $dataArray['work_shop_id']
        );
        print_r($where);

        $data = array(
            'workshop_code' => $dataArray['m_workshop_code'],
            'workshop_name' => $dataArray['m_workshop_name'],
            'workshop_account_no' => $dataArray['m_workshop_account_no'],
            'area_id' => $dataArray['area_id'],
            'identifier' => $dataArray['m_identifier'],
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_workshop", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function removeWorkshop($id){
          $where = array(
            'workshop_id' => $id
        );
        print_r($where);

        $data = array(
           'status' => 0
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_workshop", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
