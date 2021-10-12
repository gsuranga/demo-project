<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of target
 *
 * @author Shamil
 */
class target extends C_Controller {
    private $resource = array(
        'JS' => array('target/js/target', 'target/js/jquery.mtz.monthpicker'),
        'CSS' => array('')
    );

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexTarget() {
        $this->template->attach($this->resource);
        $this->template->draw('target/index_target', true);
    }

    public function drawInsertTarget() {
        $this->template->draw('target/insert_target', false);
    }

    public function drawInsertSalesTypeTarget() {
        $this->load->model('target/target_model');
        $allSalesTypes = $this->target_model->getAllSalesTypes();
        $this->template->draw('target/inser_sales_type_wise_target', false, $allSalesTypes);
    }

    public function insertSalesTypeWiseTarget() {
        $this->load->model('target/target_model');
        $allSalesTypes = $this->target_model->insertSalesTypeWiseTarget($_POST);
        redirect('target/drawIndexTarget');
    }

    public function insertSalesOfficerWiseTarget() {
        $this->load->model('target/target_model');
        $allSalesTypes = $this->target_model->insertSalesOfficerWiseTarget($_POST);
        redirect('target/drawIndexTarget');
    }

    public function insertAreaWiseTarget() {
        $this->load->model('target/target_model');
        $areaWiseBudget = $this->target_model->insertAreaWiseTarget($_POST);
        redirect('target/drawIndexTarget');
    }

    public function insertBranchWiseTarget() {
        $this->load->model('target/target_model');
        $branchWiseBudget = $this->target_model->insertBranchWiseTarget($_POST);
        redirect('target/drawIndexTarget');
    }

    public function drawInsertAreaWiseTarget() {
        $this->load->model('target/target_model');
        $allAreas = $this->target_model->getAllAreas();
        $this->template->draw('target/insert_area_wise_target', false, $allAreas);
    }

    public function drawInsertBranchWiseTarget() {
        $this->load->model('target/target_model');
        $allBranches = $this->target_model->getAllBranches();
        $this->template->draw('target/insert_branch_wise_target', false, $allBranches);
    }

    public function drawInsertSalesOfficerViceTarget() {
        $this->load->model('target/target_model');
        $allBranches = $this->target_model->getAllBranches();
        $this->template->draw('target/insert_sales_person_wise_target', false);
    }

    public function loadBranchWiseSalesOfficers() {
        $branch_id = $this->input->get('hidden_branch_id');
        $this->load->model('target/target_model');
        $data_set = array();
        $branchWiseSalesPersons = $this->target_model->getBranchWiseSalesPersons($branch_id);
        array_push($data_set, $branchWiseSalesPersons);
        echo json_encode($data_set);
    }
    
   

    public function getAllBranches() {
        $q = strtolower($_GET['term']);
        $this->load->model('target/target_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->target_model->loadAllBranches($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
   
    public function drawIndexEditTarget() {
        $this->template->attach($this->resource);
        $this->template->draw('target/index_target_edit', true);
    }
    
     public function drawInsertTargetEdit() {
        $this->template->draw('target/insert_target_edit', false);
    }
    
     public function drawInsertSalesTypeTargetEdit() {
        $start_date = $this->input->get('start_date');
        $this->load->model('target/target_model');
        $data_set = array();
        $allSalesTypesEdit = $this->target_model->getAllSalesTypesEdit($start_date);
        array_push($data_set, $allSalesTypesEdit);
        echo json_encode($data_set);
    }
    
     public function drawInsertAreaWiseTargetEdit() {
        $this->load->model('target/target_model');
        $allAreas = $this->target_model->getAllAreaEdit();
        $this->template->draw('target/insert_area_wise_target_Edit', false, $allAreas);
    }
    
     public function drawInsertBranchWiseTargetEdit() {
        $this->load->model('target/target_model');
        $allBranches = $this->target_model->getAllBranchEdit();
        $this->template->draw('target/insert_branch_wise_target_Edit', false, $allBranches);
    }
    
     public function drawInsertSalesOfficerViceTargetEdit() {
        $this->load->model('target/target_model');
        $allBranches = $this->target_model->getAllSalsPersonEdit();
        $this->template->draw('target/insert_sales_person_wise_target_edit', false);
    }
    
    public function updateSalestype() {
            $this->load->model('target/target_model');
        $this->target_model->updateSalestype($_REQUEST);
         redirect('target/drawIndexEditTarget');
        
    }
    
     public function updateArea() {
            $this->load->model('target/target_model');
        $this->target_model->updateArea($_REQUEST);
         redirect('target/drawIndexEditTarget');
        
    }
    
     public function updateBranch() {
            $this->load->model('target/target_model');
        $this->target_model->updateBranch($_REQUEST);
         redirect('target/drawIndexEditTarget');
        
    }
    
     public function getAllSalsPersonEdit() {
        $branch_id = $this->input->get('hidden_branch_id');
        $this->load->model('target/target_model');
        $data_set = array();
        $branchWiseSalesPersons = $this->target_model->getAllSalsPersonEdit($branch_id);
        array_push($data_set, $branchWiseSalesPersons);
        echo json_encode($data_set);
    }
    
      public function updateSalesPersonTarget() {
            $this->load->model('target/target_model');
        $this->target_model->updateSalesPersonTarget($_REQUEST);
         redirect('target/drawIndexEditTarget');
        
    }
    
    



    
}
