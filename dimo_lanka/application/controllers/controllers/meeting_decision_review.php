<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_decision_review
 *
 * @author Iresha Lakmali
 */
class meeting_decision_review extends C_Controller {

    private $resours = array(
        'JS' => array('meetingdecisionreview/js/meetingdecisionreview'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexMeetingDecisionReview() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingdecisionreview/index_meeting_decision_review', true);
    }

    public function drawMeetingDecisionReview() {
        $this->template->draw('meetingdecisionreview/meeting_decision_review', false);
    }

    public function drawViewAllMeetingDecision() {
        $this->template->draw('meetingdecisionreview/view_all_meeting_decision', false);
    }
 
    public function drawIndexMeetingDecision() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingdecisionreview/index_meeting_decision', true);
    }

    public function meetingDetails() {
        $this->load->model('meetingdecisionreview/meeting_decision_review_model');
        $meetingDetails = $this->meeting_decision_review_model->meetingDetails();
        $this->template->draw('meetingdecisionreview/view_all_meeting_decision', false, $meetingDetails);
    }
    
    public function drawMeetingDecisionDetail() {
        $this->load->model('meetingdecisionreview/meeting_decision_review_model');
        $extraData['meetingDetails'] = $this->meeting_decision_review_model->getsolutiondetails($_GET['meeting_responsibles_token']);
        $extraData['comments'] = $this->meeting_decision_review_model->getComments($_GET['meeting_responsibles_token']);
        $this->template->draw('meetingdecisionreview/meeting_decision_detail', FALSE, $extraData);
    }
  

    public function drawInitialReviewDate() {
        $this->template->draw('meetingdecisionreview/initial_review_date');
    }

    public function drawFinalReviewDate() {
        $this->template->draw('meetingdecisionreview/final_review_date');
    }
    
    public function saveInitialcomment() {
        $this->load->model('meetingdecisionreview/meeting_decision_review_model');
        $this->meeting_decision_review_model->saveComment($_POST);
        $meeting_responsibles_id = $_POST['meeting_responsibles_id'];
        redirect('meeting_decision_review/drawIndexMeetingDecisionReview?meeting_responsibles_token=' . $meeting_responsibles_id);
    }

}

?>
