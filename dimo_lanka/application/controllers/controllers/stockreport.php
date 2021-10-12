<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stockreport
 *
 * @author shamil
 */
class stockreport extends C_Controller {

    private $resours = array(
        'JS' => array('stock_report/js/stockreport'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexstockreport() {


        $this->template->attach($this->resours);
        $this->template->draw('stock_report/indexstockreport', true);
    }

    public function drawViewreport() {

        $this->form_validation->set_rules('partnumber', 'Item Part Number ', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE) {



            $this->template->draw('stock_report/viewreport', false);
            // redirect('stock_report/drawIndexstockreport');
        } else {

            $this->template->draw('stock_report/viewreport', false);
        }
    }

    public function getAllPartNumbers() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->item_model->getAllPartNumbers($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAllPartDescriptions() {
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('description', 'item_id', 'item_part_no', 'selling_price');
        $result = $this->item_model->getAllPartDescription($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function searchitem() {
        $item_id = $_REQUEST['itemid'];
        $this->load->model('stock_report/stockreport_model');
        $view = $this->stockreport_model->viewAll($item_id);



        $itemArray = array();

        foreach ($view as $value) {
            array_push($itemArray, array("partno" => $value->item_part_no, "description" => $value->description, "total_stock_qty" => $value->total_stock_qty, "selling_price" => $value->selling_price, "vat" => $value->vat));
        }

        echo json_encode($itemArray);
    }

}
