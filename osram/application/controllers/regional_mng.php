<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Regional_mng
 *
 * @author Thilina
 */
class regional_mng extends C_Controller{
     private $resours = array(
        'JS' => array('regional_mng/js/regional_mng'),
        'CSS' => array());
    public function __construct() {
        parent::__construct();
    }
    
    public function drawRegional_mng(){

        $this->template->attach($this->resours);
        $this->template->draw('regional_mng/Regional_mngIndex', true);
    }
    public function drawRegional_mng_reg(){
       
        $this->template->draw('regional_mng/registerRegional_mng', FALSE);
    }
    public function getregionalName(){
        $q = strtolower($_GET['term']);
        $this->load->model('regional_mng/regional_mng_model');
        $column = array('fullName','id_employee_has_place','id_physical_place');
        $result = $this->regional_mng_model->getregionalName($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function get_dis_names(){
         $q = strtolower($_GET['term']);
        $this->load->model('regional_mng/regional_mng_model');
        $column = array('fullName','id_employee_has_place','id_physical_place');
        $result = $this->regional_mng_model->getDisName($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function insert_regional_mng(){
         echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
//        $this->form_validation->set_rules('rmngName', 'Regional Manager name', 'required');
//        $this->form_validation->set_rules('dis_name1', 'Assign Distributor', 'required');
//        if ($this->form_validation->run()) {
        $this->load->model('regional_mng/regional_mng_model');
        $insertRegion = $this->regional_mng_model->insert_regional_mng();
          if ($insertRegion) {
                $this->session->set_flashdata('insertRegion', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Assigned Distributor</spam>');
            } else {
                $this->session->set_flashdata('insertRegion', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Distributor Assigned Error</spam>');
            }
        redirect('regional_mng/drawRegional_mng');
//        }else {
//            $this->drawRegional_mng();
//        }
    }
    public function drawViewRegional_mng(){
        $this->load->model('regional_mng/regional_mng_model');
        $insertRepTarget = $this->regional_mng_model->ViewRegional_mng();
        $this->template->draw('regional_mng/viewRegional_mng', FALSE,$insertRepTarget);
    }
    public function deleteMng(){
        $this->load->model('regional_mng/regional_mng_model');
        $id = $this->input->get('id_token');
        $deletetarget = $this->regional_mng_model->deleteMng($id);
         if ($deletetarget) {
                $this->session->set_flashdata('delete_assign', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Assigned Distributor</spam>');
            } else {
                $this->session->set_flashdata('delete_assign', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Assigned Distributor Error</spam>');
            }
        redirect("regional_mng/drawRegional_mng");
    }
    public function get_previous_assinged(){
        $this->load->model('regional_mng/regional_mng_model');
        $result = $this->regional_mng_model->get_previous_assinged();
        foreach ($result as $value) {
            $column = array("region_assign_id" => $value->region_assign_id);
        }
        $no_result = array('label' => 'valid');
        if (count($result) > 0) {
            echo json_encode($column);
        } else {
            echo json_encode($no_result);
        } 
    }
}
