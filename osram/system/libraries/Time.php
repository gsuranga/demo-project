<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of services
 *
 * @author chathuranga bandara
 */
class CI_Time {

    public function __construct() {
        $this->CI = & get_instance();
    }

    function unixTimeAndroidtoPhp($time) {
        $conTime = round($time / 1000);
        return $conTime;
    }

    function unixTimePhptoAndroid($time) {
        $conTime = $time * 1000;
        return $conTime;
    }

    function getPreviousMonth() {
        $time = time() - 30 * 24 * 60 * 60 * 1;
        $date = date('Y-m-j', $time);
        return $date;
    }

    function getNextMonth() {
        $time = time() + 30 * 24 * 60 * 60 * 1;
        $date = date('Y-m-j', $time);
        return $date;
    }

    function checkTimeInterval($timest) {
        $booleanval = false;
        $d = date('jS F Y');
        $e = $d . ' 04:30:00 AM (IST)';

        $f = strtotime($e);


        if ($f <= $timest && $timest <= $f + 12 * 60 * 60) {
            $booleanval = true;
        }
        return $booleanval;
    }

}

