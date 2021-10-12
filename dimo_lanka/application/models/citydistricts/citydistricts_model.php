<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of citydistricts_model
 *
 * @author Iresha Lakmali
 */
class citydistricts_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createCity($dataArray) {
        $data = array(
            'city_name' => $dataArray['city_name'],
            'city_code' => $dataArray['city_code'],
            'district_id' =>$dataArray['txt_city_id'],
            'postal_code' => $dataArray['postal_code'],
            'status' => 1
        );
		
		 $query = $this->db->get_where('tbl_city', array('city_name' => $dataArray['city_name'],'postal_code' => $dataArray['postal_code'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
		
       // print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_city", $data);
        $this->db->__endTransaction();
        return $this->db->status();//query browser eka
		}
    }

    public function createDistricts($dataArray) {
        $data = array(
            'district_code' => $dataArray['district_code'],
            'district_name' => $dataArray['district_name'],
            'status' => 1
        );
		
		 $query = $this->db->get_where('tbl_district', array('district_name' => $dataArray['district_name'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
		
      //  print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_district", $data);
        $this->db->__endTransaction();
        return $this->db->status();
		}
    }

    public function get_all_city($q, $select) {
        $sql = "select city_id,city_name from tbl_city WHERE status='1' AND city_name LIKE '$q%'";
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

    public function viewAllCity() {
        $sql = "select tc.city_id,tc.city_name,tc.city_code,tc.postal_code,td.district_name,tc.district_id from tbl_city tc INNER JOIN tbl_district td ON tc.district_id=td.district_id WHERE tc.status='1'";
        return $this->db->mod_select($sql);
    }

    public function viewAllDistricts() {
        $sql = "select * from tbl_district WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function get_all_district($q, $select) {
        $sql = "select district_id,district_name from tbl_district WHERE district_name LIKE '$q%'";
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
    
    public function updateDistricts($dataArray){
            $where = array(
            'district_id' => $dataArray['district_id']
        );
        //print_r($where);

        $data = array(
            'district_code' => $dataArray['u_district_code'],
            'district_name' => $dataArray['u_district_name'],
        );
        //print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_district", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
      public function updateCity($dataArray){
            $where = array(
            'city_id' => $dataArray['city_id']
        );
        //print_r($where);

        $data = array(
            'city_name' => $dataArray['city_name'],
            'city_code' => $dataArray['city_code'],
            'postal_code' => $dataArray['postal_code'],
            'district_id' => $dataArray['district_id'],
        );
        //print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_city", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
	
	public function remooveCity($id) {
        $where = array(
            'city_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        // print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_city", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    public function remooveDisrict($id) {
        $where = array(
            'district_id' => $id
        );
      //print_r($where);
        $data = array(
            'status' => 0
        );
        // print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_district", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
	
	

}

?>
