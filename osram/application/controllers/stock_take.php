<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_take
 *
 * @author chathun
 */
class stock_take extends C_Controller{
    
     private $resours = array(
        'JS' => array('stocktake/js/stock_take'),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    }
    
    public function stocktakeindex(){
        $this->template->attach($this->resours);
        $this->template->draw('stocktake/stocktakeindex',TRUE);
    }
    
    public function getStockTake(){
        $this->template->attach($this->resours);
        $this->load->model('stock_take/stock_take_model');        
        $extraData['getStockTake'] = $this->stock_take_model->getStockTake();        
        $this->template->draw('stocktake/stock_take',FALSE,$extraData);
    }
}

?>
