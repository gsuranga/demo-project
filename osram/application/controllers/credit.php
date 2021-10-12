<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of credit
 *
 * @author warunaoshan@gmail.com
 */
class credit extends C_Controller {

    private $resours = array(
        'JS' => array('credit_enhancement_form/js/credit'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }
    
    function creditEnhancementIndex(){
         $this->template->draw('credit_enhancement_form/creditEnhancementIndex', true);
    }
    

    function drawCreditEnhancement() {
        $this->template->attach($this->resours);
        $dis_id = 4;
        $this->load->model('credit_enhancement/credit_enhancement_model');
        $extraData['getDistributor'] = $this->credit_enhancement_model->getDistributor($dis_id);
        $extraData['getPaymentSummery'] = $this->credit_enhancement_model->getPaymentSummery();
        
        $this->template->draw('credit_enhancement_form/credit_enhancement',false, $extraData);
    }

    public function getDistributor($dis_id) {
        $this->load->model('credit_enhancement/credit_enhancement_model');
        return $this->credit_enhancement_model->getDistributor($dis_id);
    }
    

}
