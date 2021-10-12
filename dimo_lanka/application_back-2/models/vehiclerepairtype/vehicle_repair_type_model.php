<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_repair_type_model
 *
 * @author Iresha Lakmali
 */
class vehicle_repair_type_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createVehicleRepairType($dataArray) {
        $data = array(
            'repair_type_name' => $dataArray['vehicle_repair_type'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $query = $this->db->get_where('tbl_vehicle_repair_type', array('repair_type_name' => $dataArray['vehicle_repair_type'],'status' => 1));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            //print_r($data);
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_vehicle_repair_type", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function manageVehicleRepairType($dataArray) {
        $where = array(
            'repair_type_id' => $dataArray['vehicle_repair_type_id']
        );
        print_r($where);
        $data = array(
            'repair_type_name' => $dataArray['vehicle_repair_types']
        );
        $query = $this->db->get_where('tbl_vehicle_repair_type', array('repair_type_name' => $dataArray['vehicle_repair_types']));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            print_r($data);
            $this->db->__beginTransaction();
            $this->db->update("tbl_vehicle_repair_type", $data, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function remooveVehicleRepairType($id) {
        $where = array(
            'repair_type_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_repair_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllVehicleRepairType() {
        $sql = "select repair_type_id,repair_type_name from tbl_vehicle_repair_type WHERE status='1' ORDER BY repair_type_id DESC";
        return $result = $this->db->mod_select($sql);
    }

}
?>

