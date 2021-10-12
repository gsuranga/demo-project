<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of completed_payments
 *
 * @author Iresha Lakmali
 */
class completed_payments extends C_Controller {

    private $resours = array(
        'JS' => array('completedpayments/js/completedpayments'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexCompletedPayments() {
        $this->template->attach($this->resours);
        $this->template->draw('completedpayments/index_completed_payments', true);
    }

    public function drawCompletedPayments() {
        $this->load->model('completedpayments/completed_payments_model');
        $completedPayments = $this->completed_payments_model->completedPayments();
        $this->template->draw('completedpayments/view_all_completed_payments', false, $completedPayments);
    }

    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('delarpayment/delar_payment_model');
        $column = array('delar_name', 'delar_id');
        $result = $this->delar_payment_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}

?>
