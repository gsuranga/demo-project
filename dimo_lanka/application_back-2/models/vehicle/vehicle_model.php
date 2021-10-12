<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_model
 *
 * @author Sameera Viraj
 */
class vehicle_model extends C_Model {

    //put your code here
    var $status = 0;

    public function __construct() {
        parent::__construct();
    }

    public function get_vehicle_model($id, $select) {
        $sql = "SELECT vehicle_model_name,vehicle_model_id FROM dimo_lanka_web.tbl_vehicle_model where vehicle_model_name like '%$id%';";
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

    public function get_customer($id, $select) {
        $userdata = $this->session->userdata('sales_officer_id');

        $sql = "SELECT distinct
    tc.customer_name,tc.customer_id
FROM
    tbl_customer tc";
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

    public function get_vehicle_of_cutomer($id) {
        $sql = "SELECT vehicle_reg_no FROM dimo_lanka_web.tbl_vehicle where customer_id='$id';";
        $query = $this->db->query($sql);
        $result = $query->result('array');

        $json_array = array();
        $json_array['vehicle'] = array();
        foreach ($result as $row) {
            $subJson = array();
            $subJson['vehicle_reg_no'] = $row['vehicle_reg_no'];
            array_push($json_array['vehicle'], $subJson);
        }

        $jsonEncode = json_encode($json_array);
        return $jsonEncode;
    }

    public function get_purpose($id, $select) {
        $userdata = $this->session->userdata('sales_officer_id');

        $sql = "SELECT distinct vehicle_purpose_id,vehicle_purpose_name FROM dimo_lanka_web.tbl_vehicle_purpose where vehicle_purpose_name like '%$id%';";
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

    public function get_bus_type($id, $select) {
        $userdata = $this->session->userdata('sales_officer_id');

        $sql = "SELECT 
    business_type_id, business_type_name
FROM
    dimo_lanka_web.tbl_vehicle_business_type where business_type_name like '%$id%';";
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

    public function get_district($id, $select) {
        $sql = "SELECT district_id,district_name FROM dimo_lanka_web.tbl_district where district_name like '%$id%';";
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

    public function get_city($id, $select) {
        $sql = "SELECT city_id,city_name FROM dimo_lanka_web.tbl_city where city_name like '%$id%'";
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

    public function get_dealer_purchasing_parts($id, $select) {
        $sql = "SELECT delar_id,delar_name FROM dimo_lanka_web.tbl_dealer where delar_name like '%$id%'";
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

    public function registerVehicle($data_array) {

        $data = array(
            'customer_id' => $data_array['owner_hid_id'],
            'vehicle_reg_no' => $data_array['vehicle_reg_num_name'],
            'vehicle_model_id' => $data_array['vehicle_model_name'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_vehicle", $data);
        $vehicle_id = $this->db->insert_id();
        $this->db->__endTransaction();
        $status = $this->db->status();
        if ($status == 1) {

            $json_areas = json_decode($data_array['last_area_json']);

            foreach ($json_areas->areas as $value) {

                $areaData = array(
                    'vehicle_id' => $vehicle_id,
                    'city_id' => $value->city_name,
                    'district_id' => $value->district_name,
                    'location' => $value->location,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );

                $this->db->__beginTransaction();
                $this->db->insertData("tbl_vehicle_travel_area", $areaData);
                $this->db->__endTransaction();
                $this->status = $this->db->status();
            }
            if ($this->status == 1) {
                $purpose_json = json_decode($data_array['purpose_json']);
                $count_purpose = count($purpose_json);


                foreach ($purpose_json->purpose as $value) {
                    if ($value->bus_type != 0) {
                        $data = array(
                            'vehicle_id' => $vehicle_id,
                            'vehicle_purpose_id' => $value->purpose,
                            'tbl_vehicle_business_type_id' => $value->bus_type,
                            'status' => 1,
                            'added_date' => date('Y-m-d'),
                            'added_time' => date('H:i:s')
                        );

                        $this->db->__beginTransaction();
                        $this->db->insertData("tbl_vehicle_purposes_detail", $data);
                        $this->db->__endTransaction();
                        $this->status = $this->db->status();
                    } else {


                        $data = array(
                            'vehicle_id' => $vehicle_id,
                            'vehicle_purpose_id' => $value->purpose,
                            'tbl_vehicle_business_type_id' => NULL,
                            'status' => 1,
                            'added_date' => date('Y-m-d'),
                            'added_time' => date('H:i:s')
                        );

                        $this->db->__beginTransaction();
                        $this->db->insertData("tbl_vehicle_purposes_detail", $data);
                        $this->db->__endTransaction();
                        $this->status = $this->db->status();
                    }
                }

                if ($this->status == 1) {
                    $purpose_json = json_decode($data_array['last_parts_json']);
                    foreach ($purpose_json->parts as $value) {
                        $data = array(
                            'vehicle_id' => $vehicle_id,
                            'dealer_id' => $value->parts,
                            'status' => 1
                        );

                        $this->db->__beginTransaction();
                        $this->db->insertData("tbl_vehicle_part_purchase_tata_dealers", $data);
                        $this->db->__endTransaction();
                        $this->status = $this->db->status();
                    }
                }
                if ($this->status == 1) {
                    $purpose_json = json_decode($data_array['last_vehicle_json']);
                    foreach ($purpose_json->drivers as $value) {
                        $data = array(
                            'vehicle_id' => $vehicle_id,
                            'driver_name' => $value->driver_name,
                            'status' => 1
                        );

                        $this->db->__beginTransaction();
                        $this->db->insertData("tbl_vehicle_driver_details", $data);
                        $this->db->__endTransaction();
                        $this->status = $this->db->status();
                    }
                }
            }
        }
        return $this->status;
    }

    public function get_vehicle_details($id) {
        $sql = "select tv.vehicle_id,tvm.vehicle_model_name,tv.vehicle_reg_no,tc.customer_name,tv.added_date,tv.added_time from tbl_vehicle tv inner join tbl_vehicle_model tvm
 inner join tbl_customer tc on tv.customer_id = tc.customer_id where tv.vehicle_id = '$id' group by tv.vehicle_id";

        return $this->db->mod_select($sql);
    }

    public function get_driver_details_for_search($id) {
        $sql = "select 
    distinct
    tvdd.driver_name 
from
    tbl_vehicle tv
        inner join
    tbl_vehicle_driver_details tvdd
        
where
    tvdd.vehicle_id = '$id' ";

        return $this->db->mod_select($sql);
    }

    public function get_purpose_details($id) {
        $sql = "select 
    tvbt.business_type_name,tvp.vehicle_purpose_name
from
    tbl_vehicle tv
        inner join
    tbl_vehicle_purposes_detail tvpd on tv.vehicle_id=tvpd.vehicle_id 
		inner join
	tbl_vehicle_purpose tvp on tvpd.vehicle_purpose_id = tvp.vehicle_purpose_id
		left join
	tbl_vehicle_business_type tvbt on tvp.vehicle_purpose_id = tvbt.vehicle_purpose_id
where tvpd.vehicle_id = '$id'";

        return $this->db->mod_select($sql);
    }

    public function get_area_travel($id) {
        $sql = "SELECT 
    tvta.location,
	tc.city_name,
	td.district_name 
FROM 
    dimo_lanka_web.tbl_vehicle_travel_area tvta 
        inner join 
    tbl_city tc ON tc.city_id = tvta.city_id 
		inner join 
	tbl_district td on td.district_id = tvta.district_id 
where tvta.vehicle_id ='$id'
";

        return $this->db->mod_select($sql);
    }

    public function get_dealers_details($id) {
        $sql = "SELECT distinct 
    td.delar_name 
FROM 
    dimo_lanka_web.tbl_vehicle_part_purchase_tata_dealers tvpptd 
        inner join 
    tbl_dealer td ON tvpptd.dealer_id = td.delar_id where tvpptd.vehicle_id='$id'
";

        return $this->db->mod_select($sql);
    }

    public function get_vehicle_ids($id, $select) {
        $sql = "select distinct vehicle_id,vehicle_reg_no from tbl_vehicle where vehicle_reg_no like '%$id%'";
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

    public function loadAllFleetOwnerVehicles($q, $select) {
        $sql = "select * from tbl_vehicle tv inner join tbl_customer tc on tv.customer_id = tc.customer_id where tc.customer_type = 3 and tc.status = 1 and tv.vehicle_reg_no like '" . $q . "%'";
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

    public function loadAllVehicleOwnerVehicles($q, $select) {
        $sql = "select * from tbl_vehicle tv inner join tbl_customer tc on tv.customer_id = tc.customer_id where tc.customer_type != 3 and tc.status = 1 and tv.vehicle_reg_no like '" . $q . "%'";
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
