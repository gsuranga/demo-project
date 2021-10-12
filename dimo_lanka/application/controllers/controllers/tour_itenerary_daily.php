<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class tour_itenerary_daily extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('reports/tour_itenerary_ daily/js/tour_itenerary'),
        'CSS' => array());

    public function drawIndextour_itenerary_daily() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/tour_itenerary_ daily/index_tour_itenerary_daily', true);
    }

    public function drawViewtour_itenerary_daily() {
        $typename = $this->session->userdata('typename');
        if ($typename == "Super Admin") {
            $this->template->attach($this->resours);
            $this->template->draw('reports/tour_itenerary_ daily/set_name_date', false);
        } elseif ($typename == "Sales Officer") {
            $this->template->attach($this->resours);
            $this->template->draw('reports/tour_itenerary_ daily/view_tour_tenerary_daily', false);
          
        }
        elseif ($typename=="APM") {
         $this->template->attach($this->resours);
        $this->template->draw('reports/tour_itenerary_ daily/apm_veiw', false);
     }
    }

    public function drawViewtour_itenerary_dailyReport() {
        $userId = "";
        $select_date = "";
        //print_r($select_date);
        if ((isset($_REQUEST['select_date']) && isset($_REQUEST['sales_officer_id'])) && ($_REQUEST['select_date'] != null && $_REQUEST['sales_officer_id'] != null)) {
            $userId = $_REQUEST['sales_officer_id'];
            $select_date = $_REQUEST['select_date'];
        }

        $this->load->model('tour_itenerary_daily/tour_itenerary_daily_model');
        $daily_details = $this->tour_itenerary_daily_model->get_tour_itenerary_daily($userId, $select_date);
//        echo "<pre>";
//        print_r($daily_details);
//        echo "<pre>";
        $this->template->draw('reports/tour_itenerary_ daily/view_admin_tour itenerary_daily', false, $daily_details);
    }

    public function get_all_sales_officers() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_itenerary_daily/tour_itenerary_daily_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->tour_itenerary_daily_model->get_sales_officerId($q, $column);
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

}
