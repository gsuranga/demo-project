<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cheque_realized
 *
 * @author Iresha Lakmali
 */
class cheque_realized extends C_Controller{
    
     private $resours = array(
        'JS' => array('chequerealized/js/chequerealized'),
        'CSS' => array(''));
     
    public function __construct() {
        parent::__construct();
    }
    public function drawIndexChequeRealized(){
         $this->template->attach($this->resours);
        $this->template->draw('chequerealized/index_cheque_realized', true); 
    }
    
    public function drawChequeRealized(){
        $this->load->model('chequerealized/cheque_realized_model');
        $chequeRealized = $this->cheque_realized_model->chequeRealized();
        $this->template->draw('chequerealized/view_all_cheque_realized', false,$chequeRealized); 
    }
    
    public function get_all_dealer_shop_name(){
         $q = strtolower($_GET['term']);
        $this->load->model('chequerealized/cheque_realized_model');
        $column = array('delar_shop_name', 'delar_id');
        $result = $this->cheque_realized_model->getAllDealerShopName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function manageChequeRealized(){
        $this->load->model('chequerealized/cheque_realized_model');
        $this->cheque_realized_model->manageChequeRealized($_REQUEST);
          redirect('cheque_realized/drawIndexChequeRealized');
        
    }
    
    public function rejectCheque(){
       $this->load->model('chequerealized/cheque_realized_model');
       $this->cheque_realized_model->rejectCheque($_REQUEST);
         redirect('cheque_realized/drawIndexChequeRealized');
    }
    
    
}

?>

