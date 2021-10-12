<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of new_campaign
 *
 * @author insaf
 */
class new_campaign extends C_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('new_campaign/js/campaign'),
        'CSS' => array('new_campaign/css/css'));

    //------Draw Index Campaign Noitification-------------------
    function draw_index_notification() {
        $this->template->attach($this->resours);
        $this->template->draw('new_campaign/draw_index_campaign', TRUE);
    }

    //-----Draw View Campaign Notification Form------------
    function draw_view_notification() {
        $this->template->draw('new_campaign/draw_view_campaign', FALSE);
    }

    //-----Get campaign detail For Sales officer--------------------
    function get_campaign_detail_by_type_wise() {
        $type_id = $this->input->get('type_id');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $this->load->model('new_campaign/new_campaign_model');
        $campaings = $this->new_campaign_model->get_campaign_detail($type_id, $from_date, $to_date);
        echo json_encode($campaings);
    }

    //----get_campaing_total_detail---------------
    function get_campaing_total_detail() {
        $campaign_id = $this->input->get('campaign_id');
        $this->load->model('new_campaign/new_campaign_model');
        $campaign_detail = $this->new_campaign_model->get_campaing_total_detail($campaign_id);
        $target_dealers = $this->new_campaign_model->get_target_dealer($campaign_id);
        $estimate_description = $this->new_campaign_model->get_estimatedetail($campaign_id);
        $campaign_status = $this->new_campaign_model->get_campaign_status($campaign_id);
        // $draw_page=$this->draw_view_notification();
        $all = array($campaign_detail, $target_dealers, $estimate_description, $campaign_status);
        echo json_encode($all);
    }

    function file_upload() {
        print_r($_REQUEST);
        if (!is_dir('finished_campaign_data/')) {
            mkdir('./finished_campaign_data/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './finished_campaign_data/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            echo '0';
        } else {
            echo '1';
        }
        $name = $this->upload->file_name;
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->aso_finished_campaign($name);

        redirect('new_campaign/draw_index_notification');
    }

    function create_as_new_campaign() {
        // $this->template->attach($this->resours);
        $campaign_id = $this->input->get('campaign_id');
        $this->load->model('new_campaign/new_campaign_model');
        $campaing_detail = $this->new_campaign_model->get_all_detail_from_hold_campaign($campaign_id);
        $campaign_types = $this->new_campaign_model->get_all_campaign_types();
        $targeted_dealers = $this->new_campaign_model->get_all_target_dealers($campaign_id);
        $campaign_estimate = $this->new_campaign_model->get_all_campaign_estimate($campaign_id);
        $total_array = array($campaign_id, $campaing_detail, $campaign_types, $targeted_dealers, $campaign_estimate);
        $this->template->draw('new_campaign/draw_as_new_campaign', FALSE, $total_array);
    }

    //-----------------------Auto Complete Function--------------------
    function get_branch_code() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_campaign/new_campaign_model');
        $column = array('branch_code', 'branch_name', 'branch_id');
        $result = $this->new_campaign_model->get_branch_code($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function get_branch_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_campaign/new_campaign_model');
        $column = array('branch_name', 'branch_code', 'branch_id');
        $result = $this->new_campaign_model->get_branch_name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function get_sales_officer() {
        
    }

    function finished_campaign_comments() {
        $type = $this->input->get('type');
        $id_campaign = $this->input->get('id_campaign');
        $comment = $this->input->get('comment');
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->set_campaign_comment($type, $comment, $id_campaign);
    }

    function get_after_campaign_detail() {
        $id_campaign = $this->input->get('id');
        $this->load->model('new_campaign/new_campaign_model');
        $detail = $this->new_campaign_model->get_after_campaign_detail($id_campaign);
        echo json_encode($detail);
    }

    //is commented finished campaign------------------
    function get_is_commented_finished_campaign() {
        $campaign_id = $this->input->get('campaign_id');
        $user_type = $this->input->get('user_type');
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->get_is_commented_finished_campaign($campaign_id, $user_type);
    }

    function get_new_dealer() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_campaign/new_campaign_model');
        $column = array('delar_name', 'delar_account_no', 'amountt', 'DEALER');
        $result = $this->new_campaign_model->get_new_dealer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function get_new_dealer_account_nu() {
        $q = strtolower($_GET['term']);
        $this->load->model('new_campaign/new_campaign_model');
        $column = array('delar_account_no', 'delar_name', 'amountt', 'DEALER');
        $result = $this->new_campaign_model->get_new_dealer_account_nu($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function x() {
        print_r($_REQUEST);
    }

    function insert_as_new_campaign() {
        //=================File uploading Start=============================
        $file_name = '';
        if (!is_dir('campaign_images/')) {
            mkdir('./campaign_images/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './campaign_images/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            //echo '0';
        } else {
            $file_name = $this->upload->file_name;
            //echo '1';
        }
        //=================File uploading End=============================
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->insert_as_new_campaign($_REQUEST, $file_name);
        redirect('new_campaign/draw_index_notification');
    }

    //------------------Approve Proscess---------
    function approve_prosscess() {
        $user = $this->input->get('user');
        $type = $this->input->get('type');
        $forign_key = $this->input->get('forign_key');
        $forign_key_2 = $this->input->get('forign_key_2');
        $hold_date = $this->input->get('hold_date');
        $approve_comment = $this->input->get('approve_comment');
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->approve_prosscess($user, $type, $forign_key, $approve_comment, $hold_date, $forign_key_2);
    }

    //------------------Get detail for Chart-------------------
    function get_campaign_detail_for_chart() {
        $campaign_id = $this->input->get('campaign_id');
        $this->load->model('new_campaign/new_campaign_model');
        $detal = $this->new_campaign_model->get_campaign_detail_for_chart($campaign_id);
        $myarray = array();
        array_push($myarray, array('month', 'actual', 'target', 'average'));
        //--------------Actual----------------------------
        $atpromotion = 0;
        $first_month_ach = 0;
        $secod_month_ach = 0;
        $thired_month_ach = 0;
        //-------------Target-----------------------------
        $target_1month = 0;
        $target_2month = 0;
        $target_last = 0;
        //-------------Average---------------------------
        $first_month_avg = 0;
        $secod_month_avg = 0;
        $thired_month_avg = 0;
        foreach ($detal AS $val) {
            //-----------------Actual-------------------------
            $atpromotion+= (double) $val->atpromotion;
            $first_month_ach+= (double) $val->actual_amount_1;
            $first_month_avg+= (((double) $val->actual_amount_1) + ((double) $val->atpromotion )) / 2;
            $secod_month_ach+= (double) $val->actual_amount_2;
            $secod_month_avg+= (((double) $val->actual_amount_2) + ((double) $val->actual_amount_1) + ((double) $val->atpromotion )) / 3;
            $thired_month_ach+= (double) $val->actual_amount_3;
            $thired_month_avg+= (((double) $val->actual_amount_3) + ((double) $val->actual_amount_2) + ((double) $val->actual_amount_1) + ((double) $val->atpromotion )) / 4;
            //----------------------Target--------------------
            $target_1month = ((double) $val->target) / 3;
            $target_2month = (((double) $val->target) / 3) * 2;
            $target_last = (double) $val->target;
            //------------------------Average-----------------
        }
        array_push($myarray, array("At the time \n of the promotion", $atpromotion, $atpromotion, $atpromotion));
        array_push($myarray, array("01st month", $first_month_ach, $target_1month, $first_month_avg));
        array_push($myarray, array("02nd month", $secod_month_ach, $target_2month, $secod_month_avg));
        array_push($myarray, array("03rd month", $thired_month_ach, $target_last, $thired_month_avg));
        echo json_encode($myarray);
    }

    function drawIndexnewcampaign() {
        $this->template->attach($this->resours);
        $this->template->draw('new_campaign/create_campaign/draw_index_create', TRUE);
    }

    function draw_view_campaign() {
        $this->load->model('new_campaign/new_campaign_model');
        $campaign_types = $this->new_campaign_model->get_all_campaign_types();
        $this->template->draw('new_campaign/create_campaign/draw_view_new_campaign', false, $campaign_types);
    }

    function create_campaign_submit_form() {
        //=================File uploading Start=============================
        $file_name = '';
        if (!is_dir('campaign_images/')) {
            mkdir('./campaign_images/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './campaign_images/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {

            //echo '0';
        } else {
            $file_name = $this->upload->file_name;
            //echo '1';
        }
        //=================File uploading End=============================
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->insert_create_campaign($_REQUEST, $file_name);
        redirect('new_campaign/drawIndexnewcampaign');
        // print_r($_REQUEST);
    }

    //------------------Cancel Campaign----------------------------
    function cancel_campaign() {
        $campaign_id_cancel = $this->input->get('campaign_id');
        $reason = $this->input->get('reason');
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->cancel_campaign($campaign_id_cancel, $reason);
    }

    //--------------------Set Pririty-------------------------------
    function set_priority() {
        $this->load->model('new_campaign/new_campaign_model');
        $pending_campaigns = $this->new_campaign_model->get_campaign_for_set_pririty();
        $this->template->draw('new_campaign/priority_campaign/priority_campaign', FALSE, $pending_campaigns);
    }

    function setpiarotyCampaign() {
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->setPriority();
    }

    function print_campaign() {

        $campaign_id = $this->input->get('id');
        $this->load->model('new_campaign/new_campaign_model');
        $campaign_detail = $this->new_campaign_model->get_campaing_total_detail($campaign_id);
        $target_dealers = $this->new_campaign_model->get_target_dealer($campaign_id);
        $estimate_description = $this->new_campaign_model->get_estimatedetail($campaign_id);
        $campaign_status = $this->new_campaign_model->get_campaign_status($campaign_id);
        $get_ASO_detail = $this->new_campaign_model->get_ASO_detail($campaign_id);
        // $draw_page=$this->draw_view_notification();
        $all = array($campaign_detail, $target_dealers, $estimate_description, $campaign_status, $get_ASO_detail);

        $this->template->draw('new_campaign/print_campaign/print_campaign', FALSE, $all);
    }

    function drawIndexcampaigncalender() {
        $this->template->attach($this->resours);
        $this->template->draw('new_campaign/calender_ca/indexcal', TRUE);
    }

    function view_campaign_calender() {
        $this->load->model('new_campaign/new_campaign_model');
        $branch_detail = $this->new_campaign_model->get_branches();
        $this->template->draw('new_campaign/calender_ca/my_events', false, $branch_detail);
    }

    function get_detail_for_marketing_calender() {
        $type_id = $this->input->get('type_id');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $this->load->model('new_campaign/new_campaign_model');
        $campaings = $this->new_campaign_model->get_campaign_detail($type_id, $from_date, $to_date);
        $detail_array = array();
        //print_r($campaings);
        foreach ($campaings AS $val) {
            $subarray = array('title' => $val->campaign_type, 'start' => $val->campaign_date, 'camp_no' => $val->id_campaing, 'aso' => $val->aso_name, 'branch' => $val->BranchName);
            array_push($detail_array, $subarray);
        }
        echo json_encode($detail_array);
    }

    function get_3month_comments() {
        $this->template->attach($this->resours);
        $this->load->model('new_campaign/new_campaign_model');
        $cam_id = $this->input->get('id');

        $mont_3_comment['after_campaign_detail'] = $this->new_campaign_model->get_after_campaign_detail($cam_id);
        $mont_3_comment['month_detail'] = $this->new_campaign_model->get_3_month_($cam_id);
        $mont_3_comment['campaign_id'] = $cam_id;
        $this->template->draw('new_campaign/month_3_completed/index_3_month_comment', false, $mont_3_comment);
    }

    function set_3_month_comment() {
        $campaign_id = $this->input->get('id');
        $comment = $this->input->get('comment');
        $this->load->model('new_campaign/new_campaign_model');
        $this->new_campaign_model->set_3_month_comment($campaign_id, $comment);
    }

}
