<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer_model
 *
 * @author Iresha Lakmali
 */
class customer_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getHistory() {
        $sql = "";
        return $this->db->mod_select($sql);
    }

    public function get_all_garage_type() {
        // thsis came from controller 'load_part_type'
        $sql = "SELECT part_type_name,part_type_id FROM `tbl_vehicle_part_type` where status=1";
        return $this->db->mod_select($sql);
    }

    public function viewvehicle_model() {
        $sql = "select 
    tvm.vehicle_model_name, tvm.vehicle_model_id
from
    tbl_vehicle_model as tvm
where
    tvm.status = 1";
        return $this->db->mod_select($sql);
    }

    public function get_vehicle_sub_model($q, $select, $brID) {
        $sql = "select 
    tvs.vehicle_sub_model_name, tvs.vehicle_sub_model_id
from
    tbl_vehicle_sub_model as tvs
        inner join
    tbl_vehicle_model as tvm ON tvs.vehicle_model_id = tvm.vehicle_model_id
where
    tvs.status = 1
        and tvm.vehicle_model_id = $brID and tvs.vehicle_sub_model_name  like '$q%'  ";
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

    public function get_sub_model($ID) {

        $sql = "select 
    tvs.vehicle_sub_model_name, tvs.vehicle_sub_model_id
from
    tbl_vehicle_sub_model as tvs
        inner join
    tbl_vehicle_model as tvm ON tvs.vehicle_model_id = tvm.vehicle_model_id
where
    tvs.status = 1
        and tvm.vehicle_model_id = $ID";

        return $this->db->mod_select($sql);
    }

    public function viewpurpose() {
        $sql1 = "select 
    tvp.vehicle_purpose_name,tvp.vehicle_purpose_id
from
    tbl_vehicle_purpose as tvp
where
    tvp.status=1";

        return $this->db->mod_select($sql1);
    }

    public function load_repay_type() {
        $sql = "select 
    tvpt.repair_type_id, tvpt.repair_type_name
from
    tbl_vehicle_repair_type as tvpt
where
    tvpt.status = 1";
        return $this->db->mod_select($sql);
    }

    public function load_business_types() {
        $sql = "SELECT 
    tvbt.business_type_id, tvbt.business_type_name
from
    tbl_vehicle_business_type as tvbt where tvbt.status=1";
        return $this->db->mod_select($sql);
    }

    public function get_dealer($id, $select) {

        $sql = "select
delar_name,
delar_id
from
tbl_dealer 
where delar_name like  '$id%'";
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

    public function load_garage_details() {
        $sql = "select 
    tvrp.repair_type_name, tvrp.repair_type_id
from
    tbl_vehicle_repair_type as tvrp
where
    tvrp.status = 1";
        return $this->db->mod_select($sql);
    }

    public function get_district($id, $select) {
        $sql = "SELECT district_id,district_name,district_code FROM dimo_lanka_web.tbl_district where district_name like '$id%';";
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

    public function get_city($q, $select, $brID) {


        $sql = "SELECT 
    tc.city_id, tc.city_name
FROM
    tbl_city as tc
where 
   tc.district_id=$brID and tc.status=1 and tc.city_name like '$q%' ";
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

    /// get owner ============================ stsrt=============
    public function get_owner($q, $select) {


        $sql = "SELECT 
    tc.owner_id, tc.owner,tc.ownerConNo,tc.ownerEmail
FROM
    tbl_vehicle_owner as tc
where 
    tc.owner like '$q%' ";
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

    /// get owner ============================ end =============

    public function get_repearType($id, $select) {
        $sql = "select tvrt.repair_type_name,tvrt.repair_type_id from tbl_vehicle_repair_type as tvrt where tvrt.status = 1 and tvrt.repair_type_name like '$id%'";
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

    public function get_garage($id, $select) {
        $sql = "select 
    tg.garage_id, tg.garage_name
from
    tbl_garage as tg
where
    tg.status = 1 and tg.garage_name like '$id%';";
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
        //$userdata = $this->session->userdata('sales_officer_id');

        $sql = "SELECT 
    business_type_id, business_type_name
FROM
    dimo_lanka_web.tbl_vehicle_business_type where business_type_name like '$id%';";
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

    public function viewcustomerType() {
        $sql = "select 
    tcy.customer_type_name, tcy.customer_type_id
from
    tbl_customer_type as tcy
where
    tcy.status = 1";
        return $this->db->mod_select($sql);
    }

    public function get_dealer_Purchase_details($q, $select, $setID) {
        if (1 == $setID) {
            $sql = "select 
    (td.delar_name) as pname, (td.delar_id) as pid
from
    tbl_dealer as td
where
    td.status = 1 and td.delar_name like '$q%';";
        } elseif (2 == $setID) {
            $sql = "select 
    (tnrs.shop_name) as pname, (tnrs.shop_id) as pid
from
    tbl_non_reg_shops as tnrs
where
    tnrs.status = 1 and tnrs.shop_name like '$q%';";
        }
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

// customer other vehicles ======================================start===========================================>>>>>>>
    public function get_OtherVehicle($id, $select) {

        $sql = "select
c.customer_name,
v.vehicle_reg_no,
v.customer_id
from
tbl_vehicle as v
inner join
tbl_customer as c
on
v.customer_id = c.customer_id 
where
 c.customer_name like '$id';";
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

// customer other vehicles ======================================end===========================================>>>>>>>

    public function create_new_customer($data_Array) {
        //======================insert data customer table================================
        //   print_r($data_Array);
        $this->db->__beginTransaction();
        $data = array(
            'customer_name' => $data_Array['customer_name'],
            'cust_account_no' => 00,
            'sales_officer_id' => $this->session->userdata('employe_id'),
            'customer_code' => 00,
            'cust_contact_no_t' => $data_Array['customer_con_t'],
            'cust_contact_no_m' => $data_Array['customer_con_m'],
            'cust_contact_no_w' => $data_Array['customer_con_w'],
            'cust_address' => $data_Array['customer_address'],
            'customer_type' => $data_Array['customer_type'],
            'email_address' => $data_Array['email_address'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H-i-s'),
            'status' => 1
        );
        //print_r($data);

        $this->db->insertData("tbl_customer", $data);
        //=======================insert data vehicle table============================================
        $cus_id = $this->db->insert_id();
        $V_num_1 = $_REQUEST['driver_1'];
        $V_num_2 = $_REQUEST['driver_2'];
        $V_num_3 = $_REQUEST['driver_3'];
        $vehicle_num = $V_num_1 . "-" . $V_num_2 . "-" . $V_num_3;
        //print_r($vehicle_num);

        if (isset($data_Array['set_sub_model'])) {

            $addVehicle = array(
                'customer_id' => $cus_id,
                'vehicle_model_id' => $data_Array['vehicle_model_0'],
                'vehicle_sub_model_id' => $data_Array['set_sub_model'],
                'vehicle_reg_no' => $vehicle_num,
                'address' => $data_Array['customer_address'],
                'contact_number' => $data_Array['customer_con_m'],
                'added_date' => date('Y-m-d'),
                'added_time' => date('H-i-s'),
                'status' => 1
            );
            //print_r($addVehicle);
            $this->db->insertData("tbl_vehicle", $addVehicle);
        } else {
            $addVehicle = array(
                'customer_id' => $cus_id,
                'vehicle_model_id' => $data_Array['vehicle_model_0'],
                //   'vehicle_sub_model_id' => $data_Array['set_sub_model'],
                'vehicle_reg_no' => $vehicle_num,
                'address' => $data_Array['customer_address'],
                'contact_number' => $data_Array['customer_con_m'],
                'added_date' => date('Y-m-d'),
                'added_time' => date('H-i-s'),
                'status' => 1
            );
            //print_r($addVehicle);
            $this->db->insertData("tbl_vehicle", $addVehicle);
        }


// =================================insert contact details==================================================================
//        $vehicle_id = $this->db->insert_id();
//        $rows = $data_Array['token_owner_no'];
//        //print_r($rows);
//        for ($x = 0; $x <= $rows; $x++) {
//
//            if (isset($data_Array['driver_name_' . $x])) {
//                $driver = array(
//                    'vehicle_id' => $vehicle_id,
//                    'driver_name' => $data_Array['driver_name_' . $x],
//                    'driverConNo' => $data_Array['driverConNo_' . $x],
//                    'driverEmail' => $data_Array['riverEmail_' . $x],
//                    'status' => 1
//                );
//                // print_r($driver);
//                $this->db->insertData("tbl_vehicle_driver_details", $driver);
//            }
//        }
//============================insert data tbl_vehicle_driver_details======================
        $vehicle_id = $this->db->insert_id();
        $rows8 = $data_Array['token_vehicle_no'];
        //  print_r($rows8);
        // owner inserting///////////////////////////////
        if (isset($data_Array['owner'])) {
            $owner = array(
                'vehicle_id' => $vehicle_id,
                'ownerConNo' => $data_Array['ownerConNo'],
                'owner' => $data_Array['owner'],
                'ownerEmail' => $data_Array['ownerEmail'],
                'status' => 1
            );
            // print_r($driver);
            $this->db->insertData("tbl_vehicle_owner", $owner);
        }
        // drivers inserting/////////////////////////////////////////////

        for ($x = 0; $x <= $rows8; $x++) {
            if (isset($data_Array['driver_name_' . $x])) {

                $driver = array(
                    'vehicle_id' => $vehicle_id,
                    'driver_name' => $data_Array['driver_name_' . $x],
                    'driverConNo' => $data_Array['driverConNo_' . $x],
                    'driverEmail' => $data_Array['driverEmail_' . $x],
                    'status' => 1
                );
                // print_r($driver);
                $this->db->insertData("tbl_vehicle_driver_details", $driver);
            }
        }


        //=================insert data business_type_hid_name===================================
        $addpurpose = array(
            'vehicle_id' => $vehicle_id,
            'vehicle_purpose_id' => $data_Array['purpus'],
            'tbl_vehicle_business_type_id' => $data_Array['business_type'],
            'status' => 1,
        );
        //print_r($addpurpose);
        $this->db->insertData("tbl_vehicle_purposes_detail", $addpurpose);

        //=================insert data tbl_vehicle_travel_area====================================

        $rows1 = $data_Array['token_arres_of_trevel'];
        //print_r($rows1);
        for ($y = 0; $y <= $rows1; $y++) {

            //if (isset($data_Array['district_name_hid_' . $x])&& ($data_Array['district_name_hid_' . $x]!=NULL)) {
            $traval_area = array(
                'vehicle_id' => $vehicle_id,
                'city_id' => $data_Array['main_town_name_hid_' . $y],
                'district_id' => $data_Array['district_name_hid_' . $y],
                'location' => $data_Array['location_name_' . $y],
                'added_date' => date('Y-m-d'),
                'added_time' => date('H-i-s'),
                'status' => 1
            );
            //print_r($traval_area);
            $this->db->insertData("tbl_vehicle_travel_area", $traval_area);
            //}
        }
        //=========================inser data tbl_vehicle_part_purchase_dealers=============================
        // other vehicles own by the customer //==========start======
        $rows1 = $data_Array['token_vehicles_of'];
        //print_r($rows1);
        for ($y = 0; $y <= $rows1; $y++) {

//            $variable[$y] = $data_Array['vehicle_1_' . $y] . '-' . $data_Array['vehicle_2_' . $y] . '-' . $data_Array['vehicle_3_' . $y];
            //if (isset($data_Array['district_name_hid_' . $x])&& ($data_Array['district_name_hid_' . $x]!=NULL)) {
            $other_vehi = array(
                'customer_id' => $cus_id,
                've1' => $data_Array['vehicle_1_' . $y] . '-' . $data_Array['vehicle_2_' . $y] . '-' . $data_Array['vehicle_3_' . $y],
//                've2' => $data_Array['vehicle_2_' . $y],
//                've3' => $data_Array['vehicle_3_' . $y],
                'status' => 1
            );
            //print_r($traval_area);
            $this->db->insertData("tbl_customer_other_vehicle", $other_vehi);
            //}
        }
        //Dealers & Garages Purchased parts================================= start===

        if (isset($data_Array['token_dealer_no_'])) {
            $rows3 = $data_Array['token_dealer_no_'];
            //print_r($rows3);
            for ($D = 0; $D <= $rows3; $D++) {
                // echo 'kkkk' . $D;
                if (isset($data_Array['dealer_select_' . $D])) {
                    $De = array(
                        'vehicle_id' => $vehicle_id,
                        'part_id' => $data_Array['dealer_select_' . $D],
                        'dealer_name' => $data_Array['dealer_name_' . $D],
                        'garage_name' => $data_Array['garage_name_' . $D],
                        'status' => 1,
                    );
                    // print_r($Dealer_Purchase);
                    $this->db->insertData("tbl_dealers_garages_Purchased_parts", $De);
                }
            }
        }
        //Dealers & Garages Purchased parts================================= end=== 
        // other vehicles own by the customer //==========end======


        $rows3m = $data_Array['token_PurchasePart'];
        //print_r($rows3);
        for ($D1 = 0; $D1 <= $rows3m; $D1++) {
            // echo 'kkkk' . $D;
            $Dealer_Purchase = array(
                'vehicle_id' => $vehicle_id,
                'type_id' => $data_Array['PurchasePart_type_id_' . $D1],
                'dealer_id' => $data_Array['selected_name_Hid_' . $D1],
                'status' => 1,
            );
            //print_r($Dealer_Purchase);
            $this->db->insertData("tbl_vehicle_part_purchase_dealers", $Dealer_Purchase);
        }
        //=========================inset data tbl_vehicle_garage_details======================================
        $rows2 = $data_Array['token_Garages_Visited'];
        //print_r($rows2);
        for ($Z = 0; $Z <= $rows2; $Z++) {
            if (isset($data_Array['garage_name_Hid_' . $Z])) {
                $garage = array(
                    'vehicle_id' => $vehicle_id,
                    'type_of_part' => $data_Array['repair_type_h_id_' . $Z],
                    'garage_id' => $data_Array['garage_name_Hid_' . $Z],
                    'status' => 1
                );
                //print_r($garage);
                $this->db->insertData("tbl_vehicle_garage_details", $garage);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    //==================================view customer details=====================================================

    public function viewAllCustmerDetails() {
        $sql = "select 
    tc.customer_name,
    tc.customer_id,
    tc.cust_address,
    tc.email_address,
    tv.vehicle_reg_no,
    tv.vehicle_id,
    tvm.vehicle_model_name,
    tvp.vehicle_purpose_name
from
    tbl_customer as tc
        inner join
    tbl_vehicle as tv ON tc.customer_id = tv.customer_id
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id
        inner join
    tbl_vehicle_purposes_detail as tvpd ON tv.vehicle_id = tvpd.vehicle_id
        inner join
    tbl_vehicle_purpose as tvp ON tvpd.vehicle_purpose_id = tvp.vehicle_purpose_id";
        return $this->db->mod_select($sql);
    }

    public function getmoredetails($pur_id) {
        $sql = "select 
    tvdd.driver_name,tvdd.driverConNo,tvdd.driverEmail,tvdd.vehicle_id,tvdd.vehicle_driver_detail_id
from
    tbl_vehicle_driver_details as tvdd where tvdd.status=1 and tvdd.vehicle_id='$pur_id'";
        return $this->db->mod_select($sql);
    }

    //get other vehicle details ===============>>>>>>>

    public function getother($pur_id) {
        $sql = "SELECT 
cov.other_vehicle_id,
 cov.customer_id, 
ve1 
 FROM
 tbl_customer_other_vehicle as cov
 WHERE 
 cov.customer_id = '$pur_id'";
        return $this->db->mod_select($sql);
    }

    //get other vehicle details ==end=============>>>>>>>

    public function traval_area_details($Vehi_id) {
        $sql = "select
    tvta.travel_area_id,
    tvta.location, 
    tc.city_name, 
    tc.city_id, 
    td.district_name, 
    td.district_id, 
    tvta.vehicle_id
from
    tbl_vehicle_travel_area as tvta
        inner join
    tbl_city as tc ON tvta.city_id = tc.city_id
        inner join
    tbl_district as td ON tvta.district_id = td.district_id
where
    tvta.status = 1 and tvta.vehicle_id ='$Vehi_id'";
        return $this->db->mod_select($sql);
    }

    public function dealer_pueches_details($Vehi_id1) {
        $sql = "select 
    (tvpd.type_id) as typ, td.delar_name,tvpd.vehicle_dealer_id,(tvpd.dealer_id) as dealer_id
from
    tbl_vehicle_part_purchase_dealers as tvpd
        inner join
    tbl_dealer as td ON tvpd.dealer_id = td.delar_id
where
    tvpd.type_id = 1 and tvpd.status=1
        and tvpd.vehicle_id ='$Vehi_id1'";
        return $this->db->mod_select($sql);
    }

    public function newshop_pueches_details($Vehi_id1) {
        $sql = "select 
    tnrs.shop_name,(tvppd.type_id) as typ,tvppd.vehicle_dealer_id,(tvppd.dealer_id)as dealer_id
from
    tbl_vehicle_part_purchase_dealers as tvppd
        inner join
    tbl_non_reg_shops as tnrs ON tvppd.dealer_id = tnrs.shop_id
where
    tvppd.status = 1 and tvppd.type_id = 2
        and tvppd.vehicle_id ='$Vehi_id1'";
        return $this->db->mod_select($sql);
    }

    public function garagest_details($Vehi_id3) {
        $sql = "select 
    tvgd.type_of_part, 
    tg.garage_name, 
    tvrt.repair_type_name, 
    tvrt.repair_type_id, 
    tg.garage_id,
    tvgd.vehicle_id,
    tvgd.vehicle_garage_detail_id
from
    tbl_vehicle_garage_details as tvgd
        inner join
    tbl_garage as tg ON tvgd.garage_id = tg.garage_id
        inner join
    tbl_vehicle_repair_type as tvrt ON tvgd.type_of_part = tvrt.repair_type_id
where
    tvgd.status = 1 and tvgd.vehicle_id ='$Vehi_id3'";
        return $this->db->mod_select($sql);
    }

    //==============customer update=======================================================================
    public function update_customerDetailc($cus_id) {
        $sql = "select 
       tc.customer_name,
    tc.cust_address,
    tc.email_address,
    tcy.customer_type_name,
    tc.customer_type,
    tc.cust_contact_no_m,
    tc.cust_contact_no_t,
    tc.cust_contact_no_w
from
    tbl_customer as tc
        inner join
    tbl_customer_type as tcy ON tc.customer_type = tcy.customer_type_id
where
    tc.status = 1 and tc.customer_id ='$cus_id'";
        //echo $sql;
        return $this->db->mod_select($sql);
    }

// contact owner and  driver details // start =======================================
    //==============customer update=======================================================================
    public function update_Contacts($cus_id) {
        $sql = "select
v.owner,
v.ownerConNo,
v.ownerEmail,
v.vehicle_id,
v.owner_id
from
tbl_vehicle_owner as v
inner join
tbl_customer as c on v.vehicle_id= c.customer_id
where
v.status = 1 and c.customer_id ='$cus_id'";
        //echo $sql;
        return $this->db->mod_select($sql);
    }

    // contact owner and  driver details // end =======================================

    public function update_vehicle_details($vehi_id) {
        $sql = "select 
    tvm.vehicle_model_name,
    tv.vehicle_reg_no,
    tv.vehicle_model_id,
    tvsm.vehicle_sub_model_name
from
    tbl_vehicle as tv
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id
        inner join
    tbl_vehicle_sub_model as tvsm ON tvm.vehicle_model_id = tvsm.vehicle_model_id
where
    tv.status = 1 and tv.vehicle_id ='$vehi_id'";
        return $this->db->mod_select($sql);
    }

    public function update_customer($data) {
        //print_r($data);
        $where = array(
            'customer_id' => $data['cus_id']
        );
        print_r($where);
        $setdata = array(
            'customer_name' => $data['cus_name'],
            'cust_address' => $data['cus_address'],
            'cust_contact_no_t' => $data['cus_con_no_t'],
            'cust_contact_no_m' => $data['cus_con_no_m'],
            'cust_contact_no_w' => $data['cus_con_no_w'],
            'email_address' => $data['email_add'],
            'customer_type' => $data['cus_type']
        );
        print_r($setdata);
        $cus_id = $this->db->insert_id();
        $where1 = array(
            'customer_id' => $data['cus_id']
        );
        print_r($where1);
        $updateVehicle = array(
            'address' => $data['cus_address'],
            'contact_number' => $data['cus_con_no_m'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H-i-s'),
            'status' => 1
        );
        print_r($updateVehicle);
        $this->db->__beginTransaction();
        $this->db->update("tbl_customer", $setdata, $where);
        $this->db->update("tbl_vehicle", $updateVehicle, $where1);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    // other vehicles of customer ==========start==================>>>>>>>  
    public function update_other_vehicles($data) {
        //print_r($data);

        print_r($where);
        $rows = $dataArray['token_arres_of_trevel'];

        for ($i = 0; $i < $rows; $i++) {
            $setdata = array(
                've1' => $data['ve' . $i],
                'status' => 1,
            );

            $where = array(
                'other_vehicle_id' => $data['cus_id'. $i]
            );
            print_r($updateVehicle);
            $this->db->__beginTransaction();
            $this->db->update("tbl_customer_other_vehicle", $setdata, $where);
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    // other vehicles of customer ==========end==================>>>>>>>  
// update ownercontacts ==================================>>>>>
    public function update_owner_contacts($data) {
        //print_r($data);
        $where = array(
            'owner_id' => $data['vehi_id']
        );
        print_r($where);
        $setdata = array(
            'owner' => $data['owner'],
            'ownerConNo' => $data['owner_con'],
            'ownerEmail' => $data['email'],
            'status' => 1
        );
        print_r($setdata);

        print_r($updateVehicle);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle_owner", $setdata, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    // update ownercontacts ==================end================>>>>>



    public function update_vehicle($dataArray) {
        //print_r($dataArray);
        $where = array(
            'vehicle_id' => $dataArray['vehi_id']
        );
        print_r($where);
        $updateVehicle = array(
            'vehicle_reg_no' => $dataArray['vehi_no'],
            'vehicle_model_id' => $dataArray['vehicle_model'],
            'vehicle_sub_model_id' => $dataArray['set_sub_model'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H-i-s'),
            'status' => 1
        );
        print_r($updateVehicle);
        $this->db->__beginTransaction();
        $this->db->update("tbl_vehicle", $updateVehicle, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function update_driver_details($dataArray) {
        $this->db->__beginTransaction();
        print_r($dataArray);

        $rows = $dataArray['token_Drivers_no'];

        for ($x = 0; $x <= $rows; $x++) {
            $where = array(
                'vehicle_id' => $dataArray['vehi_id'],
                'vehicle_driver_detail_id' => $dataArray['driver_id_hid_' . $x]
            );
            print_r($where);

            if (isset($dataArray['driver_name_' . $x])) {
                $driver = array(
                    'driver_name' => $dataArray['driver_name_' . $x],
                    'status' => 1
                );
                //print_r($driver);

                $this->db->update("tbl_vehicle_driver_details", $driver, $where);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function update_driver_details_new($dataArray) {
        $this->db->__beginTransaction();

        $rows = $dataArray['token_Drivers_no'];

        for ($x = 0; $x <= $rows; $x++) {
            if (isset($dataArray['driver_name_new_' . $x])) {
                $driver_new = array(
                    'vehicle_id' => $dataArray['vehi_id'],
                    'driver_name' => $dataArray['driver_name_new_' . $x],
                    'status' => 1
                );
                $this->db->insert("tbl_vehicle_driver_details", $driver_new);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function area_update($dataArray) {
        print_r($dataArray);

        $this->db->__beginTransaction();
        //print_r($dataArray);


        $rows = $dataArray['token_arres_of_trevel'];

        print_r($rows);

        for ($x = 0; $x <= $rows; $x++) {
            $where = array(
                'vehicle_id' => $dataArray['vehi_id'],
                'travel_area_id' => $dataArray['arres_of_treve_' . $x]
            );

            if (isset($dataArray['district_id_' . $x])) {

                $area_travel = array(
                    'city_id' => $dataArray['main_town_id_hid_' . $x],
                    'district_id' => $dataArray['district_id_hid_' . $x],
                    'location' => $dataArray['location_id_' . $x],
                    'status' => 1
                );
                //print_r($area_travel);
                $this->db->update("tbl_vehicle_travel_area", $area_travel, $where);
            }
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function area_new_update($dataArray, $id) {
        print_r($id);
        $this->db->__beginTransaction();
        $rows = $dataArray['token_arres_of_trevel'];

        print_r($rows);

        for ($x = 0; $x <= $rows; $x++) {
            if (isset($dataArray['main_town_name_hid_new' . $x])) {
                $new_insert = array(
                    'city_id' => $dataArray['main_town_name_hid_new' . $x],
                    'district_id' => $dataArray['district_name_hid_new' . $x],
                    'location' => $dataArray['location_name_new' . $x],
                    'status' => 1,
                    'vehicle_id' => $dataArray['vehi_id']
                );
                print_r($new_insert);
                $this->db->insert("tbl_vehicle_travel_area", $new_insert);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function garage_update($dataArray) {
        // print_r($_REQUEST);
        $this->db->__beginTransaction();
        //print_r($dataArray);

        $rows = $dataArray['token_Garages_Visit'];
        //  print_r($where);
        for ($x = 0; $x <= $rows; $x++) {
            $where = array(
                'vehicle_id' => $dataArray['vehic_id'],
                'vehicle_garage_detail_id' => $dataArray['vehi_garage_id_' . $x]
            );


            if (isset($dataArray['garage_name_' . $x])) {
                $purches = array(
                    'type_of_part' => $dataArray['repar_type_' . $x],
                    'garage_id' => $dataArray['garage_id_' . $x],
                    'status' => 1
                );
                print_r($purches);

                $this->db->update("tbl_vehicle_garage_details", $purches, $where);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function garage_update_new($dataArray) {

        $this->db->__beginTransaction();
        $rows = $dataArray['token_Garages_Visit'];

        for ($x = 0; $x <= $rows; $x++) {
            if (isset($dataArray['garage_name_id_new' . $x])) {
                $new_insert_garage = array(
                    'type_of_part' => $dataArray['repar_type_new_' . $x],
                    'garage_id' => $dataArray['garage_name_Hid_new' . $x],
                    'vehicle_id' => $dataArray['vehic_id'],
                    'status' => 1
                );
                print_r($new_insert_garage);
                $this->db->insert("tbl_vehicle_garage_details", $new_insert_garage);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function update_purches_details($dataArray) {
        //print_r($dataArray);
        $this->db->__beginTransaction();


        $rows = $dataArray['token_PurchasePart'];
        //  
        for ($x = 0; $x <= $rows; $x++) {
            $where = array(
                'vehicle_id' => $dataArray['vehic_id'],
                'vehicle_dealer_id' => $dataArray['set_id_' . $x]
            );
            print_r($where);

            if (isset($dataArray['PurchasePart_type_' . $x])) {
                $purches = array(
                    'type_id' => $dataArray['PurchasePart_type_' . $x],
                    'dealer_id' => $dataArray['selected_name_Hid_' . $x],
                    'status' => 1
                );
                print_r($purches);

                $this->db->update("tbl_vehicle_part_purchase_dealers", $purches, $where);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function update_purches_details_new($dataArray) {
        //print_r($dataArray);
        $this->db->__beginTransaction();
        $rows = $dataArray['token_PurchasePart'];

        for ($x = 0; $x <= $rows; $x++) {
            if (isset($dataArray['selected_name_Hid_new' . $x])) {
                $new_purches_insert = array(
                    'type_id' => $dataArray['PurchasePart_type_new' . $x],
                    'dealer_id' => $dataArray['selected_name_Hid_new' . $x],
                    'vehicle_id' => $dataArray['vehic_id'],
                    'status' => 1
                );
                print_r($new_purches_insert);
                $this->db->insert("tbl_vehicle_part_purchase_dealers", $new_purches_insert);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function delete_tavel_area($id) {
        $details = array("status" => '0');
        $where = array(
            "travel_area_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_vehicle_travel_area', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function delete_driver($id) {
        $details = array("status" => '0');
        $where = array(
            "vehicle_driver_detail_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_vehicle_driver_details', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function delete_garage_detail($id) {
        $details = array("status" => '0');
        $where = array(
            "vehicle_garage_detail_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_vehicle_garage_details', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function delete_Dealer_purches($id) {
        $details = array("status" => '0');
        $where = array(
            "vehicle_dealer_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update('tbl_vehicle_part_purchase_dealers', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    //==========================search_vehicle======================================================
    public function search_vehicle_reg_no() {
        if (isset($_REQUEST['search_vehicle_reg_no'])) {
            $vehicle_reg_no = $_REQUEST['search_vehicle_reg_no'];
            //print_r($vehicle_reg_no);
            $sql = "select 
    tc.customer_name,
    tv.vehicle_reg_no,
    tc.customer_id,
    tv.address,
    tv.contact_number
from
    tbl_customer as tc
        inner join
    tbl_vehicle as tv ON tc.customer_id = tv.customer_id
where
    tv.status = 1
        and tv.vehicle_reg_no = '$vehicle_reg_no'";

            return $this->db->mod_select($sql);
        }//print_r($sql);
    }

    //=================================add-new-vehicle=============================================================
    public function add_new_vehicle($data_Array) {
        //$data_Array = ($_REQUEST);
        //print_r($data_Array);
        //$array = array();
        $this->db->__beginTransaction();
        //if (isset($data_Array['token_add_vehocle'])) {
        // $rows = $data_Array['token_add_vehocle'];
        // for ($x = 0; $x <= $rows; $x++) {
        //if (isset($data_Array['vehicle_model'])) {
        $V_num_1 = $data_Array['A_vehicle_number'];
        $V_num_2 = $data_Array['B_vehicle_number'];
        $V_num_3 = $data_Array['C_vehicle_number'];
        $vehicle_num = $V_num_1 . "-" . $V_num_2 . "-" . $V_num_3;
        //print_r($vehicle_num);
        $addnewVehi = array(
            'customer_id' => $data_Array['customer_id'],
            'vehicle_model_id' => $data_Array['vehicle_model_0'],
            //'vehicle_reg_no' => $vehicle_num.$x,
            'vehicle_reg_no' => $vehicle_num,
            'address' => $data_Array['address'],
            'contact_number' => $data_Array['comtact'],
            'added_date' => date('Y-m-d'),
            'added_time' => date('H-i-s'),
            'status' => 1
        );
        print_r($addnewVehi);
        $this->db->insertData("tbl_vehicle", $addnewVehi);
        // print_r($addnewVehi);
        //}
        $vehicle_id = $this->db->insert_id();
        //array_push($array, $vehicle_id);
        //}
        //$vehicle_id = $this->db->insert_id();

        print_r($vehicle_id);

        //}
        //============================insert data tbl_vehicle_driver_details======================
        // if (isset($data_Array['token_add_vehocle'])) {
        //$row_num = $data_Array['token_add_vehocle'];
        //for ($H = 0; $H <= $row_num; $H++) {
        //$vehicle = $array.$H;
        //$vehicle = $array[$H];

        if (isset($data_Array['token_vehicle_no'])) {
            $rows1 = $data_Array['token_vehicle_no'];
            //print_r($rows);
            for ($x = 0; $x <= $rows1; $x++) {

                if (isset($data_Array['driver_name_' . $x])) {
                    $driver = array(
                        'vehicle_id' => $vehicle_id,
                        'driver_name' => $data_Array['driver_name_' . $x],
                        'status' => 1
                    );
                    print_r($driver);
                    $this->db->insertData("tbl_vehicle_driver_details", $driver);
                }
            }
        }
        //=================insert data business_type_hid_name===================================
        if (isset($data_Array['purpus'])) {
            $addpurpose = array(
                'vehicle_id' => $vehicle_id,
                'vehicle_purpose_id' => $data_Array['purpus'],
                'tbl_vehicle_business_type_id' => $data_Array['business_type'],
                'status' => 1,
            );
            print_r($addpurpose);
            $this->db->insertData("tbl_vehicle_purposes_detail", $addpurpose);
        }
        //=================insert data tbl_vehicle_travel_area====================================
        if (isset($data_Array['token_arres_of_trevel'])) {
            $rows2 = $data_Array['token_arres_of_trevel'];
            // print_r($rows1);
            for ($y = 0; $y <= $rows2; $y++) {

                if (isset($data_Array['main_town_name_hid_' . $y])) {
                    $traval_area = array(
                        'vehicle_id' => $vehicle_id,
                        'city_id' => $data_Array['main_town_name_hid_' . $y],
                        'district_id' => $data_Array['district_name_hid_' . $y],
                        'location' => $data_Array['location_name_' . $y],
                        'added_date' => date('Y-m-d'),
                        'added_time' => date('H-i-s'),
                        'status' => 1
                    );
                    // print_r($traval_area);
                    $this->db->insertData("tbl_vehicle_travel_area", $traval_area);
                }
            }
        }

        //=========================inser data tbl_vehicle_part_purchase_dealers=============================
        if (isset($data_Array['token_PurchasePart'])) {
            $rows3 = $data_Array['token_PurchasePart'];
            //print_r($rows3);
            for ($D = 0; $D <= $rows3; $D++) {
                // echo 'kkkk' . $D;
                if (isset($data_Array['PurchasePart_type_id_' . $D])) {
                    $Dealer_Purchase = array(
                        'vehicle_id' => $vehicle_id,
                        'type_id' => $data_Array['PurchasePart_type_id_' . $D],
                        'dealer_id' => $data_Array['selected_name_Hid_' . $D],
                        'status' => 1,
                    );
                    //     print_r($Dealer_Purchase);
                    $this->db->insertData("tbl_vehicle_part_purchase_dealers", $Dealer_Purchase);
                }
            }
        }
        //=========================inset data tbl_vehicle_garage_details======================================
        if (isset($data_Array['token_Garages_Visited'])) {
            $rows4 = $data_Array['token_Garages_Visited'];
            //print_r($rows4);
            for ($Z = 0; $Z <= $rows4; $Z++) {
                if (isset($data_Array['garage_name_Hid_' . $Z])) {
                    $garage = array(
                        'vehicle_id' => $vehicle_id,
                        'type_of_part' => $data_Array['repair_type_h_id_' . $Z],
                        'garage_id' => $data_Array['garage_name_Hid_' . $Z],
                        'status' => 1
                    );
                    //     print_r($garage);
                    $this->db->insertData("tbl_vehicle_garage_details", $garage);
                }
            }
        }
        //}
        // }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function get_vehicle_number($id, $select) {
        $sql = "select 
    tv.vehicle_reg_no, tv.vehicle_id
from
    tbl_vehicle as tv
where
    tv.status = 1 and tv.vehicle_reg_no like '$id%'";
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

?>
