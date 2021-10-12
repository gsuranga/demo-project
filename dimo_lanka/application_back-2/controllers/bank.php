<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bank
 *
 * @author Iresha Lakmali
 */
class bank extends C_Controller {

    private $resours = array(
        'JS' => array('branch/js/branch'),
        'CSS' => array('branch/css/tsc_pagination'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexBank() {
        $this->template->attach($this->resours);
        $this->template->draw('bank/index_bank', true);
    }

    public function drawCreateBank() {
        $this->template->draw('bank/create_bank', false);
    }

    public function drawViewAllBank() {
        $this->load->model('bank/bank_model');
        $viewAllBank = $this->bank_model->viewAllBank();
        $this->template->draw('bank/view_all_bank', false, $viewAllBank);
    }

    public function drawManageBank() {
        $this->template->draw('bank/manage_bank', false);
    }

    public function createBank() {
        $this->form_validation->set_rules('bank_name', 'Bank', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('bank/bank_model');
            $insertBankType = $this->bank_model->createBank($_POST);

            if ($insertBankType) {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered a Bank</spam>');
            } else {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Bank name already exist</spam>');
            }
            redirect('bank/drawIndexBank');
        } else {
            $this->drawIndexBank();
        }
    }

    public function updateBank() {
        $this->load->model('bank/bank_model');
        $this->bank_model->updateBank($_POST);
        redirect('bank/drawIndexBank');
    }

    public function deleteBank() {
        $this->load->model('bank/bank_model');
        $id = $this->input->get('bank_id');
        $this->bank_model->deleteBank($id);
        redirect('bank/drawIndexBank');
    }

}

?>
