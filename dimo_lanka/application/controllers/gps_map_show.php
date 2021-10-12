<?php

class gps_map_show extends C_Controller {

    private $resours = array(
        'JS' => array('gpsmap/js/gps'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexGPS() {
        $resours = array(
            'JS' => array('gpsmap/js/markerclusterer', 'gpsmap/js/gps', 'gpsmap/js/cus_gmap'),
            'CSS' => array());
        $this->template->attach($resours);
        $this->template->draw('gpsmap/index_gpsmap', true);
    }

    public function drawViewGPS() {

        $this->template->attach($this->resours);
        $this->template->draw('gpsmap/search_gps_details', false);
    }

    public function getGPSdetails() {
        $this->load->model('gps_map/gpsmap');
        $details = $this->gpsmap->getGPSdetails();
        //print_r($details);
        echo json_encode($details);
    }

    public function getGPS() {
        $pur_id = $_REQUEST['purchase_order'];
        $this->load->model('gps_map/gpsmap');
        $detail = $this->gpsmap->getGPSdetails_set($pur_id);
        //print_r($detail);
        echo json_encode($detail);
    }

    public function get_all_branch() {
        $q = strtolower($_GET['term']);
        $this->load->model('gps_map/gpsmap');
        $column = array('branch_name', 'branch_id');
        $result = $this->gpsmap->getAllBranch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_sales_officer() {
        $q = strtolower($_GET['term']);
        $this->load->model('gps_map/gpsmap');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->gpsmap->getSalesOfficer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAlldealres() {
        $q = strtolower($_GET['term']);
        $this->load->model('gps_map/gpsmap');
        $column = array('delar_name', 'delar_id');
        $result = $this->gpsmap->getAlldealers($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function gps_tour_itenerary_index() {
        $resours = array(
            'JS' => array('gpsmap/js/gps'),
            'CSS' => array());
        $this->template->attach($resours);
        $this->template->draw('gpsmap/gps_tour_itenerary_index', true);
    }

    public function gps_tour_itenerary() {
        
        $this->template->attach($this->resours);
        $this->template->draw('gpsmap/search_gps_tour_itenerary', false);
       
    }
    public function getTour_details() {
        $this->load->model('gps_map/gpsmap');
        $viewgpsinfo = $this->gpsmap->tour_details();
        $this->template->draw('gpsmap/gps_tour_itenerary', false,$viewgpsinfo);
        
    }

}
