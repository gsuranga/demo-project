<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * CL smtp_host : mail.ceylonlinux.lk
 */
/*
 * CL smtp_host : mail.ceylonlinux.lk */

/**
 * Description of dealer_purchase_order
 *
 * @author user
 */
class send_mail extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    public function testMail() {
        $config = Array(
            'protocol' => 'gsmtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'shdinesh.99@gmail.com',
            'smtp_pass' => '*550#0757074386',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'priority' => 3,
            'newline' => '\r\n',
        );
        $this->load->library('email', $config);
        $this->email->from('shdinesh.99@gmail.com', 'Dinesh');
        $this->email->to('cl.shdinesh@gmail.com'); //cl.shdinesh@gmail.com
        // $this->email->cc('another@another-example.com');
        // $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class3.');
        $this->email->send();
        echo $this->email->print_debugger();
    }

}
