<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delar_payment
 *
 * @author Iresha Lakmali
 */
class delarpayment extends C_Controller {

    private $resours = array(
        'JS' => array('delarpayment/js/delarpayment'),
        'CSS' => array('delar/css/tsc_pagination'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexDelarPayment() {
        $this->template->attach($this->resours);
        $this->template->draw('delarpayment/index_delar_payment', true);
    }

    public function drawViewAllDelarPayment() {
        $this->load->model('delarpayment/delar_payment_model');
        $viewAllDelarPayment = $this->delar_payment_model->viewAllDelarPayment($_POST);
        $this->template->draw('delarpayment/view_all_deliver_notes', false, $viewAllDelarPayment);
    }

    public function drawcash($cash) {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $cash);
        $extraData['salesCashnew'] = $this->delar_payment_model->getCashPayment($column);
        if ($extraData['salesCashnew'][0]['total_cash'] != '') {
            echo number_format($extraData['salesCashnew'][0]['total_cash'], 2);
        } else {
            echo number_format(0, 2);
        }
    }
    
    public function progressreturn(){
        $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['id'];
         $vno = $_REQUEST['idd'];
         $user = $_REQUEST['user'];
         $this->delar_payment_model->updateprogressreturn($id,$vno,$user); 
        
        
    }

    public function drawcheque($cheque) {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $cheque);
        $extraData['saleschq'] = $this->delar_payment_model->getChequePayment($column);
     //   $extraData['return_cheque'] = $this->delar_payment_model->getRejectCheque($column);

        if ($extraData['saleschq'][0]['total_cheq'] != '') {
            echo number_format($extraData['saleschq'][0]['total_cheq'], 2);
        } else {
            echo number_format(0, 2);
        }
    }

    public function drawccredit($credit) {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $credit);
        $extraData['credit_status'] = $this->delar_payment_model->getCurrentCreditAmount($column);
        echo $extraData['credit_status'];
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

    public function getDueDate($due_date) {
        $this->load->model('delarpayment/delar_payment_model');
        $dueDate = $this->delar_payment_model->getDueDate($due_date);

        echo $dueDate[0]['due_date'];
    }

    public function drawBankDeposit($deposit) {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $deposit);
        $extraData['salesDepositnew'] = $this->delar_payment_model->getBankDepositPayment($column);
        if ($extraData['salesDepositnew'][0]['total_deposit'] != '') {
            echo number_format($extraData['salesDepositnew'][0]['total_deposit'], 2);
        } else {
            echo number_format(0, 2);
        }
    }

    public function remainigdates($due_date) {
        $this->load->model('delarpayment/delar_payment_model');
        $dueDate = $this->delar_payment_model->getDueDate($due_date);
        if (count($dueDate) > 0) {
            $due_count = $dueDate[0]['due_date'];
            $now = time();
            $your_date = strtotime($due_count);
            $datediff = $your_date - $now;
            echo floor($datediff / (60 * 60 * 24)) . " Days";
        } else {
            echo 0;
        }
    }

    public function drawIndexPayments() {

        $this->template->attach($this->resours);
        $this->template->draw('delarpayment/index_payments', TRUE);
    }

    public function drawDealerPayment() {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $_REQUEST['token_delar_deliver_order_id']);
        $extraData['outlet_details'] = $this->delar_payment_model->getDealerDetail($column);
        $extraData['getDepostPayment'] = $this->delar_payment_model->getDepostPayment($column);
        // $extraData['getReturnAmmount'] = $this->delar_payment_model->getReturnAmmount($column);
        $extraData['cash'] = $this->delar_payment_model->getLastPaymentCashTot($column);
        $extraData['chq'] = $this->delar_payment_model->getLastPaymentChqueTot($column);
        $extraData['salesCash'] = $this->delar_payment_model->getCashPayment($column);
        $extraData['saleschq'] = $this->delar_payment_model->getChePayment($column);
        $extraData['unrealized_cheque_tot'] = $this->delar_payment_model->getAllUnrealizedCheque($column);

        $this->template->draw('delarpayment/dealer_payment', false, $extraData);
    }

    public function drawCashPaymentDetail() {
        $this->template->draw('delarpayment/cash_payment', false);
    }
    
    //new by new one for garage loyality payment-----------------
    
    //drawtabCashPayment
     public function drawtabCashPayment($id) {
       
        
        $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->drawtabCashPayment1($id);
        $this->template->draw('delarpayment/cash_payment', false, $dealerDetail);
        
        
     }
    //updateTabStatusPay
    public function updateTabStatusPay(){
        
         $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
         $user = $_REQUEST['user'];
         $vno = $_REQUEST['vno'];
         $this->delar_payment_model->updateTabStatusPay($id,$user,$vno);
        
    }
    //submitdepositpay
    
    public function submitdepositpay(){
     $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
         $user = $_REQUEST['id'];
         $us = $_REQUEST['user'];
         
         $this->delar_payment_model->submitdepositpay1($id,$user,$us);
        
    }
    //submitdepocomfirm
    public function submitdepocomfirm(){
     $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
         $user = $_REQUEST['id'];
         
         $this->delar_payment_model->submitdepocomfirm($id,$user);
           
    }
    //rejectdepositconfirm
    public function rejectdepositconfirm(){
         $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
         $user = $_REQUEST['id'];
         $us = $_REQUEST['user'];
         $this->delar_payment_model->rejectdepositconfirm1($id,$user,$us);
 
    }

    //getbankDeposit
    
    public function getbankDeposit($id){
        $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->getbankDeposit1($id);
        $this->template->draw('delarpayment/bank_deposit_payment', false, $dealerDetail);
        
    }






    //rejectcashpay
    public function rejectcashpay(){
        
        $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
        
         $vno = $_REQUEST['id'];
         $user = $_REQUEST['user'];
         
        
         $this->delar_payment_model->rejectcashpay1($id,$vno,$user);
         
        
        
    }
















    //updatecheksubmit
    public function updatecheksubmit() {
         $this->load->model('delarpayment/delar_payment_model');
         $id = $_REQUEST['deliverOdrId'];
         $did = $_REQUEST['chk'];
         $user = $_REQUEST['user'];
         $this->delar_payment_model->updatecheksubmit1($id,$did,$user);
        
    }//printcheck
    public function printcheck() {
        $this->load->model('delarpayment/delar_payment_model');
         
         $did = $_REQUEST['vno'];
         $user = $_REQUEST['id'];
        $sql= $this->delar_payment_model->printcheck($did,$user); 
          echo json_encode($sql);
    }
    
    //toCashTablepay---------------------------------
    public function toCashTablepay(){
        $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['ids'];
        $dealerDetail= $this->delar_payment_model->toCashTablepay1($id);
    
        
    }
 
   //rejectchkpay
    public function rejectchkpay(){
        $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user = $_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->rejectchkpay($id,$did,$user); 
        
    }
   //-----------------------------------------------------------
    
    
    public function drawReturn() {
        $this->template->draw('delarpayment/return', false);
    }

    public function drawChequePayments() {
        $this->template->draw('delarpayment/cheque_payment', false);
    }

    public function drawBankDepositPayment() {
        $this->template->draw('delarpayment/bank_deposit_payment', false);
    }

    public function getBanks() {
        $this->load->model('bank/bank_model');
        $bank = $this->bank_model->getBank();
        if (count($bank) > 0) {
            echo json_encode($bank);
        }
    }

    public function drawTotalPayment() {
        $this->template->attach($this->resours);
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $_REQUEST['token_delar_deliver_order_id']);
        $extraData['lastPaymentCredit'] = $this->delar_payment_model->getLastPaymentCredit($column); //
        $extraData['getDepostPayment'] = $this->delar_payment_model->getDepostPayment($column); //
        $extraData['salesCashnew'] = $this->delar_payment_model->getCashPayment($column); //
        $extraData['saleschqnew'] = $this->delar_payment_model->getChequePayment($column); //
        $extraData['credit_status'] = $this->delar_payment_model->getCurrentCreditAmount($column); //
        //
        $this->template->draw('delarpayment/current_cheque_payment', false, $extraData);
    }

    public function drawDealerDetail() {
        $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->getDealerDetail();
        $this->template->draw('delarpayment/view_all_deliver_notes', false, $dealerDetail);
    }

    public function createPayment() {
        $chamount = 0;
        $this->load->model('delarpayment/delar_payment_model');
        $this->delar_payment_model->insertDealerPayment($_POST);
        $lastRow = $_REQUEST['dtoken_delar_deliver_order_id'];

        if (isset($_POST['btn_cash'])) {

            $this->delar_payment_model->inserCash($lastRow);
        }
        $this->load->library('upload');

        if (!is_dir('cheque_images/')) {
            mkdir('./cheque_images/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './cheque_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '60000';
        $config['max_width'] = '2048';
        $config['max_height'] = '1024';

        $this->upload->initialize($config);
        $file_array_as = array();
        $file_array_asb = array();
        //print_r($_FILES);
        foreach ($_FILES as $field => $file) {
            if ($field != "userfile") {
                //echo $field;
                $substr = substr($field, 4);
                $file_temp = substr($field, 0, 4);

                //echo $substr;
                if ($file_temp == "file") {
                    $file_array_as[$substr] = $file['name'];
                }

                if ($file_temp == "filb") {
                    $file_array_asb[$substr] = $file['name'];
                }
            }
            if ($file['error'] == 0) {

                if ($this->upload->do_upload($field)) {
                    $data = $this->upload->data();
                } else {
                    $errors = $this->upload->display_errors();
                }
            }
        }

        if (isset($_POST['btn_ch']) && $_POST['btn_ch'] != '' && $_POST['hidden_table_row'] != '') {
            $ch_fille_array = array();
            $row_count = $_POST['hidden_table_row'];
            $row_count++;

            $file_array = 0;

            for ($var = 1; $var < $row_count; $var++) {
                if (isset($_POST['cmb_banks_' . $var]) && isset($_POST['txt_chq_' . $var])) {
                    $data = array(
                        'deliver_order_id' => $lastRow,
                        'bank_id' => $_POST['cmb_banks_' . $var],
                        'cheque_no' => $_POST['txt_chq_' . $var],
                        'cheque_payment' => $_POST['txt_amount_' . $var],
                        'realized_date' => $_POST['txt_cl_' . $var],
                        'realized_status' => 0,
                        'cheque_image' => $file_array_as[$var],
                        'added_date' => date('Y:m:d'),
                        'status' => 1,
                        'added_time' => date('H:i:s')
                    );
                    $chamount += $_POST['txt_amount_' . $var];

                    $this->delar_payment_model->insertCheq($data);
                }
            }
        }
        if (isset($_POST['btn_ch1']) && $_POST['btn_ch1'] != '' && $_POST['depost_rows'] != '') {
            $depost_rowst = $_POST['depost_rows'];
            $depost_rowst++;
            for ($var = 1; $var < $depost_rowst; $var++) {
                if (isset($_POST['detxt_chq_' . $var]) && isset($_POST['detxt_amount_' . $var])) {
                    $data_depost = array(
                        'deliver_order_id' => $lastRow,
                        'bank_id' => $_POST['decmb_banks_' . $var],
                        'account_no' => $_POST['detxt_chq_' . $var],
                        'deposit_payment' => $_POST['detxt_amount_' . $var],
                        'deposit_date' => $_POST['detxt_cl_' . $var],
                        'deposit_slip_image' => $file_array_asb[$var],
                        'added_date' => date('Y:m:d'),
                        'added_time' => date('H:i:s'),
                        'status' => 1
                    );

                    $this->delar_payment_model->insertdeposit($data_depost);
                }
            }
        }


        $sales_order = $_POST['net_total_as_value'];
        $net_crdeit = 0;

        $column = array('deliver_order_id' => $lastRow);
        $data_cash = $this->delar_payment_model->getCashPayment($column);

        $data_ch = $this->delar_payment_model->getChePayment($column);
        // print_r($data_ch);
        $data_depost = $this->delar_payment_model->getDepostPayment($column);
        $tot = $sales_order;
        $net_crdeit = 0;
        $net_crdeit_cash = 0;
        $net_crdeit_credit = 0;
        $net_crdeit_depost = 0;

        if (count($data_cash) > 0) {
            $net_crdeit_cash = $data_cash[0]['total_cash'];
        }

        if (count($data_ch) > 0) {
            $net_crdeit_credit = $data_ch[0]['total_cheq'];
        }

        if (count($data_depost) > 0) {
            $net_crdeit_depost = $data_depost[0]['total_cashdis'];
        }
        echo $net_crdeit_depost . "</br>";
        $net_crdeit = $tot - ($net_crdeit_credit + $net_crdeit_cash);

        $net_crdeit_to = ($net_crdeit - $net_crdeit_depost);
        echo $net_crdeit_to;
        // echo $net_crdeit;
        if ($sales_order > $net_crdeit_to) {
            $this->delar_payment_model->inserCredit($net_crdeit_to);
        }
        $this->session->set_flashdata('insert_payment', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Added Payment</spam>');
        redirect('delarpayment/drawIndexDelarPayment');
    }

    public function uploadimage() {
        
    }

    public function dealerReturn() {
        $this->load->model('delarpayment/delar_payment_model');
        $this->delar_payment_model->dealerReturn($_POST);
        redirect('cheque_realized/drawIndexChequeRealized');
    }

    public function getdatatoview($token_delar_deliver_order_id = 0) {
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('deliver_order_id' => $token_delar_deliver_order_id);
        $extraData['outlet_details'] = $this->delar_payment_model->getDealerDetail($column);
        $extraData['getDepostPayment'] = $this->delar_payment_model->getDepostPayment($column);
        // $extraData['getReturnAmmount'] = $this->delar_payment_model->getReturnAmmount($column);
        $extraData['cash'] = $this->delar_payment_model->getLastPaymentCashTot($column);
        $extraData['chq'] = $this->delar_payment_model->getLastPaymentChqueTot($column);
        $extraData['salesCash'] = $this->delar_payment_model->getCashPayment($column);
        $extraData['saleschq'] = $this->delar_payment_model->getChequePayment($column);
        $extraData['unrealized_cheque_tot'] = $this->delar_payment_model->getAllUnrealizedCheque($column);
        $extraData['return_cheque'] = $this->delar_payment_model->getAllReturnCheque($column);

        return $extraData;
    }

    public function validateAmount() {
        $this->load->model('delarpayment/delar_payment_model');
        $deliver_order_id = $_REQUEST['deliver_order_id'];
        $this->delar_payment_model->getDueAmount($deliver_order_id);
    }

    public function getMovementAtTGPDealer() {
        $this->load->model('competitorparts/competitor_part_model');
        $dealer_id = $_REQUEST['delar_id'];
        $item_id = $_REQUEST['part_no'];
        $movementAtTheTGPDealer = $this->competitor_part_model->getMovementAtTheTGPDealer($dealer_id, $item_id);
        $json_encode = json_encode($movementAtTheTGPDealer);
        echo $json_encode;
    }
    
    //---------------------------get_all_Parts
    
    public function get_all_Parts(){
        $q = strtolower($_GET['term']);
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('item_part_no','description');
        $result = $this->delar_payment_model->getAllParts($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }   
        
    }






    //addTargetColDate
    function addTargetColDate(){
         $this->load->model('delarpayment/delar_payment_model');
         $deliverID = $_REQUEST['delarId'];
         $targtColDate = $_REQUEST['targetColDate'];
         $this->delar_payment_model->addTargetColDate($deliverID,$targtColDate);
  
    }
    //getPartNumbers
//drawReturnByTab
    
    function drawReturnByTab($id){
        
        $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->drawReturnByTab($id);
        $this->template->draw('delarpayment/return', false, $dealerDetail); 
        
        
    }
    
    //progrsspay
     function progrsspay(){
         $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user = $_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->progrsspay($id,$did,$user);
        
        
        
    }
  
    //rejectreturntab
    function rejectreturntab(){
         $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user = $_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->rejectreturntab($id,$did,$user);
        
        
        
    }




    //updateReturnStates
    
    function updateReturnStates(){
        $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user=$_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->returnTab($id,$did,$user);
        
        
        //updateReturnStates
    }
    //getgargepayprint
    function getgargepayprint(){
         $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['vno'];
        $did = $_REQUEST['id'];
        $delar = $this->delar_payment_model->getgargepayprint($id,$did);
       echo json_encode($delar);
         // $this->template->draw('delarpayment/cash_payment', false, $delar);  
        
    }
    //getreturnprint
    function getreturnprint(){
         $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['vno'];
        $did = $_REQUEST['id'];
        $delar = $this->delar_payment_model->returnprint($id,$did);
       echo json_encode($delar);
        
    }
    //printdeposit
    function printdeposit(){
        $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['vno'];
        $did = $_REQUEST['id'];
        $delar = $this->delar_payment_model->printdeposit($id,$did);
        echo json_encode($delar);
    }


    //
      public function peaymentprogrss(){
       $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user = $_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->peaymentprogrss($id,$did,$user);
       
    }
    
    //updateReturnbypaymnt
    function updateReturnbypaymnt(){
        $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $dealerDetail= $this->delar_payment_model->updateReturnbypaymnt1($id);
        
      
    }
    function gettabChequePayments($id){
        $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->getChequePayments1($id);
        $this->template->draw('delarpayment/cheque_payment', false, $dealerDetail);  
    }
    
    function progresscqknow(){
         $this->load->model('delarpayment/delar_payment_model');
        $id = $_REQUEST['deliverOdrId'];
        $did = $_REQUEST['id'];
        $user = $_REQUEST['user'];
        $dealerDetail= $this->delar_payment_model->progresscqknow($id,$did,$user);
        
    }
            
    function drawaprovdReturn($id){
       $this->load->model('delarpayment/delar_payment_model');
        $dealerDetail = $this->delar_payment_model->drawaprovdReturn1($id);
        $this->template->draw('delarpayment/return', false, $dealerDetail);   
        
    }
    
    
    

}

?>
