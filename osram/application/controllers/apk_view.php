<?php

/**
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */
class apk_view extends C_Controller {

//        header('Content-type: application/json');

    public function __construct() {
        parent::__construct();
    }

    public function check_authorization() {
        if (isset($_REQUEST['token'])) {
            $this->session->unset_userdata();
            $this->load->model('apk_view/apk_view_model');
            $this->apk_view_model->setSession();
        }
        // $all_userdata = $this->session->all_userdata();
        //  print_r($all_userdata);
    }

    public function draw_update_olt() {
        $this->template->attach(array('JS' => array('apk_view/olt_update/js/index')));
        $this->template->draw('apk_view/olt_update/index', true);
    }

    public function getOutletCats() {
        $this->load->model('apk_view/apk_view_model');
        return $this->apk_view_model->getOutletCats();
    }

    public function getOutletInfo() {
        $this->load->model('apk_view/apk_view_model');
        return $this->apk_view_model->getOutletInfo();
    }

    public function update_olt() {
        $this->load->model('apk_view/apk_view_model');
        $this->apk_view_model->update_olt();
        redirect('apk_view/draw_update_olt');
    }

}
