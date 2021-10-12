<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_wise_target
 *
 * @author Iresha Lakmali
 */
class dealer_wise_target extends C_Controller {

    private $resours = array(
        'JS' => array('dealerwisetarget/js/dealerwisetarget','dealerwisetarget/js/jquery.mtz.monthpicker'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexDealerWiseTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('dealerwisetarget/index_dealer_wise_target', true);
    }

    public function drawDealerWiseTarget() {
        $this->load->model('dealerwisetarget/dealer_wise_target_model');
        $dealerWiseTarget = $this->dealer_wise_target_model->dealerWiseTarget();
        $this->template->draw('dealerwisetarget/dealer_wise_target', false,$dealerWiseTarget);
    }
    
    

}

?>
