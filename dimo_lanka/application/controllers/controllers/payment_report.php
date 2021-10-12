<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment_report
 *
 * @author Iresha Lakmali
 */
class payment_report extends C_Controller{
    
     private $resours = array(
        'JS' => array('apm/js/apm'),
        'CSS' => array());
    
    public function __construct() {
        parent::__construct();
    }
    
    public function drawIndexPaymentReport(){
        $this->template->attach($this->resours);
        $this->template->draw('paymentreport/index_payment_report',true);
    }
    
    public function drawPaymentReport(){
        $this->load->model('paymentreport/payment_report_model');
        $report_payment = $this->payment_report_model->reportPayment();
        $this->templatedraw('payment_report/total_payment',false,$report_payment);
        
    }
    
    public function drawIndexManageReport(){
        $this->template->attach($this->resours);
        $this->template->draw('paymentreport/index_manage_payment_report',true);      
    }
    
    
    public function drawManagePaymentReport(){
        $this->load->model('paymentreport/payment_report_model');
        $managePaymentReport = $this->payment_report_model->managePaymentReport();
        $this->template->draw('paymentreport/manage_payment_report',false,$managePaymentReport);
    }
    
    public function drawManagePaymentsReport(){
    $this->load->model('paymentreport/payment_report_model');
        $paymentReports = $this->payment_report_model->paymentReports();
        $this->template->draw('paymentreport/manage_payment_report',false,$paymentReports);
    }
    
    
    public function drawIndexReport(){
        $this->template->attach($this->resours);
        $this->template->draw('paymentreport/manage_payment_report',true);     
    }
    
    
    public function drawIndexFunction(){
        $this->load->model('paymentreport/payment_report_model');
        $allDealerName = $this->payment_report_model->getAllDealerName();
        $this->template->draw('paymentreport/getAllDealerName',$allDealerName);
    }
    
    public function drawIndexDelarPayment(){
        $this->load->model('paymentreport/payment_report_model');
        $delarPayment = $this->payment_report_model->delarPayment();
        $this->template->draw('paymentreport/delar_payment',false,$delarPayment);
    }
            
 
    
    
  
}

?>
