<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 *
 * @author Iresha
 */
class email extends C_Controller {

    private $resours = array(
        'JS' => array('email/js/jquery.showpassword'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexConfigEmail() {
        $this->template->attach($this->resours);
        $this->template->draw('email/index_config_email', true);
    }

    public function drawConfigEmail() {
        $this->load->model('email/email_model');
        $currentEmail = $this->email_model->getCurrentEmail();
        $this->template->draw('email/config_email', false, $currentEmail);
    }

    public function updateEmailPassword() {

        $this->form_validation->set_rules('mail_password', 'Password', 'trim|required|matches[hidden_password]');
        $this->form_validation->set_rules('hidden_password', '', 'required');
        $this->form_validation->set_rules('conform_password', 'Password Confirmation', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('email/email_model');
            $this->load->library('encrypt');
            $this->load->library('form_validation');
            
            $updateEmailPassword = $this->email_model->updateEmailPassword($_POST);
            
              if ($updateEmailPassword) {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#2E9AFE;padding:2px;border-radius: 10px 5px 10px 5px">Succussfully Password Updated</spam>');
            } else {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#FA5858;padding:2px;border-radius: 10px 5px 10px 5px">Update Fail</spam>');
            }
            redirect('email/drawIndexConfigEmail');
        }  else {
            
            $this->drawIndexConfigEmail();
            
        }



        
    }

}

?>
