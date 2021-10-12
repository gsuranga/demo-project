<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$garage_name = array(
    'id' => 'garage_name',
    'name' => 'garage_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_garage_name();',
    'placeholder' => 'Select Garage'
);
$garage_id = array(
    'id' => 'garage_id',
    'name' => 'garage_id',
    'type' => 'hidden'
);
$create_garage_no_tgp = array(
    'id' => 'create_garage_no_tgp',
    'name' => 'create_garage_no_tgp',
    'type' => 'submit',
    'value' => 'Create TATA Brand Detail'
);
$_instance = get_instance();
?>
<?php echo form_open('garage/insertGarage');?>
<table width="50%" align="center">
    <tr>
        <td>Garage Name</td>
        <td>
            <?php echo form_input($garage_name);?>
            <?php echo form_input($garage_id);?>
        </td>
    </tr>
</table>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" align="center" id="tbl_garage_tata_brand" >
     <thead>
        <tr>
            <td></td>
            <td>Vehicle Brand</td>
            <td>Vehicle Repair Type</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
       <tr>
            <td>
                <input type="button" value="+" onclick="add_new_row1();"/>   
            </td>
            <td>
                <input type="text" id="txt_responsibility_1" name="txt_responsibility_1" placeholder="Select Vehicle Brand" autocomplete="off" onfocus="get_all_vehicle_brand('1');"/>
                <input type="hidden" id="txt_responsibility_id_1" name="txt_responsibility_id_1"/>
            </td>
            <td>
                <input type="text" id="txt_follow_up_1" name="txt_follow_up_1" placeholder="Select Vehicle Repair Type" autocomplete="off" onfocus="get_al_vehicle_sub_model('1');"/>
                <input type="hidden" id="txt_follow_up_id_1" name="txt_follow_up_id_1"/>
            </td>
            <td>
                <input type="button"  value="-" onclick="remove_select_row();"/>   
            </td>
        </tr>
    </tbody>
    <table align="right">
        <tr>
            <td>
                <?php echo form_input($create_garage_no_tgp);?>
            </td>
        </tr>
    </table>
<input type="hidden" name="emp_count" id="emp_count" value="1">
<?php echo form_close();?>