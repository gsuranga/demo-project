<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of routeplane
 *
 * @author Thisaru
 */
class routeplane extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('routeplan/js/routePlane'),
        'CSS' => array());

    private $resources=array(
        'JS' => array('routeplan/js/update'),
        'CSS' => array());
    
    public function drawAddRoutePlan() {
        $this->template->attach($this->resours);
        $this->template->draw('routeplan/addRoutePlan', true);
    }

    public function drawUpdateRoutePlan() {
        $this->template->attach($this->resources);
        $this->template->draw('routeplan/updateRoutePlan', true);
    }

    public function getRepName() {
        $q = strtolower($_GET['term']);
        $this->load->model('routeplane/routeplane_model');
        $column = array('user_username', 'id_user');
        $result = $this->routeplane_model->getRepNamemodel($q, $column);
        echo json_encode($result);
    }

    public function loadDate() {
        $year = $_GET['year'];
        $name = $_GET['name'];
        $month = $_GET['month'];
        $num = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $extraData['amount'] = $num;
        $this->load->model('routeplane/routeplane_model');
        $extraData['ternames'] = $this->routeplane_model->getTerritory($name);
//  $this->template->dates = $num;
        $this->template->draw('routeplan/routeplanTable', false, $extraData);
    }

//    public function allTerritorname() {
//        echo 'aaaaaaaaaaaaaaaaaaaaaaaaaaa';
//        $this->load->model('routeplane/routeplane_model');
//        $fetchAllEmployee = $this->routeplane->fetchFromAnyTable("tbl_territory", null, null, null, 10000, 0, "RESULTSET", array('territory_status' => 1), null);
//        $pushdata = array('routeplane' => $fetchAllEmployee);
//        $extraData['RoutePlan'] = $pushdata;
    //$this->template->draw('routeplan/routeplanTable', false, $extraData);
//    }

    public function insertData() {
        $year = $_POST['year'];
        $name = $_POST['name'];
        $month = $_POST['month'];
        $id = $_POST['id'];
        $territoryName = $_POST['territoryName'];
        $this->load->model('routeplane/routeplane_model');
        $employee_has_place = $this->routeplane_model->get_place_Id($id);
        $id_employee_has_place = $employee_has_place[0]->id_employee_has_place;

        $this->routeplane_model->insertToAddRoutePlan($id_employee_has_place, $year, $month, $territoryName);
    }
    
    public function loadDateU() {
        $year = $_GET['year'];
        $name = $_GET['name'];
        $month = $_GET['month'];      
        $this->load->model('routeplane/routeplane_model');
        //$extraData['amount'] = $this->routeplane_model->getTerritoryDetCount($name,$year,$month);        
        $extraData['ternames']= $this->routeplane_model->getTerritoryDet($name,$year,$month);
        $extraData['ternamesDet']= $this->routeplane_model->getTerritory($name);
        echo json_encode($extraData);
        //$this->template->draw('routeplan/updateRoutePlanTable', false, $extraData);
    }

}
