<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_cheque_returns
 *
 * @author Iresha Lakmali
 */
class dealer_cheque_returns extends C_Controller {

    private $resours = array(
        'JS' => array('dealerchequereturns/js/dealerchequereturns'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexDealerChequeReturns() {
        $this->template->attach($this->resours);
        $this->template->draw('dealerchequereturns/index_dealer_cheque_returns', true);
    }

    public function drawAllDealerChequeReturns() {
        $this->load->model('dealerchequereturns/dealer_cheque_returns_model');
        $dealerChequeReturns = $this->dealer_cheque_returns_model->dealerChequeReturns();
        $this->template->draw('dealerchequereturns/dealer_cheque', false, $dealerChequeReturns);
    }

    public function drawIndexDealerReturnChequeReason() {
        $this->template->attach($this->resours);
        $this->template->draw('dealerchequereturns/index_dealer_return_cheque_reason', true);
    }

    public function drawDealerReturnChequeReason() {
        $this->template->draw('dealerchequereturns/dealer_return_cheque_reason', false);
    }
    
    public function drawIndexTest(){
         $this->template->attach($this->resours);
        $this->template->draw('dealerchequereturns/index_test', true);
    }

        public function drawReturnSucess(){
        $this->template->draw('dealerchequereturns/test', false);
    }

    public function createDealerReturnChequeReason() {
        $this->load->model('dealerchequereturns/dealer_cheque_returns_model');
        $this->dealer_cheque_returns_model->createDealerReturnChequeReason($_POST);
        redirect('dealer_cheque_returns/drawIndexTest?k=1');
       
    }

    public function drawIndexReturnCheque() {
        $this->template->attach($this->resours);
        $this->template->draw('dealerchequereturns/index_return_cheque', true);
    }

    public function drawDealerReturnCheque() {
        $this->load->model('dealerchequereturns/dealer_cheque_returns_model');
        $dealerReturnCheque = $this->dealer_cheque_returns_model->dealerReturnCheque();
        $this->template->draw('dealerchequereturns/return_cheque', false, $dealerReturnCheque);
    }
    
      public function get_all_dealer_shop_name(){
         $q = strtolower($_GET['term']);
        $this->load->model('dealerchequereturns/dealer_cheque_returns_model');
        $column = array('delar_shop_name', 'delar_id');
        $result = $this->dealer_cheque_returns_model->getAllDealerShopName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}

?>
