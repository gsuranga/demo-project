<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_my
 *
 * @author Kanchu
 */
class login_my extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    function index()
     {
       $this->load->helper(array('form'));
       $this->load->view('my_sample_works/login_my/login_view');
     }
    
    //put your code here
}
