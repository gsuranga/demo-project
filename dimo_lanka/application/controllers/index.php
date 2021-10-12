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
        $this->template->draw('index/index', true);
    }

    function apk_upload() {
        $this->load->model('android_service/android_service_model');
        $result = $this->android_service_model->version_in_apk();
        echo json_encode($result);
    }

    //   upload app =====================harshan =======>>>>>>>>>>>>>
    function upload_app() {
//    echo 'asasa';
//        ob_start();
        if (!is_dir('apk/')) {
            mkdir('./apk/', 0777, TRUE);
        }
        $this->load->helper('file');
        $config['upload_path'] = './apk/';
//        $config['max_size'] = '100000';
        $config['allowed_types'] = '*';
        $config['overwrite'] = true;

        $version = $_POST['version'];
        $version1 = (string) $version;
        $concat_versi = $version1 . ' v';
        $data = array(
            'data1' => $concat_versi,
            'data2' => $version1,
        );

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload()) {
            ?>  
            <script>
                alert("Uploaded Failed !");
            </script>
            <?php

            $this->index();
        } else {

            $this->load->model('android_service/android_service_model');
            $this->android_service_model->set_app_version($data);
            ?>  
            <script>
                alert("Successully Uploaded !");
            </script>
            <?php

            $this->index();
        }
//        redirect('index');
    }

}
?>
