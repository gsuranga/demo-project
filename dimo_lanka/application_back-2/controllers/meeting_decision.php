<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * DesScription of meeting_decision
 *
 * @author Iresha Lakmali
 */
class meeting_decision extends C_Controller {

    private $resours = array(
        'JS' => array('meetingdecision/js/meetingdecision'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexMeetingDecision() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingdecision/index_meeting_decision', true);
    }

    public function drawCreateMeetingDecision() {
        $this->template->draw('meetingdecision/create_meeting_decision', false);
    }

    public function get_all_branch() {
        $q = strtolower($_GET['term']);
        $this->load->model('meetingdecision/meeting_decision_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->meeting_decision_model->getAllBranch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function get_all_meeting_topic(){
        $q = strtolower($_GET['term']);
        $this->load->model('meetingdecision/meeting_decision_model');
        $column = array('meeting_topic_name', 'meeting_topic_id');
        $result = $this->meeting_decision_model->get_all_meeting_topic($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawIndexMeetingDecisionDiscussion() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingdecision/index_meeting_decision_discussion', true);
    }

    public function drawMeetingDecisionDiscussion() {
        $this->template->draw('meetingdecision/meeting_decision_discussion', false);
    }
    
    public function createMeetingDecisionDiscussion() {
        $this->template->draw('meetingdecision/create_meeting_decision_discussion', false);
    }

    public function createMeetingDecision() {
        $this->load->model('meetingdecision/meeting_decision_model');
        $this->meeting_decision_model->createMeetingDecision($_POST);
        //redirect('meeting_decision/drawIndexMeetingDecision');
    }
    
    public function meetingDetails(){
       $this->load->model('meetingdecision/meeting_decision_model');
       $meetingDetails = $this->meeting_decision_model->meetingDetails();
       $this->template->draw('meetingdecision/create_meeting_decision', false,$meetingDetails);
    }
    
     public function get_all_responsibility() {
        $q = strtolower($_GET['term']);
        $this->load->model('meetingdecision/meeting_decision_model');
        $column = array('sales_officer_name', 'sales_officer_id');
        $result = $this->meeting_decision_model->get_all_responsibility($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function get_employee_accountcode(){
        $q = strtolower($_GET['term']);
        $this->load->model('meetingdecision/meeting_decision_model');
        $column = array('apm_name', 'apm_account_no');
        $result = $this->meeting_decision_model->get_apm_accountcode($q, $column);
        $rs = 1;
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            $column = array('sales_officer_name', 'sales_officer_account_no');
            $result = $this->meeting_decision_model->get_sales_officeraccountcode($q, $column);
            if(count($result) > 0){
                echo json_encode($result);
            }  else {
                $rs = 2;
            }
            
        }
        
        if($rs == 2){
            echo json_encode($no_result);
        }
        
        
    }

        public function get_all_follow_up(){
         $q = strtolower($_GET['term']);
        $this->load->model('meetingdecision/meeting_decision_model');
        $column = array('apm_name', 'apm_id');
        $result = $this->meeting_decision_model->get_all_follow_up($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}

?>
