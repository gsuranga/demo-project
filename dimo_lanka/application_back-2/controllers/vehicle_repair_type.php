<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_repair_type
 *
 * @author Iresha Lakmali
 */
class vehicle_repair_type extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehicleRepairType() {
        $this->template->draw('vehiclerepairtype/index_vehicle_repair_type', true);
    }

    public function drawCreateVehicleRepairType() {
        $this->template->draw('vehiclerepairtype/create_vehicle_repair_type', false);
    }

    public function drawViewAllVehicleRepairType() {
        $this->load->model('vehiclerepairtype/vehicle_repair_type_model');
        $viewAllVehicleRepairType = $this->vehicle_repair_type_model->viewAllVehicleRepairType();
        $this->template->draw('vehiclerepairtype/view_all_vehicle_repair_type', false, $viewAllVehicleRepairType);
    }

    public function drawManageVehicleRepairType() {
        $this->template->draw('vehiclerepairtype/manage_vehicle_repair_type', false);
    }

    public function createVehicleRepairType() {
        $this->form_validation->set_rules('vehicle_repair_type', 'Vehicle Repair Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehiclerepairtype/vehicle_repair_type_model');
            $vehicle_repay_type = $this->vehicle_repair_type_model->createVehicleRepairType($_POST);

            if ($vehicle_repay_type) {
                $this->session->set_flashdata('insert_vehicle_repay_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#005fbf;border:solid 1px #005fbf;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle repay type</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicle_repay_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle repay type already exist</spam>');
            }
            redirect('vehicle_repair_type/drawIndexVehicleRepairType');
        } else {
            $this->drawIndexVehicleRepairType();
        }
    }

    public function remooveVehicleRepairType() {

        $this->load->model('vehiclerepairtype/vehicle_repair_type_model');
        $id = $this->input->get('repair_type_id');
        $this->vehicle_repair_type_model->remooveVehicleRepairType($id);
        redirect('vehicle_repair_type/drawIndexVehicleRepairType');
    }

    public function manageVehicleRepairType() {
        $this->form_validation->set_rules('vehicle_repair_types', 'Vehicle Repair Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehiclerepairtype/vehicle_repair_type_model');
            $update_repair_type = $this->vehicle_repair_type_model->manageVehicleRepairType($_POST);
            // print_r($test);
            if ($update_repair_type) {
                $this->session->set_flashdata('set_message_update_repay_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#005fbf;border:solid 1px #005fbf;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle repay type</spam>');
            } else {
                $this->session->set_flashdata('set_message_update_repay_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle repay type already exist</spam>');
            }
            redirect('vehicle_repair_type/drawIndexVehicleRepairType');
        } else {
            $this->drawIndexVehicleRepairType();
        }
    }

}
?>

