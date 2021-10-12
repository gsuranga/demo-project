<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of budget
 *
 * @author SHDINESH
 */
class budget extends C_Controller {

    private $resource = array(
        'JS' => array('budget/js/budget', 'budget/js/jquery.mtz.monthpicker'),
        'CSS' => array('')
    );

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexBudget() {
        $this->template->attach($this->resource);
        $this->template->draw('budget/index_budget', true);
    }

    public function drawIndexManageBudget() {
        $this->template->attach($this->resource);
        $this->template->draw('budget/index_manage_budget', true);
    }

    public function drawInsertBudget() {
        $this->template->draw('budget/insert_budget', false);
    }

    public function drawManageBudget() {
        $this->template->draw('budget/manage_budget', false);
    }

    public function drawInsertSalesTypeBudget() {
        $this->load->model('budget/budget_model');
        $allSalesTypes = $this->budget_model->getAllSalesTypes();
        $this->template->draw('budget/inser_sales_type_wise_budget', false, $allSalesTypes);
    }

    public function drawUpdateSalesTypeBudget() {
        $this->template->draw('budget/update_sales_type_wise_budget', false);
    }

    public function loadUpdateSalesTypeBudget() {
        $get = $this->input->get('date_period');
        $this->load->model('budget/budget_model');
        $data = array();
        $salesTypesForUpdate = $this->budget_model->getAllSalesTypesForUpdate($get);
        array_push($data, $salesTypesForUpdate);
        echo json_encode($data);

        //$this->template->draw('budget/inser_sales_type_wise_budget', false, $salesTypesForUpdate);
    }

    public function updateSalesTypeBudget() {
        $this->load->model('budget/budget_model');
        $this->budget_model->updateSalesTypeBudget($_POST);
    }

    public function insertSalesTypeWiseBudget() {
        $this->load->model('budget/budget_model');
        $allSalesTypes = $this->budget_model->insertSalesTypeWiseBudget($_POST);
        redirect('budget/drawIndexBudget');
    }

    public function insertSalesOfficerWiseBudget() {
        $this->load->model('budget/budget_model');
        $allSalesTypes = $this->budget_model->insertSalesOfficerWiseBudget($_POST);
        redirect('budget/drawIndexBudget');
    }

    public function insertAreaWiseBudget() {
        $this->load->model('budget/budget_model');
        $areaWiseBudget = $this->budget_model->insertAreaWiseBudget($_POST);
        redirect('budget/drawIndexBudget');
    }

    public function insertBranchWiseBudget() {
        $this->load->model('budget/budget_model');
        $branchWiseBudget = $this->budget_model->insertBranchWiseBudget($_POST);
        redirect('budget/drawIndexBudget');
    }

    public function drawInsertAreaWiseBudget() {
        $this->load->model('budget/budget_model');
        $allAreas = $this->budget_model->getAllAreas();
        $this->template->draw('budget/insert_area_wise_budget', false, $allAreas);
    }

    public function drawInsertBranchWiseBudget() {
        $this->load->model('budget/budget_model');
        $allBranches = $this->budget_model->getAllBranches();
        $this->template->draw('budget/insert_branch_wise_budget', false, $allBranches);
    }

    public function drawInsertSalesOfficerViceBudget() {
        $this->load->model('budget/budget_model');
        $allBranches = $this->budget_model->getAllBranches();
        $this->template->draw('budget/insert_sales_person_wise_budget', false);
    }

    public function loadBranchWiseSalesOfficers() {
        $branch_id = $this->input->get('hidden_branch_id');
        $this->load->model('budget/budget_model');
        $data_set = array();
        $branchWiseSalesPersons = $this->budget_model->getBranchWiseSalesPersons($branch_id);
        array_push($data_set, $branchWiseSalesPersons);
        echo json_encode($data_set);
    }

    public function getAllBranches() {
        $q = strtolower($_GET['term']);
        $this->load->model('budget/budget_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->budget_model->loadAllBranches($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}
