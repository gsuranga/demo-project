<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of my_sales_order
 *
 * @author Kanchu
 */
class my_sales_order extends C_Controller{
    
    private $resources = array(
//        'JS' => array('salesorder/js/salesorder'),
        'JS' => array('my_sample_works/my_sales_order/js/salesorder'),
        'CSS' => array());
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
       // $this->template->attach($this->resources);
        $this->template->attach($this->resources);
        $this->template->draw('my_sample_works/my_sales_order/index',true);
        
    }
    
    public function drawAddSalesOrder() {
        $this->template->attach($this->resources);
        $this->template->draw('my_sample_works/my_sales_order/addSalesOrdermy',false);
    }
    
//    public function getItemName() {
//        
//        $this->template->attach($this->resources);
//        $term = $_REQUEST['term'];
//        $this->load->model('my_sales_order/my_sales_order_model');
//        $result = $this->my_sales_order_model->getItemName($term);
//        $json = array();
//        foreach ($result AS $val) {
//            array_push($json, array("label" => $val->item_name ));
//           // "unitprice" => $val->unitprice
//        }
//        echo json_encode($json);
//    }
    
    
    public function getItemName(){
        $q = strtolower($_GET['term']); //this is stable
        $this->load->model('autocomplete/autocomplete_model'); //this is stable
        $column = array('item_name');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_item", 'item_name', $q, $column);
        echo json_encode($result);
        
        
        
        
    }
    
    public function getItemNameValues() {
        $this->template->attach($this->resources);
        $term = $_REQUEST['term'];
        $this->load->Model('my_sales_order', 'my_sales_order_model');
        $result = $this->purchaseOrdermy->getItemNameValues($term);
        $json = array();
        foreach ($result AS $val) {
            array_push($json, array("label" => $val->description, "itemId" => $val->itemId,"unitPrice" => $val->unitPrice,"quantity" => $val->quantity,));
        }
        echo json_encode($json);
        
    }
    public function getItemNameValues() {
        $this->view->link('po_test/js/purchaseOrdernew', 'js');
        $term = $_REQUEST['term'];
        $this->loadModel('purchaseOrdermy', 'purchaseOrdermy/');
        $result = $this->purchaseOrdermy->getItemNameValues($term);
        $json = array();
        foreach ($result AS $val) {
            array_push($json, array("label" => $val->description, "itemId" => $val->itemId,"unitPrice" => $val->unitPrice,"quantity" => $val->quantity,));
        }
        echo json_encode($json);
        
    }        
    
    //put your code here
}
