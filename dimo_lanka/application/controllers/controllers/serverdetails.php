<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serverdetails
 *
 * @author KANISHKA
 */
class serverdetails extends C_Controller {

    function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        //
    }

    public function getServerdetails() {
    $this->load->model('serverdetails/serverdetails_model');
        $json_array = array();

        if (isset($_REQUEST['delar_account_no'])) {
            $delar_account_no = $_REQUEST['delar_account_no'];
            
            $discount = $this->serverdetails_model->getdiscount($delar_account_no);
            
            if (count($discount) > 0) {
                $json_array['status'] = 1;
                $json_array['dicount'] = array();
                
                foreach ($discount as $value) {
                    $details = array (
                        'discount_percentage' => $value->discount_percentage,
                        'vat' => $value->amount
                    );
                    array_push($json_array['dicount'], $details);
                }
                echo json_encode($json_array);
            } else {
                $json_array['status'] = 0;
                echo json_encode($json_array);
            }
        } else {
            $json_array['status'] = 0;
            echo json_encode($json_array);
        }
    }

}
