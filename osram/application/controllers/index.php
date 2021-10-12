<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author chathun
 */
class index extends C_Controller {

    private $resours = array(
        'JS' => array('index/js/index'),
        'CSS' => array('index/css/indextable'));

    //put your code here
    public function __construct() {

        parent::__construct();
    }

    /**
     * Function index
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function index() {
        $this->template->attach($this->resours);
        $this->template->draw('index/index', true);
    }

    public function drowindex_dashBourd() {
        $this->template->draw('index/dashbourd', false);
    }

    public function draw_chart() {
        $this->load->model('index/index_model');
        $sales = $this->index_model->getSalesDetails();
        $head = array('Month');
        foreach ($sales as $s) {
            if (!in_array($s->brand_name, $head)) {
                $head[] = $s->brand_name;
            }
        }
        $head_length = count($head);
        $data = array();
        foreach ($sales as $s) {
            $idx = array_search($s->brand_name, $head);
            $mExist = FALSE;
            $t = 0;
            foreach ($data as $d) {
                if (in_array($s->month, $d)) {
                    $mExist = $t;
                    break;
                }
                ++$t;
            }
            if (is_numeric($mExist)) {
                $data[$mExist][$idx] = (DOUBLE) $s->totalsales;
            } else {
                $tmp = array($s->month);
                for ($index = 1; $index < $head_length; $index++) {
                    $tmp[$index] = 0;
                }
                $tmp[$idx] = (DOUBLE) $s->totalsales;
                $data[] = $tmp;
            }
        }
        $return[] = $head;
        foreach ($data as $d) {
            $return[] = $d;
        }
        echo json_encode($return);
    }
    
    public function drawindex_distributor_ranking(){
        $this->load->model('index/index_model');
        $rank = $this->index_model->getDis_ranking();
        $this->template->draw('index/dis_ranking', false,$rank);
         
    }
    public function drawindex_Item_ranking(){
        $this->load->model('index/index_model');
        $rank = $this->index_model->getItem_ranking();
        $this->template->draw('index/item_ranking', false,$rank);
    }

}

?>
