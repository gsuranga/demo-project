<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paymentsummary
 *
 * @author kanishka
 */
class paymentsummary extends C_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
     private $resours = array(
        'JS' => array('payment/js/payment'),
        'CSS' => array());
    
    public function indexPaymentSummary(){
        $this->template->attach($this->resours);
        $this->template->draw('payment/indexPaymentSummary', true);
    }
    
    public function drawSummary(){
        $this->load->model('payment/payment_summary_model');
        $extraData['getSalesOrderIDs'] = $this->payment_summary_model->getSalesOrderIDs();
        if(isset($_REQUEST['txt_empsonamehid']) && $_REQUEST['txt_empsonamehid'] != '') {
            $this->template->draw('payment/paymentsummary', FALSE,$extraData);
        }  else {
            $this->template->draw('payment/paymentsummary', FALSE);
        }
        
    }
    
    public function getEmployeNames(){
        $q = strtolower($_GET['term']);
        $this->load->model('payment/payment_summary_model');
        $column = array('fullname', 'id_employee_has_place');
        $result = $this->payment_summary_model->getEmpployeNamesByso($column , $q );
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function getexsiststempSummary($salesorder = ''){
        $this->load->model('payment/payment_summary_model');
        $extraData['tempPaymentSummary'] = $this->payment_summary_model->gettempPaymentSummary($salesorder);
        $this->template->draw('payment/smtemp', FALSE,$extraData);
        
    }
    
    public function getexsistsdisSummary($salesorder = ''){
        $this->load->model('payment/payment_summary_model');
        $extraData['dispaymentSummary'] = $this->payment_summary_model->getDispaymentSummary($salesorder);
        $this->template->draw('payment/smdis', FALSE,$extraData);
    }
    
    
}

?>
