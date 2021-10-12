<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paymenthistory
 *
 * @author Iresha Lakmali
 */
class payment_history extends C_Controller {

    private $resours = array(
        'JS' => array('paymenthistory/js/paymenthistory'),
        'CSS' => array(''));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexPaymentHistory() {
        $this->template->attach($this->resours);
        $this->template->draw('paymenthistory/index_payment_history', true);
    }
    
     public function drawDealerPayment() {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $_REQUEST['token_delar_deliver_order_id']);
        $extraData['outlet_details'] = $this->delar_payment_model->getDealerDetail($column);
        $extraData['cash'] = $this->delar_payment_model->getLastPaymentCashTot($column);
        $extraData['chq'] = $this->delar_payment_model->getLastPaymentChqueTot($column);
        $extraData['salesCash'] = $this->delar_payment_model->getCashPayment($column);
        $extraData['saleschq'] = $this->delar_payment_model->getChePayment($column);
        $extraData['getDepostPayment'] = $this->delar_payment_model->getDepostPayment($column);
        $extraData['unrealized_cheque_tot'] = $this->delar_payment_model->getAllUnrealizedCheque($column);
        $this->template->draw('delarpayment/dealer_payment', false, $extraData);
    }

    public function drawSearchPayments(){
        $this->load->model('paymenthistory/payment_history_model');
        $searchPayment = $this->payment_history_model->searchPayment();
        $this->template->draw('paymenthistory/search_payment_history',false,$searchPayment);
        
    }
    
    public function get_all_dealer_name(){
         $q = strtolower($_GET['term']);
        $this->load->model('paymenthistory/payment_history_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->payment_history_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function drawIndexDealerPaymentDetail(){
         $this->template->attach($this->resours);
        $this->template->draw('paymenthistory/index_payment_detail',true);
    }

        public function drawDealerPaymentDetail(){ 
           $this->template->draw('paymenthistory/search_payment_detail',false);
        
    }
    
    public function drawPaymentHistory() {
        $this->load->model('paymenthistory/payment_history_model');
        $cashPaymentHistory = $this->payment_history_model->cashPaymentHistory();
        $this->template->draw('paymenthistory/cash_payment_history',false,$cashPaymentHistory);
    }
    
    public function drawChequePayment(){
        $this->load->model('paymenthistory/payment_history_model');
        $chequePaymentHistory = $this->payment_history_model->chequePaymentHistory();
        $this->template->draw('paymenthistory/cheque_payment_history',false,$chequePaymentHistory);
    }
    
    public function drawBankDepositPayment(){
       $this->load->model('paymenthistory/payment_history_model'); 
       $bankDepositPayment = $this->payment_history_model->bankDepositPayment();
        $this->template->draw('paymenthistory/bank_deposit_payment_history',false,$bankDepositPayment);
    }

        public function drawCreditPayment(){
        $this->load->model('paymenthistory/payment_history_model');
        $creditPaymentHistory = $this->payment_history_model->creditPaymentHistory();
        $this->template->draw('paymenthistory/credit_payment_history',false,$creditPaymentHistory);
    }
    
    public function getAllPayment(){
        $this->load->model('paymenthistory/payment_history_model');
        $allPayment = $this->payment_history_model->getAllPayment();
        $this->template->draw('paymenthistory/credit_payment_history',false,$allPayment);
    }
    
    
    
    
    
   

}

?>
