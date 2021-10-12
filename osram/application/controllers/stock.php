<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock
 *
 * @author kanishka
 */
class stock extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('stock/js/stock'),
        'CSS' => array());

    public function drawIndexStock() {
        $this->template->attach($this->resours);
        $this->template->draw('stock/indexStock', true);
    }

    public function drawStockDetails() {
         $id_physical_place = '';
        if($this->session->userdata('user_type') == "Admin"){
            
        }  else {
            $id_physical_place = $this->session->userdata('id_physical_place');
            
        }
        if (isset($_REQUEST['employee_id'])) {
            $this->load->model('stock/stock_model');
            $extradata['stockdis'] = $this->stock_model->viewStockDetails($_REQUEST , $id_physical_place);
            $extradata['allstock'] = $this->stock_model->viewAllStockDetails();
            $this->template->draw('stock/viewStockDetail', false, $extradata);
        } else {
            $this->template->draw('stock/viewStockDetail', false);
        }
    }

    public function hello() {
        $this->load->library('export');
        $this->load->model('stock/stock_model');
       $viewStockDetails = $this->stock_model->viewStockDetails($_REQUEST);
     //  print_r($viewStockDetails);
        $this->export->to_excel($viewStockDetails, 'nameForFile');
    }

    /* public function getstoreNames() {
      $q = strtolower($_GET['term']);
      $this->load->model('stock/stock_model');
      $column = array('store_name', 'id_store');
      $result = $this->stock_model->getstoreNames($q, $column);
      echo json_encode($result);

      } */

    public function serachStockDetail() {
        $this->load->model('stock/stock_model');
    }

    public function getStoreNamesByEmployee() {
        $employee_id_token = $_GET['employee_id_token'];
        $this->load->model('stock/stock_model');
        $storeNames = $this->stock_model->getstoreNames($employee_id_token);
        echo json_encode($storeNames);
    }

    public function getEmployeNamesbyStores() {
        $q = strtolower($_GET['term']);
        $this->load->model('stock/stock_model');
        $column = array('user_name', 'id_physical_place');
        $result = $this->stock_model->getEmployeNamesbyStores($q, $column);
        echo json_encode($result);
    }
    
    public function saveQty(){
         $this->load->model('stock/stock_model');
         $this->stock_model->saveQty($_REQUEST);
         
    }
    
    public function getItemNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('stock/stock_model');
        $column = array('item_name', 'id_item');
       
        $result = $this->stock_model->getItemNames($q, $column , $pysical_place);
        echo json_encode($result);
    }
    
    public function getItemCode() {
        $q = strtolower($_GET['term']);
        $this->load->model('stock/stock_model');
        $column = array('item_account_code', 'id_item');
        $result = $this->stock_model->getItemCode($q, $column);
        echo json_encode($result);
    }

}

?>
