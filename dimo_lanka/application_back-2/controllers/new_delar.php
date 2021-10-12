<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of new_delar
 *
 * @author Your Name <your.name at your.org>
 */
class new_delar extends C_Controller{
    
   private $resours = array(
        'JS' => array('new_delaer/js/new_dealer'),
        'CSS' => array());
    
    public function __construct() {
        parent::__construct();
    }
    
    public function drawindex_new_delaer() {
        $this->template->attach($this->resours);
        $this->template->draw('new_delaer/index_dealer', true);
    }
    
    
    public function drawcreate_register() {
        $this->template->draw('new_delaer/create_delaer', false);
    }
    
    /*
     * get district_names
     */
    public function get_district_names() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_dealer/new_dealer_model');
        $column = array('district_name', 'district_id');
        $result = $this->new_dealer_model->get_district_names($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    /*
     * get city names
     */
    
    public function get_city_names() {
        $q = strtolower($_GET['term']);
        $dis_id = $_GET['dis_id'];
        $this->load->model('new_dealer/new_dealer_model');
        $column = array('city_name', 'city_id');
        $result = $this->new_dealer_model->get_city_names($q, $column,$dis_id);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    /*
     * insert branch
     */
    
    public function insert_branch() {
        $this->load->model('new_dealer/new_dealer_model');
                
    }
}
