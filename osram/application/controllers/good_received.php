<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of good_received
 *
 * @author kanishka
 */
class good_received extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('goodrecived/js/goodrecived'),
        'CSS' => array());

    public function drawIndexGoodRecived() {
        $this->template->attach($this->resours);
        $this->template->draw('goodrecived/indexGoodRecived', true);
    }

    public function drawIndexManageGoodRecived() {
        $this->template->attach($this->resours);
        $this->template->draw('goodrecived/indexManageGood', true);
    }

    public function drawViewGoodRecived() {
        $id_physical_place = '';
        if($this->session->userdata('user_type') == "Admin"){
            
        }  else {
            $id_physical_place = $this->session->userdata('id_employee_has_place');
            
        }
        $this->load->model('good_received/good_received_model');
        $goodRecived = $this->good_received_model->getGoodRecived($id_physical_place);
        $this->template->draw('goodrecived/viewGoodReceived', false, $goodRecived);
    }

    public function drawViewGoodRecivedDetail() {
        $id = $_GET['ea1fe5ea58844b8068ad76b92a0d6590cl_distributorHayleystoken'];
        $this->load->model('good_received/good_received_model');
        $goodRecived_detail = $this->good_received_model->viewGoodRecivedDetail($id);
        $this->template->draw('goodrecived/viewGoodDetails', false, $goodRecived_detail);
    }

    public function getEmployeeNamesByGood() {
        $q = strtolower($_GET['term']);
        $this->load->model('good_received/good_received_model');
        $column = array('fullname', 'id_employee_has_place');
        $result = $this->good_received_model->getEmployeeNamesByGood($q, $column);
        echo json_encode($result);
    }

    public function getGrnByGood() {
        $q = strtolower($_GET['term']);
        $this->load->model('good_received/good_received_model');
        $column = array('good_recived_number', 'id_good_received');
        $result = $this->good_received_model->getGrnByGood($q, $column);
        echo json_encode($result);
    }

    public function deleteGrn() {
        $dilver_detail = json_decode($_POST['data']);
        $this->load->model('good_received/good_received_model');
        $this->good_received_model->deleteGRN($dilver_detail[0]);
    }

}

?>
