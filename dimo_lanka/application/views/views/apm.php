<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apm
 *
 * @author Iresha Lakmali
 */
class apm extends C_Controller {

    private $resours = array(
        'JS' => array('apm/js/apm'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexApm() {
        $this->template->attach($this->resours);
        $this->template->draw('apm/index_apm', true);
    }

    public function drawCreateApm() {
        $this->template->draw('apm/create_apm', false);
    }

    public function drawViewAllApm() {
        $this->load->model('apm/apm_model');
        $viewAllAPM = $this->apm_model->viewAllAPM();
        $this->template->draw('apm/view_all_apm', false, $viewAllAPM);
    }

    public function createApm() {
        $this->form_validation->set_rules('apm_code', 'APM Code', 'required');
        $this->form_validation->set_rules('apm_name', 'APM', 'required');
        $this->form_validation->set_rules('apm_address', 'APM Address', 'required');
        $this->form_validation->set_rules('apm_account_no', 'Account No', 'required');
        $this->form_validation->set_rules('apm_tel', 'APM Tel', 'required');
        $this->form_validation->set_rules('email_address', 'E-Mail Address', 'required');
        $this->form_validation->set_rules('branch_name', 'Branch', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('apm/apm_model');
            $this->apm_model->createApm($_POST);
            redirect('apm/drawIndexApm');
        }  else {
            $this->drawIndexApm();
            
        }
    }

    public function get_all_branch() {
        $q = strtolower($_GET['term']);
        $this->load->model('delar/delar_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->delar_model->getAllBranch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexManageApm() {
        $this->template->attach($this->resours);
        $this->template->draw('apm/index_manage_apm', true);
    }

    public function drawManageApm() {
        $this->template->draw('apm/manage_apm', false);
    }

    public function manageApm() {
        $this->load->model('apm/apm_model');
        if (isset($_POST['update_apm'])) {
            $this->apm_model->updateApm($_POST);
            redirect('apm/drawIndexApm');
        }

        if (isset($_POST['delete_apm'])) {
            $this->apm_model->deleteApm($_POST);
            redirect('apm/drawIndexApm');
        }
    }

}

?>
