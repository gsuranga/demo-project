<?php

/*
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */

//http://localhost/dimo_lanka/service/getPassword?username=dinesh&password=123
//http://gateway.ceylonlinux.com/TATA2/service/getPassword?username=sri&password=123

class android_service extends C_Controller {

    private $resours = array(
        'JS' => array('reports/androidReport/js/android'),
        'CSS' => array()
    );

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        date_default_timezone_set('Asia/Colombo');
        $this->load->model("android_service/android_service_model");
    }

    public function save_json_file($name, $id) {
        if (!is_dir('./web_service_jsons/' . $name . '/')) {
            mkdir('./web_service_jsons/' . $name . '/', 0777, TRUE);
        }
        $fopen = fopen('./web_service_jsons/' . $name . '/' . $id . '-' . date('Y-m-d-H-i-s') . '.json', "w+");
        fwrite($fopen, json_encode($_REQUEST));
    }

    public function item() {
        $time_stamp = $_REQUEST['timestamp'];
        $officer_id = $_REQUEST['rep_id'];
        $this->load->library('encrypt');
        $item_dt = $this->android_service_model->item_details($time_stamp, $officer_id);
        $json_encode['time_stamp'] = date('Y-m-d G:i:s');
        $json_encode['data'] = $item_dt;
        echo str_replace("'", "`", json_encode($json_encode));
    }

    public function dealer() {
        $time_stamp = $_REQUEST['timestamp'];
        $sales_officer_id = $_REQUEST['officer_id'];
        $this->load->library('encrypt');
        $item_dt = $this->android_service_model->dealer_details($time_stamp, $sales_officer_id);
        for ($index = 0; $index < count($item_dt); $index++) {
            $return_val = $this->encrypt->decode($item_dt[$index]->password);
            if ($return_val == false) {
                $item_dt[$index]->password = "";
            } else {
                $item_dt[$index]->password = $return_val;
            }
        }
        $json_encode['data'] = $item_dt;
        echo json_encode($json_encode);
    }

    public function getPassword() {
        if ($_REQUEST['username'] != null && $_REQUEST['password'] != null) {
            $user_name = $_REQUEST['username'];
            $pass_word = $_REQUEST['password'];
            $this->load->library('encrypt');
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
                }
            }
            echo json_encode($json_inputs);
        } else {
            $json_encode['result'] = -1;
            echo json_encode($json_encode);
        }
    }

    public function autoCreatePurchaseOrder() {
        $soID = $_REQUEST['sales_officerID'];
        $result = $this->android_service_model->autoCreatePurchaseOrder($soID);
        if (!is_null($result)) {
            $json_encode['data'] = $result[8];
            echo json_encode($json_encode);
        }
    }

    public function insert_sales_order() {
        $this->save_json_file('sales_order', $_REQUEST['officer_id']);
        $result = $this->android_service_model->insert_sales_order();
        echo json_encode(array('result' => $result));
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//

    public function getAllPendingPayments() {
        $officer_id = $_REQUEST['officer_id'];
        $pending_payments = $this->android_service_model->getAllPendingPayments($officer_id);
        $jsonS = Array('pending_payments' => $pending_payments);
        echo json_encode($jsonS);
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//
    public function getDealerStock() {
        $officer_id = $_REQUEST['officer_id'];
        $dealerStock = $this->android_service_model->getDealerStock($officer_id);
        $jsonS = array("dealer_stock" => $dealerStock);
        echo json_encode($jsonS);
    }

    //=======================================widuranga jayawickrama=====start===========================================
    public function getAllBanks() {
        $time_stamp = $_REQUEST['time_stamp'];
        $allBanks = $this->android_service_model->getAllBanks();
        $jsonS = array("all_banks" => $allBanks);
        echo json_encode($jsonS);
    }

    public function getDistricts() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_all_disrict = $this->android_service_model->getDistricts($time_stamp);
        $json = array("districts_name" => $get_all_disrict);
        echo json_encode($json);
    }

    public function getCity() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_all_city = $this->android_service_model->getCity($time_stamp);
        $json = array("city_name" => $get_all_city);
        echo json_encode($json);
    }

    public function get_current_vat() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_current_val = $this->android_service_model->get_current_vat($time_stamp);
        $json = array("current_vat" => $get_current_val);
        echo json_encode($json);
    }

    public function get_customers_details() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_customersDetails = $this->android_service_model->get_customers_details($time_stamp);
        $json = array("Customer_details" => $get_customersDetails);
        echo json_encode($json);
    }

    public function get_customer_types() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_customer_types = $this->android_service_model->get_customer_types($time_stamp);
        $json = array("customer_type" => $get_customer_types);
        echo json_encode($json);
    }

    public function get_vehicle() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_vehicle_details = $this->android_service_model->get_vehicle($time_stamp);
        $json = array("vehicle_details" => $get_vehicle_details);
        echo json_encode($json);
    }

    public function get_garages() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_garages_details = $this->android_service_model->get_garages($time_stamp);
        $json = array("garages_details" => $get_garages_details);
        echo json_encode($json);
    }

    public function get_new_shops() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_new_shopss = $this->android_service_model->get_new_shops($time_stamp);
        $json = array("new_shops_details" => $get_new_shopss);
        echo json_encode($json);
    }

    public function get_visit_categories() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_visit_categories = $this->android_service_model->get_visit_categories($time_stamp);
        $json = array("visit_categories_details" => $get_visit_categories);
        echo json_encode($json);
    }

    public function get_visit_purposes() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_visit_purposes = $this->android_service_model->get_visit_purposes($time_stamp);
        $json = array("visit_purposes_details" => $get_visit_purposes);
        echo json_encode($json);
    }

    public function get_campaign_type() {
        $time_stamp = $_REQUEST['time_stamp'];
        $get_campaign_type = $this->android_service_model->get_campaign_type($time_stamp);
        $json = array("campaign_type" => $get_campaign_type);
        echo json_encode($json);
    }

//==============widuranga jayawickrama==========end============================================================
    //---------------------------------Tour Itenary : Dinesh------------------------------------------
    public function getAllVisitHistory() {
        $allVisitHistory = $this->android_service_model->getAllVisitHistory();
        $jsonS = array("visit_history" => $allVisitHistory);
        $json_encode = json_encode($jsonS);
        print_r($json_encode);
        return $json_encode;
    }

    public function getAllFleetOwners() {
        $time_stamp = $_REQUEST['time_stamp'];
        $allFleetOwners = $this->android_service_model->getAllFleetOwners($time_stamp);
        $json = array("fleet_owners" => $allFleetOwners);
        $json_encode = json_encode($json);
        print_r($json_encode);
        return $json_encode;
    }

    /**
     * 2014-11-07 9:00 AM
     * @author SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @modified SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @desc avg monthly movement of items in area which particular dealer not purchased during last 6 months;
     * 
     */
    public function getFastMoovingItemInArea() {
        $dealer_id = $_REQUEST['dealer_id'];
        $fastMoovingItems = $this->android_service_model->getFastMoovingItemsInArea($dealer_id);
        $jsonS = array("fast_mooving_items" => $fastMoovingItems);
        $json_encode = json_encode($jsonS);
        print_r($json_encode);
        return $json_encode;
    }

    public function getNotAchivedTargets() {
        $officer_id = $_REQUEST['officer_id'];
        $notAchivedTargets = $this->android_service_model->getNotAchivedTargets($officer_id);
        $jsonS = array("not_achieved" => $notAchivedTargets);
        $json_encode = json_encode($jsonS);
        print_r($json_encode);
        return $json_encode;
    }

    public function getDealerStocksAvailability() {
        $officer_id = $_REQUEST['officer_id'];
        $part_id = $_REQUEST['part_id'];
        $dealerStocksAvailability = $this->android_service_model->getDealerStocksAvailability($officer_id, $part_id);
        $jsonS = array("stocks_availability" => $dealerStocksAvailability);
        $json_encode = json_encode($jsonS);
        print_r($json_encode);
        return $json_encode;
    }

//==============================widuranga_jayawickrama===================start=======================
    public function insert_product_failures() {

        $data = json_decode($_REQUEST['data']);
        $date = new DateTime($data->time_stamp);
        $this->save_json_file('prodcut_failures', $data->officer_id);
        $this->save_product_failures_imges($data->officer_id, $date->format('Y-m-d_H-i-s'));
        $result = $this->android_service_model->insert_product_failure($data);
        echo json_encode(array('result' => $result));
    }

    public function save_product_failures_imges($id, $tstmp) {
        $dir_name = './prodcut_failures_images/' . $id . '/' . $tstmp . '/';
        if (!is_dir($dir_name)) {
            mkdir($dir_name, 0777, TRUE);
        }
        $fname = $dir_name . '.zip';
        $fopen = fopen($fname, "w+");
        fwrite($fopen, $_REQUEST['images']);
        fclose($fopen);
        flush();
        $zip = new ZipArchive();
        if ($zip->open($fname) === TRUE) {
            $zip->extractTo($dir_name);
            $zip->close();
        }
    }

    public function branding() {
        $data = json_decode($_REQUEST['data']);
        $date = new DateTime($data->time_stamp);
        $this->save_json_file('branding_images', $data->officer_id);
        $this->save_brandin_image($data->officer_id, $date->format('Y-m-d_H-i-s'));
        $result = $this->android_service_model->insert_branding_details($data);
        echo json_encode(array('result' => $result));
    }

    public function save_brandin_image($id, $tstmp) {
        $dir_name = './branding_images/' . $id . '/' . $tstmp . '/';
        if (!is_dir($dir_name)) {
            mkdir($dir_name, 0777, TRUE);
        }
        $fname = $dir_name . '.zip';
        $fopen = fopen($fname, "w+");
        fwrite($fopen, $_REQUEST['images']);
        fclose($fopen);
        flush();
        $zip = new ZipArchive();
        if ($zip->open($fname) === TRUE) {
            $zip->extractTo($dir_name);
            $zip->close();
        }
    }

    public function payment_details() {
        $data = json_decode($_REQUEST['data']);
        $date = new DateTime($data->time_stamp);
        $this->save_json_file('payment_details', $data->officer_id);
        $this->bank_deposit_payment_details($data->officer_id, $date->format('Y-m-d_H-i-s'));
        $result = $this->android_service_model->insert_payments_details($data);
        echo json_encode(array('result' => $result));
    }

    public function bank_deposit_payment_details($id, $tstmp) {

        $dir_name = './payment_details/' . $id . '/' . $tstmp . '/';
        if (!is_dir($dir_name)) {
            mkdir($dir_name, 0777, TRUE);
        }

        $fname = $dir_name . '.zip';
        $fopen = fopen($fname, "w+");
        fwrite($fopen, $_REQUEST['images']);
        fclose($fopen);
        flush();
        $zip = new ZipArchive();
        if ($zip->open($fname) === TRUE) {
            $zip->extractTo($dir_name);
            $zip->close();
        }
    }

//==============================widuranga_jayawickrama===================end=======================

    public function drawIndexAddTarget() {
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
                    $this->template->draw('reports/androidReport/invoice_summary', true);
                }
            }
        }
    }

    public function androidSummaryReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/androidReport/invoice_summary', true);
    }

    public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('android_service/android_service_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->android_service_model->getDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getDealerCode() {
        $q = strtolower($_GET['term']);
        $this->load->model('android_service/android_service_model');
        $column = array('delar_account_no', 'delar_id', 'delar_name');
        $result = $this->android_service_model->getDealerCode($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getInvoiceNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('android_service/android_service_model');
        $column = array('invoice', 'delar_id', 'delar_name', 'delar_account_no');
        $result = $this->android_service_model->getInvoiceNo($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getWIPno() {
        $q = strtolower($_GET['term']);
        $this->load->model('android_service/android_service_model');
        $column = array('wipno', 'delar_id', 'invoice', 'delar_name', 'delar_account_no');
        $result = $this->android_service_model->getWIPno($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getSummaryReport() {
        $this->load->model('android_service/android_service_model');
        $result = $this->android_service_model->getAllSalesDetail($_REQUEST);
//        echo $result;
        echo json_encode($result);
    }

    public function getInvoiceDetails() {
        $this->load->model('android_service/android_service_model');
        $result = $this->android_service_model->viewInvoices($_REQUEST);
        echo json_encode($result);
    }

    public function getInvoiceDetailsDateWise() {
        $this->load->model('android_service/android_service_model');
        $result = $this->android_service_model->getAllSalesDetail($_REQUEST);
        echo json_encode($result);
    }

    //=============================================widuranga=================================================
    /*
     * @author : S.H.Dinesh Maduhsnka
     * @desc : get Dealer target histry for last 6 months for line item wise target
     *
     */
    public function getDealerTargetHistory() {
        $dealer_id = $_REQUEST['dealer_id'];
        $target_month = $_REQUEST['target_month'];
        $dealerTargetHistory = $this->android_service_model->getDealerTargetHistory($dealer_id, $target_month);
//        $json_array[] = '';
        foreach ($dealerTargetHistory as $value) {
            $histry_data = array(
                'item_id' => $value->item_id,
                'item_part_no' => $value->item_part_no,
                'description' => $value->description,
                'bbf' => $value->bbf,
                're_order_qty' => $value->re_order_qty,
                'current_stock' => $value->current_stock,
                'movement' => $value->movement,
                'month1_target' => $value->month1_target,
                'month1_actual' => $value->month1_actual,
                'month2_target' => $value->month2_target,
                'month2_actual' => $value->month2_actual,
                'month3_target' => $value->month3_target,
                'month3_actual' => $value->month3_actual,
            );
            $json_array[] = ($histry_data);
        }
        $array = array('history_data' => $json_array);
        echo json_encode($array);
        //$json_encode = json_encode($dealerTargetHistory, JSON_FORCE_OBJECT);
        //print_r($json_encode);
        // return $json_encode;
    }

//===========================widurangaJyawickrama=========2014.12.30=============================================
    public function monthlytarget() {
//        $this->save_json_file('sales_order', $_REQUEST['sales_rep_id']);
        $result = $this->android_service_model->MonthlyTarget($_POST);
        $test = array('result' => $result);
        echo json_encode($test);
    }

    public function comperiterPart() {
//        $this->save_json_file('sales_order', '22');
        $result = $this->android_service_model->comperiterPart($_POST);
        $test = array('result' => $result);
        echo json_encode($test);
    }

    public function update_dealer_location() {
//        $this->save_json_file_x('loc');
        $result = $this->android_service_model->update_dealer_location($_REQUEST);
        $test = array('result' => $result);
        echo json_encode($test);
    }

//    public function save_json_file_x($name) {
//        if (!is_dir('./web_service_jsons/' . $name . '/')) {
//            mkdir('./web_service_jsons/' . $name . '/', 0777);
//        }
//        
//        $fopen = fopen('./web_service_jsons/' . $name . '/' .date('Y-m-d H-i-s') . '.json', "w+");
//        fwrite($fopen, json_encode($_REQUEST));
//    }

    public function insert_New_tour_itentary() {
        // echo "gdgfgh";
        $result = $this->android_service_model->insert_new_tour_itentary($_REQUEST);
        $test = array('result' => "true");
        echo json_encode($test);

        //$this->save_json_file('xxxxxx', $_REQUEST['officer_id']);
    }

    //-----------------nee  *(PAYMENT PROCESS)
    //NEW1
    public function insert_bank_deposit_payment() {
        // echo "gdgfgh";
        $result = $this->android_service_model->insert_bank_deposit_payment($_REQUEST);
        $test = array('result' => "true");
        echo json_encode($test);
    }

    //NEW1----EE
    //NEW2--------
    public function insert_cheque_payment() {
        // echo "gdgfgh";
        $result = $this->android_service_model->insert_cheque_payment($_REQUEST);
        $test = array('result' => "true");
        echo json_encode($test);
    }

    //NEW2--------END
    //NEW3
    public function insert_cash_payment() {
        // echo "gdgfgh";
        $result = $this->android_service_model->insert_cash_payment($_REQUEST);
        $test = array('result' => "true");
        echo json_encode($test);
    }

    //NEW4
    //END *(END PAYMENT PROCESS)

    public function updateservice() {
        $version = $_REQUEST['version'];
        $this->load->model('android_service/android_service_model');
        $result = $this->android_service_model->updateservice();

        if ($result > $version) {
          $sss=  array('result'=>'true','url'=>'http://123.231.13.186/dimo_lanka/apk/DemoSalesPad.apk');
            echo json_encode($sss);
        }  else {
         $sss=  array('result'=>'false');
            echo json_encode($sss);
        }
    }

    public function getWIPno() {
        $dealer_id = $_REQUEST['dealer_id'];
        $this->load->model('android_service/android_service_model');
//        $column = array('wipno', 'delar_id', 'invoice', 'delar_name', 'delar_account_no');
        $result = $this->android_service_model->getWIPno($q, $column);
    }

//------------
}
