<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of foc
 *
 * @author Thilina
 */
class foc extends C_Controller{
    private $resours = array(
        'JS' => array('foc/js/foc'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }
    
    public function index_draw_foc() {
        $this->template->attach($this->resours);
        $this->template->draw('foc/index_foc', true);
    }
    public function drawFocView() {
        $this->template->attach($this->resours);
        $this->load->model('foc/foc_model');
        $foc['warrenty'] = $this->foc_model->get_foc();
        $foc['free'] = $this->foc_model->get_free();
        $this->template->draw('foc/View_foc',FALSE,$foc);
    }
    public function warrenty_accept() {
        $this->load->model('foc/foc_model');
        $foc = $this->foc_model->warrenty_accept();
        if ($foc) {
            $this->session->set_flashdata('accept_foc', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Accepted a FOC</spam>');
        } else {
            $this->session->set_flashdata('accept_foc', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Not Enough Quantity for Accept this FOC</spam>');
        }
    }
    public function search_empName() {
        $q = strtolower($_GET['term']);
        $this->load->model('foc/foc_model');
        $column = array('ful_name', 'id_employee_has_place','id_employee_type','id_physical_place');
        $result = $this->foc_model->search_empName($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function search_item() {
        $q = strtolower($_GET['term']);
        $this->load->model('foc/foc_model');
        $column = array('item_name', 'id_item');
        $result = $this->foc_model->search_item($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function search_Outlet() {
        $q = strtolower($_GET['term']);
        $this->load->model('foc/foc_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->foc_model->search_Outlet($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
}
