<?php

/**
 * Description of garage_model
 *
 * @author Iresha Lakmali
 */
class garage_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllDealer($q, $select) {
        $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE status='1'AND  delar_name LIKE '$q%'";
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

    public function get_all_dealer_account_no($q, $select) {
        $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE status='1'AND  delar_account_no LIKE '$q%'";
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

// city /////////////////////////////////////////////////////

    public function get_all_cit($q, $select) {
        $sql = "select delar_id,delar_name,delar_account_no from tbl_dealer WHERE status='1'AND  delar_account_no LIKE '$q%'";
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

    /////////////////////////// end city


    public function getAllUser($q, $select) {
        $sql = "select id,name from tbl_user WHERE status='1' AND  name LIKE '$q%'";
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

    // add new part

    public function getAllPartType() {
        $sql = "select part_type_id,part_type_name from tbl_vehicle_part_type WHERE status = 1";

        return $this->db->mod_select($sql);
    }

//    public function getAllPartType($q, $select) {
//        $sql = "select part_type_id,part_type_name from tbl_vehicle_part_type WHERE status='1' AND  part_type_name LIKE '$q%'";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    public function getAllCity($q, $select) {
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

    public function get_all_garage($q, $select) {
        $sql = "select * from tbl_garage where status=1 and  garage_name LIKE '" . $q . "%'";
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

    public function completedGarage() {
        $sql = "select * from tbl_garage where completed_status='1'";
        return $this->db->mod_select($sql);
    }

    public function notCompletedGarage() {
        $sql = "select * from tbl_garage where completed_status='0'";
        return $this->db->mod_select($sql);
    }

    public function getAllVehicleBrand($q, $select) {
        $sql = "select vehicle_brand_id,vehicle_brand_name from tbl_vehicle_brand WHERE status='1' AND  vehicle_brand_name LIKE '$q%'";
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

    // repair vehicle 
    public function getAllVehicleRepair() {
        $sql = "select repair_type_id,repair_type_name from tbl_vehicle_repair_type WHERE status='1'";

        return $this->db->mod_select($sql);
    }

//    public function getAllVehicleRepair($q, $select) {
//        $sql = "select repair_type_id,repair_type_name from tbl_vehicle_repair_type WHERE status='1' AND  repair_type_name LIKE '$q%'";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    public function getAllVehicleType() {
        $sql = "SELECT vehicle_type_id,vehicle_type_name FROM tbl_vehicle_type where status = 1";

        return $this->db->mod_select($sql);
    }

    public function get_all_indian_vehicle_type() {
        $sql = "select b.vehicle_brand_id,
b.vehicle_brand_name,
b.vehicle_type_id,
t.vehicle_type_name 
from 
tbl_vehicle_brand b 
INNER JOIN tbl_vehicle_type t ON b.vehicle_type_id=t.vehicle_type_id 
WHERE b.status='1' and b.vehicle_brand_name = 'indian' or 'Indian' or 'india'
ORDER BY b.vehicle_brand_id DESC";

        return $this->db->mod_select($sql);
    }

    public function get_all_vehicle_type() {
        $sql = "select b.vehicle_brand_id,
b.vehicle_brand_name,
b.vehicle_type_id,
t.vehicle_type_name 
from 
tbl_vehicle_brand b 
INNER JOIN tbl_vehicle_type t ON b.vehicle_type_id=t.vehicle_type_id 
WHERE b.status='1' 
ORDER BY b.vehicle_brand_id DESC";

        return $this->db->mod_select($sql);
    }

//    public function getAllVehicleType($q, $select) {
//        $sql = "SELECT vehicle_type_id,vehicle_type_name FROM tbl_vehicle_type WHERE vehicle_type_name LIKE '$q%'";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    public function getindianbarndsDetails() {

        $sql = "select * from tbl_garage_indian_brands tgib 
INNER JOIN 
tbl_garage tg ON tgib.garage_id=tg.garage_id 
INNER JOIN 
tbl_vehicle_part_type tvpt ON tgib.indian_brand_id=tvpt.part_type_id 
where tg.garage_id='$garage_id'";

        return $this->db->mod_select($sql);

    }

//    public function getindianbarndsDetails($garage_id) {
//        $sql = "SELECT * FROM tbl_garage_indian_brands tgntd 
//            INNER JOIN tbl_garage tg ON tg.garage_id = tgntd.garage_id 
//            INNER JOIN tbl_garage_indian_brands_detail tgntdd 
//            ON tgntdd.garage_indian_brand_id = tgntd.garage_indian_brand_id 
//            INNER JOIN tbl_vehicle_part_type tvp ON tvp.part_type_id = tgntdd.party_id  
//            WHERE tg.status=1 AND tgntd.status=1 AND tg.garage_id='$garage_id'";
//        $sql = "select * from tbl_garage_indian_brands tgib INNER JOIN tbl_garage tg ON tgib.garage_id=tg.garage_id INNER JOIN tbl_vehicle_part_type tvpt ON tgib.part_type_id=tvpt.part_type_id where tgib.garage_id='$garage_id';";
//        $mod_select = $this->db->mod_select($sql);
//        if (count($mod_select) > 0) {
//            return $mod_select;
//        } else {
//            return 0;
//            }
//        }    

    public function createGarage($dataArray) {

//                echo '<pre>';       
//        echo $dataArray['garage_code']."1111";
//        print_r($dataArray);
        //       echo '<pre>';
        //       echo "</br>";
        $data = array(
            'garage_code' => $dataArray['garage_code'],
            //     'garage_code' => 0,
            'garage_account_no' => 0,
            //     'delar_id' => $dataArray['user_id'],
            'garage_name' => $dataArray['garage_name'],
            'garage_address' => $dataArray['garage_address'],
            'garage_contact_no' => $dataArray['garage_contact_no'],
            'nearest_tata_dealer' => $dataArray['dealer_id'],
            'garage_city' => $dataArray['txt_part_cityReg_id_1'],
            'added_by' => $dataArray['user_id'],
            'remarks' => $dataArray['txt_remark'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1,
            'completed_status' => 0
        );
        echo print_r($data);


        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage", $data);
        $this->db->__endTransaction();
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function updateGarageProfile($dataArray) {

        $garage_id = $this->session->userdata('garage_id');
        $where = array(
            'garage_id' => $garage_id
        );
        print_r($where);

        $data = array(
            'garage_code' => $dataArray['txt_garage_code'],
            'garage_account_no' => $dataArray['txt_garage_account_no'],
            'completed_status' => 1
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->update("tbl_garage", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createNonTataDealer($dataArray) {
        $data = array(
            'dealer_name' => $dataArray['dealer_name'],
            'dealer_address' => $dataArray['dealer_address'],
            'dealer_contact_no' => $dataArray['dealer_contact_no'],
            'garage_id' => $dataArray['garage_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        //print_r($data);
        $rows = $dataArray['tokn_row'];
        $rows++;
        //garage_non_tata_dealers_id, part_type_id, status, added_date, added_time
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage_non_tata_dealers", $data);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_part_type_id_' . $x]) && $dataArray['txt_part_type_id_' . $x] != '') {
                $dataArray1 = array(
                    'garage_non_tata_dealers_id' => $this->db->insert_id(),
                    'part_type_id' => $dataArray['txt_part_type_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                $this->db->insertData("tbl_garage_non_tata_dealers_detail", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createGarageTGPDealer($dataArray) {
        $data = array(
            'garag_id' => $dataArray['garage_id'],
            'delar_id' => $dataArray['dealer_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );

        $rows = $dataArray['tokn_row'];
        $rows++;
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage_tgp_dealers", $data);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_part_type_id_' . $x]) && $dataArray['txt_part_type_id_' . $x] != '') {
                $dataArray1 = array(
                    'tgp_dealer_id' => $this->db->insert_id(),
                    'part_id' => $dataArray['txt_part_type_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                $this->db->insertData("tbl_garage_tgp_dealers_detail", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createGarageindianDealer($dataArray) {
        $data = array(
            'garage_id' => $dataArray['garage_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);
        $rows = $dataArray['tokn_row'];
        $rows++;
        //garage_non_tata_dealers_id, part_type_id, status, added_date, added_time
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage_indian_brands", $data);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_indian_brand_id_' . $x]) && $dataArray['txt_indian_brand_id_' . $x] != '') {
                $dataArray1 = array(
                    'garage_indian_brand_id' => $this->db->insert_id(),
                    'party_id' => $dataArray['txt_indian_brand_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                $this->db->insertData("tbl_garage_indian_brands_detail", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createGarageVehicleType($dataArray) {
        $data = array(
            'garage_id' => $dataArray['garage_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );

        $rows = $dataArray['emp_count'];
        $rows++;
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage_vehicle_type", $data);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_vehicle_type_id_' . $x]) && $dataArray['txt_vehicle_type_id_' . $x] != '') {
                $dataArray1 = array(
                    'garage_vehicle_type_id' => $this->db->insert_id(),
                    'vehicle_type_id' => $dataArray['txt_vehicle_type_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                $this->db->insertData("tbl_garage_vehicle_type_detail", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function insertGarage($dataArray) {
        $data = array(
            'garage_id' => $dataArray['garage_id'],
            'added_date' => date('Y:m:d'),
            'time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);
        $rows = $dataArray['emp_count'];
        $rows++;
        //garage_non_tata_dealers_id, part_type_id, status, added_date, added_time
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_garage_tata_brands", $data);

        for ($x = 1; $x < $rows; $x++) {
            if (isset($dataArray['txt_responsibility_id_' . $x]) && $dataArray['txt_responsibility_id_' . $x] != '') {
                $dataArray1 = array(
                    'tbl_garage_tata_brands_id' => $this->db->insert_id(),
                    'vehicle_sub_model_id' => $dataArray['txt_follow_up_id_' . $x],
                    'vehicle_model_id' => $dataArray['txt_responsibility_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                $this->db->insertData("tbl_garage_tata_brands_detail", $dataArray1);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

////////////////////////// example ours ////////////////////////////////////////////////////////////////

    public function getAllVehicleModel() {

        $sql = "select vehicle_model_id,vehicle_model_name from tbl_vehicle_model WHERE status='1'";

        return $this->db->mod_select($sql);
    }

//    public function getAllVehicleModel($q, $select) {
//        $sql = "select vehicle_model_id,vehicle_model_name from tbl_vehicle_model WHERE status='1' AND  vehicle_model_name LIKE '$q%'";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    public function getAllVehicleSubModel() {

        $sql = "select vehicle_sub_model_id,vehicle_sub_model_name from tbl_vehicle_sub_model WHERE status='1' ";

        return $this->db->mod_select($sql);
    }

//    public function getAllVehicleSubModel($q, $select) {
//        $sql = "select vehicle_sub_model_id,vehicle_sub_model_name from tbl_vehicle_sub_model WHERE status='1' AND  vehicle_sub_model_name LIKE '$q%'";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }

    /*
     * garage profile
     */

    public function getgaragedetails($garage_id) {
        $sql = "SELECT * FROM `tbl_garage` WHERE garage_id='$garage_id' AND status=1";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function getnontataDetails($garage_id) {
//        $sql = "SELECT * FROM tbl_garage_non_tata_dealers tgntd 
//            INNER JOIN tbl_garage tg ON tg.garage_id = tgntd.garage_id 
//            INNER JOIN tbl_garage_non_tata_dealers_detail tgntdd 
//            ON tgntdd.garage_non_tata_dealers_id = tgntd.garage_non_tata_dealers_id 
//            INNER JOIN tbl_vehicle_part_type tvpt ON tvpt.part_type_id = tgntdd.part_type_id  
//            WHERE tg.status=1 AND tgntd.status=1 AND tg.garage_id='$garage_id'";

        $sql = "select * from tbl_garage_non_tata_dealers gntd
INNER JOIN 
tbl_garage tg ON gntd.garage_id=tg.garage_id 
INNER JOIN 
tbl_vehicle_part_type vpt ON gntd.part_type_id=vpt.part_type_id
INNER JOIN 
tbl_city c ON gntd.non_tgp_dealers_city=c.city_id
 where gntd.garage_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function getbrandsDetails($garage_id) {
//        $sql = "SELECT * FROM tbl_garage_tata_brands tgntd 
//            INNER JOIN tbl_garage tg ON tg.garage_id = tgntd.garage_id 
//            INNER JOIN tbl_garage_tata_brands_detail tgntdd ON tgntdd.tbl_garage_tata_brands_id = tgntd.tata_brands_detail_id 
//            INNER JOIN tbl_vehicle_model tvpt ON tvpt.vehicle_model_id = tgntdd.vehicle_model_id 
//            INNER JOIN tbl_vehicle_sub_model tvsm  ON tvsm.vehicle_sub_model_id = tgntdd.vehicle_sub_model_id 
//            WHERE tg.status=1 AND tgntd.status=1 AND tg.garage_id='$garage_id' ";
        $sql = "select * from  tbl_garage_tata_models gtm 
INNER JOIN 
tbl_garage tg ON gtm.garage_id=tg.garage_id 
INNER JOIN 
tbl_vehicle_model tvm ON gtm.vehicle_model_id=tvm.vehicle_model_id 
INNER JOIN 
tbl_vehicle_sub_model tvsm ON gtm.vehicle_sub_model_id=tvsm.vehicle_sub_model_id 
INNER JOIN 
tbl_vehicle_repair_type tvrt ON tvrt.repair_type_id=gtm.vehicle_repair_type_id 

where
 gtm.garage_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function gettgpDetails($garage_id) {
//        $sql = "SELECT * FROM tbl_garage_tgp_dealers tgntd 
//            INNER JOIN tbl_garage tg ON tg.garage_id = tgntd.garag_id 
//            INNER JOIN tbl_garage_tgp_dealers_detail tgntdd ON tgntdd.tgp_dealer_id = tgntd.garage_tgp_dealer_detail_id 
//            INNER JOIN tbl_vehicle_part_type tvp ON tvp.part_type_id = tgntdd.part_id  
//            WHERE tg.status=1 AND tgntd.status=1 AND tg.garage_id='$garage_id'";
        $sql = "select * from tbl_garage_tgp_dealers tgpd 
INNER JOIN 
tbl_garage tg 
ON 
tgpd.garag_id=tg.garage_id 
INNER JOIN 
tbl_vehicle_part_type tvp 
ON 
tgpd.part_type_id=tvp.part_type_id
INNER JOIN 
tbl_dealer td 
ON 
tgpd.dealer_id=td.delar_id
 where tgpd.garag_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function getvehicaltypesDetails($garage_id) {
//        $sql = "SELECT * FROM tbl_garage_vehicle_type tgntd 
//            INNER JOIN tbl_garage tg ON tg.garage_id = tgntd.garage_id 
//            INNER JOIN tbl_garage_vehicle_type_detail tgntdd ON tgntdd.garage_vehicle_type_id = tgntd.garage_vehicle_type_id 
//            INNER JOIN tbl_vehicle_type tvp ON tvp.vehicle_type_id = tgntdd.vehicle_type_id  
//            WHERE tg.status=1 AND tgntd.status=1 AND tg.garage_id='$garage_id'";
        $sql = "select * from  tbl_garage_vehicle_type tgvt INNER JOIN tbl_garage tg ON tgvt.garage_id=tg.garage_id INNER JOIN tbl_vehicle_type vt ON tgvt.vehicle_type_id=vt.vehicle_type_id where tgvt.garage_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function get_garage_tgp_dealers($garage_id) {
        $sql = "select * from tbl_garage_tgp_dealers tgtd INNER JOIN tbl_garage tg ON tgtd.garag_id=tg.garage_id INNER JOIN tbl_vehicle_part_type tvpt ON tgtd.part_type_id=tvpt.part_type_id where tgtd.garag_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function get_non_tgp_brand_details($garage_id) {
        $sql = "select * from tbl_garage_non_tgp_brand_details gntbd INNER JOIN tbl_garage tg ON gntbd.garage_id=tg.garage_id INNER JOIN tbl_vehicle_brand tvb ON gntbd.vehicle_brand_id=tvb.vehicle_brand_id INNER JOIN tbl_vehicle_repair_type tvrt ON gntbd.vehicle_repair_type_id=tvrt.repair_type_id where gntbd.garage_id='$garage_id'";
        $mod_select = $this->db->mod_select($sql);
        if (count($mod_select) > 0) {
            return $mod_select;
        } else {
            return 0;
        }
    }

    public function additionalRegistration($dataArray) {

        $token_vehicle_type = $dataArray['token_vehicle_type'];
        $token_vehicle_type++;
        $insert_id = $this->session->userdata('garage_id');

        $this->db->__beginTransaction();
        for ($x = 1; $x < $token_vehicle_type; $x++) {
            if (isset($dataArray['txt_vehicle_type_id_' . $x]) && $dataArray['txt_vehicle_type_id_' . $x] != '') {
                $vehicle_type_array = array(
                    'garage_id' => $insert_id,
                    'vehicle_type_id' => $dataArray['txt_vehicle_type_id_' . $x],
                    'status' => 1
                );
                print_r($vehicle_type_array);

                $this->db->insertData("tbl_garage_vehicle_type", $vehicle_type_array);
            }
        }

        $token_indian_brand = $dataArray['token_indian_brand'];
        $token_indian_brand++;

        for ($x = 1; $x < $token_indian_brand; $x++) {
            if (isset($dataArray['txt_indian_brand_id_' . $x]) && $dataArray['txt_indian_brand_id_' . $x] != '') {
                $indian_brand_array = array(
//                    'garage_indian_brand_id' => $this->db->insert_id(),
                    'garage_id' => $insert_id,
                    'indian_brand_id' => $dataArray['txt_indian_brand_id_' . $x],
                    'status' => 1
                );
                print_r($indian_brand_array);
                $this->db->insertData("tbl_garage_indian_brands", $indian_brand_array);
            }
        }
        $token_tata_model = $dataArray['token_tata_model'];
        $token_tata_model++;

        for ($x = 1; $x < $token_tata_model; $x++) {
            if (isset($dataArray['txt_vehicle_model_id_' . $x]) && $dataArray['txt_vehicle_model_id_' . $x] != '') {
                $tata_model_array = array(
//                    'garage_tata_model_id' => $insert_id,
                    'garage_id' => $insert_id,
                    'vehicle_model_id' => $dataArray['txt_vehicle_model_id_' . $x],
                    'vehicle_sub_model_id' => $dataArray['txt_vehicle_sub_model_id_' . $x],
                    'vehicle_repair_type_id' => $dataArray['txt_vehicle_repair_type_id_' . $x],
                    'status' => 1
                );
                print_r($tata_model_array);
                $this->db->insertData("tbl_garage_tata_models", $tata_model_array);
            }
        }
        $token_tgp_dealers = $dataArray['token_tgp_dealers'];
        $token_tgp_dealers++;

        for ($x = 1; $x < $token_tgp_dealers; $x++) {
            if (isset($dataArray['txt_part_type_id_' . $x]) && $dataArray['txt_part_type_id_' . $x] != '') {
                $tgp_dealer_detail_array = array(
//                    'garage_tgp_dealer_detail_id' => $insert_id,
                    'garag_id' => $insert_id,
                    'dealer_id' => $dataArray['nearest_tata_dealer_id_' . $x],
                    'part_type_id' => $dataArray['txt_part_type_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($tgp_dealer_detail_array);
                $this->db->insertData("tbl_garage_tgp_dealers", $tgp_dealer_detail_array);
            }
        }

        $token_non_tgp_part_type = $dataArray['token_non_tgp_part_type'];
        $token_non_tgp_part_type++;

        for ($x = 1; $x < $token_non_tgp_part_type; $x++) {
            if (isset($dataArray['txt_part_type_id1_' . $x]) && $dataArray['txt_part_type_id1_' . $x] != '') {
                $non_tata_dealer_array = array(
//                    'garage_non_tata_dealers_id' => $insert_id,
                    'garage_id' => $insert_id,
                    'dealer_name' => $dataArray['txt_non_tata_dealer_name_' . $x],
                    'dealer_address' => $dataArray['txt_non_tata_dealer_address_' . $x],
                    'part_type_id' => $dataArray['txt_part_type_id1_' . $x],
                    'non_tgp_dealers_city' => $dataArray['txt_part_city_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($non_tata_dealer_array);
                $this->db->insertData("tbl_garage_non_tata_dealers", $non_tata_dealer_array);
            }
        }


        $token_tata_brand_detail = $dataArray['token_tata_brand_detail'];
        $token_tata_brand_detail++;

        for ($x = 1; $x < $token_tata_brand_detail; $x++) {
            if (isset($dataArray['txt_vehicle_repair_type_id1_' . $x]) && $dataArray['txt_vehicle_repair_type_id1_' . $x] != '') {
                $non_tgp_brand_detail_array = array(
//                    'non_tgp_brand_detail_id' => $insert_id,
                    'garage_id' => $insert_id,
                    'vehicle_brand_id' => $dataArray['txt_vehicle_brand_id_' . $x],
                    'vehicle_repair_type_id' => $dataArray['txt_vehicle_repair_type_id1_' . $x],
                    'vehicle_other_name' => $dataArray['txt_others_' . $x],
                    'vehicle_repair_approx' => $dataArray['txt_repairs_' . $x],
                    'remarks' => $dataArray['txt_remarks_' . $x],
                    'status' => 1
                );
                print_r($non_tgp_brand_detail_array);
                $this->db->insertData("tbl_garage_non_tgp_brand_details", $non_tgp_brand_detail_array);
            }
        }
        //garage_employes_id, eployee_names, contact_no, account_no, added_time, added_date, status, garage_id
        $hidden_contact_details = $dataArray['hidden_contact_details'];
        $hidden_contact_details++;
        for ($x = 1; $x < $hidden_contact_details; $x++) {
            if (isset($dataArray['txt_contact_person_name_' . $x]) && $dataArray['txt_contact_person_name_' . $x] != '') {
//                echo '<pre>';
                //    echo $dataArray['garage_code'] . "1111";
//                print_r($dataArray);
//                echo '<pre>';
//                echo $dataArray;
//                echo "</br>";
                $garage_employes = array(
//                    'non_tgp_brand_detail_id' => $insert_id,
                    'garage_id' => $insert_id,
                    'eployee_names' => $dataArray['txt_contact_person_name_' . $x],
                    'contact_no' => $dataArray['txt_contact_no_' . $x],
                    'account_no' => $dataArray['txt_code_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($garage_employes);
                $this->db->insertData("tbl_garage_employes", $garage_employes);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getGarageEmployeeDetails($garage_id) {

        $sql = "select 
    tge.eployee_names, tge.contact_no,tge.account_no
from
    tbl_garage_employes tge
        INNER JOIN
    tbl_garage tg ON tge.garage_id = tg.garage_id
where
    tge.garage_id = '$garage_id'";
        return $this->db->mod_select($sql);
    }

}

?>
