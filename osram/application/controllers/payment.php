<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payment
 *
 * @author kanishka
 */
class payment extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('payment/js/payment'),
        'CSS' => array());

    public function indexPayment() {
        $this->template->attach($this->resours);
        $this->template->draw('payment/indexPayment', true);
    }

    public function drawInserPayment() {
        $this->load->model('payment/payment_model');
        $column = array('id_sales_order' => $_REQUEST['token']);
        $extraData['salesOrderDetails'] = $this->payment_model->getSalesOrderDetails($column);
        $extraData['salesCash'] = $this->payment_model->getCashPayment($column);
        $extraData['saleschq'] = $this->payment_model->getChePayment($column);
        $extraData['pay_date'] = $this->payment_model->getLastPaymentCredit($column);//
       
        $extraData['cash'] = $this->payment_model->getLastPaymentCashTot($column);
        $extraData['chq'] = $this->payment_model->getLastPaymentChqueTot($column);
        $this->load->model('salesorder/salesorder_model');
        $column_mr = array('id_sales_order' =>  $_REQUEST['token'], 'id_return_type' => '2', 'return_note_status' => '1');
        $column_sr = array('id_sales_order' =>  $_REQUEST['token'], 'id_return_type' => '1', 'return_note_status' => '1');
        $id_sales_order = array('id_sales_order' =>  $_REQUEST['token'], 'outlet_has_branch_status' => '1');
        $extraData['sales_amount'] = $this->salesorder_model->getSalesAmount($_REQUEST['token']);
        $extraData['market_amount'] = $this->salesorder_model->getMarkeReturntAmount($column_mr);
        $extraData['return_amount'] = $this->salesorder_model->getSalesRetturnAmount($column_sr);
        $extraData['id_sales_order'] = $this->salesorder_model->getOutletDetails($id_sales_order);
        $this->template->draw('payment/inserPayment', false, $extraData);
    }

    public function drawPaymentDetails() {
        //$this->load->model('payment/payment_model');
        //$column = array('id_sales_order' => $_REQUEST['token'] );
        //$inviceNumber = $this->payment_model->getInviceNumber($column);
        $this->template->draw('payment/paymentDetails', false);
    }
    
    public function drawPaymentHistoryDetails() {
        $column = array('id_sales_order' => $_REQUEST['token']);
        $extraData['getCashHistory'] = $this->payment_model->getCashHistory($column);
        $extraData['getChequeHistory'] = $this->payment_model->getChequeHistory($column);
        $extraData['getCreditHistory'] = $this->payment_model->getCreditHistory($column);
        $this->template->draw('payment/paymentHistory', false ,$extraData);
    }

    public function drawCreditDetails() {
        $this->template->attach($this->resours);
        $this->load->model('payment/payment_model');
        $column = array('id_sales_order' => $_REQUEST['token']);
        $extraData['lastPaymentCredit'] = $this->payment_model->getLastPaymentCredit($column);
        $extraData['salesCashnew'] = $this->payment_model->getCashPayment($column);
        $extraData['saleschqnew'] = $this->payment_model->getChePayment($column);
        $extraData['credit_status'] = $this->payment_model->getCurrentCreditAmount($column);
        $this->template->draw('payment/insertCredit', false , $extraData);
    }
    
    public function drawcheuetDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('payment/chequeDetails', false);
    }

    public function getBanks() {
        $this->load->model('bank/bank_model');
        $bank = $this->bank_model->getBank();
        if (count($bank) > 0) {
            echo json_encode($bank);
        }
    }

   

        public function inserPayment() {
        $chamount = 0;

        if (isset($_POST['btn_cash']) && $_POST['btn_cash'] != '') {
            $this->load->model('payment/payment_model');
            $this->payment_model->inserCash();
            
        }

        if (isset($_POST['btn_ch']) && $_POST['btn_ch'] != '' && $_POST['hidden_table_row'] != '') {
            $row_count = $_POST['hidden_table_row'];
            $row_count++;

            for ($var = 1; $var < $row_count; $var++) {
                if (isset($_POST['cmb_banks_' . $var]) && isset($_POST['txt_chq_' . $var])) {
                    $data = array(
                        'id_sales_order' => $_POST['id_sales_ordertoken'],
                        'id_bank' => $_POST['cmb_banks_' . $var],
                        'cheque_no' => $_POST['txt_chq_' . $var],
                        'cheque_payment' => $_POST['txt_amount_' . $var],
                        'realized_date' => $_POST['txt_cl_' . $var],
                        'added_date' => date('Y:m:d'),
                        'added_time' => date('H:i:s')
                    );
                    $chamount += $_POST['txt_amount_' . $var];
                    $this->load->model('payment/payment_model');
                    $this->payment_model->insertCheq($data);
                }
            }
        }
        
        $sales_order = $_POST['net_total_as_value']; 
        $net_crdeit = 0;
        
            $column = array('id_sales_order' => $_REQUEST['id_sales_ordertoken']);
            $data_cash = $this->payment_model->getCashPayment($column);
            $data_ch = $this->payment_model->getChePayment($column);
            $tot = $sales_order;
            $net_crdeit = 0;
            $net_crdeit_cash = 0;
            $net_crdeit_credit = 0;
            
            if(count($data_cash) > 0){
               $net_crdeit_cash = $data_cash[0]['total_cash'];
            }
            
            if(count($data_ch) > 0){
                $net_crdeit_credit = $data_ch[0]['total_cheq'];
            }
            $net_crdeit = $tot - ($net_crdeit_credit + $net_crdeit_cash);
            if($sales_order > $net_crdeit){
                $this->payment_model->inserCredit($net_crdeit);
            }
             $this->session->set_flashdata('insert_payment', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Payment</spam>');
            redirect('salesorder/drawindexSearchSalesOrder');
    }
    
    

}

?>
