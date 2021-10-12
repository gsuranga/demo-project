<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cheque_realized
 *
 * @author kanishka
 */
class cheque_realized extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('realized/js/realized','reports/js/reports'),
        'CSS' => array());

    public function drawindexrealized() {
        $this->template->attach($this->resours);
        $this->template->draw('realized/indexrealized', true);
    }

    public function drawviewrealized() {
        if(isset($_POST['Search'])){
        $this->load->model('realized/realized_model');
        $details = $this->realized_model->getCheckPaymentDetails();
        }
        $this->template->draw('realized/viewrealized', FALSE,$details);
    }

    public function getOutletNames() {
        $this->load->model('realized/realized_model');
        $employe_id = '';
        if ($this->session->userdata('user_type') == "Admin") {
            
        } else {
            $employe_id = $this->session->userdata('id_employee_has_place');
        }
        $q = strtolower($_GET['term']);
       
        $column_no = array('label' => 'no result');
        $column = array('outlet_name', 'id_sales_order');
        $result = $this->realized_model->getOutelets($q, $employe_id , $column);
        if(count($result) > 0){
            echo json_encode($result);
        }  else {
            echo json_encode($column_no);
        }
        
        
    }
    
    public function changetoRealized(){
        $this->load->model('realized/realized_model');
        $this->realized_model->changetoRealized();
        redirect('cheque_realized/drawindexrealized');
    }

}

?>
