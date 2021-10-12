<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of brand_wise_new
 *
 * @author kanishka
 */
class brand_wise_new extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $instance_log;
    private $resours = array(
        'JS' => array('bran_wise_new/js/brnad_wise_new'),
        'CSS' => array());

    public function functionindex() {
        $this->template->attach($this->resours);
        $this->template->draw('bran_wise_new/index_brand_wise', true);
    }

    public function get_brands() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_brands();
    }

    public function get_items_catgory() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_items_catgory();
    }

    public function get_items_names() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $_items_names = $this->brnd_wise_new_model->get_items_names();
        echo json_encode($_items_names);
        $this->instance_log = $_items_names;
    }

    public function get_items_names_view() {
        $this->template->draw('bran_wise_new/view_details', FALSE, $_POST['json_data']);
    }

    public function get_names_by_category() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_names_by_category();
    }

    public function get_distributors_name() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_distributors_name();
    }
    
    public function get_salesrep_name() {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_salesrep_name();
    }

    public function get_warranty_qty($id_product = 0, $id_pyhscal_place = 0 , $date_1 = '', $date_2 = '' , $it_salesrep = '') {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_warranty_qty($id_product, $id_pyhscal_place, $date_1, $date_2 , $it_salesrep);
    }

    public function get_free_qty($id_product = 0, $id_pyhscal_place = 0 , $date_1 = '', $date_2 = '' , $it_salesrep = '') {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        $this->brnd_wise_new_model->get_free_qty($id_product, $id_pyhscal_place, $date_1, $date_2, $it_salesrep);
    }

    public function get_sales_qty($id_product = 0, $id_pyhscal_place = 0 , $date_1 = '', $date_2 = '' , $it_salesrep = '') {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        return $this->brnd_wise_new_model->get_sales_qty($id_product, $id_pyhscal_place , $date_1, $date_2 ,$it_salesrep);
    }

    public function get_retun_qty($id_product = 0, $id_pyhscal_place = 0 , $date_1 = '', $date_2 = '' , $it_salesrep = '') {
        $this->load->model('brnd_wise_new/brnd_wise_new_model');
        return $this->brnd_wise_new_model->get_retun_qty($id_product, $id_pyhscal_place, $date_1, $date_2 , $it_salesrep);
    }

}

?>
