<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brand
 *
 * @author Thilina
 */
class brand extends C_Controller{
        private $resours = array(
        'JS' => array('brand/js/brand'),
        'CSS' => array());
    public function __construct() {
        parent::__construct();
    }
    //put your code here

    function drawIndexbrand(){
        $this->template->attach($this->resours);
       $this->template->draw('brand/indexbrand', true);
    }
    function drawInsertBranch(){
        $this->template->draw('brand/addbrand', false);
    }
    function insertbrand(){
           $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        if ($this->form_validation->run()) {
        $this->load->model('brand/brand_model');
        $insertBatch = $this->brand_model->insertbrand($this->input->post());
        if ($insertBatch) {
            $this->session->set_flashdata('insert_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Brand Name</span>');
        } else {
            $this->session->set_flashdata('insert_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Brand Name error</span>');
        }
        redirect('brand/drawIndexbrand');
    }else{
        $this->drawIndexbrand();
    }
    }
    
    public function drawviewBranch() {
        $this->load->model('brand/brand_model');
        $fetchAllbrand = $this->brand_model->getAllbrand();
        $this->template->draw('brand/viewAllbrand', false, $fetchAllbrand);
    }
    public function deleteBrand(){
//        echo 'aaaaaaaaaaaaaaaa';
        $this->load->model('brand/brand_model');
       echo $id = $this->input->get('id');
        $insertUserType = $this->brand_model->deleteBatch($id);
         if ($insertUserType) {
                $this->session->set_flashdata('delete_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted a Brand</spam>');
            } else {
                $this->session->set_flashdata('delete_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Brand Error</spam>');
            }
        redirect("brand/drawIndexbrand");
    }
    
    public function drawUpdateBrand($id){
         $this->template->draw('brand/manageBrand', false);
        
    }
    public function Updatebrand(){
        $this->load->model('brand/brand_model');
        $update = $this->brand_model->updateBrand($this->input->post());
         if ($update) {
                $this->session->set_flashdata('delete_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Brand</spam>');
            } else {
                $this->session->set_flashdata('delete_brand', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Brand Error</spam>');
            }
        redirect("brand/drawIndexbrand");
        
    }
    }
