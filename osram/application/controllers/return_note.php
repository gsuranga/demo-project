<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of return_note
 *
 * @author Thilina
 */
class return_note extends C_Controller{
      private $resours = array(
        'JS' => array('return_note/js/return_note'),
        'CSS' => array());
    public function __construct() {
        parent::__construct();
    }
    public function drawIndex_return_note() {
       $this->template->attach($this->resours);
       $this->template->draw('return_note/index_return_note', true);
    }
    public function drawReturn_note() {
        $this->template->draw('return_note/add_return_note', FALSE);
    }
    public function getEmployee() {
        $q = strtolower($_GET['term']);
        $this->load->model('return_note/return_note_model');
        $column = array('full_name', 'id_employee_has_place', 'id_employee');
        $result = $this->return_note_model->getEmployee1($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    function allDivisionCombo() {
        $this->load->model('return_note/return_note_model');
        $fetchAllDivision = $this->return_note_model->getDivision1($this->input->post('empid'));

        foreach ($fetchAllDivision as $data) {
            echo "<option value='$data->id_division'>$data->division_name</option>";
        }
    }
    function allTerritoryCombo() {
        $this->load->model('return_note/return_note_model');
        $fetchAllterritory = $this->return_note_model->getTerritory12($this->input->post('division_name'), $this->input->post('empid'));

        foreach ($fetchAllterritory as $value) {
            echo "<option value='$value->id_territory'>$value->territory_name</option>";
        }
    }

    /**
     * Function allPhysicalPlaceCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allPhysicalPlaceCombo() {
        $this->load->model('return_note/return_note_model');
        $fetchAllPhysicalPlace = $this->return_note_model->getPhysicalPlace1($this->input->post('division_name'), $this->input->post('empid'), $this->input->post('territory_name'));

        foreach ($fetchAllPhysicalPlace as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_physical_place'>$value->physical_place_name</option>";
            }
        }
    }

    /**
     * Function allOutletCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allOutletCombo() {
        $this->load->model('return_note/return_note_model');
        $fetchAllOutlet = $this->return_note_model->getOutlet1($this->input->post('territory_name'));

        foreach ($fetchAllOutlet as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_outlet'>$value->outlet_name</option>";
            }
        }
    }

    /**
     * Function allBranchCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allBranchCombo() {
//        echo 'aaaaaaaaaaaaaa';
        $this->load->model('return_note/return_note_model');
        $fetchAllBranch = $this->return_note_model->getBranch1($this->input->post('outlet_name'));

        foreach ($fetchAllBranch as $value) {
            echo "<option value='$value->id_outlet_has_branch'>$value->branch_address</option>";
        }
    }
        function getDiscount() {
        $this->load->model('return_note/return_note_model');
        $fetchDiscount = $this->return_note_model->getDiscount($this->input->post());

        foreach ($fetchDiscount as $data) {
            echo $data->price_discount . '`' . $data->percentage_discount;
        }
    }
    
    
    function allInvoicedCombo(){
        $this->load->model('return_note/return_note_model');
        $fetchAllInvoiced = $this->return_note_model->getInvoised();

        foreach ($fetchAllInvoiced as $value) {
            echo "<option value='$value->id_invoice'>$value->invoice_no</option>";
            
        }
    }
    function get_invoices(){
        
    }
    function show_invoice() {
        $this->load->model('return_note/return_note_model');
        $fetchAllInvoiced = $this->return_note_model->show_invoice();
        $this->template->draw('return_note/view_invoiced', FALSE,$fetchAllInvoiced);
    }
    
    function show_details() {
        $this->load->model('return_note/return_note_model');
        $view_details = $this->return_note_model->show_details();
        $this->template->draw('return_note/view_details', FALSE,$view_details);
    }
    function get_rType() {
        $this->load->model('return_note/return_note_model');
        $fetchAllInvoiced = $this->return_note_model->get_rType();

        foreach ($fetchAllInvoiced as $value) {
            
            echo "<option value='$value->id_return_type'>$value->return_type</option>";
            
        }
    }
    function insert_return_note() {
        $this->load->model('return_note/return_note_model');
        $insert_data = $this->return_note_model->insert_return_note();
        if ($insert_data) {
                $this->session->set_flashdata('insert_return', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added a Return Note</spam>');
            } else {
                $this->session->set_flashdata('insert_return', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Insert Return Note Error</spam>');
            }
        redirect("return_note/drawIndex_return_note");
    }
    function previouse_return(){
        $this->load->model('return_note/return_note_model');
        $result = $this->return_note_model->previouse_return();
        echo json_encode($result);
//        return $result;
    }
    
    function view_return_invoices(){
       $this->template->attach($this->resours);
       $this->template->draw('return_note/indexView_return_note', true); 
    }
    function search_returns(){
        $this->load->model('return_note/return_note_model');
        $result =$this->return_note_model->search_returns();
        $this->template->draw('return_note/search_returns', FALSE,$result); 
    }
}
