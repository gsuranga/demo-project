<?php

/**
 * Tuesday, July 22 2014 14:14:50
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class islandMap extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function drawWorkingMap() {
        $this->template->attach(array(
            'JS' => array('islandMap/working/js/html2canvas', 'islandMap/working/js/index')
        ));
        $this->template->draw('islandMap/working/index', true);
    }

    public function getReps() {
        $this->load->model('islandMap/islandmap_model');
        return $this->islandmap_model->getReps();
    }

    function getRep_invoice_Info() {
        $this->load->model('islandMap/islandmap_model');
        return $this->islandmap_model->getRep_invoice_Info();
    }

    function getSalInfo() {
        $this->load->model('islandMap/islandmap_model');
        return $this->islandmap_model->getSalInfo();
    }

    function getRepStatus($tid, $typ) {
        $this->load->model('islandMap/islandmap_model');
        return $this->islandmap_model->getRepStatus($tid, $typ);
    }

    function lastHourStatus($eid) {
        $this->load->model('islandMap/islandmap_model');
        return $this->islandmap_model->lastHourStatus($eid);
    }

}
