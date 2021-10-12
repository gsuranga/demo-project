<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of deleted_invoices
 *
 * @author Thilina
 */
class deleted_invoices extends C_Controller{
    private $resours = array(
        'JS' => array('deleted_invoices/js/deleted_invoices'),
        'CSS' => array());
    public function __construct() {
        parent::__construct();
    }
    
    public function draw_index_deleted_invoices(){
        $this->template->attach($this->resours);
        $this->template->draw('deleted_invoices/invoie_Index', true);
    }
    public function draw_deleted_deletedInvoices(){
        if(isset($_POST['btn_submit'])){
        $this->load->model('deleted_invoices/deleted_invoices_model');
        $viewinvoice = $this->deleted_invoices_model->view_deletedInvoices();
        }
        $this->template->draw('deleted_invoices/draw_deleted_deletedInvoices',FALSE,$viewinvoice);
    }
    public function getEmployeNames(){
        $q = strtolower($_GET['term']);
        $this->load->model('deleted_invoices/deleted_invoices_model');
        $column = array('full_name', 'id_employee_has_place','id_employee_type','id_physical_place');
        $result = $this->deleted_invoices_model->getEmployeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if ($result != NULL) {
            echo json_encode($result);
        }else{
        echo json_encode($no_result);
        }
    }
    public function getOutletNames(){
        $q = strtolower($_GET['term']);
        $this->load->model('deleted_invoices/deleted_invoices_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->deleted_invoices_model->getOutletNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if ($result != NULL) {
            echo json_encode($result);
        }else{
        echo json_encode($no_result);
        }
    }
    public function drawIndexviewDetailInovoices(){
        $this->template->draw('deleted_invoices/drawIndexviewDetailInovoices', true);
    }
    public function drawviewDetailInovoices(){
        $this->load->model('deleted_invoices/deleted_invoices_model');
        $viewinvoice = $this->deleted_invoices_model->view_deletedInvoicesDetalis();
        $this->template->draw('deleted_invoices/draw_deleted_deletedInvoices_details',FALSE,$viewinvoice);
    }
}
