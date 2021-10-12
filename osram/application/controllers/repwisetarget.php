<?php

/**
 * @Decription rep wise target
 * @author Faazi ahamed <faaziahamed@gmail.com>
 * @copyright (c) 2014, 
 */
class repwisetarget extends C_Controller {

    private $resources = array(
        'JS' => array('rep_wise_target/js/report'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    function drawindexreptarget() {
        $this->template->attach($this->resources);
        $this->template->draw('rep_wise_target/drawindextargeteport', true);
    }

    function drawreptarget() {
        $this->load->model('rep_wise_target/targetreport_model');
        $dataSet = $this->targetreport_model->getreptarget($_REQUEST);
        $this->template->draw('rep_wise_target/drawtargeteport', false, $dataSet);
    }
    
    function totalTarget($id_phy = '',$date = '') {
        $this->load->model('rep_wise_target/targetreport_model');
        $dataSet = $this->targetreport_model->getreptargettotal($id_phy, $date);
        return $dataSet;
//        $this->template->draw('rep_wise_target/drawtargeteport', false, $dataSet);
    }

    function getAcheivement($id_phy = '', $id_ehp = '', $date = '') {
        $this->load->model('rep_wise_target/targetreport_model');
        $dataSet = $this->targetreport_model->getAchievement($id_phy, $id_ehp, $date);
        return $dataSet;
    }
    function getsales($id_phy = '', $id_ehp = '', $date = ''){
        $this->load->model('rep_wise_target/targetreport_model');
        $dataSet = $this->targetreport_model->getsales($id_phy, $id_ehp, $date);
        return $dataSet;
    }

    public function getDistributorname() {
        $q = strtolower($_GET['term']);
        $this->load->model('rep_wise_target/targetreport_model');
        $column = array('full_name', 'id_employee', 'id_physical_place');
        $result = $this->targetreport_model->getDistributorname($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}
