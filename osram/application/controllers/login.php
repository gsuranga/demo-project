<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author chathun
 */
class Login extends C_Controller {

    //put your code here

    function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    /**
     * Function drawIndexBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function index() {
        if (parent::getAuthStatus()) {
            $this->template->draw('index/index', true);
            //$this->template->draw('index/index', true);
        } else {
            $this->template->draw('login/index', false);
        }
    }

    /**
     * Function drawIndexBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function checkAuthentication() {
        $username = $this->input->post('user_name');
        $password = $this->input->post('password');
        $this->load->library('encrypt');
        $this->load->model('login/login_model');
        $result = $this->login_model->get_User_From_User_Name($username, 1);


        if (count($result) > 0 && $result != null) {

            foreach ($result as $value) {

                if ($this->encrypt->decode($value['user_password']) == $password) {

                    

                    $userSessionData = array(
                        'id_user' => $value['id_user'],
                        'id_employee' => $value['id_employee'],
                        'employee_first_name' => $value['employee_first_name'],
                        'employee_last_name' => $value['employee_last_name'],
                        'id_user_type' => $value['id_user_type'],
                        'user_username' => $value['user_username'],
                        'user_token' => $value['user_token'],
                        'id_user_type' => $value['id_user_type'],
                        'user_type' => $value['user_type'],
                        'id_employee_registration' => $value['id_employee_registration'],
                        'id_physical_place' => $value['id_physical_place'],
                        'id_employee_has_place' => $value['id_employee_has_place'],
                        'logged_in' => TRUE);
                    $this->session->set_userdata($userSessionData);

                    $this->session->userdata('validated');
                    
                    redirect('/index/index');
                }  else {
                    $path = '<img width="45" height="45" src="' . base_url() . 'public/osram_images/login_error_pic.png"/>';
                    $this->session->set_flashdata('error_image', $path);
                    $this->session->set_flashdata('login_error', ' <br><span style="font-size: 10px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Enter correct Username / Password</span>');
                    redirect('/login/index');
                    
                }
            }
        } else {
            $path = '<img width="45" height="45" src="' . base_url() . 'public/osram_images/login_error_pic.png"/>';
            $this->session->set_flashdata('error_image', $path);
            $this->session->set_flashdata('login_error', ' <br><span style="font-size: 10px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Enter correct Username / Password</span>');
            redirect('/login/index');
        }
    }
    

    /**
     * Function drawIndexBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('/login/index');
    }

}

?>
