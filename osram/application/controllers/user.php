<?php

/**
 * Description of User
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
class User extends C_Controller {

    private $resours = array(
        'JS' => array('user/js/user'),
        'CSS' => array());

    public function __constructor() {
        parent::__construct();
    }

    /**
     * Function drawindexUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawindexUser() {
        $this->template->attach($this->resours);
        $this->template->draw('user/indexUser', true);
    }

    /**
     * Function drawUserPasswordForm
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawUserPasswordForm() {
        $this->template->attach($this->resours);
        $this->template->draw('user/changePasswordForm', false);
    }

    /**
     * Function drawindexManageUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawindexManageUser() {
        $this->template->attach($this->resours);
        $this->template->draw('user/indexManageUser', true);
    }

    /**
     * Function drawindexDeleteUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawindexDeleteUser() {
        $this->template->attach($this->resours);
        $this->template->draw('user/deleteUser', false);
    }

    /**
     * Function drawCreateUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawCreateUser() {

        $this->template->draw('user/createUser', false);
    }

    /**
     * Function drawSearchUserName
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawSearchUserName() {
        $this->template->draw('user/searchUserName', false);
    }

    /**
     * Function getEmployeeNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getEmployeeNames() {
        $q = strtolower($_GET['term']); //this is stable
        $this->load->model('user/user_model');
        $column = array('employee_first_name', 'id_employee','id_employee_registration');
        $result = $this->user_model->getEmployeNames($q, $column);
        echo json_encode($result);
    }

    /**
     * Function getUserTypes
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getUserTypes() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('user_type', 'id_user_type');
        $status_array = array('user_type_status' => '1');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_user_type", 'user_type', $q, $column, $status_array);
        echo json_encode($result);
    }

    /**
     * Function getUserNmes
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getUserNmes() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('user_username', 'id_user');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_user", 'user_username ', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function insertUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertUser() {

        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('employee_id','Employee ID', 'required');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('user_type_id', 'User Type ID', 'required');
        $this->form_validation->set_rules('user_password', 'User Password', 'required');
        $this->form_validation->set_rules('confirm_user_password', 'Comfirm User Password', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('user/user_model');
            $this->load->library('form_validation');
            $insertUser = $this->user_model->insertUser($this->input->post());

            if ($insertUser) {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added a User</spam>');
            } else {
                $this->session->set_flashdata('insert_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add User Fail</spam>');
            }

            redirect('user/drawindexUser');
        } else {
            $this->drawindexUser();
        }
    }

    /**
     * Function drawViewUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewUser() {
        $this->load->model('user/user_model');
        $viewAllUsers = $this->user_model->viewAllUsers();
        $this->template->draw('user/viewUser', false, $viewAllUsers);
    }

    /**
     * Function drawManageUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawManageUser() {

        $this->template->draw('user/manageUser', false);
    }

    /**
     * Function userDetails
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function userDetails() {
        $id = $_POST['key'];
        $this->load->model('user/user_model');
        $viewAllUsers = $this->user_model->viewAllUsers($id);
        echo json_encode($viewAllUsers);
    }

    /**
     * Function viewAllUserDetails
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function viewAllUserDetails() {
        $this->load->model('user/user_model');
        $viewAllUsers = $this->user_model->viewAllUsersDetails();
        $this->template->draw('user/deleteUser', false, $viewAllUsers);
    }

    /**
     * Function updateUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateUser() {
        $this->load->model('user/user_model');
        $manageUser = $this->user_model->manageUser($this->input->post(), "UPDATE", "tbl_user");

        if ($manageUser) {
            $this->session->set_flashdata('update_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a User</spam>');
        } else {
            $this->session->set_flashdata('update_user', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update User Fail</spam>');
        }

        redirect('user/drawindexManageUser');
    }

    /**
     * Function changeUserStatus
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function changeUserStatus() {

        $data = array("type" => $this->input->get_post('a87ff679a2f3e71d9181a67b7542122c'),
            "id" => $this->input->get_post('8fa14cdd754f91cc6554c9e71929cce7'));
        $this->load->model('user/user_model');
        $table_name = "tbl_user";
        $this->user_model->changeUserStatus($data, $table_name);
        redirect('user/drawindexManageUser');
    }

    /**
     * Function deleteUser
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteUser() {
        $data = array("id" => $this->input->get_post('175a3630722a538d73e864ab51dc1cc1')
        );

        $this->load->model('user/user_model');
        $table_name = "tbl_user";
        $this->user_model->deleteUser($data, $table_name);
        redirect('user/drawindexManageUser');
    }

    /**
     * Function changeUserPassword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function changeUserPassword() {
        $this->load->model('user/user_model');
        $this->load->library('encrypt');
        $changeUserPassword = $this->user_model->changeUserPassword('GETPASSWORD', $this->session->userdata('id_user'));
        if ($this->encrypt->decode($changeUserPassword) == $this->input->post('current_password')) {
            if ($this->input->post('new_password') == $this->input->post('confirm_password')) {

                $changeUserPassword_Change = $this->user_model->changeUserPassword('', $this->session->userdata('id_user'));
                if ($changeUserPassword_Change) {
                    $this->session->set_flashdata('password_status', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Changed Password</spam>');
                } else {
                    $this->session->set_flashdata('password_status', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Change Password Fail</spam>');
                }
            } else {
                $this->session->set_flashdata('password_status', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Password Did Not Match</spam>');
            }
        } else {
            $this->session->set_flashdata('password_status', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Invalid Current Password</spam>');
        }
        redirect('user/drawindexManageUser');
    }
    
    public function write_db(){
        $base_url = base_url();
        $cmd = "mysqldump -u root -pks cl_distributorHayleys2 > $base_url.storedb.sql";
        exec($cmd);

    }

    public function check_employee_registration() {
        $this->load->model('user/user_model');
        $column;
        $q = array("id_employee_registration" => $_REQUEST['id_employee_registration'],
            "user_username" => $_REQUEST['user_username']
        );
        $result = $this->user_model->check_employee_registration($q);

        foreach ($result as $value) {

            $column = array("id_employee_registration" => $value->id_employee_registration,
                "user_username" => $value->user_username
            );
        }
        $no_result = array('label' => 'valid');
        if (count($result) > 0) {
            echo json_encode($column);
        } else {

            echo json_encode($no_result);
        }
    }


}

?>
