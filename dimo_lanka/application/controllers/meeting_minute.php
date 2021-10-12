<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_minute
 *
 * @author Iresha Lakmali
 */
class meeting_minute extends C_Controller {

    private $resours = array(
        'JS' => array('meetingminute/js/meetingminute'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexMeetingMinute() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingminute/index_meeting_minute', true);
    }

    public function drawCreateMeetingMinute() {
        $this->template->draw('meetingminute/create_meeting_minute', false);
    }

    public function drawIndexMeetingGroup() {
        $this->template->attach($this->resours);
        $this->template->draw('meetingminute/index_create_group', true);
    }

    public function drawCreateMeetingGroup() {
        $this->template->draw('meetingminute/create_group', false);
    }
     public function drawIndexMeetingSucess() {
        $this->template->draw('meetingminute/index_meeting_sucess', true);
    }
      public function drawMeetingSucess() {
        $this->template->draw('meetingminute/meeting_sucess', true);
    }
    

    public function get_all_group_name() {
        
        $q = strtolower($_GET['term']);
        $this->load->model('meetingminute/meeting_minute_model');
        $column = array('meeting_group_name', 'meeting_group_id');
        $result = $this->meeting_minute_model->get_all_group_name($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_branch() {
        $q = strtolower($_GET['term']);
        $this->load->model('meetingminute/meeting_minute_model');
        $column = array('branch_name', 'branch_id');
        $result = $this->meeting_minute_model->getAllBranch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllAcountNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('meetingminute/meeting_minute_model');
        $column = array('sales_officer_account_no', 'sales_officer_id');
        $result = $this->meeting_minute_model->getAllAcountNo($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_designation() {
        $this->load->model('meetingminute/meeting_minute_model');
        $bank = $this->meeting_minute_model->getAllDesignation();
        if (count($bank) > 0) {
            echo json_encode($bank);
        }
    }

    public function set_employee_name() {
        $q = strtolower($_GET['term']);
        $user_type = $_GET['user_type'];
        $this->load->model('meetingminute/meeting_minute_model');
        $column = array();
        if ($user_type == "Sales Officer") {
            $column = array('sales_officer_name', 'sales_officer_id', 'email_address_O', 'sales_officer_account_no');
        }
        if ($user_type == "APM") {
            $column = array('apm_name', 'apm_id', 'email_address_O', 'apm_account_no');
        }
        $result = $this->meeting_minute_model->getAllEmployeeName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            ;
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function createBoardMeetingMinute() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'dimolankaceylonlinux@gmail.com',
            'smtp_pass' => 'dimolanka',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $this->load->model('meetingminute/meeting_minute_model');
        $this->meeting_minute_model->createBoardMeetingMinute($_POST);
        $lastRow = $this->meeting_minute_model->getLastRow();
        $emp_count = $_POST['emp_count'];
        
        $emp_count++;
        $invites_group = $_POST['hidden_invites_group'];
        $invites_group++;
        
        for ($x = 1; $x < $emp_count; $x++) {
            $response = 0;

            if (isset($_POST['chk_responce_' . $x])) {
                $response = 1;
            }

            $emp_detail = array(
                'meeting_minute_id' => $lastRow,
                'employee_id' => $_POST['txt_employee_id_' . $x],
                'employee_type' => $_POST['cmb_user_type_' . $x],
                'account_no' => $_POST['txt_account_no_' . $x],
                'responsibility' => $response
            );
             
            for ($x = 1; $x < $invites_group; $x++) {
                echo 'row x'.$x;
            if (isset($_POST['txt_invites_id_' . $x]) && $_POST['txt_invites_id_' . $x] != '') {
                $dataArray1 = array(
                    'meeting_group_detail_id' => $_POST['txt_invites_id_' . $x],
                    'meeting_miniute_id' => $lastRow
                );
                $this->meeting_minute_model->createInvites($dataArray1);
               
            }
        }
          
           /* $this->load->library('email', $config);6
            $message = 'Dear ' . $_POST['txt_employee_name_' . $x] . ',' . "<br>";
            $this->email->set_newline("\r\n");
            $message = 'This is a reminder to everyone about the upcoming ' . $_POST['cmb_meeting_type'] . '.' . "<br>" . 'This' . $_POST['start_date'] . "<br>" . 'Please make a note of the date and time and be a few minutes early so that we can make sure everyone is available' . "<br>" . $_POST['cmb_meeting_type'] . 'details are listed below.' . "<br>" . 'Meeting time ' . $_POST['start_time'] . "<br>" . 'Venue' . $_POST['location'] . "<br>" . 'purpose' . $_POST['purpose'] . "<br>" . 'Thank you,' . "<br>" . 'Dimo Lanka';

            $this->email->set_newline("\r\n");


            $this->email->set_newline("\r\n");

            $this->email->from('dimolankaceylonlinux@gmail.com'); // change it to yours

            $this->email->to($_POST['txt_employee_email_' . $x]); // change it to yours

            $this->email->subject($_POST['cmb_meeting_type'] . ' Reminder');

            $this->email->message($message);

            if ($this->email->send()) {

                echo 'Email sent.';
            } else {

                show_error($this->email->print_debugger());
            }
*/
            $this->meeting_minute_model->createMinuteDetails($emp_detail);
        }
        redirect('meeting_minute/drawIndexMeetingMinute');
    }

    public function drawIndexBoardmeeting() {
        $this->load->model('meetingminute/meeting_minute_model');
        $createBoardMeeting = $this->meeting_minute_model->createBoardMeeting();
        $this->template->draw('meetingminute/create_meeting_minute', false, $createBoardMeeting);
    }

    public function checkMeetings() {
        $this->load->model('meetingminute/meeting_minute_model');
        $checkMeetings = $this->meeting_minute_model->checkMeetings();
        $json_array = array();
        $json_array['count'] = count($checkMeetings);
        $json_array['data'] = array();
        foreach ($checkMeetings as $value) {
            $data = array(
                'meeting_minute_detail_id' => $value['meeting_minute_detail_id'],
                'meeting_minute_id' => $value['meeting_minute_id']
            );
            array_push($json_array['data'], $data);
        }
        echo json_encode($json_array);
    }

    public function viewnotifications() {
        $this->load->model('meetingminute/meeting_minute_model');
        $checkMeetingsnotifications = $this->meeting_minute_model->checkMeetingsnotifications();
        $this->template->draw('meetingreminder/view_notifications', false, $checkMeetingsnotifications);
    }

    public function createMeetingGroup() {
        $this->load->model('meetingminute/meeting_minute_model');
        $this->meeting_minute_model->createMeetingGroup($_POST);
//         redirect('meeting_minute/drawMeetingSucess');
    }
}
?>


