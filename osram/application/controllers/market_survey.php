<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_take
 *
 * @author chathun
 */
class market_survey extends C_Controller{
    
     private $resours = array(
        'JS' => array('market_survey/js/market_survey'),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    }
    
    public function marketsurveyindex(){
        $this->template->attach($this->resours);
        $this->template->draw('market_survey/market_survey_index',TRUE);
    }
    
    public function getmarketsurvey(){
        $this->load->model('market_survey/market_survey_model');        
        $extraData['getmarketsurvey'] = $this->market_survey_model->getmarketsurvey();        
        $this->template->draw('market_survey/market_survey',FALSE,$extraData);
    }

    public function getItemName(){
            
        $q = strtolower($_GET['term']);
        $this->load->model('market_survey/market_survey_model');
        $column = array('item_name','id_products');
        $result = $this->market_survey_model->getItemNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        
            }
    }
    }


?>
