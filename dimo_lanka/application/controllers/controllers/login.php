<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Iresha Lakmali
 */
class login extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    public function drawIndexLogin() {
        if (parent::getAuthStatus()) {
            $this->template->draw('index/index', true);
        } else {
            $this->template->draw('login/index', false);
        }
    }

    public function checkAuthentication() {
        $txt_user_name = $this->input->post('txt_user_name');
        $txt_password = $this->input->post('txt_password');
        //id | name  | username | password                                  | privilage | status | date       | time     | type
        $this->load->library('encrypt');
        $this->load->model('login/login_model');
        $decode = $this->encrypt->encode($txt_password);
        $checkLoginDetail = $this->login_model->checkLoginDetail($txt_user_name, $decode);

        $item_array = array();

        if ($this->encrypt->decode($checkLoginDetail[0]['password']) == $txt_password) {
            if (count($checkLoginDetail) > 0) {
                $employee = $this->login_model->getemployee($checkLoginDetail[0]['id']);
               
                $employee_id = '';

                if (count($employee) > 0) {
                    $employee_id = $employee[0]['employee_id'];
                    echo $employee_id;
                } else {
                    $employee_id = 0;
                }
                $salesoffid = 0;
                $salesoffids = $this->login_model->getsalesoffid($checkLoginDetail[0]['username']);
                if(count($salesoffids) > 0){
                    $salesoffid = $salesoffids[0]->sales_officer_id;
                }
                foreach ($checkLoginDetail as $value) {
                    $user_detail = array(
                        'id' => $value['id'],
                        'username' => $value['username'],
                        'name' => $value['name'],
                        'typename' => $value['typename'],
                        'typeid' => $value['typeid'],
                        'employe_id' => $employee_id,
                        'sales_officer_id' => $salesoffid,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($user_detail);
                    $this->session->userdata('validated');
                    redirect('index/index');
                }
            } else {
                redirect('login/drawIndexLogin');
            }
        } else {
            redirect('login/drawIndexLogin');
        }
    }

    function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('/login/drawIndexLogin');
    }

}
