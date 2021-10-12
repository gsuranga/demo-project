<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class manthwise_summary extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('reports/sales_office_manth_wise_summary/js/manthwise_summary'),
        'CSS' => array());

    public function drawIndexManthlysummary() {

        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_office_manth_wise_summary/Index_manth_wise_summary', true);
    }

    public function drawViewManthlysummary() {
        $typename = $this->session->userdata('typename');
        if ($typename == "Super Admin") {
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_office_manth_wise_summary/admin_view', false);
        }
          elseif ($typename == "Sales Officer") {
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_office_manth_wise_summary/view_manth_wise_summary', false);
         }
         elseif ($typename=="APM") {
         $this->template->attach($this->resours);
        $this->template->draw('reports/sales_office_manth_wise_summary/apm_view', false);
     }
    }

    public function drawViewManthlysummaryReport() {
        //print_r($_REQUEST);
        $typeid = "";
        $userid = "";
        if ((isset($_REQUEST['cmd_district']) && isset($_REQUEST['sales_oficer_id'])) && ($_REQUEST['cmd_district'] != null && $_REQUEST['sales_oficer_id'] != null)) {
            $typeid = $_REQUEST['cmd_district'];
            $userid = $_REQUEST['sales_oficer_id'];
        }

        if ($typeid == 0) {
            $extraData= $this->manth_wise_summary_model->get_all_month_summary($typeid, $userid);
            $extraData1 = $this->manth_wise_summary_model->get_all_month_summary1($typeid, $userid);
            $extraData2 = $this->manth_wise_summary_model->get_all_month_summary2($typeid, $userid);
            $extraData3 = $this->manth_wise_summary_model->get_all_month_summary3($typeid, $userid);
            $get_details=  array();
            array_push($get_details,$extraData,$extraData1,$extraData2,$extraData3);
            
//            echo "<pre>";
//            print_r($get_details);
//            echo "</pre>";

            $this->template->draw('reports/sales_office_manth_wise_summary/view_all', false,$get_details);
        } else {
            $this->load->model('manth_wise_summary/manth_wise_summary_model');
            $get_details = $this->manth_wise_summary_model->get_monthwise_summary($typeid, $userid);
            $this->template->draw('reports/sales_office_manth_wise_summary/View_report', false, $get_details);
        }
    }

public function get_all_sales_officers() {
        $q = strtolower($_GET['term']);
        $this->load->model('manth_wise_summary/manth_wise_summary_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->manth_wise_summary_model->get_sales_officerId($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function get_AMP_salesofficers() {
        $q = strtolower($_GET['term']);
        $this->load->model('manth_wise_summary/manth_wise_summary_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->manth_wise_summary_model->get_salesOfficerInAPM($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawDistricLoad() {
        $this->load->model('manth_wise_summary/manth_wise_summary_model');
        $viewAll = $this->manth_wise_summary_model->viewAllDistrict();
        $this->template->draw('reports/sales_office_manth_wise_summary/load_catogary', FALSE, $viewAll);
    }

}
