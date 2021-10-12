<?php 
/**
 * Description of employeeTypeRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
?>
<?php echo form_open($System['URL'] . 'employee_type/insertEmployeeType/'); ?>
<table width="100%">
    <tr>
        <td style="width: 25%;">Type</td>
        <td>
            <input type="text" onkeyup="check_employee_type();" name="employee_type" value="<?php set_value('employee_type')?>" id="employee_type" style="width: 80%;"/>
        </td>
    </tr>
    <tr>
        <td style="width: 25%;"></td>
        <td>
            <?php echo form_error('employee_type')?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($sub); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('insert_employee_type'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
