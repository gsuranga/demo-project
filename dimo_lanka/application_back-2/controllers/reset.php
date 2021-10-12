<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class reset extends C_Controller {

	private $resours = array(
		'JS' => array('reset/js/resetjs'),
		'CSS' => array());

	public function __construct() {
		parent::__construct();
	}

	public function drawIndexreset() {
		$this->template->attach($this->resours);
		$this->template->draw('reset/indexreseruname', true);
	}

	public function changeuname() {
		$this->template->draw('reset/reseruname', false);
	}

	public function changepwd() {
		$this->template->draw('reset/changepwd', false);
	}

	public function updateUserPw() {
		$emp_id = $_REQUEST['user_id'];
		$this->load->model('reset/reset_model');
		echo $manageUserType = $this->reset_model->manageUserUpdate($this->input->post(), "UPDATE", "tbl_user");
	}

	public function updateUserName() {
		$this->load->model('reset/reset_model');
		echo $manageUserType = $this->reset_model->updateUserName($this->input->post(), "UPDATE", "tbl_user");
	}

}
