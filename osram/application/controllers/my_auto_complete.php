<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_auto_complete
 *
 * @author Kanchu
 */
class my_auto_complete extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function auto_complete(){
         $this->template->draw('my_sample_works/autocomplete/index',true);
         
        
        
        
        
    }
    public function getItemName() {
        
        $term = $_REQUEST['term'];
        $this->load->model('autocomplete/autocomplete_model');
        $result = $this->autocomplete_model->getItemName($term);
        $json = array();
        foreach ($result AS $val) {
            array_push($json, array("label" => $val->item_name ));
           // "unitprice" => $val->unitprice
        }
        echo json_encode($json);
    }
    //put your code here
}
