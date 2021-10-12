<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of warenty_return
 *
 * @author lahiru
 */
class posm extends C_Controller {
    
     private $resours = array(
        'JS' => array('posm/js/posm'),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    }
    
    function posmIndex(){
        $this->template->attach($this->resours);
         $this->template->draw('posm/posm_index', true);
    }
    
    function posm(){
        $this->load->model('posm/posm_model');
        $extraData['getposm'] = $this->posm_model->getposm();        
        $this->template->draw('posm/posm',FALSE,$extraData);     
    }
    function getDistributorName(){
        $q = strtolower($_GET['term']);
        $this->load->model('posm/posm_model');
        $column = array('employee_first_name','id_physical_place');
        $result = $this->posm_model->getEmployeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    function getItemName(){
        $q = strtolower($_GET['term']);
        $this->load->model('posm/posm_model');
        $column = array('item');
        $result = $this->posm_model->getItemNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
}

?>
