<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_type
 *
 * @author Iresha Lakmali
 */
class meeting_type extends C_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function drawIndexMeetingType(){
        $this->template->draw('meetingtype/index_meeting_type', true);
    }
    
    public function drawCreateMeetingType(){
        $this->template->draw('meetingtype/create_meeting_type', false);
    }
    
    public function drawViewAllMeetingType(){
        $this->load->model('meetingtype/meeting_type_model');
        $viewAllMeetingType = $this->meeting_type_model->viewAllMeetingType();
        $this->template->draw('meetingtype/view_all_meeting_type', false,$viewAllMeetingType);
    }
    
    public function createMeetingType(){
        $this->load->model('meetingtype/meeting_type_model');
        $this->meeting_type_model->createMeetingType($_POST);
        redirect('meeting_type/drawIndexMeetingType');
    }
    
    
    public function drawManageMeetingType(){
        $this->template->draw('meetingtype/manage_meeting_type',false);
    }
    
    public function remooveMeetingType(){
       $this->load->model('meetingtype/meeting_type_model');
       $id = $this->input->get('meeting_type_id');
       $this->meeting_type_model->remooveMeetingType($id);
       redirect('meeting_type/drawIndexMeetingType');
    }
    
    public function manageMeetingType(){
         $this->load->model('meetingtype/meeting_type_model');
         $this->meeting_type_model->manageMeetingType($_POST);
    }
   
}

?>
