<?php 
/**
 * Description of employeeTypeManage
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?><table width="100%"><tr>
        <td>

            <?php echo validation_errors(); ?>
            <?php echo form_open('employee_type/updateEmployeeType'); ?>

            <div id="content_div2">
                <?php
                foreach ($extraData as $value) {
                    foreach ($value as $data) {
                        $employee_type = array(
                            'name' => 'employee_type1',
                            'id' => 'employee_type1',
                            'value' => $data['employee_type'],
                            'title' => '',
                            'class' => 'input'
                        );
                        $subupdate = array(
                            'name' => 'btupdate',
                            'id' => 'btupdate',
                            'type' => 'submit',
                            'value' => 'Update',
                            'class' => 'classname'
                        );
                        ?>
                        <input type="hidden" id="employee_type_id" name="employee_type_id" value="<?php echo $data['id_employee_type']; ?>"/>
                        <table width="100%" align="center">
                            <tr>
                                <td style="width: 25%;">Type</td>
                                <td>
                                    <?php echo form_input($employee_type); ?>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?php echo form_input($subupdate); ?></td>
                            </tr>

                        </table>
                        <?php echo form_close(); ?>
                        <?php
                    }
                }
                ?>
            </div>
            <?php echo form_close(); ?>


        </td>
    </tr>
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_employee_type'); ?></td>
    </tr>
</table>