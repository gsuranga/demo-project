<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of non_reg_shops
 *
 * @author Iresha Lakmali
 */
class non_reg_shops extends C_Controller {

    private $resours = array(
        'JS' => array('nonregshops/js/nonregshops'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexNonRegShops() {
        $this->template->attach($this->resours);
        $this->template->draw('nonregshops/index_non_reg_shops', true);
    }

    public function drawCreateNonRegShops() {
        $this->template->draw('nonregshops/create_non_reg_shops', false);
    }

    public function drawViewAllNonRegShops() {
        $this->load->model('nonregshops/non_reg_shops_model');
        $viewAllNonRegShops = $this->non_reg_shops_model->viewAllNonRegShops();
        $this->template->draw('nonregshops/view_all_non_reg_shops', false, $viewAllNonRegShops);
    }
 //   
    
 public function drawIndexAllNonRegShop(){
     $this->template->attach($this->resours);
        $this->template->draw('nonregshops/index_all_non_reg_shop', true);
 }
 public function drawAllNonRegShop(){
      $this->load->model('nonregshops/non_reg_shops_model');
        $viewAllNonRegShops = $this->non_reg_shops_model->viewAllNonRegShops();
        $this->template->draw('nonregshops/all_non_reg_shop', false, $viewAllNonRegShops);
 }

    public function drawIndexManageNonRegShops() {
        $this->template->attach($this->resours);
        $this->template->draw('nonregshops/index_manage_non_reg_shops', true);
    }

    public function drawManageNonRegShops() {
        $this->template->draw('nonregshops/manage_non_reg_shops', false);
    }

    public function get_all_branch_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('nonregshops/non_reg_shops_model');
        $column = array('branch_name', 'branch_id', 'branch_account_no');
        $result = $this->non_reg_shops_model->get_all_branch_name($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_sales_officer() {
        $q = strtolower($_GET['term']);
        $this->load->model('nonregshops/non_reg_shops_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->non_reg_shops_model->get_all_sales_officer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_city() {
        $q = strtolower($_GET['term']);
        $this->load->model('nonregshops/non_reg_shops_model');
        $column = array('city_name', 'city_id');
        $result = $this->non_reg_shops_model->get_all_city($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createNonRegShops() {
       
        $this->form_validation->set_rules('txt_shop_name', 'Shop name', 'required');
        $this->form_validation->set_rules('txt_shop_address', 'Shop address', 'required');
        $this->form_validation->set_rules('txt_contact_no', 'Contact no', 'required');
        $this->form_validation->set_rules('txt_remark', 'Remark', 'required');
        $this->form_validation->set_rules('txt_city', 'City name', 'required');
        $this->form_validation->set_rules('txt_branch', 'Branch name', 'required');
        
        if ($this->form_validation->run()) {
            $this->load->model('nonregshops/non_reg_shops_model');
            $createNonRegShops = $this->non_reg_shops_model->createNonRegShops($_POST, $this->input->post());

            if ($createNonRegShops > 0) {
                $this->session->set_flashdata('creare_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#3B84A8;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Non Reg Shop Added</spam>');
            } else {
                $this->session->set_flashdata('creare_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#1c4d67;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">error</spam>');
            }
           redirect('non_reg_shops/drawIndexNonRegShops');
        } else {

            $this->drawIndexNonRegShops();
        }
    }

    public function updateNonRegShops() {
        $this->load->model('nonregshops/non_reg_shops_model');
        $updateNonRegShops = $this->non_reg_shops_model->updateNonRegShops($_POST,$this->input->post());
        if ($updateNonRegShops > 0) {
                $this->session->set_flashdata('manege_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#3B84A8;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Non Reg Shop Added</spam>');
            } else {
                $this->session->set_flashdata('manege_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#1c4d67;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">error</spam>');
            }
        redirect('non_reg_shops/drawIndexNonRegShops');
    }

    public function removeNonRegShops() {
        $this->load->model('nonregshops/non_reg_shops_model');
        $removeNonRegShops = $this->non_reg_shops_model->removeNonRegShops($_REQUEST, $this->input->post());
        if ($removeNonRegShops > 0) {
            $this->session->set_flashdata('remove_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#3B84A8;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Remove Reg Shop </spam>');
        } else {
            $this->session->set_flashdata('remove_non_reg_shop', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#1c4d67;border:solid 1px #3B84A8;padding:2px;border-radius: 5px 5px 5px 5px">error</spam>');
        }
        redirect('non_reg_shops/drawIndexNonRegShops');
    }

}

?>
