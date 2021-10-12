<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_type_model
 *
 * @author Iresha Lakmali
 */
class vehicle_type_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllVehicleType() {
        $sql = "select vehicle_type_id,vehicle_type_name from tbl_vehicle_type WHERE status='1' ORDER BY vehicle_type_id DESC";
        return $result = $this->db->mod_select($sql);
    }

//widuranga jayawickrama(validate this function)
    public function createVehicleType($dataArray) {
        $data = array(
            'vehicle_type_name' => $dataArray['vehicle_type'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $query = $this->db->get_where('tbl_vehicle_type', array('vehicle_type_name' => $dataArray['vehicle_type'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {

            $this->db->__beginTransaction();
            $this->db->insertData("tbl_vehicle_type", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    //widuranga jayawickrama
    public function manageVehicleType($dataArray) {
        $where = array(
            'vehicle_type_id' => $dataArray['vehicle_type_id']
        );
        print_r($where);

        $data = array(
            'vehicle_type_name' => $dataArray['vehicle_type_up'],
        );
        //print_r($data);
        $query = $this->db->get_where('tbl_vehicle_type', array('vehicle_type_name' => $dataArray['vehicle_type_up']));

        if ($query->num_rows() > 0) {

            return false;
        } else {

        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
        }
    }

    public function remooveVehicleType($id) {
        $where = array(
            'vehicle_type_id' => $id
        );
        print_r($where);
        $data = array(
            'status' => 0
        );
        // print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
