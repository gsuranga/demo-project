<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verify_login_my
 *
 * @author Kanchu
 */
class verify_login_my extends C_Controller{

    function __construct()
     {
       parent::__construct();
       
     }

     function index()
         {
            $this->load->model('user_my/user_my_model',TRUE);
           //This method will have the credentials validation
           $this->load->library('form_validation');

           $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
           $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

           if($this->form_validation->run() == FALSE)
           {
             //Field validation failed.  User redirected to login page
             $this->load->view('login_view');
           }
           else
           {
             //Go to private area
             redirect('home_my', 'refresh');
           }

         }

    function check_database($password)
         {
           //Field validation succeeded.  Validate against database
           $username = $this->input->post('username');

           //query the database
           $result = $this->user->login($username, $password);
          //  $result = $this->user->login($username, $password);

           if($result)
           {
             $sess_array = array();
             foreach($result as $row)
             {
               $sess_array = array(
                 'id' => $row->id,
                 'username' => $row->username
               );
               $this->session->set_userdata('logged_in', $sess_array);
             }
             return TRUE;
           }
           else
           {
             $this->form_validation->set_message('check_database', 'Invalid username or password');
             return false;
           }
         }
    
    //put your code here
}
