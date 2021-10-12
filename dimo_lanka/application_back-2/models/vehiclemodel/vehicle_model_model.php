<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_model_model
 *
 * @author Iresha Lakmali
 */
class vehicle_model_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_brand($q, $select) {
        $sql = "select vehicle_brand_id,vehicle_brand_name from tbl_vehicle_brand WHERE status='1' AND vehicle_brand_name LIKE '$q%'";
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

    public function createVehicleModel($dataArray) {
        $data = array(
            'vehicle_model_name' => $dataArray['vehicle_model'],
            'vehicle_brand_id' => $dataArray['vehicle_brand_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $query = $this->db->get_where('tbl_vehicle_model', array('vehicle_model_name' => $dataArray['vehicle_model'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
            //print_r($data);
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_vehicle_model", $data);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function viewAllVehicleModel() {
        $sql = "select m.vehicle_model_id,m.vehicle_model_name,m.vehicle_brand_id,b.vehicle_brand_name from tbl_vehicle_model m INNER JOIN tbl_vehicle_brand b ON m.vehicle_brand_id=b.vehicle_brand_id WHERE m.status='1' ORDER BY m.vehicle_model_id DESC";
        return $result = $this->db->mod_select($sql);
    }

    public function remooveVehicleModel($id) {
        $where = array(
            'vehicle_model_id' => $id
        );

        $data = array(
            'status' => 0
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_model", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function manageVehicleModel($dataArray) {
        $where = array(
            'vehicle_model_id' => $dataArray['m_vehicle_model_id']
        );
        print_r($where);

        $data = array(
            'vehicle_model_name' => $dataArray['vehicle_model'],
            'vehicle_brand_id' => $dataArray['vehicle_brand_id'],
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_model", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();

    }

}

?>
