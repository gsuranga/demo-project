<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class gmapsRoute extends C_Controller {

//put your code here
    private $resours = array(
        'JS' => array('gmapsRoute/js/map', '../../public/gmap/markerclusterer', '../../public/underscore/underscore-min'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    function index() {
//        $this->view->link('../public/underscore/underscore-min', 'js');
//        $this->view->link('../public/gmap/markerclusterer', 'js');
//        $this->view->link('gmapsRoute/js/map', 'js');
//       $this->view->render('gmapsRoute/index', TRUE);
        $this->template->attach($this->resours);
        $this->template->draw('gmapsRoute/index', true);
    }

    function getReps() {
        $this->loadModel('unproductive', 'unproductive/');
        $reps = $this->unproductive->getReps();
        echo json_encode($reps);
    }

    function getTruckGeoCodes() {
        $this->load->model('gmapsroute/gmapsroutemodel');
        $r = $this->gmapsroutemodel->getTruckGeoCodes();
        $p = array();
        $p[] = !empty($r) ? $r[0] : array();
        $l;
        $n;
        $reset = TRUE;
        for ($index = 1; $index < count($r) - 1; $index++) {
            if ($reset) {
                $l = (double) $r[$index - 1]->lat;
                $n = (double) $r[$index - 1]->lng;
            }
            $distance = ceil(sqrt(pow((double) $r[$index]->lat - $l, 2) + pow((double) $r[$index]->lng - $n, 2)) * 111132);
            if ($distance > 500) {
                $r[$index]->d = $distance;
                $p[] = $r[$index];
                $reset = TRUE;
            } else {
                $reset = FALSE;
            }
        }
        $p[] = !empty($r) ? $r[count($r) - 1] : array();
        echo json_encode($p);
    }

    function getNearDealerGeoCodes() {
//        $g = array();
//        $g[] = array('lat' => 7.321199, 'lng' => 80.742532);
//        $g[] = array('lat' => 7.281653, 'lng' => 80.689900);
//        $g[] = array('lat' => 7.284424, 'lng' => 80.71780);
//        $g[] = array('lat' => 7.310901, 'lng' => 80.73500);
//        $g[] = array('lat' => 7.280811, 'lng' => 80.67148);
//        $g[] = array('lat' => 7.283025, 'lng' => 80.69972);
//        $g[] = array('lat' => 7.294523, 'lng' => 80.77699);
//        echo json_encode($g);
    }

    function getProductiveGeoCodes() {
//        $g = array();
//        $g[] = array('lat' => 7.281653, 'lng' => 80.688186);
//        $g[] = array('lat' => 7.310901, 'lng' => 80.73333);
//        $g[] = array('lat' => 7.280811, 'lng' => 80.66948);
//        $g[] = array('lat' => 7.294523, 'lng' => 80.77469);
        $this->load->model('gmapsroute/gmapsroutemodel');
        echo json_encode($this->gmapsroutemodel->getProductiveGeoCodes());
    }

    function getUnproductiveGeoCodes() {
        $this->load->model('gmapsroute/gmapsroutemodel');
        echo json_encode($this->gmapsroutemodel->get_unproduct());
    }

    function getSessionInfo() {
        $this->load->model('gmapsroute/gmapsroutemodel');
        echo json_encode($this->gmapsroutemodel->getSessionInfo());
    }

    public function getUserNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('gmapsroute/gmapsroutemodel');
        $column = array('employee_first_name', 'id_employee_has_place', 'id_physical_place');
        $result = $this->gmapsroutemodel->getEmployeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getinvoice() {
        $this->load->model('gmapsroute/gmapsroutemodel');
        echo json_encode($this->gmapsroutemodel->getinvoice_data());
    }

}
