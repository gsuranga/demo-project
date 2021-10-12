<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vat extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('vat/js/vat'),
        'CSS' => array());

    public function drawIndexVat() {
        $this->template->attach($this->resours);
        $this->template->draw('vat/drawIndexVat', true);
    }

    public function drawviewVat() {
        $this->load->model('vat/vat_model');
        $salesofficerdetails = $this->vat_model->getvatamount();

        $this->template->draw('vat/drawviewVat', false, $salesofficerdetails);
    }

    public function updateVat() {
        $id = $this->input->get('id');
        $amount = $this->input->get('amount');
        $this->load->model('vat/vat_model');
        $this->vat_model->update_vat($id, $amount);
    }

}
