<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of area
 *
 * @author Iresha Lakmali
 */
class area extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexArea() {
        $this->template->draw('area/index_area', true);
    }

    public function drawCreateArea() {
        $this->template->draw('area/create_area', false);
    }

    public function drawViewAllArea() {
        $this->load->model('area/area_model');
        $viewAllArea = $this->area_model->viewAllArea();
        $this->template->draw('area/view_all_area', false, $viewAllArea);
    }

    public function createArea() {
        $this->form_validation->set_rules('area_code', 'Area Code', 'required');
        $this->form_validation->set_rules('area_name', 'Area', 'required');
        $this->form_validation->set_rules('area_account_no', 'Account No', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('area/area_model');
            $this->area_model->createArea($_POST);
            redirect('area/drawIndexArea');
        }  else {
            $this->drawIndexArea();
        }
    }

    public function drawIndexManageArea() {
        $this->template->draw('area/index_manage_area', true);
    }

    public function drawManageArea() {
        $this->template->draw('area/manage_area', false);
    }

    public function updateArea() {
	    $this->load->model('area/area_model');
        $this->area_model->updateArea($_POST);
        redirect('area/drawIndexArea');
		
	}
	
   	
	public function deleteArea() {
        $this->load->model('area/area_model');
        $id = $this->input->get('area_id');
        $deleteBank =$this->area_model->deleteArea($id);
        redirect('area/drawIndexArea');
    }

        

}

?>
