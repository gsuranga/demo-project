<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle_brand
 *
 * @author Iresha Lakmali
 */
class vehicle_brand extends C_Controller {

    private $resours = array(
        'JS' => array('vehiclebrand/js/vehiclebrand'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVehicleBrand() {
        $this->template->attach($this->resours);
        $this->template->draw('vehiclebrand/index_vehicle_brand', true);
    }

    public function drawCreateVehicleBrand() {
        $this->template->draw('vehiclebrand/create_vehicle_brand', false);
    }

    public function drawViewAllVehicleBrand() {
        $this->load->model('vehiclebrand/vehicle_brand_model');
        $viewAllVehicleBrand = $this->vehicle_brand_model->viewAllVehicleBrand();
        $this->template->draw('vehiclebrand/view_all_vehicle_brand', false, $viewAllVehicleBrand);
    }

    public function remooveVehicleBrand() {
        $this->load->model('vehiclebrand/vehicle_brand_model');
        $id = $this->input->get('vehicle_brand_id');
        $this->vehicle_brand_model->remooveVehicleBrand($id);
        redirect('vehicle_brand/drawIndexVehicleBrand');
    }

    public function drawManageVehicleBrand() {
        $this->template->draw('vehiclebrand/manage_vehicle_brand', false);
    }

    public function get_all_vehicle_type() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehiclebrand/vehicle_brand_model');
        $column = array('vehicle_type_name', 'vehicle_type_id');
        $result = $this->vehicle_brand_model->get_all_vehicle_type($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//widuranga jayawickrama(validate this function)
    public function createVehicleBrand() {
        $this->form_validation->set_rules('vehicle_brand', 'Vehicle Brand', 'required');
        $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('vehiclebrand/vehicle_brand_model');
            $vehicle_brand = $this->vehicle_brand_model->createVehicleBrand($_POST);

            if ($vehicle_brand) {
                $this->session->set_flashdata('insert_vehicle_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#005fbf;border:solid 1px #005fbf;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered vehicle brand</spam>');
            } else {
                $this->session->set_flashdata('insert_vehicle_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Vehicle brand name already exist</spam>');
            }

            redirect('vehicle_brand/drawIndexVehicleBrand');
        } else {
            $this->drawIndexVehicleBrand();
        }
    }

//
    public function manageVehicleBrand() {

            $this->load->model('vehiclebrand/vehicle_brand_model');
            $this->vehicle_brand_model->manageVehicleBrand($_POST);
            redirect('vehicle_brand/drawIndexVehicleBrand');

    }

}

?>
