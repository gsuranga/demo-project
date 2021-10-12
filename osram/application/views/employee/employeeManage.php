<?php 
/**
 * Description of employeeManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>

<table width="100%"><tr>
        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('employee/updateEmployee'); ?>

            <div id="content_div2">
                <?php $CI = & get_instance(); ?>
                <?php
                foreach ($extraData as $value) {
                    foreach ($value as $data) {

                        $firstname = array(
                            'name' => 'firstname',
                            'id' => 'firstname',
                            'value' => $data['employee_first_name'],
                            'title' => '',
                            'class' => 'input',
                            'rules' => 'required'
                        );
                        $lastname = array(
                            'name' => 'lastname',
                            'id' => 'lastname',
                            'value' => $data['employee_last_name'],
                            'title' => ''
                        );
                        $nic = array(
                            'name' => 'nic',
                            'id' => 'nic',
                            'value' => $data['employee_nic'],
                            'title' => ''
                        );
                        $mobile = array(
                            'name' => 'mobile',
                            'id' => 'mobile',
                            'value' => $data['employee_mobile'],
                            'title' => ''
                        );
                        $telno = array(
                            'name' => 'telno',
                            'id' => 'telno',
                            'value' => $data['employee_telephone'],
                            'title' => ''
                        );
                        $email = array(
                            'name' => 'email',
                            'id' => 'email',
                            'value' => $data['employee_email'],
                            'title' => ''
                        );
                        $subupdate = array(
                            'name' => 'btupdate',
                            'id' => 'btupdate',
                            'type' => 'submit',
                            'value' => 'Update',
                            'class' => 'classname'
                        );
                        $subdelete = array(
                            'name' => 'btdelete',
                            'id' => 'btdelete',
                            'type' => 'submit',
                            'value' => 'Delete',
                            'class' => 'classname'
                        );
                        ?>
                        <input type="hidden" id="employee_id" name="employee_id" value="<?php echo $data['id_employee']; ?>"/>
                        <table width="95%" border="0"  align="center">
                            <tr>
                                <td>Type</td>
                                <td><label>
                                        <select name="employee_type" id="employee_type" class="select">
                                            <option value="<?php echo $data['id_employee_type']; ?>"><?php echo $data['employee_type']; ?></option><?php $CI->allEmployeeTypestoCombo(); ?></select></label></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><?php echo form_input($firstname); ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><?php echo form_input($lastname); ?></td>
                            </tr>
                            <tr>
                                <td>Nic</td>
                                <td><?php echo form_input($nic); ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea id="address" name="address" class="input" cols="35" rows="5"><?php echo $data['employee_address']; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td><?php echo form_input($mobile); ?></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td><?php echo form_input($telno); ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo form_input($email); ?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><label>
                                        <select id="gender" name="gender" class="select" >
                                            <option selected="selected"><?php echo $data['employee_gender']; ?></option>
                                            <?php if ($data['employee_gender'] != "Male") { ?>
                                                <option>Male</option>

                                            <?php } else { ?>
                                                <option>Female</option>
                                            <?php } ?>
                                        </select></label></td>
                            </tr>

                            <tr><td>&ensp;</td></tr>
                            <tr>
                                
                                <td></td>
                                <td><?php echo form_submit($subupdate); ?></td>

                            </tr>
                        </table>
                        <?php
                    }
                }
                ?>
            </div>
            <?php echo form_close(); ?>
        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_employee'); ?></td>
    </tr>
</table>

