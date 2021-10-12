<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_reminder
 *
 * @author Iresha Lakmali
 */
class meeting_reminder extends C_Controller {

    private $resours = array(
        'JS' => array('meetingreminder/js/meetingreminder'),
        'CSS' => array('meetingreminder/css/meetingreminder'));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexMeetingReminder() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingreminder/index_meeting_reminder', true);
    }

    public function drawViewAllMeetingReminder() {
        $this->load->model('meetingreminder/meeting_reminder_model');
        $allMeetingReminder = $this->meeting_reminder_model->AllMeetingReminder();
        $this->template->draw('meetingreminder/view_all_meeting_reminder', false, $allMeetingReminder);
    }

    public function drawUserMeetingReminder() {
        $this->load->model('meetingreminder/meeting_reminder_model');
        $employe_id = $this->session->userdata('employe_id');
        $meeting_id = $_REQUEST[md5(date('Y:m:d'))];
        $allMeetingReminder = $this->meeting_reminder_model->getUserMeetingdetails($meeting_id, $employe_id);
        
        $this->template->draw('meetingreminder/meeting_reminder', false, $allMeetingReminder);
    }
    
    public function chenheMeetingasview() {
        $this->load->model('meetingreminder/meeting_reminder_model');
        $meeting_id = $_REQUEST['meeting_id'];
        
        $this->meeting_reminder_model->chenheMeetingasview($meeting_id);
        
    }

    public function drawIndexPopupMeetingReminder() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingreminder/index_popup_meeting_reminder', true);
    }

    public function drawMeetingReminder() {
        $this->load->model('meetingreminder/meeting_reminder_model');
        $meetingReminder = $this->meeting_reminder_model->meetingReminder();
        $this->template->draw('meetingreminder/meeting_reminder', false, $meetingReminder);
    }

    public function drawMeetingReminderAlert() {
        $this->template->draw('meetingreminder/reminder_alert', false);
    }

}

?>
