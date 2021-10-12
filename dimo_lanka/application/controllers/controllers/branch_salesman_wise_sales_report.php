<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch_salesman_wise_sales_report
 *
 * @author SHDINESH
 */
class branch_salesman_wise_sales_report extends C_Controller {

    private $resours = array(
        'JS' => array(''),
        'CSS' => array(''));

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexSalesmanSalesReport() {
        $this->template->attach($this->resours);
        $this->template->draw('branch_salesman_wise_sales_report/index_branch_salesman_wise_sales_report', true);
    }

    public function drawCreateSalesmanSalesReport() {
        $this->template->draw('branch_salesman_wise_sales_report/create_branch_salesman_wise_sales_report', false);
    }

}
