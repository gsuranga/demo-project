<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account_number
 *
 * @author Iresha Lakmali
 */
class account_number extends C_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    private $resours = array(
        'JS' => array(),
        'CSS' => array('accountnumber/css/tsc_pagination'));

    public function drawIndexAccountNumber() {
          $this->template->attach($this->resours);
          $this->template->draw('accountnumber/index_account_number', true);
    }

    public function drawViewAllAccountNumber() {
        $this->load->model('accountnumber/account_number_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "account_number/drawIndexAccountNumber";
        $config["total_rows"] = $this->account_number_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        
        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationB tsc_paginationB02">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';
        
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $extraData["links"] = $this->pagination->create_links();
        $extraData["results"] = $this->account_number_model->viewAllAccountNumber($config["per_page"], $page);
        $this->template->draw('accountnumber/view_all_account_number', false, $extraData);       
    }

}

?>
