<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_topic
 *
 * @author Iresha Lakmali
 */
class meeting_topic extends C_Controller {

    private $resours = array(
        'JS' => array('meetingtopic/js/meetingtopic'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexMeetingTopic() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingtopic/index_meeting_topic', true);
    }

    public function drawCreateMeetingTopic() {
        $this->template->draw('meetingtopic/create_meeting_topic', false);
    }

    public function drawManageMeetingTopic() {
        $this->template->draw('meetingtopic/manage_meeting_topic', false);
    }

    public function drawViewAllMeetingTopic() {
        $this->load->model('meetingtopic/meeting_topic_model');
        $viewAllMeetingTopic = $this->meeting_topic_model->viewAllMeetingTopic();
        $this->template->draw('meetingtopic/view_all_meeting_topic', false, $viewAllMeetingTopic);
    }

    public function createMeetingTopic() {
        $this->form_validation->set_rules('meeting_topic', 'Meeting Topic', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('meetingtopic/meeting_topic_model');
            $this->meeting_topic_model->createMeetingTopic($_POST);
            redirect('meeting_topic/drawIndexMeetingTopic');
        } else {
            $this->drawIndexMeetingTopic();
        }
    }

    public function removeMeetingTopic() {
        $this->load->model('meetingtopic/meeting_topic_model');
        $this->meeting_topic_model->removeMeetingTopic($_REQUEST);
    }

    public function manageMeetingTopic() {
        $this->load->model('meetingtopic/meeting_topic_model');
        $this->meeting_topic_model->manageMeetingTopic($_POST);
        redirect('meeting_topic/drawIndexMeetingTopic');
    }
    
    /// Meeting Attendance ///
    
    

}

?>
