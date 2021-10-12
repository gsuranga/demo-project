<?php 
/**
 * Description of territoryTypeRegister
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$territory_type_name = array(
    'name' => 'territory_type_name',
    'id' => 'territory_type_name',
    'type' => 'text'
, 'onkeyup'=>'get_territory_type_name();');

$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
?>
<?php echo form_open('territory_type/insertTerritoryType'); ?>
<table width="100%">
    <tr>
        <td style="width: 30%;">Type</td>
        <td>
            <?php echo form_input($territory_type_name);?>
        </td>
    </tr>
     <tr>
        <td></td>
        <td><?php echo form_error('territory_type_name'); ?> </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($sub); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('insert_territory_type'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
