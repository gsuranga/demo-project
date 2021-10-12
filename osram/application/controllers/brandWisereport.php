<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brandWisereport
 *
 * @author Thilina
 */
class brandWisereport extends C_Controller{
       private $resours = array(
        'JS' => array('brandWisereport/js/brandWisereport'),
        'CSS' => array());
    
    public function __construct() {
        parent::__construct();
    }
    public function BrandWiseSalesOrderReportIndex(){
        $this->template->attach($this->resours);
        $this->template->draw('brandWisereport/indexBrandWiseSalesOrderReport', true);
    }
    public function drawBrandWiseSalesOrderReport(){
	if(isset($_POST['btn_submit'])){
        $this->load->model('brandwisereport/brandwisereport_model');
        $extraData['sales_tot'] = $this->brandwisereport_model->getSalesItemWises();
        $extraData['sales_return'] = $this->brandwisereport_model->getsalesReturnItemWises();
        $extraData['sales_market'] = $this->brandwisereport_model->getSalesMarketItemWises();
		}
        $this->template->draw('brandWisereport/BrandWiseSalesOrderReport', false, $extraData);
    }
        public function getProdcutDetails($product_id) {
        $this->load->model('brandwisereport/brandwisereport_model');
        $prodcutDetail = $this->brandwisereport_model->getProdcutDetails($product_id);
        return $prodcutDetail;
    }
      public function getSlaesQty($product_id,$id_physical) {
        $this->load->model('brandwisereport/brandwisereport_model');
        $prodcutDetail = $this->brandwisereport_model->getSlaesQtys($product_id, $id_physical);
        return $prodcutDetail;
    
}
    public function getReturnQty($product_id, $return_type) {
        $this->load->model('brandwisereport/brandwisereport_model');
        $slaesQty = $this->brandwisereport_model->getReturnQtys($product_id, $return_type);
        return $slaesQty;
    }
        public function search_by_item_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('brandwisereport/brandwisereport_model');
        $column = array('item_name', 'id_item');
        $result = $this->brandwisereport_model->getItemNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
        public function getEmployeNamesbyStores() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->getEmployeNamesbyStores($q, $column);
        $no_result = array('label' => 'no result founds...');
        if ($result != NULL) {
            echo json_encode($result);
        }else{
        echo json_encode($no_result);
        }
    }
    public function getBrandName(){
        $q = strtolower($_GET['term']);
        $this->load->model('brandwisereport/brandwisereport_model');
        $column = array('brand_name','item_brand_id');
        $result = $this->brandwisereport_model->getBrandName($q, $column);
        echo json_encode($result);
    }
}