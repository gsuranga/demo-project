<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_type
 *
 * @author Iresha Lakmali
 */
class user_type extends C_Controller {

    private $resours = array(
        'JS' => array(''),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexUserType() {
        $this->template->attach($this->resours);
        $this->template->draw('usertype/index_user_type', true);
    }

    public function drawCreateUserType() {
        $this->template->draw('usertype/create_user_type', false);
    }

    public function drawViewAllUserType() {
        $this->load->model('usertype/user_type_model');
        $viewAllUserType = $this->user_type_model->viewAllUserType();
        $this->template->draw('usertype/view_all_user_type', false, $viewAllUserType);
    }

    public function drawManageUserType() {
        $this->template->draw('usertype/manage_user_type', false);
    }

//    public function createUserType() {
//        $this->form_validation->set_rules('user_type', 'User Type', 'required');
//        if ($this->form_validation->run()) {
//            $this->load->model('usertype/user_type_model');
//            $this->user_type_model->createUserType($_POST);
//            redirect('user_type/drawIndexUserType');
//        }  else {
//            $this->drawIndexUserType();
//        }
//    }
    
    public function createUserType() {

        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('usertype/user_type_model');
            $insertUserType = $this->user_type_model->createUserType($_POST);
            if ($insertUserType) {
                $this->session->set_flashdata('insert_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Added UserType</spam>');
            } else {
                $this->session->set_flashdata('insert_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">User Type Alredy Exist</spam>');
            }

            redirect('user_type/drawIndexUserType');
        } else {
            $this->drawIndexUserType();
        }
    }
    
    

    public function deleteUserType() {
        $this->load->model('usertype/user_type_model');
        $this->user_type_model->deleteUserType($_REQUEST);
        redirect('user_type/drawIndexUserType');
    }

//    public function updateUserType() {
//        $this->form_validation->set_rules('m_user_type', 'User Type', 'required');
//        if($this->form_validation->run()){
//            $this->load->model('usertype/user_type_model');
//        $this->user_type_model->updateUserType($_POST);
//        redirect('user_type/drawIndexUserType');
//            
//        }  else {
//            $this->drawIndexUserType();
//            
//        }
//        
//    }
    
    public function updateUserType() {

        $this->form_validation->set_rules('m_user_type', 'User Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('usertype/user_type_model');
            $insertUserType = $this->user_type_model->updateUserType($_POST);
            if ($insertUserType) {
                $this->session->set_flashdata('update_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Updated</spam>');
             
                } else {
                $this->session->set_flashdata('update_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">User Type Alredy Exist</spam>');
           
                
                }

          redirect('user_type/drawIndexUserType');
        } else {
           $this->drawIndexUserType();
        }
    }

}

?>

