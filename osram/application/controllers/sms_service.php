<?php

/**
 * Description of sms_service
 *
 * @author Thilina
 */
class sms_service extends C_Controller {

    public function __construct() {

        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        $this->load->model('sms_service/sms_service_model');
      
        $this->BIGBoss = array(
            'GM' => 773256679,
            'NSM' => 770176938,
            'SAM' => 772665148,
			
        );
        $this->rmList = array(
            'Chamara manager' => 773823684,
            'Jayamuni manager' => 775791981,
            'Pravin manager' => 775875157,
            'Dinushka manager' => 773184663, //AR MARKETING 
        );
        $this->disList = array(
           'AR MARKETING' => 773184663,
            'KOSMIC INTERNATIONAL (PVT) LTD' => 0777687621,
            'RAINBOW DISTRIBUTORS' => 772440746,
            'NEW WAY MARKETING' => 1,
            'YAGODA DISTRIBUTORS' => 777671204,
            'SUPERSHOES DISTRIBUTORS' => 775246988,
            'LL Distributor' => 775246988,
            'Kanlit Distributor' => 772440746,
            'Hewage Holdings (pvt) Ltd' => 777  //777733246 
        ); //HEWAGE DISTRIBUTOR 777733246
		
    }



    public function get_firstLogin() {
	    $day = date("l");
        if ($day != 'Sunday') {
        $sms_data = $this->sms_service_model->get_firstLogin();
        if (empty($sms_data)) {
            return; //Amazing, All Are Working :-D,
        }
        $head = "Osram reps not active at 8.00 am : ";
        //BigBoss SMS
        $boss = array();
        foreach ($sms_data as $value) {
            $boss[] = $value->sales_name;
        }
        $msg = $head . implode(',', $boss);
        foreach ($this->BIGBoss as $value) {
            $this->sendSMS($value,$msg);
        }
        //Area SMS
        $rm = array();
        foreach ($sms_data as $value) {
            $rm[$value->regional_mng][] = $value->sales_name;
        }
        foreach ($rm as $key => $value) {
            $this->sendSMS($this->rmList[$key], $head . implode(',', $value));
        }
        //Dis SMS
        $dis = array();
        foreach ($sms_data as $value) {
            $dis[$value->distributor_name][] = $value->sales_name;
        }
        foreach ($dis as $key => $value) {
//            echo $key."---------------------------".$this->disList[$key].'<br>';
            $this->sendSMS($this->disList[$key],$head . implode(',', $value));
//            $this->sendSMS($this->disList[$key] . " " . $key, $head . implode(',', $value));
        }
		}
    }

    public function get_first_call() {
	        $day = date("l");
        if ($day != 'Sunday') {
        $sms_data = $this->sms_service_model->get_first_call();
//        echo json_encode($sms_data);
//        $this->sendSMS($sms_data);
        if (empty($sms_data)) {
            return; //Amazing, All Are Working :-D,
        }
        $head = "Osram reps that not created first call at 9.00 am : ";
        //BigBoss SMS   
        $boss = array();
        foreach ($sms_data as $value) {
            $boss[] = $value->sales_name;
        }
        $msg = $head . implode(',', $boss);
        foreach ($this->BIGBoss as $value) {
            $this->sendSMS($value, $msg);
        }
        //Area SMS
        $rm = array();
        foreach ($sms_data as $value) {
            $rm[$value->regional_mng][] = $value->sales_name;
        }
        foreach ($rm as $key => $value) {
            $this->sendSMS($this->rmList[$key], $head . implode(',', $value));
        }
        //Dis SMS
        $dis = array();
        foreach ($sms_data as $value) {
            $dis[$value->distributor_name][] = $value->sales_name;
        }
        foreach ($dis as $key => $value) {
//            echo $key."---------------------------".$this->disList[$key].'<br>';
            $this->sendSMS($this->disList[$key], $head . implode(',', $value));
        }
		}
    }

    public function get_tab_idle() {
	    $day = date("l");
        if ($day != 'Sunday') {
       $status=$this->get_time_diff();
       if($status === 0){
          $sms_data = $this->sms_service_model->tab_idle();
//        echo json_encode($sms_data);
//        $this->sendSMS($sms_data);
        if (empty($sms_data)) {
            return; //Amazing, All Are Working :-D,
        }
		 $nowtime = date('G:i:s');

        $head = "Till '$nowtime' tabs are idle within 1 hour ";
		//$head = "Tabs that idle last 15 minutes end to '$nowtime' ";
        //$head = "Tabs that idel more than 15 minutes";
        //BigBoss SMS   
        $boss = array();
        foreach ($sms_data as $value) {
            $boss[] = $value->sales_name;
        }
        $msg = $head . implode(',', $boss);
        foreach ($this->BIGBoss as $value) {
            $this->sendSMS($value, $msg);
        }
        //Area SMS
        $rm = array();
        foreach ($sms_data as $value) {
            $rm[$value->regional_mng][] = $value->sales_name;
        }
        foreach ($rm as $key => $value) {
            $this->sendSMS($this->rmList[$key], $head . implode(',', $value));
        }
        //Dis SMS
        $dis = array();
        foreach ($sms_data as $value) {
            $dis[$value->distributor_name][] = $value->sales_name;
        }
        foreach ($dis as $key => $value) {
//            $this->sendSMS($this->disList[$key],$key, $head . implode(',', $value));
             $this->sendSMS($this->disList[$key], $head . implode(',', $value));
        } 
           }
       }
       
        
    }
    public function get_time_diff() {       
        $time1 = strtotime('08:00:00');
        $timeto = strtotime('17:00:00');
        $time2 = strtotime(date('G:i:s'));
            if($time1 < $time2 && $time2 < $timeto){
                return 0;
            }  
        else {
            return 1;
        }
    }
//    public function sendSMS($pN,$key,$msg) {
//        $this->timestamp = date('Y-m-d H-i-s') . '_' . microtime();
//        file_put_contents('sendSMS/' . $pN . '_'.$key.'_' . $this->timestamp . '.txt', 'To: 94' . $pN . " \n\n" . $msg . " \n");
//    }
 public function sendSMS($pN,$msg) {
        $this->timestamp = date('Y-m-d_H-i-s') .'_'.mt_rand();
        file_put_contents('sendSMS/' . $pN . '_'.$this->timestamp.'.txt', 'To: 94' . $pN . " \n\n" . $msg . " \n");
    }
}
