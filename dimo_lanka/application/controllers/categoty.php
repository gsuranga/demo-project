<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoty
 *
 * @author user
 */
class categoty extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function draw_index_category() {
        $this->template->draw('category/index_category', true);
    }

    public function draw_create_category() {
        $this->template->draw('category/create_category', false);
    }

    public function draw_view_all_category() {
        $this->template->draw('category/view_all_category', false);
    }

    public function create_category() {
        $this->load->model('category/category_model');
        $this->category_model->insert_category($_POST);
    }

    public function view_all_category() {
        $this->load->model('category/category_model');
        $view_all_category = $this->category_model->view_all_category($_POST);
        $this->template->draw('category/view_all_category', false, $view_all_category);
    }

    public function draw_update_category() {
        $this->template->draw('category/update_category', false, $update_category);
    }

    public function update_category() {
        $this->load->model('category/category_model');
        $update_category = $this->category_model->update_category();
        $this->template->draw('category/update_category', false, $update_category);
    }

}
