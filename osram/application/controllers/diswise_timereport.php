<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diswise_timereport
 *
 * @author Thilina
 */
class diswise_timereport extends C_Controller{
        private $resours = array(
        'JS' => array('diswise_timereport/js/diswise_timereport'),
        'CSS' => array());
    public function __construct() {
        parent::__construct();
    }
    
    public function drawTimeReportIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('diswise_timereport/indexTimeReport', true);
    }
    public function drawTimeReport() {
        if(isset($_POST['start_order_date'])){
        $this->load->model('diswise_timereport/diswise_timereport_model');
        $timeReportJson = $this->diswise_timereport_model->timeReport();
        }
        $this->template->draw('diswise_timereport/timeReport', false, $timeReportJson);
    }
    public function search_by_time_report_employee() {
        $q = strtolower($_GET['term']);
        $this->load->model('diswise_timereport/diswise_timereport_model');
        $column = array('full_name', 'id_employee');
        $result = $this->diswise_timereport_model->search_by_time_report_employee($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
}
