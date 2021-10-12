<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class reset_model extends C_Model {

	public function __construct() {
		parent::__construct();
	}

	public function manageUserUpdate($data, $type, $table) {
		$this->load->library('encrypt');
		$pwd = $_REQUEST['managepw'];
		$uid = $_REQUEST['user_id'];
		$details = array(
			'password' => $this->encrypt->encode($pwd)
		);
		$where = array(
			"id" => $uid
		);
		$this->db->__beginTransaction();
		$this->db->update($table, $details, $where);
		$this->db->__endTransaction();
		return $this->db->affected_rows();
	}

	public function updateUserName($data, $type, $table) {
		$uname = $_REQUEST['usernamemanage1'];
		$uid = $_REQUEST['usernamemanage'];
		$details = array(
			"username" => $uname
		);
		$where = array(
			"id" => $uid
		);
		$this->db->__beginTransaction();
		$this->db->update($table, $details, $where);
		$this->db->__endTransaction();
		return $this->db->affected_rows();
	}

}
