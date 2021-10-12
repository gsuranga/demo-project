<?php

/**
 * Description of user_type
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
class user_type extends C_Controller {

    private $resours = array(
        'JS' => array('usertype/js/usertype'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawindexUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawindexUserType() {
        $this->template->attach($this->resours);
        $this->template->draw('usertype/indexUserType', true);
    }

    /**
     * Function drawCreateUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawCreateUserType() {
        $this->template->draw('usertype/create_usertype', false);
    }

    /**
     * Function drawManageUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawManageUserType($id_token) {
        if (isset($id_token)) {
            $this->template->draw('usertype/manageUserType', false);
        }
    }

    /**
     * Function drawViewUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewUserType() {
        $this->load->model('usertype/usertype_model');
        $column = array('id_user_type', 'user_type');
        $viewUserType = $this->usertype_model->fetchFromAnyTable("tbl_user_type", null, null, $column, 10000, 0, "RESULTSET", array('user_type_status' => 1), "added_date");

        $this->template->draw('usertype/view_usertype', false, $viewUserType);
    }

    /**
     * Function insertUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertUserType() {

        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('usertype/usertype_model');
            $insertUserType = $this->usertype_model->insertUserType($this->input->post());
            if ($insertUserType) {
                $this->session->set_flashdata('insert_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succesfully Added UserType</spam>');
            } else {
                $this->session->set_flashdata('insert_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add User Type Fail</spam>');
            }

            redirect('user_type/drawindexUserType');
        } else {
            $this->drawindexUserType();
        }
    }

    /**
     * Function updateUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateUserType() {
        $this->load->model('usertype/usertype_model');
        $manageUserType = $this->usertype_model->manageUserType($this->input->post(), "UPDATE", "tbl_user_type");

        if ($manageUserType) {
            $this->session->set_flashdata('update_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Update User Type</spam>');
        } else {
            $this->session->set_flashdata('update_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update User Type Fail</spam>');
        }

        redirect('user_type/drawindexUserType');
    }

    /**
     * Function deleteUserType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteUserType() {
        $this->load->model('usertype/usertype_model');

        $deleteUserType = $this->usertype_model->manageUserType($this->input->post('key'), "DELETE", "tbl_user_type");

        if ($deleteUserType) {
            $this->session->set_flashdata('delete_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted UserType</spam>');
        } else {
            $this->session->set_flashdata('delete_usertype', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Delete UserType Fail</spam>');
        }
        redirect('user_type/drawindexUserType');
    } public function get_user_type(){
        $this->load->model('usertype/usertype_model');
        $column;
        $q = array("user_type"=> $_REQUEST['user_type']);
        $result = $this->usertype_model->get_user_type($q);
        foreach ($result as $value) {
            $column = array("user_type" => $value->user_type);
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
