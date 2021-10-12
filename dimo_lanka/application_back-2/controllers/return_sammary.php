<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class return_sammary extends CI_Controller {

    private $resours = array(
        'JS' => array('reports/return_samarry/js/return_samarry_js'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/return_samarry/return_summary_index', true);
    }

    public function getAreasName() {
        $q = strtolower($_GET['term']);
        $this->load->model('return_summary/return_summary_model');
        $column = array('area_name', 'area_id');
        $result = $this->return_summary_model->getArea($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getReturnSummaryDetails() {
        $this->load->model('return_summary/return_summary_model');
        $dataset = $this->return_summary_model->getReturnSummaryDetail();
        echo json_encode($dataset);
    }

}
