<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buinessplan_data_entry
 *
 * @author J M V Dilhari
 */
class buinessplan_data_entry extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    private $resours = array(
        'JS' => array('buinessplan_data_entry/js/businessplan_data_entry'),
        'CSS' => array()
    );

    public function drawIndexBusinessplanDataEntry() {
        $this->template->attach($this->resours);
        $this->template->draw('buinessplan_data_entry/index_all_buinessplan_data_entry', TRUE);
    }

    public function drawAllSwotAnalysis() {
        $this->template->attach($this->resours);
        $this->template->draw('buinessplan_data_entry/create_swot_analysis', false);
    }

    public function createSwotAnalysis() {
        $this->form_validation->set_rules('year', 'Financial year', 'required');
        $this->form_validation->set_rules('s_type', 'Type', 'required');
        $this->form_validation->set_rules('deadline', 'Deadline', 'required');
        $this->form_validation->set_rules('cmb_campaign_type1', 'Campaign Type', 'required');
        $this->form_validation->set_rules('target_month1', 'Target Month', 'required');
        $this->form_validation->set_rules('cmbArea1', 'Area', 'required');
        $this->form_validation->set_rules('tot_cost1', 'Total Cost', 'required');

        if ($this->form_validation->run()) {
            $this->load->model('buinessplan_data_entry/swot_analysis_model');
            $swot = $this->swot_analysis_model->insertSwot($_POST);
            if ($swot) {
                $this->drawsucesspage();
            } 
            
        } else {
            $this->drawIndexBusinessplanDataEntry();
        }
    }

    public function drawsucesspage() {
        $this->template->attach($this->resours);
        $this->template->draw('buinessplan_data_entry/success_page', TRUE);
    }

    public function getCampaignType() {
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        $campaignType = $this->swot_analysis_model->getCampaignType();
        $this->template->draw('buinessplan_data_entry/campaign_type_list', false, $campaignType);
    }

    public function appendCampaignType() {
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        echo json_encode($this->swot_analysis_model->appendCampaignType());
    }

    public function getDealer() {
        $q = strtolower($_GET['term']);
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no', 'sales_officer_code');
        $result = $this->swot_analysis_model->get_dealer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getArea() {
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        $area = $this->swot_analysis_model->getArea();
        $this->template->draw('buinessplan_data_entry/area_list', false, $area);
    }

    public function appendArea() {
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        echo json_encode($this->swot_analysis_model->appendArea());
    }
    
    //from 2016-01-20----------------------------------------------
    public function forAdmin() {
        $this->template->attach($this->resours);
        $this->template->draw('buinessplan_data_entry/forAdminCampign', TRUE);
    }
    public function creatingCampaignTypes() {
        $this->template->attach($this->resours);
        $this->template->draw('buinessplan_data_entry/creatingCampaignTypes', false);
    }
    public function savingCrearingCtype() {
    
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
         json_encode($this->swot_analysis_model->savingCrearingCtype($_POST));
      
    }
    public function getallCompaignItems() {
    
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        echo json_encode($this->swot_analysis_model->getallCompaignItems());
      
    }
    public function addingnewItems() {
      $this->template->attach($this->resours);
      $this->template->draw('buinessplan_data_entry/additems', false);
    }
    public function submititems() {
      $this->load->model('buinessplan_data_entry/swot_analysis_model');
      echo json_encode($this->swot_analysis_model->submititems($_POST));
    }
    public function summaryView() {
       $this->template->attach($this->resours);
       $this->template->draw('buinessplan_data_entry/indexsummaryView',true);
    }
    
    public function viewSummary() {
      $this->template->attach($this->resours);
      $this->template->draw('buinessplan_data_entry/summaryView', false);
       
    }
    public function detailedView() {
     $this->template->attach($this->resours);
     $this->template->draw('buinessplan_data_entry/detailedView', false); 
       
    }
    
    public function getallBranches() {
        $q = strtolower($_GET['term']);
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
        $column = array('branch_name','branch_id');
        $result = $this->swot_analysis_model->getallBranches($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }  
    }
    public function getallCompaignSummary() {
        $branch = $_REQUEST['id'];
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
       echo json_encode($this->swot_analysis_model->getallCompaignSummary($branch));
      // $this->template->draw('buinessplan_data_entry/area_list', false, $area);
        
    }
    public function getdescriptions() {
//        $branch = $_REQUEST['id'];
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
       echo json_encode($this->swot_analysis_model->getdescriptions());
        
    }
    public function getallDetail() {
        //$branch = $_REQUEST['id'];
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
       echo json_encode($this->swot_analysis_model->getallDetail());
        
    }
    public function getallItems() {
        //$branch = $_REQUEST['id'];
        $this->load->model('buinessplan_data_entry/swot_analysis_model');
       echo json_encode($this->swot_analysis_model->getallDetail());
        
    }
    
    

}
