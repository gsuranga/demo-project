<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loading_summary
 *
 * @author Thilina
 */
class loading_summary extends C_Controller {

    private $resours = array(
        'JS' => array('loading_summary/js/loading_summary'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function index_loading_summary() {
        $this->template->attach($this->resours);
        $this->template->draw('loading_summary/index_loading_summary', true);
    }

    public function loading_summery() {
        $this->template->draw('loading_summary/loading_summary', FALSE);
    }

    public function get_summeryDetaills() {
        $this->load->model('loading_summary/loading_summary_model');
        $summery = $this->loading_summary_model->get_summeryDetails1();
        $this->template->draw('loading_summary/detail_summary', FALSE, $summery);
    }

//    public function get_summeryDetaills() {
//        $this->load->model('loading_summary/loading_summary_model');
//        $summery = $this->loading_summary_model->get_summeryDetails();
//        if($summery==Array()){
//            $this->session->set_flashdata('status_data', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#B8B8B8;border:solid 1px #B8B8B8;padding:2px;border-radius: 5px 5px 5px 5px">No Data Found</spam>');
//        }
//        $this->template->draw('loading_summary/search_summary', FALSE,$summery);
//    }
    public function get_disName() {
        $q = strtolower($_GET['term']);
        $this->load->model('loading_summary/loading_summary_model');
        $column = array('full_name', 'id_employee_has_place', 'id_physical_place');
        $result = $this->loading_summary_model->get_disName($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getProdcutDetails($id, $date, $phy_id) {
        $this->load->model('loading_summary/loading_summary_model');
        $summery['sales'] = $this->loading_summary_model->get_ProductDetails($id, $date, $phy_id);
        $summery['returns'] = $this->loading_summary_model->getProdcutReturns($id, $date, $phy_id);
//        print_r($summery['returns']);
        return $summery;
    }

    public function get_brands() {
        $this->load->model('loading_summary/loading_summary_model');
        $this->loading_summary_model->get_brands();
    }

    public function get_items_catgory() {
        $this->load->model('loading_summary/loading_summary_model');
        $this->loading_summary_model->get_items_catgory();
    }
        public function get_items_names() {
        $this->load->model('loading_summary/loading_summary_model');
        $_items_names = $this->loading_summary_model->get_items_names();
//        $_items_names = $this->loading_summary_model->get_items_names();
        echo json_encode($_items_names);
//        $this->instance_log = $_items_names;
    }

}
