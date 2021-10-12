<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload_my_sample
 *
 * @author Kanchu
 */
class upload_my_sample extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    function index()
        {
        $this->load->view('my_sample_works/upload_form/upload_form', array('error' => ' ' ));
        }
    
    function do_upload()
        {
        $config['upload_path'] = 'C:\xampp\htdocs\uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload())
        {
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('my_sample_works/upload_form/upload_form', $error);
        }
        else
        {
        $data = array('upload_data' => $this->upload->data());
        $this->load->view('my_sample_works/upload_form/upload_success', $data);
        }
        }
    
    
    //put your code here
}
