<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test
 *
 * @author Kanchu
 */
class Test extends C_Controller{
    public function __construct() {
        parent::__construct();
    }
    function Test() {
        parent::controller();
        $this->load->library('parser');
      //  $this->load->view('parser');
          
    }
    
    function index(){
        $this->load->model('categoryModel/categoryModel_model');
        $this->load->model('productsmodel/productsmodel_model');
        
        
        
         $data['title']  = 'Building an e-commerce application ';
        //$title  = 'Building an e-commerce application ';
        $data['header'] = 'Header';
        //$header = 'This is Header';
        $data['body']   = 'Test content';
        
        
        
        $id='1'; //sample value of cat_id
        
        
        //test the category model
        $myCat=$this->categoryModel_model->getCategory($id);
        
        $data['myCat']=$myCat['cat_name'];
        $data['allCategory']=$this->categoryModel_model->getAllCategories();
        
        //test product model
        
        $myProduct=$this->productsmodel_model->getProduct($id);
        $data['myProduct']=$myProduct['prod_name'];
        $data['allProducts']=$this->productsmodel_model->getAllProducts();
        
        
        
        
       // $this->parser->parse('test_page',$data);
        $this->load->view('my_sample_works/test_page/test_page',$data);
        
    }
    //put your code here
}
