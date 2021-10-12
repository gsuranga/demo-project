<?php

/* dealer_location
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dealer_location extends C_Controller {

    private $resours = array(
        'JS' => array('dealer_location/js/markerclusterer', 'dealer_location/js/dealer_location_map'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function index_dealer_location() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_location/index_dealer_location', true);
    }

    public function draw_dealer_location() {
        $this->template->draw('dealer_location/dealer_location', false);
    }

    public function get_location() {
        $this->load->model('dealer_location/dealer_location_model');
        $detail = $this->dealer_location_model->get_dealer_location();
        //print_r($detail);
        echo json_encode($detail);
    }
    public function dealer_details() {
        $dealer_id = $_REQUEST['dealer_id'];
        $this->load->model('dealer_location/dealer_location_model');
        $detail = $this->dealer_location_model->set_dealer_details($dealer_id);
        //print_r($detail);
        echo json_encode($detail);
    }

}
