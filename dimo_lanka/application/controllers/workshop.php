<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of workshop
 *
 * @author Iresha Lakmali
 */
class workshop extends C_Controller {

    private $resours = array(
        'JS' => array('workshop/js/workshop'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexWorkshop() {
        $this->template->attach($this->resours);
        $this->template->draw('workshop/index_workshop', true);
    }

    public function drawCreateWorkshop() {
        $this->template->draw('workshop/create_workshop', false);
    }

    public function drawViewWorkShop() {
        $this->load->model('workshop/workshop_model');
        $viewWorkShop = $this->workshop_model->viewWorkShop();
        $this->template->draw('workshop/view_all_workshop', false, $viewWorkShop);
    }

    public function createWorkshop() {
        $this->form_validation->set_rules('workshop_code', 'Workshop Code', 'required');
        $this->form_validation->set_rules('workshop_name', 'Workshop Name', 'required');
        $this->form_validation->set_rules('workshop_account_no', 'Workshop Account No', 'required');
        $this->form_validation->set_rules('area_id', 'Area Name', 'required');
        $this->form_validation->set_rules('identifier', 'Identifier', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('workshop/workshop_model');
            $this->workshop_model->createWorkshop($_POST);
            redirect('workshop/drawIndexWorkshop');
        }  else {
            $this->drawIndexWorkshop();
        }
    }

    public function drawIndexManageWorkshop() {
        $this->template->attach($this->resours);
        $this->template->draw('workshop/index_manage_workshop', true);
    }

    public function drawManageWorkshop() {
        $this->template->draw('workshop/manage_workshop', false);
    }

    public function manageWorkshop() {
        $this->load->model('workshop/workshop_model');
        $this->workshop_model->manageWorkshop($_POST);
        redirect('workshop/drawIndexWorkshop');
    }

    public function removeWorkshop() {
        $this->load->model('workshop/workshop_model');
        $id = $this->input->get('workshop_id');
        $this->workshop_model->removeWorkshop($id);
        redirect('workshop/drawIndexWorkshop');
    }


    public function auto_area() {
        $q = strtolower($_GET['term']);
        $this->load->model('root/root_model');
        $column = array('area_name', 'area_id');
        $result = $this->root_model->getArea($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

}

?>
