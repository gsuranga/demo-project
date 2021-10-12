<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class webservice extends Controller {

    public function __construct() {
        header('Content-type: application/json');
        // header("Access-Control-Allow-Origin: *");
        $this->loadModel('webservice', 'webservice/');
        if (substr($_GET['url'], 11) !== 'login') {
            if (isset($_REQUEST['position_id'])) {
                $GLOBALS['position_id'] = $_REQUEST['position_id'];
            } else {
              //  die();
            }
        }
    }

    public function login() {
        $result = $this->webservice->login();
        if (!empty($result[0]->idposition)) {
            $GLOBALS['position_id'] = $result[0]->idposition;
            $GLOBALS['session_id'] = $this->webservice->get_max_session_id();
            $json = array();
            $json['response'] = 1;
            $json['data'] = array();

            $json['data']['name'] = $result[0]->u_first_name;
            $json['data']['login_name'] = $_REQUEST['username'];
            $json['data']['postal_address'] = $result[0]->u_postal_address;
            $json['data']['target'] = 0;
            $json['data']['invtot'] = $this->webservice->get_invoice_total();
            $json['data']['cashamt'] = $this->webservice->get_cash_amount();
            $json['data']['chquamt'] = $this->webservice->get_cheque_total();
            $json['data']['password'] = $_REQUEST['password'];
            $json['data']['position_id'] = $result[0]->idposition;
            $json['data']['agent'] = $this->webservice->getAgentName($result[0]->idposition);

            $maindetails = $this->webservice->getMainDetails();
            $json['data']['disname'] = $maindetails[0]->agent;
            $json['data']['disaddress'] = $maindetails[0]->address;
            $json['data']['discontact'] = $maindetails[0]->contact_no;
            $json['data']['disvehicle'] = $maindetails[0]->vehicle_no;

            $json['data']['session_id'] = $GLOBALS['session_id'];

            echo json_encode($json);
        } else {
            $userExist = $this->webservice->userExist();
            if (count($userExist)) {
                echo json_encode(array('response' => -1));
            } else {
                echo json_encode(array('response' => 0));
            }
        }
    }

    public function getProducts() {
        $pdct = $this->webservice->getProducts();
        for ($index = 0, $len = count($pdct); $index < $len; $index++) {
            $pdct[$index]->item_photo = URL . 'library/timthumb.php?src=view/registration/product/upload/' . rawurlencode($pdct[$index]->item_photo) . '&w=70&h=90';
        }
        echo json_encode(array('list' => $pdct));
    }

    public function getProductCats() {
        echo json_encode(array('list' => $this->webservice->getProductCats()));
    }

    public function getItem_cat_Rel() {
        echo json_encode(array('list' => $this->webservice->getItem_cat_Rel()));
    }

    public function getPrice() {
        echo json_encode(array('list' => $this->webservice->getPrice()));
    }

    public function getOutCats() {
        echo json_encode(array('list' => $this->webservice->getOutCats()));
    }

    public function getRoute() {
        echo json_encode(array('list' => $this->webservice->getRoute()));
    }

    public function getOutlets() {
        echo json_encode(array('list' => $this->webservice->getOutlets()));
   //  print_r( array('list' => $this->webservice->getOutlets()));
    }

    public function getBanks() {
        $banks = $this->webservice->getBanks();
        echo json_encode(array("banks" => $banks));
    }

    public function save_json_file($name) {
        if (!is_dir('./web_service_jsons/' . $name . '/')) {
            mkdir('./web_service_jsons/' . $name . '/', 0777);
        }
        $fopen = fopen('./web_service_jsons/'. $name .'json', "w+");
        fwrite($fopen, json_encode($_POST));
    }

    public function set_olt_img() {
        if (isset($_FILES['photo'])) {
            $this->uploader = new Uploader();
            if (!is_dir(__ROOT__ . '/view/img-outlets-unproductive/' . date('Y') . '/' . date('m') . '/' . date('d') . '/')) {
                mkdir(__ROOT__ . '/view/img-outlets-unproductive/' . date('Y') . '/' . date('m') . '/' . date('d') . '/', 0777, TRUE);
            }
            $this->uploader->__setUrl('img-outlets-unproductive/' . date('Y') . '/' . date('m') . '/' . date('d') . '/');
            $this->uploader->__setFile($_FILES['photo']);
            $status_save = $this->uploader->__save();
            if ($status_save) {
                $jsn = json_decode(str_replace('.jpg', '', $_FILES['photo']['name']));
                $return['result'] = $this->webservice->set_unproductive_outlet($jsn,$_REQUEST['session_id']);
            }
        }
        echo json_encode($return);
    }

    public function set_customer() {
        $this->save_json_file('new_customer');
        echo json_encode(array('result' => $this->webservice->set_customer($_GET)));
    }

    public function insert_order() {
        $this->save_json_file('insert_order');
        $jsonString = json_decode($_POST['jsonString'], TRUE);
        $result = $this->webservice->insert_order($jsonString);
        echo $result ? 1 : 0;
    }

    public function get_last3Bills() {
        echo json_encode($this->webservice->get_last3Bills());
    }

    public function getStock() {
        $r = array();
        $r['date'] = date('Y-m-d');
        $r['List'] = $this->webservice->checkSession() ? $this->webservice->getStock() : array();
        echo json_encode($r);
    }

    public function getTrustnDamage() {
        echo json_encode(array("List" => $this->webservice->getTrustnDamage()));
    }

    public function setMyPosition() {
        $this->save_json_file('mypos');
        echo json_encode(array("Result" => $this->webservice->setMyPosition()));
    }

    public function setStockUnloadConfirm() {
        echo json_encode($this->webservice->setStockUnloadConfirm());
    }

    public function setStockLoadConfirm() {
        echo json_encode($this->webservice->setStockLoadConfirm());
    }

    public function outletCapture() {
        header('Content-Type: bitmap;charset = utf-8');
        $imgBase = __ROOT__ . '/view/registration/outlet/upload/';
        $this->save_json_file('img');
        $jsn = json_decode($_POST['upload']);
        foreach ($jsn->data as $value) {
            $value->filename = $jsn->session_id . '_' . $value->dealer_id . ".jpg";
            file_put_contents($imgBase . $value->filename, base64_decode($value->image));
            $this->webservice->outletCapture($value);
        }
        echo json_encode(array("result" => 1));
    }

    public function getPriceByOutlet() {
        echo json_encode(array("List" => $this->webservice->getPriceByOutlet()));
    }

    function makeOutStandingPayment() {
        $this->save_json_file('makeOutStandingPayment');
        echo json_encode(array('result' => $this->webservice->makeOutStandingPayment()));
    }

    public function insert_pre_order() {
        $this->save_json_file('insert_pre_order');
        $jsonString = json_decode($_POST['jsonString'], FALSE);
        $position = json_decode($_POST['position_id'], FALSE);
        $result = $this->webservice->insert_pre_order($jsonString, $position);
        echo $result ? 1 : 0;
    }

	public function end_day_status() {
	$this->save_json_file('end_day');
	$jsonString = json_decode($_POST['jsonString'], FALSE);
	$position = json_decode($_POST['position_id'], FALSE);
	$session_id = json_decode($_POST['session_id'], FALSE);
	$result = $this->webservice->insert_end_day_status($jsonString, $position, $session_id);
	//echo $result ? 1 : 0;
	echo json_encode(array("result" => $result));
	}

    public function getDailyDeliveries() {
        $deliveries = $this->webservice->getDailyDeliveries();
        echo json_encode(array("deliveries" => $deliveries));
    }

    public function getDailyDeliveriesItems() {
        $deliveries = $this->webservice->getDailyDeliverie_items();
        echo json_encode(array("items" => $deliveries));
    }
    public function Payment_info() {
        $this->save_json_file('payment');
        $jsonString = json_decode($_POST['jsonString'], FALSE);
        $session_id = json_decode($_POST['session_id'], FALSE);
        $result = $this->webservice->Insert_Payment($jsonString, $session_id);
        echo $result ? 1 : 0;
    }
    public function check_incomplete_route() {
        $result = $this->webservice->check_incomplete_route();
         $count=$result[0]->count;
        if($count >0){
            echo json_encode(array("incomplete" => $count,"incomplete_status"=>'yes'));
        }else{
            echo json_encode(array("incomplete" => $result,"incomplete_status"=>'no'));
        }
    }
    public function get_trust_details() {
$trustItem=array(); 
         $session_id = json_decode($_POST['session_id'], FALSE);
        $trust = $this->webservice->get_trust($session_id);
        foreach ($trust as $value) {
            $details=$this->webservice->get_trust_details($value->idstore);
            $trustItem[]=array("idtrust"=>$value->idtrust,"date"=>$value->s_date,"store"=>$value->idstore,"items"=>$details);
        }
        echo json_encode(array("data"=>$trustItem));
    }

    public function get_damage_details() {
        $session_id = json_decode($_POST['session_id'], FALSE);
        $damageItem=array(); 
        $damage = $this->webservice->get_damage($session_id);
        echo json_encode(array("data"=>$damage));
    }
  public function notification() {
        $this->save_json_file('notification');
        $request_pack = json_decode($_POST['request_pack'], FALSE);
        $session_id = json_decode($_POST['session_id'], FALSE);
        $result = $this->webservice->Insert_notification($request_pack, $session_id);
        echo $result ? 1 : 0;
    }
    
    public function notification_responce() {
        $value=$this->webservice->notification_responce();
        echo json_encode(array("value"=>$value[0]->value));
    }
    public function get_invoices() {
        $invoice = $this->webservice->get_invoices($_POST['session_id']);
        echo json_encode(array("invoice" => $invoice));
    }
    public function update_version() {
        $version = json_decode($_POST['version'], FALSE);
        $data = $this->webservice->update_version($version);
        echo json_encode($data);
    }
    
    public function asm_login() {
         $result = $this->webservice->asm_login();
        if (!empty($result[0]->idposition)) {
            $GLOBALS['position_id'] = $result[0]->idposition;
            $json = array();
            $json['response'] = 1;
            $json['data'] = array();

            $json['data']['name'] = $result[0]->u_first_name;
            $json['data']['login_name'] = $_REQUEST['username'];
            $json['data']['postal_address'] = $result[0]->u_postal_address;
           
            
            $json['data']['password'] = $_REQUEST['password'];
            $json['data']['position_id'] = $result[0]->idposition;
         

            echo json_encode($json);
        } else {
            $userExist = $this->webservice->userExist();
            if (count($userExist)) {
                echo json_encode(array('response' => -1));
            } else {
                echo json_encode(array('response' => 0));
            }
        }
        
         
    }
     public function get_dsrs()
     {
          $result = $this->webservice->get_dsrs();
           echo json_encode(array('list' => $result));
      //    echo json_encode($result);
     }
     public function get_asm_routes()
     {
          $result = $this->webservice->get_asm_routes();
           echo json_encode(array('list' => $result));
     }
     public function get_asm_dealers()
     {
         $result = $this->webservice->get_asm_dealers();
           echo json_encode(array('list' => $result));
     }
     public function get_asm_routes_and_outlets() {

       $routes = $this->webservice->getoutletforasm();
       $r_count = count($routes);
        
        for ($rut = 0; $rut < $r_count; $rut ++) {
           // print_r($routes [$rut]->dis);
            $routes[$rut]->outlets = $this->webservice->getasmout($routes [$rut]->areaId);
            }

        echo json_encode(array('list' => $routes));
        
    }
    public function getDistributors() {
        $result = $this->webservice->getDistributors();
        echo json_encode(array('result'=>$result));
        // echo "Hello";
     }
     public function get_itinerary()
     {
          $result = $this->webservice->get_itinerary();
        echo json_encode(array('list'=>$result));
     }
     
     public function insert_distributor_stock_count() {
        $this->save_json_file('insert_order');
     $jsonString = json_decode($_POST['jsonString'], TRUE);
        $result = $this->webservice->insert_distributor_stock_count($jsonString);
      echo json_encode(array('result'=>1));
    }
    
    public function insert_dealer_visit()
    {
          $this->save_json_file('insert_order');
        $jsonString = json_decode($_POST['jsonString'], TRUE);
        $result = $this->webservice->insert_dealer_visit($jsonString);
         echo "1";

   
  
   
    }
}
