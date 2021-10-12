<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Iresha Lakmali
 */
class user extends C_Controller {

    private $resours = array(
        'JS' => array('user/js/user'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexUser() {
        $this->template->attach($this->resours);
        $this->template->draw('user/index_user', true);
    }

    public function drawCreateUser() {
        
        $this->template->draw('user/create_user', false);
    }

    public function insertUser() {
        //$this->form_validation->set_rules('sales_officer_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('user_name', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');

        if ($this->form_validation->run()) {
            $this->load->model('user/user_model');
            $this->load->library('encrypt');
            $encode = $this->encrypt->encode($_POST['confirm_password']);
            $this->user_model->insertUser($_POST, $encode);
            $lastRow = $this->user_model->getLastRow();
            $this->user_model->updateUserId($lastRow, md5($lastRow));
            redirect('user/drawIndexUser');
       } else {
            $this->drawIndexUser();
      }
    }

    public function updateUserId() {
        $this->load->model('user/user_model');
        $this->user_model->updateUserId();
    }

    public function getUserType() {
        $this->load->model('user/user_model');
        $userType = $this->user_model->getUserType();
        $this->template->draw('user/user_type_list', false, $userType);
    }

    public function drawViewAllUser() {
        $this->load->model('user/user_model');
        $viewAllUser = $this->user_model->viewAllUser();
        $this->template->draw('user/view_all_user', false, $viewAllUser);
    }

    public function drawDeleteUser() {
        $this->load->model('user/user_model');
        $viewAllUser = $this->user_model->viewAllUser();
        $this->template->draw('user/delete_user', false, $viewAllUser);
    }

    public function deleteUser() {
        $this->load->model('user/user_model');
        $id = $this->input->get('id');
        //print_r($id);
        $deleteBank = $this->user_model->deleteUser($id);
        redirect('user/drawManageIndexUser');
    }

    public function drawManageIndexUser() {
        $this->template->attach($this->resours);
        $this->template->draw('user/index_manage_user', true);
    }

    public function drawSearchUser() {
        $this->template->draw('user/search_user', false);
    }

    public function drawUserDetail() {
        $this->template->draw('user/view_user_detail', false);
    }

    public function drawChangePassword() {
        $this->template->draw('user/change_password', false);
    }

    public function getUserNmes() {
        $q = strtolower($_GET['term']);
        $this->load->model('user/user_model');
        $column = array('name', 'id');
        $result = $this->user_model->getUserName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getUserTypes() {
        $q = strtolower($_GET['term']);
        $this->load->model('user/user_model');
        $column = array('typename', 'typeid');
        $result = $this->user_model->getTypes($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getUserDetails() {
        $this->load->model('user/user_model');
        $result = $this->user_model->getUserDetail();
        echo json_encode($result);
    }

    public function changeUserPassword() {
        $this->form_validation->set_rules('user_id', 'Username', 'required');
        $this->form_validation->set_rules('user_type_id', 'User Type', 'required');
        $this->form_validation->set_rules('user_name', 'Username', 'required');
        $this->form_validation->set_rules('new_password', 'Password', 'trim|required|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('user/user_model');
            $this->load->library('encrypt');
            $this->load->library('form_validation');
             $insertUser = $this->user_model->updateUser($_POST);
           // $this->session->set_flashdata('change_password', 'sucsessfull');
             
             if ($insertUser) {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#2E9AFE;padding:2px;border-radius: 10px 5px 10px 5px">Succussfully update</spam>');
            } else {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#FA5858;padding:2px;border-radius: 10px 5px 10px 5px">Update Fail</spam>');
            }
            redirect('user/drawManageIndexUser');
        } else {
            $this->drawManageIndexUser();
        }
    }
    
    public function getUsersbyTypes(){
        $q = strtolower($_GET['term']);
        $this->load->model('user/user_model');
        $usertype = $_GET['usertype'];
        $column = array('name', 'employee_id');
        $result = $this->user_model->getUsersbyTypes($q, $column,$usertype);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

}

?>
