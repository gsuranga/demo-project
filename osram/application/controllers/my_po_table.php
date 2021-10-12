<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_po_table
 *
 * @author Kanchu
 */
class my_po_table extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->template->draw('my_sample_works/my_po_table/my_po_table_index',TRUE);//show the index page
        
    }
    public function get_po_data(){
        //echo "aq";
        $this->load->model('my_po_table/my_po_table_model');
        //$tabledata['get_po_data']= $this->my_po_table_model->get_po_data();
        $extraData= $this->my_po_table_model->get_po_data();
        $this->template->draw('my_sample_works/my_po_table/get_data',false,$extraData);
        
        
    }
    //put your code here
}
