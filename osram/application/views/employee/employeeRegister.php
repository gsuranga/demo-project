<?php
/**
 * Description of employeeRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$CI = & get_instance();
?>
<?php
$firstname = array(
    'name' => 'firstname',
    'id' => 'firstname',
    'value' => set_value('firstname'),
    'text' => ''
);
$lastname = array(
    'name' => 'lastname',
    'id' => 'lastname',
    'value' => set_value('lastname'),
    'text' => ''
);
$nic = array(
    'name' => 'nic',
    'id' => 'nic',
    'value' => set_value('nic'),
    'text' => ''
);
$mobile = array(
    'name' => 'mobile',
    'id' => 'mobile',
    'value' => set_value('mobile'),
    'text' => ''
);
$telno = array(
    'name' => 'telno',
    'id' => 'telno',
    'value' => set_value('telno'),
    'text' => ''
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
    'text' => ''
);
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Next',
    'class' => 'classname'
);
$res = array(
    'name' => 'btreset',
    'id' => 'btreset',
    'type' => 'reset',
    'value' => 'Reset',
    'class' => 'classname'
);
?>
<table width="100%"><tr>
        <td>

            <?php echo form_open('employee/addEmployee'); ?>
            <table>
                <tr>
                    <td style="width: 30%;">Type</td>
                    <td><label>
                            <select name="employee_type" id="employee_type" class="select"><?php $CI->allEmployeeTypestoCombo(); ?></select></label></td>
                </tr>

                <tr>
                    <td style="width: 30%;">First Name</td>
                    <td><?php echo form_input($firstname); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('firstname'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Last Name</td>
                    <td><?php echo form_input($lastname); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('lastname'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">NIC</td>
                    <td><?php echo form_input($nic); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('nic'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Address</td>
                    <td><textarea id="address" name="address" class="input" cols="35" rows="5" ><?php echo set_value('address');?></textarea></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('address'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Mobile</td>
                    <td><?php echo form_input($mobile); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('mobile'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Telephone</td>
                    <td><?php echo form_input($telno); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('telno'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Email</td>
                    <td><?php echo form_input($email); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;"></td>
                    <td><?php echo form_error('email'); ?></td>
                </tr>
                <tr>
                    <td style="width: 30%;">Gender</td>
                    <td><label><select id="gender" name="gender" class="select"><option>Male</option><option>Female</option></select></label></td>
                </tr>
                <tr><td>&ensp;</td></tr>
                <tr>
                    <td>&ensp;</td>
                    <td><?php echo form_submit($sub); ?>&ensp;<?php echo form_reset($res); ?></td>

                </tr>
                <tr>
                    <td></td>
                    <td>&ensp;<?php echo $this->session->flashdata('employeeRegister');
            ?></td>
                </tr>
            </table>
            <?php echo form_close(); ?>

        </td>

    </tr>
</table>