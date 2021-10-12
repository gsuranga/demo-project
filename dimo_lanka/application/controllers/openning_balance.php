<?php

class Openning_balance extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->link('opening_balance/js/opening_bal', 'js');
        $this->view->link('opening_balance/css/check_box_css', 'css');
        $this->loadModel('opening_balance', 'opening_balance/');
        $this->view->alldis = $this->opening_balance->alldistributors();
        $this->view->render('opening_balance/index');
    }
    
    
    function createOB() {
        try {
             $this->loadModel('opening_balance', 'opening_balance/');


            if ($this->opening_balance->createOB($_POST)) {
                $this->setError('error_message', 'Opening Balance  is successfully Created!', 'Success');
            } else {
                $this->setError('error_message', 'Opening Balance Create Failed !', 'Error');
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die;
        }
    }


 public function get_pname() {

        if (empty($_GET['term']))
            exit;
        $q = strtolower($_GET["term"]);

        if (get_magic_quotes_gpc())
            $q = stripslashes($q);
        try {
            $this->loadModel('opening_balance', 'opening_balance/');
            $data = $this->opening_balance->get_pname();


            $result = array();
            foreach ($data AS $name) {
                if (strpos(strtolower($name->item_name), $q) !== false) {
                    array_push($result, array("id" => $name->iditem, "label" => $name->item_name ,"ict_name" => $name->ict_name,"item_code"=> $name->item_code,"ip_price"=>$name->ip_price));
                }
            }
            // json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
            echo json_encode($result);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die;
        }
    }
    
    public function get_category() {
        $this->loadModel('opening_balance', 'opening_balance/');
        $this->opening_balance->get_category();
    }
}