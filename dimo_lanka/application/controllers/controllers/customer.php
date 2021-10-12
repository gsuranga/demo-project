<?php

class customer extends C_Controller {

    private $resours = array(
        'JS' => array('customer/js/customer'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function indexCustomerRegisration() {
        $this->template->attach($this->resours);
        $this->template->draw('customer/index_customer_registration', true);
    }

    public function drawCustomerRegisration() {
        $this->load->model('customer/customer_model');
        $viewAll = $this->customer_model->viewvehicle_model();

        $this->template->draw('customer/registred_customer', false, $viewAll);
    }

    public function get_all_garage_type() {
        $this->load->model('customer/customer_model');
        echo json_encode($this->customer_model->get_all_garage_type());
    }

    public function create_customer() {
        print_r($_REQUEST);
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_con_m', 'Customer Contact', 'required');
        $this->form_validation->set_rules('district_name_0', 'District Name', 'required');
        $this->form_validation->set_rules('main_town_name_0', 'City Name', 'required');
        $this->form_validation->set_rules('location_name_0', 'Location', 'required');
        $this->form_validation->set_rules('selected_name_0', 'Dealer Or Shop Name', 'required');
        $this->form_validation->set_rules('garage_name_0', 'Garage Name', 'required');
     //   $this->form_validation->set_rules('selected_name_0', 'Dealer Or Shop Name', 'required');
     //   $this->form_validation->set_rules('garage_name_0', 'Garage Name', 'required');
        $this->form_validation->set_rules('driver_1', 'Provincial Code', 'required');
        $this->form_validation->set_rules('driver_name_0', 'Driver Name', 'required');

        $this->form_validation->set_rules('driverConNo_0', 'Driver Contact No', 'required');
        $this->form_validation->set_rules('driverEmail_0', 'Driver Email', 'required');
        $this->form_validation->set_rules('owner', 'Owner Name', 'required');
        $this->form_validation->set_rules('ownerConNo', 'Owner Contact No', 'required');
        $this->form_validation->set_rules('ownerEmail', 'Owner Email', 'required');
        $this->form_validation->set_rules('driver_2', 'Vehicle Number', 'required');
        $this->form_validation->set_rules('driver_3', 'Vehicle Number', 'required');

        if ($this->form_validation->run()) {
            //  print_r($_REQUEST);
            $this->load->model('customer/customer_model');
            $this->customer_model->create_new_customer($_POST);


            redirect('customer/veiw_customerDetails');
        }

        //  redirect('customer/indexCustomerRegisration');
//        } else {
//
        $this->indexCustomerRegisration();
        //   }
    }

    public function drawVehicleModelLoad() {
        $this->load->model('customer/customer_model');
        $viewAll = $this->customer_model->viewvehicle_model();
        $this->template->draw('customer/load_vehicle_models', FALSE, $viewAll);
    }

    public function drawVehicleSub_ModelLoad() {

        $brID = $this->input->get('type');
        // echo $brID.'///////////////////';
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('vehicle_sub_model_name', 'vehicle_sub_model_id');
        $result = $this->customer_model->get_vehicle_sub_model($q, $column, $brID);

        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function customerTypeLoad() {
        $this->load->model('customer/customer_model');
        $viewcustomerType = $this->customer_model->viewcustomerType();
        $this->template->draw('customer/load_customer_type', FALSE, $viewcustomerType);
    }

    public function lode_business_Type() {
        $this->load->model('customer/customer_model');
        $viewcustomerType = $this->customer_model->load_business_types();
        $this->template->draw('customer/load_business_type', FALSE, $viewcustomerType);
    }

    public function load_repay_type() {
        $this->load->model('customer/customer_model');
        $viewrepayType = $this->customer_model->load_repay_type();
        $this->template->draw('customer/load_repay_type', FALSE, $viewrepayType);
    }

    public function load_part_type() {
        $this->load->model('customer/customer_model');
        $viewpartType = $this->customer_model->load_part_type();
        $this->template->draw('customer/load_part_type', FALSE, $viewpartType);
    }

    public function drawpurpose() {
        $this->load->model('customer/customer_model');
        $viewpurpus = $this->customer_model->viewpurpose();
        //print_r($viewpurpus);
        $this->template->draw('customer/load_purpus', FALSE, $viewpurpus);
    }

    public function get_district() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('district_name', 'district_id');
        $result = $this->customer_model->get_district($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_city() {

        $brID = $this->input->get('hidenbrid');
        // echo $brID.'///////////////////';
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('city_name', 'city_id');
        $result = $this->customer_model->get_city($q, $column, $brID);

        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    // owner select ==============================start==========
    public function get_owner() {

        //  $brID = $this->input->get('hidenbrid');
        // echo $brID.'///////////////////';
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('owner', 'owner_id', 'ownerConNo', 'ownerEmail');
        $result = $this->customer_model->get_owner($q, $column);

        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    // owner select ============================end============


    public function get_repaerTypes() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('repair_type_name', 'repair_type_id');
        $result = $this->customer_model->get_repearType($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_gatages() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('garage_name', 'garage_id');
        $result = $this->customer_model->get_garage($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    // get dealers ============================ harshan ======
    public function get_dealers() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->customer_model->get_dealer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//================ get dealers =================== end ====
    public function get_bus_type() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('business_type_name', 'business_type_id');
        $result = $this->customer_model->get_bus_type($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_dealer_Purchase_parts() {
        $setID = $this->input->get('type');
        //echo 'www'.$setID.'asa';
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('pname', 'pid');
        $result = $this->customer_model->get_dealer_Purchase_details($q, $column, $setID);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

// customer other vehicles ======================================start===========================================>>>>>>>
    public function get_OtherVehicle() {
        $setID = $this->input->get('type');
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('customer_name', 'vehicle_reg_no', 'customer_id');
        $result = $this->customer_model->get_OtherVehicle($q, $column, $setID);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

// // customer other vehicles ======================================end===========================================>>>>>>>
//==================veiw customer Details==================================================================

    public function veiw_customerDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('customer/view_customer_details_index', true);
    }

    public function draw_customerDetails() {
        $this->load->model('customer/customer_model');
        $viewAllcustomer = $this->customer_model->viewAllCustmerDetails();
        $this->template->draw('customer/view_customer_details', false, $viewAllcustomer);
    }

    public function getmoredetails() {
        $pur_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->getmoredetails($pur_id);
        //print_r($detail);
        echo json_encode($detail);
    }

//
    public function getother() {
        $pur_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->getother($pur_id);
        //print_r($detail);
        echo json_encode($detail);
    }

    //get other 
    public function get_travel_details() {
        $Vehi_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->traval_area_details($Vehi_id);
        //print_r($detail);
        echo json_encode($detail);
    }

    //Dealers_Garages_Purchased_parts ====== start ========= harshan =========>>>>>>>>>>>>

    public function get_Dealers_View() {
        $Vehi_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->Dealers_Garages_Purchased_model($Vehi_id);
        //print_r($detail);
        echo json_encode($detail);
    }

    //Dealers_Garages_Purchased_parts ====== start ========= end =========>>>>>>>>>>>>
    public function part_type() {
        //  $Vehi_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->part_type();
        //print_r($detail);
        echo json_encode($detail);
    }

    //Dealers_Garages_Purchased_parts ====== start ========= start =======>>>>>>>>>>>>
//    public function get_dealer_pueches_details() {
//
//        $Vehi_id1 = $_REQUEST['dealerid'];
//        $this->load->model('customer/customer_model');
//        $detail_1 = $this->customer_model->dealer_pueches_details($Vehi_id1);
//        $detail_2 = $this->customer_model->newshop_pueches_details($Vehi_id1);
////        print_r($detail_1);
////        print_r($detail_2);
//        $get_details = array();
//        array_push($get_details, $detail_1, $detail_2);
//        echo json_encode($get_details);
//    }


    public function get_dealer() {
        $Vehi_id1 = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail_1 = $this->customer_model->dealer_pueches_details($Vehi_id1);
        echo json_encode($detail_1);
    }

    public function get_new_shop() {
        $Vehi_id1 = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail_2 = $this->customer_model->newshop_pueches_details($Vehi_id1);
        echo json_encode($detail_2);
    }

        public function get_dealer_new_shop() {
        $Vehi_id1 = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail_2 = $this->customer_model->get_dealer_new_shop($Vehi_id1);
        echo json_encode($detail_2);
    }
    public function get_garages_detalis() {
        $Vehi_id3 = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->garagest_details($Vehi_id3);
        echo json_encode($detail);
    }

    public function get_customer_detalis() {
        $cus_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->update_customerDetailc($cus_id);
        echo json_encode($detail);
    }

    // owner contact show start ==========start===========
    public function get_contact_detalis() {
        $cus_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->update_Contacts($cus_id);
        echo json_encode($detail);
    }

    // owner contact show start ==============end=======

    public function get_vehicle_detalis() {
        $vehi_id = $_REQUEST['dealerid'];
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->update_vehicle_details($vehi_id);
        echo json_encode($detail);
    }

    //=================update Customer Details=====================================================   


    public function update_customer() {
        //$cus_id = $_REQUEST['cus_address'];
        $this->load->model('customer/customer_model');
        $this->customer_model->update_customer($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

// update other vehicles  =====================start===================>>>>....................................................................
    public function update_other_vehilces() {
        //$cus_id = $_REQUEST['cus_address'];
        $this->load->model('customer/customer_model');
        $this->customer_model->update_other_vehicles($_REQUEST);
        $this->customer_model->update_other_vehicles_new($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

// update other vehicles  =====================end===================>>>>
    public function updatecustomerType() {
        $this->load->model('customer/customer_model');
        $detail = $this->customer_model->viewcustomerType();
        echo json_encode($detail);
    }

// update contact owner================ harshan=========>>>>

    public function update_Contact_Details() {
        //$cus_id = $_REQUEST['cus_address'];
        $this->load->model('customer/customer_model');
        $this->customer_model->update_owner_contacts($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

    // update contact owner================ harshan=========>>>>

    public function load_repay_type_js() {
        $this->load->model('customer/customer_model');
        $viewrepayType = $this->customer_model->load_repay_type();
        echo json_encode($viewrepayType);
    }

    public function updatewVehicleModel() {
        $this->load->model('customer/customer_model');
        $viewAll = $this->customer_model->viewvehicle_model();
        echo json_encode($viewAll);
    }

// vehicle update  =========== start ================= harshan======================>>>>>>>>>>

    public function update_vehicle() {
        $this->load->model('customer/customer_model');
        $this->customer_model->update_vehicle($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

// vehicle update  =========== end ================= harshan======================>>>>>>>>>>
    // update dealers and parts==========  harshan ===start======>>>>>>

    public function update_Dealers_Garages_Purchased() {
        $this->load->model('customer/customer_model');
        $this->customer_model->update_Dealers_Garages_Purchased($_REQUEST);
        $this->customer_model->update_Dealers_Garages_Purchased_new($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

    // update dealers and parts==========  harshan ===end=======>>>>>>
    public function load_repar_detalis() {
        $this->load->model('customer/customer_model');
        $repart_detail = $this->customer_model->load_garage_details();
        echo json_encode($repart_detail);
    }

    public function VehicleModelLoad() {
        $this->load->model('customer/customer_model');
        $viewAll = $this->customer_model->viewvehicle_model();
        echo json_encode($viewAll);
    }

    public function update_garage_details() {
        $this->load->model('customer/customer_model');
        $this->customer_model->garage_update($_REQUEST);
        $this->customer_model->garage_update_new($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

    public function update_area_details() {
        $id = $_REQUEST['vehi_id'];
        $this->load->model('customer/customer_model');
        $this->customer_model->area_update($_REQUEST);
        $this->customer_model->area_new_update($_REQUEST, $id);
        redirect('customer/veiw_customerDetails');
    }

    public function update_driver_datails() {
        //print_r($_REQUEST);
        $this->load->model('customer/customer_model');
        $this->customer_model->update_driver_details($_REQUEST);
        $this->customer_model->update_driver_details_new($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

    public function update_purche_details() {
        //$id_1=$_REQUEST('set_id_1');
        $this->load->model('customer/customer_model');
        $this->customer_model->update_purches_details($_REQUEST);
        $this->customer_model->update_purches_details_new($_REQUEST);
        redirect('customer/veiw_customerDetails');
    }

    public function delete_area_tavel() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_tavel_area($id);
        redirect('customer/veiw_customerDetails');
    }

// uopdate garage and dealers delete =======start=============== harshan============>>>>>>>>>>>>>>>>>>>>>
    public function delete_garage_dealers() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_garage_dealers($id);
        redirect('customer/veiw_customerDetails');
    }

// uopdate garage and dealers delete =======end=============== harshan============>>>>>>>>>>>>>>>>>>>>>

    public function delete_driver_details() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_driver($id);
        redirect('customer/veiw_customerDetails');
    }

// delete vehicels  ===================== harshan=======>>>>>>
    public function delete_Vehicle() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_vehicle($id);
        redirect('customer/veiw_customerDetails');
    }

    //end delete vehicles//

    public function delete_garage_details() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_garage_detail($id);
        redirect('customer/veiw_customerDetails');
    }

    public function delete_Dealer_purches() {
        $this->load->model('customer/customer_model');
        $id = $this->input->get('id');
        $this->customer_model->delete_Dealer_purches($id);
        redirect('customer/veiw_customerDetails');
    }

    //=========================================Admin-veiw===============================================

    public function veiw_customer_admin_view() {
        $this->template->attach($this->resours);
        $this->template->draw('customer/index_admi_veiw', true);
    }

    public function draw_customer_admin_view() {
        $this->load->model('customer/customer_model');
        $viewAllcustomer = $this->customer_model->viewAllCustmerDetails();
        $this->template->draw('customer/admin_veiw', false, $viewAllcustomer);
    }

    //=====================================search--vehicle==============================================
    public function search_vehicle_index() {
        $this->template->attach($this->resours);
        $this->template->draw('customer/search_vehicle_index', true);
    }

    public function draw_search_vehicle() {
        //print_r($_REQUEST);
        $this->load->model('customer/customer_model');
        $details = $this->customer_model->search_vehicle_reg_no();
        //print_r($details);
        $this->template->draw('customer/serch_vehicle', false, $details);
        //redirect('customer/search_vehicle_index');
    }

    public function add_new_vehicle_index() {
        $this->template->attach($this->resours);
        $this->template->draw('customer/add_new_vehicle_index', true);
        //redirect('customer/veiw_customerDetails');
    }

    public function draw_add_new_vehicle() {
        //print_r($_REQUEST);
        $this->load->model('customer/customer_model');
        $viewAll = $this->customer_model->viewvehicle_model();
        //$viewAl = $this->customer_model->get_sub_model();
        $this->template->draw('customer/add_new_vehicle', false, $viewAll);
    }

    public function drawVehicleModelLoad_test() {
        $ID = $this->input->get('id');
        $this->load->model('customer/customer_model');
        $sub_model = $this->customer_model->get_sub_model($ID);
        //print_r($sub_model);
        echo json_encode($sub_model);
        //$this->template->draw('customer/add_new_vehicle', FALSE, $viewAll);
    }

    public function add_new_vehicle() {
        //$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        //$this->form_validation->set_rules('customer_con', 'Customer Contact', 'required');
        $this->form_validation->set_rules('district_name_0', 'District Name', 'required');
        $this->form_validation->set_rules('main_town_name_0', 'City Name', 'required');
        $this->form_validation->set_rules('location_name_0', 'Location', 'required');
        $this->form_validation->set_rules('driver_name_0', 'Driver Name', 'required');
        $this->form_validation->set_rules('selected_name_0', 'Dealer Or Shop Name', 'required');
        $this->form_validation->set_rules('garage_name_0', 'Garage Name', 'required');
        $this->form_validation->set_rules('A_vehicle_number', 'Provincial Code', 'required');
        $this->form_validation->set_rules('B_vehicle_number', 'Vehicle Number', 'required');
        $this->form_validation->set_rules('C_vehicle_number', 'Vehicle Number', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('customer/customer_model');
            $this->customer_model->add_new_vehicle($_POST);
            redirect('customer/veiw_customerDetails');
        }
        $this->add_new_vehicle_index();
    }

    public function get_vehicle_number() {
        $q = strtolower($_GET['term']);
        $this->load->model('customer/customer_model');
        $column = array('vehicle_reg_no', 'vehicle_id');
        $result = $this->customer_model->get_vehicle_number($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//=======================================add vehicle===================================================
    /* Customer Web View */

    public function drawIndexAddCustomer() {
        if ($_REQUEST['username'] != null && $_REQUEST['password'] != null) {
            $user_name = $_REQUEST['username'];
            $pass_word = $_REQUEST['password'];
            $this->load->library('encrypt');
            $this->load->model("android_service/android_service_model");
            $userDetails = $this->android_service_model->getUserDetails($user_name);
            $flag = FALSE;
            $json_inputs = array();
            $json_inputs['result'] = 0;
            if ($userDetails == NULL) {
                $json_inputs['data'] = "Username is not available";
                $json_inputs['result'] = -1;
            } else {
                $json_inputs['result'] = 1;
                $flag = TRUE;
            }
            if ($flag) {
                $password = $this->android_service_model->getPassword($user_name);
                $hashed_password = '';
                foreach ($password as $passwords) {
                    $hashed_password = $passwords->password;
                }
                $decode = $this->encrypt->decode($hashed_password);
                if ($decode != $pass_word) {
                    $json_inputs['data'] = "Password is wrong";
                    $json_inputs['result'] = 0;
                } else {
                    $json_inputs['result'] = 1;
                    $json_inputs['data'] = $userDetails;
                    $json_inputs['password'] = $pass_word;
                    foreach ($userDetails as $value) {
                        $user_detail = array(
                            'id' => $value->id,
                            'username' => $value->username,
                            'name' => $value->name,
                            'typename' => $value->typename,
                            'typeid' => $value->typeid,
                            'employe_id' => $value->employee_id,
                            'logged_in' => TRUE,
                        );

                        $this->session->set_userdata($user_detail);
                        $this->session->userdata('validated');
                    }
                    $this->template->attach($this->resours);
//$this->load->model('somonthlytarget/s_o_monthly_target_model');
                    $this->template->draw('customer/index_customer_registration', true);
                }
            }
        }
    }

    public function drawAddCustomer() {
        $this->template->draw('customer/registred_customer', false);
    }

    /* Customer Web View */
}

?>