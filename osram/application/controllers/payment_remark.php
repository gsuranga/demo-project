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
class payment_remark extends C_Controller{
    
     private $resours = array(
        'JS' => array(),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    }
    
    public function paymentremarkindex(){
        $this->template->draw('paymet_remark/paymet_remark_index',TRUE);
    }
    
    public function getpaymentremark(){
        $this->load->model('payment_remark/payment_remark_model');        
        $extraData['getpaymentremark'] = $this->payment_remark_model->getpaymentremark();        
        $this->template->draw('paymet_remark/payment_remark',FALSE,$extraData);
    }
}

?>
