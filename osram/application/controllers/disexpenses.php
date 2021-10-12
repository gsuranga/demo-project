<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of disexpenses
 *
 * @author user
 */
class disexpenses extends C_Controller {
    //put your code here
    
     private $resours = array(
        'JS' => array('disexpenses/js/disexpenses'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexDivision
     *
     * 
     *
     * @param no
     * @return no
     */
    function indexDisExpenses() {
        $this->template->attach($this->resours);
        $this->template->draw('disexpenses/indexDisExpenses', true);
    }

    /**
     * Function indexdrawViewDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDisExpenses() {
        $this->load->model('disexpenses/disexpenses_model');
        $employeeName = $this->disexpenses_model->getEmployeeDetailsBySession();
        
        $this->template->draw('disexpenses/addExpenses', false,$employeeName);
        
    }
    
    public function insertDisExpenses() {
       $this->form_validation->set_rules('description', 'Description', 'required');
    if ($this->form_validation->run()) {
     
            $this->load->model('disexpenses/disexpenses_model');
            $insertdisexpenses = $this->disexpenses_model->insertDisExpenses($this->input->post());
             if ($insertdisexpenses) {
                $this->session->set_flashdata('addExpense', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully added a Expense</spam>');
            } else {
                $this->session->set_flashdata('addExpense', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Expense add Error</spam>');
            }
            redirect('disexpenses/indexDisExpenses');
            } else {
           $this->indexDisExpenses();
            }

    }
    
//           $this->form_validation->set_rules('description', 'Description', 'required');
//        if ($this->form_validation->run()) {
//            $this->load->model('disexpenses/disexpenses_model');
//            $insertdisexpenses = $this->disexpenses_model->insertDisExpenses($this->input->post());
//            if ($insertdisexpenses) {
//                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Register Bank</spam>');
//            } else {
//                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Bank Registration Error</spam>');
//            }
//            //$this->indexDivision();
//            redirect('disexpenses/indexDisExpenses');
//        } else {
//            $this->indexDisExpenses();
//        }
    
    
    
    public function getAllExpenses() {
        $this->load->model('disexpenses/disexpenses_model');
        $expenses = $this->disexpenses_model->getAllExpenses();
        
        $this->template->draw('disexpenses/viewAllExpenses', false,$expenses);
    }
    
    public function indexSummary() {
        $this->template->attach($this->resours);
        $this->template->draw('disexpenses/indexSummary', true);
    }

    
    
    
    
    public function expensesSummaryReport(){
        if(isset($_POST['btn_sub'])){
        $this->load->model('disexpenses/disexpenses_model');
        $cashSummaryReportEmployes = $this->disexpenses_model->getCashSummaryReportEmployes();
        }
        $this->template->draw('disexpenses/viewCashSummary', false,$cashSummaryReportEmployes);
        
    }
    
     public function getChequeSummary($emlpoyee_hasplceid){
        $this->load->model('disexpenses/disexpenses_model');
        $chequeSummary = $this->disexpenses_model->getChequeSummary($emlpoyee_hasplceid);
        return $chequeSummary;
    }
    
     public function getChequeSummary2($emlpoyee_hasplceid){
        $this->load->model('disexpenses/disexpenses_model');
        $chequeSummary = $this->disexpenses_model->getChequeSummary2($emlpoyee_hasplceid);
        return $chequeSummary;
    }
    
     public function getExpenses($emlpoyee_hasplceid){
        $this->load->model('disexpenses/disexpenses_model');
        $chequeSummary = $this->disexpenses_model->getExpenses($emlpoyee_hasplceid);
        return $chequeSummary;
    }
    
    public function getDistributorName(){
        $q = strtolower($_GET['term']);
        $this->load->model('disexpenses/disexpenses_model');
        $column = array('employee_first_name','id_employee_has_place');
        $result = $this->disexpenses_model->getDistributorNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        
            }
    }
}
