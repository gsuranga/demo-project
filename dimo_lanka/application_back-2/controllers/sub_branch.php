<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sub_branch
 *
 * @author Iresha Lakmali
 */
class sub_branch extends C_Controller {

    private $resours = array(
        'JS' => array('subbranch/js/subbranch'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function indexSubBranch() {
        $this->template->attach($this->resours);
        $this->template->draw('subbranch/index_sub_branch', true);
    }

    public function drawCreateSubBranch() {
         $this->template->draw('subbranch/create_sub_branch', false);
    }
    
     public function viewAllSubBranch() {
         $this->load->model('subbranch/sub_branch_model');
         $viewAllSubBranch = $this->sub_branch_model->viewAllSubBranch();
         $this->template->draw('subbranch/view_all_sub_branch', false,$viewAllSubBranch);
    }
    
    public function createSubBranch(){
        $this->load->model('subbranch/sub_branch_model');
        $this->sub_branch_model->createSubBranch($_POST);
       redirect('sub_branch/indexSubBranch');
    }
    
    public function drawManageSubBranch(){
        $this->template->draw('subbranch/manage_sub_branch', false);
    }
    //    <!--widuranga_jayawickrama-->
    public function deleteSubBranch() {
        $this->load->model('subbranch/sub_branch_model');
        $id = $this->input->get('sub_branch_id');
        $this->sub_branch_model->remooveSubBranch($id);
        redirect('sub_branch/indexSubBranch');
    }

    //    <!--widuranga_jayawickrama-->

    
     public function manageSubBranch(){
        $this->load->model('subbranch/sub_branch_model');
        $this->sub_branch_model->manageSubBranch($_POST);
         redirect('sub_branch/indexSubBranch');
    }
    

}

?>
