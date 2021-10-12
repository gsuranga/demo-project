<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of van_stock
 *
 * @author Shamil Ilyas
 */
class van_stock extends C_Controller {

    private $resours = array(
        'JS' => array('van_stock/js/vanStock'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexVanStock() {
        $this->template->attach($this->resours);
        $this->template->draw('van_stock/indexVanStock', TRUE);
    }

    public function drawIndexViewVanStock() {
        $this->template->attach($this->resours);
        $this->template->draw('van_stock/indexViewVanStock', TRUE);
    }

    public function drawInsertVanStock() {
        $this->template->draw('van_stock/insert_van_stock', FALSE);
    }

    public function drawViewVanStock() {
        $this->load->model('van_stock/vanstock_model');
        $fetchAllVanStock = $this->vanstock_model->getAllStore();
        $this->template->draw('van_stock/viewallVanStock', FALSE, $fetchAllVanStock);
    }
    
    //asign van
    public function drawIndexAsignVAN() {
       // $id_Van_StockToken = $this->input->get('idvan_store');
        $this->template->attach($this->resours);
        $this->template->draw('van_stock/indexAsign_Van', TRUE, $id_Van_StockToken);
    }
    
    public function drawViewAsign() {

        $this->load->model('van_stock/vanstock_model');
        //$fetchAllVanStock = $this->vanstock_model->getAllVanStock($_REQUEST);

        $this->template->draw('van_stock/Asign_Van', FALSE, $fetchAllVanStock);
    }
    
    

    public function drawIndexViewVanSUBStock() {
        $id_Van_StockToken = $this->input->get('idvan_store');
        $this->template->attach($this->resours);
        $this->template->draw('van_stock/indexView_Sub_VanStock', TRUE, $id_Van_StockToken);
    }

    public function drawViewVanSUBStock() {

        $this->load->model('van_stock/vanstock_model');
        $fetchAllVanStock = $this->vanstock_model->getAllVanStock($_REQUEST);

        $this->template->draw('van_stock/view_Sub_VanStock', FALSE, $fetchAllVanStock);
    }

    

    public function drawUpdateVanStock() {
        $this->load->model('van_stock/vanstock_model');
        $fetchAllVanStock = $this->vanstock_model->getAllVanStock();
        $this->template->draw('van_stock/editVanStock', FALSE, $fetchAllVanStock);
    }

    public function insetvanstok() {
        //print_r($_POST);
        
        if (true) {
            $this->load->model('van_stock/vanstock_model');


            $insertUserType = $this->vanstock_model->insertvanstock($this->input->post());


            if ($insertUserType) {
                $this->session->set_flashdata('insert_item', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Van Stock</spam>');
            } else {
                $this->session->set_flashdata('insert_item', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Van Stock Error</spam>');
            }
          redirect('van_stock/drawIndexVanStock');
        } else {
         $this->drawIndexVanStock();
        }
    }
    
    public function insetvan() {

        if (true) {
            $this->load->model('van_stock/vanstock_model');


            $insertUserType1 = $this->vanstock_model->insertvan($this->input->post());


            if ($insertUserType1) {
                $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully assigned a Van  </spam>');
            } else {
                $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Van  Error</spam>');
            }
            redirect('van_stock/drawIndexAsignVAN');
        } else {
            $this->drawIndexAsignVAN();
        }
    }

    public function getProducts() {
        $q = strtolower($_GET['term']);
        $this->load->model('van_stock/vanstock_model');
        $column = array('item_name', 'id_products', 'product_price');
        $result = $this->vanstock_model->getProducts($q, $column);

        echo json_encode($result);
    }

    public function getstockQty() {
        $q = $_GET['product_id_token'];
        $column = array('id_products' => $q);
        $this->load->model('van_stock/vanstock_model');
        $qty = $this->vanstock_model->getQty($column);
        echo json_encode($qty);
    }

    public function getVehicleNO() {
        $q = strtolower($_GET['term']);
        $this->load->model('van_stock/vanstock_model');
        $column = array('van_number', 'id_van');
        $result = $this->vanstock_model->getVehicleNO($q, $column);
        echo json_encode($result);
    }
     public function getVehicleNO1() {
        $q = strtolower($_GET['term']);
        $this->load->model('van_stock/vanstock_model');
        $column = array('van_number', 'id_van');
        $result = $this->vanstock_model->getVehicleNO1($q, $column);
        echo json_encode($result);
    }
   

    public function getEmployeeNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('van_stock/vanstock_model');
        $column = array('employee_first_name', 'id_employee_has_place','id_employee_registration');
        $result = $this->vanstock_model->getEmployeNames($q, $column);
        echo json_encode($result);
    }
    
     public function getEmployeeNames1() {
        $q = strtolower($_GET['term']);
        $this->load->model('van_stock/vanstock_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->vanstock_model->getEmployeNames1($q, $column);
        echo json_encode($result);
    }

    public function updateItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "added_date" => $item_detail[0],
            "id_van_store" => $item_detail[1],
            "Id_product" => $item_detail[2],
            "van_stock_qty" => $item_detail[3],
            "status" => $item_detail[4],
        );



        $this->load->model('van_stock/vanstock_model');
        $this->vanstock_model->updateItem($item_detail_decode);
    }

    public function deleteItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "Id_product" => $item_detail[0],
            "id_van_Store" => $item_detail[1]
        );


        $this->load->model('van_stock/vanstock_model');
        $this->vanstock_model->deleteItem($item_detail_decode);
    }
    
    public function deleteItem1() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "id_van_Store" => $item_detail[0]
        );


        $this->load->model('van_stock/vanstock_model');
        $this->vanstock_model->deleteItem1($item_detail_decode);
    }


}

?>
