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
                    
                    if ($redirecttype==='mv') {
                        $dealer_address= $_REQUEST['dealer_address'];
                         $dealer_name= $_REQUEST['dealer_name'];
                    }
                    ?>
                    <script>
                        var php_var = "<?php echo base_url() ?>";
                        var redirect_type = "<?php echo $redirecttype ?>";
                        var dealer_id = "<?php echo $dealer_id ?>" //added dealer_id for deleler vice find==== harshan  ===>>
                        if (redirect_type === 'mo') {
                            window.location.assign(php_var + 'new_so_po/draw_index_manage_order?k=1');
                          
                        } else if (redirect_type === 'noti') {
                            window.location.assign(php_var + 'new_campaign/draw_index_notification?k=1');
                        } else if (redirect_type === 'mc') {
                            window.location.assign(php_var + 'new_campaign/drawIndexcampaigncalender?k=1');
                        }
                         else if(redirect_type === 'atp')
                        {
                             window.location.assign(php_var + 'tour_iteneray/drawViewIndex_TourPlan?k=1');
                        }
                         else if(redirect_type === 'st')
                        {
                             window.location.assign(php_var + 'areasalestour/drawIndexAreaSalesTourInputSheet?k=1');
                        }
                        
                        else if(redirect_type === 'gp')
                        {
                             window.location.assign(php_var + 'garage/drawIndexAllGarage?k=1');
                        }
                        else if(redirect_type === 'gr')
                        {
                             window.location.assign(php_var + 'garage/drawIndexGarage?k=1');
                        } 
                        else if(redirect_type === 'dwls')
                        {
                             window.location.assign(php_var + 'reports/dealer_wise_loss_sales_rpt?k=1');
                        }
						 else if(redirect_type === 'call')
                        {
                             window.location.assign(php_var + 'dealer_accept_order/drawIndexDelearAccept?k=1');
                        }
 else if(redirect_type === 'dsm')
                        {
                             window.location.assign(php_var + 'delars_stock_report/drawIndexdelarsstockreport?k=1');
                        }
						
                        
                        <?php  if ($redirecttype==='mv') {?>
                        
                        else if (redirect_type === 'mv') {
                            window.location.assign(php_var + 'delar/drawIndexupdatemoredetailsnew?k=1&token_delar_name=<?php echo $dealer_name;?>&token_delar_addess=<?php echo $dealer_address?>&token_shop_name=<?php echo $dealer_name;?>&tokendealer_id=<?php echo $dealer_id;?>'); 
                            
                        }
                        
                       
                       
                        <?php }?>

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
