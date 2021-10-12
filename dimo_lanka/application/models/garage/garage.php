<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of garage
 *
 * @author Iresha Lakmali
 */
class garage extends C_Controller {

    private $resours = array(
        'JS' => array('garage/js/garage'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexGarage() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage', true);
    }

    public function drawCreateGarage() {
        $this->template->draw('garage/create_garage', false);
    }
    
     public function drawIndexAllGarage() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_all_garage', true);
    }
    
    public function drawCompletedGarage() {
        $this->load->model('garage/garage_model');
        $completedGarage = $this->garage_model->completedGarage();
        $this->template->draw('garage/completed_garage', false,$completedGarage);
    }
    
     public function drawNotCompletedGarage() {
         $this->load->model('garage/garage_model');
         $notCompletedGarage = $this->garage_model->notCompletedGarage();
        $this->template->draw('garage/not_completed_garage', false,$notCompletedGarage);
    }
    
    public function updateGarageProfile(){
        $this->load->model('garage/garage_model');
        $this->garage_model->updateGarageProfile($_POST);
         redirect('garage/drawIndexAllGarage');
        
                
    }

    public function createGarage() {
//        $this->form_validation->set_rules('garage_code', 'Garage Code', 'required');
//        $this->form_validation->set_rules('garage_account_no', 'Garage Account No', 'required');
        $this->form_validation->set_rules('garage_name', 'Garage Name', 'required');
        $this->form_validation->set_rules('garage_address', 'Garage Address', 'required');
        $this->form_validation->set_rules('garage_contact_no', 'Garage Contact No', 'required');
        $this->form_validation->set_rules('nearest_tata_dealer', 'Nearest TATA Dealer', 'required');
        $this->form_validation->set_rules('added_by_user', 'Added By User', 'required');
        $this->form_validation->set_rules('txt_remark', 'Remark', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('garage/garage_model');
            $createGarage = $this->garage_model->createGarage($_POST);
            $newdata = array(
                'garage_id' => $createGarage
            );
            $this->session->set_userdata($newdata);
            $this->additionalRegistration($_POST);
            redirect('garage/drawIndexGarageSucesess');
        } else {
            
             $this->drawIndexGarage();
        }
    }

    public function drawIndexGarageSucesess() {
        $this->template->draw('garage/index_garage_sucesess', true);
    }

    public function drawGarageSucesess() {
        $this->template->draw('garage/garage_sucesess', false);
    }

    public function get_all_dealer() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->garage_model->getAllDealer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_dealer_account_no() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('delar_account_no', 'delar_id', 'delar_name');
        $result = $this->garage_model->get_all_dealer_account_no($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_user() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('name', 'id');
        $result = $this->garage_model->getAllUser($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawCreateGarageVehicleType() {
        $this->template->draw('garage/create_garage_vehicle_type', false);
    }

    public function drawIndexGarageVehicleType() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_vehicle_type', true);
    }

    public function createNonTataDealer() {
        $this->load->model('garage/garage_model');
        $this->garage_model->createNonTataDealer($_POST);
    }

    public function get_all_garage_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('garage_name', 'garage_id');
        $result = $this->garage_model->get_all_garage($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_part_type() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('part_type_name', 'part_type_id');
        $result = $this->garage_model->getAllPartType($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_type() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('vehicle_type_name', 'vehicle_type_id');
        $result = $this->garage_model->getAllVehicleType($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_brand() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('vehicle_brand_name', 'vehicle_brand_id');
        $result = $this->garage_model->getAllVehicleBrand($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_vehicle_repair() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('repair_type_name', 'repair_type_id');
        $result = $this->garage_model->getAllVehicleRepair($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexIndianBrand() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_indian_brand', true);
    }

    public function drawCreateIndianBrand() {
        $this->template->draw('garage/create_garage_indian_brands', false);
    }

    public function drawIndexGarageAsign() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_asign', true);
    }

    public function drawIndexNonTataDealer() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_non_tata_dealers', true);
    }

    public function drawCreateNonTataDealer() {
        $this->template->draw('garage/create_non_tata_dealers', false);
    }

    public function drawIndexGarageTGPDealers() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_tgp_dealers', true);
    }

    public function drawCreateGarageTGPDealers() {
        $this->template->draw('garage/create_garage_tgp_dealers', false);
    }

    public function createGarageTGPDealer() {
        $this->load->model('garage/garage_model');
        $this->garage_model->createGarageTGPDealer($_POST);
    }

    public function drawIndexGarageProfile() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_profile', true);
    }

    public function drawGarageProfile() {
        $this->load->model('garage/garage_model');

        if (isset($_REQUEST['garage_id']) && $_REQUEST['garage_id'] != '') {
            $garage_id = $_REQUEST['garage_id'];
            $garage_detail = array(
                'garage_id' => $garage_id
            );
            
            $this->session->set_userdata($garage_detail);
            
            $garage_id = $_REQUEST['garage_id'];
            $extraData['garagedetails'] = $this->garage_model->getgaragedetails($garage_id);
            $extraData['getnontataDetails'] = $this->garage_model->getnontataDetails($garage_id);
            $extraData['getbrandsDetails'] = $this->garage_model->getbrandsDetails($garage_id);
            $extraData['gettgpDetails'] = $this->garage_model->gettgpDetails($garage_id);
            $extraData['getvehicaltypesDetails'] = $this->garage_model->getvehicaltypesDetails($garage_id);
            $extraData['getindianbarndsDetails'] = $this->garage_model->getindianbarndsDetails($garage_id);
            $extraData['get_non_tgp_brand_details'] = $this->garage_model->get_non_tgp_brand_details($garage_id);
            $extraData['get_employe_details'] = $this->garage_model->getGarageEmployeeDetails($garage_id);
            
            $this->template->draw('garage/garage_profile', false, $extraData);
        } else {
            $this->template->draw('garage/garage_profile', false);
        }
    }

    public function drawIndexGarageNonTgpBrandDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_non_tgp_brand_details', true);
    }

    public function drawCreateGarageNonTgpBrandDetails() {
        $this->template->draw('garage/create_garage_non_tgp_brand_details', false);
    }

    public function drawIndexGarageTataBrandsDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/index_garage_tata_brands_details', true);
    }

    public function drawGarageTataBrandsDetails() {
        $this->template->draw('garage/garage_tata_brands_details', false);
    }

    public function inserTGPDelar() {
        $this->load->model('garage/garage_model');
        $this->garage_model->createGarageTGPDealer($_POST);
        redirect('garage/drawIndexGarageTGPDealers');
    }

    public function inserindianDelar() {
        $this->load->model('garage/garage_model');
        $this->garage_model->createGarageindianDealer($_POST);
        redirect('garage/drawIndexIndianBrand');
    }

    public function inservehicaltypoes() {
        $this->load->model('garage/garage_model');
        $this->garage_model->createGarageVehicleType($_POST);
        redirect('garage/drawIndexGarageVehicleType');
    }

    public function insertGarage() {
        $this->load->model('garage/garage_model');
        $this->garage_model->insertGarage($_POST);
        // redirect('garage/drawIndexGarageTataBrandsDetails');
    }

    public function get_all_vehicle_model() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('vehicle_model_name', 'vehicle_model_id');
        $result = $this->garage_model->getAllVehicleModel($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_al_vehicle_sub_model() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('vehicle_sub_model_name', 'vehicle_sub_model_id');
        $result = $this->garage_model->getAllVehicleSubModel($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexAdditionalReg() {
        $this->template->attach($this->resours);

        $this->template->draw('garage/index_additional_reg', true);
    }

    public function drawAdditionalReg() {
        $this->template->attach($this->resours);
        $this->template->draw('garage/additional_reg', false);
    }

    public function additionalRegistration($data) {
        $this->load->model('garage/garage_model');
        $this->garage_model->additionalRegistration($data);
        //redirect('garage/drawIndexGarage');

        //   $extraData["garage_id"] = $additionalRegistration;
    }

}

?>
