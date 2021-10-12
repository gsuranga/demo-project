<?php

/**
 * Description of outlet_category
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class permission_type extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexPermissionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexPermissionType() {
        //   $this->template->attach($this->resours);
        $this->template->draw('permission/indexpermissionType', true);
    }

    /**
     * Function insertPermissionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertPermissionType() {
        $this->form_validation->set_rules('permission_type', 'Type', 'required');
        if ($this->form_validation->run()) {
            $full_file_name = $_FILES['userfile']['name'];
            $this->load->helper('url');
            $this->config = array(
                'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . "/files/",
                'upload_url' => site_url() . "files/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|xml|ico",
                'overwrite' => TRUE,
                'max_size' => "1000KB",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $this->config);
            if ($this->upload->do_upload()) {
                $this->load->model('permission/permission_type_model');
                $insertPermissionType = $this->permission_type_model->insertPermissionType($this->input->post(), $full_file_name);
                if ($insertPermissionType) {
                    $this->session->set_flashdata('insert_permission_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Add Permission Type</spam>');
                } else {
                    $this->session->set_flashdata('insert_permission_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add permission type Error</spam>');
                }
                redirect('permission_type/indexPermissionType');
            } else {
                echo "file upload failed";
            }
            // redirect('/permission_type/indexPermissionType');
        } else {
            $this->indexPermissionType();
        }
    }

    /**
     * Function drawPermissionTypeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPermissionTypeRegister() {
        $this->template->draw('permission/permissionTypeRegister', false);
    }

    /**
     * Function drawPermissionTypeView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawPermissionTypeView() {
        $this->load->model('permission/permission_type_model');
        $column = array('id_permission_type', 'permission_type', 'permission_type_icon', 'added_date', 'added_time');
        $viewpermissionType = $this->permission_type_model->fetchFromAnyTable("tbl_permission_type", null, null, $column, 10000, 0, "RESULTSET", array('permission_type_status' => 1), "added_date");

        $this->template->draw('permission/permissionTypeView', false, $viewpermissionType);
    }

    /**
     * Function deletePermissionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deletePermissionType() {
        $this->load->model('permission/permission_type_model');
        $id = $this->input->get('id_permission_type');
        $permission_type = $this->permission_type_model->deletePermissionType($id);
        redirect('permission_type/indexPermissionType');
    }

    /**
     * Function drawIndexPermissionTypeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexPermissionTypeManage() {
        // $this->template->attach($this->resours);
        $this->template->draw('permission/indexManagePermissionType', true);
    }

    /**
     * Function viewPermissionTypeDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewPermissionTypeDetailsFromId($id) {
        $this->load->model('permission/permission_type_model');
        $fetchAllpermission_type = $this->permission_type_model->fetchFromAnyTable("tbl_permission_type", null, null, null, 10000, 0, "RESULTSET", array('permission_type_status' => 1, 'id_permission_type' => $id), null);
        $this->template->draw('permission/permissionTypeManage', false, $fetchAllpermission_type);
    }

    /**
     * Function drawPermissionTypeViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPermissionTypeViewManage() {
        $this->template->draw('permission/indexManagepermissionType', false);
    }

    /**
     * Function updatePermissionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updatePermissionType() {
        $full_file_name = $_FILES['userfile']['name'];

        if ($full_file_name != '') {
            $this->load->helper('url');
            $this->config = array(
                'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"]) . "/files/",
                'upload_url' => site_url() . "files/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|xml",
                'overwrite' => TRUE,
                'max_size' => "1000KB",
                'max_height' => "768",
                'max_width' => "1024"
            );
            $this->load->library('upload', $this->config);
            if ($this->upload->do_upload()) {
                $this->load->model('permission/permission_type_model');

                $insertUserType = $this->permission_type_model->updatePermissionType($this->input->post(), $full_file_name);
                //print_r($insertUserType);
                if ($insertUserType) {
                    $this->session->set_flashdata('update_permission_type', '<div id="alert_div">Update Outlet Permission Type Sucsess</div>');
                } else {
                    $this->session->set_flashdata('update_permission_type', '<div id="alert_div">Update Outlet Permission Type Error</div>');
                }
                header('Location:indexPermissionType');
            }
        } else {

            $this->load->model('permission/permission_type_model');

            $insertUserType = $this->permission_type_model->updatePermissionType($this->input->post(), $full_file_name);
            //print_r($insertUserType);
            if ($insertUserType) {
                $this->session->set_flashdata('update_permission_type', '<div id="alert_div">Update Outlet Permission Type Sucsess</div>');
            } else {
                $this->session->set_flashdata('update_permission_type', '<div id="alert_div">Update Outlet Permission Type Error</div>');
            }
            header('Location:indexPermissionType');
        }
    }

}

?>
