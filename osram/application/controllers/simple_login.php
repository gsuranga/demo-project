<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of simple_login
 *
 * @author Kanchu
 */
class simple_login extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    function index()
        {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
            $this->form_validation->set_rules('username', 'Username','required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            
        if ($this->form_validation->run() == FALSE)
        {
        $this->load->view('my_sample_works/simple_login/login_form');
        }
        else
        {
        $this->load->view('my_sample_works/simple_login/login_success');
        }
        }
    //put your code here
}
