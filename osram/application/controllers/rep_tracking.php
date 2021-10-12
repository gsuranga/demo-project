<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rep_tracking
 *
 * @author Thilina
 */
class rep_tracking extends C_Controller{
        private $resours = array(
        'JS' => array('rep_tracking/js/rep_tracking'),
        'CSS' => array());
        
    public function __construct() {
        parent::__construct();
    }
    
    public function drawIndex_rep_tracking(){
        $this->template->attach($this->resours);
        $this->template->draw('rep_tracking/Index_rep_tracking', true);
    }
    public function draw_rep_tracking(){
         $this->load->model('rep_tracking/rep_tracking_model');
    if (isset($_POST['txt_st_date'])&& isset($_POST['txt_gps_emp_name_token']))  {     
         $viewgpsinfo = $this->rep_tracking_model->get_rep_tracking();
          if (isset($_POST['txt_st_date'])) {
            $txt_st_date = $_POST['txt_st_date'];
            $txt_emp_name = $_POST['txt_gps_emp_name_token'];
            $date_range = array('txt_st_date' => $txt_st_date, 'txt_emp_name' => $txt_emp_name);
            $extraData['date_ramge'] = $date_range;
        }
        $extraData['viewgpsinfo'] = $viewgpsinfo;
//        if (isset($_POST['txt_gps_emp_name_token'])) {
//            if ($_POST['txt_gps_emp_name_token'] != '') {
//         $this->template->draw('rep_tracking/draw_rep_tracking', false, $extraData);
//            }else{
//                $extraData = '';
//                $this->template->draw('rep_tracking/draw_rep_tracking', false, $extraData);
//            }  
//            
//        }   
    }
        $this->template->draw('rep_tracking/draw_rep_tracking', false, $extraData);
    }
    public function getUserNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('rep_tracking/rep_tracking_model');
        $column = array('employee_first_name', 'id_employee_has_place','id_physical_place');
        $result = $this->rep_tracking_model->getEmployeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
}
