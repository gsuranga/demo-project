<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mytest
 *
 * @author Kanchu
 */
class mytest extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    
    public function drawTestpage() {
        $this->template->draw('mytest/mytest',true);
        
    }
    function load_calander() {
        $preferences = array (
                            'start_day' => 'sunday',
                            'month_type' => 'long',
                            'day_type' => 'short',
                            'show_next_prev'=>'TRUE',
                            'next_prev_urL'=>'A URL'
                            );
//        $data = array(
//                    3 => 'http://example.com/news/article/2006/03/',
//                    7 => 'http://example.com/news/article/2006/07/',
//                    13 => 'http://example.com/news/article/2006/13/',
//                    26 => 'http://example.com/news/article/2006/26/'
//                    );
        $this->load->library('calendar',$preferences);
        
   //    echo $this->calendar->generate(2014,9,$data);
        echo $this->calendar->generate();
        
    }

    
    //put your code here
}
