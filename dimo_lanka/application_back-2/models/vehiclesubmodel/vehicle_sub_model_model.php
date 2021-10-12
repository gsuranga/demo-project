<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_sub_model_model
 *
 * @author Iresha Lakmali
 */
class vehicle_sub_model_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_vehicle_model($q, $select) {
        $sql = "select vehicle_model_id,vehicle_model_name from tbl_vehicle_model WHERE status='1' AND vehicle_model_name LIKE '$q%'";
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

//widuranga jayawickrama(valideta this function)
    public function createVehicleSubModel($dataArray) {
        $data = array(
            'vehicle_sub_model_name' => $dataArray['vehicle_sub_model'],
            'vehicle_model_id' => $dataArray['vehicle_model_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        //print_r($data);
        $query = $this->db->get_where('tbl_vehicle_sub_model', array('vehicle_sub_model_name' => $dataArray['vehicle_sub_model'], 'status' => 1));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_vehicle_sub_model", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

//
    public function viewAllVehicleSubModel() {
        $sql = "select s.vehicle_sub_model_id,s.vehicle_sub_model_name,s.vehicle_model_id,m.vehicle_model_name from tbl_vehicle_sub_model s INNER JOIN tbl_vehicle_model m ON s.vehicle_model_id=m.vehicle_model_id WHERE s.status='1'";
        return $result = $this->db->mod_select($sql);
    }

    public function remooveVehicleSubModel($id) {
        $where = array(
            'vehicle_sub_model_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_sub_model", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function mangeVehicleSubModel($dataArray) {

        $where = array(
            'vehicle_sub_model_id' => $dataArray['vehicle_sub_model_id']
        );
        //print_r($where);
        $data = array(
            'vehicle_sub_model_name' => $dataArray['vehicle_sub_model'],
            'vehicle_model_id' => $dataArray['vehicle_model_id'],
        );
        
            //print_r($data);
            $this->db->__beginTransaction();
            $this->db->update("tbl_vehicle_sub_model", $data, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        
    }

}

?>
