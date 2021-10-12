<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_brand_model
 *
 * @author Iresha Lakmali
 */
class vehicle_brand_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_vehicle_type($q, $select) {
        $sql = "select vehicle_type_id,vehicle_type_name from tbl_vehicle_type WHERE status='1' AND vehicle_type_name LIKE '$q%'";
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

//widuranga jayawickrama(validate this function)
    public function createVehicleBrand($dataArray) {
        $data = array(
            'vehicle_brand_name' => $dataArray['vehicle_brand'],
            'vehicle_type_id' => $dataArray['vehicle_type_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $query = $this->db->get_where('tbl_vehicle_brand', array('vehicle_brand_name' => $dataArray['vehicle_brand'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            //print_r($data);
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_vehicle_brand", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

//==end====
    public function viewAllVehicleBrand() {
        $sql = "select b.vehicle_brand_id,b.vehicle_brand_name,b.vehicle_type_id,t.vehicle_type_name from tbl_vehicle_brand b INNER JOIN tbl_vehicle_type t ON b.vehicle_type_id=t.vehicle_type_id WHERE b.status='1' ORDER BY b.vehicle_brand_id DESC";
        return $result = $this->db->mod_select($sql);
    }

    public function remooveVehicleBrand($id) {
        $where = array(
            'vehicle_brand_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_brand", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function manageVehicleBrand($dataArray) {
        $where = array(
            'vehicle_brand_id' => $dataArray['m_vehicle_brand_id']
        );
        print_r($where);

        $data = array(
            'vehicle_brand_name' => $dataArray['m_vehicle_brand'],
            'vehicle_type_id' => $dataArray['vehicle_type_id'],
        );
        $query = $this->db->get_where('tbl_vehicle_brand', array('vehicle_brand_name' => $dataArray['m_vehicle_brand'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_brand", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
        }
    }

}
?>

