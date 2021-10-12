<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class root extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
      private $resours = array(
        'JS' => array('root/js/root'),
        'CSS' => array(''));
    public function drawIndexRoot(){
        $this->template->attach($this->resours);
        $this->template->draw('root/index_root', true);
    }
    public function createRoot(){
        $this->template->draw('root/create_root',false);
    }
    public function viewAllRoot(){
         $this->load->model('root/root_model');
        
      
        $extraData = $this->root_model->viewAllroot();
        
        $this->template->draw('root/viewRoot',false,$extraData);
    }
    public function addRoot(){
         if ($this->input->post("root_account_no") != '' && $this->input->post("root_name") != '' && $this->input->post("areaid") != '' ) {
    
            
             $this->load->model('root/root_model');
            $insertSalesOfficer = $this->root_model->insertRoot($this->input->post());
            redirect('root/drawIndexRoot');
        } else {
            $this->session->set_flashdata('create_sales_officer', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Please Enter S/O Details</spam>');
            redirect('root/drawIndexRoot');
        }
    }
    public function auto_area() {
        $q = strtolower($_GET['term']);
        $this->load->model('root/root_model');
        $column = array('area_name', 'area_id');
        $result = $this->root_model->getArea($q, $column);
        $result_data = array('label' => 'no result...');
        if(count($result) > 0){
            echo json_encode($result);
        }  else {
            echo json_encode($result_data);
        }
    }
     public function deleteRoot() {
        $this->load->model('root/root_model');
        $id = $this->input->get('root_idd');
   

        $this->root_model->deleteRoot($id);
        redirect("root/drawIndexRoot");
    }
    
    public function drawIndexManageRoot() {
          
         $this->template->attach($this->resours);
        $id = $this->input->get();

        $this->template->draw('root/index_manage_root', true, $_REQUEST);
    }

    public function drawUpdateRoot() {
         
        $this->template->draw('root/update_root', false, $_REQUEST);
    }
    
     public function updateRoot() {
        
       
         if ($this->input->post("root_account_no") != '' && $this->input->post("root_name") != '' && $this->input->post("areaid") != ''&& $this->input->post("rootid") != ''  ) {
         
          $this->load->model('root/root_model');
           $updateSalesOfficer = $this->root_model->updateRoot($this->input->post());
          
           redirect('root/drawIndexRoot');

       
           
        } else {
            
            $this->session->set_flashdata('create_Root', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Please Enter S/O Details</spam>');
             
        }
    }
//    public function drawIndexUpdateManageRoot() {
//          
//        
//      
//        $this->template->draw('root/updatesuccess', true);
//    }

}
?>
