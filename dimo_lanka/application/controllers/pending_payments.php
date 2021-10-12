<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pending_payments
 *
 * @author Iresha Lakmali
 */
class pending_payments extends C_Controller{
    
     private $resours = array(
        'JS' => array('pendingpayments/js/pendingpayments'),
        'CSS' => array(''));

    
    public function __construct() {
        parent::__construct();
    }
    
    public function drawIndexPendingPayments(){
        $this->template->attach($this->resours);
        $this->template->draw('pendingpayments/index_pending_payments', true); 
    }
    
    public function drawViewAllPendingPayments(){
        $this->load->model('pendingpayments/pending_payments_model');
        $searchPendingPayment = $this->pending_payments_model->searchPendingPayment();
        $this->template->draw('pendingpayments/view_all_pending_payments',false,$searchPendingPayment); 
    }
    
    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->delar_payment_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    
   
}

?>
