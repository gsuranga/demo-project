<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch
 *
 * @author Iresha Lakmali
 */
class branch extends C_Controller {

    private $resours = array(
        'JS' => array('branch/js/branch'),
        'CSS' => array('branch/css/tsc_pagination'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexBranch() {
        $this->template->attach($this->resours);
        $this->template->draw('branch/index_branch', true);
    }

    public function get_area_names() {
        $q = strtolower($_GET['term']);
        $this->load->model('branch/branch_model');
        $column = array('area_name', 'area_id');
        $result = $this->branch_model->getAllArea($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function get_all_branch_type(){
        $q = strtolower($_GET['term']);
        $this->load->model('branch/branch_model');
        $column = array('branch_type_name', 'branch_type_id');
        $result = $this->branch_model->get_all_branch_type($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawCreateBranch() {
        $this->template->draw('branch/create_branch', false);
    }

    public function drawViewAllBranch() {
        $this->load->model('branch/branch_model');
//        $this->load->library("pagination");
//        $config = array();
//        $config["base_url"] = base_url() . "branch/drawIndexBranch";
//        $config["total_rows"] = $this->branch_model->record_count();
//        $config["per_page"] = 5;
//        $config["uri_segment"] = 2;
//        $choice = $config["total_rows"] / $config["per_page"];
//        $config["num_links"] = round($choice);
//        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationB tsc_paginationB02">';
//        $config['full_tag_close'] = '</ul>';
//        $config['prev_link'] = '&lt;';
//        $config['prev_tag_open'] = '<li>';
//        $config['prev_tag_close'] = '</li>';
//        $config['next_link'] = '&gt;';
//        $config['next_tag_open'] = '<li>';
//        $config['next_tag_close'] = '</li>';
//        $config['cur_tag_open'] = '<li class="current"><a href="#">';
//        $config['cur_tag_close'] = '</a></li>';
//        $config['num_tag_open'] = '<li>';
//        $config['num_tag_close'] = '</li>';
//        $config['first_tag_open'] = '<li>';
//        $config['first_tag_close'] = '</li>';
//        $config['last_tag_open'] = '<li>';
//        $config['last_tag_close'] = '</li>';
//        $config['first_link'] = '&lt;&lt;';
//        $config['last_link'] = '&gt;&gt;';
//        $this->pagination->initialize($config);
//        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
//        $extraData["links"] = $this->pagination->create_links();
        $viewAllBranch = $this->branch_model->viewAllBranch();
        $this->template->draw('branch/view_all_branch', false, $viewAllBranch);
    }

    public function drawIndexManageBranch() {
        $this->template->attach($this->resours);
        $this->template->draw('branch/index_manage_branch', true);
    }

    public function drawManageBranch() {
        $this->template->draw('branch/manage_branch', false);
    }

    public function manageBranch() {
      //  $this->form_validation->set_rules('txt_branch_type', 'Branch Type', 'required');
        $this->form_validation->set_rules('branch_code', 'Branch Code', 'required');
        $this->form_validation->set_rules('u_branch_name', 'Branch', 'required');
        $this->form_validation->set_rules('u_branch_account_no', 'Branch Account No', 'required');
        $this->form_validation->set_rules('area_name', 'Area', 'required');
        if ($this->form_validation->run()) {
             $this->load->model('branch/branch_model');
        if (isset($_POST['u_udate_branch'])) {
            $this->branch_model->updateBranch($_POST);
        }

        if (isset($_POST['udelete_branch'])) {
            $this->branch_model->deleteBranch($_POST);
        }
        redirect('branch/drawIndexBranch');
        }  else {
            drawIndexManageBranch();
        }
       
    }

    public function createBranch() {
        $this->form_validation->set_rules('txt_branch_type', 'Branch Type', 'required');
        $this->form_validation->set_rules('branch_code', 'Branch Code', 'required');
        $this->form_validation->set_rules('branch_name', 'Branch', 'required');
        $this->form_validation->set_rules('branch_account_no', 'Branch Account No', 'required');
        $this->form_validation->set_rules('area_name', 'Area', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('branch/branch_model');
            $this->branch_model->createBranch($_POST);
            redirect('branch/drawIndexBranch');
        } else {
               $this->drawIndexBranch();
        }
    }

    public function get_all_sub_branch() {

        $q = strtolower($_GET['term']);
        $this->load->model('branch/branch_model');
        $column = array('sub_branch_name', 'sub_branch_id');
        $result = $this->branch_model->get_all_sub_branch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //

    public function drawCreateBranchType() {
        $this->template->draw('branch/all_branch_type', false);
    }

    public function getAllBranchType($type) {
        $this->load->model('branch/branch_model');
        $allBranchType = $this->branch_model->getAllBranchType($type);
        $this->template->draw('branch/all_branch_type', false, $allBranchType);
    }
    
    public function drawIndexSubBranchPopup() {
        $this->template->attach($this->resours);
        $this->template->draw('branch/index_sub_branch_popup', true);
    }
     public function drawSubBranchPopup() {
         $this->load->model('branch/branch_model');
         $allSubBranchPopup = $this->branch_model->allSubBranchPopup();
        $this->template->draw('branch/sub_branch_popup', false,$allSubBranchPopup);
    }

}

?>
