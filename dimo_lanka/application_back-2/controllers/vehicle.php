<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle
 *
 * @author Sameera Viraj
 */
class vehicle extends C_Controller {

    //put your code here

    private $resource = array(
        'JS' => array('vehicle/js/vehicle'),
        'CSS' => array()
    );

    public function __construct() {
        parent::__construct();
    }

    public function drawRegisterVehicleFormIndex() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/drawRegisterVehicleFormIndex', true);
    }

    public function drawRegisterVehicleForm() {
        $this->template->draw('vehicle/drawRegisterVehicleForm', false);
    }

    public function get_vehicle_model() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('vehicle_model_name', 'vehicle_model_id');
        $result = $this->vehicle_model->get_vehicle_model($q, $column);
        echo json_encode($result);
    }

    public function get_customer() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('customer_name', 'customer_id');
        $result = $this->vehicle_model->get_customer($q, $column);
        echo json_encode($result);
    }

    public function get_vehicle_of_cutomer() {
        $this->load->model('vehicle/vehicle_model');
        $viewPurposes = $this->vehicle_model->get_vehicle_of_cutomer($_GET['owner_id']);
        echo $viewPurposes;
    }

    public function get_purpose() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('vehicle_purpose_name', 'vehicle_purpose_id');
        $result = $this->vehicle_model->get_purpose($q, $column);
        echo json_encode($result);
    }

    public function get_bus_type() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('business_type_name', 'business_type_id');
        $result = $this->vehicle_model->get_bus_type($q, $column);
        echo json_encode($result);
    }

    public function get_district() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('district_name', 'district_id');
        $result = $this->vehicle_model->get_district($q, $column);
        echo json_encode($result);
    }

    public function get_city() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('city_name', 'city_id');
        $result = $this->vehicle_model->get_city($q, $column);
        echo json_encode($result);
    }

    public function get_dealer_purchasing_parts() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->vehicle_model->get_dealer_purchasing_parts($q, $column);
        echo json_encode($result);
    }

    public function get_vehicle_ids() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('vehicle_reg_no', 'vehicle_id');
        $result = $this->vehicle_model->get_vehicle_ids($q, $column);
        echo json_encode($result);
    }

    public function registerVehicle() {
        $this->load->model('vehicle/vehicle_model');
        try {
            $response = $this->vehicle_model->registerVehicle($_GET);
            echo $response;
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function darwViewVehicleDetailsIndex() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/viewVehicleDetailsIndex', true);
    }

    public function drawViewVehicleDetails() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/viewVehicleDetailsForm', false);
    }
    
    public function drawViewDriverDetails() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/drawViewDriverDetails', false);
    }

    public function drawViewRegVehicleDetails() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/viewVehicleDetails',false);
    }
    public function drawViewVehiclePurposeDetails() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/viewVehiclePurposeDetails',false);
    }
    public function drawViewVehicleTravelArea() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/drawViewVehicleTravelArea',false);
    }
    public function drawViewVehicleDealers() {
        $this->template->attach($this->resource);
        $this->template->draw('vehicle/drawViewVehicleDealers',false);
    }

    public function drawViewPartsPurchaseTataDealers() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_tata_parts_details($_GET['vehicle_id']);
        // $this->template->draw('vehicle/viewVehicleDetails', true, false);
    }

    public function drawViewVehicleRegistration() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_vehicle_details($_GET['vehicle_name']);
        echo json_encode($response);
    }
    
    public function get_driver_details_for_search() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_driver_details_for_search($_GET['vehicle_name']);
        echo json_encode($response);
    }
    
    public function get_purpose_details() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_purpose_details($_GET['vehicle_name']);
        echo json_encode($response);
    }
    
    public function get_area_travel() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_area_travel($_GET['vehicle_name']);
        echo json_encode($response);
    }
    
    public function get_dealers_details() {
        $this->template->attach($this->resource);
        $this->load->model('vehicle/vehicle_model');
        $response = $this->vehicle_model->get_dealers_details($_GET['vehicle_name']);
        echo json_encode($response);
    }

}
