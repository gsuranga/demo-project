<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salesdesignation
 *
 * @author shamil
 */
class salesdesignation extends C_Controller {
     private $resours = array(
        'JS' => array('salesdesignation/js/saleedesignation'),
        'CSS' => array());
     
     public function __construct() {
        parent::__construct();
    }
    
    public function drawIndexdesignation() {
        $this->template->attach($this->resours);
        $this->template->draw('salesdesignation/index_designtion', true);
    }
    
    public function drawCreatedesignation() {
        $this->template->draw('salesdesignation/add_designation', false);
    }
    
     public function createdes() {
        $this->form_validation->set_rules('designation', 'designation', 'required');
       
        if ($this->form_validation->run()) {
            $this->load->model('salesdesignation/salesdesignation_model');
            $this->salesdesignation_model->createdesignation($_POST);
            redirect('salesdesignation/drawIndexdesignation');
        }  else {
            $this->drawIndexdesignation();
        }
    }
    
    public function drawViewAlldesignation() {
         $this->load->model('salesdesignation/salesdesignation_model');
        $viewAllArea = $this->salesdesignation_model->viewAll();
        $this->template->draw('salesdesignation/viewalldesig', false, $viewAllArea);
    }
    
      public function drawIndexManagedes() {
        $this->template->draw('salesdesignation/indexdesigmanage', true);
    }
    
      public function drawManagedesignation() {
        $this->template->draw('salesdesignation/managedesignation', false);
    }
    
    public function updateArea() {
	$this->load->model('salesdesignation/salesdesignation_model');
        $this->salesdesignation_model->updatedes($_POST);
        redirect('salesdesignation/drawIndexdesignation');
		
	}
        
        public function deleteArea() {
       $this->load->model('salesdesignation/salesdesignation_model');
        $id = $this->input->get('id');
        $deleteBank =$this->salesdesignation_model->deleteArea($id);
        redirect('salesdesignation/drawIndexdesignation');
    }
    
    
    
    
    
    
     
}
