<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_part_type
 *
 * @author Iresha Lakmali
 */
class vehicle_part_type extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehiclePartType() {
        $this->template->draw('vehicleparttype/index_vehicle_part_type', true);
    }

    public function drawCreateVehiclePartType() {
        $this->template->draw('vehicleparttype/create_vehicle_part_type', false);
    }

    public function drawViewAllVehiclePartType() {
        $this->load->model('vehicleparttype/vehicle_part_type_model');
        $viewAllVehiclePartType = $this->vehicle_part_type_model->viewAllVehiclePartType();
        $this->template->draw('vehicleparttype/view_all_vehicle_part_type', false, $viewAllVehiclePartType);
    }

    public function createVehiclePartType() {
        $this->form_validation->set_rules('vehicle_part_type', 'Vehicle Part Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehicleparttype/vehicle_part_type_model');
            $vihicle_part_type = $this->vehicle_part_type_model->createVehiclePartType($_POST);
            if ($vihicle_part_type) {
                $this->session->set_flashdata('insert_vehicle_part_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#006cff;border:solid 1px #006cff;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle part type</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicle_part_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle part type already exist</spam>');
            }
            redirect('vehicle_part_type/drawIndexVehiclePartType');
        } else {
            $this->drawIndexVehiclePartType();
        }
        //redirect('vehicle_part_type/drawIndexVehiclePartType');
    }

    public function remooveVehiclePartType() {
        $this->load->model('vehicleparttype/vehicle_part_type_model');
        $id = $this->input->get('part_type_id');
        $this->vehicle_part_type_model->remooveVehiclePartType($id);
        redirect('vehicle_part_type/drawIndexVehiclePartType');
    }

    public function drawManageVehiclePartType() {
        $this->template->draw('vehicleparttype/manage_vehicle_part_type', false);
    }

    public function manageVehiclePartType() {
        $this->load->model('vehicleparttype/vehicle_part_type_model');
        $this->vehicle_part_type_model->manageVehiclePartType($_POST);
        redirect('vehicle_part_type/drawIndexVehiclePartType');
    }

}

?>
