<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of C_Controller
 *
 * @author chathun
 */
class C_Controller extends CI_Controller {
    
    private $check_auth = true;

    function __construct() {
        parent::__construct();
        if ($this->check_auth) {
            $this->check_authorization();
        }
        date_default_timezone_set('Asia/Colombo');
       
        $this->clearCash();
    }

    public function check_authorization() {
    
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        }
    }

    public function setAuthStatus($status = true) {
        $this->check_auth = $status;
    }

    public function getAuthStatus() {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function clearCash() {

        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    function paginationMaker($location, $rowCount, $perPage, $segment, $template = false) {

        $this->load->library('pagination');
        $fetchAllEmployeeType = $this->employee_model->fetchAllEmployeeTypeModel(null, 1, null, null, null, 10000, 0, "ROWCOUNT");
        $config = array();
        $config["base_url"] = base_url() . "employee/indexEmployeeType";
        $config["total_rows"] = ($fetchAllEmployeeType[0]['count']);
        $config["per_page"] = 13;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];

        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$fetchAllEmployeeType = $this->employee_model->fetchAllEmployeeTypeModel(null, 1, null, null, null, $config["per_page"], $page, "RESULTSET");
        $data["results"] = $data;
        $data["links"] = $this->pagination->create_links();
        $pushdata = array('data' => $data, 'pagination' => $data);
        $this->template->draw($location, $template, $pushdata);
    }
    

}

?>
