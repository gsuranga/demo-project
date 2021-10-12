<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of delar
 *
 * @author shamil
 */
class delar extends C_Controller {

    private $resours = array(
        'JS' => array('delar/js/delar', 'delar/js/gmaps', 'delar/js/markerclusterer', 'delar/js/set_dealer_location'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexDelar() {
        $this->template->attach($this->resours);
        $this->template->draw('delar/index_delar', true);
    }

    public function drawIndexManageDelar() {
        $this->template->attach($this->resours);
        $this->template->draw('delar/index_manage_delar', true);
    }

    public function drawCreateDelar() {
        $this->template->draw('delar/create_delar', false);
    }

    public function createDelar() {
        //print_r($_REQUEST);
        $this->form_validation->set_rules('dealer_code', 'Dealer Code', 'required');
        $this->form_validation->set_rules('delar_name', 'Dealer Name', 'required');
       $this->form_validation->set_rules('type', 'Dealer Type', 'required');
        $this->form_validation->set_rules('delar_account_no', 'Account No', 'required');
        $this->form_validation->set_rules('delar_shop_name', 'Shop Name', 'required');
        $this->form_validation->set_rules('sales_officer_name', 'S/O Name', 'required');
        $this->form_validation->set_rules('branch_name', 'Branch', 'required');
        $this->form_validation->set_rules('long', 'Select your Location', 'required');
        $this->form_validation->set_rules('lat', 'Select your Location', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('delar/delar_model');
            $dealeradd = $this->delar_model->createDelar($_POST);

            if ($dealeradd) {
                $this->session->set_flashdata('insert_newDealer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#006cff;border:solid 1px #FFFFFF;padding:2px;border-radius: 5px 5px 5px 5px">New Dealer Added Successfully</spam>');
            } else {
                $this->session->set_flashdata('insert_newDealer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #FFFFFF;padding:2px;border-radius: 5px 5px 5px 5px">Dealer Account No already exist</spam>');
            }

            redirect('delar/drawIndexDelar');
        } else {
            $this->drawIndexDelar();
        }
    }

    public function manageDealer() {
        $this->form_validation->set_rules('dealer_code', 'Dealer Code', 'required');
        $this->form_validation->set_rules('m_delar_name', 'Dealer Name', 'required');
        $this->form_validation->set_rules('m_delar_account_no', 'Account No', 'required');
        $this->form_validation->set_rules('m_delar_shop_name', 'Shop Name', 'required');
        $this->form_validation->set_rules('sales_officer_name', 'S/O Name', 'required');
        $this->form_validation->set_rules('branch_name', 'Branch', 'required');
        $this->form_validation->set_rules('longs', 'Select your Location', 'required');
        $this->form_validation->set_rules('lats', 'Select your Location', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('delar/delar_model');
            $dealer_update = $this->delar_model->updateDealer($_POST);
            //redirect('delar/drawIndexDelar');
            if ($dealer_update) {
                $this->session->set_flashdata('update_Dealer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#006cff;border:solid 1px #FFFFFF;padding:2px;border-radius: 5px 5px 5px 5px">Update Successfully</spam>');
            } else {
                $this->session->set_flashdata('update_Dealer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #FFFFFF;padding:2px;border-radius: 5px 5px 5px 5px">Update unsuccessful</spam>');
            }

            redirect('delar/drawIndexDelar');
        } else {
            $this->drawIndexDelar();
        }
    }

    public function deleteDelar() {
        $this->load->model('delar/delar_model');
        $id = $this->input->get('delar_id');
        $deleteDelar = $this->delar_model->deleteDealer($id);
        redirect('delar/drawIndexDelar');
    }

    public function drawManageDelar() {
        $this->template->draw('delar/manage_delar', false);
    }

    public function drawViewAllDelar() {
        $typename = $this->session->userdata('typename');

        if ($typename == "Super Admin") {
            $this->load->model('delar/delar_model');
            $viewAllDealer = $this->delar_model->viewAllDealer();
            $this->template->draw('delar/view_all_delar', false, $viewAllDealer);
        } elseif ($typename == "Sales Officer") {
            $this->load->model('delar/delar_model');
            $viewAllDealer = $this->delar_model->view_dealer_sales_officer_wise();
            $this->template->draw('delar/view_all_delar', false, $viewAllDealer);
        }
    }

    public function get_all_sales_officer() {
        $brID = $this->input->get('hidenbrid');
        $q = strtolower($_GET['term']);
        $this->load->model('delar/delar_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->delar_model->getSalesOfficer($q, $column, $brID);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_branch() {
        $Emp_id = $this->input->get('hidenEMPID');
        $q = strtolower($_GET['term']);
        $this->load->model('delar/delar_model');
        $column = array('branch_name', 'branch_id', 'branch_code');
        $result = $this->delar_model->getAllBranch($q, $column, $Emp_id);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getmoredetails() {
        $pur_id = $_REQUEST['dealerid'];
        $this->load->model('delar/delar_model');
        $detail = $this->delar_model->getmoredetails($pur_id);
        //print_r($detail);
        echo json_encode($detail);
    }

    public function drawViewAllDelarforsalesoficer() {
        $this->load->model('delar/delar_model');
        $viewAllDealer = $this->delar_model->viewAllDealerforsalesoficer();
        $this->template->draw('delar/viewallforsalesoficer', false, $viewAllDealer);
    }

    public function drawIndexupdatemoredetails() {
        $this->template->attach($this->resours);
        $this->template->draw('delar/indexviewmore', true);
    }

    public function drawManageDealer() {

        $this->load->model('delar/delar_model');
        $dataset = $this->delar_model->getdistrict();
        $this->template->draw('delar/addmoredetailsdealer', false, $dataset);
    }

    public function manageDealerMoreinfo() {
        $this->load->model('delar/delar_model');

        $this->delar_model->updateDealermoreinfo($_POST);
        redirect('delar/drawIndexDelar');
    }

    public function get_all_branchcodes() {

        $q = strtolower($_GET['term']);
        $this->load->model('delar/delar_model');
        $column = array('branch_code', 'branch_id', 'branch_name');
        $result = $this->delar_model->getAllBranchcodes($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createDelarNew() {

        $this->form_validation->set_rules('delar_name', 'Dealer Name', 'required');
        $this->form_validation->set_rules('mobilep', 'Phone Number', 'required');
        $this->form_validation->set_rules('telp', 'Phone Number', 'required');
        $this->form_validation->set_rules('delar_shop_name', 'Shop Name', 'required');
        $this->form_validation->set_rules('contact_land', 'Phone Number', 'required');
        $this->form_validation->set_rules('contact_mobile', 'Phone Number', 'required');

        $yes = isset($_POST['computer']) && $_POST['computer'] ? "1" : "0";
        $no = isset($_POST['computer1']) && $_POST['computer1'] ? "1" : "0";

        if ($this->form_validation->run()) {
            $this->load->model('delar/delar_model');
            $dealer = $this->delar_model->createDelarnew($this->input->post(), $yes, $no);

            if ($dealer) {
                $this->session->set_flashdata('createDelarNew', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00BFFF;border:solid 1px #00BFFF;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Registered Dealer</spam>');
            } else {
                $this->session->set_flashdata('createDelarNew', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Dealer is already exist</spam>');
            }
            redirect('delar/drawIndexDelar'); //      delar/drawIndexupdatemoredetails
        } else {
            $this->drawIndexupdatemoredetails();
        }
    }

    public function index_veiw_all_dealers() {
        $this->template->attach($this->resours);
        $this->template->draw('delar/index_veiw_dealer_location', true);
    }

    public function veiw_all_dealers() {
        $this->template->draw('delar/veiw_dealer_location', false);
    }

}
