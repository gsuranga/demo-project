<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of counter
 *
 * @author Iresha Lakmali
 */
class counter extends C_Controller {

    private $resours = array(
        'JS' => array('counter/js/counter'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexCounter() {
        $this->template->attach($this->resours);
        $this->template->draw('counter/index_counter', true);
    }

    public function drawCreateCounter() {
        $this->template->draw('counter/create_counter', false);
    }

    public function drawViewAllCounter() {
        $this->load->model('counter/counter_model');
        $viewAllCounter = $this->counter_model->viewAllCounter();
        $this->template->draw('counter/view_all_counter', false, $viewAllCounter);
    }

    public function createCounter() {
        $this->load->model('counter/counter_model');
        $this->counter_model->createCounter($_POST);
        redirect('counter/drawIndexCounter');
    }

    public function get_area_names() {
        $q = strtolower($_GET['term']);
        $this->load->model('counter/counter_model');
        $column = array('area_name', 'area_id');
        $result = $this->counter_model->getAllArea($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexManageCounter() {
        $this->template->attach($this->resours);
        $this->template->draw('counter/index_manage_counter', true);
    }

    public function drawUpdateCounter() {
        $this->template->draw('counter/update_counter', false);
    }

    public function remooveCounter() {
        $this->load->model('counter/counter_model');
        $id = $this->input->get('counter_id');
        $this->counter_model->remooveCounter($id);
        redirect('counter/drawIndexCounter');
    }

    public function updateCounter() {
        $this->load->model('counter/counter_model');
        $this->counter_model->updateCounter($_POST);
    }

}

?>
