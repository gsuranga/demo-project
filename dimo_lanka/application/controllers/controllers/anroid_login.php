<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class anroid_login extends C_Controller {

    public function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
    }

    public function drawIndexLogin() {

        if (parent::getAuthStatus()) {
            $this->template->draw('index/index', true);
        } else {
            $this->template->draw('login/index', false);
        }
    }

    public function checkAuthentication() {
        $txt_user_name = $_REQUEST['txt_user_name'];
        $txt_password = $_REQUEST['txt_password'];
        $this->load->library('encrypt');
        $this->load->model('login/login_model');
        $decode = $this->encrypt->encode($txt_password);
        $checkLoginDetail = $this->login_model->checkLoginDetail($txt_user_name, $decode);
        $item_array = array();
        if ($this->encrypt->decode($checkLoginDetail[0]['password']) == $txt_password) {
            if (count($checkLoginDetail) > 0) {
                $employee = $this->login_model->getemployee($checkLoginDetail[0]['id']);
                // print_r($employee);
                $employee_id = '';

                if (count($employee) > 0) {
                    $employee_id = $employee[0]['employee_id'];
                } else {
                    $employee_id = 0;
                }
                foreach ($checkLoginDetail as $value) {
                    $user_detail = array(
                        'id' => $value['id'],
                        'username' => $value['username'],
                        'name' => $value['name'],
                        'typename' => $value['typename'],
                        'typeid' => $value['typeid'],
                        'employe_id' => $employee_id,
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($user_detail);
                    $this->session->userdata('validated');
                    $redirecttype = $_REQUEST['type'];
                    $dealer_id = $_REQUEST['dealer_id'];
                    ?>
                    <script>
                        var php_var = "<?php echo base_url() ?>";
                        var redirect_type = "<?php echo $redirecttype ?>";
                        var dealer_id = "<?php echo $dealer_id ?>" //added dealer_id for deleler vice find==== harshan  ===>>
                        if (redirect_type === 'mo') {
                            window.location.assign(php_var + 'new_so_po/draw_index_manage_order_1?k=1&delaer_id' + dealer_id);

                        } else if (redirect_type === 'noti') {
                            window.location.assign(php_var + 'new_campaign/draw_index_notification?k=1');
                        } else if (redirect_type === 'mc') {
                            window.location.assign(php_var + 'new_campaign/drawIndexcampaigncalender?k=1');
                        }

                    </script>
                    <?php
                }
            } else {
                redirect('login/drawIndexLogin');
            }
        } else {
            redirect('login/drawIndexLogin');
        }
    }

    function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('/login/drawIndexLogin');
    }

}
