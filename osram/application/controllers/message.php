<?php

/**
 * Description of outlet_category
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class message extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexMessage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexMessage() {
        //   $this->template->attach($this->resours);
        $this->template->draw('message/indexMessage', true);
    }

    /**
     * Function insertMessage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertMessage() {
        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('employee_first_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('division_name', 'Division Name', 'required');
        $this->form_validation->set_rules('territory_name', 'Territory Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('message/message_model');

            $insertUserType = $this->message_model->insertMessage($this->input->post());
            if ($insertUserType) {
                $this->session->set_flashdata('insert_message', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Add Message</spam>');
            } else {
                $this->session->set_flashdata('insert_message', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Message Error</spam>');
            }
            redirect('message/indexMessage');
        } else {
            $this->indexMessage();
        }
    }

    /**
     * Function drawMessageRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawMessageRegister() {
        $this->load->model('employee/employee_model');
        $this->load->model('division/division_model');
        $this->load->model('territory/territory_model');

        $column_emp = array('id_employee_registration', 'employee_first_name');
        $column_division = array('id_division', 'division_name');
        $column_territory = array('id_territory', 'territory_name');

        $viewemp = $this->employee_model->fetchFromAnyTable("tbl_employee", null, null, $column_emp, 10000, 0, "RESULTSET", array('employee_status' => 1), null);
        $viewterritory = $this->territory_model->fetchFromAnyTable("tbl_territory", null, null, $column_territory, 10000, 0, "RESULTSET", array('territory_status' => 1), null);
        $viewdivision = $this->division_model->fetchFromAnyTable("tbl_division", null, null, $column_division, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $dataarray = array('employee_first_name' => $viewemp, 'division' => $viewdivision, 'territory' => $viewterritory);
        $this->template->draw('message/messageRegistration', false, $dataarray);
    }

    /**
     * Function drawMessageView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawMessageView() {
        $this->load->model('message/message_model');
        $viewMessage = $this->message_model->viewAllMessage();
        $this->template->draw('message/messageView', false, $viewMessage);
    }

    /**
     * Function deleteMessage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteMessage() {
        $this->load->model('message/message_model');
        $id = $this->input->get('id_message');
        $insertUserType = $this->message_model->deleteMessage($id);
        redirect('message/indexMessage');
    }

    /**
     * Function drawIndexMessageManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexMessageManage() {
        // $this->template->attach($this->resours);
        $this->template->draw('message/indexManageMessage', true);
    }

    /**
     * Function viewMessageDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewMessageDetailsFromId($id) {
        $this->load->model('message/message_model');
        $fetchAllMessage = $this->message_model->messageByID($id);
        $this->template->draw('message/messageManage', false, $fetchAllMessage);
    }

    /**
     * Function drawMessageViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawMessageViewManage() {
        $this->template->draw('message/messageManage', false);
    }

    /**
     * Function updateMessage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateMessage() {
        print_r($this->input->post());
        $this->load->model('message/message_model');
        $id = $this->input->post('id_message');
        $insertUserType = $this->message_model->updateMessage($this->input->post());
        //print_r($insertUserType);
        if ($insertUserType) {
            $this->session->set_flashdata('update_message', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Update Message</spam>');
        } else {
            $this->session->set_flashdata('update_message', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Message Error</spam>');
        }

        redirect("message/drawIndexMessageManage?id_message=$id");
    }

    /**
     * Function allDivisiontoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisiontoCombo() {
        $this->load->model('message/message_model');
        $fetchAllDivision = $this->message_model->fetchFromAnyTable("tbl_division", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $pushdata = array('division' => $fetchAllDivision);
        $this->template->draw('message/allDivisionCombo', false, $pushdata);
    }

    /**
     * Function allEmployeeCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allEmployeeCombo() {
        $this->load->model('message/message_model');
        $fetchAllEmployee = $this->message_model->fetchFromAnyTable("tbl_employee", null, null, null, 10000, 0, "RESULTSET", array('employee_status' => 1), null);
        $pushdata = array('employee' => $fetchAllEmployee);
        $this->template->draw('message/allEmpoyeeName', false, $pushdata);
    }

    /**
     * Function allTerritoryCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTerritoryCombo() {
        $this->load->model('message/message_model');
        $fetchAllTerritory = $this->message_model->fetchFromAnyTable("tbl_territory", null, null, null, 10000, 0, "RESULTSET", array('territory_status' => 1), null);
        $pushdata = array('territory' => $fetchAllTerritory);
        $this->template->draw('message/allTerritoryName', false, $pushdata);
    }

}

?>
