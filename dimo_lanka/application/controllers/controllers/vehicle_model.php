<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_model
 *
 * @author Iresha Lakmali
 */
class vehicle_model extends C_Controller {

    private $resours = array(
        'JS' => array('vehiclemodel/js/vehiclemodel'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehicleModel() {
        $this->template->attach($this->resours);
        $this->template->draw('vehiclemodel/index_vehicle_model', true);
    }

    public function drawCreateVehicleModel() {
        $this->template->draw('vehiclemodel/create_vehicle_model', false);
    }

    public function drawViewAllVehicleModel() {
        $this->load->model('vehiclemodel/vehicle_model_model');
        $viewAllVehicleModel = $this->vehicle_model_model->viewAllVehicleModel();
        $this->template->draw('vehiclemodel/view_all_vehicle_model', false, $viewAllVehicleModel);
    }

    public function get_all_brand() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehiclemodel/vehicle_model_model');
        $column = array('vehicle_brand_name', 'vehicle_brand_id');
        $result = $this->vehicle_model_model->get_all_brand($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//widuranga jayawickrama(validate this function)
    public function createVehicleModel() {
        $this->form_validation->set_rules('vehicle_model', 'Vehicle Model', 'required');
        $this->form_validation->set_rules('vehicle_brand_id', 'Vehicle Brand', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehiclemodel/vehicle_model_model');
            $vehicle_model = $this->vehicle_model_model->createVehicleModel($_POST);

            if ($vehicle_model) {
                $this->session->set_flashdata('insert_vehicle_model', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#005fbf;border:solid 1px #005fbf;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle model</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicle_model', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle model already exist</spam>');
            }
            redirect('vehicle_model/drawIndexVehicleModel');
        } else {
            $this->drawIndexVehicleModel();
        }
    }

    public function drawManageVehicleModel() {
        $this->template->draw('vehiclemodel/manage_vehicle_model', false);
    }

    public function remooveVehicleModel() {
        $this->load->model('vehiclemodel/vehicle_model_model');
        $id = $this->input->get('vehicle_model_id');
        $this->vehicle_model_model->remooveVehicleModel($id);
        redirect('vehicle_model/drawIndexVehicleModel');
    }

    public function manageVehicleModel() {
        $this->load->model('vehiclemodel/vehicle_model_model');
        $this->vehicle_model_model->manageVehicleModel($_POST);
        redirect('vehicle_model/drawIndexVehicleModel');
    }

}

?>
