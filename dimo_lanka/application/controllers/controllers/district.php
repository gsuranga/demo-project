<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of district
 *
 * @author Iresha Lakmali
 */
class district extends C_Controller {

    private $resours = array(
        'JS' => array('district/js/district'),
        'CSS' => array(''));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexDistrict() {
        $this->template->attach($this->resours);
        $this->template->draw('district/index_district', true);
    }

    public function drawCreateDistrict() {
        $this->template->draw('district/create_district', false);
    }

    public function drawCreateCity() {
        $this->template->draw('district/create_city', false);
    }

    public function createCity() {
        $this->load->model('district/district_model');
        $this->district_model->createCity($_POST);
    }

    public function createDistrict() {
        $this->load->model('district/district_model');
        $this->district_model->createDistrict($_POST);
    }

    public function getAllDistrict() {
        $q = strtolower($_GET['term']);
        $this->load->model('district/district_model');
        $column = array('district_name', 'district_id');
        $result = $this->district_model->getAllDistrict($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}

?>
