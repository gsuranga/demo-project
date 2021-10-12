<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_analysis
 * 01-04-2015
 * @author Dilhari
 */
class part_analysis extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    private $resource = array(
        'JS' => array('part_analysis/js/part_analysis_js'),
        'CSS' => array('')
    );
    
    public function drawIndexPartAnalysis(){
        $this->template->attach($this->resource);
        $this->template->draw('part_analysis/index_all_part_analysis', TRUE);
    }
    
    public function drawAllPartAnalysis() {
        $this->template->attach($this->resource);
        $this->template->draw('part_analysis/create_part_analysis', false);
    }
    
    public function viewAllPartAnalysis() {
        $this->load->model('part_analysis/part_analysis_model');
        $viewAllAPM = $this->part_analysis_model->viewAllPartAnalysis();
        $this->template->draw('part_analysis/view_part_analysis', false, $viewAllAPM);
    
    }
    
     public function drawIndexManagepart() {
        $this->template->attach($this->resource);
        $this->template->draw('part_analysis/index_manage_PartAnalysis', true);
    }
    
     public function  drawManagePartAnalysis() {
        $this->template->draw('part_analysis/manage_partanalysis', false);
    }
    
      public function managepart() {
            $this->load->model('part_analysis/part_analysis_model');
            $this->part_analysis_model->update($_POST);
            redirect('part_analysis/drawIndexPartAnalysis');
        
    }
   
    
    
    public function getDealerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('part_analysis/part_analysis_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->part_analysis_model->get_dealer_name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    
       public function getAllPartNumbers() {
        $q = strtolower($_GET['term']);
        $this->load->model('part_analysis/part_analysis_model');
        $column = array('item_part_no','item_id','description', 'selling_price');
        $result = $this->part_analysis_model->getAllPartNumbers($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    
//        public function  getpartnum() {
//        $q = strtolower($_GET['term']);
//        $this->load->model('part_analysis/part_analysis_model');
//        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
//        $result = $this->part_analysis_model->getpartnum($q, $column);
//        $result_data = array('label' => 'no result...');
//        if (count($result) > 0) {
//            echo json_encode($result);
//        } else {
//            echo json_encode($result_data);
//        }
//    }
//    
    
    public function getPartNumber() {
        
        $dlr_id='0';
        
        if(isset($_GET['dlr_id']))
        {
            $dlr_id=$_GET['dlr_id'];
        }
         
        
        $q = strtolower($_GET['term']);
        $this->load->model('part_analysis/part_analysis_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price','avg_momnt');
        $result = $this->part_analysis_model->getPartNumber($q, $column,$dlr_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
    
    public function submitPartAnalysis(){
        $this->load->model('part_analysis/part_analysis_model');
        if ($this->part_analysis_model->submit_part_analysis() > 0) {
            echo json_encode(array('result' => 1));
        } else {
            echo json_encode(array('result' => 0));
        }
    }
    public function justcheck() {
        $this->load->model('part_analysis/part_analysis_model');
      echo  $this->part_analysis_model->justcheck();
    //  echo '1234';
         
    }
}
