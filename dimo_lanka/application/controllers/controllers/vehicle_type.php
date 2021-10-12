<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_type
 *
 * @author Iresha Lakmali
 */
class vehicle_type extends C_Controller {

    private $resours = array(
        'JS' => array('vehicletype/js/vehicletype'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehicleType() {
        $this->template->attach($this->resours);
        $this->template->draw('vehicletype/index_vehicle_type', true);
    }

    public function drawCreateVehicleType() {
        $this->template->draw('vehicletype/create_vehicle_type', false);
    }

    public function drawViewAllVehicleType() {
        $this->load->model('vehicletype/vehicle_type_model');
        $viewAllVehicleType = $this->vehicle_type_model->viewAllVehicleType();
        $this->template->draw('vehicletype/view_all_vehicle_type', false, $viewAllVehicleType);
    }

    public function createVehicleType() {
        $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
        if ($this->form_validation->run()) {

            $this->load->model('vehicletype/vehicle_type_model');
            $vehicale_type = $this->vehicle_type_model->createVehicleType($_POST);

            if ($vehicale_type) {
                $this->session->set_flashdata('insert_vehicale_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#006cff;border:solid 1px #006cff;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle type</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicale_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle type already exist</spam>');
            }
            redirect('vehicle_type/drawIndexVehicleType');
        } else {
            $this->drawIndexVehicleType();
        }
    }

    public function drawManageVehicleType() {
        $this->template->draw('vehicletype/manage_vehicle_type', false);
    }

    public function manageVehicleType() {
        $this->form_validation->set_rules('vehicle_type_up', 'Vehicle Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehicletype/vehicle_type_model');
            $vehicle_type_up = $this->vehicle_type_model->manageVehicleType($_POST);
            if ($vehicle_type_up) {
                $this->session->set_flashdata('insert_vehicale_type_up', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#006cff;border:solid 1px #006cff;padding:2px;border-radius: 5px 5px 5px 5px">Successfully update vehicle type</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicale_type_up', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Unsuccessfully update Vehicle type</spam>');
            }

            redirect('vehicle_type/drawIndexVehicleType');
        }
        redirect('vehicle_type/drawIndexVehicleType');
    }

    public function remooveVehicleType() {
        $this->load->model('vehicletype/vehicle_type_model');
        $id = $this->input->get('vehicle_type_id');
        $this->vehicle_type_model->remooveVehicleType($id);
        redirect('vehicle_type/drawIndexVehicleType');
    }

}

?>
