<?php

/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

class campaign extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('campaign/js/campaign'),
        'CSS' => array(''));

    function drawIndexcampaignType() {
        $this->template->attach($this->resours);

        $this->template->draw('campaign/drawindexcampaignType', true);
    }

    function drawCreateCampaignType() {
        $this->load->model('campaign/campaign_model');

        $this->template->draw('campaign/drawindexRegisterCampaignType', false);
    }

    function drawViewAllCampaignType() {
        $this->load->model('campaign/campaign_model');
        $alltype = $this->campaign_model->getAllCampaignType();
        //print_r($alltype);
        $this->template->draw('campaign/drawindexviewcampaign', false, $alltype);
    }

    function addnewcampaigntype() {
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->insertcampaigntypetodatabase($_REQUEST);
        redirect('campaign/drawIndexcampaignType');
    }

    function deleteCampaignType() {

        $this->load->model('campaign/campaign_model');
        $id = $this->input->get('id_campaing_type');
        $result = $this->campaign_model->deletecampaign($id);
        redirect('campaign/drawIndexcampaignType');
    }

    function drawIndexcampaign() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawindexcampaign', true);
    }

    function drawViewCreateForm() {
        $this->load->model('campaign/campaign_model');
        $alltype = $this->campaign_model->getAllCampaignType();
        $this->template->draw('campaign/createcampaignform', false, $alltype);
    }

    function successForm() {
        $this->template->draw('campaign/successpage', true);
    }

    function errorForm() {
        $this->template->draw('campaign/errorpage', true);
    }

    function getDealer() {
        $q = strtolower($_GET['term']);
        $this->load->model('campaign/campaign_model');
        $column = array('delar_account_no', 'delar_id', 'delar_name');
        $result = $this->campaign_model->getDealer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function getDealer_name() {

        $q = strtolower($_GET['term']);
        $this->load->model('campaign/campaign_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->campaign_model->getDealer_name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    //////--------------Sales Officer Create(Insert) Campaign-------------
    function insertcampaign() {
        //print_r($_REQUEST);

        if (!is_dir('campaignData/')) {
            mkdir('./campaignData/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './campaignData/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {

            // echo '0';
        } else {
            //echo '1';
        }
        $name = $this->upload->file_name;
        $campaigntype = "";

        if (isset($_REQUEST['new_type'])) {
            $campaigntype = $_REQUEST['new_type'];
        } else {
            $campaigntype = $_REQUEST['select_box'];
        }

        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->insertcampaigntodatabase($_REQUEST, $name, $campaigntype);
        if ($result) {
            redirect('campaign/successForm');
            echo '';
        } else {
            echo '';
            redirect('campaign/errorForm');
            ;
        }
    }

    ////////////////////////////////////APM Accept Campaign//////////////////////////////////////////////////////
    function drawIndexApmAcceptCampaign() {
        $this->template->draw('campaign/drawIndexApmAcceptCampaign', TRUE);
    }

    function drawViewCampaign() {
        $this->template->draw('campaign/drawViewCampaign');
    }

    function drawApprove() {
        $this->template->draw('campaign/drawApproveCampaign');
    }

    function drawIndexNotification() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawIndexNotification', TRUE);
    }

    function drawViewNotificationCampaign() {
        $this->load->model('campaign/campaign_model');
        $extraData['res'] = $this->campaign_model->getNotification();
        $extraData['priority'] = $this->getPriorityCampaign();
        $this->template->draw('campaign/viewNotification', false, $extraData);
    }

    //----------------------viewPendingCompaaign----------------------------
    function viewpendingcompaign() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/viewpendingcampaigns', true);
    }

    function viewpendingcampaigndetailforajex() {
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->getAllPendingCampaign();
        echo json_encode($result);
    }

    function viewpendingcampaigndetail() {
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->getAllPendingCampaign();

        $this->template->draw('campaign/viewpendingcampaigndetail', false, $result);
    }

    //------------------------Get data for APM-----------------------------------------
    public function getcampaigndetail() {
        $id = $this->input->get('campaignid');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->getcampaigndetailforapm($id);
        echo json_encode($res);
    }

    ///----------------------Draw Ho accept-------------------------------------------------
    public function drawhoaccept() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawindexhoaccept', TRUE);
    }

    public function viewhopendingcampaign() {
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->getAllPendingCampaignforHo();
        $this->template->draw('campaign/drawviwallhopendingaccept', FALSE, $result);
    }

    //------------APM ACCEPT---------------------------------------------------------------------
    public function campaignaccept() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->apmAcceptingCampaign($sal_id, $remark);
    }

    public function hocampaignaccept() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->hoAcceptingCampaign($sal_id, $remark);
    }

    public function campaignhold() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $duedate = $this->input->get('duedate');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->apmholdcampaign($sal_id, $remark, $duedate);
    }

    public function hocampaignhold() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $duedate = $this->input->get('duedate');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->hoholdcampaign($sal_id, $remark, $duedate);
    }

    public function campaignreject() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $duedate = $this->input->get('duedate');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->apmrejectcampaign($sal_id, $remark, $duedate);
    }

    public function hocampaignreject() {
        $sal_id = $this->input->get('salescampaignid');
        $remark = $this->input->get('remark');
        $duedate = $this->input->get('duedate');
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->horejectcampaign($sal_id, $remark, $duedate);
    }

    public function upload_file() {
        $status = "";
        $msg = "";
        $file_element_name = 'userfile';

        if (empty($_POST['title'])) {
            $status = "error";
            $msg = "Please enter a title";
        }

        if ($status != "error") {
            $config['upload_path'] = './campaignData/';
            $config['allowed_types'] = 'gif|jpg|png|doc|txt';
            $config['max_size'] = 1024 * 8;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            } else {
                $data = $this->upload->data();
                $file_id = $this->files_model->insert_file($data['file_name'], $_POST['title']);
                if ($file_id) {
                    $status = "success";
                    $msg = "File successfully uploaded";
                } else {
                    unlink($data['full_path']);
                    $status = "error";
                    $msg = "Something went wrong when saving the file, please try again.";
                }
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

//public function drawIndesorder(){
//    $this->template->draw('campaign/vieworder', TRUE);
//}
///////////////////---set Priority-------------------------------
    public function getPriorityCampaign() {
        $this->load->model('campaign/campaign_model');
        $detail = $this->campaign_model->getPriority();
        return $detail;
    }

    public function setpiarotyCampaign() {
        $this->load->model('campaign/campaign_model');
        $detail = $this->campaign_model->setPriority($_REQUEST);
    }

    public function clearcampaign() {
//        $this->
//        $this->load->model('campaign/campaign_model');
//        $detail = $this->campaign_model->setPriority($_REQUEST);
    }

    public function drawIndexApmFinished() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawIndexApmFinished', TRUE);
    }

    public function drawIndexHOFinished() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawIndexHOFinished', TRUE);
    }

    public function drawViewFinishedApmNotificationCampaign() {
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->apmgetaftercampaigndetail();

        $this->template->draw('campaign/drawViewFinishedApmNotificationCampaign', FALSE, $res);
    }

    public function drawViewFinishedHONotificationCampaign() {
        $this->load->model('campaign/campaign_model');
        $res = $this->campaign_model->hogetaftercampaigndetail();

        $this->template->draw('campaign/drawViewFinishedHONotificationCampaign', FALSE, $res);
    }

    public function afterfinishnotification() {
        $this->template->draw('campaign/afterfinishnotification', TRUE);
    }

    public function submitaftercampaign() {

        $finsedCam = $this->submitaftercampaignforbefordetail();
        $this->template->draw('campaign/submitaftercampaign', FALSE, $finsedCam);
    }

    public function submitaftercampaignforbefordetail() {
        $id = $this->input->get('campaignid');
        $this->load->model('campaign/campaign_model');
        return $res = $this->campaign_model->getcampaigndetailforapm($id);
        // echo json_encode($res);
    }

    public function insertaftercampaign() {
        if (!is_dir('campaignData/')) {
            mkdir('./campaignData/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './campaignData/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '4096';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $config['overwrite'] = FALSE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
//
            //   echo '0';
        } else {
            //     echo '1';
        }

        $name = $this->upload->file_name;


        $campaignid = $_REQUEST['campaignid'];
        $accualcost = $_REQUEST['acctualcost'];
        $comment = $_REQUEST['comment'];
        $areaimprove = $_REQUEST['areastoimprove'];
        $detail = array($campaignid, $accualcost, $comment, $areaimprove, $name);

        $this->load->model('campaign/campaign_model');
        $this->campaign_model->insertaftercampaign($detail);

        $this->template->draw('campaign/closeaftercampaign', false);
    }

    public function drawindexasnewcampaign() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawindexasnewcampaign', TRUE);
    }

    public function asnewcampaign() {
        $apm = $this->input->get('APM');
        $ho = $this->input->get('HO');
        $year = $this->input->get('year');
        $month = $this->input->get('month');
        $extraData['olddetail'] = array($apm, $ho, $year, $month);
        $extraData['finsedCam'] = $this->submitaftercampaignforbefordetail();
        $extraData['dealerto'] = array();
        //print_r($extraData['finsedCam']);

        foreach ($extraData['finsedCam'] As $val) {
            $dtoto = $this->getTOforAsnew($val->delar_id);
            $jsonencode = json_encode($dtoto);
            $jsonIterator = new RecursiveIteratorIterator(
                    new RecursiveArrayIterator(json_decode($jsonencode, TRUE)), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($jsonIterator as $key => $val) {
                if (is_array($val)) {
                    //echo "$key:\n";
                } else {
                    array_push($extraData['dealerto'], $val);
                    // echo "$val\n";
                }
            }
            // echo $dtoto;
        }
        // print_r($extraData['dealerto']);
        $this->template->draw('campaign/asnewcampaign', FALSE, $extraData);
    }

    public function insertAsnew() {
        //print_r($_REQUEST);
        $filename;

        if (isset($_REQUEST['linkfile'])) {
            $filename = $_REQUEST['linkfile'];
        } else {
            if (!is_dir('campaignData/')) {
                mkdir('./campaignData/', 0777, TRUE);
            }
            $this->load->helper('file');
            $config['upload_path'] = './campaignData/';
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
            $filename = $name;
        }
//         if (!is_dir('campaignData/')) {
//            mkdir('./campaignData/', 0777, TRUE);
//        }
//        $this->load->helper('file');
//        $config['upload_path'] = './campaignData/';
//        $config['allowed_types'] = '*';
//        $config['max_size'] = '4096';
//        $config['max_width'] = '2048';
//        $config['max_height'] = '1536';
//        $config['overwrite'] = FALSE;
//
//        $this->load->library('upload', $config);
//
//        if (!$this->upload->do_upload()) {
//
//             echo '0';
//        } else {
//            echo '1';
//        }
        //  $name = $this->upload->file_name;
        $this->load->model('campaign/campaign_model');
        $this->campaign_model->insertAsnew($filename);
        redirect('campaign/successForm');
    }

    function checkholdcampaign() {
        $campaignid = $this->input->get('campaignid');
        $this->load->model('campaign/campaign_model');
        $holddetail = $this->campaign_model->getholddetails($campaignid);
        echo json_encode($holddetail);
    }

    function checkholdcampaigndealer() {
        $campaignid = $this->input->get('campaignid');
        $dealerid = $this->input->get('dealerid');

        $this->load->model('campaign/campaign_model');
        $holddealerdetail = $this->campaign_model->checkholdcampaigndealer($campaignid, $dealerid);
        echo json_encode($holddealerdetail);
        //echo $holddealerdetail;
    }

    function getTO() {
        $dealerId = $this->input->get('dealerid');
        $this->load->model('campaign/campaign_model');
        $to = $this->campaign_model->getTO($dealerId);
        echo json_encode($to);
    }

    function getTOforAsnew($dto) {
        $this->load->model('campaign/campaign_model');
        return $to = $this->campaign_model->getTOforAsnew($dto);
        // echo json_encode($to);
    }

    //-------------------Finished Campaign----------------
    /* function viewfinishedcampaigndetailforajex() {
      $this->load->model('campaign/campaign_model');
      $result = $this->campaign_model->getAllFinishedCampaign();
      echo json_encode($result);
      } */
    function viewpendingcampaigndetailforajexforfinish() {
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->getAllPendingCampaign();
        echo json_encode($result);
    }

    function apmsetfinishedcampaign() {

        $camid = $this->input->get('id');
        $apmcomment = $this->input->get('comment');
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->apmsetcompletedforfinishedcampaign($camid, $apmcomment);
        // echo json_encode($result);
    }

    function hosetfinishedcampaign() {

        $camid = $this->input->get('id');
        $apmcomment = $this->input->get('comment');
        $this->load->model('campaign/campaign_model');
        $result = $this->campaign_model->hosetcompletedforfinishedcampaign($camid, $apmcomment);
        // echo json_encode($result);
    }

    function drawIndexcostestamatecampaign() {
        $this->template->attach($this->resours);
        $this->template->draw('campaign/drawIndexcostestamatecampaign', TRUE);
    }

    function drawViewCostEstamateCampaign() {
        $this->load->model('campaign/campaign_model');
        $extraData['types'] = $this->campaign_model->getAllCampaignType();
        $this->template->draw('campaign/drawViewCostEstamateCampaign', false, $extraData);
    }

    function getsalesofficer($userdata) {
        $this->load->model('campaign/campaign_model');
        echo $this->campaign_model->getsalesOfficerN($userdata);
    }

    function getpersondetail() {
        $get_emp_id = $this->input->get('id');
        $this->load->model('campaign/campaign_model');
        $arr = $this->campaign_model->getpersondetail($get_emp_id);
        echo json_encode($arr);
    }
    function getestimatedescription(){
   
        $camp_id = $this->input->get('campaign_id');
         $this->load->model('campaign/campaign_model');
         $estimate=$this->campaign_model->getestimatedescription($camp_id);
        
         echo json_encode($estimate);
    }


}

?>
