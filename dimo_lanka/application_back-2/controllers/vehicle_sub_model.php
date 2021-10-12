<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_sub_model
 *
 * @author Iresha Lakmali
 */
class vehicle_sub_model extends C_Controller {

    private $resours = array(
        'JS' => array('vehiclesubmodel/js/vehiclesubmodel'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehicleSubModel() {
        $this->template->attach($this->resours);
        $this->template->draw('vehiclesubmodel/index_vehicle_sub_model', true);
    }

    public function drawCreateVehicleSubModel() {
        $this->template->draw('vehiclesubmodel/create_vehicle_sub_model', false);
    }

    public function drawvViewAllVehicleSubModel() {
        $this->load->model('vehiclesubmodel/vehicle_sub_model_model');
        $viewAllVehicleSubModel = $this->vehicle_sub_model_model->viewAllVehicleSubModel();
        $this->template->draw('vehiclesubmodel/view_all_vehicle_sub_model', false, $viewAllVehicleSubModel);
    }

    public function get_all_vehicle_model() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehiclesubmodel/vehicle_sub_model_model');
        $column = array('vehicle_model_name', 'vehicle_model_id');
        $result = $this->vehicle_sub_model_model->get_all_vehicle_model($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createVehicleSubModel() {
        $this->form_validation->set_rules('vehicle_sub_model', 'Vehicle Sub Model', 'required');
        $this->form_validation->set_rules('vehicle_model', 'Vehicle Model', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehiclesubmodel/vehicle_sub_model_model');
            $vehicle_sub_model = $this->vehicle_sub_model_model->createVehicleSubModel($_POST);

            if ($vehicle_sub_model) {
                $this->session->set_flashdata('insert_vehicle_sub_model', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#005fbf;border:solid 1px #005fbf;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle sub model</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicle_sub_model', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle sub model already exist</spam>');
            }
            redirect('vehicle_sub_model/drawIndexVehicleSubModel');
        } else {
            $this->drawIndexVehicleSubModel();
        }
    }

    public function drawManageVehicleSubModel() {
        $this->template->draw('vehiclesubmodel/manage_vehicle_sub_model', false);
    }

    public function mangeVehicleSubModel() {
        $this->load->model('vehiclesubmodel/vehicle_sub_model_model');
        $this->vehicle_sub_model_model->mangeVehicleSubModel($_POST);
        redirect('vehicle_sub_model/drawIndexVehicleSubModel');
    }

    public function remooveVehicleSubModel() {
        $this->load->model('vehiclesubmodel/vehicle_sub_model_model');
        $id = $this->input->get('vehicle_sub_model_id');
        $this->vehicle_sub_model_model->remooveVehicleSubModel($id);
        redirect('vehicle_sub_model/drawIndexVehicleSubModel');
    }

}

?>
