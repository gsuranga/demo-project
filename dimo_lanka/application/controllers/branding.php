<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branding
 *
 * @author Iresha Lakmali
 */
class branding extends C_Controller {

    private $resours = array(
        'JS' => array('branding/js/branding'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexBranding() {
        $this->template->attach($this->resours);
        $this->template->draw('branding/index_branding', true);
    }

    public function drawCreateBranding() {
        $this->template->draw('branding/create_branding', false);
    }

    public function drawViewAllBranding() {
        $this->load->model('branding/branding_model');
        $extraData = array();
        // $extraData['all_detail'] = $this->branding_model->viewAllBranding();
        //  print_r($viewAllBranding);
        $extraData['dealer_branding'] = $this->branding_model->loadDealerDetail();
        $extraData['garage_detail'] = $this->branding_model->loadGarageDetail();
        $extraData['fleet_owner_detail'] = $this->branding_model->loadFleetOwnerDetail();
        $extraData['shop_detail'] = $this->branding_model->loadNewShopDetail();
        $extraData['vehicle_owner'] = $this->branding_model->loadVehicleOwnerDetail();
        $this->branding_model->loadVehicleOwnerDetail();

        $this->template->draw('branding/view_all_branding', false, $extraData);
    }

    public function drawAlCategories() {
        $this->load->model('branding/branding_model');
        $viewAll = $this->branding_model->getAlCategories();
        $this->template->draw('branding/load_all_categories', FALSE, $viewAll);
    }

    public function set_category_type() {
        $q = strtolower($_GET['term']);
        $user_type = $_GET['user_type'];
        $this->load->model('branding/branding_model');
        $column = array();
        if ($user_type == "Dealer") {
            $column = array('delar_name', 'delar_id','delar_account_no');
        }
        if ($user_type == "Garage") {
            $column = array('garage_name', 'garage_id','garage_account_no');
        }
        if ($user_type == "Fleet Owner") {
            $column = array('vehicle_reg_no', 'customer_id','cust_account_no');
        }
        if ($user_type == "New Shop") {
            $column = array('shop_name', 'shop_id','shop_code');
        }
        if ($user_type == "Vehicle Owner") {
            $column = array('vehicle_reg_no', 'vehicle_id');
        }
        $result = $this->branding_model->set_category_type($q, $column, $user_type);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            ;
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    
    // 
    public function set_category_type_no() {
        $q = strtolower($_GET['term']);
        $user_type = $_GET['user_type'];
        $this->load->model('branding/branding_model');
        $column = array();
        if ($user_type == "Dealer") {
            $column = array('delar_account_no', 'delar_id','delar_name');
        }
        if ($user_type == "Garage") {
            $column = array('garage_account_no', 'garage_id','garage_name');
        }
        if ($user_type == "Fleet Owner") {
            $column = array('cust_account_no', 'customer_id','customer_name');
        }
        if ($user_type == "New Shop") {
            $column = array('shop_code', 'shop_id','shop_name');
        }
        if ($user_type == "Vehicle Owner") {
            $column = array('vehicle_reg_no', 'vehicle_id');
        }
        $result = $this->branding_model->set_category_type_no($q, $column, $user_type);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            ;
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createBrandig() {
        $this->load->model('branding/branding_model');

        $config['upload_path'] = './branding_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '500';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

           
        } else {
           

            
        }
        $upload_branding = $this->upload->file_name;



        $createBrandig = $this->branding_model->createBrandig($_POST, $upload_branding);
        $newdata = array(
            'branding_detail_id' => $createBrandig
        );
        $this->session->set_userdata($newdata);
        redirect('branding/drawIndexBranding');
    }

    public function remooveBranding() {
        $this->load->model('branding/branding_model');
        $this->branding_model->remooveBranding($_REQUEST);
        redirect('branding/drawIndexBranding');
    }

}

?>
