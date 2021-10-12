<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Boot
 *
 * @author chathun@banara
 */
class Boot extends CI_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function index() {
        $te = array();
        $te['URL'] = base_url();
  
      //  $this->load->view('template/header', $te);
      //  $this->load->view('template/footer', $te);
    }

}

?>
