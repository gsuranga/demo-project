<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_return
 *
 * @author SHDINESH
 */
class dealer_return extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('dealer_return/js/dealer_return'),
        'CSS' => array()
    );

    public function drawIndexAllDealerReturns() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_return/index_dealer_return', TRUE);
    }

    public function drawAllDealerReturns() {
        $rep_id = $this->session->userdata('employe_id');
        $this->load->model('dealer_return/dealer_return_model');
        $viewAllPendingReturns = $this->dealer_return_model->viewAllPendingReturns($rep_id);
        $this->template->draw('dealer_return/all_dealer_pending_returns', FALSE, $viewAllPendingReturns);
    }

    public function drawIndexDealerReturnDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_return/index_view_all_dealer_return_detail', true);
    }

    public function drawDealerReturnDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAllDealerReturnDetails = $this->dealer_return_model->viewAllDealerReturnDetails($_REQUEST);
        $this->template->draw('dealer_return/view_all_dealer_return_detail', false, $viewAllDealerReturnDetails);
    }

    public function addNewDealerReturn() {
        $arg = $_REQUEST['args1'];
        $str_replacen = str_replace("%30", "\\n", $arg);
        $str_replace = str_replace("%20", "\\s", $str_replacen);
        $json_S = json_decode($str_replace, TRUE);
        $count = count($json_S);
        $this->load->model('dealer_return/dealer_return_model');
        $this->dealer_return_model->addNewDealerReturn($json_S[($count - 1)]);
        $last_id = $this->dealer_return_model->getLastInsertedReturnID($json_S[($count - 1)]);
        if ($last_id > 0) {
            $this->dealer_return_model->addNewDealerReturnDetail($json_S, $last_id);
        }
        $data_array = array(
            "id" => $last_id,
        );
        $json_encode = json_encode($data_array, JSON_FORCE_OBJECT);
        echo $json_encode;
        return $json_encode;
    }

    //widuranga=jayawickrama========================================================================================
    public function viewReturenDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewReturnDetail = $this->dealer_return_model->viewReturnDetail();
        echo json_encode($viewReturnDetail);
    }

    public function ReturenDeta() {
        $this->load->model('dealer_return/dealer_return_model');
        $this->dealer_return_model->ReturenDeta();
    }

    public function drawacceptedReturn() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAllPendingReturns = $this->dealer_return_model->ViewAcceptedForLastSavenDealer();
        $this->template->draw('dealer_return/accepted_order', FALSE, $viewAllPendingReturns);
    }

    public function rejectedDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_return/rejectedOrder', FALSE);
    }

    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_return/dealer_return_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->dealer_return_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getdealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_return/dealer_return_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->dealer_return_model->getDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_dealerAccountNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_return/dealer_return_model');
        $column = array('delar_account_no', 'delar_id');
        $result = $this->dealer_return_model->getAllDealeAccountNo($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getdealerAccountNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('dealer_return/dealer_return_model');
        $column = array('delar_account_no', 'delar_id');
        $result = $this->dealer_return_model->getDealeAccountNo($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function viewAcceptedOrders() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAcceptedOrder = $this->dealer_return_model->viewAcceptedOrder();
        echo json_encode($viewAcceptedOrder);
    }

    public function viewacceptedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAccepteddetails = $this->dealer_return_model->viewAcceptedDetails();
        echo json_encode($viewAccepteddetails);
    }

    public function viewrejectedOrder() {
        $this->load->model('dealer_return/dealer_return_model');
        $this->dealer_return_model->RejectedOrder();
    }

    public function viewReturnDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAccepteddetails = $this->dealer_return_model->rejectDetails();
        echo json_encode($viewAccepteddetails);
    }

    public function viewreRectedOrderDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAccepteddetails = $this->dealer_return_model->veiwReturnDetails();
        echo json_encode($viewAccepteddetails);
    }

    //===============================================================admin==================================

    public function adminReturnIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_return/returnAdminIndex', TRUE);
    }

    public function drawAdminAcceptedReturn() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewAllPendingReturns = $this->dealer_return_model->penddingDetailsAdmin();
        $this->template->draw('dealer_return/penddingDetailsAdmin', FALSE, $viewAllPendingReturns);
    }

    public function AdminViewfullPebddingDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewPenddingDetails = $this->dealer_return_model->AdminViewfullPebddingDetails();
        echo json_encode($viewPenddingDetails);
    }

    public function AdminAcceptedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $adminReturenDeta = $this->dealer_return_model->AdminReturenDeta();
        echo json_encode($adminReturenDeta);
    }

    public function AdminacceptedReturnView() {
        $this->template->attach($this->resours);
        $dataset = $this->dealer_return_model->viewAcceptedOredeForAdminTosevenDay();
        $this->template->draw('dealer_return/adminAccepted', FALSE, $dataset);
    }

    public function AdminRejectedView() {
        $this->template->attach($this->resours);
        $this->template->draw('dealer_return/adminReject', FALSE);
    }

    public function getAdminAcceptedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewPenddingDetails = $this->dealer_return_model->getAdminAcceptedDetails();
        echo json_encode($viewPenddingDetails);
    }

    public function getAdminRejectedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewPenddingDetails = $this->dealer_return_model->getAdminRejectedDetails();
        echo json_encode($viewPenddingDetails);
    }

    public function viewAdminRejectedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewPenddingDetails = $this->dealer_return_model->viewAdminRejectedDetails();
        echo json_encode($viewPenddingDetails);
    }

    public function VeiwFullAdminAcceptedDetails() {
        $this->load->model('dealer_return/dealer_return_model');
        $viewPenddingDetails = $this->dealer_return_model->VeiwAdminAcceptedDetails();
        echo json_encode($viewPenddingDetails);
    }

    public function adminRejectedreturn() {
        $this->load->model('dealer_return/dealer_return_model');
        $this->dealer_return_model->adminRejectedreturn();
    }

}
