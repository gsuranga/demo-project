<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $template_data = array();
    public $css = array();
    public $js = array();
    public $title = '';

    function set($name, $value) {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
        $this->CI = & get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }

    //Added By @Chathun 

    function draw($page, $includeTemplate = false, $push_To_View = array()) {
        $system['URL'] = base_url();
        $system['JS'] = $this->js;
        $system['CSS'] = $this->css;

        $this->CI = & get_instance();
        if (!$includeTemplate) {
            $this->set('contents', $this->CI->load->view($page, array('System' => $system, 'extraData' => $push_To_View), false));
        } else {
            $this->set('contents', $this->CI->load->view('template/maintemplate', array('System' => $system, 'extraData' => $push_To_View, 'page' => $page), false));
        }
    }

    //Added By @Chathun 
    function attach($resours) {
        $this->js = $resours['JS'];
        $this->css = $resours['CSS'];
    }

}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */