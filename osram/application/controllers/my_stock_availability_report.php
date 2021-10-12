<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_stock_availability_report
 *
 * @author Kanchu
 */
class my_stock_availability_report extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function stock_availability() {
        
        $this->template->attach($this->resours);
        $this->template->draw('my_stock_availability_report/my_stock_availability_report',true);
    }
    
    public function getStockAvailability(){
        $this->template->attach($this->resours);
        $this->load->model('my_stock_availability_report/my_stock_availability_report_model');
        $viewStock = $this->my_stock_availability_report_model->stockAvailability($_REQUEST);
        $this->template->draw('my_stock_availability_report/my_stock_availability',false,$viewStock);
        
    }
    //put your code here
}
