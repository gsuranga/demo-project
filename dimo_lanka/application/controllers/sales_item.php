<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sales_item
 *
 * @author Iresha Lakmali
 */
class sales_item extends C_Controller {
   
     private $resours = array(
        'JS' => array(),
        'CSS' => array('salesitem/css/tsc_pagination'));
     
    
    public function __construct() {
        parent::__construct();
    }

    public function drawIndexSalesItem() {
        $this->template->attach($this->resours);
        $this->template->draw('salesitem/index_sales_item', true);
    }

    public function drawViewAllSalesItem() {
        $this->load->model('salesitem/sales_item_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "sales_item/drawIndexSalesItem";
        $config["total_rows"] = $this->sales_item_model->record_count();
        $config["per_page"] = 9;
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
        $extraData["results"] = $this->sales_item_model->viewAllSalesItem($config["per_page"], $page);
        $this->template->draw('salesitem/view_all_sales_item', false, $extraData);
    }

}

?>
