<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home_my
 *
 * @author Kanchu
 */
session_start(); //we need to call PHP's session object to access it through C
class home_my extends C_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    function index()
         {
           if($this->session->userdata('logged_in'))
           {
             $session_data = $this->session->userdata('logged_in');
             $data['username'] = $session_data['username'];
             $this->load->view('home_view', $data);
           }
           else
           {
             //If no session, redirect to login page
             redirect('login', 'refresh');
           }
         }

     function logout()
         {
           $this->session->unset_userdata('logged_in');
           session_destroy();
           redirect('home_view', 'refresh');
         }
    //put your code here
}
?>