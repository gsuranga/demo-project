<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_part_type_model
 *
 * @author Iresha Lakmali
 */
class vehicle_part_type_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createVehiclePartType($dataArray) {
        $data = array(
            'part_type_name' => $dataArray['vehicle_part_type'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $query = $this->db->get_where('tbl_vehicle_part_type', array('part_type_name' => $dataArray['vehicle_part_type'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_vehicle_part_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
        }
    }
    
    public function viewAllVehiclePartType(){
        $sql = "select part_type_id,part_type_name from tbl_vehicle_part_type WHERE status='1' ORDER BY part_type_id DESC";
        return $result = $this->db->mod_select($sql);
    }
    
    public function remooveVehiclePartType($id){
         $where = array(
            'part_type_id' => $id
        );
        //print_r($where);
        $data = array(
           'status' => 0 
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_part_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function manageVehiclePartType($dataArray){
         $where = array(
            'part_type_id' => $dataArray['vehicle_part_type_id']
        );
        //print_r($where);
        $data = array(
           'part_type_name' => $dataArray['vehicle_part_type']
        );
        
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_part_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>
