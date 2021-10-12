<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class areasalestour extends C_Controller {

    private $resours = array(
        'JS' => array('areasalestour/js/areasalestour'),
        'CSS' => array('areasalestour/css/areatourex'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexAreaSalesTourInputSheet() {
        $this->template->attach($this->resours);
        $this->template->draw('areasalestour/drawIndexAreaSalesTourInputSheet', TRUE);
    }

    public function drawViewAreaSalesTourInputSheet() {
        $emp_id = $this->session->userdata('employe_id');
        $sales_officer_detail = $this->get_sales_officer_detail($emp_id);
        $is_exsit = $this->get_is_exit_this_month();

        $arr = array($sales_officer_detail, $is_exsit);
        $this->template->draw('areasalestour/drawViewAreaSalesTourInputSheet', FALSE, $arr);
    }

    public function insertexpenses() {
        $this->load->model('areasalestour/areasalestour_model');
        if (!is_dir('expenses/')) {
            mkdir('./expenses/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './expenses/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);
        $file_array_as = array();

        $file_array_asb = array();
        //print_r($_FILES);
        foreach ($_FILES as $field => $file) {
            if ($field != "userfile") {
                //echo $field;
                $substr = substr($field, 4);
                $file_temp = substr($field, 0, 4);

                //echo $substr;
                if ($file_temp == "file") {
                    $file_array_as[$substr] = $file['name'];
                }

                if ($file_temp == "filb") {
                    $file_array_asb[$substr] = $file['name'];
                }
            }
            if ($file['error'] == 0) {

                if ($this->upload->do_upload($field)) {
                    $data = $this->upload->data();
                } else {
                    $errors = $this->upload->display_errors();
                }
            }
        }
//        $row_count=$_REQUEST['rowcountIntable2'];
//        for($i=1;$i<=$row_count;$i++){;
//         
//        }
//        //print_r($file_array_as);
//        echo '----------------------';
//        print_r($_REQUEST);
        /* if (!$this->upload->do_upload()) {

          echo '0';
          } else {
          echo '1';
          } */
        // $name = $this->upload->file_name;

        $this->areasalestour_model->insertAreaSalesTour($file_array_as);
        $this->session->set_flashdata('insert_expenses', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:green;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Inserted Expenses</spam>');
        redirect('areasalestour/drawIndexAreaSalesTourInputSheet');
    }

    public function drawIndexAreaSalesTourSummery() {
        $this->template->attach($this->resours);
        $this->template->draw('areasalestour/drawIndexAreaSalesTourSummery', TRUE);
    }

    public function drawViewAreaSalesTourSummery() {
        $this->template->draw('areasalestour/drawViewAreaSalesTourSummery', FALSE);
    }

    public function get_sales_officer_by_name() {

        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'sales_officer_account_no', 'sales_officer_code');
        $result = $this->sales_officer_pur_order_model->getSalesOfficerByName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getSummeryForSalesTourExpenses() {
        $sales_id = $this->input->get('sales_officer_id');
        $first_date = $this->input->get('first_date');
        $second_date = $this->input->get('second_date');

        $this->load->model('areasalestour/areasalestour_model');
        $result = $this->areasalestour_model->getSummeryForSalesTourExpenses($sales_id, $first_date, $second_date);

        $finelArray = Array();

        $mealsArray = Array();
        $accommodationArray = Array();
        $fuelexpensesArray = Array();
        $deliverchargesArray = Array();
        $travellingArray = Array();
        $stationaryArray = Array();
        $fuelforstockArray = Array();

        // print_r($result);
        foreach ($result As $val) {

            if ($val->expenses === 'Meal - Sales Tour') {
                $submealArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($mealsArray, $submealArray);
            } else if ($val->expenses === 'Accommodation -Sales Tour') {

                $subaccommodationArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($accommodationArray, $subaccommodationArray);
            } else if ($val->expenses === 'Fuel Expenses') {
                $subfuelArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($fuelexpensesArray, $subfuelArray);
            } else if ($val->expenses === 'Delivery Charges') {
                $subdeliverArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($deliverchargesArray, $subdeliverArray);
            } else if ($val->expenses === 'Travelling Expenses') {
                $subtravellingArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($travellingArray, $subtravellingArray);
            } else if ($val->expenses === 'Stationeries') {
                $substationaryArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($stationaryArray, $substationaryArray);
            } else if ($val->expenses === 'Fuel for stock Vehicles') {
                $subfuelStockArray = Array($val->expenses_date, $val->inv_no, $val->bill_amount, $val->narration, $val->km_record, $val->km_record2, $val->description, $val->meal_type, $val->image);
                array_push($fuelforstockArray, $subfuelStockArray);
            }
        }

        array_push($finelArray, $mealsArray, $accommodationArray, $fuelexpensesArray, $deliverchargesArray, $travellingArray, $stationaryArray, $fuelforstockArray);
        // print_r($finelArray);
        echo json_encode($finelArray);
    }

    public function get_sales_officer_detail($emp_id) {
        $this->load->model('areasalestour/areasalestour_model');
        return $this->areasalestour_model->get_sales_officer_detail($emp_id);
    }

    public function get_is_exit_this_month() {
        $this->load->model('areasalestour/areasalestour_model');
        return $this->areasalestour_model->get_is_exit_this_month();
    }

    public function get_expenses_main_detail() {
        $month = $this->input->get('month');
        $aso = $this->input->get('aso');
        $this->load->model('areasalestour/areasalestour_model');
        $res = $this->areasalestour_model->get_expenses_main_detail($month, $aso);
        echo json_encode($res);
    }

    public function get_sales_officer_detail_for_area_tour() {
        $emp_id = $this->input->get('emp_id');
        $emp_detail = $this->get_sales_officer_detail($emp_id);
        echo json_encode($emp_detail);
    }

}
