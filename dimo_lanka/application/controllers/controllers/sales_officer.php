<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sales_officer extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('salesofficer/js/sales_officer'),
        'CSS' => array());

    //___________________Register Sales Officer_________________________________
    public function drawIndexSalesOfficer() {
        $this->template->attach($this->resours);
        $this->template->draw('salesofficer/index_sales_officer', true);
    }

    public function drawCreateSalesOfficer() {

        $this->template->draw('salesofficer/create_sales_officer', false);
    }

    public function drawViewAllSalesOfficer() {
        $this->load->model('salesofficer/salesofficer_model');

        $viewAllSalesOfficer = $this->salesofficer_model->viewAllSalesOfficer();
        $this->template->draw('salesofficer/view_sales_officer', false, $viewAllSalesOfficer);
    }

    public function addSalesOfficer() {
        $this->form_validation->set_rules('sales_officer_name', 'Name', 'required');
        $this->form_validation->set_rules('officer_code', 'Officer Code', 'required');
        $this->form_validation->set_rules('sales_officer_account_no', 'Account No', 'required');
        $this->form_validation->set_rules('sales_officer_epf_number', 'EPF No', 'required');
        $this->form_validation->set_rules('branch_account_no', 'Branch Account No', 'required');
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');


        if ($this->form_validation->run()) {
            $typeid = "";
            if ((isset($_REQUEST['cmd_district'])) && ($_REQUEST['cmd_district'] != null)) {
                $typeid = $_REQUEST['cmd_district'];

                $this->load->model('salesofficer/salesofficer_model');
                $saleofficer = $this->salesofficer_model->insertSalesOfficer($_POST, $typeid);
                if ($saleofficer) {
                    $this->session->set_flashdata('insert_salesOfficer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00BFFF;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered Sales Officer</spam>');
                } else {
                    $this->session->set_flashdata('insert_salesOfficer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Sales Officer Account No / Sales Officer Code or Sales Officer Mobil number already exist</spam>');
                }
                redirect('sales_officer/drawIndexSalesOfficer');
            } else {

                $this->drawIndexSalesOfficer();
            }
        }
    }

    public function deleteSalesOfficer() {
        $this->load->model('salesofficer/salesofficer_model');
        $id = $this->input->get('sales_officer_id');
        $this->salesofficer_model->deleteSalesOfficer($id);
        redirect("sales_officer/drawIndexSalesOfficer");
    }

    //________________Update Sales Officer_________________________________
    public function drawIndexManageSalesOfficer() {

        $this->template->attach($this->resours);
        $id = $this->input->get();

        $this->template->draw('salesofficer/index_manage_sales_officer', true, $_REQUEST);
    }

    public function drawUpdateSalesOfficer() {

        $this->template->draw('salesofficer/update_sales_officer', false, $_REQUEST);
    }

    public function auto_branch() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesofficer/salesofficer_model');
        $column = array('branch_account_no', 'branch_id', 'branch_name');
        $result = $this->salesofficer_model->getBranchAccountNo($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function updateSalesOfficer() {


        //if ($this->input->post("sales_officer_account_no") != '' && $this->input->post("branchid") != '' && $this->input->post("sales_officer_name") != '' && $this->input->post("sales_officer_tel") != '' && $this->input->post("address") != '' && $this->input->post("sales_officer_id") != '') {

        $this->load->model('salesofficer/salesofficer_model');
        $this->salesofficer_model->updateSalesOfficer($this->input->post());
        redirect('sales_officer/drawIndexSalesOfficer');
    }

    public function get_all_branch_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesofficer/salesofficer_model');
        $column = array('branch_name', 'branch_id', 'branch_account_no');
        $result = $this->salesofficer_model->get_all_branch_name($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexUpdateManageSalesOfficer() {



        $this->template->draw('salesofficer/updatesuccess', true);
    }

    public function drawSalesOficerLoad() {
        $this->load->model('salesofficer/salesofficer_model');
        $viewAll = $this->salesofficer_model->viewAllSalesType();
        $this->template->draw('salesofficer/load_SalesType', FALSE, $viewAll);
    }

    public function drawDistricLoad() {
        $this->load->model('salesofficer/salesofficer_model');
        $viewAll = $this->salesofficer_model->getALLdestinations();
        $this->template->draw('salesofficer/loed_destination', FALSE, $viewAll);
    }

    public function getAlldetails() {
        $pur_id = $_REQUEST['sales_Officer_id'];
        $this->load->model('salesofficer/salesofficer_model');
        $detail = $this->salesofficer_model->getallDetails($pur_id);
        //print_r($detail);
        echo json_encode($detail);
    }

}

?>
