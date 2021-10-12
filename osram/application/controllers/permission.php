<?php

/**
 * Description of outlet_category
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class permission extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexPermission
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexPermission() {
        //$this->template->attach($this->resours);
        $this->template->draw('permission/indexPermission', true);
    }

    /**
     * Function insertPermission
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertPermission() {
        $this->form_validation->set_rules('permission_type', 'Type', 'required');
        $this->form_validation->set_rules('permission_name', 'Permission', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('permission/permission_model');

            $insertPermission = $this->permission_model->insertPermission($this->input->post());
            if ($insertPermission) {
                $this->session->set_flashdata('insert_permission', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Permission</spam>');
            } else {
                $this->session->set_flashdata('insert_permission', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add permission Error</spam>');
            }
            redirect('permission/indexPermission');
        } else {
            $this->indexPermission();
        }
    }

    /**
     * Function drawPermissionRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPermissionRegister() {
        $this->load->model('permission/permission_type_model');
        $column = array('id_permission_type', 'permission_type');


        $viewpermissionType = $this->permission_type_model->fetchFromAnyTable("tbl_permission_type", null, null, $column, 10000, 0, "RESULTSET", array('permission_type_status' => 1), null);
        $dataarray = array('permissionType' => $viewpermissionType);
        $this->template->draw('permission/permissionRegister', false, $dataarray);
    }

    /**
     * Function drawPermissionView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPermissionView() {
        $this->load->model('permission/permission_model');
        $viewAllPemissionType = $this->permission_model->viewAllPemissionType();
        $this->template->draw('permission/permissionView', false, $viewAllPemissionType);
    }

    /**
     * Function deletePermission
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deletePermission() {
        $this->load->model('permission/permission_model');
        $id = $this->input->get('id');
        $permission = $this->permission_model->deletePermission($id);
        redirect('permission/indexPermission');
    }

    /**
     * Function drawIndexPermissionManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexPermissionManage() {
        //$this->template->attach($this->resours);
        $this->template->draw('permission/indexManagepermission', true);
    }

    /**
     * Function viewpermissionDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewpermissionDetailsFromId($id) {
        $this->load->model('permission/permission_model');
        $this->load->model('permission/permission_type_model');
        $column = array('id_permission_type', 'permission_type');

        $viewPermissionType = $this->permission_type_model->fetchFromAnyTable("tbl_permission_type", null, null, $column, 10000, 0, "RESULTSET", array('permission_type_status' => 1), "added_date");
        $fetchAllPermission = $this->permission_model->fetchFromAnyTable("tbl_permission", null, null, null, 10000, 0, "RESULTSET", array('permission_status' => 1, 'id_permission' => $id), null);
        $dataarray = array('permissionType' => $viewPermissionType, 'permission' => $fetchAllPermission);
        $this->template->draw('permission/permissionManage', false, $dataarray);
    }

    /**
     * Function drawPermissionViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPermissionViewManage() {

        $this->template->draw('permission/permissionManage', false);
    }

    /**
     * Function updatePermission
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updatePermission() {

        $this->load->model('permission/permission_model');
        $id = $this->input->post('id_permission');
        $insertUserType = $this->permission_model->updatePermission1($this->input->post());
        //print_r($insertUserType);
        if ($insertUserType) {
            $this->session->set_flashdata('update_permission', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Permission</spam>');
        } else {
            $this->session->set_flashdata('update_permission', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Permission Error</spam>');
        }

        redirect("permission/drawIndexPermissionManage?id_permission=$id");
    }

}

?>
