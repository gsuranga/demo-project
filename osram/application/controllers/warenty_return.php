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
class warenty_return extends C_Controller {
    
     private $resours = array(
        'JS' => array('warenty_return/js/warrnty_retrn'),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    }
    
    function warentyreturnIndex(){
        $this->template->attach($this->resours);
         $this->template->draw('warenty_return/warenty_return_index', true);
    }
    
    function warrantyreturn(){
        $this->template->attach($this->resours);
        $this->load->model('warranty_return/warranty_return_model');
        $extraData['getWarrantyReturn'] = $this->warranty_return_model->getWarrantyReturn();        
        $this->template->draw('warenty_return/warranty_return',FALSE,$extraData);
        
        
    }
}

?>
