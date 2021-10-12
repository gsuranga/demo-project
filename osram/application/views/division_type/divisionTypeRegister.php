<?php
/**
 * Description of divisionTypeRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
?>
<?php //echo validation_errors();  ?>
<?php echo form_open($System['URL'] . 'division_type/insertDivisionType/'); ?>
<table width="100%">
    <tr>
        <td style="width: 25%;">Type</td>
        <td>
            <input type="text" onkeyup="get_divition_type();" name="division_type" value="" id="division_type" style="width: 80%;"/>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_error('division_type'); ?> </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($sub); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('insert_division_type'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
