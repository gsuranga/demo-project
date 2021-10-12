<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_analysis_report
 * 06-04-2015
 * @author Dilhari
 */
class part_analysis_report extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('part_analysis_report/js/part_analysis_report_js'),
        'CSS' => array('')
    );
    
    public function drawIndexPartAnalysisSummary() {
        $this->template->attach($this->resource);
        $this->template->draw('part_analysis_report/index_all_part_analysis_report', TRUE);
    }
    
    public function drawAllPartAnalysisSummary() {
        $this->template->attach($this->resource);
        $this->load->model('part_analysis_report/part_analysis_report_model');
        $details = $this->part_analysis_report_model->get_details();
        $this->template->draw('part_analysis_report/create_part_analysis_report', false, $details);
    }
    
//    public function getDetails() {
//        $this->load->model('part_analysis_report/part_analysis_report_model');
//        $data = 
//        echo json_encode($data);
//    }
    
    public function drawIndexViewDetails() {
        $this->template->attach($this->resource);
        $this->template->draw('part_analysis_report/index_all_part_analysis_details', TRUE);
    }
    
    public function createPartNumberDetails() {
        $id = $_REQUEST['item_id'];
        $this->load->model('part_analysis_report/part_analysis_report_model');
        $details = $this->part_analysis_report_model->view_part_number_details($id);
        $this->template->draw('part_analysis_report/view_part_number_details', false, $details);
    }
    
    public function createPartAnalysisDetails() {
        $id = $_REQUEST['item_id'];
        $date = date('Y-m-d');
        $this->load->model('part_analysis_report/part_analysis_report_model');
        $details = $this->part_analysis_report_model->view_part_details($id, $date);
        $this->template->draw('part_analysis_report/view_part_analysis_details', false, $details);
    }
}
