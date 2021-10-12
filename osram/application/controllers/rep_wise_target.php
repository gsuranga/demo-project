<?php

/**
 * Description of rep_wise_target
 *
 * @author Kanchu
 */
class rep_wise_target extends C_Controller {
    
    private $resours = array(
        'JS' => array('rep_wise_target/js/rep_target'),
        'CSS' => array());
    
    function __construct() {
        parent::__construct();
    } 
    
    
    function drawindexRepwiseTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('rep_wise_target/indexRepTarget', true);
    
    }
     public function drawAddrepTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('rep_wise_target/addRepTarget', false);
    }
     
    public function drawViewRepTarget() {
//       $this->load->model('rep_wise_target/rep_wise_target_model');
        $viewtarget=  $this->rep_wise_target_model->getViewTarget();
        $this->template->draw('rep_wise_target/ViewRepTarget', false,$viewtarget);
    }
    
    public function getDistributor() {
        $q = strtolower($_GET['term']);
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $column = array('full_name', 'id_employee_has_place', 'id_employee','id_physical_place');
        $result = $this->rep_wise_target_model->getDistributor($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    
    public function getRepNames() {
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $repNames = $this->rep_wise_target_model->getRepNames();
//        print_r($repNames); 
        
        $this->template->draw('rep_wise_target/salesRepName', false, $repNames);
    }
    
    public function insert_rep_target(){
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $insertRepTarget = $this->rep_wise_target_model->insert_rep_target($this->input->post());
          if ($insertRepTarget) {
                $this->session->set_flashdata('addRepTarget', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Sales Rep Monthly Target</spam>');
            } else {
                $this->session->set_flashdata('addRepTarget', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Sales Rep Monthly Target add Error</spam>');
            }
        redirect('rep_wise_target/drawindexRepwiseTarget');
    }
	
public function deletetarget(){
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $id = $this->input->get('id_token');
        $deletetarget = $this->rep_wise_target_model->deletetarget($id);
         if ($deletetarget) {
                $this->session->set_flashdata('delete_target', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Target</spam>');
            } else {
                $this->session->set_flashdata('delete_target', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Target Error</spam>');
            }
        redirect("rep_wise_target/drawindexRepwiseTarget");
    }

	    public function drawUpdateTarget(){
         $this->template->draw('rep_wise_target/manageTarget', false);
    }
    public function update_rep_target(){
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $update = $this->rep_wise_target_model->updatetarget($this->input->post());
         if ($update) {
                $this->session->set_flashdata('delete_target', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Target</spam>');
            } else {
                $this->session->set_flashdata('delete_target', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Target Error</spam>');
            }
        redirect("rep_wise_target/drawindexRepwiseTarget");
    }
	
    public function index_view_allt_target(){
        $this->template->attach($this->resours);
        $this->template->draw('rep_wise_target/indexview_allTarget', true);
    }
    public function drawAllrepTarget(){
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $target = $this->rep_wise_target_model->get_alltarget();
        $this->template->draw('rep_wise_target/allTatget', false, $target);
    }
    public function getDisName(){
        $q = strtolower($_GET['term']);
        $this->load->model('rep_wise_target/rep_wise_target_model');
        $column = array('full_name', 'id_employee','id_physical_place');
        $result = $this->rep_wise_target_model->getDisName($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
	
}
