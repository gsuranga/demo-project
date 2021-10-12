<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch_type
 *
 * @author Iresha Lakmali
 */
class branch_type extends C_Controller {

    private $resours = array(
        'JS' => array('subbranch/js/subbranch'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function indexBranchType() {
        $this->template->attach($this->resours);
        $this->template->draw('branchtype/index_branch_type', true);
    }

    public function drawCreateBranchType() {
        $this->template->draw('branchtype/create_branch_type', false);
    }

    public function viewAllBranchType() {
        $this->load->model('branchtype/branch_type_model');
        $viewAllBranchType = $this->branch_type_model->viewAllBranchType();
        $this->template->draw('branchtype/view_all_branch_type', false, $viewAllBranchType);
    }

    public function createBranchType() {
        $this->load->model('branchtype/branch_type_model');
        $this->branch_type_model->createBranchType($_POST);
        redirect('branch_type/indexBranchType');
    }

    public function drawManageBranchType() {
        $this->template->draw('branchtype/manage_branch_type', false);
    }

    //    <!--widuranga_jayawickrama-->
    public function deleteBranchType() {
        $this->load->model('branchtype/branch_type_model');
        $id = $this->input->get('branch_type_id');
        $this->branch_type_model->remooveBranchType($id);
        redirect('branch_type/indexBranchType');
    }
    //    <!--widuranga_jayawickrama-->

    public function manageBranchType() {
        $this->load->model('branchtype/branch_type_model');
        $this->branch_type_model->manageBranchType($_POST);
        redirect('branch_type/indexBranchType');
    }
    
  
    public function indexSubBranchPopup() {
        $this->template->attach($this->resours);
        $this->template->draw('branch/index_sub_branch_popup', true);
    }
    
    
     public function drawSubBranchPopup() {
        $this->template->draw('branch/sub_branch_popup', false);
    }
    

}

?>
