<?php
/**
 * Description of physical_place_category_Register
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<?php
$physical_palace_category_name = array(
    'name' => 'physical_palace_category_name',
    'id' => 'physical_palace_category_name',
    'type' => 'text',
 'onkeyup'=>'check_place_category();'  ,'value' => set_value('physical_palace_category_name')
);

$sub = array(
    'name' => 'btsave',
    'id' => 'btsave',
    'type' => 'submit',
    'value' => 'Save',
    'class' => 'classname'
);
?>
<?php echo form_open('physical_place_category/insertPhysicalPlaceCategory'); ?>
<table width="100%">
    <tr>
        <td style="width: 40%;">Category</td>
        <td>
            <?php echo form_input($physical_palace_category_name); ?>
        </td>
    </tr>
    <tr>
        <td style="width: 40%;"></td>
        <td>
            <?php echo form_error('physical_palace_category_name'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($sub); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>&ensp;<?php echo $this->session->flashdata('insert_physical_place_category'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
